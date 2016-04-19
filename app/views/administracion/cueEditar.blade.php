<div class="row" >
  <div class="col-md-12" >
    <div id="tblServicios" class="hidden">
      <h2><span class="glyphicon glyphicon-edit text-primary"></span> Editar cuestionario</h2>
      <div class="table-responsive col-md-12" >
        <table class="table table-striped table-hover table-bordered">
          <thead>
            <tr>
              <th class="col-md-1 text-center">Fecha de elaboración</th>
              <th class="col-md-1 text-center">Fecha de aplicación</th>
              <th class="col-md-1 text-center">Tema</th>
              <th class="col-md-1 text-center">Sub Tema</th>
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
  <div class="col-md-12" class="hidden">
    <div class="well transparenteClaro hidden" id="formEditarServ">
      <div class="form-horizontal">
        <fieldset>
          <legend><span class="glyphicon glyphicon-edit text-primary"></span> Editar Cuestionario</legend>
          <input type="hidden" id="txtCueId" value="">
          <div class="form-group">
        <label for="txtNombreS" class="col-md-3 control-label">*Tema: </label>
        <div class="col-md-7" id="select">
          <SELECT id="selCombo" size=1 class="form-control grisObscuro">
          </SELECT>
          <p class="text-danger formatoTexto14" id="spnNombre"> </p>
          <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="txtSubTema" class="col-md-3 control-label">*Subtema: </label>
        <div class="col-md-7">
          <SELECT id="selComboSub" size=1 class="form-control grisObscuro">
          </SELECT>
          <p class="text-danger formatoTexto14" id="spnNombre"> </p>
          <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="txtNombre" class="col-md-3 control-label">*Nombre: </label>
        <div class="col-md-7">
          <input id="txtNombre" name="txtNombre" type="text" class="form-control grisObscuro" pattern="[ñÑZáéíóúñÁÉÍÓÚ  \d\w\s@._-]+"  placeholder="*Nombre que tendra el cuestionario" required>
          <p class="text-danger formatoTexto14" id="spnNombre"> </p>
          <input type="hidden" name="token" id="token" value="<?php echo csrf_token(); ?>">
        </div>
      </div>

      <div class="form-group">
        <label for="txtFechaInicio" class="col-md-3 control-label"><br>Fecha de elaboración: </label>
        <div class="col-md-6">
          <div class="input-group date" data-provide="datepicker">
            <input type="text" class="form-control" id="fechaEla" value="
<?php //Ejemplo curso PHP aprenderaprogramar.com
$time = time();
echo date("Y-m-d", $time);
?>">
            <div  id="calendario" class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group" id="groupNueva2">
        <label for="txtFechaInicio" class="col-md-3 control-label">Fecha de aplicación: </label>
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