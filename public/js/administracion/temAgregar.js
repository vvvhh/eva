//variables del select de temas
var txtTema = $('#txtTema'),
txtSubTema = $('#txtSubTema'),
btnCancelarTem = $('#btnCancelarTem'),
btnGuardarTem = $('#btnGuardarTem'),
txtActivot = $('#txtActivot'),
token = $('#token'),
btnTema = $('#btnTema'),
btnTemaSi = $('#btnTemaSi'),
btnTemaNo = $('#btnTemaNo'),
btnTemaSiEx = $('#btnTemaSiEx'),
btnTemaNoEx = $('#btnTemaNoEx'),
btnTemaSiExsub = $('#btnTemaSiExsub'),
btnTemaNoExsub = $('#btnTemaNoExsub'),
Combo = $('#Combo'),
subCombo = $('#subCombo'),
subtema = $('#subtema'),
dg = $('#dg');

function temAgregar(){
  var editar = $.ajax({
    url: 'temAgregar',
    data: {
      token: token.val(),
      tema: txtTema.val(),
      subtema: txtSubTema.val(),
      activo: txtActivot.val(),
    },
    type: 'post',
    dataType:'json',
      async:false
    }).error(function(e){
        alert('Ocurrio un error, intente de nuevo');
    }).responseText;

    var resultado;
    try{
      resultado = JSON.parse(editar);
    }catch (e){
        alert('Error JSON ' + e);
    }

    if ( resultado.status == 'OK' ){  
      swal({
        title: "Guardado.",
        text: "Tema y Subtema guardados con éxito.",
        type: "success",
        showCancelButton: true,
        showConfirmButton: true,
      });
    }
    else{
      alert(resultado.message);
    }
}

function Cancelar(){
  txtTema.val('');
  txtSubTema.val('');
}

function rediTem(){
  swal({
        title: '¡Agregar tema!',
        text: "¿Está seguro que desea agregar un tema nuevo?",
        type: 'info',
        showCancelButton: true,
        closeOnConfirm: true
      },
      function(isConfirm) {
        if (isConfirm) {
          window.location.href = 'temAgregar';
          document.getElementById("selCombo").disabled = true;
          document.getElementById('selCombo').size=1;
        }
  });
}

function habilitar(){
  swal({
        title: '¡Agregar tema!',
        text: "¿Está seguro que no desea agregar un tema nuevo?",
        type: 'info',
        showCancelButton: true,
        closeOnConfirm: true
      },
      function(isConfirm) {
        if (isConfirm) {
          /*swal(
            '¡Continuar!',
            'success'
          );*/
          document.getElementById("selCombo").disabled = false;
          document.getElementById('selCombo').size=10;
          //expand(selCombo);
        }
  });
}

function existe(){
  swal({
        title: '¡Tema existente!',
        text: "¿Está seguro que existe el tema que necesita si no estas seguro  favor de verificarlo en la parte de consulta?",
        type: 'info',
        showCancelButton: true,
        closeOnConfirm: false
      },
      function(isConfirm) {
        if (isConfirm) {
          swal(
            '¡Continuar!',
            'success'
          );
          Combo.removeClass('hidden');
          document.getElementById("selCombo").disabled = false;
          document.getElementById('selCombo').size=10;
          subtema.removeClass('hidden');
        }
  });
}

function noexiste(){
  swal({
        title: '¡Continuar!',
        text: "Será redireccionado al formulario para agregar un nuevo tema",
        type: 'info',
        showCancelButton: true,
        closeOnConfirm: true
      },
      function(isConfirm) {
        if (isConfirm) {
          window.location.href = 'temAgregar';
          document.getElementById("selCombo").disabled = true;
          document.getElementById('selCombo').size=1;
        }
  });
}

//subtema
function existesub(){
  swal({
        title: '¡Subtema existente!',
        text: "¿Está seguro que existe el subtema que necesita si no estas seguro favor de verificarlo en la parte de consulta?",
        type: 'info',
        showCancelButton: true,
        closeOnConfirm: false
      },
      function(isConfirm) {
        if (isConfirm) {
          swal(
            '¡Continuar!',
            'success'
          );
          subCombo.removeClass('hidden');
          document.getElementById("selComboSub").disabled = false;
          document.getElementById('selComboSub').size=10;
          dg.removeClass('hidden')
        }
  });
}

function noexistesub(){
  swal({
        title: '¡Continuar!',
        text: "Será redireccionado al formulario para agregar un nuevo subtema",
        type: 'info',
        showCancelButton: true,
        closeOnConfirm: true
      },
      function(isConfirm) {
        if (isConfirm) {
          window.location.href = 'temAgregar';
          document.getElementById("selCombo").disabled = true;
          document.getElementById('selCombo').size=1;
        }
  });
}

btnCancelarTem.on('click',Cancelar);
btnGuardarTem.on('click',temAgregar);
btnTema.on('click',rediTem);
btnTemaSi.on('click',rediTem);
btnTemaNo.on('click',habilitar);
btnTemaSiEx.on('click',existe);
btnTemaNoEx.on('click',noexiste);
btnTemaSiExsub.on('click',existesub);
btnTemaNoExsub.on('click',noexistesub);