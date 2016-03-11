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
    <center><h3><i class="fa fa-newspaper-o text-primary"></i> Agregar</h3></center>
    <br><br>
    <div class="col-md-4">
        <button id="btnAgregar" class="btn btn-block btn-md botonNoactivo"><i class="fa fa-plus-circle"></i> Agregar</button>
    </div>
    <div class="col-md-4">
      <button id="btnEditar"  class="btn btn-block btn-md botonNoactivo"><i class="fa fa-pencil-square-o"></i> Editar</button>
    </div>
    <div class="col-md-4">
      <button id="btnConsulta" class="btn btn-block btn-md botonNoactivo"><i class="fa fa-th-list"></i> Consultar</button>
    </div>
  </div>
</div>

<div class="row" >
  <div class="col-md-12" >
    <div class="" id="tblServicios">
      <h2><span class="glyphicon glyphicon-edit text-primary"></span> Editar cuestionario</h2>
      <div class="table-responsive" >
        <table class="table table-striped table-hover table-bordered">
          <thead>
            <tr>
              <th class="col-md-1 text-center">Fecha de elaboración</th>
              <th class="col-md-1 text-center">Fecha de aplicación</th>
              <th class="col-md-1 text-center">Tema</th>
              <th class="col-md-1 text-center">Nombre del custionario</th>
              <th class="col-md-1 text-center">Estado</th>
              <th class="col-md-1 text-center">Modificar</th>
              <th class="col-md-1 text-center">Dar de baja</th>
            </tr>
          </thead>
          <tbody id="tbodyServicios"></tbody>
        </table>
      </div>
    </div>
  </div> 
</div><!-- /Tabla de servicios -->

<!-- Panel editar -->
<div class="row">
  <div class="col-md-10">
    <div class="well transparenteClaro" id="formEditarServ">
      <div class="form-horizontal">
        <fieldset>
          <legend><span class="glyphicon glyphicon-edit text-primary"></span> Editar Cuestionario</legend>
          <input type="hidden" id="txtCueId" value="">
          <div class="form-group">
            <label for="txtNombreFuente" class="col-md-4 control-label">Fecha de Aplicación:</label>
            <div class="col-md-7">
              <input type="text" class="form-control input-sm" id="txtFechaA" placeholder="Ingrese fecha de aplicacion" maxlength="55">
            </div>
          </div>

          <div class="form-group">
            <label for="txtNombreS" class="col-md-3 control-label">*Tema: </label>
              <div class="col-md-8">
                <SELECT id="selCombo" size=1 class="form-control grisObscuro">
                </SELECT>
                <p class="text-danger formatoTexto14" id="spnNombre"> </p>
                <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
              </div>
          </div>

          <div class="form-group">
            <label for="txtNombreFuente" class="col-md-4 control-label">Nombre del Cuestionario:</label>
            <div class="col-md-7">
              <input type="text" class="form-control input-sm" id="txtNombreE" placeholder="Ingrese nombre del cuestionario" maxlength="55">
            </div>
          </div>

          <div class="form-group">
            <label for="txtActivo" class="col-md-4 control-label">Activo:</label>
            <div class="col-md-7">
              <select name="" id="txtActivo" class="form-control input-sm">
                <option value="1">Sí</option>
                <option value="0">No</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
              <button class="btn btn-primary" id="btnGuardar"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar cambios</button>
              <button class="btn btn-danger " id="btnCancelar"><span class="glyphicon glyphicon-remove-sign"></span> Cancelar</button>
            </div>
          </div>
        </fieldset>
      </div>
    </div>
  </div>
</div>

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
