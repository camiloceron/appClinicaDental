<?php

class Tratamiento extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        //comunicacion con modelo   
        $this->load->model('Model_Paciente');
        $this->load->model('Model_HistoriaClinica');
        $this->load->model('Model_Tratamiento');
        $this->load->model('Model_MovimientoCaja');
    } 
    
    public function newTratamiento($identificacion){
        if(isset($identificacion) && $identificacion!=NULL){
            $id_paciente='';
            $nombres = '';
            $miPaciente = $this->Model_Paciente->buscarPaciente($identificacion);
            if($miPaciente!=NULL){
                foreach ($miPaciente as $row){
                    $id_paciente = $row->id_paciente;
                    $nombres = $row->apellido1.' '.$row->apellido2.' '.$row->nombres;
                }
                $data['id_paciente'] = $id_paciente;
                $data['nombres'] = $nombres;
                $data['identificacion'] = $identificacion;
                $data['contenido'] = "tratamiento/newTratamiento";                
                $this->load->view("plantilla",$data);                 
            }
            
        }
        
    }    
    
    public function findTratamientos($id){
        if(isset($id) &&  $id!=NULL){
            $identificacion = "";
            $nombres = "";
            $result = $this->Model_Paciente->buscarPacienteId($id);
            if($result!=NULL){
                foreach ($result as $row){
                    $identificacion = $row->identificacion;
                    $nombres = $row->apellido1.' '.$row->apellido2.' '.$row->nombres;
                }                
                //$this->session->set_flashdata('mensaje','Bienvienido a tratamientos');                
                $resultTratamientos = $this->Model_Tratamiento->buscarTratamientos($id);                
                $data['id_paciente'] = $id;
                $data['identificacion'] = $identificacion;      
                $data['nombres'] = $nombres;
                $data['tratamientos'] = $resultTratamientos;                
                $data['contenido'] = "tratamiento/verTratamientos";
                //$data['frmVerHistorias'] = "historia_clinica/verHistorias";                
                //$data['frmEditHistoria'] = "historia_clinica/editHistoria";                
                $this->load->view("plantilla",$data); 
            }            
        }        
    } 
    
    public function verTratamiento($id_tratamiento){
        if(isset($id_tratamiento) &&  $id_tratamiento!=NULL){            
            $identificacion = "";
            $nombres = "";
            $id_paciente = "";
            $tratamiento = $this->Model_Tratamiento->buscarTratamiento($id_tratamiento);
            foreach ($tratamiento as $row){
                $id_paciente = $row->id_paciente;
            } 
            $result = $this->Model_Paciente->buscarPacienteId($id_paciente);
            if($result!=NULL){
                foreach ($result as $row){
                    $identificacion = $row->identificacion;
                    $nombres = $row->apellido1.' '.$row->apellido2.' '.$row->nombres;                    
                }                
                $movimientos = $this->Model_MovimientoCaja->buscarMovimientosCaja($id_tratamiento);
                $data['identificacion'] = $identificacion;      
                $data['nombres'] = $nombres;
                $data['tratamiento'] = $tratamiento;
                $data['id_tratamiento'] = $id_tratamiento;
                $data['id_paciente'] = $id_paciente;                
                $data['movimientos'] = $movimientos;
                $data['frmNewMovimiento'] = "movimiento_caja/newMovimiento";
                $data['frmEditMovimiento'] = "movimiento_caja/editMovimiento";
                $data['contenido'] = "tratamiento/datosTratamiento";
                $this->load->view("plantilla",$data);
            }
        }        
    }

    public function editTratamiento(){
        $datos = $this->input->post();
        if (isset($datos) && isset($datos['txtfechaTedit'])) {
            $id_tratamiento= $datos['txtIdTratamiento'];
            $fecha = $datos['txtfechaTedit'];
            $descripcion = $datos['txtDescripcionTedit'];
            $operatoria = $datos['txtOperatoria'];
            $endodoncia = $datos['txtEndodoncia'];
            $periodoncia = $datos['txtPeriodoncia'];
            $cx_implantologia = $datos['txtCx_implantologia'];
            $rehabilitacion = $datos['txtRehabilitacion'];
            $ortodoncia = $datos['txtOrtodoncia'];
            $otros = $datos['txtOtros'];            
            $forma_pago = $datos['txtFormaPagoTedit'];
            
            $total = $operatoria + $endodoncia + $periodoncia + $cx_implantologia + $rehabilitacion + $ortodoncia+ $otros;
            
            $pTratamiento = array(
                'id_tratamiento' => $id_tratamiento,
                'fecha' => $fecha,
                'descripcion' => $descripcion,
                'operatoria' => $operatoria,
                'endodoncia' => $endodoncia,
                'periodoncia' => $periodoncia,
                'cx_implantologia' => $cx_implantologia,
                'rehabilitacion' => $rehabilitacion,
                'ortodoncia' => $ortodoncia,
                'otros' => $otros,
                'total' => $total,
                'forma_pago' => $forma_pago,
            );
            try {
                $this->Model_Tratamiento->editTratamiento($pTratamiento);
                $this->session->set_flashdata('mensaje','Los datos del tratamiento se actualizaron correctamente');
                redirect('tratamiento/verTratamiento/'.$id_tratamiento);                
            } catch (Exception $ex) {
                alert($ex);
            }
        }
    }
    
    public function insertTratamiento(){
        $datos = $this->input->post();
        if (isset($datos) && isset($datos['id_paciente'])) {
            $id_paciente= $datos['id_paciente'];
            $fecha= $datos['txtfechaTnew'];
            $descripcion = $datos['txtDescripcionTnew'];            
            $operatoria = $datos['txtOperatoria'];
            $endodoncia = $datos['txtEndodoncia'];
            $periodoncia = $datos['txtPeriodoncia'];
            $cx_implantologia = $datos['txtCx_implantologia'];
            $rehabilitacion = $datos['txtRehabilitacion'];
            $ortodoncia = $datos['txtOrtodoncia'];
            $otros = $datos['txtOtros'];            
            $forma_pago = $datos['txtFormaPagoTnew'];
            
            $total = $operatoria + $endodoncia + $periodoncia + $cx_implantologia + $rehabilitacion + $ortodoncia+ $otros;
            
            $nTratamiento = array(                
                'fecha' => $fecha,
                'descripcion' => $descripcion,
                'operatoria' => $operatoria,
                'endodoncia' => $endodoncia,
                'periodoncia' => $periodoncia,
                'cx_implantologia' => $cx_implantologia,
                'rehabilitacion' => $rehabilitacion,
                'ortodoncia' => $ortodoncia,
                'otros' => $otros,
                'total' => $total,
                'forma_pago' => $forma_pago,
                'id_paciente' => $id_paciente
            );
                                           
                $idUltimoTratamiento = $this->Model_Tratamiento->insertTratamiento($nTratamiento);
                if($idUltimoTratamiento!=NULL){
                    $this->session->set_flashdata('mensaje','El nuevo Tratamiento se registró correctamente');
                    redirect('tratamiento/verTratamiento/'.$idUltimoTratamiento);                    
                }
                else{
                    $this->session->set_flashdata('error','¡Error! el tratamiento no pudo ser registrado. ');
                    redirect('tratamiento/findTratamientos/'.$id_paciente);
                }                            
        }
    }

}
