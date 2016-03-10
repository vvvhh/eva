//variables del select de temas
var txtTema = $('#txtTema'),
btnCancelarTem = $('#btnCancelarTem'),
btnGuardarTem = $('#btnGuardarTem'),
token = $('#token');

function temAgregar(){

  console.log("teamAgregar");

  var editar = $.ajax({
    url: 'temAgregarC',
    data: {
      token: token.val(),
      tema: txtTema.val(),
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
    console.log("teamAgregar OK");  
      swal({
        title: "Guardado.",
        text: "Cuestionario guardado con éxito.",
        type: "success",
        showNegativeButton: true,
        showConfirmButton: true,
      });
    }
    else{
      alert(resultado.message);
    }
}

function temCancelar(){
  txtTema.val('');
}

btnCancelarTem.on('click',temCancelar);
btnGuardarTem.on('click',temAgregar);