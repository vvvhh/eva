var btnAceptarC = $('#btnAceptarC');
	//formselect = $;

function agregarPre() {
	// body...
	formselect.removeClass('hidden');
	chkAbierta.disabled = false;
	chkOpMul.disabled = false;
	chkMix.disabled = false;
}

/*    CÓDIGO DE LAS PREGUNTAS PARA EDITAR Y GUARDAR     */
function Aceptar(){
  formpom.addClass('hidden');
  formprea.addClass('hidden');
}

btnAceptarC.on('click',agregarPre);