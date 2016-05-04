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
                    <?php if (isset($msgHistoria)): ?>
                        <div class="alert alert-success" id="msgHistoria">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <div align="center">
                                <?php echo $msgHistoria ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a
                        class="btn btn-primary"
                        data-target="#frmNewHistoria"                         
                        data-toggle="modal" data-placement="top" title="Crear nueva historia clinica">
                        <i class="fa fa-plus"></i>&nbsp;&nbsp;Nueva Historia Clínica</a><br><br>
                </div>                            
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <table class="table table-bordered">
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
                            <?php if (isset($historias) && $historias != NULL) {
                                foreach ($historias as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row->fecha ?></td>
                                        <td><?php echo $row->procedimiento ?></td>
                                        <td><?php echo $row->firma_paciente ?></td>
                                        <td><?php echo $row->firma_odontologo ?></td>
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
                                <?php }
                            }
                            ?>                                                
                        </tbody>
                    </table>
                </div>                    
            </div>
        </form>
    </div>
</div>