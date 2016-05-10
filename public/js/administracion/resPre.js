var resA1 = $('#resA1'),resA2 = $('#resA2'),resB1 = $('#resB1'),resB2 = $('#resB2'),resC1 = $('#resC1'),resC2 = $('#resC2'),
    resD1 = $('#resD1'),resD2 = $('#resD2'),resE1 = $('#resE1'),resE2 = $('#resE2'),col2 = $('#col2'),txtOpA = $('#txtOpA'),
    txtOpB = $('#txtOpB'),txtOpC = $('#txtOpC'),txtOpD = $('#txtOpD'),txtOpE = $('#txtOpE'),btnSigPre = $('#btnSigPre'),
    txtA = $('#txtA'),txtB = $('#txtB'),txtC = $('#txtC'),txtD = $('#txtD'),txtE = $('#txtE'),resAc1 = $('#resAc1'),
    resAc2 = $('#resAc2'),resAc3 = $('#resAc3'),resAc4 = $('#resAc4'),resAc5 = $('#resAc5'),txtResA = $('#txtResA'),
    txtResB = $('#txtResB'),txtResC = $('#txtResC'),txtResD = $('#txtResD'),txtResE = $('#txtResE');

function agregarRes() {
    // body...
  var editar = $.ajax({
    url: 'agregarRes',
    data: {
      token: token.val(),
      resCorrecta: col2.val(),
      respuesta1: txtResA.val(),
      resActiva1: resAc1.val(),
      respuesta2: txtResB.val(),
      resActiva2: resAc2.val(),
      respuesta3: txtResC.val(),
      resActiva3: resAc3.val(),
      respuesta4: txtResD.val(),
      resActiva4: resAc4.val(),
      respuesta5: txtResE.val(),
      resActiva5: resAc5.val()
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
        title: '¡Guardar respuestas!',
        text: "¿Está seguro que desea guardar las respuestas?",
        type: 'info',
        showCancelButton: true,
        closeOnConfirm: true
      });
      ciclo();
      btnGuardarPre.removeClass('hidden');
      document.getElementById('txtPreg').disabled = false;
      txtNumPre.val('');
      document.getElementById('slctRes').value = 0;
      txtResA.val('');
      txtResB.val('');
      txtResC.val('');
      txtResD.val('');
      txtResE.val('');
   }
    else{
      alert(resultado.message);
    }
}

//Select para elegir el numero de respuestas de la pregunta
function howMany(form){ 
  var combo = document.getElementById('slctRes');
  var mitexto = $("#slctRes option:selected").text();
  //document.getElementById('res').innerHTML= mitexto;
  if (mitexto == 0) {
    //resA.removeClass('checked');
    txtA.addClass('hidden');
    txtB.addClass('hidden');
    txtC.addClass('hidden');
    txtD.addClass('hidden');
    txtE.addClass('hidden');
  }

  if (mitexto > 0 && mitexto < 2) {
    //resA.removeClass('checked');
    txtA.removeClass('hidden');
    txtB.addClass('hidden');
    txtC.addClass('hidden');
    txtD.addClass('hidden');
    txtE.addClass('hidden');
  }

  if (mitexto > 1 && mitexto < 3) {
    txtA.removeClass('hidden');
    txtB.removeClass('hidden');
    txtC.addClass('hidden');
    txtD.addClass('hidden');
    txtE.addClass('hidden');
  }

  if (mitexto > 2 && mitexto < 4) {
    txtA.removeClass('hidden');
    txtB.removeClass('hidden');
    txtC.removeClass('hidden');
    txtD.addClass('hidden');
    txtE.addClass('hidden');
  }

  if (mitexto > 3 && mitexto < 5) {
    txtA.removeClass('hidden');
    txtB.removeClass('hidden');
    txtC.removeClass('hidden');
    txtD.removeClass('hidden');
    txtE.addClass('hidden');
  }

  if (mitexto > 4 && mitexto < 6) {
    txtA.removeClass('hidden');
    txtB.removeClass('hidden');
    txtC.removeClass('hidden');
    txtD.removeClass('hidden');
    txtE.removeClass('hidden');
  }
}

/* ---------------------------Inciso A--------------------------- */
function porRangoA1(){
  if( resA1.prop('checked') ) {
    resA2.prop('checked', false);
    resB2.prop('checked', true);
    resC2.prop('checked', true);
    resD2.prop('checked', true);
    resE2.prop('checked', true);
    resB1.prop('checked', false);
    resC1.prop('checked', false);
    resD1.prop('checked', false);
    resE1.prop('checked', false);
    col2.removeClass('hidden');
    txtOpA.removeClass('hidden');
    document.getElementById('txtOpA').disabled = true;
    txtOpA.val('A');
    txtOpB.addClass('hidden');
    txtOpC.addClass('hidden');
    txtOpD.addClass('hidden');
    txtOpE.addClass('hidden');
  }
  else{
    txtOpA.val('');
    resB2.prop('checked', false);
    resC2.prop('checked', false);
    resD2.prop('checked', false);
    resE2.prop('checked', false);
  }
}
function porPeriodoA2(){
  if( resA2.prop('checked') ) {
    resA1.prop('checked', false);
    resB2.prop('checked', false);
    resC2.prop('checked', false);
    resD2.prop('checked', false);
    resE2.prop('checked', false); 
    col2.addClass('hidden');
    txtOpA.addClass('hidden');  
  }
}

/* ---------------------------Inciso B--------------------------- */
function porRangoB1(){
  if( resB1.prop('checked') ) {
    resB2.prop('checked', false);
    resA2.prop('checked', true);
    resC2.prop('checked', true);
    resD2.prop('checked', true);
    resE2.prop('checked', true);
    resA1.prop('checked', false);
    resC1.prop('checked', false);
    resD1.prop('checked', false);
    resE1.prop('checked', false);
    col2.removeClass('hidden');
    txtOpB.removeClass('hidden');
    document.getElementById('txtOpB').disabled = true;
    txtOpB.val('B');
    txtOpA.addClass('hidden');
    txtOpC.addClass('hidden');
    txtOpD.addClass('hidden');
    txtOpE.addClass('hidden');    
  }
  else{
    txtOpB.val('');
    resA2.prop('checked', false);
    resC2.prop('checked', false);
    resD2.prop('checked', false);
    resE2.prop('checked', false);
  }
}
function porPeriodoB2(){
  if( resB2.prop('checked') ) {
    resB1.prop('checked', false);
    resA2.prop('checked', false);
    resC2.prop('checked', false);
    resD2.prop('checked', false);
    resE2.prop('checked', false);   
    col2.addClass('hidden');
    txtOpB.addClass('hidden');  
  }
}

/* ---------------------------Inciso C--------------------------- */
function porRangoC1(){
  if( resC1.prop('checked') ) {
    resC2.prop('checked', false);
    resA2.prop('checked', true);
    resB2.prop('checked', true);
    resD2.prop('checked', true);
    resE2.prop('checked', true);
    resA1.prop('checked', false);
    resB1.prop('checked', false);
    resD1.prop('checked', false);
    resE1.prop('checked', false);
    col2.removeClass('hidden');
    txtOpC.removeClass('hidden');
    document.getElementById('txtOpC').disabled = true;
    txtOpC.val('C');  
    txtOpA.addClass('hidden');
    txtOpB.addClass('hidden');
    txtOpD.addClass('hidden');
    txtOpE.addClass('hidden');   
  }
  else{
    txtOpC.val('');
    resA2.prop('checked', false);
    resB2.prop('checked', false);
    resD2.prop('checked', false);
    resE2.prop('checked', false);
  }
}
function porPeriodoC2(){
  if( resC2.prop('checked') ) {
    resC1.prop('checked', false);
    resA2.prop('checked', false);
    resB2.prop('checked', false);
    resD2.prop('checked', false);
    resE2.prop('checked', false); 
    col2.addClass('hidden');
    txtOpC.addClass('hidden');    
  }
}

/* ---------------------------Inciso D--------------------------- */
function porRangoD1(){
  if( resD1.prop('checked') ) {
    resD2.prop('checked', false);
    resA2.prop('checked', true);
    resB2.prop('checked', true);
    resC2.prop('checked', true);
    resE2.prop('checked', true);
    resA1.prop('checked', false);
    resB1.prop('checked', false);
    resC1.prop('checked', false);
    resE1.prop('checked', false);
    col2.removeClass('hidden');
    txtOpD.removeClass('hidden');
    document.getElementById('txtOpD').disabled = true;
    txtOpD.val('D'); 
    txtOpA.addClass('hidden');
    txtOpB.addClass('hidden');
    txtOpC.addClass('hidden');
    txtOpE.addClass('hidden');   
  }
  else{
    txtOpD.val('');
    resA2.prop('checked', false);
    resB2.prop('checked', false);
    resC2.prop('checked', false);
    resE2.prop('checked', false);
  }
}
function porPeriodoD2(){
  if( resD2.prop('checked') ) {
    resD1.prop('checked', false);
    resA2.prop('checked', false);
    resB2.prop('checked', false);
    resC2.prop('checked', false);
    resE2.prop('checked', false);
    col2.addClass('hidden');
    txtOpD.addClass('hidden');  
  }
}

/* ---------------------------Inciso E--------------------------- */
function porRangoE1(){
  if( resE1.prop('checked') ) {
    resE2.prop('checked', false);
    resA2.prop('checked', true);
    resB2.prop('checked', true);
    resC2.prop('checked', true);
    resD2.prop('checked', true); 
    resA1.prop('checked', false);
    resB1.prop('checked', false);
    resC1.prop('checked', false);
    resD1.prop('checked', false);   
    col2.removeClass('hidden');
    txtOpE.removeClass('hidden');
    document.getElementById('txtOpE').disabled = true;
    txtOpE.val('E');
    txtOpA.addClass('hidden');
    txtOpB.addClass('hidden');
    txtOpC.addClass('hidden');
    txtOpD.addClass('hidden');
  }
  else{
    txtOpE.val('');
    resA2.prop('checked', false);
    resB2.prop('checked', false);
    resC2.prop('checked', false);
    resD2.prop('checked', false);
  }
}
function porPeriodoE2(){
  if( resE2.prop('checked') ) {
    resE1.prop('checked', false);
    resA2.prop('checked', false);
    resB2.prop('checked', false);
    resC2.prop('checked', false);
    resD2.prop('checked', false);
    col2.addClass('hidden');
    txtOpE.addClass('hidden');    
  }
}

btnSigPre.on('click',agregarRes);
resA1.on('click',porRangoA1);
resA2.on('click',porPeriodoA2);
resB1.on('click',porRangoB1);
resB2.on('click',porPeriodoB2);
resC1.on('click',porRangoC1);
resC2.on('click',porPeriodoC2);
resD1.on('click',porRangoD1);
resD2.on('click',porPeriodoD2);
resE1.on('click',porRangoE1);
resE2.on('click',porPeriodoE2);