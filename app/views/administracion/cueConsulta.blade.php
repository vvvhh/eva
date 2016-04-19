    <div class="row">
      <div class="col-md-12">
        <div id="tblConsultas" class="hidden">
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