<div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Form Elements</h3>
      </div>
      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                  </span>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form Design <small>different form elements</small></h2>
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
            <form  id="formNew" method="POST" action="<?php echo base_url('paciente/insert')?>">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-4  leftspan" id="one">
                        <label class="radio-inline"><input type="radio" name="optTipo" value="particular" checked>Particular</label>
                        <label class="radio-inline"><input type="radio" name="optTipo" value="convenio">Convenio</label>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-4  leftspan" id="two">
                        <label for="" class="form-label">Cual</label>
                        <input name="txtDescTipoPaciente" type="text" class="form-control" maxlength="150">
                    </div>               
                    <div class="col-xs-6 col-sm-6 col-md-4  leftspan" id="three">
                        <label for="" class="form-label">Fecha</label>
                        <input name="fechaIngreso" type="date" class="form-control" min="1910-01-01" max="2100-12-31" value="<?php echo date("Y-m-d");?>">
                    </div>

                    <div class="col-xs-12"><hr></div>

                    <div class="col-xs-6 col-sm-6 col-md-3 leftspan" id="five">
                        <label for="" class="form-label">Primer apellido</label>
                        <input name="txtApellido1" type="text" class="form-control" placeholder="primer apellido" required maxlength="45">
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 leftspan" id="six">
                        <label for="" class="form-label">Segundo apellido</label>
                        <input name="txtApellido2" type="text" class="form-control" placeholder="segundo apellido" maxlength="45">                                  
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 leftspan" id="seven">
                        <label for="" class="form-label">Nombres</label>
                        <input name="txtNombres" type="text" class="form-control" placeholder="nombres" required maxlength="100">
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 rightspan" id="eight">
                        <label for="" class="form-label">Doc. Identificación</label>
                        <input name="txtIdentificacion" id="identificacionNew" type="number" class="form-control" placeholder="Identificación" required min="0" max="999999999999999" onchange="verificarIdentificacion(this.value)">
                    </div>  

                    <div class="col-xs-12"><br/></div>

                    <div class="col-xs-6 col-sm-6 col-md-3 rightspan" id="diez">
                        <label for="" class="form-label">Fecha Nacimiento</label>
                        <input name="fechaNacimiento" type="date" class="form-control" min="1910-01-01" max="2100-12-31">
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 rightspan" id="once">
                        <label for="" class="form-label">Edad</label>
                        <input name="txtEdad" type="number" class="form-control" min="0" max="100">
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 rightspan" id="doce">
                        <label for="" class="form-label">Dirección</label>
                        <input name="txtDireccion" type="text" class="form-control" placeholder="Dirección" maxlength="200">
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 rightspan" id="trece">
                        <label for="" class="form-label">Celular</label>
                        <input name="txtCelular" type="text" class="form-control" placeholder="Celular" maxlength="15">                                  
                    </div>

                    <div class="col-xs-12"><br/></div>

                    <div class="col-xs-6 col-sm-6 col-md-4  leftspan" id="quince">
                        <label for="" class="form-label">Departamento</label>
                        <input name="txtDepartamento" type="text" class="form-control" placeholder="Departamento" maxlength="50">
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-4  leftspan" id="dieciseis">
                        <label for="" class="form-label">Municipio</label>
                        <input name="txtMunicipio" type="text" class="form-control" placeholder="Municipio" maxlength="50">
                    </div>               
                    <div class="col-xs-6 col-sm-6 col-md-4  leftspan" id="diecisite">
                        <label for="" class="form-label"><i class="fa fa-envelope fa-lg" aria-hidden="true"></i></label>
                        <input name="txtEmail" type="text" class="form-control" placeholder="Email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" maxlength="50">
                    </div>

                    <div class="col-xs-12"><br/></div>

                    <div class="col-xs-6 col-sm-6 col-md-3 rightspan" id="diecinuevo">
                        <label for="" class="form-label">Ocupación</label>
                        <input name="txtOcupacion" type="text" class="form-control" placeholder="Ocupación" maxlength="100">
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 rightspan" id="veinte">
                        <label for="" class="form-label">Dirección</label>
                        <input name="txtDireccionOcupacion" type="text" class="form-control" placeholder="Dirección" maxlength="100">
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 rightspan" id="veintiuno">
                        <label for="" class="form-label">Telefono</label>
                        <input name="txtTelefonoOcupacion" type="text" class="form-control" placeholder="Telefono" maxlength="15">
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 rightspan" id="veintidos">
                        <i class="fa fa-whatsapp fa-lg" aria-hidden="true"></i>
                        <input name="txtCelularWhatsapp" type="text" class="form-control" placeholder="Whatsapp" maxlength="15">
                    </div>

                    <div class="col-xs-12"><br/></div>

                    <div class="col-xs-6 col-sm-6 col-md-4  leftspan" id="one">
                        <label for="" class="form-label">Acudiente</label>
                        <input name="txtAcudiente" type="text" class="form-control" placeholder="Acudiente" maxlength="100">
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-4  leftspan" id="two">
                        <label for="" class="form-label">Parentesco</label>
                        <input name="txtParentesco" type="text" class="form-control" placeholder="Parentesco" maxlength="45">
                    </div>               
                    <div class="col-xs-6 col-sm-6 col-md-4  leftspan" id="three">
                        <label for="" class="form-label">Teléfono</label>
                        <input name="txtTelefonoAcudiente" type="text" class="form-control" placeholder="Teléfono" maxlength="15">
                    </div>

                    <div class="col-xs-12"><br/></div>

                    <div class="col-xs-6 col-sm-6 col-md-3  leftspan" id="three">
                        <label for="" class="form-label">Redes sociales</label>
                        <label class="radio-inline"><input type="radio" name="optRedes" value="twitter"><i class="fa fa-twitter-square" aria-hidden="true"></i></label>
                        <label class="radio-inline"><input type="radio" name="optRedes" value="facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i></label>
                        <label class="radio-inline"><input type="radio" name="optRedes" value="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></label>                                  
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-9  leftspan" id="three">                                  
                        <input name="txtDescRedes" type="text" class="form-control" placeholder="Dirección red social" maxlength="50">
                    </div>

                    <div class="col-xs-12"><hr></div>

                    <div class="col-xs-6 col-sm-6 col-md-12  leftspan" id="three">                                  
                        <label for="">Motivo de Consulta</label>
                        <textarea class="form-control" rows="2" name="txtMotivoConsulta" maxlength="800"></textarea>
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
                                  <label class="radio-inline"><input type="radio" name="optTm" value="SI"></label>
                                  <label class="radio-inline"><input type="radio" name="optTm" value="NO" checked></label>
                              </td>
                              <td>6.Sistema Respiratorio</td>
                              <td>
                                  <label class="radio-inline"><input type="radio" name="optSr" value="SI"></label>
                                  <label class="radio-inline"><input type="radio" name="optSr" value="NO" checked></label>
                              </td>
                              <td>11.Portador VIH</td>
                              <td>
                                  <label class="radio-inline"><input type="radio" name="optPv" value="SI"></label>
                                  <label class="radio-inline"><input type="radio" name="optPv" value="NO" checked></label>
                              </td>
                            </tr>
                            <tr>
                              <td>2.Sistema Inmunológico</td>
                              <td>
                                  <label class="radio-inline"><input type="radio" name="optSi" value="SI"></label>
                                  <label class="radio-inline"><input type="radio" name="optSi" value="NO" checked></label>
                              </td>
                              <td>7.Sistema Cardiovascular</td>
                              <td>
                                  <label class="radio-inline"><input type="radio" name="optCv" value="SI"></label>
                                  <label class="radio-inline"><input type="radio" name="optCv" value="NO" checked></label>
                              </td>
                              <td>12.Sida</td>
                              <td>
                                  <label class="radio-inline"><input type="radio" name="optSida" value="SI"></label>
                                  <label class="radio-inline"><input type="radio" name="optSida" value="NO" checked></label>
                              </td>
                            </tr>
                            <tr>
                              <td>3.Sistema hematológico</td>
                              <td>
                                  <label class="radio-inline"><input type="radio" name="optSh" value="SI"></label>
                                  <label class="radio-inline"><input type="radio" name="optSh" value="NO" checked></label>
                              </td>
                              <td>8.Diabetes</td>
                              <td>
                                  <label class="radio-inline"><input type="radio" name="optDiabetes" value="SI"></label>
                                  <label class="radio-inline"><input type="radio" name="optDiabetes" value="NO" checked></label>
                              </td>
                              <td>13.Hipertención</td>
                              <td>
                                  <label class="radio-inline"><input type="radio" name="optHipertencion" value="SI"></label>
                                  <label class="radio-inline"><input type="radio" name="optHipertencion" value="NO" checked></label>
                              </td>
                            </tr>
                            <tr>
                              <td>4.Sistema Endocrino</td>
                              <td>
                                  <label class="radio-inline"><input type="radio" name="optSe" value="SI"></label>
                                  <label class="radio-inline"><input type="radio" name="optSe" value="NO" checked></label>
                              </td>
                              <td>9.Hepatitis</td>
                              <td>
                                  <label class="radio-inline"><input type="radio" name="optHepatitis" value="SI"></label>
                                  <label class="radio-inline"><input type="radio" name="optHepatitis" value="NO" checked></label>
                              </td>
                              <td>14.Otras Patologías</td>
                              <td>
                                  <label class="radio-inline"><input type="radio" name="optOp" value="SI"></label>
                                  <label class="radio-inline"><input type="radio" name="optOp" value="NO" checked></label>
                              </td>
                            </tr>
                            <tr>
                              <td>5.Sinusitis</td>
                              <td>
                                  <label class="radio-inline"><input type="radio" name="optSinusitis" value="SI"></label>
                                  <label class="radio-inline"><input type="radio" name="optSinusitis" value="NO" checked></label>
                              </td>
                              <td>10.Fiebre Reumática</td>
                              <td>
                                  <label class="radio-inline"><input type="radio" name="optFr" value="SI"></label>
                                  <label class="radio-inline"><input type="radio" name="optFr" value="NO" checked></label>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="30">
                        <label for="">Observación</label>
                        <textarea class="form-control" rows="2" name="txtObservacionAnamnesis" maxlength="500"></textarea>
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
                              <td><input name="txtLabios" type="text" class="form-control" placeholder="Labios" maxlength="100"></td>
                              <td>5.GLÁNDULAS SALIVALES</td>
                              <td><input name="txtGs" type="text" class="form-control" placeholder="Gladulas salivales" maxlength="100"></td>
                            </tr>
                            <tr>
                              <td>2.LENGUA</td>
                              <td><input name="txtLengua" type="text" class="form-control" placeholder="Lengua" maxlength="100"></td>
                              <td>6.CARRILLOS</td>
                              <td><input name="txtCarrillos" type="text" class="form-control" placeholder="Carrillos" maxlength="100"></td>
                            </tr>
                            <tr>
                              <td>3.PALADAR</td>
                              <td><input name="txtPaladar" type="text" class="form-control" placeholder="Paladar" maxlength="100"></td>
                              <td>7.MUCOSA ORAL</td>
                              <td><input name="txtMo" type="text" class="form-control" placeholder="Mucosa Oral" maxlength="100"></td>
                            </tr>
                            <tr>
                              <td>4.PISO DE LA BOCA</td>
                              <td><input name="txtPb" type="text" class="form-control" placeholder="Piso boca" maxlength="100"></td>
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
                              <td><input name="txtMaxilares" type="text" class="form-control" placeholder="Maxilares" maxlength="100"></td>                                        
                            </tr>                                      
                            <tr>
                              <td>2.DIENTES</td>
                              <td><input name="txtDientes" type="text" class="form-control" placeholder="Dientes" maxlength="100"></td>
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
                              <TD><input name="txtCariados" type="number" class="form-control" placeholder="Cariados" min="0" max="99"></TD> 
                              <TD>PRESECIA DE PRÓTESIS</TD> 
                              <TD><input name="txtProtesis" type="number" class="form-control" placeholder="Protesis" min="0" max="99"></TD> 
                              <TD>HIGIENE ORAL</TD>
                              <TD><label class="radio-inline"><input type="radio" name="optHo" value="B">B</label>
                                  <label class="radio-inline"><input type="radio" name="optHo" value="R">R</label>
                                  <label class="radio-inline"><input type="radio" name="optHo" value="M">M</label>
                              </TD> 
                          </TR>
                          <TR>
                              <TD>OBTURADOS</TD> 
                              <TD><input name="txtObturados" type="number" class="form-control" placeholder="Obturados" min="0" max="99"></TD> 
                              <TD colspan="2" align="center">DESCRIPCIÓN</TD> 
                              <TD>FRECUENCIA CEPILLADO</TD>
                              <TD><label class="radio-inline"><input type="radio" name="optFc" value="1">1</label>
                                  <label class="radio-inline"><input type="radio" name="optFc" value="2">2</label>
                                  <label class="radio-inline"><input type="radio" name="optFc" value="3">3</label>
                              </TD>                                        

                          </TR>
                          <TR>
                              <TD>PERDIDOS</TD> 
                              <TD><input name="txtPerdidos" type="number" class="form-control" placeholder="Perdidos" min="0" max="99"></TD> 
                              <TD colspan="2" rowspan="3"><textarea class="form-control" rows="5" name="txtDescripProtesis" maxlength="400"></textarea></TD>
                              <TD>GRADO RIESGO</TD>
                              <TD><label class="radio-inline"><input type="radio" name="optGr" value="A">A</label>
                                  <label class="radio-inline"><input type="radio" name="optGr" value="M">M</label>
                                  <label class="radio-inline"><input type="radio" name="optGr" value="B">B</label>
                              </TD>  
                          </TR>
                          <TR>
                              <TD>SANOS</TD> 
                              <TD><input name="txtSanos" type="number" class="form-control" placeholder="Sanos" min="0" max="99"></TD>
                              <TD>SEDA DENTAL</TD>
                              <TD><label class="radio-inline"><input type="radio" name="optSd" value="SI">SI</label>
                                  <label class="radio-inline"><input type="radio" name="optSd" value="NO">NO</label>                                            
                              </TD>  
                          </TR>
                          <TR>
                              <TD colspan="2"></TD>                                        
                              <TD>PIGMENTACION</TD>
                              <TD><label class="radio-inline"><input type="radio" name="optPigmentacion" value="SI">SI</label>
                                  <label class="radio-inline"><input type="radio" name="optPigmentacion" value="NO">NO</label>                                            
                              </TD>
                          </TR>
                      </table>                                 
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="30">
                        <TABLE class="table table-bordered derecha">
                          <TR><TH class="active">Examen Pulpal</TH>
                              <TD><input name="txtEp" type="text" class="form-control" placeholder="Examen pulpal" maxlength="300"></TD> 
                          </TR>                                    
                          </TR>
                          <TR><TH class="active">Tejodos Dentales</TH>
                              <TD><input name="txtTd" type="text" class="form-control" placeholder="Tejidos dentales" maxlength="300"></TD> 
                          </TR>
                          <TR><TH class="active">Periodonto</TH>
                              <TD><input name="txtPeriodonto" type="text" class="form-control" placeholder="Periodonto" maxlength="300"></TD> 
                          </TR>
                          <TR><TH class="active">Oclusión</TH>
                              <TD><input name="txtOclusion" type="text" class="form-control" placeholder="Oclusión" maxlength="300"></TD>
                          </TR>
                        </TABLE>                                  
                    </div>

                    <div class="col-xs-12"><hr class="grueso"/></div>

                    <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="three">
                        <label for="">Observaciones</label>
                        <textarea class="form-control" rows="2" name="txtObservacionesPaciente" maxlength="800"></textarea>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12  leftspan" id="three"><hr class="grueso"></div>
                    
                    <div class="clearfix">
                        <div class="pull-right">
                            <button type="submit" id="btnModificarP" class="btn btn-primary ">Modificar Paciente</button>&nbsp;
                            <a 
                                class="btn btn-default "
                                href="<?php echo base_url('paciente/index')?>">Cancelar</a>
                        </div>
                    </div>

                </div> <!-- fin row-->
                    
            </form>
          </div>
        </div>
      </div>
    </div>      
</div>
