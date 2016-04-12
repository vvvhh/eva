<div class="menuAdmin">
  <ul class="nav nav-sidebar colorNav">

<div class="menuAdmin">
  <ul class="nav nav-sidebar colorNav">

<!-- /Reportes -->

</ul>
</div>
<br>
<div class="menuAdmin">
  <ul class="nav nav-sidebar colorNav">  <!-- fueEditar  -->
    <li class="header" data-toggle="collapse" data-target="#collapseMiembros">
      <a class="grisClaro" ondblclick="myFunction()" id="cue"><strong>
        <h4><i class="fa fa-list-alt"></i>
          &nbsp;Cuestionarios
        </h4>
      </strong></a>
        <ul id="collapseMiembros" class="nav nav-sidebar colorNav collapse">
          <li id="liAgregar"><!-- href="{{ URL::to('administracion/cueAgregar#pnlAgregar') }}" -->
              <a class="grisClaro" href="{{ URL::to('administracion/cueAgregar') }}" id="label1">
                <i class="fa fa-plus-circle"></i> Agregar
              </a>
          </li>
          <li id="liEditarRe">
              <a class="grisClaro" href="{{ URL::to('administracion/cueAgregar') }}" id="label2">
                <i class="fa fa-pencil-square-o"></i> Editar
              </a>
          </li>
          <li id="liEditarEqu">
              <a class="grisClaro" href="{{ URL::to('administracion/cueAgregar') }}" id="label3">
                <i class="fa fa-th-list"></i> Consultar
              </a>
          </li>
      </ul>
    </li>
<!--href="{{ URL::to('administracion/temAgregar') }}"-->
    <li class="header" data-toggle="collapse" data-target="#collapseAsignacion" >
      <a class="grisClaro" collapseAsignacion id="tem">
        <strong>
          <h4><i class="fa fa-text-width"></i>
            &nbsp;Edición temática
          </h4>
        </strong>
      </a>
      <ul id="collapseAsignacion" class="nav nav-sidebar colorNav collapse">
        <li id="liPeAgregar">
            <a class="grisClaro" href="{{ URL::to('administracion/temAgregar#tema') }}" id="label4">
              <i class="fa fa-calendar-o"></i> Tema
            </a>
        </li>
        <li id="liAsignacion">
            <a class="grisClaro" href="{{ URL::to('administracion/temAgregar#subtema') }}" id="label5">
              <i class="fa fa-calendar-times-o"></i> Subtema
            </a>
        </li>
      </ul>
    </li>
  </ul>
</div>
