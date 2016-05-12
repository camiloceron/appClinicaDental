<div class="page-title">
    <div class="title_left">
        <h3 class="page-header">Tratamiento del paciente: <br><small>Aquí puede ver y editar los datos del tratamiento</small><br>
            <small><strong>Nombre: <?php echo $nombres ?>. <br>Cédula: <?php echo $identificacion ?></strong></small>
        </h3><br/>
    </div>    
</div>
<div class="col-md-6 col-md-offset-3">
    <?php if ($this->session->flashdata('mensaje')): ?>
        <div class="alert alert-success" id="msgHistoria">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <div align="center">
                <i class="fa fa-check-circle fa-2x" aria-hidden="true"></i>&nbsp;
                <?php echo $this->session->flashdata('mensaje'); ?>
            </div>
        </div>                    
    <?php endif; ?>    
</div>
<div class="row">
    <div class="col-lg-12">                        
        <div class="btn-group btn-breadcrumb">
            <a href="<?php echo base_url('paciente/index/') ?>" class="btn btn-default"><i class="glyphicon glyphicon-home"></i></a>
            <a class="btn btn-default" 
                href="<?php echo base_url('paciente/findPaciente/'.$identificacion) ?>"
                data-toggle="tooltip" data-placement="top" title="Ver datos del paciente">
                <i class="fa fa-male"></i>&nbsp; Paciente
            </a>
            <a class="btn btn-default" href="<?php echo base_url('historiaClinica/findHistoria/'.$id_paciente) ?>"
               data-toggle="tooltip" data-placement="top" title="Ver historias clinicas del paciente">
               <i class="fa fa-file-text-o"></i>&nbsp; Historias Clinicas
            </a>
            <a class="btn btn-default" href="<?php echo base_url('tratamiento/findTratamientos/'.$id_paciente) ?>"
               data-toggle="tooltip" data-placement="top" title="Ver tratamientos del paciente">
               <i class="fa fa-medkit" aria-hidden="true"></i>&nbsp; Tratamientos
            </a>
        </div>
    </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <a id="btnEditarT"
       class="btn btn-warning pull-right"
       data-toggle="tooltip" data-placement="top" title="habilitar campos para editar Tratamiento">                    
        <i class="fa fa-edit"></i>&nbsp;Editar Tratamiento
    </a>
</div>
<!-- TRATAMIENTO X-->
<?php
if (isset($tratamiento) && $tratamiento != NULL) {
    foreach ($tratamiento as $row) {        
        ?>
        <div class="x_panel">
            <div class="x_title">
                <h2>Tratamiento:</h2>
                <ul class="nav navbar-right panel_toolbox">                    
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>              
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <div class="row">
                    <form id="frmEditT" method="POST" action="<?php echo base_url('tratamiento/editTratamiento/') ?>">
                        <input type="hidden" name="txtIdTratamiento" value="<?php echo $row->id_tratamiento ?>">
                        <div class="col-xs-4 col-sm-4 col-md-4  leftspan" id="1">
                            <label for="" class="form-label">Fecha</label>
                            <input name="txtfechaTedit" id="txtfechaTedit" type="date" class="form-control" min="1910-01-01" max="2100-12-31" value="<?php echo $row->fecha ?>">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="1">
                            <br>
                            <label for="">Descripción del Tratamiento</label>
                            <textarea class="form-control" rows="2" name="txtDescripcionTedit" id="txtDescripcionTedit" maxlength="500"><?php echo $row->descripcion ?></textarea>
                        </div>
                        <div class="col-xs-12"><hr></div>
                        <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="2">                        
                            <label for="">Presupuesto Trataiento</label>
                            <table class="table table-bordered table-hover centrado">
                                <thead>
                                    <tr class="active">
                                        <th>Especialidad</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>
                                <tbody>                            
                                    <tr>
                                        <td>Operatoria</td>
                                        <td><input name="txtOperatoria" id="txtOperatoria" value="<?php echo $row->operatoria ?>" type="number" class="form-control" placeholder="operatoria" min="0" max="999999999" onkeyup="calcularTotal()"></td>
                                    </tr>                            
                                    <tr>
                                        <td>Endodoncia</td>
                                        <td><input name="txtEndodoncia" id="txtEndodoncia" value="<?php echo $row->endodoncia ?>" type="number" class="form-control" placeholder="endodoncia" min="0" max="999999999" onkeyup="calcularTotal()"></td>
                                    </tr>                            
                                    <tr>
                                        <td>Periodoncia</td>
                                        <td><input name="txtPeriodoncia" id="txtPeriodoncia" value="<?php echo $row->periodoncia ?>" type="number" class="form-control" placeholder="periodoncia" min="0" max="999999999" onkeyup="calcularTotal()"></td>
                                    </tr>                            
                                    <tr>
                                        <td>CX e Implantología</td>
                                        <td><input name="txtCx_implantologia" id="txtCx_implantologia" value="<?php echo $row->cx_implantologia ?>" type="number" class="form-control" placeholder="CX e Implantología" min="0" max="999999999" onkeyup="calcularTotal()"></td>
                                    </tr>                            
                                    <tr>
                                        <td>Rehabilitacion</td>
                                        <td><input name="txtRehabilitacion" id="txtRehabilitacion" value="<?php echo $row->rehabilitacion ?>" type="number" class="form-control" placeholder="rehabilitacion" min="0" max="999999999" onkeyup="calcularTotal()"></td>
                                    </tr>                            
                                    <tr>
                                        <td>Ortodoncia</td>
                                        <td><input name="txtOrtodoncia" id="txtOrtodoncia" value="<?php echo $row->ortodoncia ?>" type="number" class="form-control" placeholder="ortodoncia" min="0" max="999999999" onkeyup="calcularTotal()"></td>
                                    </tr>                            
                                    <tr>
                                        <td>Otros</td>
                                        <td><input name="txtOtros" id="txtOtros" value="<?php echo $row->otros ?>" type="number" class="form-control" placeholder="otros" min="0" max="999999999" onkeyup="calcularTotal()"></td>
                                    </tr>                            
                                    <tr class="success">
                                        <td>Total</td>
                                        <td><input name="txtTotal" id="txtTotal" value="<?php echo $row->total ?>" type="number" class="form-control" placeholder="otros" min="0" max="999999999"  disabled></td>
                                    </tr>
                                </tbody>
                            </table>                        
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="3">
                            <label for="">Forma de Pago</label>
                            <textarea class="form-control" rows="2" name="txtFormaPagoTedit" id="txtFormaPagoTedit" maxlength="500"><?php echo $row->forma_pago ?></textarea>                        
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="three"><hr></div>
                        <div class="clearfix">
                            <div class="pull-right">
                                <button type="submit" id="btnModificarT" class="btn btn-primary " onclick="javascript:this.form.submit();this.disabled= true;" >Modificar Tratamiento</button>&nbsp;
                                <a 
                                    id ="btnCancelarTedit"
                                    data-toggle="tooltip" data-placement="top" title="deshabilitar campos"
                                    class="btn btn-default "
                                    >Cancelar</a>
                            </div>
                        </div>
                        <div class="col-xs-12"><hr class="grueso"></div>
                        <div class="col-md-6 col-md-offset-3" id="movimientos">
                            <?php if ($this->session->flashdata('mensajeMov')): ?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <div align="center">
                                        <i class="fa fa-check-circle fa-2x" aria-hidden="true"></i>&nbsp;
                                        <?php echo $this->session->flashdata('mensajeMov'); ?>
                                    </div>
                                </div>                    
                            <?php endif; ?>
                            <?php if ($this->session->flashdata('errorMov')): ?>
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <div align="center">
                                        <i class="fa fa-exclamation-circle fa-2x" aria-hidden="true"></i>&nbsp;
                                        <?php echo $this->session->flashdata('errorMov'); ?>
                                    </div>
                                </div>                    
                            <?php endif; ?>                            
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="4">
                            <br>
                            <a
                                class="btn btn-primary"
                                data-target="#frmNewMovimiento"                         
                                data-toggle="modal" data-placement="top" title="Crear nuevo movimiento de caja">
                                <i class="fa fa-plus"></i>&nbsp;&nbsp;Nuevo movimiento de caja</a>
                            
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                    <tr class="active">
                                        <th>Fecha</th>
                                        <th>Recibo</th>
                                        <th>Abono</th>
                                        <th>Saldo</th>
                                        <th>Editar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($movimientos) && $movimientos != NULL) { ?>
                                        <?php foreach ($movimientos as $mov) { ?>
                <?php if ($mov->id_tratamiento == $row->id_tratamiento) { ?>
                                                <tr>
                                                    <td><?php echo $mov->fecha ?></td>
                                                    <td><?php echo $mov->recibo ?></td>
                                                    <td><?php echo $mov->abono ?></td>
                                                    <td><?php echo $mov->saldo ?></td>
                                                    <td>
                                                        <a 
                                                            class="btn btn-sm btn-warning"
                                                            data-id ='<?php echo $mov->id_movimiento ?>'
                                                            data-fecha='<?php echo $mov->fecha ?>'
                                                            data-recibo='<?php echo $mov->recibo ?>'
                                                            data-abono='<?php echo $mov->abono ?>'                                                            
                                                            data-id_trat='<?php echo $mov->id_tratamiento ?>'
                                                            data-toggle="modal" title="Editar este movimiento de caja" data-target="#frmEditMovimiento">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    </td>
                                                </tr> 
                <?php }
            }
        } ?>
                                </tbody>
                            </table>                        
                        </div>                        
                    </form>

                </div> <!--fin row de contenido-->                
            </div>
        </div>
        <!-- FIN TRATAMIENTO X-->
    <?php
    }
} else {
    ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3"> 
            <br><br>
            <div class="alert alert-warning" id="msgBuscarP">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <div align="center">
                    <i class="fa fa-exclamation-circle fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;
                    El paciente no tiene tratamientos registrados
                </div>
            </div>                
        </div>
    </div>

    <?php
}
?>

<!-- cargar modals crud historia clinica:-->
<?php
    $this->load->view($frmNewMovimiento);
    $this->load->view($frmEditMovimiento);
//$this->load->view($frmFirmar);
?>