    <div id="lbltm" class="hidden">
      <h3>
        <i class="fa fa-plus-circle text-primary"></i> Datos generales del cuestionario
      </h3>
      <label class="control-label">
        Tema:&nbsp;&nbsp;
      </label>
      <label id="temSel"></label>
      <br>
      <button id="btnRegresarTem" class="btn btn-success hidden">
        <i class="fa fa-chevron-left" aria-hidden="true"></i> Regresar
      </button>
    </div>

    <div class="hidden" id="lblSub">
      <label for="txtNombreS" class="control-label">
        Subtema:&nbsp;&nbsp;
      </label>
      <label id="subSel"></label>
      <br>
      <button id="btnRegresarSub" class="btn btn-success hidden">
        <i class="fa fa-chevron-left" aria-hidden="true"></i> Regresar
      </button>
    </div>

<!--________________________Sección para agregar un tema nuevo desde agregar________________________-->
  <center>
    <h2 id="mosTem" class="hidden"><i class="fa fa-plus-circle text-primary"></i>Agregar Tema</h2>
  </center>
      <br>
      <div class="form-horizontal hidden" id="temaAg" novalidate>
        <div class="form-group">
          <label class="col-md-3 control-label">Tema: </label>
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
          <button id="btnGuardarTemAg" class="btn btn-primary">
            <i class="fa fa-floppy-o"></i> Guardar
          </button>
          <button id="btnCancelarTemAg"  class="btn btn-danger">
            <i class="fa fa-chevron-left" aria-hidden="true"></i> Regresar
          </button>
        </center>
      </div>
  <!--____________________Termina Sección para agregar un tema nuevo desde agregar____________________-->

<div>
  <div id="pnl1" class="hidden">
    <h3><i class="fa fa-plus-circle text-primary"></i> Datos generales del cuestionario</h3>
    <h4><b>Definición del Tema</b></h4>
    <h5>Por favor verifique en el siguiente listado si el tema del cuestionario a ingresar existe, si existe seleccionelo y presione el boton <button class="btn-primary" disabled>Aceptar</button>, en caso contrario presione el boton <button class="btn-warning" disabled>Agregar</button> para adicionar un tema nuevo.</h5>
    <br><br>
      <div class="form-group">
        <label for="txtNombreS" class="col-md-3 control-label">Temas existentes: </label>
        <div class="col-md-7">
          <SELECT id="selCombo" size=1 class="form-control grisObscuro">
          </SELECT>
          <p class="text-danger formatoTexto14" id="spnNombre"> </p>
          <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
        </div>
      </div>
      <div class="form-group">
        <center>
          <button id="btnTemaSiEx" class="btn btn-primary">Aceptar</button>
          <button id="btnTemaNoEx" class="btn btn-warning">Agregar</button>
        </center>
        <br>
      </div>
      <div id="Combo" class="form-group hidden">
      <center><h5 class="col-md-12"> El tema que capturado sera el tema de su cuestionario.</h5></center>
        <div class="col-md-12" id="select">
          <center><button id="temAceptar" class="btn btn-primary">Aceptar</button></center>
          <p class="text-danger formatoTexto14" id="spnNombre"> </p>
          <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
        </div>
      </div>
  </div>
</div>
  
<div>
    <div class="form-horizontal hidden" id="subtemaAg" >
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
        <button id="btnGuardarSubAg" class="btn btn-primary">
          <i class="fa fa-floppy-o"></i> Guardar
        </button>
        <button id="btnCancelarSubAg"  class="btn btn-danger">
          <i class="fa fa-chevron-left" aria-hidden="true"></i> Regresar
        </button>
      </center>
    </div>
  <!--____________________Termina Sección para agregar un tema nuevo desde agregar____________________-->

  <div id="subtema" class="hidden">
    <h4><b>Definición del Subtema</b></h4>
    <h5>Por favor verifique en el siguiente listado si el subtema del cuestionario a ingresar existe, si existe seleccionelo y presione el boton <button class="btn-primary" disabled>Aceptar</button>, en caso contrario presione el boton <button class="btn-warning" disabled>Agregar</button> para añadir un subtema nuevo.</h5>
    <div class="form-group">
      <br><br>
      <label class="col-md-3 control-label">Subtemas existentes: </label>
      <div class="col-md-7">
        <SELECT id="selComboSub" size=1 class="form-control grisObscuro">
        </SELECT>
        <p class="text-danger formatoTexto14" id="spnNombre"> </p>
        <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <center><button id="btnTemaSiExsub" class="btn btn-primary">Aceptar</button>
          <button id="btnTemaNoExsub" class="btn btn-warning">Agregar</button></center>
      </div>
      <div id="subCombo" class="hidden">
        <br><br><br>
        <center>
          <h5 class="col-md-12"> El subtema que capturado sera el subtema de su cuestionario.</h5>
        </center>
        <div class="col-md-12">
          <br>
          <center><button id="subAceptar" class="btn btn-primary">Aceptar</button></center>
          <p class="text-danger formatoTexto14" id="spnNombre"> </p>
          <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
        </div>
      </div>
    </div>
  </div>
</div>