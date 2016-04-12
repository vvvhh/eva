//variables del select de temas
var txtTema = $('#txtTema'),txtSubTema = $('#txtSubTema'),txtActivos = $('#txtActivos'),
    btnCancelarTem = $('#btnCancelarTem'),btnGuardarTem = $('#btnGuardarTem'),
    btnCancelarSub = $('#btnCancelarSub'),btnGuardarSub = $('#btnGuardarSub'),
    txtActivot = $('#txtActivot'),btnTema = $('#btnTema'),btnTemas = $('#btnTemas'),
    btnSubtemas = $('#btnSubtemas'),btnTemaSi = $('#btnTemaSi'),btnTemaNo = $('#btnTemaNo'),
    btnTemaSiEx = $('#btnTemaSiEx'),btnTemaNoEx = $('#btnTemaNoEx'),
    btnTemaSiExsub = $('#btnTemaSiExsub'),btnTemaNoExsub = $('#btnTemaNoExsub'),
    token = $('#token'),
    Combo = $('#Combo'),subCombo = $('#subCombo'),subtema = $('#subtema'),
    dg = $('#dg'),tema = $('#tema'),pnl1 = $('#pnl1'),temAceptar = $('#temAceptar'),
    subAceptar = $('#subAceptar'),lbltm = $('#lbltm'),lblSub = $('#lblSub'),
    botones =$('#botones'),label4 = $('#label4'),label5 = $('#label5'),
    mosTem = $('#mosTem'),mosSub = $('#mosSub');

function temAgregar(){
  var editar = $.ajax({
    url: 'temAgregar',
    data: {
      token: token.val(),
      tema: txtTema.val(),
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
        text: "Tema guardado con éxito.",
        type: "success",
        showCancelButton: true,
        showConfirmButton: true,
      });
    }
    else{
      alert(resultado.message);
    }
}

function subAgregar(){
  var editar = $.ajax({
    url: 'subAgregar',
    data: {
      token: token.val(),
      subtema: txtSubTema.val(),
      activo: txtActivos.val(),
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
        text: "Subtema guardado con éxito.",
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
          window.location.href = 'temAgregar#tema';
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
            '¡Continuar!'
          );
          tema.removeClass('hidden');
          Combo.removeClass('hidden');
          document.getElementById("selCombo").disabled = false;
          //subtema.removeClass('hidden');
        }
  });
}

function noexiste(){
  window.location.href = 'temAgregar';
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
  subtema.removeClass('hidden');
  pnl1.addClass('hidden');
  lbltm.removeClass('hidden');
}

function sub(){
  subtema.addClass('hidden');
  lblSub.removeClass('hidden');
  dg.removeClass('hidden');
}

//redirección de botones de inicio
function Tema() {
      tema.removeClass('hidden');
      subtema.addClass('hidden');
      mosTem.removeClass('hidden');
      mosSub.addClass('hidden');

      btnTemas.addClass('botonActivo');
      btnSubtemas.addClass('botonNoactivo');

      btnTemas.removeClass('botonNoactivo');
      btnSubtemas.removeClass('botonActivo');
}

function subTema() {
      subtema.removeClass('hidden');
      tema.addClass('hidden');
      mosSub.removeClass('hidden');
      mosTem.addClass('hidden');

      btnTemas.addClass('botonNoactivo');
      btnSubtemas.addClass('botonActivo');

      btnTemas.removeClass('botonActivo');
      btnSubtemas.removeClass('botonNoactivo');
}

label4.on('click',Tema);
label5.on('click',subTema);
btnTemas.on('click',Tema);
btnSubtemas.on('click',subTema);
btnCancelarSub.on('click',Cancelar);
btnGuardarSub.on('click',subAgregar);

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