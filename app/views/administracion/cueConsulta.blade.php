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
<!--<div>
  <div class="row">
    <center><h2><i class="fa fa-newspaper-o text-primary"></i> Cuestionarios</h2></center>
    <center><h3><i class="fa fa-th-list text-primary"></i> Consulta</h3></center>
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
</div>-->
@include('administracion/btnAgEdCo')
    <div class="row">
      <div class="col-md-12">
        <div id="tblConsultas">
          <h2><span class="glyphicon glyphicon-edit text-primary"></span> Consultar datos generales de Cuestionarios</h2>
          <input type="hidden" id="txtCueId" value="">
          <div class="table-responsive" >
            <table class="table table-striped table-hover table-bordered">
              <thead>
                <tr>
                  <th class="col-md-1 text-center">Fecha de elaboración</th>
                  <th class="col-md-1 text-center">Fecha de aplicación</th>
                  <th class="col-md-1 text-center">Tema</th>
                  <th class="col-md-1 text-center">Sub Tema</th>
                  <th class="col-md-1 text-center">Nombre del custionario</th>
                  <th class="col-md-1 text-center">Estado</th>
                  <th class="col-md-1 text-center">Visualizar</th>
                </tr>
              </thead>
              <tbody id="tbodyConsulta"></tbody>
            </table>
          </div>
        </div><!-- /Tabla de servicios -->
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
