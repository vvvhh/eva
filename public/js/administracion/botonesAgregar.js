var btnGrdFchEl = $('#btnGrdFchEl'),btnGrdFchAp = $('#btnGrdFchAp'),valor=sessionStorage.getItem("visita"),
    btnModificarAg = $('#btnModificarAg'),btnGuardarAg = $('#btnGuardarAg'),btnCancelarAg = $('#btnCancelarAg'),
    infoCom = $('#infoCom'),pnlAgregar = $('#pnlAgregar'),pnlRes = $('#pnlRes'),btnRegresarTem = $('#btnRegresarTem'),
    btnRegresarSub = $('#btnRegresarSub'),btnSiguienteSub = $('#btnSiguienteSub'),btnDg = $('#btnDg'),btnRegresarTipo = $('#btnRegresarTipo'),
    btnRegresarNumero = $('#btnRegresarNumero'),btnGrdNmb = $('#btnGrdNmb'),btnSiguienteTem = $('#btnSiguienteTem');

function mostrarTema(){
  sessionStorage.setItem("visita", "1");
  centrado="text-center";  /*clase centrado*/
  centrado="center";

  bootbox.dialog({
    message: "<div align='"+centrado+"'><i class='fa fa-info text-info fa-5x' aria-hidden='true'></i><br><p>¿Está seguro de que el nombre a ingresar es correcta?</p><h4><strong>"+txtNombre.val()+"</strong></h4></div>",
    closeButton: false, /*no tendra boton de cerrado*/
    animate: true,  /*animacion al aparecer*/
    buttons: {
      main: {
        label: "Aceptar",
        className: "btn-primary",
        callback: function() {
          swal(
            '¡Guardado temporal!',
            'El nombre a sido guardado con éxito.',
            'success'
          );
          document.getElementById("txtNombre").disabled = true;
          document.getElementById('btnGrdNmb').disabled = true;
        }
      },
      success: {
        label: "Cancelar",
        className: "btn-danger",
      }
    }
  });
}

//Código para ejecutar un bootbox con un sweet alert dentro 
function fechaEla(){
  sessionStorage.setItem("visita", "1");
  centrado="text-center";  /*clase centrado*/
  centrado="center";

  bootbox.dialog({
    message: "<div align='"+centrado+"'><i class='fa fa-info text-info fa-5x' aria-hidden='true'></i><br><p>¿Está seguro de que la fecha a ingresar es correcta?</p><h4><strong>"+txtFechaEla.val()+"</strong></h4></div>",
    closeButton: false, /*no tendra boton de cerrado*/
    animate: true,  /*animacion al aparecer*/
    buttons: {
      main: {
        label: "Aceptar",
        className: "btn-primary",
        callback: function() {
          swal(
            '¡Guardado temporal!',
            'La fecha de elaboración a sido guardada con éxito.',
            'success'
          );
          document.getElementById("txtFechaEla").disabled = true;
          document.getElementById('btnGrdFchEl').disabled = true;
        }
      },
      success: {
        label: "Cancelar",
        className: "btn-danger",
      }
    }
  });
}

function fechaApl() {
	sessionStorage.setItem("visita", "1");
  centrado="text-center";  /*clase centrado*/
  centrado="center";

  bootbox.dialog({
    message: "<div align='"+centrado+"'><i class='fa fa-info text-info fa-5x' aria-hidden='true'></i><br><p>¿Está seguro de que la fecha de aplicación a ingresar es correcta?</p><h4><strong>"+txtFechaApl.val()+"</strong></h4></div>",
    closeButton: false, /*no tendra boton de cerrado*/
    animate: true,  /*animacion al aparecer*/
    buttons: {
      main: {
        label: "Aceptar",
        className: "btn-primary",
        callback: function() {
          swal(
            '¡Guardado temporal!',
            'La fecha de aplicación a sido guardada con éxito.',
            'success'
          );
          document.getElementById("txtFechaApl").disabled = true;
          document.getElementById('btnGrdFchAp').disabled = true;
          infoCom.removeClass('hidden');
          btnModificarAg.removeClass('hidden');
          btnGuardarAg.removeClass('hidden');
          btnCancelarAg.removeClass('hidden');
        }
      },
      success: {
        label: "Cancelar",
        className: "btn-danger",
      }
    }
  });
}

function modificar(){
  document.getElementById('txtNombre').disabled = false;
  document.getElementById('txtFechaApl').disabled = false;
  document.getElementById('txtFechaEla').disabled = false;

  document.getElementById('btnGrdNmb').disabled = false;
  document.getElementById('btnGrdFchEl').disabled = false;
  document.getElementById('btnGrdFchAp').disabled = false;

  infoCom.addClass('hidden');
  btnModificarAg.addClass('hidden');
  btnGuardarAg.addClass('hidden');
  btnCancelarAg.addClass('hidden');
}

function cancelar(){
  txtNombre.val('');
    swal({
        title: '¡Cancelar!',
        text: "¿Está seguro que desea cancelar la captura?",
        type: 'info',
        showCancelButton: true,
        closeOnConfirm: false
      },
      function(isConfirm) {
        if (isConfirm) {
          location.reload();
        }
  });
}

function regresar(){
  pnl1.removeClass('hidden');
  lbltm.addClass('hidden');
  btnRegresarTem.addClass('hidden');
  subtema.addClass('hidden');
}

function regresarSub(){
  Nombre.addClass('hidden');
  FechaEla.addClass('hidden');
  FechaApl.addClass('hidden');
  btnRegresarSub.addClass('hidden');
  subtema.removeClass('hidden');
  btnRegresarTem.removeClass('hidden');
  lblSub.addClass('hidden');
}

function Dg(){
  formselect.addClass('hidden');
  lblDg.addClass('hidden');
  Nombre.removeClass('hidden');
  FechaEla.removeClass('hidden');
  FechaApl.removeClass('hidden');
  btnRegresarSub.removeClass('hidden');
}

function regresarTipo(){
  numPreC.addClass('hidden');
  tipoPre.addClass('hidden');
  formselect.removeClass('hidden');
  btnDg.removeClass('hidden');
}

function regresarNumero (){
  formopm.addClass('hidden');
  agPre.addClass('hidden');
  numPreC.removeClass('hidden');
  btnRegresarTipo.removeClass('hidden');
}

btnGrdNmb.on('click',mostrarTema);
btnGrdFchEl.on('click',fechaEla);
btnGrdFchAp.on('click',fechaApl);
btnModificarAg.on('click',modificar);
btnCancelarAg.on('click',cancelar);
btnRegresarTem.on('click',regresar);
btnRegresarSub.on('click',regresarSub);
btnDg.on ('click',Dg);
btnRegresarTipo.on('click',regresarTipo);
btnRegresarNumero.on('click',regresarNumero);