<div class="page-title">
    <div class="title_left">
        <h3 class="page-header">HISTORIAS CLINICAS DEL PACIENTE:<br>
            <small><strong>Nombre: <?php echo $nombres?>. <br>Cédula: <?php echo $identificacion?></strong></small>
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
            <a href="" class="btn btn-default" disabled
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
<div class="x_panel">
    <div class="x_title">
        <h2><strong>HISTORIA CLINICA</strong><br/><small>Ver y editar Historia Clinica del paciente</small></h2>
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
        <form  id="formHistoria" method="POST" action="">                        
            <div class="row">                
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a
                        class="btn btn-primary"
                        data-target="#frmNewHistoria"                         
                        data-toggle="modal" data-placement="top" title="Crear nueva historia clinica">
                        <i class="fa fa-plus"></i>&nbsp;&nbsp;Nueva Historia Clínica</a><br><br>
                </div>                            
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php if (isset($historias) && $historias != NULL) { ?>
                    <table id="example" class="table table-bordered table-hover">
                        <thead>
                            <tr class="active">
                                <th>Fecha</th>
                                <th>Procedimiento Realizado y Pieza Dentaria</th>
                                <th>Firma Paciente</th>
                                <th>Firma Odontólogo</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                              <?php  foreach ($historias as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row->fecha ?></td>
                                        <td><?php echo $row->procedimiento ?></td>
                                        <td><img width="120" height="80" src="<?php echo base_url($row->firma_paciente) ?>" class="img-responsive"></td>
                                        <td><img width="120" height="80" src="<?php echo base_url($row->firma_odontologo) ?>" class="img-responsive"></td>
                                        <td>
                                            <a 
                                                class="btn btn-sm btn-warning"
                                                data-id ='<?php echo $row->id_historia_clinica ?>'
                                                data-fecha='<?php echo $row->fecha ?>'
                                                data-proc='<?php echo $row->procedimiento ?>'
                                                data-fp='<?php echo $row->firma_paciente ?>'
                                                data-fo='<?php echo $row->firma_odontologo ?>'                                                
                                                data-toggle="modal" title="Editar esta historia clinica" data-target="#frmEditHistoria">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </td>
                                    </tr> 
                                <?php
                                }
                            }
                            else{
                            ?> 
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3"> 
                                        <br><br>
                                        <div class="alert alert-warning" id="msgBuscarP">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <div align="center">
                                                <i class="fa fa-exclamation-circle fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;
                                                El paciente no tiene Historias Clinicas registradas
                                            </div>
                                        </div>                
                                    </div>
                                </div>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>                    
            </div>
        </form>
    </div>
</div>
<?php
    $this->load->view($frmNewHistoria);
    $this->load->view($frmEditHistoria);
    $this->load->view($frmFirmar);
?>