var btnAceptarC = $('#btnAceptarC'),txtNumPre = $('#txtNumPre'),preAc = $('#preAc'),txtPreg = $('#txtPreg'),
	btnGuardarPre = $('#btnGuardarPre'),pnlRes = $('#pnlRes'),agPreNum = $('#agPreNum'),numPreC = $('#numPreC'),
  agPre = $('#agPre'),chkAbierta = $('#chkAbierta'),chkMix = $('#chkMix'),chkOpMul = $('#chkOpMul');

var txtA = $('#txtA'),txtB = $('#txtB'),txtC = $('#txtC'),txtD = $('#txtD'),txtE = $('#txtE'),resA = $('#resA'),
    resB = $('#resB'),resC = $('#resC'),resD = $('#resD'),resE = $('#resE');

function cicloPre() {
	// body...
  var q=txtNumPre.val();
  document.getElementById('agPreNum').innerHTML= q;
  numPreC.addClass('hidden');
  agPre.removeClass('hidden');
  //txtNumPre.val('');
  //ciclo para gregar pregunntas 
	formselect.removeClass('hidden');
	chkAbierta.disabled = false;
	chkOpMul.disabled = false;
	chkMix.disabled = false;
  var i = 0;
    do {
        //document.write(i + " ");

        i++;
    } while (i < q);
}

function agregarPre() {
	// body...
	pnlRes.removeClass('hidden');
  txtPreg.html('');
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
      document.getElementsByTagName('slctRes').value = 0;
      //swal();
      //numPreC.removeClass('hidden');
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

//Select para elegir el numero de respuestas de la pregunta
function howMany(form){ 
  var combo = document.getElementById('slctRes');
  var mitexto = $("#slctRes option:selected").text()
  document.getElementById('res').innerHTML= mitexto;
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

btnAceptarC.on('click',cicloPre);
btnGuardarPre.on('click',agregarPre);