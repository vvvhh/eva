var btnAceptarC = $('#btnAceptarC'),txtNumPre = $('#txtNumPre'),preAc = $('#preAc'),txtPreg = $('#txtPreg'),
	btnGuardarPre = $('#btnGuardarPre'),pnlRes = $('#pnlRes'),agPreNum = $('#agPreNum'),numPreC = $('#numPreC'),
  agPre = $('#agPre'),chkAbierta = $('#chkAbierta'),chkMix = $('#chkMix'),chkOpMul = $('#chkOpMul'),
  formopm = $('#formopm'),btnModificarPre = $('#btnModificarPre'),btnIngresarRes = $('#btnIngresarRes');

function cicloPre() {
	// body...
  var q=txtNumPre.val();
  document.getElementById('agPreNum').innerHTML= q;
  numPreC.addClass('hidden');
  btnRegresarTipo.addClass('hidden');
  btnRegresarNumero.removeClass('hidden');
  agPre.removeClass('hidden');
  txtNumPre.val('');
  //ciclo para gregar pregunntas 
  ciclo();
}

function ciclo(){
  var q=txtNumPre.val();
  var i = 0;
    do {
        //formopm.html('');
        formopm.removeClass('hidden');
        i++;
        console.log(i);
    } while (i < q);
}

function agregarPre() {
	// body...
  var editar = $.ajax({
    url: 'agregarPre',
    data: {
      token: token.val(),
      pregunta: txtPreg.val(),
      preActiva: preAc.val()
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
        title: '¡Guardar Pregunta!',
        text: "¿Está seguro que desea guardar la pregunta?",
        type: 'info',
        showCancelButton: true,
        closeOnConfirm: false
      });
      btnIngresarRes.removeClass('hidden');
      btnModificarPre.removeClass('hidden');
      document.getElementById('txtPreg').disabled = true;
      document.getElementsByTagName('slctRes').value = 0;
   }
    else{
      alert(resultado.message);
    }
}

/*    CÓDIGO DE LAS PREGUNTAS PARA EDITAR Y GUARDAR     */
function Aceptar(){
  formpom.addClass('hidden');
  formprea.addClass('hidden');
}

function modPre(){
  btnModificarPre.addClass('hidden');
  btnIngresarRes.addClass('hidden');
  document.getElementById('txtPreg').disabled = false;
}

function btnIngresarResFun(){
  pnlRes.removeClass('hidden');
  //txtPreg.html('');
}

btnAceptarC.on('click',cicloPre);
btnGuardarPre.on('click',agregarPre);
btnModificarPre.on('click',modPre);
btnIngresarRes.on('click',btnIngresarResFun);