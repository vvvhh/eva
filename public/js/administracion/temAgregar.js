//variables del select de temas
var txtTema = $('#txtTema'),
btnCancelarTem = $('#btnCancelarTem'),
btnGuardarTem = $('#btnGuardarTem');

function temAgregar(){
  var editar = $.ajax({
    url: 'temAgregar',
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
      swal({
        title: "Esta seguro q sus datos son correctos.",
        text: "Verificar datos.",
        type: "success",
        showNegativeButton: true,
        showConfirmButton: true,
      });
      swal({
        title: "Guardado.",
        text: "Cuestionario guardado con éxito.",
        type: "success",
        showNegativeButton: true,
        showConfirmButton: true,
      });
      //swal();
      document.location=('./cueEditar')
      pnlAgregar.addClass('hidden');
      formselect.removeClass('hidden'); //mostrar formulario de opción multiple
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