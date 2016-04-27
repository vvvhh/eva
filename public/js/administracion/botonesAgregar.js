var btnGrdFchEl = $('#btnGrdFchEl'), btnGrdFchAp = $('#btnGrdFchAp');

function mostrarTema(){
    swal({
        title: '¡Nombre Ingresado!',
        text: "¿Está seguro que es el nombre que desea ingresar?",
        type: 'info',
        showCancelButton: true,
        closeOnConfirm: false
      },
      function(isConfirm) {
        if (isConfirm) {
          swal(
          	'¡Guardado!',
            'El nombre a sido Guardado.',
            'success'
          );
          document.getElementById("txtNombre").disabled = true;
        }
  });
}

function fechaEla(){
	swal({
        title: '¡Fecha de elaboración Ingresada!',
        text: "¿Está seguro que es la fecha que desea ingresar?",
        type: 'info',
        showCancelButton: true,
        closeOnConfirm: false
      },
      function(isConfirm) {
        if (isConfirm) {
          swal(
            '¡Guardado!',
            'La fecha de elabración a sido guardada con éxito.',
            'success'
          );
          document.getElementById("fechaEla").disabled = true;
        }
  });
}

function fechaApl() {
	swal({
        title: '¡Fecha de Aplicación Ingresada!',
        text: "¿Está seguro que es la fecha que desea ingresar?",
        type: 'info',
        showCancelButton: true,
        closeOnConfirm: false
      },
      function(isConfirm) {
        if (isConfirm) {
          swal(
          	'¡Guardado!',
            'La fecha de aplicación a sido guardada con éxito.',
            'success'
          );
          document.getElementById("txtFechaApl").disabled = true;
        }
  });
}

btnGrdNmb.on('click',mostrarTema);
btnGrdFchEl.on('click',fechaEla);
btnGrdFchAp.on('click',fechaApl);