<?php

class Model_Paciente extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();        
    }
        
    public function listaPacientes(){
        $query = $this->db->query("select * from paciente");        
        return $query->result();
    }
    
    public function insertPaciente($arrayDatos){        
        $this->db->insert('paciente',$arrayDatos);        
    }
    
    public function editPaciente($arrayDatos){        
        $this->db->where('identificacion', $arrayDatos['identificacion']);
        $this->db->update('paciente',$arrayDatos);        
    }
    
    public function buscarPaciente($identificacion){
        $query = $this->db->query("select * from paciente where identificacion =".$identificacion);
        if($query->num_rows()>0){
            return $query->result(); 
        }
        else{
            FALSE;
        }
    }
    
    public function buscarPacienteId($id){
        $query = $this->db->query("select * from paciente where id_paciente =".$id);
        if($query->num_rows()>0){
            return $query->result(); 
        }
        else{
            FALSE;
        }
    }

}
    

