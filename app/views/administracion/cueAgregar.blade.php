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
  <div class="col-md-10">
    <div class="form-horizontal" id="pnlAgregar" name="pnlAgregar" novalidate>
      <div id="lbltm" class="hidden">
          <label for="txtNombreS" class="control-label">Tema: </label><label id="temSel"></label>
      </div>
      <div id="pnl1" class="hidden">
        <h3><i class="fa fa-plus-circle text-primary"></i> Agregar datos generales del cuestionario</h3>
        <br>
        <div class="col-md-3"></div>
        <h5 class="col-md-8">*Por favor verifique en el siguiente listado si el tema del cuestionario a ingresar existe.</h5>
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
              <br><br>
              </div>
              <div id="Combo" class="form-group hidden">
              <h5 class="col-md-12"> El tema que eselecciono sera el tema de su cuestionario.</h5>
                <div class="col-md-12" id="select">
                  <button id="temAceptar" class="btn btn-primary">Aceptar</button>
                  <button id="btnTema" class="btn btn-primary col-md-2"><i class="fa fa-plus-circle"></i> Agregar tema</button>
                  <p class="text-danger formatoTexto14" id="spnNombre"> </p>
                  <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
                </div>
              </div>
          </div>
      </div>

    <div class="hidden" id="lblSub">
      <label for="txtNombreS" class="control-label">Subtema: </label><label id="subSel"></label>
    </div>

    <div id="subtema" class="form-group hidden">
      <center><h4>Verifique si el Subtema existe, en caso de no existir debera agregarlo</h4></center>
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
            <button id="btnTemaSiExsub" class="btn btn-primary">Aceptar</button>
            <button id="btnTemaNoExsub" class="btn btn-primary">Agregar</button>
        </div>
        <div id="subCombo" class="hidden">
        <br><br><br>
          <label for="txtSubTema" class="col-md-12 control-label">El Subtema seleccionado sera usado para el cuestionaio a ingresar</label>
          <div class="col-md-12">
            <br>
            <button id="subAceptar" class="btn btn-primary">Aceptar</button>
            <p class="text-danger formatoTexto14" id="spnNombre"> </p>
            <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
          </div>
        </div>
      </div>
    </div>

      <div id="dg" class="hidden">
        <div class="form-group">
          <label for="txtNombre" class="col-md-3 control-label">*Nombre: </label>
          <div class="col-md-7">
            <input id="txtNombre" name="txtNombre" type="text" class="form-control grisObscuro" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+"  placeholder="*Nombre que tendra el cuestionario" required>
            <p class="text-danger formatoTexto14" id="spnNombre"> </p>
            <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
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

        <div class="form-group">
          <label for="txtFechaInicio" class="col-md-3 control-label"><br>*Fecha de elaboración: </label>
          <div class="col-md-6">
          <label for="txtFechaInicio" class=" control-label">*Fecha Actual: </label>
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
          <div class=" col-md-3">
            <center>
            <label for="txtFechaInicio" class=" control-label">*Cambiar la fecha</label>
              <button id="btnCaFe" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Cambiar</button>
            </center>
            <br>
          </div>
        </div>

        <div class="form-group" id="groupNueva2">
          <label for="txtFechaInicio" class="col-md-3 control-label">*Fecha de aplicación: </label>
          <div class="col-md-5">
            <div class="input-group date" data-provide="datepicker">
              <input type="text" class="form-control" id="txtFechaApl">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
            </div>
            <br>
              <center>
                <button id="btnGuardarAg" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button>
                <button id="btnCancelarAg"  class="btn btn-danger"><i class="fa fa-times-circle"></i> Cancelar</button>
              </center>
          </div>
        </div>
      </div>

<!-- Inserción de preguntas -->
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
      <br><br><br><br>
    <!-- Inicio del formulairo para ingresar preguntas de opción múltiple y abiertas-->
    <div class="form-horizontal hidden" id="formselect" name="formselect" novalidate>
      <h3><i class="fa fa-question-circle text-success"></i> Agregar Pregunta</h3>
      <label for="txtNombreS" class=" control-label">¿De que tipo son las preguntas que desea capturar? </label>
        <div class="form-group">
          <div class="col-md-8">
            <p class="text-danger formatoTexto14" id="spnNombre"> </p>
            <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
            <input id="chkAbierta" type="checkbox" name="transporte"  value="1" onClick="chkA()">  Abierta 
            <br>
            <input id="chkOpMul" type="checkbox" name="transporte" value="2" onClick="chkO()">  Opción múltiple
            <br>
            <input id="chkMix" type="checkbox" name="transporte" value="3" onClick="chkM()">  Mixta
          </div>
        </div>
    </div>

    <!-- formulario de preguntas con opción múltiple -->
    <div class="form-horizontal hidden" id="formpom" novalidate>
      <h2><i class="fa fa-plus-circle text-primary"></i> Agregar Pregunta</h2>
      <input type="hidden" id="txtCueId" value="">
      <div class="form-group">
        <label for="txtNombreS" class=" control-label">Pregunta: </label>
        <br> 
        <input id="txtPreg" name="txtPreg" type="text" class="form-control grisObscuro" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+"  placeholder="*Ingrese pregunta" required>
        <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
        <div class="form-group hidden">
        <label class="col-md-3 control-label">Activo:</label>
        <div class="col-md-2">
          <select name="" id="preAc" class="form-control input-sm">
            <option value="1" selected>Sí</option>
          </select>
        </div>
      </div>
        <br><br>
        <center><button id="btnGuardarPre" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Ingresar respuestas</button></center>
        <br><br>
        <form name="sendmail" method="get" action="" class="form-group hidden" id="pnlRes"> 
          ¿Cuantas respuestas contendra tu pregunta?:
          <select name="numObject" onChange="howMany(this.form)" id="slctRes"> 
            <option value="" selected>  </option> 
            <option value="1"> 1 </option> 
            <option value="2"> 2 </option> 
            <option value="3"> 3 </option> 
            <option value="4"> 4 </option> 
            <option value="5"> 5 </option> 
          </select> 
          <P>
          <table> 
            <label for="txtNombreS" class=" control-label">Ingrese respuestas</label>
            <br><br>
              <tr>
                <td id="myemailtextbox"><i> Respuesta: </i> <textarea name="comentarios" rows="8" cols="100"></textarea><br><br></td>
              </tr>
          </table> 
          <p class="text-danger formatoTexto14" id="spnNombre"> </p>
          <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
          <center>
            <button id="btnGuardarRes" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button>
            <button id="btnCancelarPre"  class="btn btn-danger"><i class="fa fa-times-circle"></i> Cancelar</button>
          </center>
        </form>

        <div class="row" id="pnlInicio">
          <div class="col-md-12" align="center">
          </div>
        </div>

        <input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">
    </div>  <!--/columna10 contenido-->
      <!-- Formulairo de preguntas abiertas-->
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

      <center><button id="btnGuardarAg" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button>
      <button id="btnCancelarAg"  class="btn btn-danger"><i class="fa fa-times-circle"></i> Cancelar</button></center>
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

{{HTML::script('datepicker/js/bootstrap-datepicker.js')}}
@stop

@section('javascript')
  <script>
    $('#collapseSesiones').addClass('in');
    $('#liEditarSesion').addClass('activoBorde');
  </script>
@stop