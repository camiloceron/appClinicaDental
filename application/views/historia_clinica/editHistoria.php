<div class="modal fade" id="frmEditHistoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <form  id="formEditHistoria" method="POST" action="<?php echo base_url('historiaClinica/editHistoria') ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Modificar Historia Clinica. <strong>Cédula. <?php echo $identificacion ?></strong></h4>
                    <input type='hidden' name='id_historia_clinica' id='id_historia_clinica' >
                    <input type='hidden' name='id_paciente' value='<?php echo $id_paciente ?>' >
                    <input type='hidden' name='identificacion' value='<?php echo $identificacion ?>' >
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="one">
                            <label for="" class="form-label">Fecha</label>
                            <input name="txtFechaHc" id='txtFechaHc' type="date" class="form-control" min="1910-01-01" max="2100-12-31" value="" required>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="one">
                            <br>
                            <label for="" class="form-label">Procedimiento realizado y pieza dentaria</label>                            
                            <textarea class="form-control" rows="3" name="txtProcedimientoHc" id='txtProcedimientoHc' maxlength="500" required></textarea>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="one">
                            <br>
                            <label for="" class="form-label">Firma Paciente</label>
                            <input name="txtFirmaP" id='txtFirmaP' type="text" class="form-control" maxlength="100">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="one">
                            <br>
                            <label for="" class="form-label">Firma Odontólogo</label>
                            <input name="txtFirmaO" id='txtFirmaO' type="text" class="form-control" maxlength="100">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">                
                    <button type="submit" id="btnGuardarH" class="btn btn-primary " >Modificar HistoriaClinica</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>


