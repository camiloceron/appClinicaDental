<?php

class Model_Tratamiento extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();        
    }        
    
    public function insertTratamiento($arrayDatos){         
        if($this->db->insert('tratamiento',$arrayDatos)){
            return $this->db->insert_id();            
        }
        else return FALSE;
    }
    
    public function editTratamiento($arrayDatos){                
        $this->db->where('id_tratamiento', $arrayDatos['id_tratamiento']);
        $this->db->update('tratamiento',$arrayDatos);        
    }
    public function buscarTratamiento($id){
        $query = $this->db->query("select * from tratamiento where id_tratamiento =".$id);
        if($query->num_rows()>0){
            return $query->result(); 
        }
        else{
            FALSE;
        }
    }
    
    public function buscarTratamientos($id){
        $query = $this->db->query("select * from tratamiento where id_paciente =".$id);
        if($query->num_rows()>0){
            return $query->result(); 
        }
        else{
            FALSE;
        }
    }
       
}