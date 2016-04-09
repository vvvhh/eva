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
dg = $('#dg'),
tema = $('#tema'),
pnl1 = $('#pnl1'),
temAceptar = $('#temAceptar'),
subAceptar = $('#subAceptar'),
lbltm = $('#lbltm'),
lblSub = $('#lblSub'),
botones =$('#botones');

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
        text: "¿Está seguro que es el tema que desea?",
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
          tema.removeClass('hidden');
          Combo.removeClass('hidden');
          document.getElementById("selCombo").disabled = false;
          subtema.removeClass('hidden');
        }
  });
}

function noexiste(){
  window.location.href = 'temAgregar';
  document.getElementById("selCombo").disabled = true;
  document.getElementById('selCombo').size=1;
}

//subtema
function existesub(){
  swal({
        title: '¡Subtema existente!',
        text: "¿Está seguro que es el subtema que desea?",
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
          dg.removeClass('hidden');
          botones.removeClass('hidden');
        }
  });
}

function noexistesub(){
  window.location.href = 'temAgregar';
  document.getElementById("selCombo").disabled = true;
  document.getElementById('selCombo').size=1;
}

function aceptado(){
  pnl1.addClass('hidden');
  lbltm.removeClass('hidden');
}

function sub(){
  subtema.addClass('hidden');
  lblSub.removeClass('hidden');
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
temAceptar.on('click',aceptado);
subAceptar.on('click',sub);