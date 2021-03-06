<div class="row">
  <center><h2><i class="fa fa-male text-primary"></i> Reporte por representante y período</h2></center>
  <br><br>
  <div class="col-md-6">
    <h3><i class="fa fa-user text-primary"></i> Selección de representante</h3>
     <div class="form-group" id="groupNueva">
       <label for="txtDias" class="col-md-6 control-label text-left">*Seleccionar representante: </label>
       <div class="col-md-6">

         <select class="" name="" id="slctRepresentante">
         </select>
       </div>
     </div>
     <input type="hidden" name="_token" id="token" value="<?php echo csrf_token(); ?>">
     <br><br>
    <!--   <button id="btnImprimir" class="btn btn-primary"><i class="fa fa-file-pdf-o"></i> Imprimir reporte</button> -->
    </div>

    <div class="col-md-6">

      <h3><i class="fa fa-calendar text-primary"></i> Selecciona período de días:</h3>
      <div class="class="form-group"">
          <label class="col-md-8 control-label"><input type="checkbox" name="name" id="chkTodos"> Todos los períodos</label>
      </div>
      <br><br>
      <div class="form-group" id="groupNueva2">

        <label for="txtFechaInicio" class="col-md-3 control-label">*Fecha inicio: </label>
        <div class="col-md-8">
          <div class="input-group date" data-provide="datepicker">
            <input type="text" class="form-control" id="txtFechaInicio">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
          </div>
        </div>
      </div>
      <br><br>

        <div class="form-group" id="p">
          <label for="txtDias" class="col-md-3 control-label">* Fecha Fin: </label>
          <div class="col-md-8">
            <div class="input-group date" data-provide="datepicker">
              <input type="text" class="form-control" id="txtFechaFin">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
            </div>
          </div>
        </div>
    </div>
    <center><button id="btnSeleccionar" class="btn btn-primary"><i class="fa fa-file-text"></i> Ver reporte</button></center>
  </div>


<div class="table-responsive" id="tblRep">
  <h3>Noticias para fuentes:</h3>
  <table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th class="col-md-1 text-center">Representante</th>
        <th class="col-md-1">Fuente</th>
        <th class="col-md-2">Titulo</th>
        <th class="col-md-7">Contenido</th>
        <th class="col-md-1">Fecha</th>

      </tr>
    </thead>
    <tbody id="tbodyRep"></tbody>
  </table>
</div>
