<?php

class Model_MovimientoCaja extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();        
    }
    
    public function insertMovimiento($arrayDatos){
        if($this->db->insert('movimiento_caja',$arrayDatos)){
            return 1;           
        }
        else return FALSE;
    }
    
    public function editMovimiento($arrayDatos){
        $this->db->where('id_movimiento', $arrayDatos['id_movimiento']);        
        if($this->db->update('movimiento_caja',$arrayDatos)){
            return 1;           
        }
        else return FALSE;
    }
    
    public function editMovimientosTratamiento($data){
        if($this->db->update_batch('movimiento_caja', $data, 'id_movimiento')){
            return 1;
        }
        else return FALSE;
    }

    public function buscarMovimientosCaja($id){
        $query = $this->db->query("select * from movimiento_caja where id_tratamiento =".$id." order by id_movimiento ASC");
        if($query->num_rows()>0){
            return $query->result(); 
        }
        else{
            FALSE;
        }
    }

}
    





