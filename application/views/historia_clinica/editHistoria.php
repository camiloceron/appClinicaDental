<div class="modal fade" id="frmEditHistoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <form  id="formEditHistoria" method="POST" action="<?php echo base_url('historiaClinica/editHistoria') ?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Modificar Historia Clinica. <strong>Cédula. <?php echo $identificacion ?></strong></h4>
                    <input type='hidden' name='id_historia_clinica' id='id_historia_clinica' >
                    <input type='hidden' name='id_paciente' value='<?php echo $id_paciente ?>' >
                    <input type='hidden' name='identificacion' value='<?php echo $identificacion ?>' >
                    <input type='hidden' name='txtFirmaP' id="txtFirmaP" >
                    <input type='hidden' name='txtFirmaO' id="txtFirmaO" >
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
                        <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="one" align="center">
                            <br>
                            <a
                                class="btn btn-success"
                                data-target="#myModal"                         
                                data-toggle="modal" data-placement="top" title="Firmar">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;Firmar
                            </a>                            
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6  leftspan" id="one">
                            <br>
                            <label for="imgFirmaPedit" class="form-label">Cargar Firma Paciente</label>                            
                            <input type="file" name="imgFirmaPedit" id="imgFirmaPedit" onChange="probarformato('3')">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6  leftspan" id="one">
                            <br>
                            <label for="imgFirmaOedit" class="form-label">Cargar Firma Odontólogo</label>                            
                            <input type="file" name="imgFirmaOedit" id="imgFirmaOedit"  onChange="probarformato('4')">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">                
                    <button type="submit" id="btnGuardarH" class="btn btn-primary " onclick="javascript:this.form.submit();this.disabled= true;">Modificar HistoriaClinica</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>


