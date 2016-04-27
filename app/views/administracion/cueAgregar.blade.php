@extends('administracion.layoutAd')

@section('head')
{{ HTML::style('sweetAlert/sweetalert.css') }}
{{ HTML::style('datepicker/css/bootstrap-datepicker3.standalone.css') }}
@stop

@section('title')
  Editar Sesión | Hemeroteca VHC
@stop

@section('body')
@stop

@section('content')

@include('administracion/btnAgEdCo')

<div class="row">
  <div class="col-md-12">
    <div class="form-horizontal" id="pnlAgregar" name="pnlAgregar" class="hidden" novalidate>
      <div id="lbltm" class="hidden">
          <h3><i class="fa fa-plus-circle text-primary"></i> Datos generales del cuestionario</h3>
          <label for="txtNombreS" class="control-label">Tema:&nbsp;&nbsp;</label><label id="temSel"></label>
      </div>
      <div id="pnl1" class="hidden">
        <h3><i class="fa fa-plus-circle text-primary"></i> Datos generales del cuestionario</h3>
        <h4><b>Definición del Tema</b></h4>
        <h5>Por favor verifique en el siguiente listado si el tema del cuestionario a ingresar existe, si existe seleccionelo y presione el boton <button class="btn btn-primary disabled">Aceptar</button>, en caso contrario presione el boton <button class="btn btn-primary disabled">Agregar</button> para agregar un tema nuevo.</h5>
          <div id="ComboInicio" class="form-group">
              <label for="txtNombreS" class="col-md-3 control-label">Temas existentes: </label>
                <div class="col-md-9" id="select">
                  <SELECT id="selCombo" size=1 class="form-control grisObscuro">
                  </SELECT>
                  <p class="text-danger formatoTexto14" id="spnNombre"> </p>
                  <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
                </div>
              </div>
              <div class="form-group">
                    <center><button id="btnTemaSiEx" class="btn btn-primary">Aceptar</button>
                    <button id="btnTemaNoEx" class="btn btn-primary">Agregar</button></center>
              <br>
              </div>
              <div id="Combo" class="form-group hidden">
              <center><h5 class="col-md-12"> El tema que selecciono sera el tema de su cuestionario.</h5></center>
                <div class="col-md-12" id="select">
                  <center><button id="temAceptar" class="btn btn-primary">Aceptar</button></center>
                  <p class="text-danger formatoTexto14" id="spnNombre"> </p>
                  <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
                </div>
              </div>
          </div>
      </div>

    <div class="hidden" id="lblSub">
      <label for="txtNombreS" class="control-label">Subtema:&nbsp;&nbsp;</label><label id="subSel"></label>
    </div>

    <div id="subtema" class="form-group hidden">
        <h4><b>Definición del Subtema</b></h4>
        <h5>Por favor verifique en el siguiente listado si el subtema del cuestionario a ingresar existe, si existe seleccionelo y presione el boton <button class="btn btn-primary disabled">Aceptar</button>, en caso contrario presione el boton <button class="btn btn-primary disabled">Agregar</button> para agregar un subtema nuevo.</h5>
      <div id="ComboInicio" class="form-group">
        <br><br>
        <label for="txtNombreS" class="col-md-3 control-label">Subtemas existentes: </label>
        <div class="col-md-7" id="select">
          <SELECT id="selComboSub" size=1 class="form-control grisObscuro">
          </SELECT>
          <p class="text-danger formatoTexto14" id="spnNombre"> </p>
          <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-12">
            <center><button id="btnTemaSiExsub" class="btn btn-primary">Aceptar</button>
            <button id="btnTemaNoExsub" class="btn btn-primary">Agregar</button></center>
        </div>
        <div id="subCombo" class="hidden">
        <br><br><br>
          <center><h5 class="col-md-12"> El subtema que selecciono sera el subtema de su cuestionario.</h5></center>
          <div class="col-md-12">
            <br>
            <center><button id="subAceptar" class="btn btn-primary">Aceptar</button></center>
            <p class="text-danger formatoTexto14" id="spnNombre"> </p>
            <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
          </div>
        </div>
      </div>
    </div>

    <div class="hidden" id="lblDg">
      <label class="control-label">Nombre del cuestionario:&nbsp;&nbsp;</label><label id="lblNombre"></label><br>
      <label class="control-label">Fecha de elaboración:&nbsp;&nbsp;</label><label id="lblFechaE"></label><br>
      <label class="control-label">Fecha de aplicación:&nbsp;&nbsp;</label><label id="lblFechaA"></label>
    </div>

    <div id="Nombre" class="hidden">
        <div class="form-group">
          <label for="txtNombre" class="col-md-3 control-label">*Nombre: </label>
          <div class="col-md-7">
            <input id="txtNombre" name="txtNombre" type="text" class="form-control grisObscuro" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+"  placeholder="*Nombre que tendra el cuestionario" required>
            <p class="text-danger formatoTexto14" id="spnNombre"> </p>
            <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
            <center><button id="btnGrdNmb" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button></center>
            <br>
          </div>
        </div>

      <div class="form-group hidden">
        <label for="txtActivot" class="col-md-3 control-label">Activo:</label>
        <div class="col-md-3">
          <select name="" id="datosActivo" class="form-control input-sm">
            <option value="1">Sí</option>
            <option value="0">No</option>
          </select>
        </div>
      </div>
    </div>

  <div id="FechaEla" class="hidden">
      <div class="form-group">
        <label for="txtFechaInicio" class="col-md-3 control-label">*La fecha de elaboración es la fecha actual: </label>
        <div class="col-md-2">
          <div class="input-group date" data-provide="datepicker">
            <input type="text" class="form-control" id="fechaEla" value="
<?php //Ejemplo curso PHP aprenderaprogramar.com
$time = time();
echo date("Y-m-d", $time);
?>" disabled>
            <div  id="calendario" class="input-group-addon hidden">
              <i class="fa fa-calendar"></i>
            </div>
          </div>
        </div>
        <div class="col-md-2"></div>
      </div>
      <div class="form-group">
        <div class=" col-md-3">
          <center>
            <button id="btnCaFe" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Cambiar Fecha</button>
          </center>
          <br>
        </div>
      </div>
      <div class="form-group">
        <div class=" col-md-12">
          <br>
          <center><button id="btnGrdFchEl" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button></center>
        </div>
      </div>
    </div>

    <div id="FechaApl" class="hidden">
      <div class="form-group">
        <label for="txtFechaInicio" class="col-md-3 control-label">*Elija fecha de aplicaión: </label>
        <div class="col-md-2">
          <div class="input-group date" data-provide="datepicker">
            <input type="text" class="form-control" id="txtFechaApl">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
          </div>
          <br>
        </div>
        <div class="form-group">
        <div class=" col-md-12">
          <br>
          <center><button id="btnGrdFchAp" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button></center>
          <br>
        </div>
      </div>
      </div>
        <div class="form-group">
          <div class=" col-md-12">
            <center>
              <button id="btnGuardarAg" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button>
              <button id="btnCancelarAg"  class="btn btn-danger"><i class="fa fa-times-circle"></i> Cancelar</button>
            </center>
          </div>
        </div>
    </div>

<!-- Inserción de preguntas -->
  <div class="hidden" id="agPre">
    <label for="txtNombreS" class="control-label">Número de preguntas del cuestionario:&nbsp;&nbsp;</label><label id="agPreNum"></label><br>
  </div>
  <div class="hidden" id="tipoPre">
    <label for="txtNombreS" class="control-label">Tipo de preguntas:&nbsp;&nbsp;</label><label id="tipoPreEle"></label><br>
  </div>

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
    <br><br>
  
  <!-- Inicio del formulairo para ingresar preguntas de opción múltiple y abiertas-->
  <div class="form-horizontal hidden" id="formselect" name="formselect" novalidate>
    <h3><i class="fa fa-question-circle text-success"></i> Agregar Pregunta</h3>
    <label for="txtNombreS" class=" control-label">¿De que tipo son las preguntas que desea capturar? </label>
      <div class="form-group">
        <div class="col-md-7" id="select">
          <SELECT id="selTipo" size=1 class="form-control grisObscuro"></SELECT>
          <p class="text-danger formatoTexto14" id="spnNombre"> </p>
          <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
        </div>
      <button id="btnTipo" class="btn btn-block btn-md botonNoactivo"><i class="fa fa-plus-circle"></i> Aceptar</button>
      </div>
  </div>

  <!-- formulario de preguntas con opción múltiple -->
  <div class="form-horizontal hidden" id="formopm" novalidate>
    <h2><i class="fa fa-plus-circle text-primary"></i> Agregar Pregunta</h2>
    <input type="hidden" id="txtCueId" value="">
    <div class="form-group">
      <div class="table-responsive" >
          <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr>
                <th class="col-md-11 text-center">Pregunta</th>
                <th class="col-md-1 text-center">Respuesta Correcta</th>
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
                <td>
                  <input id="txtOp" name="txtOp" type="text" class="form-control grisObscuro col-md-6" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+" disabled>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      <br> 
      <center><button id="btnGuardarPre" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Ingresar respuestas</button></center>
      <br><br>
      <form name="sendmail" method="get" action="" class="form-group hidden" id="pnlRes"> 
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
              <td><textarea rows="6" cols="100"></textarea></td>
              <td><input type="radio" id="resA1"required><span class="glyphicon glyphicon-ok text-success"></span>
              <input type="radio" id="resA2" required><span class="glyphicon glyphicon-remove text-danger" title="Inactivo"></span></td>
            </tr>
            <tr id="txtB" class="hidden">
              <td><i>B: </i></td>
              <td><textarea rows="6" cols="100"></textarea></td>
              <td><input type="radio" id="resB1"required><span class="glyphicon glyphicon-ok text-success"></span>
              <input type="radio" id="resB2" required><span class="glyphicon glyphicon-remove text-danger" title="Inactivo"></span></td>
            </tr>
            <tr id="txtC" class="hidden">
              <td><i>C: </i></td>
              <td><textarea rows="6" cols="100"></textarea></td>
              <td><input type="radio" id="resC1"required><span class="glyphicon glyphicon-ok text-success"></span>
              <input type="radio" id="resC2" required><span class="glyphicon glyphicon-remove text-danger" title="Inactivo"></span></td>
            </tr>
            <tr id="txtD" class="hidden">
              <td><i>D: </i></td>
              <td><textarea rows="6" cols="100"></textarea></td>
              <td><input type="radio" id="resD1"required><span class="glyphicon glyphicon-ok text-success"></span>
              <input type="radio" id="resD2" required><span class="glyphicon glyphicon-remove text-danger" title="Inactivo"></span></td>
            </tr>
            <tr id="txtE" class="hidden">
              <td><i>E: </i></td>
              <td><textarea rows="6" cols="100"></textarea></td>
              <td><input type="radio" id="resE1"required><span class="glyphicon glyphicon-ok text-success"></span>
              <input type="radio" id="resE2" required><span class="glyphicon glyphicon-remove text-danger" title="Inactivo"></span></td>
            </tr>
        </table> 
        <p class="text-danger formatoTexto14" id="spnNombre"> </p>
        <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
        <center>
          <button id="btnGuardarRes" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button>
        </center>
      </form>

      <div class="row" id="pnlInicio">
        <div class="col-md-12" align="center">
        </div>
      </div>

      <input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">
  </div><!--/Fin del contenido de opción múltiple-->

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

    <center><button id="btnPreAb" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button>
    <button id="btnCancelarAb"  class="btn btn-danger"><i class="fa fa-times-circle"></i> Cancelar</button></center>
  </div><!-- fin de formulairo de preguntas de opción múltiple -->
</div>

@include('administracion/cueEditar')
@include('administracion/cueConsulta')

@stop

@section('js')
{{HTML::script('sweetAlert/sweetalert.min.js')}}
{{HTML::script('js/administracion/cueEditar.js')}}
{{HTML::script('js/administracion/temAgregar.js')}}
{{HTML::script('js/administracion/preCues.js')}}
{{HTML::script('js/administracion/resPre.js')}}
{{HTML::script('js/administracion/botonesAgregar.js')}}

{{HTML::script('datepicker/js/bootstrap-datepicker.js')}}
@stop

@section('javascript')
  <script>
    $('#collapseSesiones').addClass('in');
    $('#liEditarSesion').addClass('activoBorde');
  </script>
@stop