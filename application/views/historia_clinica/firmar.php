<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Firmar. <small>escriba su firma aquí:</small></h4>        
      </div>
      <div class="modal-body">
        <div class="row" align="center">
            <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="one">
                <canvas id="canvas" width="400" height="150"></canvas>                
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="one">
                <input type="color" id="color" value="#000000" hidden>
                  <button id="bt-clear" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="limpiar campo para volver a firmar">
                      <i class="fa fa-eraser" aria-hidden="true"></i> Limpiar
                  </button>
                  <button id="bt-save" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Guardar firma como una imagen PNG">
                      <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar firma
                  </button>                
            </div>
            
        </div>  
        <form id="f1" action="<?php echo base_url('historiaClinica/generarPng') ?>" method="post">
            <input name="x" id="x" type="hidden">            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>        
      </div>
    </div>
  </div>
</div>
