//variables del select de temas
var txtTema = $('#txtTema'),
txtSubTema = $('#txtSubTema'),
btnCancelarTem = $('#btnCancelarTem'),
btnGuardarTem = $('#btnGuardarTem'),
txtActivot = $('#txtActivot'),
token = $('#token'),
btnTema = $('#btnTema');

function temAgregar(){
  var editar = $.ajax({
    url: 'temAgregar',
    data: {
      token: token.val(),
      tema: txtTema.val(),
      subtema: txtSubTema.val(),
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
        text: "Tema y Subtema guardados con éxito.",
        type: "success",
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
  window.location.href = 'temAgregar';
}

btnCancelarTem.on('click',Cancelar);
btnGuardarTem.on('click',temAgregar);
btnTema.on('click',rediTem);