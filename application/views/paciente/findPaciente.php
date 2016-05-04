<div class="">
    <div class="page-title">
        <div class="title_left">        
            <h3 class="page-header">Mi Paciente<br/><small>Editar datos de su paciente, administrar sus historias clinicas y Tratamiento</small>
            </h3><br/>
        </div>
        <div class="title_right">
            <form method="POST" action="<?php echo base_url('paciente/buscarPaciente/') ?>" id="frmBuscarP">                
                <div class="col-md-6 col-sm-6 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="number"  class="form-control" name="txtBuscar" placeholder="Indentificación" min="0" max="9999999999999" required="true">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" id="btnBuscarP">Buscar!</button>
                        </span>
                    </div>
                </div>            
            </form>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12" align="center">
        <?php if (isset($error)): ?>
            <div class="alert alert-success" id="msgFindP">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <div align="center">
                    <?php echo $error ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">        
        <a id="btnVerHistorias"
           class="btn btn-default"
           href="#historias"
           data-toggle="tooltip" data-placement="top" title="historia clinica del paciente">
            <i class="fa fa-file-text-o"></i>&nbsp; Ver Historia Clinica
        </a>
        <a id="btnEditarP"
           class="btn btn-warning pull-right"
           data-toggle="tooltip" data-placement="top" title="habilitar campos para editar Paciente">                    
            <i class="fa fa-edit"></i>&nbsp;Editar Paciente
        </a>
        <br/><br/>
    </div>
    <div class="clearfix"></div>
    <?php foreach ($buscarPaciente as $row) { ?>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2> Paciente: <strong>Indentificación: <?php echo $row->identificacion; ?></strong></h2>
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
                        <form  id="formEditP" method="POST" action="<?php echo base_url('paciente/edit/' . $row->identificacion) ?>">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-4  leftspan" id="one">
                                    <label class="radio-inline"><input type="radio" name="optTipo" value="particular" <?php if ($row->tipo_paciente == 'particular') echo "checked"; ?> >Particular</label>
                                    <label class="radio-inline"><input type="radio" name="optTipo" value="convenio" <?php if ($row->tipo_paciente == 'convenio') echo "checked"; ?> >Convenio</label>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-4  leftspan" id="two">
                                    <label for="" class="form-label">Cual</label>
                                    <input name="txtDescTipoPaciente" type="text" value="<?php echo $row->descripcion_tipo_paciente; ?>"  class="form-control" maxlength="150">
                                </div>               
                                <div class="col-xs-6 col-sm-6 col-md-4  leftspan" id="three">
                                    <label for="" class="form-label">Fecha</label>
                                    <input name="fechaIngreso" type="date" class="form-control" min="1910-01-01" max="2100-12-31" value="<?php echo $row->fecha_ingreso; ?>" >
                                </div>

                                <div class="col-xs-12"><hr></div>

                                <div class="col-xs-6 col-sm-6 col-md-4 leftspan" id="five">
                                    <label for="" class="form-label">Primer apellido</label>
                                    <input name="txtApellido1" id="txtApellido1FindP" type="text" class="form-control" placeholder="primer apellido" value="<?php echo $row->apellido1; ?>" required maxlength="45" >
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-4 leftspan" id="six">
                                    <label for="" class="form-label">Segundo apellido</label>
                                    <input name="txtApellido2" type="text" class="form-control" value="<?php echo $row->apellido2; ?>" placeholder="segundo apellido" maxlength="45" >                                  
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-4 leftspan" id="seven">
                                    <label for="" class="form-label">Nombres</label>
                                    <input name="txtNombres" type="text" class="form-control" value="<?php echo $row->nombres; ?>" placeholder="nombres" required maxlength="100" >
                                </div>                              

                                <div class="col-xs-12"><br/></div>

                                <div class="col-xs-6 col-sm-6 col-md-3 rightspan" id="diez">
                                    <label for="" class="form-label">Fecha Nacimiento</label>
                                    <input name="fechaNacimiento" type="date" value="<?php echo $row->fecha_nacimiento; ?>" class="form-control" min="1910-01-01" max="2100-12-31" >
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-3 rightspan" id="once">
                                    <label for="" class="form-label">Edad</label>
                                    <input name="txtEdad" type="number" value="<?php echo $row->edad; ?>" class="form-control" min="0" max="100" >
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-3 rightspan" id="doce">
                                    <label for="" class="form-label">Dirección</label>
                                    <input name="txtDireccion" type="text" value="<?php echo $row->direccion; ?>" class="form-control" placeholder="Dirección" maxlength="200" >
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-3 rightspan" id="trece">
                                    <label for="" class="form-label">Celular</label>
                                    <input name="txtCelular" type="text" value="<?php echo $row->celular; ?>" class="form-control" placeholder="Celular" maxlength="15" >
                                </div>

                                <div class="col-xs-12"><br/></div>

                                <div class="col-xs-6 col-sm-6 col-md-4  leftspan" id="quince">
                                    <label for="" class="form-label">Departamento</label>
                                    <input name="txtDepartamento" type="text" value="<?php echo $row->departamento; ?>" class="form-control" placeholder="Departamento" maxlength="50" >
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-4  leftspan" id="dieciseis">
                                    <label for="" class="form-label">Municipio</label>
                                    <input name="txtMunicipio" type="text" value="<?php echo $row->municipio; ?>" class="form-control" placeholder="Municipio" maxlength="50" >
                                </div>               
                                <div class="col-xs-6 col-sm-6 col-md-4  leftspan" id="diecisite">
                                    <label for="" class="form-label"><i class="fa fa-envelope fa-lg" aria-hidden="true"></i></label>
                                    <input name="txtEmail" type="text" value="<?php echo $row->email; ?>" class="form-control" placeholder="Email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" maxlength="50" >
                                </div>

                                <div class="col-xs-12"><br/></div>

                                <div class="col-xs-6 col-sm-6 col-md-3 rightspan" id="diecinuevo">
                                    <label for="" class="form-label">Ocupación</label>
                                    <input name="txtOcupacion" type="text" value="<?php echo $row->ocupacion; ?>" class="form-control" placeholder="Ocupación" maxlength="100" >
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-3 rightspan" id="veinte">
                                    <label for="" class="form-label">Dirección</label>
                                    <input name="txtDireccionOcupacion" value="<?php echo $row->direccion_ocupacion; ?>" type="text" class="form-control" placeholder="Dirección" maxlength="100" >
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-3 rightspan" id="veintiuno">
                                    <label for="" class="form-label">Telefono</label>
                                    <input name="txtTelefonoOcupacion" type="text" value="<?php echo $row->telefono_ocupacion; ?>" class="form-control" placeholder="Telefono" maxlength="15" >
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-3 rightspan" id="veintidos">
                                    <i class="fa fa-whatsapp fa-lg" aria-hidden="true"></i>
                                    <input name="txtCelularWhatsapp" type="text" value="<?php echo $row->celular_whatsapp; ?>" class="form-control" placeholder="Whatsapp" maxlength="15" >
                                </div>

                                <div class="col-xs-12"><br/></div>

                                <div class="col-xs-6 col-sm-6 col-md-4  leftspan" id="one">
                                    <label for="" class="form-label">Acudiente</label>
                                    <input name="txtAcudiente" type="text" value="<?php echo $row->acudiente; ?>" class="form-control" placeholder="Acudiente" maxlength="100" >
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-4  leftspan" id="two">
                                    <label for="" class="form-label">Parentesco</label>
                                    <input name="txtParentesco" type="text" value="<?php echo $row->parentesco; ?>" class="form-control" placeholder="Parentesco" maxlength="45" >
                                </div>               
                                <div class="col-xs-6 col-sm-6 col-md-4  leftspan" id="three">
                                    <label for="" class="form-label">Teléfono</label>
                                    <input name="txtTelefonoAcudiente" type="text" value="<?php echo $row->telefono_acudiente; ?>" class="form-control" placeholder="Teléfono" maxlength="15" >
                                </div>

                                <div class="col-xs-12"><br/></div>

                                <div class="col-xs-6 col-sm-6 col-md-3  leftspan" id="three">
                                    <label for="" class="form-label">Redes sociales</label>
                                    <label class="radio-inline"><input type="radio" name="optRedes" value="twitter" <?php if ($row->red_social == 'twitter') echo "checked='checked'"; ?> ><i class="fa fa-twitter-square" aria-hidden="true"></i></label>
                                    <label class="radio-inline"><input type="radio" name="optRedes" value="facebook" <?php if ($row->red_social == 'facebook') echo "checked='checked'"; ?> ><i class="fa fa-facebook-official" aria-hidden="true"></i></label>
                                    <label class="radio-inline"><input type="radio" name="optRedes" value="instagram" <?php if ($row->red_social == 'instagram') echo "checked='checked'"; ?> ><i class="fa fa-instagram" aria-hidden="true"></i></label>                                  
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-9  leftspan" id="three">                                  
                                    <input name="txtDescRedes" type="text" value="<?php echo $row->descripcion_rs; ?>" class="form-control" placeholder="Dirección red social" maxlength="50" >
                                </div>

                                <div class="col-xs-12"><hr></div>

                                <div class="col-xs-6 col-sm-6 col-md-12  leftspan" id="three">                                  
                                    <label for="">Motivo de Consulta</label>
                                    <textarea class="form-control" rows="2" name="txtMotivoConsulta" id="txtMotivoConsulta" value="<?php echo $row->motivo_consulta; ?>" maxlength="800" ><?php echo $row->motivo_consulta; ?></textarea>
                                </div>

                                <div class="col-xs-12"><hr class="grueso"/></div>

                                <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="three">
                                    <label for=""><h4><strong>ANAMNESIS:</strong></h4></label>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>SI - NO</th>
                                                <th></th>
                                                <th>SI - NO</th>
                                                <th></th>
                                                <th>SI - NO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1.Tratamiento con medicación</td>
                                                <td>
                                                    <label class="radio-inline"><input type="radio" name="optTm" value="SI" <?php if ($row->tratamiento_medicacion == 'SI') echo "checked='checked'"; ?> ></label>
                                                    <label class="radio-inline"><input type="radio" name="optTm" value="NO" <?php if ($row->tratamiento_medicacion == 'NO') echo "checked='checked'"; ?> ></label>
                                                </td>
                                                <td>6.Sistema Respiratorio</td>
                                                <td>
                                                    <label class="radio-inline"><input type="radio" name="optSr" value="SI" <?php if ($row->sistema_respiratorio == 'SI') echo "checked='checked'"; ?> ></label>
                                                    <label class="radio-inline"><input type="radio" name="optSr" value="NO" <?php if ($row->sistema_respiratorio == 'NO') echo "checked='checked'"; ?> ></label>
                                                </td>
                                                <td>11.Portador VIH</td>
                                                <td>
                                                    <label class="radio-inline"><input type="radio" name="optPv" value="SI" <?php if ($row->portador_vih == 'SI') echo "checked='checked'"; ?> ></label>
                                                    <label class="radio-inline"><input type="radio" name="optPv" value="NO" <?php if ($row->portador_vih == 'NO') echo "checked='checked'"; ?> ></label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2.Sistema Inmunológico</td>
                                                <td>
                                                    <label class="radio-inline"><input type="radio" name="optSi" value="SI" <?php if ($row->sistema_inmunologico == 'SI') echo "checked='checked'"; ?> ></label>
                                                    <label class="radio-inline"><input type="radio" name="optSi" value="NO" <?php if ($row->sistema_inmunologico == 'NO') echo "checked='checked'"; ?> ></label>
                                                </td>
                                                <td>7.Sistema Cardiovascular</td>
                                                <td>
                                                    <label class="radio-inline"><input type="radio" name="optCv" value="SI" <?php if ($row->sistema_cardiovascular == 'SI') echo "checked='checked'"; ?> ></label>
                                                    <label class="radio-inline"><input type="radio" name="optCv" value="NO" <?php if ($row->sistema_cardiovascular == 'NO') echo "checked='checked'"; ?> ></label>
                                                </td>
                                                <td>12.Sida</td>
                                                <td>
                                                    <label class="radio-inline"><input type="radio" name="optSida" value="SI" <?php if ($row->sida == 'SI') echo "checked='checked'"; ?> ></label>
                                                    <label class="radio-inline"><input type="radio" name="optSida" value="NO" <?php if ($row->sida == 'NO') echo "checked='checked'"; ?> ></label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3.Sistema hematológico</td>
                                                <td>
                                                    <label class="radio-inline"><input type="radio" name="optSh" value="SI" <?php if ($row->sistema_hematologico == 'SI') echo "checked='checked'"; ?> ></label>
                                                    <label class="radio-inline"><input type="radio" name="optSh" value="NO" <?php if ($row->sistema_hematologico == 'NO') echo "checked='checked'"; ?> ></label>
                                                </td>
                                                <td>8.Diabetes</td>
                                                <td>
                                                    <label class="radio-inline"><input type="radio" name="optDiabetes" value="SI" <?php if ($row->diabetes == 'SI') echo "checked='checked'"; ?> ></label>
                                                    <label class="radio-inline"><input type="radio" name="optDiabetes" value="NO" <?php if ($row->diabetes == 'NO') echo "checked='checked'"; ?> ></label>
                                                </td>
                                                <td>13.Hipertención</td>
                                                <td>
                                                    <label class="radio-inline"><input type="radio" name="optHipertencion" value="SI" <?php if ($row->hipertencion == 'SI') echo "checked='checked'"; ?> ></label>
                                                    <label class="radio-inline"><input type="radio" name="optHipertencion" value="NO" <?php if ($row->hipertencion == 'NO') echo "checked='checked'"; ?> ></label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4.Sistema Endocrino</td>
                                                <td>
                                                    <label class="radio-inline"><input type="radio" name="optSe" value="SI" <?php if ($row->sistema_endocrino == 'SI') echo "checked='checked'"; ?> ></label>
                                                    <label class="radio-inline"><input type="radio" name="optSe" value="NO" <?php if ($row->sistema_endocrino == 'NO') echo "checked='checked'"; ?> ></label>
                                                </td>
                                                <td>9.Hepatitis</td>
                                                <td>
                                                    <label class="radio-inline"><input type="radio" name="optHepatitis" value="SI" <?php if ($row->hepatitis == 'SI') echo "checked='checked'"; ?> ></label>
                                                    <label class="radio-inline"><input type="radio" name="optHepatitis" value="NO" <?php if ($row->hepatitis == 'NO') echo "checked='checked'"; ?> ></label>
                                                </td>
                                                <td>14.Otras Patologías</td>
                                                <td>
                                                    <label class="radio-inline"><input type="radio" name="optOp" value="SI" <?php if ($row->otras_patologias == 'SI') echo "checked='checked'"; ?> ></label>
                                                    <label class="radio-inline"><input type="radio" name="optOp" value="NO" <?php if ($row->otras_patologias == 'NO') echo "checked='checked'"; ?> ></label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5.Sinusitis</td>
                                                <td>
                                                    <label class="radio-inline"><input type="radio" name="optSinusitis" value="SI" <?php if ($row->sinusitis == 'SI') echo "checked='checked'"; ?> ></label>
                                                    <label class="radio-inline"><input type="radio" name="optSinusitis" value="NO" <?php if ($row->sinusitis == 'NO') echo "checked='checked'"; ?> ></label>
                                                </td>
                                                <td>10.Fiebre Reumática</td>
                                                <td>
                                                    <label class="radio-inline"><input type="radio" name="optFr" value="SI" <?php if ($row->fiebre_reumatica == 'SI') echo "checked='checked'"; ?> ></label>
                                                    <label class="radio-inline"><input type="radio" name="optFr" value="NO" <?php if ($row->fiebre_reumatica == 'NO') echo "checked='checked'"; ?> ></label>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="30">
                                    <label for="">Observación</label>
                                    <textarea class="form-control" rows="2" name="txtObservacionAnamnesis" id="txtObservacionAnamnesis" maxlength="500" ><?php echo $row->observacion_anamnesis; ?></textarea>
                                </div>

                                <div class="col-xs-12"><hr class="grueso"/></div>

                                <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="30">
                                    <label for=""><h4><strong>EXAMEN ESTOMATOLOGICO:</strong></h4></label><br/>
                                    <label for="">&nbsp;&nbsp; A. TEJIDOS BLANDOS</label> <br/>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="active">
                                                <th>Estructuras</th>
                                                <th>Descripción Clínica</th>
                                                <th>Estructuras</th>
                                                <th>Descripción Clínica</th>                                        
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1.LABIOS</td>
                                                <td><input name="txtLabios" type="text" value="<?php echo $row->labios; ?>" class="form-control" placeholder="Labios" maxlength="100" ></td>
                                                <td>5.GLÁNDULAS SALIVALES</td>
                                                <td><input name="txtGs" type="text" value="<?php echo $row->glandulas_salivales; ?>" class="form-control" placeholder="Gladulas salivales" maxlength="100" ></td>
                                            </tr>
                                            <tr>
                                                <td>2.LENGUA</td>
                                                <td><input name="txtLengua" type="text" value="<?php echo $row->lengua; ?>" class="form-control" placeholder="Lengua" maxlength="100" ></td>
                                                <td>6.CARRILLOS</td>
                                                <td><input name="txtCarrillos" type="text" value="<?php echo $row->carrillos; ?>" class="form-control" placeholder="Carrillos" maxlength="100" ></td>
                                            </tr>
                                            <tr>
                                                <td>3.PALADAR</td>
                                                <td><input name="txtPaladar" type="text" value="<?php echo $row->paladar; ?>" class="form-control" placeholder="Paladar" maxlength="100" ></td>
                                                <td>7.MUCOSA ORAL</td>
                                                <td><input name="txtMo" type="text" value="<?php echo $row->mucosa_oral; ?>" class="form-control" placeholder="Mucosa Oral" maxlength="100" ></td>
                                            </tr>
                                            <tr>
                                                <td>4.PISO DE LA BOCA</td>
                                                <td><input name="txtPb" type="text" value="<?php echo $row->piso_boca; ?>" class="form-control" placeholder="Piso boca" maxlength="100" ></td>
                                                <td></td>
                                                <td></td>                                        
                                            </tr>                                                                                                                  
                                        </tbody>
                                    </table>                                  
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="30">
                                    <label for="">&nbsp;&nbsp; B. TEJIDOS DUROS</label> <br/>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="active">
                                                <th>Estructuras</th>
                                                <th>Descripción Clínica</th>                                        
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1.MAXILARES</td>
                                                <td><input name="txtMaxilares" type="text" value="<?php echo $row->maxilares; ?>" class="form-control" placeholder="Maxilares" maxlength="100" ></td>
                                            </tr>                                      
                                            <tr>
                                                <td>2.DIENTES</td>
                                                <td><input name="txtDientes" type="text" value="<?php echo $row->dientes; ?>" class="form-control" placeholder="Dientes" maxlength="100" ></td>
                                            </tr>                                                                                                                  
                                        </tbody>
                                    </table>                                  
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="30">                                  
                                    <table class="table table-bordered centrado">
                                        <TR class="active">
                                            <TH COLSPAN=2>Indice COPS</TH>
                                            <TH COLSPAN=2>Prótesis</TH>
                                            <TH COLSPAN=2>Higiene Oral</TH>
                                        </TR>                                    
                                        <TR>
                                            <TD>CARIADOS</TD> 
                                            <TD><input name="txtCariados" type="number" value="<?php echo $row->cariados; ?>" class="form-control" placeholder="Cariados" min="0" max="99" ></TD> 
                                            <TD>PRESECIA DE PRÓTESIS</TD> 
                                            <TD><input name="txtProtesis" type="number" value="<?php echo $row->protesis; ?>" class="form-control" placeholder="Protesis" min="0" max="99" ></TD> 
                                            <TD>HIGIENE ORAL</TD>
                                            <TD><label class="radio-inline"><input type="radio" name="optHo" value="B" <?php if ($row->higiene_oral == 'B') echo "checked='checked'"; ?> >B</label>
                                                <label class="radio-inline"><input type="radio" name="optHo" value="R" <?php if ($row->higiene_oral == 'R') echo "checked='checked'"; ?> >R</label>
                                                <label class="radio-inline"><input type="radio" name="optHo" value="M" <?php if ($row->higiene_oral == 'M') echo "checked='checked'"; ?> >M</label>
                                            </TD> 
                                        </TR>
                                        <TR>
                                            <TD>OBTURADOS</TD> 
                                            <TD><input name="txtObturados" type="number" value="<?php echo $row->obturados; ?>" class="form-control" placeholder="Obturados" min="0" max="99" ></TD> 
                                            <TD colspan="2" align="center">DESCRIPCIÓN</TD> 
                                            <TD>FRECUENCIA CEPILLADO</TD>
                                            <TD><label class="radio-inline"><input type="radio" name="optFc" value="1" <?php if ($row->frecuencia_cepillado == '1') echo "checked='checked'"; ?> >1</label>
                                                <label class="radio-inline"><input type="radio" name="optFc" value="2" <?php if ($row->frecuencia_cepillado == '2') echo "checked='checked'"; ?> >2</label>
                                                <label class="radio-inline"><input type="radio" name="optFc" value="3" <?php if ($row->frecuencia_cepillado == '3') echo "checked='checked'"; ?> >3</label>
                                            </TD>                                        

                                        </TR>
                                        <TR>
                                            <TD>PERDIDOS</TD> 
                                            <TD><input name="txtPerdidos" type="number" value="<?php echo $row->perdidos; ?>" class="form-control" placeholder="Perdidos" min="0" max="99" ></TD> 
                                            <TD colspan="2" rowspan="3"><textarea class="form-control" rows="5" name="txtDescripProtesis" id="txtDescripProtesis" maxlength="400" ><?php echo $row->descripcion_protesis; ?></textarea></TD>
                                            <TD>GRADO RIESGO</TD>
                                            <TD><label class="radio-inline"><input type="radio" name="optGr" value="A" <?php if ($row->grado_riesgo == 'A') echo "checked='checked'"; ?> >A</label>
                                                <label class="radio-inline"><input type="radio" name="optGr" value="M" <?php if ($row->grado_riesgo == 'M') echo "checked='checked'"; ?> >M</label>
                                                <label class="radio-inline"><input type="radio" name="optGr" value="B" <?php if ($row->grado_riesgo == 'B') echo "checked='checked'"; ?> >B</label>
                                            </TD>  
                                        </TR>
                                        <TR>
                                            <TD>SANOS</TD> 
                                            <TD><input name="txtSanos" type="number" value="<?php echo $row->sanos; ?>" class="form-control" placeholder="Sanos" min="0" max="99" ></TD>
                                            <TD>SEDA DENTAL</TD>
                                            <TD><label class="radio-inline"><input type="radio" name="optSd" value="SI" <?php if ($row->seda_dental == 'SI') echo "checked='checked'"; ?> >SI</label>
                                                <label class="radio-inline"><input type="radio" name="optSd" value="NO" <?php if ($row->seda_dental == 'NO') echo "checked='checked'"; ?> >NO</label>
                                            </TD>  
                                        </TR>
                                        <TR>
                                            <TD colspan="2"></TD>                                        
                                            <TD>PIGMENTACION</TD>
                                            <TD><label class="radio-inline"><input type="radio" name="optPigmentacion" value="SI" <?php if ($row->pigmentacion == 'SI') echo "checked='checked'"; ?> >SI</label>
                                                <label class="radio-inline"><input type="radio" name="optPigmentacion" value="NO" <?php if ($row->pigmentacion == 'NO') echo "checked='checked'"; ?> >NO</label>                                            
                                            </TD>
                                        </TR>
                                    </table>                                 
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="30">
                                    <TABLE class="table table-bordered derecha">
                                        <TR><TH class="active">Examen Pulpal</TH>
                                            <TD><input name="txtEp" type="text" value="<?php echo $row->examen_pulpal; ?>" class="form-control" placeholder="Examen pulpal" maxlength="300" ></TD> 
                                        </TR>                                    
                                        </TR>
                                        <TR><TH class="active">Tejodos Dentales</TH>
                                            <TD><input name="txtTd" type="text" value="<?php echo $row->tejidos_dentales; ?>" class="form-control" placeholder="Tejidos dentales" maxlength="300" ></TD> 
                                        </TR>
                                        <TR><TH class="active">Periodonto</TH>
                                            <TD><input name="txtPeriodonto" type="text" value="<?php echo $row->periodonto; ?>" class="form-control" placeholder="Periodonto" maxlength="300" ></TD>
                                        </TR>
                                        <TR><TH class="active">Oclusión</TH>
                                            <TD><input name="txtOclusion" type="text" value="<?php echo $row->oclusion; ?>" class="form-control" placeholder="Oclusión" maxlength="300" ></TD>
                                        </TR>
                                    </TABLE>                                  
                                </div>

                                <div class="col-xs-12"><hr class="grueso"/></div>

                                <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="three">
                                    <label for="">Observaciones</label>
                                    <textarea class="form-control" rows="2" name="txtObservacionesPaciente" id="txtObservacionesPaciente" maxlength="800" ><?php echo $row->observacion_paciente; ?></textarea>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="three"><hr class="grueso"></div>

                                <div class="clearfix">
                                    <div class="pull-right">
                                        <button type="submit" id="btnModificarP" class="btn btn-primary ">Modificar Paciente</button>&nbsp;
                                        <a 
                                            class="btn btn-default "
                                            href="<?php echo base_url('paciente/index') ?>">Cancelar</a>
                                    </div>
                                </div>

                            </div> <!-- fin row-->

                        </form>
                    </div>
                </div>
            </div>
        </div><!-- fin row datosPaciente-->
    <?php } ?>
    <!--HISTORIAS CLINICAS-->
    <br/>
    <div class="row" id="historias">
        <!--form historias clinicas-->
        <div class="col-md-6 col-sm-12 col-xs-12">
            <?php
                $this->load->view($frmVerHistorias)
            ?>
        </div>
        
        <!-- form tratamiento-->
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><strong>TRATAMIENTO Y PRESUPUESTO</strong><br/><small>Ver y editar el tratamiento y presupuesto para el paciente</small></h2>
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
                    <form class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Date Mask</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control" data-inputmask="'mask': '99/99/9999'">
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Phone mask</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control" data-inputmask="'mask' : '(999) 999-9999'">
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Custom Mask</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control" data-inputmask="'mask': '99-999999'">
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Serial Number</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control" data-inputmask="'mask' : '****-****-****-****-****-***'">
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">TaxID Mask</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control" data-inputmask="'mask' : '99-99999999'">
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Credit Card Mask</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control" data-inputmask="'mask' : '9999-9999-9999-9999'">
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Cancel</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div> <!-- FIN form tratamiento-->

    </div><!-- fin row HISTORIAS y TRATAMIENTO-->

</div> <!--fin div class-->

<?php
    $this->load->view($frmNewHistoria);
    $this->load->view($frmEditHistoria);
?>