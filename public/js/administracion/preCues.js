var btnAceptarC = $('#btnAceptarC'),txtNumPre = $('#txtNumPre'),preAc = $('#preAc'),txtPreg = $('#txtPreg'),
	btnGuardarPre = $('#btnGuardarPre'),pnlRes = $('#pnlRes'),agPreNum = $('#agPreNum'),numPreC = $('#numPreC'),
  agPre = $('#agPre'),chkAbierta = $('#chkAbierta'),chkMix = $('#chkMix'),chkOpMul = $('#chkOpMul'),
  formopm = $('#formopm'),btnModificarPre = $('#btnModificarPre'),btnIngresarRes = $('#btnIngresarRes'),
  txtResA = $('#txtResA'),txtResB = $('#txtResB'),txtResC = $('#txtResC'),txtResD = $('#txtResD'),txtResE = $('#txtResE');

function cicloPre() {
	// body...
  var q=txtNumPre.val();
  document.getElementById('agPreNum').innerHTML= q;
  numPreC.addClass('hidden');
  btnRegresarTipo.addClass('hidden');
  btnRegresarNumero.removeClass('hidden');
  agPre.removeClass('hidden');
  formopm.removeClass('hidden');
  txtNumPre.val('');
  //ciclo para gregar pregunntas 
}

function ciclo(){
  console.log('inicio ciclo');
  nPreguntas=txtNumPre.val();
  if ((nPreguntas>0)&&(i<nPreguntas)) {   /*checa que sea mayor a 0 y que i sea menor al total de preguntas*/

    txtNumPre.val('');
    document.getElementById('slctRes').value = 0;
    txtResA.val('');
    txtResB.val('');
    txtResC.val('');
    txtResD.val('');
    txtResE.val('');
    i++;          /*aumenta en 1 para ingresar una pregunta */
    console.log(i);
  }
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
      //getPreId();
      console.log('getPreId');
      btnGuardarPre.addClass('hidden');
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
  btnGuardarPre.removeClass('hidden');
  document.getElementById('txtPreg').disabled = false;
}

function btnIngresarResFun(){
  btnModificarPre.addClass('hidden');
  btnIngresarRes.addClass('hidden');
  pnlRes.removeClass('hidden');
  //txtPreg.html('');
}

function getPreId(){
  var datos = $.ajax({
    url: 'getPreId',
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
      $.each(res.data, function(k,o){
        txtTemaId.val($ID);
      });
}

btnAceptarC.on('click',cicloPre);
btnGuardarPre.on('click',agregarPre);
btnModificarPre.on('click',modPre);
btnIngresarRes.on('click',btnIngresarResFun);