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
<div>
  <div class="row">
    <center><h2><i class="fa fa-newspaper-o text-primary"></i> Cuestionarios</h2></center>
    <center><h3><i class="fa fa-plus-circle text-primary"></i> Agregar</h3></center>
    <br><br>
    <div class="col-md-4">
      <button id="btnAgregar"  class="btn btn-block btn-md botonNoactivo"><i class="fa fa-plus-circle"></i> Agregar</button>
    </div>
    <div class="col-md-4">
      <button id="btnEditar"  class="btn btn-block btn-md botonNoactivo"><i class="fa fa-pencil-square-o"></i> Editar</button>
    </div>
    <div class="col-md-4">
      <button id="btnConsulta" class="btn btn-block btn-md botonNoactivo"><i class="fa fa-th-list"></i> Consultar</button>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-10">
    <div class="form-horizontal hidden" id="pnlAgregar" name="form" novalidate>
    <h2><i class="fa fa-plus-circle text-primary"></i> Agregar datos generales de cuestionario</h2>
      <div class="form-group" id="groupNueva2">
        <label for="txtFechaInicio" class="col-md-3 control-label">*Fecha de aplicación: </label>
        <div class="col-md-5">
          <div class="input-group date" data-provide="datepicker">
            <input type="text" class="form-control" id="txtFechaApl">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group" id="groupNueva2">
        <label for="txtFechaInicio" class="col-md-3 control-label">*Fecha de elaboración: </label>
        <div class="col-md-5">
          <div class="input-group date control-label" data-provide="datepicker" id="fechaEla">
          <label for="txtFechaInicio" class="col-md-3 control-label">12/03/2016 </label>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="txtNombreS" class="col-md-3 control-label">*Tema: </label>
        <div class="col-md-8" id="select">
          <SELECT id="selCombo" size=1 class="form-control grisObscuro">
          </SELECT>
          <p class="text-danger formatoTexto14" id="spnNombre"> </p>
          <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="txtSubTema" class="col-md-3 control-label">*Subtema: </label>
        <div class="col-md-8">
          <input id="txtSubTema" name="txtSubTema" type="text" class="form-control grisObscuro" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+"  placeholder="*SubTema de donde se obtendrá la información" required>
          <p class="text-danger formatoTexto14" id="spnNombre"> </p>
          <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="txtNombre" class="col-md-3 control-label">*Nombre: </label>
        <div class="col-md-8">
          <input id="txtNombre" name="txtNombre" type="text" class="form-control grisObscuro" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+"  placeholder="*Nombre que tendra el cuestionario" required>
          <p class="text-danger formatoTexto14" id="spnNombre"> </p>
          <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
        </div>
      </div>

      <div class="form-group hidden">
        <label for="txtActivo" class="col-md-3 control-label">Activo:</label>
        <div class="col-md-2">
          <select name="" id="datosActivo" class="form-control input-sm">
            <option value="1">Sí</option>
            <option value="0">No</option>
          </select>
        </div>
      </div>

      <center><button id="btnGuardarAg" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button>
      <button id="btnCancelarAg"  class="btn btn-danger"><i class="fa fa-times-circle"></i> Cancelar</button></center>
    </div>
    <br><br>

    <!-- Inicio del formulairo para ingresar preguntas de opción múltiple y abiertas-->
    <div class="form-horizontal hidden" id="formselect" name="formSelect" novalidate>
      <h2><i class="fa fa-question-circle text-success"></i> Agregar Pregunta</h2>
      <label for="txtNombreS" class=" control-label">¿Qué tipo de pregunta deseas capturar? </label>
        <div class="form-group">
          <div class="col-md-8">
            <p class="text-danger formatoTexto14" id="spnNombre"> </p>
            <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
            <input id="chkAbierta" type="checkbox" name="transporte"  value="1" onClick="chkA()">  Abierta 
            <br>
            <input id="chkOpMul" type="checkbox" name="transporte" value="1" onClick="chkO()">  Opción múltiple
          </div>
        </div>
    </div>

    <div class="form-group hidden">
      <label for="selcanpre" class="col-md-4 control-label">Activo:</label>
      <div class="col-md-7">
        <select name="" id="txtActivo" class="form-control input-sm">
          <option value="1">Sí</option>
          <option value="0">No</option>
        </select>
      </div>
    </div>

    <!-- formulario de preguntas con opción múltiple -->
    <div class="form-horizontal hidden" id="formpom" novalidate>
      <h2><i class="fa fa-plus-circle text-primary"></i> Agregar Pregunta</h2>
      <div class="form-group">
        <label for="txtNombreS" class=" control-label">Pregunta: </label>
        <br> 
        <input id="txtpreg" name="txtpreg" type="text" class="form-control grisObscuro" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+"  placeholder="*Ingrese pregunta" required>
        <br><br>

        <div class="form-group">
            <div class="col-md-8">
              <label for="txtNombreS" class=" control-label">Ingrese respuestas</label>
            </div>
            <div class="col-md-3">
              <label for="txtNombreS" class=" control-label"> Indique la opción correcta</label>
              <p class="text-danger formatoTexto14" id="spnNombre"> </p>
              <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8">
              <input id="txtopcion1" name="txtopcion1" type="text" class="form-control grisObscuro" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+"  placeholder="*Ingrese pregunta" required> 
            </div>
            <div class="col-md-3">
              <input type="checkbox" name="respuesta1" value="1"><label for="txtNombreS" class="control-label">-->Correcta</label>
              <p class="text-danger formatoTexto14" id="spnNombre"> </p>
              <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-md-8">
              <input id="txtopcion1" name="txtopcion1" type="text" class="form-control grisObscuro" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+"  placeholder="*Ingrese pregunta" required> 
            </div>
            <div class="col-md-3">
              <input type="checkbox" name="respuesta1" value="1"><label for="txtNombreS" class=" control-label">  Correcta</label>
              <p class="text-danger formatoTexto14" id="spnNombre"> </p>
              <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8">
              <input id="txtopcion1" name="txtopcion1" type="text" class="form-control grisObscuro" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+"  placeholder="*Ingrese pregunta" required> 
            </div>
            <div class="col-md-3">
              <input type="checkbox" name="respuesta1" value="1"><label for="txtNombreS" class=" control-label">  Correcta</label>
              <p class="text-danger formatoTexto14" id="spnNombre"> </p>
              <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8">
              <input id="txtopcion1" name="txtopcion1" type="text" class="form-control grisObscuro" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+"  placeholder="*Ingrese pregunta" required> 
            </div>
            <div class="col-md-3">
              <input type="checkbox" name="respuesta1" value="1"><label for="txtNombreS" class=" control-label"> Correcta</label>
              <p class="text-danger formatoTexto14" id="spnNombre"> </p>
              <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
            </div>
          </div>

          <p class="text-danger formatoTexto14" id="spnNombre"> </p>
          <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
        </div>
      <center><button id="btnGuardarAg" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button>
      <button id="btnCancelarAg"  class="btn btn-danger"><i class="fa fa-times-circle"></i> Cancelar</button></center><br>
      </div>
    </div>

    <!-- Formulairo de preguntas abiertas-->
    <div class="form-horizontal hidden" id="formprea" novalidate>
      <div class="form-group">
          <div class="col-md-8">
            <label for="txtNombreS" class="control-label">Capturar pregunta abierta: </label>
          </div>
          <div class="col-md-8">
            <input id="txtopcion1" name="txtopcion1" type="text" class="form-control grisObscuro" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+"  placeholder="*Ingrese pregunta" required>
            <p class="text-danger formatoTexto14" id="spnNombre"> </p>
            <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
          </div>
      </div>

      <center><button id="btnGuardarAg" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button>
      <button id="btnCancelarAg"  class="btn btn-danger"><i class="fa fa-times-circle"></i> Cancelar</button></center>
    </div>
  </div> <!-- fin de formulairo de preguntas de opción múltiple -->

      <div class="row" id="pnlInicio">
        <div class="col-md-12" align="center">
          </div>
        </div>

    <input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">

  </div>  <!--/columna10 contenido-->
</div>



@stop

@section('js')
{{HTML::script('sweetAlert/sweetalert.min.js')}}
{{HTML::script('js/administracion/cueEditar.js')}}
{{HTML::script('js/administracion/temAgregar.js')}}

{{HTML::script('datepicker/js/bootstrap-datepicker.js')}}
@stop

@section('javascript')
  <script>
    $('#collapseSesiones').addClass('in');
    $('#liEditarSesion').addClass('activoBorde');
  </script>
@stop
