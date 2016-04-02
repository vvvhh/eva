var btnAceptarC = $('#btnAceptarC'),
	txtNumPre = $('#txtNumPre'),
  preAc = $('#preAc'),
	txtPreg = $('#txtPreg'),
	btnGuardarPre = $('#btnGuardarPre');
	//formselect = $;

function cicloPre() {
	// body...
	formselect.removeClass('hidden');
	chkAbierta.disabled = false;
	chkOpMul.disabled = false;
	chkMix.disabled = false;
}

function agregarPre() {
	// body...
	formselect.removeClass('hidden');
	chkAbierta.disabled = false;
	chkOpMul.disabled = false;
	chkMix.disabled = false;

	//ciclo para gregar pregunntas 
  for (var i = 0; i < txtNumPre; i++) {
  if (txtNumPre>=preNum) {
    } 
  }

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
        title: "Esta seguro que sus datos son correctos.",
        text: "Verificar datos.",
        type: "success",
        showCancelButton: true,
        showConfirmButton: true
      });
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


btnAceptarC.on('click',cicloPre);
btnGuardarPre.on('click',agregarPre);