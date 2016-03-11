
var tblConsulta=$('#tblConsulta'),
tbodyConsulta=$('#tbodyConsulta');

var btnConsulta=$('#btnConsulta'),
btnEditar=$('#btnEditar'),
btnAgregar=$('#btnAgregar');

var pnlAgregar=$('#pnlAgregar');
    pnlConsulta=$('#pnlConsulta'),
    pnlInicio=$('#pnlInicio');

var tblServicios   = $('#tblServicios'),
    tbodyServicios = $('#tbodyServicios');

var txtNombreFuente = $('#txtNombreFuente'),
    txtCueId = $('#txtCueId'),
    formEditarServ= $('#formEditarServ'),
    txtActivo     = $('#txtActivo'),
    btnGuardar    = $('#btnGuardar'),
    btnCancelar   = $('#btnCancelar'),
    token         = $('#_token');

var btnCancelarAg = $('#btnCancelarAg'),
    token = $('#token'),
    txtNombre = $('#txtNombre'),
    slctTema = $('#slctTema'),
    selCombo = $('#selCombo'),
    txtSubTema = $('#txtSubTema'),
    txtFechaApl = $('#txtFechaApl'),
    txtFechaEla = $('#txtFechaEla'),
    btnGuardarAg =$('#btnGuardarAg'),
    txtFechaA =$('#txtFechaA'),
    slctTemaE =$('#slctTemaE'),
    txtNombreE =$('#txtNombreE');

var spnNombre=$('#spnNombre'),
    btnImprimir=$('#btnImprimir');

var formselect = $('#formselect'),
    formprea = $('#formprea'),
    formpom = $('#formpom');

/*Ide desde el icono editar de la tabla*/
function darBajaCues(){
  var id = $(this).attr('id');  
  if (id==="")
    return false;

  var datos = $.ajax({
    url: 'darBajaCues',
    data: {
      i: id,
      token: token.val()
    },
    type: 'post',
    dataType:'json',
    async:false
  }).error(function(e){
    alert('Ocurrio un error, intente de nuevo');
  }).responseText;

  var res;
  try{
      res = JSON.parse(datos);
      }catch(e){
      alert('Error JSON ' + e);
    }

    if ( res.status == 'OK' ){
      alert(res.message);
      getTodosCuestionarios();

    }
    else{
      alert(res.message);
    }
}

function editarCues(){
  var datos = $.ajax({
    url: 'editarCues',
    data: {
      token: token.val(),
      fecha:txtFechaA.val(),
      tema:slctTemaE.val(),
      subtema:txtSubTema.val(),
      nombre:txtNombreE.val(),
      activo:txtActivo.val(),
      i:txtCueId.val()
    },
    type: 'post',
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

    tbodyServicios.html('');
    if ( res.status == 'OK' ){
      limpiar();
      getTodosCuestionarios();
      swal({
        title: "Edición de información correcta.",
        text: res.message,
        timer: 2000,
        type: "success",
        showConfirmButton: true
      });
    }
    else {
        alert(res.message);
    }
}

function getTodosCuestionarios(){
  var datos = $.ajax({
    url: 'getCuestionarioConsultas',
    type: 'post',
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
    tbodyServicios.html('');
    if ( res.status == 'OK' ){
       var i = 1,
       b;
      $.each(res.data, function(k,o){
        if (o.temId == o.cueId) {
          b=o.temId;
        }
        if ( o.cueActivo == 1 ){
          status = '<span class="glyphicon glyphicon-ok text-success" title="Activo"></span>';
        }
        else{
          status = '<span class="glyphicon glyphicon-remove" title="Inactivo"></span>';
        }
        tbodyServicios.append(
          '<tr>'+
            '<td >'+o.cueFechaEla+'</td>'+
            '<td >'+o.cueFechaAp+'</td>'+
            '<td >'+b+'</td>'+
            '<td >'+o.cueNombre+'</td>'+
            '<td class="text-center">'+status+'</td>'+
            '<td class="text-center">'+
              '<span class="glyphicon glyphicon-edit text-primary"'+status+
            '</td>'+
            '<td class="text-center">'+
              '<span class="glyphicon glyphicon-trash text-danger"'+status+
            '</td>'+
          '</tr>'
      );
      i++;
      });

      }else{
      tbodyServicios.html('<tr><td colspan="8" class="center"><h3>'+ res.message +'</h3></td></tr>');
    }
}

function getCues(){
  var id = $(this).attr('id');
  if (id==="")
    return false;

  var datos = $.ajax({
    url: 'getCues',
    data: {
      i: id
    },
    type: 'post',
    dataType:'json',
    async:false
  }).error(function(e){
    alert('Ocurrio un error, intente de nuevo');
  }).responseText;

  var res;
  try{
      res = JSON.parse(datos);
      }catch(e){
      alert('Error JSON ' + e);
    }

    if ( res.status == 'OK' ){
       var i = 1;
      $.each(res.data, function(k,o){

        txtFechaA.val(o.cueFechaAp);
        slctTemaE.val(o.temTema);
        txtNombreE.val(o.cueNombre);
        txtCueId.val(o.cueId);
        formEditarServ.removeClass('hidden');
        tblServicios.addClass('hidden');

        selCombo.find('option').each(function(){
        if ( o.temActivo == $(this).val() )
        selCombo.val(o.temActivo);
        });


      i++;
      });
    }else{
      tbodyServicios.html('<tr><td colspan="8" class="center"><h3>'+ res.message +'</h3></td></tr>');
    }
    tbodyServicios.removeClass('hidden');
}

function limpiar(){
  tblServicios.removeClass('hidden');
  formEditarServ.addClass('hidden');
}

/*******/

function ingresoCuestionario(){
  var editar = $.ajax({
    url: 'ingresoCuestionario',
    data: {
      token: token.val(),
      fecha: txtFechaApl.val(),
      tema: selCombo.val(),
      subtema: txtSubTema.val(),
      nombre: txtNombre.val()
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
        showConfirmButton: true
      });
      swal();
      document.location=('./cueAgregar#formselect')
      pnlAgregar.addClass('hidden');
      formselect.removeClass('hidden'); //mostrar formulario de opción multiple
    }
    else{
      alert(resultado.message);
    }
}

function swal(){
  swal({
        title: "Guardado.",
        text: "Datos generales guardados con exito.",
        type: "success",
        showNegativeButton: true,
        showConfirmButton: true
      });
}

function cancelar(){
  txtNombre.val('');
}

// fecha actual
function date(){
  dt = new Date();
  m=((dt.getMonth()+1)>=10)? (dt.getMonth()+1) : '0' + (dt.getMonth()+1);  
  d=((dt.getDate())>=10)? (dt.getDate()) : '0' + (dt.getDate());
  a = dt.getFullYear();
  document.getElementById('txtFechaEla').innerHTML=d+" - "+m+" - "+a;
}

window.onload=function()
{
  date();
  getTema();
}

/*function comprobarFuente(e){
  var elem = e.target;
  if (elem.validity.valid) {
    document.getElementById('spnNombre').innerHTML = "";
    elem.style.background='#FFFFFF';
  }
  else {
    elem.style.background='#FFDDDD';
    document.getElementById('spnNombre').innerHTML = '<i class="fa fa-exclamation-circle"></i> Solo caracteres alfanumericos y @ . _ - ';
  }
}*/
function getTema(){
  var datos = $.ajax({
    url: 'getTema',
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
    //selCombo.html('');
      $.each(res.data, function(k,o){
        selCombo.append(
          '<option value="'+o.temId+'">'+o.temTema+'</option>'
        );
      });
    document.getElementById('selCombo');
}

function getCuestionarioConsultas(){
  var datos = $.ajax({
    url: 'getCuestionarioConsultas',
    type: 'post',
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

    tbodyConsulta.html('');
    if ( res.status == 'OK' ){
       var i = 1;
      $.each(res.data, function(k,o){
      if ( o.cueActivo == 1 ){
          status = '<span class="glyphicon glyphicon-ok text-success" title="Activo"></span>';
        }
        else{
          status = '<span class="glyphicon glyphicon-remove" title="Inactivo"></span>';
        }
        tbodyConsulta.append(
          '<tr>'+
            '<td >'+o.cueFechaEla+'</td>'+
            '<td >'+o.cueFechaAp+'</td>'+
            '<td >'+o.temTema+'</td>'+
            '<td >'+o.cueNombre+'</td>'+
            '<td class="text-center">'+status+'</td>'+
            '<td class="text-center">'+
              '<span class="glyphicon glyphicon-edit text-primary"'+status+
            '</td>'+
            '<td class="text-center">'+
              '<span class="glyphicon glyphicon-trash text-danger"'+status+
            '</td>'+
          '</tr>'
      );
      i++;
      });
    }else{
      tbodyConsulta.html('<tr><td colspan="8" class="center"><h3>'+ res.message +'</h3></td></tr>');
    }
    tblConsulta.removeClass('hidden');
}

/******/
/*$(document).on('ready', function(){

  getTodosCuestionarios();

  intNombre = document.querySelector("input[name='txtFuente']");
  intNombre.addEventListener("input", comprobarFuente);
});*/

tblServicios.delegate('.glyphicon-edit', 'click', getCues);
tblServicios.delegate('.glyphicon-trash', 'click', darBajaCues);
btnCancelar.on('click',limpiar);
btnGuardar.on('click',editarCues);

btnCancelarAg.on('click',cancelar);
btnGuardarAg.on('click',ingresoCuestionario);

//redirección de botones de inicio
btnEditar.click(
  function() {
      getTodosCuestionarios();

      btnEditar.addClass('botonActivo');
      btnConsulta.addClass('botonNoactivo');
      btnAgregar.addClass('botonNoactivo');

      btnEditar.removeClass('botonNoactivo');
      btnConsulta.removeClass('botonActivo');
      btnAgregar.removeClass('botonActivo');
    window.location.href = 'cueEditar#tblServicios';
    return false;
});

btnConsulta.click(
  function() {
      getCuestionarioConsultas();

      btnEditar.addClass('botonNoactivo');
      btnConsulta.addClass('botonActivo');
      btnAgregar.addClass('botonNoactivo');

      btnEditar.removeClass('botonActivo');
      btnConsulta.removeClass('botonNoactivo');
      btnAgregar.removeClass('botonActivo');
    window.location.href = 'cueConsulta#tblConsultas';
    return false;
});

btnAgregar.click(
  function() {
      getTodosCuestionarios();

      btnEditar.addClass('botonNoactivo');
      btnConsulta.addClass('botonNoactivo');
      btnAgregar.addClass('botonActivo');

      btnEditar.removeClass('botonActivo');
      btnConsulta.removeClass('botonActivo');
      btnAgregar.removeClass('botonNoactivo');
    window.location.href = 'cueAgregar#pnlAgregar';
    return false;
});

//check para mostrar formulairos de preguntas
chkAbierta.click(
  function(){
    if( chkDof.prop('checked') ) {            //    Si el checkDof esta checado 
      formprea.removeClass('hidden')//Desactiva el otro check
    }   
  }
)
chkOpMul.click(
  function(){
    if( chkDof.prop('checked') ) {            //    Si el checkDof esta checado 
      formpom.removeClass('hidden')//Desactiva el otro check
    }   
  }
)