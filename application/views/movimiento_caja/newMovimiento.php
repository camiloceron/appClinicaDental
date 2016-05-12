<div class="modal fade" id="frmNewMovimiento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <form  id="formNewHistoria" method="POST" action="<?php echo base_url('movimientoCaja/insertMovimiento') ?>" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Nuevo Movimiento de Caja. <br><strong>Cédula. <?php echo $identificacion ?></strong></h4>
                    <input type='hidden' name='id_tratamiento' value='<?php echo $id_tratamiento ?>' >                    
                </div>
                <div class="modal-body">
                    <div class="row">                        
                        <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="one">
                            <label for="" class="form-label">Fecha</label>
                            <input name="txtFecha" type="date" class="form-control" min="1910-01-01" max="2100-12-31" value="<?php echo date("Y-m-d"); ?>" required>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="one">
                            <br>
                            <label for="" class="form-label">Recibo</label>
                            <input name="txtRecibo" type="text" class="form-control" placeholder="recibo" maxlength="70" required>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="one" >
                            <br>
                            <label for="" class="form-label">Abono</label>
                            <input name="txtAbono" id="txtAbono" type="number" class="form-control" placeholder="abono" required min="0" max="999999999" required>
                        </div>                        
                    </div>
                </div>
                <div class="modal-footer"> 
                    <br>
                    <button type="submit" id="btnGuardarM" class="btn btn-primary " onclick="javascript:this.form.submit();this.disabled= true;">Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
