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

    @include('administracion/agregarTemSub')

    <div class="hidden" id="lblDg">
      <label class="control-label">Nombre del cuestionario:&nbsp;&nbsp;</label><label id="lblNombre"></label><br>
      <label class="control-label">Fecha de elaboración:&nbsp;&nbsp;</label><label id="lblFechaE"></label><br>
      <label class="control-label">Fecha de aplicación:&nbsp;&nbsp;</label><label id="lblFechaA"></label>
      <label class="control-label">Preguntas Ingresadas:&nbsp;&nbsp;</label><label id="lblPregIng"></label>
      <label class="control-label">Preguntas por ingresar:&nbsp;&nbsp;</label><label id="lblPregPorIng"></label>
      <br>
      <button id="btnDg" class="btn btn-success hidden"><i class="fa fa-chevron-left" aria-hidden="true"></i> Regresar</button>
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
        <label for="txtFechaInicio" class="col-md-3 control-label">*Elija fecha de elaboración: </label>
        <div class="col-md-2">
          <div class="input-group date" data-provide="datepicker">
            <input type="text" class="form-control" id="txtFechaEla">
            <div  id="calendario" class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
          </div>
        </div>
        <div class="col-md-2"></div>
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
              <i class="fa fa-calendar" id></i>
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
            <h4 class="hidden" id="infoCom">Información completada, los datos estan listos para ser insertados en la base de datos.</h4>
              <button id="btnModificarAg" class="btn btn-warning hidden"><i class="fa fa-pencil-square-o"></i> Modificar</button>
              <button id="btnGuardarAg" class="btn btn-primary hidden"><i class="fa fa-floppy-o"></i> Guardar Definitivo</button>
              <button id="btnCancelarAg"  class="btn btn-danger hidden"><i class="fa fa-times-circle"></i> Cancelar</button>
            </center>
          </div>
        </div>
    </div>
  @include('administracion/pregRes')
</div>

@include('administracion/cueEditar')
@include('administracion/cueConsulta')

@stop

@section('js')
{{HTML::script('sweetAlert/sweetalert.min.js')}}
{{HTML::script('bootbox/bootbox.min.js')}}
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