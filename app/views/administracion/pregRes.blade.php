<!-- Inserción de preguntas -->
  <div class="hidden" id="tipoPre">
    <label for="txtNombreS" class="control-label">Tipo de preguntas:&nbsp;&nbsp;</label><label id="tipoPreEle"></label><br>
    <button id="btnRegresarTipo" class="btn btn-success hidden"><i class="fa fa-chevron-left" aria-hidden="true"></i> Regresar</button>
  </div>
  <div class="hidden" id="agPre">
    <label for="txtNombreS" class="control-label">Número de preguntas del cuestionario:&nbsp;&nbsp;</label><label id="agPreNum"></label><br>
    <button id="btnRegresarNumero" class="btn btn-success hidden"><i class="fa fa-chevron-left" aria-hidden="true"></i> Regresar</button>
  </div>
  <div class="hidden" id="pre">
    <label for="txtNombreS" class="control-label" id="preAg">&nbsp;&nbsp;</label><label id="resCo"></label><br>
    <button id="btnRegresarRes" class="btn btn-success hidden"><i class="fa fa-chevron-left" aria-hidden="true"></i> Regresar</button>
  </div>

  <!-- Inicio del formulairo para ingresar preguntas de opción múltiple y abiertas-->
  <div class="form-horizontal hidden" id="formselect" name="formselect" novalidate>
    <h3><i class="fa fa-question-circle text-success"></i> Agregar Pregunta</h3>
    <label for="txtNombreS" class=" control-label">¿De que tipo son las preguntas que desea capturar? </label>
      <div class="form-group">
        <div class="col-md-5" id="select">
          <SELECT id="selTipo" size=1 class="form-control grisObscuro"></SELECT>
          <p class="text-danger formatoTexto14" id="spnNombre"> </p>
          <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
        </div>
        <br><br><br>
        <div class="col-md-4">
          <center>
            <button id="btnTipo" class="btn btn-block btn-md botonNoactivo"><i class="fa fa-plus-circle"></i> Aceptar</button>
          </center>
        </div>
      </div>
  </div>
    <br><br>

  <!-- Fomulario para ingresar el número de preguntas que tendra el cuestionario -->
  <div class="col-md-12">
    <div class="form-group hidden" id="numPreC">
      <br><br>
      <label for="selcanpre" class="col-md-6 control-label"> Cuantas preguntas contendra el cuestionario:</label>
      <div class="col-md-6">
        <input id="txtNumPre" type="text" class="form-control grisObscuro" pattern="1234567890"  placeholder="*Ingrese el número de preguntas que tendra su cuestionario" required> 
      </div>
      <div class="col-md-4">
      </div>
      <div class="col-md-4">
        <br>
        <button id="btnAceptarC"  class="btn btn-block btn-md botonNoactivo"><i class="fa fa-plus-circle"></i> Aceptar</button>
      </div>
    </div>
  </div>

  <!-- formulario de preguntas con opción múltiple -->
  <div class="hidden" id="formopm" novalidate>
    <h2><i class="fa fa-plus-circle text-primary"></i> Agregar Pregunta</h2>
    <input type="hidden" id="txtCueId" value="">
    <div class="form-group">
      <div class="table-responsive" >
          <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr>
                <th class="col-md-11 text-center">Pregunta</th>
                <th class="col-md-1 text-center hidden" id="col2">Respuesta Correcta</th>
              </tr>
            </thead>
            <tbody id="tbodyConsulta">
              <tr>
                <td>
                  <input id="txtPreg" name="txtPreg" type="text" class="form-control grisObscuro col-md-6" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+"  placeholder="*Ingrese pregunta" required>
                  <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
                  <div class="form-group hidden">
                    <label class="col-md-3 control-label">Activo:</label>
                    <div class="col-md-2">
                      <select name="" id="preAc" class="form-control input-sm">
                        <option value="1" selected>Sí</option>
                      </select>
                    </div>
                  </div>
                </td>
                <td><!-- codigo para mostrar la opción correcta -->
                  <input id="txtOpA" name="txtOp" type="text" class="form-control grisObscuro col-md-1 hidden" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+">
                  <input id="txtOpB" name="txtOp" type="text" class="form-control grisObscuro col-md-1 hidden" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+">
                  <input id="txtOpC" name="txtOp" type="text" class="form-control grisObscuro col-md-1 hidden" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+">
                  <input id="txtOpD" name="txtOp" type="text" class="form-control grisObscuro col-md-1 hidden" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+">
                  <input id="txtOpE" name="txtOp" type="text" class="form-control grisObscuro col-md-1 hidden" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+">
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      <br> 
       <center>
        <button id="btnGuardarPre" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Guardar Pregunta</button>
        <button id="btnModificarPre" class="btn btn-warning hidden"><i class="fa fa-floppy-o"></i> Modificar Pregunta</button>
        <button id="btnIngresarRes" class="btn btn-success hidden"><i class="fa fa-floppy-o"></i> Ingresar respuestas</button>
      </center>
      <br><br>
      <div name="sendmail" method="get" class="form-group " id="pnlRes"> 
        ¿Cuantas respuestas contendra tu pregunta?:
        <select name="numObject" onChange="howMany(this.form)" id="slctRes"> 
          <option value="0" selected>  </option> 
          <option value="1"> 1 </option> 
          <option value="2"> 2 </option> 
          <option value="3"> 3 </option> 
          <option value="4"> 4 </option> 
          <option value="5"> 5 </option> 
        </select> 
        <br>
        <table class="table table-striped table-hover table-bordered"> 
          <thead>
            <tr>
              <th class="col-md-1 text-center">Opción</th>
              <th class="col-md-9 text-center">Respuesta</th>
              <th class="col-md-2 text-center">Seleccione la opción correcta</th>
            </tr>
          </thead>
          <br>
            <tr id="txtA" class="hidden">
              <td><i>A: </i></td>
              <td><textarea rows="6" cols="100" id="txtResA"></textarea></td>
              <td><input type="checkbox" value="resA1" id="resA1"><span class="glyphicon glyphicon-ok text-success" ></span>
              <input type="checkbox" value="resA2" id="resA2"><span class="glyphicon glyphicon-remove text-danger" ></span></td>
              <div class="form-group hidden">
                <label class="col-md-3 control-label">Activo:</label>
                <div class="col-md-2">
                  <select name="" id="resAc1" class="form-control input-sm">
                    <option value="1" selected>Sí</option>
                  </select>
                </div>
              </div>
            </tr>
            <tr id="txtB" class="hidden">
              <td><i>B: </i></td>
              <td><textarea rows="6" cols="100" id="txtResB"></textarea></td>
              <td><input type="checkbox" value="resB1" id="resB1"><span class="glyphicon glyphicon-ok text-success"></span>
              <input type="checkbox" value="resB2" id="resB2" ><span class="glyphicon glyphicon-remove text-danger"></span></td>
              <div class="form-group hidden">
                <label class="col-md-3 control-label">Activo:</label>
                <div class="col-md-2">
                  <select name="" id="resAc2" class="form-control input-sm">
                    <option value="1" selected>Sí</option>
                  </select>
                </div>
              </div>
            </tr>
            <tr id="txtC" class="hidden">
              <td><i>C: </i></td>
              <td><textarea rows="6" cols="100" id="txtResC"></textarea></td>
              <td><input type="checkbox" value="resC1" id="resC1"><span class="glyphicon glyphicon-ok text-success"></span>
              <input type="checkbox" value="resC2" id="resC2"><span class="glyphicon glyphicon-remove text-danger"></span></td>
              <div class="form-group hidden">
                <label class="col-md-3 control-label">Activo:</label>
                <div class="col-md-2">
                  <select name="" id="resAc3" class="form-control input-sm">
                    <option value="1" selected>Sí</option>
                  </select>
                </div>
              </div>
            </tr>
            <tr id="txtD" class="hidden">
              <td><i>D: </i></td>
              <td><textarea rows="6" cols="100" id="txtResD"></textarea></td>
              <td><input type="checkbox" value="resD1" id="resD1"><span class="glyphicon glyphicon-ok text-success"></span>
              <input type="checkbox" value="resD2" id="resD2"><span class="glyphicon glyphicon-remove text-danger"></span></td>
              <div class="form-group hidden">
                <label class="col-md-3 control-label">Activo:</label>
                <div class="col-md-2">
                  <select name="" id="resAc4" class="form-control input-sm">
                    <option value="1" selected>Sí</option>
                  </select>
                </div>
              </div>
            </tr>
            <tr id="txtE" class="hidden">
              <td><i>E: </i></td>
              <td><textarea rows="6" cols="100" id="txtResE"></textarea></td>
              <td><input type="checkbox" value="resE1" id="resE1"><span class="glyphicon glyphicon-ok text-success"></span>
              <input type="checkbox" value="resE2" id="resE2"><span class="glyphicon glyphicon-remove text-danger"></span></td>
              <div class="form-group hidden">
                <label class="col-md-3 control-label">Activo:</label>
                <div class="col-md-2">
                  <select name="" id="resAc5" class="form-control input-sm">
                    <option value="1" selected>Sí</option>
                  </select>
                </div>
              </div>
            </tr>
        </table> 
        <p class="text-danger formatoTexto14" id="spnNombre"> </p>
        <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
        <center> 
          <button id="btnSigPre" class="btn btn-info">Siguiente <i class="fa fa-chevron-right" aria-hidden="true"></i>
          </button>
        </center>
        <center>
          <button id="btnGuardarRes" class="btn btn-primary hidden"><i class="fa fa-floppy-o"></i> Guardar</button>
          <button id="btnCancelarRes"  class="btn btn-danger hidden"><i class="fa fa-times-circle"></i> Cancelar</button>
        </center>
      </div>

      <div class="row" id="pnlInicio">
        <div class="col-md-12" align="center">
        </div>
      </div>

      <input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">
  </div>
  <!--______________________________Fin del contenido de opción múltiple______________________________-->

  <!--________________________________Formulairo de preguntas abiertas________________________________-->
  <div class="form-horizontal hidden" id="formprea" novalidate>
    <div class="form-group">
        <div class="col-md-8">
          <label for="txtNombreS" class="control-label">Capturar pregunta abierta: </label>
        </div>
        <div class="col-md-8">
          <input id="txtAbierta" type="text" class="form-control grisObscuro" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+"  placeholder="*Ingrese pregunta" required>
          <p class="text-danger formatoTexto14" id="spnNombre"> </p>
          <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
        </div>
    </div>
    
    <center> 
      <button id="btnSigAb" class="btn btn-primary hidden"><i class="fa fa-floppy-o"></i> Guardar</button>
    </center>

    <center><button id="btnPreAb" class="btn btn-primary hidden"><i class="fa fa-floppy-o"></i> Guardar</button>
    <button id="btnCancelarAb"  class="btn btn-danger hidden"><i class="fa fa-times-circle"></i> Cancelar</button></center>
  </div><!-- fin de formulairo de preguntas de opción múltiple -->