<div class="">
    <form method="POST" action="<?php echo base_url('paciente/buscarPaciente/') ?>" id="frmBuscarP">                
        <div class="page-title">
            <div class="title_left">        
                <h3 class="page-header">Buscar Paciente<br/><small>Desde esta opción puede buscar sus pacientes</small>
                </h3><br/>
            </div>
            <div class="title_right">            
                <div class="col-md-6 col-sm-6 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="number"  class="form-control" name="txtBuscar" placeholder="Indentificación" min="0" max="9999999999999" required="true">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" id="btnBuscarP">Buscar!</button>
                        </span>
                    </div>
                </div>            
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <?php if (isset($error)): ?>
                    <div class="alert alert-danger" id="msgBuscarP">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <div align="center">
                            <i class="fa fa-exclamation-circle fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;
                            <?php echo $error ?>
                        </div>
                    </div>
                <?php endif; ?>                    

            </div>
        </div>      
    </form>
</div>
