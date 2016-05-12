<div class="page-title">
    <div class="title_left">
        <h3 class="page-header">Nuevo Tratamiento para el paciente: <br><small>Aquí puede crer un nuevo tratamiento</small><br>
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
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger" id="msgHistoria">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <div align="center">
                <i class="fa fa-check-circle fa-2x" aria-hidden="true"></i>&nbsp;
                <?php echo $this->session->flashdata('error'); ?>
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
</div><br><br>
<!-- TRATAMIENTO X-->
<div class="x_panel">
    <div class="x_title">
        <h2>Nuevo Tratamiento:</h2>
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
            <form id="frmEditT" method="POST" action="<?php echo base_url('tratamiento/insertTratamiento/') ?>">
                <input type="hidden" name="id_paciente" value="<?php echo $id_paciente ?>">
                <div class="col-xs-4 col-sm-4 col-md-4  leftspan" id="1">
                    <label for="" class="form-label">Fecha</label>
                    <input name="txtfechaTnew" id="txtfechaTnew" type="date" class="form-control" min="1910-01-01" max="2100-12-31" value="<?php echo date("Y-m-d");?>" required>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="1">
                    <br>
                    <label for="">Descripción del Tratamiento</label>
                    <textarea class="form-control" rows="2" name="txtDescripcionTnew" id="txtDescripcionTnew" maxlength="500" required></textarea>
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
                                <td><input name="txtOperatoria" id="txtOperatoria" type="number" class="form-control" placeholder="operatoria" min="0" max="999999999" onkeyup="calcularTotal()"></td>
                            </tr>                            
                            <tr>
                                <td>Endodoncia</td>
                                <td><input name="txtEndodoncia" id="txtEndodoncia" type="number" class="form-control" placeholder="endodoncia" min="0" max="999999999" onkeyup="calcularTotal()"></td>
                            </tr>                            
                            <tr>
                                <td>Periodoncia</td>
                                <td><input name="txtPeriodoncia" id="txtPeriodoncia" type="number" class="form-control" placeholder="periodoncia" min="0" max="999999999" onkeyup="calcularTotal()"></td>
                            </tr>                            
                            <tr>
                                <td>CX e Implantología</td>
                                <td><input name="txtCx_implantologia" id="txtCx_implantologia" type="number" class="form-control" placeholder="CX e Implantología" min="0" max="999999999" onkeyup="calcularTotal()"></td>
                            </tr>                            
                            <tr>
                                <td>Rehabilitacion</td>
                                <td><input name="txtRehabilitacion" id="txtRehabilitacion" type="number" class="form-control" placeholder="rehabilitacion" min="0" max="999999999" onkeyup="calcularTotal()"></td>
                            </tr>                            
                            <tr>
                                <td>Ortodoncia</td>
                                <td><input name="txtOrtodoncia" id="txtOrtodoncia" type="number" class="form-control" placeholder="ortodoncia" min="0" max="999999999" onkeyup="calcularTotal()"></td>
                            </tr>                            
                            <tr>
                                <td>Otros</td>
                                <td><input name="txtOtros" id="txtOtros" type="number" class="form-control" placeholder="otros" min="0" max="999999999" onkeyup="calcularTotal()"></td>
                            </tr>                            
                            <tr class="success">
                                <td>Total</td>
                                <td><input name="txtTotal" id="txtTotal" type="number" class="form-control" placeholder="otros" min="0" max="999999999"  disabled></td>
                            </tr>
                        </tbody>
                    </table>                        
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="3">
                    <label for="">Forma de Pago</label>
                    <textarea class="form-control" rows="2" name="txtFormaPagoTnew" id="txtFormaPagoTedit" maxlength="500"></textarea>                        
                </div>
                <div class="col-xs-12"><hr class="grueso"></div>                        
                <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="three"><hr class="grueso"></div>
                <div class="clearfix">
                    <div class="pull-right">
                        <button type="submit" id="btnGuardarT" class="btn btn-primary " onclick="javascript:this.form.submit();this.disabled= true;">Guardar Tratamiento</button>&nbsp;
                        <a 
                            id ="btnCancelarTnew"
                            data-toggle="tooltip" data-placement="top" title="Volver a listado de tratamientos del paciente"
                            class="btn btn-default "
                            >Cancelar</a>
                    </div>
                </div>
            </form>

        </div> <!--fin row de contenido-->                
    </div>
</div>
<!-- FIN TRATAMIENTO X-->