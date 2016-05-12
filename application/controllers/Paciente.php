<?php

class Paciente extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        //comunicacion con modelo
        $this->load->model('Model_Paciente');
        $this->load->model('Model_HistoriaClinica');
    }

    public function index() {
        $data['contenido'] = "paciente/index";
        $this->load->view("plantilla", $data);
    }

    public function newPaciente() {
        $data['contenido'] = "paciente/newPaciente";
        $this->load->view("plantilla", $data);
    }

    public function buscarPaciente() {
        $datos = $this->input->post();
        if (isset($datos['txtBuscar'])) {
            $txtBuscar = $datos['txtBuscar'];
            $result = $this->Model_Paciente->buscarPaciente($txtBuscar);
            if ($result != FALSE) {
                redirect('paciente/findPaciente/' . $txtBuscar);
            } else {
                $data['contenido'] = "paciente/index";
                $data['id'] = $txtBuscar;
                $this->session->set_flashdata('mensaje', 'El Paciente No Existe');
                $this->load->view("plantilla", $data);
            }
        }
    }

    public function findPaciente($identificacion) {
        if (isset($identificacion) && $identificacion != NULL) {
            $result = $this->Model_Paciente->buscarPaciente($identificacion);
            $data['buscarPaciente'] = $result; //enviar datos del paciente a la vista findPaciente                             
            $data['identificacion'] = $identificacion;
            $data['contenido'] = "paciente/findPaciente";
            $this->load->view("plantilla", $data);
        }
    }

    public function verificarExiste($id) {
        if ($id != NULL) {
            $result = $this->Model_Paciente->buscarPaciente($id);
            echo json_encode($result);
        }
    }

    public function insert() {
        $datos = $this->input->post();

        if (isset($datos) && isset($datos['txtIdentificacion'])) {
            $txtIdentificacion = $datos['txtIdentificacion'];
            $result = $this->Model_Paciente->buscarPaciente($txtIdentificacion);
            if ($result == NULL) {
                $optRedes = $optHo = $optFc = $optGr = $optSd = $optPigmentacion = "";

                $optTipo = $datos['optTipo'];
                $txtLabios = $datos['txtLabios'];
                $txtDescTipoPaciente = $datos['txtDescTipoPaciente'];
                $txtGs = $datos['txtGs'];
                $fechaIngreso = $datos['fechaIngreso'];
                $txtLengua = $datos['txtLengua'];
                $txtApellido1 = $datos['txtApellido1'];
                $txtCarrillos = $datos['txtCarrillos'];
                $txtApellido2 = $datos['txtApellido2'];
                $txtPaladar = $datos['txtPaladar'];
                $txtNombres = $datos['txtNombres'];
                $txtMo = $datos['txtMo'];
                $txtPb = $datos['txtPb'];
                $txtObservacionAnamnesis = $datos['txtObservacionAnamnesis'];
                $fechaNacimiento = $datos['fechaNacimiento'];
                $txtMaxilares = $datos['txtMaxilares'];
                $txtEdad = $datos['txtEdad'];
                $txtDientes = $datos['txtDientes'];
                $txtDireccion = $datos['txtDireccion'];
                $txtCariados = $datos['txtCariados'];
                $txtDepartamento = $datos['txtDepartamento'];
                $txtProtesis = $datos['txtProtesis'];
                $txtMunicipio = $datos['txtMunicipio'];
                $txtDescripProtesis = $datos['txtDescripProtesis'];
                $txtEmail = $datos['txtEmail'];
                $txtObturados = $datos['txtObturados'];
                $txtOcupacion = $datos['txtOcupacion'];
                $txtPerdidos = $datos['txtPerdidos'];
                $txtDireccionOcupacion = $datos['txtDireccionOcupacion'];
                $txtSanos = $datos['txtSanos'];
                $txtAcudiente = $datos['txtAcudiente'];
                $txtEp = $datos['txtEp'];
                $txtParentesco = $datos['txtParentesco'];
                $txtTd = $datos['txtTd'];
                $txtTelefonoAcudiente = $datos['txtTelefonoAcudiente'];
                $txtPeriodonto = $datos['txtPeriodonto'];
                $optSh = $datos['optSh'];
                $txtOclusion = $datos['txtOclusion'];
                $txtDescRedes = $datos['txtDescRedes'];
                $txtObservacionesPaciente = $datos['txtObservacionesPaciente'];
                $txtMotivoConsulta = $datos['txtMotivoConsulta'];
                $optDiabetes = $datos['optDiabetes'];
                $optTm = $datos['optTm'];
                $optSe = $datos['optSe'];
                $optSr = $datos['optSr'];
                $optHepatitis = $datos['optHepatitis'];
                $optPv = $datos['optPv'];
                $optOp = $datos['optOp'];
                $optSi = $datos['optSi'];
                $optSinusitis = $datos['optSinusitis'];
                $optCv = $datos['optCv'];
                $optFr = $datos['optFr'];
                $optSida = $datos['optSida'];

                $txtCelular = $datos['txtCelular'];
                $txtCelularWhatsapp = $datos['txtCelularWhatsapp'];
                $txtTelefonoOcupacion = $datos['txtTelefonoOcupacion'];
                $optHipertencion = $datos['optHipertencion'];

                if (!empty($datos['optRedes']))
                    $optRedes = $datos['optRedes'];
                if (!empty($datos['optHo']))
                    $optHo = $datos['optHo'];
                if (!empty($datos['optGr']))
                    $optGr = $datos['optGr'];
                if (!empty($datos['optSd']))
                    $optSd = $datos['optSd'];
                if (!empty($datos['optFc']))
                    $optFc = $datos['optFc'];
                if (!empty($datos['optPigmentacion']))
                    $optPigmentacion = $datos['optPigmentacion'];

                $arrayDatos = array(
                    'tipo_paciente' => $optTipo, 'descripcion_tipo_paciente' => $txtDescTipoPaciente,
                    'fecha_ingreso' => $fechaIngreso, 'apellido1' => $txtApellido1,
                    'apellido2' => $txtApellido2, 'nombres' => $txtNombres,
                    'identificacion' => $txtIdentificacion, 'fecha_nacimiento' => $fechaNacimiento,
                    'edad' => $txtEdad, 'direccion' => $txtDireccion,
                    'celular' => $txtCelular, 'departamento' => $txtDepartamento,
                    'municipio' => $txtMunicipio, 'email' => $txtEmail,
                    'ocupacion' => $txtOcupacion, 'direccion_ocupacion' => $txtDireccionOcupacion,
                    'telefono_ocupacion' => $txtTelefonoOcupacion, 'celular_whatsapp' => $txtCelularWhatsapp,
                    'acudiente' => $txtAcudiente, 'parentesco' => $txtParentesco,
                    'telefono_acudiente' => $txtTelefonoAcudiente, 'red_social' => $optRedes,
                    'descripcion_rs' => $txtDescRedes, 'motivo_consulta' => $txtMotivoConsulta,
                    'tratamiento_medicacion' => $optTm, 'sistema_inmunologico' => $optSi,
                    'sistema_hematologico' => $optSh, 'sistema_endocrino' => $optSe,
                    'sinusitis' => $optSinusitis, 'sistema_respiratorio' => $optSr,
                    'sistema_cardiovascular' => $optCv, 'diabetes' => $optDiabetes,
                    'hepatitis' => $optHepatitis, 'fiebre_reumatica' => $optFr,
                    'portador_vih' => $optPv, 'sida' => $optSida,
                    'hipertencion' => $optHipertencion, 'otras_patologias' => $optOp,
                    'observacion_anamnesis' => $txtObservacionAnamnesis, 'labios' => $txtLabios,
                    'lengua' => $txtLengua, 'paladar' => $txtPaladar,
                    'piso_boca' => $txtPb, 'glandulas_salivales' => $txtGs,
                    'carrillos' => $txtCarrillos, 'mucosa_oral' => $txtMo,
                    'maxilares' => $txtMaxilares, 'dientes' => $txtDientes,
                    'cariados' => $txtCariados, 'obturados' => $txtObturados,
                    'perdidos' => $txtPerdidos, 'sanos' => $txtSanos,
                    'protesis' => $txtProtesis, 'descripcion_protesis' => $txtDescripProtesis,
                    'higiene_oral' => $optHo, 'frecuencia_cepillado' => $optFc,
                    'grado_riesgo' => $optGr, 'seda_dental' => $optSd,
                    'pigmentacion' => $optPigmentacion, 'examen_pulpal' => $txtEp,
                    'tejidos_dentales' => $txtTd, 'periodonto' => $txtPeriodonto,
                    'oclusion' => $txtOclusion, 'observacion_paciente' => $txtObservacionesPaciente
                );

                try {
                    $this->Model_Paciente->insertPaciente($arrayDatos);
                    $this->session->set_flashdata('mensaje', 'El Nuevo paciente se registró con exito');
                    redirect('paciente/findPaciente/' . $txtIdentificacion);
                } catch (Exception $ex) {
                    alert($ex);
                }
            } else {                
                $this->session->set_flashdata('error', '¡Error! ya existe un paciente con esta identificación');
                $data['contenido'] = "paciente/newPaciente";
                $this->load->view("plantilla", $data);                
            }
        }//fin isset        
    }

    public function edit($identificacion) {
        $datos = $this->input->post();

        if (isset($datos) && isset($datos['optTipo'])) {
            if ($identificacion != NULL) {
                $optRedes = $optHo = $optFc = $optGr = $optSd = $optPigmentacion = "";

                $optTipo = $datos['optTipo'];
                $txtLabios = $datos['txtLabios'];
                $txtDescTipoPaciente = $datos['txtDescTipoPaciente'];
                $txtGs = $datos['txtGs'];
                $fechaIngreso = $datos['fechaIngreso'];
                $txtLengua = $datos['txtLengua'];
                $txtApellido1 = $datos['txtApellido1'];
                $txtCarrillos = $datos['txtCarrillos'];
                $txtApellido2 = $datos['txtApellido2'];
                $txtPaladar = $datos['txtPaladar'];
                $txtNombres = $datos['txtNombres'];
                $txtMo = $datos['txtMo'];
                $txtPb = $datos['txtPb'];
                $txtObservacionAnamnesis = $datos['txtObservacionAnamnesis'];
                $fechaNacimiento = $datos['fechaNacimiento'];
                $txtMaxilares = $datos['txtMaxilares'];
                $txtEdad = $datos['txtEdad'];
                $txtDientes = $datos['txtDientes'];
                $txtDireccion = $datos['txtDireccion'];
                $txtCariados = $datos['txtCariados'];
                $txtDepartamento = $datos['txtDepartamento'];
                $txtProtesis = $datos['txtProtesis'];
                $txtMunicipio = $datos['txtMunicipio'];
                $txtDescripProtesis = $datos['txtDescripProtesis'];
                $txtEmail = $datos['txtEmail'];
                $txtObturados = $datos['txtObturados'];
                $txtOcupacion = $datos['txtOcupacion'];
                $txtPerdidos = $datos['txtPerdidos'];
                $txtDireccionOcupacion = $datos['txtDireccionOcupacion'];
                $txtSanos = $datos['txtSanos'];
                $txtAcudiente = $datos['txtAcudiente'];
                $txtEp = $datos['txtEp'];
                $txtParentesco = $datos['txtParentesco'];
                $txtTd = $datos['txtTd'];
                $txtTelefonoAcudiente = $datos['txtTelefonoAcudiente'];
                $txtPeriodonto = $datos['txtPeriodonto'];
                $optSh = $datos['optSh'];
                $txtOclusion = $datos['txtOclusion'];
                $txtDescRedes = $datos['txtDescRedes'];
                $txtObservacionesPaciente = $datos['txtObservacionesPaciente'];
                $txtMotivoConsulta = $datos['txtMotivoConsulta'];
                $optDiabetes = $datos['optDiabetes'];
                $optTm = $datos['optTm'];
                $optSe = $datos['optSe'];
                $optSr = $datos['optSr'];
                $optHepatitis = $datos['optHepatitis'];
                $optPv = $datos['optPv'];
                $optOp = $datos['optOp'];
                $optSi = $datos['optSi'];
                $optSinusitis = $datos['optSinusitis'];
                $optCv = $datos['optCv'];
                $optFr = $datos['optFr'];
                $optSida = $datos['optSida'];

                $txtCelular = $datos['txtCelular'];
                $txtCelularWhatsapp = $datos['txtCelularWhatsapp'];
                $txtTelefonoOcupacion = $datos['txtTelefonoOcupacion'];
                $optHipertencion = $datos['optHipertencion'];

                if (!empty($datos['optRedes']))
                    $optRedes = $datos['optRedes'];
                if (!empty($datos['optHo']))
                    $optHo = $datos['optHo'];
                if (!empty($datos['optGr']))
                    $optGr = $datos['optGr'];
                if (!empty($datos['optSd']))
                    $optSd = $datos['optSd'];
                if (!empty($datos['optFc']))
                    $optFc = $datos['optFc'];
                if (!empty($datos['optPigmentacion']))
                    $optPigmentacion = $datos['optPigmentacion'];

                $arrayDatos = array(
                    'tipo_paciente' => $optTipo, 'descripcion_tipo_paciente' => $txtDescTipoPaciente,
                    'fecha_ingreso' => $fechaIngreso, 'apellido1' => $txtApellido1,
                    'apellido2' => $txtApellido2, 'nombres' => $txtNombres,
                    'identificacion' => $identificacion, 'fecha_nacimiento' => $fechaNacimiento,
                    'edad' => $txtEdad, 'direccion' => $txtDireccion,
                    'celular' => $txtCelular, 'departamento' => $txtDepartamento,
                    'municipio' => $txtMunicipio, 'email' => $txtEmail,
                    'ocupacion' => $txtOcupacion, 'direccion_ocupacion' => $txtDireccionOcupacion,
                    'telefono_ocupacion' => $txtTelefonoOcupacion, 'celular_whatsapp' => $txtCelularWhatsapp,
                    'acudiente' => $txtAcudiente, 'parentesco' => $txtParentesco,
                    'telefono_acudiente' => $txtTelefonoAcudiente, 'red_social' => $optRedes,
                    'descripcion_rs' => $txtDescRedes, 'motivo_consulta' => $txtMotivoConsulta,
                    'tratamiento_medicacion' => $optTm, 'sistema_inmunologico' => $optSi,
                    'sistema_hematologico' => $optSh, 'sistema_endocrino' => $optSe,
                    'sinusitis' => $optSinusitis, 'sistema_respiratorio' => $optSr,
                    'sistema_cardiovascular' => $optCv, 'diabetes' => $optDiabetes,
                    'hepatitis' => $optHepatitis, 'fiebre_reumatica' => $optFr,
                    'portador_vih' => $optPv, 'sida' => $optSida,
                    'hipertencion' => $optHipertencion, 'otras_patologias' => $optOp,
                    'observacion_anamnesis' => $txtObservacionAnamnesis, 'labios' => $txtLabios,
                    'lengua' => $txtLengua, 'paladar' => $txtPaladar,
                    'piso_boca' => $txtPb, 'glandulas_salivales' => $txtGs,
                    'carrillos' => $txtCarrillos, 'mucosa_oral' => $txtMo,
                    'maxilares' => $txtMaxilares, 'dientes' => $txtDientes,
                    'cariados' => $txtCariados, 'obturados' => $txtObturados,
                    'perdidos' => $txtPerdidos, 'sanos' => $txtSanos,
                    'protesis' => $txtProtesis, 'descripcion_protesis' => $txtDescripProtesis,
                    'higiene_oral' => $optHo, 'frecuencia_cepillado' => $optFc,
                    'grado_riesgo' => $optGr, 'seda_dental' => $optSd,
                    'pigmentacion' => $optPigmentacion, 'examen_pulpal' => $txtEp,
                    'tejidos_dentales' => $txtTd, 'periodonto' => $txtPeriodonto,
                    'oclusion' => $txtOclusion, 'observacion_paciente' => $txtObservacionesPaciente
                );

                try {
                    $this->Model_Paciente->editPaciente($arrayDatos);
                    $this->session->set_flashdata('mensaje', 'Los datos del paciente se actualizaron correctamente');
                    redirect('paciente/findPaciente/' . $identificacion);
                } catch (Exception $ex) {
                    alert($ex);
                }
            }
        }//fin isset        
    }

}
