<?php

class HistoriaClinica extends CI_Controller {
    
    
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        //comunicacion con modelo        
        $this->load->model('Model_HistoriaClinica');
    }
    
    public function index(){
        $data['contenido'] = "historia_clinica/verHistorias";        
        $this->load->view("plantilla",$data);
    }
    
    public function insertHistoria(){
        $datos = $this->input->post();
        if(isset($datos) && isset($datos['txtProcedimientoHc'])){
            $fecha = $datos['txtFechaHc'];
            $procedimiento = $datos['txtProcedimientoHc'];
            $firmaP = $datos['txtFirmaP'];
            $firmaO = $datos['txtFirmaO'];
            $id_paciente = $datos['id_paciente'];
            $identificacion = $datos['identificacion'];
            
            $nHistoria = array(
                'fecha' => $fecha,
                'procedimiento' => $procedimiento,
                'firma_paciente' => $firmaP,
                'firma_odontologo' => $firmaO,
                'id_paciente' => $id_paciente
            );
            try{
                $this->Model_HistoriaClinica->insertHistoria($nHistoria);                    
                redirect('paciente/findPaciente/'.$identificacion.'/3#historias');
            } catch (Exception $ex) {
                alert($ex);
            } 
        }
        
    }
    
    public function editHistoria(){
        $datos = $this->input->post();
        if(isset($datos) && isset($datos['txtProcedimientoHc'])){
            $id_historia_clinica = $datos['id_historia_clinica'];
            $fecha = $datos['txtFechaHc'];
            $procedimiento = $datos['txtProcedimientoHc'];
            $firmaP = $datos['txtFirmaP'];
            $firmaO = $datos['txtFirmaO'];
            $id_paciente = $datos['id_paciente'];
            $identificacion = $datos['identificacion'];
            
            $pHistoria = array(
                'id_historia_clinica' => $id_historia_clinica,
                'fecha' => $fecha,
                'procedimiento' => $procedimiento,
                'firma_paciente' => $firmaP,
                'firma_odontologo' => $firmaO,
                'id_paciente' => $id_paciente
            );
            try{
                $this->Model_HistoriaClinica->editHistoria($pHistoria);                    
                redirect('paciente/findPaciente/'.$identificacion.'/4#historias');
            } catch (Exception $ex) {
                alert($ex);
            } 
        }
        
    }

}

