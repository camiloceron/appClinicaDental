<?php

class HistoriaClinica extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        //comunicacion con modelo   
        $this->load->model('Model_Paciente');
        $this->load->model('Model_HistoriaClinica');
    }   
    
    public function findHistoria($id){
        if(isset($id) &&  $id!=NULL){
            $identificacion = "";
            $nombres = "";            
            $result = $this->Model_Paciente->buscarPacienteId($id);
            if($result!=NULL){
                foreach ($result as $row){
                    $identificacion = $row->identificacion;
                    $nombres = $row->apellido1.' '.$row->apellido2.' '.$row->nombres;                    
                }                

                $resultHistorias = $this->Model_HistoriaClinica->buscarHistorias($id);
                $data['id_paciente'] = $id;
                $data['identificacion'] = $identificacion;      
                $data['nombres'] = $nombres;
                $data['historias'] = $resultHistorias;
                $data['contenido'] = "historia_clinica/verHistorias";
                $data['frmVerHistorias'] = "historia_clinica/verHistorias";
                $data['frmNewHistoria'] = "historia_clinica/newHistoria";
                $data['frmEditHistoria'] = "historia_clinica/editHistoria";
                $data['frmFirmar'] = "historia_clinica/firmar";
                $this->load->view("plantilla",$data);      
            }
            
        }                        
        
    }        

    public function insertHistoria() {
        $datos = $this->input->post();
        if (isset($datos) && isset($datos['txtProcedimientoHc'])) {
            //cargar archivos:
            $config['upload_path'] = 'public/imagenes/firmas/';
            $config['allowed_types'] = 'png|jpg';
            //$config['file_name']='firmaP1085';
            $config['max_size'] = 1000;
            $rutaFirmaP = '';
            $rutaFirmaO = '';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('imgFirmaP')) {
                $datos['error'] = $this->upload->display_errors();
                echo 'error al cargar firma: ' . $datos['error'];
            } else {
                $data = array('upload_data' => $this->upload->data());
                foreach ($data as $row) {
                    $rutaFirmaP = 'public/imagenes/firmas/' . $row['file_name'];
                }
            }
            if (!$this->upload->do_upload('imgFirmaO')) {
                $datos['error'] = $this->upload->display_errors();
                echo 'error al cargar firma: ' . $datos['error'];
            } else {
                $data = array('upload_data' => $this->upload->data());
                foreach ($data as $row) {
                    $rutaFirmaO = 'public/imagenes/firmas/' . $row['file_name'];
                }
            }
            //---------------------------------------

            $fecha = $datos['txtFechaHc'];
            $procedimiento = $datos['txtProcedimientoHc'];
            $id_paciente = $datos['id_paciente'];
            $identificacion = $datos['identificacion'];

            $nHistoria = array(
                'fecha' => $fecha,
                'procedimiento' => $procedimiento,
                'firma_paciente' => $rutaFirmaP,
                'firma_odontologo' => $rutaFirmaO,
                'id_paciente' => $id_paciente
            );
            try {
                $this->Model_HistoriaClinica->insertHistoria($nHistoria);
                $this->session->set_flashdata('mensaje','La Nueva Historia Clinica se registró con exito');
                redirect('historiaClinica/findHistoria/'.$id_paciente);            
            } catch (Exception $ex) {
                alert($ex);
            }
        }
    }

    public function editHistoria() {
        $datos = $this->input->post();
        if (isset($datos) && isset($datos['txtProcedimientoHc'])) {
            //cargar archivos:
            $config['upload_path'] = 'public/imagenes/firmas/';
            $config['allowed_types'] = 'png|jpg';
            //$config['file_name']='firmaP1085';
            $config['max_size'] = 1000;
            $rutaFirmaP = '';
            $rutaFirmaO = '';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('imgFirmaPedit')) {
                $rutaFirmaP = $datos['txtFirmaP'];                
            } else {
                $data = array('upload_data' => $this->upload->data());
                foreach ($data as $row) {
                    $rutaFirmaP = 'public/imagenes/firmas/' . $row['file_name'];
                }
            }
            if (!$this->upload->do_upload('imgFirmaOedit')) {
                $rutaFirmaO = $datos['txtFirmaO'];                
            } else {
                $data = array('upload_data' => $this->upload->data());
                foreach ($data as $row) {
                    $rutaFirmaO = 'public/imagenes/firmas/' . $row['file_name'];
                }
            }
            //---------------------------------------
            
            $id_historia_clinica = $datos['id_historia_clinica'];
            $fecha = $datos['txtFechaHc'];
            $procedimiento = $datos['txtProcedimientoHc'];            
            $id_paciente = $datos['id_paciente'];
            $identificacion = $datos['identificacion'];

            $pHistoria = array(
                'id_historia_clinica' => $id_historia_clinica,
                'fecha' => $fecha,
                'procedimiento' => $procedimiento,
                'firma_paciente' => $rutaFirmaP,
                'firma_odontologo' => $rutaFirmaO,
                'id_paciente' => $id_paciente
            );
            try {
                $this->Model_HistoriaClinica->editHistoria($pHistoria);
                $this->session->set_flashdata('mensaje','Los datos de la historia clinica se actualizaron correctamente');
                redirect('historiaClinica/findHistoria/'.$id_paciente);                
            } catch (Exception $ex) {
                alert($ex);
            }
        }
    }

    public function generarPng() {
        $hora = date("h:i:s");
        $fecha = date("j/n/Y");        
        
        if (isset($_POST['x']) && !empty($_POST['x']) ) {
            $file = base64_decode($_POST['x']);
            $ctype = "image/png";
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Cache-Control: private", false);
            header("Content-Type: $ctype");
            header("Content-Disposition: attachment; filename=\"Firma-" . $fecha . "-" . $hora . ".png\";");
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: " . strlen($file)) / 1024;
            echo $file;
            exit;
        }
    }

}
