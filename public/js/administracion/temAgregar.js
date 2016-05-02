//variables del select de temas
var token = $('#token');

var txtTema = $('#txtTema'),txtSubTema = $('#txtSubTema'),txtActivos = $('#txtActivos'),
    btnCancelarTem = $('#btnCancelarTem'),btnGuardarTem = $('#btnGuardarTem'),
    btnCancelarSub = $('#btnCancelarSub'),btnGuardarSub = $('#btnGuardarSub'),
    txtActivot = $('#txtActivot'),btnTema = $('#btnTema'),btnTemas = $('#btnTemas'),
    btnSubtemas = $('#btnSubtemas'),btnTemaSi = $('#btnTemaSi'),btnTemaNo = $('#btnTemaNo'),
    btnTemaSiEx = $('#btnTemaSiEx'),btnTemaNoEx = $('#btnTemaNoEx'),
    btnTemaSiExsub = $('#btnTemaSiExsub'),btnTemaNoExsub = $('#btnTemaNoExsub'),btnTipo = $('#btnTipo'),
    Combo = $('#Combo'),subCombo = $('#subCombo'),subtema = $('#subtema'),subtemaAg = $('#subtemaAg'),
    dg = $('#dg'),tema = $('#tema'),pnl1 = $('#pnl1'),temAceptar = $('#temAceptar'),
    subAceptar = $('#subAceptar'),lbltm = $('#lbltm'),lblSub = $('#lblSub'),
    botones =$('#botones'),label4 = $('#label4'),label5 = $('#label5'),
    mosTem = $('#mosTem'),mosSub = $('#mosSub'),lblNombre = $('#lblNombre'),formselect = $('#formselect'),
    tipoPre = $('#tipoPre'),formopm = $('#formopm'),slctRes = $('#slctRes'), Nombre = $('#Nombre'),
    FechaEla = $('#FechaEla'),FechaApl = $('#FechaApl'),selTema = $('#selTema'),numPreC = $('#numPreC'),
    btnRegresarTem = $('#btnRegresarTem'),selCombo = $('#selCombo');

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
        closeOnConfirm: true
      },
      function(isConfirm) {
        if (isConfirm) {
          txtTema.val('');
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
        closeOnConfirm: true
      },
      function(isConfirm) {
        if (isConfirm) {
          txtSubTema.val('');
        }
  });
    }
    else{
      alert(resultado.message);
    }
}

function cancelarTem(){
  tema.addClass('hidden');
}

function cancelarSub(){
  subtema.addClass('hidden');
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
      //obtención de selección del select
      var combo = document.getElementById('selTema');
      var mitexto = $("#selTema option:selected").text();
      console.log("hola");
      //document.getElementById('subSel').innerHTML= mitexto; //valor asignado al id sleccionado
      
}

function tipo(){
  formselect.addClass('hidden');
  btnDg.addClass('hidden');
  tipoPre.removeClass('hidden');
  numPreC.removeClass('hidden');
  btnRegresarTipo.removeClass('hidden');
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
btnCancelarSub.on('click',cancelarSub);
btnGuardarSub.on('click',subAgregar);
btnCancelarTem.on('click',cancelarTem);
btnGuardarTem.on('click',temAgregar)
btnTipo.on('click',tipo);