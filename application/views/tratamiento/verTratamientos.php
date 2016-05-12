<div class="page-title">
    <div class="title_left">
        <h3 class="page-header">TRATAMIENTOS DEL PACIENTE:<br>
            <small><strong>Nombre: <?php echo $nombres ?>. <br>Cédula: <?php echo $identificacion ?></strong></small>
        </h3><br/>
    </div>    
</div>
<div class="col-md-6 col-md-offset-3">
    <?php if ($this->session->flashdata('mensaje')): ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <div align="center">
                <i class="fa fa-check-circle fa-2x" aria-hidden="true"></i>&nbsp;
                <?php echo $this->session->flashdata('mensaje'); ?>
            </div>
        </div>                    
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <div align="center">
                <i class="fa fa-exclamation-circle fa-2x" aria-hidden="true"></i></i>&nbsp;
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        </div>                    
    <?php endif; ?>
</div>
<div class="row">
    <div class="col-lg-12">                        
        <div class="btn-group btn-breadcrumb">
            <a class="btn btn-default" href="<?php echo base_url('paciente/index/') ?>"><i class="glyphicon glyphicon-home"></i></a>
            <a  class="btn btn-default"
                href="<?php echo base_url('paciente/findPaciente/'.$identificacion) ?>"
                data-toggle="tooltip" data-placement="top" title="Ver datos del paciente">
                <i class="fa fa-male"></i>&nbsp; Paciente
            </a>
            <a class="btn btn-default" href="<?php echo base_url('historiaClinica/findHistoria/'.$id_paciente) ?>"
               data-toggle="tooltip" data-placement="top" title="Ver historias clinicas del paciente">
               <i class="fa fa-file-text-o"></i>&nbsp; Historias Clinicas
            </a>
            <a class="btn btn-default" href="" disabled
               data-toggle="tooltip" data-placement="top" title="Ver tratamientos del paciente">
               <i class="fa fa-medkit" aria-hidden="true"></i>&nbsp; Tratamientos
            </a>
        </div>
    </div>
</div><br><br>
<!-- TRATAMIENTO X-->
<div class="x_panel">
    <div class="x_title">
        <label><strong>Tratamientos.</strong></label>
        <ul class="nav navbar-right panel_toolbox">                    
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>              
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div><br>
    <form id="frmNewT" method="POST" action="<?php echo base_url('tratamiento/newTratamiento/'.$identificacion) ?>">        
        <button
            type="submit"
            class="btn btn-primary"
            data-toggle="tooltip" data-placement="top" title="Nuevo tratamiento para <?php echo $nombres ?>">
            <i class="fa fa-plus"></i>&nbsp;&nbsp;Nuevo Tratamiento</button>
    </form>
    <div class="x_content">

        <?php
        if (isset($tratamientos) && $tratamientos != NULL) {
            $i = 1;
            ?>
            <!--tabla de tratamientos-->
            <table id="example" class="table table-bordered table-hover">
                <thead>
                    <tr class="active">
                        <th>No.</th>
                        <th>FECHA</th>
                        <th>DESCRIPCION</th>
                        <th>PRESUPUESTO</th>
                        <th>VER</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tratamientos as $row) { ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $row->fecha ?></td>
                            <td><?php echo $row->descripcion ?></td>
                            <td>
                                <ul>
                                    <?php if ($row->operatoria != 0) { ?>                                        
                                        <li>Operatoria: <?php echo $row->operatoria ?></li>                                        
                                    <?php } ?>
                                    <?php if ($row->endodoncia != 0) { ?>
                                        <li>Endodoncia: <?php echo $row->endodoncia ?></li>                                          
                                    <?php } ?>
                                    <?php if ($row->periodoncia != 0) { ?>
                                        <li>Periodoncia: <?php echo $row->periodoncia ?></li>                                          
                                    <?php } ?>
                                    <?php if ($row->cx_implantologia != 0) { ?>
                                        <li>CX e Implantología: <?php echo $row->cx_implantologia ?></li>                                        
                                    <?php } ?>
                                    <?php if ($row->rehabilitacion != 0) { ?>
                                        <li>Rehabilitacion: <?php echo $row->rehabilitacion ?></li>                                        
                                    <?php } ?>
                                    <?php if ($row->ortodoncia != 0) { ?>
                                        <li>Ortodoncia: <?php echo $row->ortodoncia ?></li>
                                    <?php } ?>
                                    <?php if ($row->otros != 0) { ?>
                                        <li>Otros: <?php echo $row->otros ?></li>
                                    <?php } ?>                                                                                
                                    <li><u>Total: <?php echo $row->total ?></u></li>
                                </ul>                               
                            </td>
                            <td>
                                <a id="btnVerTratamiento"
                                    href="<?php echo base_url('tratamiento/verTratamiento/' . $row->id_tratamiento) ?>"
                                    class="btn btn-success"               
                                    data-toggle="tooltip" data-placement="top" title="Ver y editar toda la información del tratamiento">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!--FIN tabla de tratamientos-->
        </div> <!--fin div x_content-->
        <?php
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