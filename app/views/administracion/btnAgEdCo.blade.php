<div>
  <!--div class="row" id="botones" style="clear: both" BOTONES ESTÁTICOS-->
  <div class="row">
    <center><h2><i class="fa fa-newspaper-o text-primary"></i> Cuestionarios</h2></center>
    <center><h3 id="lbl1" class="hidden"><i class="fa fa-plus-circle text-primary"></i> Agregar</h3></center>
    <center><h3 id="lbl2" class="hidden"><i class="fa fa-pencil-square-o text-primary"></i> Editar</h3></center>
    <center><h3 id="lbl3" class="hidden"><i class="fa fa-th-list text-primary"></i> Consulta</h3></center>
    <br><br>
    <div class="col-md-4">
      <button id="btnAgregar"  class="btn btn-block btn-md botonNoactivo" href="{{ URL::to('administracion/cueAgregar') }}"><i class="fa fa-plus-circle"></i> Agregar</button>
    </div>
    <div class="col-md-4">
      <button id="btnEditar"  class="btn btn-block btn-md botonNoactivo" href="{{ URL::to('administracion/cueAgregar') }}"><i class="fa fa-pencil-square-o"></i> Editar</button>
    </div>
    <div class="col-md-4">
      <button id="btnConsulta" class="btn btn-block btn-md botonNoactivo" href="{{ URL::to('administracion/cueAgregar') }}"><i class="fa fa-th-list"></i> Consultar</button>
    </div>
    <!--div class="col-md-3">
      <button id="btnConsulta" class="btn btn-block btn-md botonNoactivo"><i class="fa fa-th-list"></i> Temas</button>
    </div-->
  </div>
</div>