<?php

class MovimientoCaja extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        //comunicacion con modelo        
        $this->load->model('Model_Tratamiento');
        $this->load->model('Model_MovimientoCaja');
    }            

    public function insertMovimiento(){
        $datos = $this->input->post();
        if (isset($datos) && isset($datos['id_tratamiento'])) {            
            $fecha = $datos['txtFecha'];
            $recibo = $datos['txtRecibo'];
            $abono = $datos['txtAbono'];
            $saldo = 0;
            $id_tratamiento = $datos['id_tratamiento'];
            
            //calcular saldo:
            $miTratamiento = $this->Model_Tratamiento->buscarTratamiento($id_tratamiento);
            $movimientos = $this->Model_MovimientoCaja->buscarMovimientosCaja($id_tratamiento);
            
            $total = 0;
            foreach ($miTratamiento as $row){
                $total = $row->total;               
            }
            $sumaAbonos = $abono;
            if($movimientos != NULL){
                foreach ($movimientos as $row){
                    $sumaAbonos = $sumaAbonos + $row->abono;
                }
            }            
            if($total>=$sumaAbonos){
                $saldo = $total - $sumaAbonos;
                
                $nMovimiento = array(                
                    'fecha' => $fecha,
                    'recibo' => $recibo,
                    'abono' => $abono,
                    'saldo' => $saldo,
                    'id_tratamiento' => $id_tratamiento                
                );            
                $sql = $this->Model_MovimientoCaja->insertMovimiento($nMovimiento);
                if($sql!=NULL){
                    $this->session->set_flashdata('mensajeMov','El nuevo Movimiento de caja se registró correctamente');
                    redirect('tratamiento/verTratamiento/'.$id_tratamiento.'#movimientos');
                }
                else {
                    $this->session->set_flashdata('errorMov','¡Error! el movimiento de caja no pudo ser registrado');
                    redirect('tratamiento/verTratamiento/'.$id_tratamiento.'#movimientos');                              
                }
            }
            else{
                $this->session->set_flashdata('errorMov','¡Error! el abono debe ser menor o igual al saldo, verifique el total del presupuesto del tratamiento');
                redirect('tratamiento/verTratamiento/'.$id_tratamiento.'#movimientos');
            }
        }
    }
    
    public function editMovimiento(){
        $datos = $this->input->post();
        if (isset($datos) && isset($datos['id_movimiento'])) {
            $id_movimiento  = $datos['id_movimiento'];
            $id_tratamiento = $datos['id_tratamientoEdit'];
            $fecha  = $datos['txtFechaEdit'];
            $recibo = $datos['txtReciboEdit'];
            $abono  = $datos['txtAbonoEdit'];
                        
             //calcular saldo:
            $miTratamiento = $this->Model_Tratamiento->buscarTratamiento($id_tratamiento);
            $movimientos = $this->Model_MovimientoCaja->buscarMovimientosCaja($id_tratamiento);
            
            $total = 0;
            foreach ($miTratamiento as $row){
                $total = $row->total;               
            }
            $sumaAbonos = 0;            
            foreach ($movimientos as $row){
                if($row->id_movimiento != $id_movimiento) $sumaAbonos = $sumaAbonos + $row->abono;                
                else $sumaAbonos = $sumaAbonos + $abono;                
            }
            $saldo  = $total;
            $arrayMovimientos = array();
            if($total >= $sumaAbonos){
                foreach ($movimientos as $row){
                    if($row->id_movimiento != $id_movimiento){
                        $saldo = $saldo - $row->abono;
                        $pMovimiento = array(
                            'id_movimiento' => $row->id_movimiento,                            
                            'fecha' => $row->fecha,
                            'recibo' => $row->recibo,
                            'abono' => $row->abono,
                            'saldo' => $saldo
                        );                        
                        array_push($arrayMovimientos, $pMovimiento);
                    }
                    else{
                        $saldo = $saldo-$abono;
                        $pMovimiento = array(
                            'id_movimiento' => $id_movimiento,
                            'fecha' => $fecha,
                            'recibo' => $recibo,
                            'abono' => $abono,
                            'saldo' => $saldo
                        );                        
                        array_push($arrayMovimientos, $pMovimiento);                        
                    }
                }                
                $sql = $this->Model_MovimientoCaja->editMovimientosTratamiento($arrayMovimientos);
                if($sql != NULL){
                    $this->session->set_flashdata('mensajeMov','El Movimiento de caja se actualizó correctamente.');
                    redirect('tratamiento/verTratamiento/'.$id_tratamiento.'#movimientos');
                }
                else{
                    $this->session->set_flashdata('errorMov','¡Error! No fue posible actualizr el movimiento de caja');
                    redirect('tratamiento/verTratamiento/'.$id_tratamiento.'#movimientos');                    
                }
            }
            else{
                $this->session->set_flashdata('errorMov','¡Error! el abono debe ser menor o igual al saldo, verifique el total del presupuesto del tratamiento');
                redirect('tratamiento/verTratamiento/'.$id_tratamiento.'#movimientos');
            }           
        }
    }

}
