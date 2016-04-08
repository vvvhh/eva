var tblConsulta=$('#tblConsulta'),
tbodyConsulta=$('#tbodyConsulta');

var btnConsulta=$('#btnConsulta'),
btnEditar=$('#btnEditar'),
btnAgregarC=$('#btnAgregarC'),
btnAgregar=$('#btnAgregar');

var pnlAgregar=$('#pnlAgregar');
    pnlConsulta=$('#pnlConsulta'),
    pnlInicio=$('#pnlInicio');

var tblServicios   = $('#tblServicios'),
    tblCue = $('#tblCue'),
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
    Combo = $('#Combo'),
    selCombo = $('#selCombo'),
    selComboSub = $('#selComboSub'),
    txtFechaApl = $('#txtFechaApl'),
    fechaEla = $('#fechaEla'),
    btnGuardarAg =$('#btnGuardarAg'),
    txtFechaA =$('#txtFechaA'),
    selComboE =$('#selComboE'),
    txtNombreE =$('#txtNombreE');

var spnNombre=$('#spnNombre'),
    btnImprimir=$('#btnImprimir');

var formselect = $('#formselect'),
    formprea = $('#formprea'),
    datosActivo = $('#datosActivo'),
    formpom = $('#formpom'),
    numPreC = $('#numPreC'),
    selPre = $('#selPre'),
    btnCaFe = $('#btnCaFe'),
    calendario = $('#calendario');

/*var numPre;*/

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
      tema:selComdo.val(),
      subtema:selComboSub.val(),
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
        type: "success",
        showConfirmButton: true,
        showCancelButton: true
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
       var i = 1;
      $.each(res.data, function(k,o){
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
            '<td >'+o.temTema+'</td>'+
            '<td >'+o.temSubTema+'</td>'+
            '<td >'+o.cueNombre+'</td>'+
            '<td class="text-center">'+status+'</td>'+
            '<td class="text-center">'+
              '<span class="glyphicon glyphicon-edit text-primary" id="'+o.cueId+'" '+
              'style="cursor:pointer" title="Editar"></span>'+
            '</td>'+
            '<td class="text-center">'+
              '<span class="glyphicon glyphicon-trash text-danger" id="'+o.cueId+'" '+
              'style="cursor:pointer" title="Dar de baja"></span>'+
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
        selComboE.val(o.temTema);
        selComboSubE.val(o.temSubTema);
        selCombo.find('option').each(
          function(){
            if ( o.temId == $(this).val() )
            selCombo.val(o.temIdS);
          }
        );

        selComboSub.find('option').each(
          function(){
            if ( o.temId == $(this).val() )
            selComboSub.val(o.temId);
          }
        );
        txtNombreE.val(o.cueNombre);
        txtCueId.val(o.cueId);
        
        fechaEla.val(o.cueFechaEla);
        datosActivo.val(o.cueActivo);
        formEditarServ.removeClass('hidden');
        tblServicios.addClass('hidden');
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

/* Inicio de funcion par apoder visuzalizar el cuestionario completo*/
function vista(){
  tblServicios.addClass('hidden');
  var datos = $.ajax({
    url: 'vista',
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

    tbodyConsulta.addClass('hidden');
    tblCue.removeClass('hidden');
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
            '<td >'+o.temTema+'</td'+
            '<td >'+ "" +'</td>'+
            '<td >'+o.temSubTema+'</td>'+
            '<td >'+o.cueNombre+'</td>'+
            '<td >'+o.prePregunta+'</td>'+
          '</tr>'
      );
      i++;
      });
    }else{
      tbodyCue.html('<tr><td colspan="8" class="center"><h3>'+ res.message +'</h3></td></tr>');
    }
    tblCue.removeClass('hidden');
}
/* fin de función para ver el cuestionario */

/*******/

function ingresoCuestionario(){
  var editar = $.ajax({
    url: 'ingresoCuestionario',
    data: {
      token: token.val(),
      fecha: txtFechaApl.val(),
      fechaEla: fechaEla.val(),
      tema: selCombo.val(),
      subtema: selComboSub.val(),
      nombre: txtNombre.val(),
      datosActivo: datosActivo.val()
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
        title: '¿Está seguro que desea agregar los datos generales?',
        text: "¡Verificar datos!",
        type: 'info',
        showCancelButton: true,
        closeOnConfirm: false
      },
      function(isConfirm) {
        if (isConfirm) {
          swal(
            '¡Guardado!',
            'Datos guardados con exito.',
            'success'
          );
        numPreC.removeClass('hidden');
        //txtNumPre.html('');
        chkAbierta.checked == false;
        chkOpMul.checked == false;
        chkMix.checked == false;
        }
        /*else{
          location.reload(true);
        }*/
      })
    }
    else{
      alert(resultado.message);
    }
}

/*function swal(){
  swal({
        title: "Guardado.",
        text: "Datos generales guardados con exito.",
        type: "success",
        showNegativeButton: true,
        showConfirmButton: true
      });
}*/

function cancelar(){
  txtNombre.val('');
}

// fecha actual
/*function date(){
  dt = new Date();
  m=((dt.getMonth()+1)>=10)? (dt.getMonth()+1) : '0' + (dt.getMonth()+1);  
  d=((dt.getDate())>=10)? (dt.getDate()) : '0' + (dt.getDate());
  a= dt.getFullYear();
  document.getElementById('fechaEla').innerHTML=a+" - "+m+" - "+d;
}*/

window.onload=function()
{
  //date();
  getTema();
  pnlAgregar.removeClass('hidden');
  pnlAgregar;
  tblServicios.removeClass('hidden');
  txtFechaApl.val('');
  txtNombre.val('');
  tbodyConsulta;
  tbodyServicios;
  //document.getElementById("Combo").disabled = true;
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
      selCombo.html('');
      $.each(res.data, function(k,o){
        selCombo.append(
          '<option value="'+o.temId+'">'+o.temTema+'</option>'
        );
      });
    document.getElementById('selCombo');

      selComboSub.html('');
      $.each(res.data, function(k,o){
        selComboSub.append(

          '<option value="'+o.temId+'">'+o.temSubTema+'</option>'
        );
      });
    document.getElementById('selComboSub');

    Combo.html('');
      $.each(res.data, function(k,o){
        selComboSub.append(

          '<option value="'+o.temId+'">'+o.temSubTema+'</option>'
        );
      });
    document.getElementById('selComboSub');
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
            '<td >'+o.temTema+'</td'+
            '<td >'+ "" +'</td>'+
            '<td >'+o.temSubTema+'</td>'+
            '<td >'+o.cueNombre+'</td>'+
            '<td class="text-center">'+status+'</td>'+
            '<td class="text-center">'+
              '<span class="glyphicon glyphicon-edit text-primary" id="'+o.cueId+'" '+
              'style="cursor:pointer" title="Editar"></span>'+
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

//redirección de botones de inicio
function editar() {
      getTodosCuestionarios();

      btnEditar.addClass('botonActivo');
      btnConsulta.addClass('botonNoactivo');
      btnAgregar.addClass('botonNoactivo');

      btnEditar.removeClass('botonNoactivo');
      btnConsulta.removeClass('botonActivo');
      btnAgregar.removeClass('botonActivo');
    window.location = 'cueEditar#tblServicios';
}

function consulta() {
      getCuestionarioConsultas();
      tblConsulta.removeClass('hidden');
      pnlAgregar.addClass('hidden');

      btnEditar.addClass('botonNoactivo');
      btnConsulta.addClass('botonActivo');
      btnAgregar.addClass('botonNoactivo');

      btnEditar.removeClass('botonActivo');
      btnConsulta.removeClass('botonNoactivo');
      btnAgregar.removeClass('botonActivo');
    window.location = 'cueConsulta#tblConsulta';
}

function agregar() {
      getTodosCuestionarios();
      pnlAgregar.removeClass('hidden');
      tblConsulta.addClass('hidden');

      btnEditar.addClass('botonNoactivo');
      btnConsulta.addClass('botonNoactivo');
      btnAgregar.addClass('botonActivo');

      btnEditar.removeClass('botonActivo');
      btnConsulta.removeClass('botonActivo');
      btnAgregar.removeClass('botonNoactivo');
    window.location = 'cueAgregar#pnlAgregar';
}

btnEditar.on('click',editar);
btnConsulta.on('click',consulta);
btnAgregar.on('click',agregar);

btnCaFe.click(
function (){
  swal({
        title: '¡Agregar tema!',
        text: "¿Está seguro que no desea agregar un tema nuevo?",
        type: 'info',
        showCancelButton: true,
        closeOnConfirm: false
      },
      function(isConfirm) {
        if (isConfirm) {
          calendario.removeClass('hidden');
        }
  });
});

/*btnTema.click(
  function() {
    window.location.href = 'temAgregar';
    return false;
});*/

//check para mostrar formulairos de preguntas
//------------------chkAbierta----------------------------------
function chkA(form)
{
    if (chkAbierta.checked == true)
    {
    chkOpMul.disabled =true;
    chkMix.disabled =true;
    formprea.removeClass('hidden');
    numPreC.removeClass('hidden');
    }

    if (chkAbierta.checked == false)
    {
    chkOpMul.disabled =false;
    chkMix.disabled =false;
    formprea.addClass('hidden');
    numPreC.addClass('hidden');
    }
}

//------------------chkOpMul-------------------------------------
function chkO(form)
{
    if (chkOpMul.checked == true)
    {
    chkAbierta.disabled =true;
    chkMix.disabled =true;
    formpom.removeClass('hidden');
    }

    if (chkOpMul.checked == false)
    {
    chkAbierta.disabled =false;
    chkMix.disabled =false;
    formpom.addClass('hidden');
    }    
}

//------------------chkMix----------------------------------------
function chkM(form)
{
    if (chkMix.checked == true)
    {
    chkAbierta.disabled = true;
    chkOpMul.disabled = true;
    numPreC.removeClass('hidden');
    }

    if (chkMix.checked == false)
    {
    chkAbierta.disabled =false;
    chkOpMul.disabled =false;
    numPreC.addClass('hidden');
    }    
}

tblCue.delegate('.glyphicon-eye-open', 'click', vista);
tblServicios.delegate('.glyphicon-edit', 'click', getCues);
tblServicios.delegate('.glyphicon-trash', 'click', darBajaCues);
btnCancelar.on('click',limpiar);
btnGuardar.on('click',editarCues);

btnCancelarAg.on('click',cancelar);
btnGuardarAg.on('click',ingresoCuestionario);