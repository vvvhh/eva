var i = 1;

var consultasTabla=$('#consultasTabla'),consultaTbody=$('#consultaTbody');

var btnConsulta =$('#btnConsulta'),btnEditar = $('#btnEditar'),btnAgregarC = $('#btnAgregarC'),btnAgregar=$('#btnAgregar');

var pnlAgregar =$('#pnlAgregar'),serviciosTabla = $('#serviciosTabla'),tblCue = $('#tblCue'),serviciosTbody = $('#serviciosTbody');

var txtNombreFuente = $('#txtNombreFuente'),txtCueId = $('#txtCueId'),formEditarServ= $('#formEditarServ'),
    txtActivo = $('#txtActivo'),btnGuardar = $('#btnGuardar'),btnCancelar = $('#btnCancelar'),token = $('#_token');

var token = $('#token'),txtNombre = $('#txtNombre'),selCombo = $('#selCombo'),selComboSub = $('#selComboSub'),
    txtFechaApl = $('#txtFechaApl'),txtFechaEla = $('#txtFechaEla'),btnGuardarAg =$('#btnGuardarAg'),txtFechaA =$('#txtFechaA'),
    tbodyConsultaCue=$('#tbodyConsultaCue');

var formselect = $('#formselect'),formprea = $('#formprea'),datosActivo = $('#datosActivo'),formpom = $('#formpom'),
    numPreC = $('#numPreC'),selPre = $('#selPre'),btnCaFe = $('#btnCaFe'),
    temSel = $('#temSel'),subSel = $('#subSel'),pnl1 = $('#pnl1'),lbl1 = $('#lbl1'),lbl2 = $('#lbl2'),
    lbl3 = $('#lbl3'),label1 = $('#label1'),label2 = $('#label2'),label3 = $('#label3');

var dg = $('#dg'),lblDg = $('#lblDg'),lblNombre = $('#lblNombre'),lblFechaE = $('#lblFechaE'),lblFechaA = $('#lblFechaA'),
    selTipo = $('#selTipo'), agPre = $('#agPre'),tipoPreEle = $('#tipoPreEle'),lbltm = $('#lbltm'),tipoPre = $('#tipoPre'),
    btnGrdNmb = $('#btnGrdNmb'),Nombre = $('#Nombre'),Fechas = ('#FechaEla'),FechaApl = $('#FechasApl'),btnIngresarRes = $('#btnIngresarRes');
/*variales para tema y subtema*/
var btnGuardarTemAg = $('#btnGuardarTemAg'),btnGuardarSubAg = $('#btnGuardarSubAg'),
    btnCancelarTemAg = $('#btnCancelarTemAg'),btnCancelarSubAg = $('#btnCancelarSubAg'),
    mosTem = $('#mosTem'),mosSub = $('#mosSub'),temaAg = $('#temaAg'), subtemaAg = $('#subtemaAg');

var btnTemaSiEx = $('#btnTemaSiEx'),btnTemaNoEx = $('#btnTemaNoEx'),btnTemaSiExsub = $('#btnTemaSiExsub'),
    btnTemaNoExsub = $('#btnTemaNoExsub'),txtNumPre = $('#txtNumPre');

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
      nombre:txtNombre.val(),
      activo:txtActivo.val(),
      i:txtCueId.val()
    },
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

    serviciosTbody.html('');
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
    serviciosTbody.html('');

    if ( res.status == 'OK' ){
       var i = 1;
      $.each(res.data, function(k,o){
        if ( o.cueActivo == 1 ){
          status = '<span class="glyphicon glyphicon-ok text-success" title="Activo"></span>';
        }
        else{
          status = '<span class="glyphicon glyphicon-remove" title="Inactivo"></span>';
        }
        serviciosTbody.append(
          '<tr>'+
            '<td >'+o.cueFechaEla+'</td>'+
            '<td >'+o.cueFechaAp+'</td>'+
            '<td >'+o.temTema+'</td>'+
            '<td >'+o.subSubtema+'</td>'+
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
      serviciosTbody.html('<tr><td colspan="8" class="center"><h3>'+ res.message +'</h3></td></tr>');
    }
    serviciosTabla.removeClass('hidden');
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
        selCombo.val(o.temTema);

        selCombo.find('option').each(
          function(){
            if ( o.cueTema == $(this).val() )
            selCombo.val(o.cueTema);
          }
        );

        selComboSub.val(o.subTema);

        selComboSub.find('option').each(
          function(){
            if ( o.subId == $(this).val() )
            selComboSub.val(o.subId);
          }
        );

        txtNombre.val(o.cueNombre);
        txtCueId.val(o.cueId);
        
        txtFechaEla.val(o.cueFechaEla);
        datosActivo.val(o.cueActivo);
        formEditarServ.removeClass('hidden');
        serviciosTabla.addClass('hidden');
      i++;
      });
    }else{
      serviciosTbody.html('<tr><td colspan="8" class="center"><h3>'+ res.message +'</h3></td></tr>');
    }
    serviciosTabla.removeClass('hidden');
}

function limpiar(){
  serviciosTabla.removeClass('hidden');
  formEditarServ.addClass('hidden');
}

/*******/

function ingresoCuestionario(){
  var texto = document.getElementById("temSel").innerHTML;
  var texto1 = document.getElementById("subSel").innerHTML;
  var editar = $.ajax({
    url: 'ingresoCuestionario',
    data: {
      token: token.val(),
      fecha: txtFechaApl.val(),
      fechaEla: txtFechaEla.val(),
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
        Nombre.addClass('hidden');
        FechaEla.addClass('hidden');
        FechaApl.addClass('hidden');
        btnRegresarSub.addClass('hidden');
        lblDg.removeClass('hidden');
        btnDg.removeClass('hidden');
        document.getElementById('lblNombre').innerHTML= txtNombre.val();
        document.getElementById('lblFechaE').innerHTML= txtFechaEla.val();
        document.getElementById('lblFechaA').innerHTML= txtFechaApl.val();
        formselect.removeClass('hidden');
        txtNumPre.html('');
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

window.onload=function()
{
  getTema();
  txtFechaApl.val('');
  txtFechaEla.val('');
  txtNombre.val('');
  txtNumPre.html('');
  txtPreg.val('');
  
  tblCue.addClass('hidden');
  btnEditar.removeClass('disabled');
  btnAgregar.removeClass('disabled');
  btnConsulta.removeClass('disabled');

  document.getElementById('resA1').checked = false;
  document.getElementById('resA2').checked = false;
  document.getElementById('resB1').checked = false;
  document.getElementById('resB2').checked = false;
  document.getElementById('resC1').checked = false;
  document.getElementById('resC2').checked = false;
  document.getElementById('resD1').checked = false;
  document.getElementById('resD2').checked = false;
  document.getElementById('resE1').checked = false;
  document.getElementById('resE2').checked = false;

  document.getElementById('txtNombre').disabled = false;
  document.getElementById('txtFechaApl').disabled = false;
  document.getElementById('txtFechaEla').disabled = false;

  document.getElementById('btnGrdNmb').disabled = false;
  document.getElementById('btnGrdFchEl').disabled = false;
  document.getElementById('btnGrdFchAp').disabled = false;
  document.getElementById('txtPreg').disabled = false;
}

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

var datos = $.ajax({
    url: 'getSubtema',
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
      selComboSub.html('');
      $.each(res.data, function(k,o){
        selComboSub.append(
          '<option value="'+o.subId+'">'+o.subSubtema+'</option>'
        );
      });
    document.getElementById('selComboSub');

var datos = $.ajax({
    url: 'getTipo',
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
      selTipo.html('');
      $.each(res.data, function(k,o){
        selTipo.append(
          '<option value="'+o.tiposId+'">'+o.preTipos+'</option>'
        );
      });
    document.getElementById('selTipo');
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

    consultaTbody.html('');
    if ( res.status == 'OK' ){
       var i = 1;
      $.each(res.data, function(k,o){
      if ( o.cueActivo == 1 ){
          status = '<span class="glyphicon glyphicon-ok text-success" title="Activo"></span>';
        }
        else{
          status = '<span class="glyphicon glyphicon-remove" title="Inactivo"></span>';
        }
        consultaTbody.append(
          '<tr>'+
            '<td >'+o.cueFechaEla+'</td>'+
            '<td >'+o.cueFechaAp+'</td>'+
            '<td >'+o.temTema+'</td'+
            '<td >'+ "" +'</td>'+
            '<td >'+o.subSubtema+'</td>'+
            '<td >'+o.cueNombre+'</td>'+
            '<td class="text-center">'+status+'</td>'+
          '</tr>'
      );
      i++;
      });
    }else{

      consultaTbody.html('<tr><td colspan="8" class="center"><h3>'+ res.message +'</h3></td></tr>');
    }
    consultasTabla.removeClass('hidden');
}

//redirección de botones de inicio
function editar() {
      getTodosCuestionarios();
      pnlAgregar.addClass('hidden');
      pnl1.addClass('hidden');
      serviciosTabla.removeClass('hidden');
      consultasTabla.addClass('hidden');
      lbl1.addClass('hidden');
      lbl2.removeClass('hidden');
      lbl3.addClass('hidden');
      formEditarServ.addClass('hidden');
      lblSub.addClass('hidden');
      lblDg.addClass('hidden');
      lbltm.addClass('hidden');
      agPre.addClass('hidden');
      tipoPre.addClass('hidden');

      btnEditar.addClass('botonActivo');
      btnConsulta.addClass('botonNoactivo');
      btnAgregar.addClass('botonNoactivo');

      btnEditar.removeClass('botonNoactivo');
      btnConsulta.removeClass('botonActivo');
      btnAgregar.removeClass('botonActivo');
}

function consulta() {
      getCuestionarioConsultas();
      pnl1.addClass('hidden');
      pnlAgregar.addClass('hidden');
      consultasTabla.removeClass('hidden');
      lblSub.addClass('hidden');
      lblDg.addClass('hidden');
      serviciosTabla.addClass('hidden');
      lbl1.addClass('hidden');
      lbl2.addClass('hidden');
      lbl3.removeClass('hidden');
      formEditarServ.addClass('hidden');
      agPre.addClass('hidden');
      lbltm.addClass('hidden');
      tipoPre.addClass('hidden');

      btnEditar.addClass('botonNoactivo');
      btnConsulta.addClass('botonActivo');
      btnAgregar.addClass('botonNoactivo');

      btnEditar.removeClass('botonActivo');
      btnConsulta.removeClass('botonNoactivo');
      btnAgregar.removeClass('botonActivo');
}

function agregar() {
      pnl1.removeClass('hidden');
      getTodosCuestionarios();
      pnlAgregar.removeClass('hidden');
      serviciosTabla.addClass('hidden');
      lbl1.removeClass('hidden');
      lbl2.addClass('hidden');
      lbl3.addClass('hidden');
      formEditarServ.addClass('hidden');
      lbltm.addClass('hidden');
      lblDg.addClass('hidden');
      agPre.addClass('hidden');
      tipoPre.addClass('hidden');
      consultasTabla.addClass('hidden');

      btnEditar.addClass('botonNoactivo');
      btnConsulta.addClass('botonNoactivo');
      btnAgregar.addClass('botonActivo');

      btnEditar.removeClass('botonActivo');
      btnConsulta.removeClass('botonActivo');
      btnAgregar.removeClass('botonNoactivo');
}

function ingresar(){
  // body...
  pnlRes.removeClass('hidden');
}

function ingresoTemAg(){
  // body...
  var editar = $.ajax({
    url: 'temAgregar',
    data: {
      token: token.val(),
      tema: txtTema.val(),
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
        title: '¡Tema Agregado!',
        text: "El Tema fue agragdo con exito",
        type: 'info',
        showCancelButton: true,
        closeOnConfirm: true
      },
      function(isConfirm) {
        if (isConfirm) {
          temaAg.addClass('hidden');
          mosTem.addClass('hidden');
          document.getElementById('temSel').innerHTML = txtTema.val();
          lbltm.removeClass('hidden');
          subtema.removeClass('hidden');
        }
  });
    /*else{
      alert(resultado.message);
    }*/
  }
}

function ingresoSubAg(){
  // body...
  var editar = $.ajax({
    url: 'subAgregarAg',
    data: {
      token: token.val(),
      tema: selTema.val(),
      subtema: txtSubTema.val(),
      activo: txtActivos.val(),
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
        title: '¡Subtema Agregado!',
        text: "El subtema fue agragdo con exito",
        type: 'info',
        showCancelButton: true,
        closeOnConfirm: true
      },
      function(isConfirm) {
        if (isConfirm) {
          subtemaAg.addClass('hidden');
          mosSub.addClass('hidden');
          document.getElementById('subSel').innerHTML = txtSubTema.val();
          lblSub.removeClass('hidden');
          Nombre.removeClass('hidden');
        }
  });
    }
    else{
      alert(resultado.message);
    }
}

function cancelarTemAg(){
  mosTem.addClass('hidden');
  temaAg.addClass('hidden');
  pnl1.removeClass('hidden');
}

function cancelarSubAg(){
  mosSub.addClass('hidden');
  subtemaAg.addClass('hidden');
  subtema.removeClass('hidden');
}

function existe(){
  swal({
        title: '¡Tema existente!',
        text: "¿Está seguro que es el tema que desea?",
        type: 'info',
        showCancelButton: true,
        closeOnConfirm: false
      },
      function(isConfirm) {
        if (isConfirm) {
          swal(
            'Este tema será utilizado para su cuestionario'
          );
          tema.addClass('hidden');
          subtema.removeClass('hidden');
          pnl1.addClass('hidden');
          lbltm.removeClass('hidden');
          btnRegresarTem.removeClass('hidden');
        }
  });
    //obtención de selección del select
    var combo = document.getElementById('selCombo');
    var mitexto = $("#selCombo option:selected").text();
    console.log("tema"+mitexto);
    document.getElementById('temSel').innerHTML= mitexto; //valor asignado al id sleccionado
}

function noexiste(){
  mosTem.removeClass('hidden');
  pnl1.addClass('hidden');
  temaAg.removeClass('hidden');
}

//subtema
function existesub(){
  swal({
        title: '¡Subtema existente!',
        text: "¿Está seguro que es el subtema que desea?",
        type: 'info',
        showCancelButton: true,
        closeOnConfirm: false
      },
      function(isConfirm) {
        if (isConfirm) {
          swal(
            'El subtema que selecciono sera el de su cuestionario.'
          );
          document.getElementById("selComboSub").disabled = false;
          subtema.addClass('hidden');
          lblSub.removeClass('hidden');
          Nombre.removeClass('hidden');
          FechaEla.removeClass('hidden');
          FechaApl.removeClass('hidden');
          btnRegresarTem.addClass('hidden');
          btnRegresarSub.removeClass('hidden');
        }
  });
  //obtención de selección del select
  var combo = document.getElementById('selComboSub');
  var mitexto = $("#selComboSub option:selected").text();
  document.getElementById('subSel').innerHTML= mitexto; //valor asignado al id sleccionado
}

function noexistesub(){
  subtema.addClass('hidden');
  mosSub.removeClass('hidden');
  subtemaAg.removeClass('hidden');
}

btnTemaSiEx.on('click',existe);
btnTemaNoEx.on('click',noexiste);
btnTemaSiExsub.on('click',existesub);
btnTemaNoExsub.on('click',noexistesub);

btnEditar.on('click',editar);
btnConsulta.on('click',consulta);
btnAgregar.on('click',agregar);
label1.on('click',agregar);
label2.on('click',editar);
label3.on('click',consulta);

serviciosTabla.delegate('.glyphicon-edit', 'click', getCues);
serviciosTabla.delegate('.glyphicon-trash', 'click', darBajaCues);
btnCancelar.on('click',limpiar);
btnGuardar.on('click',editarCues);

btnGuardarAg.on('click',ingresoCuestionario);
btnIngresarRes.on('click',ingresar);

btnGuardarTemAg.on('click',ingresoTemAg);
btnCancelarTemAg.on('click',cancelarTemAg);
btnGuardarSubAg.on('click',ingresoSubAg);
btnCancelarSubAg.on('click',cancelarSubAg);
