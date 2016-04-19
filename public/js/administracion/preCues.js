var btnAceptarC = $('#btnAceptarC'),txtNumPre = $('#txtNumPre'),preAc = $('#preAc'),txtPreg = $('#txtPreg'),
	btnGuardarPre = $('#btnGuardarPre'),pnlRes = $('#pnlRes'),agPreNum = $('#agPreNum'),numPreC = $('#numPreC'),
  agPre = $('#agPre'),chkAbierta = $('#chkAbierta'),chkMix = $('#chkMix'),chkOpMul = $('#chkOpMul');
	//formselect = $;

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
      swal({
        title: "Esta seguro que sus datos son correctos.",
        text: "Verificar datos.",
        type: "success",
        showCancelButton: true,
        showConfirmButton: true
      });
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
    var numObj = parseInt(form.numObject.value); 
    var html = '';
    var container = document.getElementById('myemailtextbox');

        if (numObj > 0) { 
            for(i=1; i<=numObj; i++) { 
               //html += '<I> Respuesta ' + i + ':</I> <input "text" size=100,10 name="email' + i +'">    <input type="checkbox" name="transporte"  value="1"><br><br>'; 
               html += '<i> Respuesta ' + i + ':</i> <textarea name="comentarios" rows="8" cols="100"></textarea> <input type="checkbox" name="transporte"  value="1"><br>';
            } 
        } /*else { 
               html += '<I> Respuesta ' + i + ':</I> <input type="text" name="email"><input type="checkbox" name="transporte"  value="1"><br><br>'; 
        }*/

container.innerHTML = html;

} 

btnAceptarC.on('click',cicloPre);
btnGuardarPre.on('click',agregarPre);