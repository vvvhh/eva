//variables del select de temas
var txtTema = $('#txtTema'),txtSubTema = $('#txtSubTema'),txtActivos = $('#txtActivos'),
    btnCancelarTem = $('#btnCancelarTem'),btnGuardarTem = $('#btnGuardarTem'),
    btnCancelarSub = $('#btnCancelarSub'),btnGuardarSub = $('#btnGuardarSub'),
    txtActivot = $('#txtActivot'),btnTema = $('#btnTema'),btnTemas = $('#btnTemas'),
    btnSubtemas = $('#btnSubtemas'),btnTemaSi = $('#btnTemaSi'),btnTemaNo = $('#btnTemaNo'),
    btnTemaSiEx = $('#btnTemaSiEx'),btnTemaNoEx = $('#btnTemaNoEx'),
    btnTemaSiExsub = $('#btnTemaSiExsub'),btnTemaNoExsub = $('#btnTemaNoExsub'),btnTipo = $('#btnTipo'),
    token = $('#token'),
    Combo = $('#Combo'),subCombo = $('#subCombo'),subtema = $('#subtema'),
    dg = $('#dg'),tema = $('#tema'),pnl1 = $('#pnl1'),temAceptar = $('#temAceptar'),
    subAceptar = $('#subAceptar'),lbltm = $('#lbltm'),lblSub = $('#lblSub'),
    botones =$('#botones'),label4 = $('#label4'),label5 = $('#label5'),
    mosTem = $('#mosTem'),mosSub = $('#mosSub'),lblNombre = $('#lblNombre'),formselect = $('#formselect'),
    tipoPre = $('#tipoPre'),formopm = $('#formopm'),slctRes = $('#slctRes'), Nombre = $('#Nombre'),
    FechaEla = $('#FechaEla'),FechaApl = $('#FechaApl'),selTema = $('#selTema'),numPreC = $('#numPreC');

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
        title: '¡Tema Agregado!',
        text: "El Tema fue agragdo con exito",
        type: 'info',
        showCancelButton: true,
      },
      function(isConfirm) {
        if (isConfirm) {
          pnl1.addClass('hidden');
          txtTema.val('');
          lblNombre.removeClass('hidden');
          subtema.removeClass('hidden');
        }
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
      tema: selTema.val(),
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
        title: '¡Subtema Agregado!',
        text: "El subtema fue agragdo con exito",
        type: 'info',
        showCancelButton: true,
      },
      function(isConfirm) {
        if (isConfirm) {
          pnl1.addClass('hidden');
          txtSubTema.val('');
          lblNombre.removeClass('hidden');

        }
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
        }
  });
}

function habilitar(){
  swal({
        title: '¡Agregar tema!',
        text: "¿Está seguro que desea agregar un tema nuevo?",
        type: 'info',
        showCancelButton: true,
        closeOnConfirm: true
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
            'Este tema será utilizado para su cuestionario'
          );
          tema.removeClass('hidden');
          subtema.removeClass('hidden');
          pnl1.addClass('hidden');
          lbltm.removeClass('hidden');
        }
  });
    //obtención de selección del select
    var combo = document.getElementById('selCombo');
    var mitexto = $("#selCombo option:selected").text();
    console.log("tema"+mitexto);
    document.getElementById('temSel').innerHTML= mitexto; //valor asignado al id sleccionado
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
            'El subtema que selecciono sera el de su cuestionario.'
          );
          document.getElementById("selComboSub").disabled = false;
          subtema.addClass('hidden');
          lblSub.removeClass('hidden');
          Nombre.removeClass('hidden');
          FechaEla.removeClass('hidden');
          FechaApl.removeClass('hidden');
        }
  });
  //obtención de selección del select
  var combo = document.getElementById('selComboSub');
  var mitexto = $("#selComboSub option:selected").text();
  document.getElementById('subSel').innerHTML= mitexto; //valor asignado al id sleccionado
}

function noexistesub(){
  window.location.href = 'temAgregar';
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

      mostrarTema();

      /*selTema.find('option').each(
          function(){
            if ( o.cueTema == $(this).val() )
            selTema.val(o.cueTema);
          }
        );*/
      //obtención de selección del select
      var combo = document.getElementById('selTema');
      var mitexto = $("#selTema option:selected").text();
      console.log("hola");
      //document.getElementById('subSel').innerHTML= mitexto; //valor asignado al id sleccionado
      
}

function tipo(){
  formselect.addClass('hidden');
  tipoPre.removeClass('hidden');
  numPreC.removeClass('hidden');
  txtPreg.html('');
  slctRes.val(0);
  var combo = document.getElementById('selTipo');
  var mitexto = $("#selTipo option:selected").text()
  document.getElementById('tipoPreEle').innerHTML= mitexto; //valor asignado al id sleccionado
}

function mostrarTema(){
  console.log("mostrarTema");
  var datos = $.ajax({
    url: 'mostrarTema',
    type: 'get',
        dataType:'json',
        async:false
    }).error(function(e){
        alert('Ocurrio un error, intente de nuevo');
    }).responseText;

    var res;
    try{
        res = JSON.parse(datos);
    }catch (e){
        alert('Error JSON ' + e);
    }
      selTema.html('');
      $.each(res.data, function(k,o){
        selTema.append(
          '<option value="'+o.temId+'">'+o.temTema+'</option>'
        );
      });
    document.getElementById('selTema');
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
btnTipo.on('click',tipo);