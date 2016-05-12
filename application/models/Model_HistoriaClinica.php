<?php

class Model_HistoriaClinica extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();        
    }
    
    public function listaHistorias(){
        $query = $this->db->query("select * from historia_clinica");        
        return $query->result();
    }
    
    public function insertHistoria($arrayDatos){        
        $this->db->insert('historia_clinica',$arrayDatos);        
    }
    
    public function editHistoria($arrayDatos){        
        $this->db->where('id_historia_clinica', $arrayDatos['id_historia_clinica']);
        $this->db->update('historia_clinica',$arrayDatos);
    }
    
    public function buscarHistorias($id){
        $query = $this->db->query("select * from historia_clinica where id_paciente =".$id." order by id_historia_clinica ASC");
        if($query->num_rows()>0){
            return $query->result(); 
        }
        else{
            FALSE;
        }
    }
}
    



