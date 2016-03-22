@extends('layoutInicio')

@section('head')
@stop

@section('title')
  Vázquez Hernández Contadores, S. C.
@stop

@section('css')
  {{ HTML::style('css/inicio.css') }}
@stop

@section('content')
<!--<body class="fondo">-->
<body>
  <div class="row">
      <!--<h3 class="textTitulo">-->
      <center><h3><i class="fa fa-pencil-square-o text-primary"></i> Sistema de evaluación</h3></center>
  </div>
<br>
  <div class="container">
    <div class="row">
        <div class="panel panel-default">
          <div class="panel-body">
            <img src="/img/474726969.jpg" class=" img-responsive" />
          </div>
        </div>
      <center>
        <button id="btnnc" class="btn btn-primary">
          <i class="fa fa-floppy-o"></i> Comenzar
        </button>
      </center>
    </div>
  </div>
<br><br><br><br><br>

  {{ HTML::script('js/jquery.js') }}
  {{HTML::script('sweetAlert/sweetalert.min.js')}}
  {{HTML::script('js/jquery.tablesorter.min.js')}}
  {{HTML::script('js/jquery.highlight-5.js')}}
  {{ HTML::script('js/botoninicio.js') }}
</body>
@stop
