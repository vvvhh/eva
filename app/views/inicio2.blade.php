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
    <br><br>
    <div class="col-md-4">
      <button id="btnConsulta" class="btn btn-block btn-md botonNoactivo"><i class="fa fa-th-list"></i> Consultar</button>
    </div>
    <div class="col-md-4">
      <button id="btnEditar"  class="btn btn-block btn-md botonNoactivo"><i class="fa fa-pencil-square-o"></i> Editar</button>
    </div>
    <div class="col-md-4">
      <button id="btnAgregar"  class="btn btn-block btn-md botonNoactivo"><i class="fa fa-plus-circle"></i> Agregar</button>
    </div>
  </div>
</div>

<div class="row hidden" id="pnlAgregar">
  <div class="col-md-10">
    <div class="form-horizontal" id="form" name="form" novalidate>
    <h2><i class="fa fa-plus-circle text-primary"></i> Agregar Cuestionario</h2>
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

      <div class="form-group">
        <label for="txtNombreS" class="col-md-3 control-label">*Tema: </label>
        <div class="col-md-8">
          <input id="txtTema" name="txtTema" type="text" class="form-control grisObscuro" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+"  placeholder="*Tema de donde se obtendrá la información" required>
          <p class="text-danger formatoTexto14" id="spnNombre"> </p>
          <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="txtNombreS" class="col-md-3 control-label">*Subtema: </label>
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

      <center><button id="btnGuardarAg" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button>
      <button id="btnCancelarAg"  class="btn btn-danger"><i class="fa fa-times-circle"></i> Cancelar</button></center>
    </div>
    <br><br>

    <!-- Inicio del formulairo para ingresar preguntas de opción múltiple y abiertas-->
    <div class="form-horizontal" id="formselect" name="form" novalidate>
      <h2><i class="fa fa-plus-circle text-primary"></i> Agregar Pregunta</h2>
      <label for="txtNombreS" class=" control-label">¿Que tipo de pregunta deseas capturar? </label>
        <div class="form-group">
          <div class="col-md-8">
            <p class="text-danger formatoTexto14" id="spnNombre"> </p>
            <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
            <input type="checkbox" name="transporte" value="1">  Abierta 
            <br>
            <input type="checkbox" name="transporte" value="2">  Opción multiple
          </div>
        </div>
    </div>

    <!-- formulario de preguntas con op´ción multiple -->
    <div class="form-horizontal" id="formpom" name="form" novalidate>
      <!--<h2><i class="fa fa-plus-circle text-primary"></i> Agregar Cuestionario</h2>-->
      <div class="form-group">
        <label for="txtNombreS" class=" control-label">Pregunta: </label>
        <br> 
        <input id="txtpreg" name="txtpreg" type="text" class="form-control grisObscuro" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+"  placeholder="*Ingrese pregunta" required>
        <br><br>
          <div class="col-md-12">
            <div class="col-md-6">
              <input id="txtopcion1" name="txtopcion1" type="text" class="form-control grisObscuro" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+"  placeholder="*Ingrese pregunta" required> 
              <br>
              <input id="txtopcion2" name="txtopcion2" type="text" class="form-control grisObscuro" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+"  placeholder="Ingrese respuesta" required>
              <br>
              <input id="txtopcion3" name="txtopcion3" type="text" class="form-control grisObscuro" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+"  placeholder="Ingrese respuesta" required>
              <br>
              <input id="txtopcion4" name="txtopcion4" type="text" class="form-control grisObscuro" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+"  placeholder="Ingrese respuesta" required>
              <br>
            </div>
            <div class="col-md-6">
              <input type="checkbox" name="respuesta1" value="1">
              <br><br><br>
              <input type="checkbox" name="respuesta2" value="1">
              <br><br>
              <input type="checkbox" name="respuesta3" value="1">
              <br><br><br>
              <input type="checkbox" name="respuesta4" value="1">
              <br><br><br>
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
    <div class="form-horizontal" id="formprea" name="form" novalidate>
    <!--<h2><i class="fa fa-plus-circle text-primary"></i> Agregar Pregunta</h2>-->

      <div class="form-group">
        <label for="txtNombreS" class="col-md-3 control-label">Capturar pregunta abierta: </label>
          <div class="col-md-8">
            <textarea cols=70 ROWS=10 NAME="Texto"></textarea> 
            <p class="text-danger formatoTexto14" id="spnNombre"> </p>
            <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
          </div>
      </div>

      <center><button id="btnGuardarAg" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button>
      <button id="btnCancelarAg"  class="btn btn-danger"><i class="fa fa-times-circle"></i> Cancelar</button></center>
    </div>
  </div> <!-- fin de formulairo de preguntas de opción múltiple -->
</div>


<div class="row">
  <div class="col-md-12">
    <div class="hidden" id="tblServicios">
      <div class="row" >
        <div class="col-md-12" >
          <h2><span class="glyphicon glyphicon-edit text-primary"></span> Editar cuestionario</h2>
          <div class="table-responsive" >
            <table class="table table-striped table-hover table-bordered">
              <thead>
                <tr>
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
      </div> <!-- /Tabla de servicios -->
    </div>
    <br>

    <!-- Panel editar -->
    <div class="row">
      <div class="col-md-10">
        <div class="well transparenteClaro hidden" id="formEditarServ">
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
                <label for="txtNombreFuente" class="col-md-4 control-label">Tema del Cuestionario:</label>
                <div class="col-md-7">
                  <input type="text" class="form-control input-sm" id="txtTemaE" placeholder="Ingrese tema del cuestionario" maxlength="55">
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




    <div class="row hidden" id="pnlConsulta">
      <div class="col-md-10 col-md-offset-1">

          <div class="row">
            <div class="col-md-12">
              <h2><i class="fa fa-th-list text-primary"></i> Cuestionarios del sistema</h2>

              <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-2">
                  <!--          <button id="btnEnviarA"  class="btn btn-info btn-block btn-md"><i class="fa fa-paper-plane"></i> Enviar por Correo</button>
                -->
                </div>
              </div>

              <div class="table-responsive" id="tblConculta">
                <table class="table table-striped table-hover table-bordered">
                  <thead>
                    <tr>
                      <th class="col-md-1">Fecha de aplicaicón</th>
                      <th class="col-md-3">Nombre del cuestionario</th>
                      <th class="col-md-2 text-center">Tema</th>
                    </tr>
                  </thead>
                  <tbody id="tbodyConsulta"></tbody>
                </table>
              </div>
            </div>
          </div> <!-- /Tabla de servicios -->
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

{{HTML::script('datepicker/js/bootstrap-datepicker.js')}}
@stop

@section('javascript')
  <script>
    $('#collapseSesiones').addClass('in');
    $('#liEditarSesion').addClass('activoBorde');
  </script>
@stop
