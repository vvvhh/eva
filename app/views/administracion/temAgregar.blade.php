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
    <center><h2 id="mosTem" class="hidden"><i class="fa fa-plus-circle text-primary"></i>Agregar Tema</h2></center>
    <center><h2 id="mosSub" class="hidden"><i class="fa fa-plus-circle text-primary"></i>Agregar Subtema</h2></center>
    <br><br>
      <div class="col-md-6">
        <button id="btnTemas" class="btn btn-block btn-md botonNoactivo"><i class="fa fa-th-list"></i> Tema</button>
      </div>
      <div class="col-md-6">
        <button id="btnSubtemas"  class="btn btn-block btn-md botonNoactivo"><i class="fa fa-pencil-square-o"></i> SubTema</button>
      </div>
  </div>
</div>

<div class="row" id="pnlAgregar">
  <div class="col-md-10">
    <br>
    <form class="form-horizontal hidden" id="tema" name="form" novalidate>
      <div class="form-group">
        <label for="txtNombreS" class="col-md-3 control-label">Tema: </label>
        <div class="col-md-8">
          <input id="txtTema" type="text" class="form-control grisObscuro" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+"  placeholder="*Tema de donde se obtendrá la información" required>
          <p class="text-danger formatoTexto14" id="spnNombre"> </p>
          <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
        </div>
      </div>

      <div class="form-group hidden">
        <label for="txtActivot" class="col-md-3 control-label">Activo:</label>
        <div class="col-md-8">
          <select name="" id="txtActivot" class="form-control input-sm">
            <option value="1">Sí</option>
            <option value="0">No</option>
          </select>
        </div>
      </div>

      <center>
        <button id="btnGuardarTem" class="btn btn-primary">
          <i class="fa fa-floppy-o"></i> Guardar
        </button>
        <button id="btnCancelarTem"  class="btn btn-danger">
          <i class="fa fa-times-circle"></i> Cancelar
        </button>
      </center>
    </form>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">
  </div>  <!--/columna10 contenido-->
</div>

<div class="row">
  <div class="col-md-10">
    <br>
    <form class="form-horizontal hidden" id="subtema" name="form" novalidate>
      <div class="form-group">
        <label class="col-md-3 control-label">Subtema: </label>
        <div class="col-md-8">
          <input id="txtSubTema" type="text" class="form-control grisObscuro" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+"  placeholder="*Subtema de donde se obtendrá la información" required>
          <p class="text-danger formatoTexto14" id="spnNombre"> </p>
          <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
        </div>
      </div>

      <div class="form-group hidden">
        <label for="txtActivos" class="col-md-3 control-label">Activo:</label>
        <div class="col-md-8">
          <select name="" id="txtActivos" class="form-control input-sm">
            <option value="1">Sí</option>
            <option value="0">No</option>
          </select>
        </div>
      </div>

      <center>
        <button id="btnGuardarSub" class="btn btn-primary">
          <i class="fa fa-floppy-o"></i> Guardar
        </button>
        <button id="btnCancelarSub"  class="btn btn-danger">
          <i class="fa fa-times-circle"></i> Cancelar
        </button>
      </center>
    </form>
  </div>
</div>


<div class="row">
  <div class="col-md-12">
    <input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">
  </div>  <!--/columna10 contenido-->
</div>



@stop

@section('js')
{{HTML::script('sweetAlert/sweetalert.min.js')}}
{{HTML::script('js/administracion/temAgregar.js')}}

{{HTML::script('datepicker/js/bootstrap-datepicker.js')}}
@stop

@section('javascript')
  <script>
    $('#collapseSesiones').addClass('in');
    $('#liEditarSesion').addClass('activoBorde');
  </script>
@stop

