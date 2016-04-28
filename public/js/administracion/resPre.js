var resA1 = $('#resA1'),resA2 = $('#resA2'),resB1 = $('#resB1'),resB2 = $('#resB2'),resC1 = $('#resC1'),resC2 = $('#resC2'),
    resD1 = $('#resD1'),resD2 = $('#resD2'),resE1 = $('#resE1'),resE2 = $('#resE2'),col2 = $('#col2'),txtOpA = $('#txtOpA'),
    txtOpB = $('#txtOpB'),txtOpC = $('#txtOpC'),txtOpD = $('#txtOpD'),txtOpE = $('#txtOpE');

function porRangoA1(){
  if( resA1.prop('checked') ) {
    resA2.prop('checked', false);
    resB1.prop('checked', false);
    resC1.prop('checked', false);
    resD1.prop('checked', false);
    resE1.prop('checked', false);
    col2.removeClass('hidden');
    txtOpA.removeClass('hidden');
    document.getElementById('txtOpA').disabled = true;
    txtOpA.val('A');
    txtOpB.addClass('hidden');
    txtOpC.addClass('hidden');
    txtOpD.addClass('hidden');
    txtOpE.addClass('hidden');
  }
}

function porPeriodoA2(){
  if( resA2.prop('checked') ) {
    resA1.prop('checked', false); 
    col2.addClass('hidden');
    txtOpA.addClass('hidden');  
  }
}

function porRangoB1(){
  if( resB1.prop('checked') ) {
    resB2.prop('checked', false);
    resA1.prop('checked', false);
    resC1.prop('checked', false);
    resD1.prop('checked', false);
    resE1.prop('checked', false);
    col2.removeClass('hidden');
    txtOpB.removeClass('hidden');
    document.getElementById('txtOpB').disabled = true;
    txtOpB.val('B');
    txtOpA.addClass('hidden');
    txtOpC.addClass('hidden');
    txtOpD.addClass('hidden');
    txtOpE.addClass('hidden');    
  }
}

function porPeriodoB2(){
  if( resB2.prop('checked') ) {
    resB1.prop('checked', false);  
    col2.addClass('hidden');
    txtOpB.addClass('hidden');  
  }
}
function porRangoC1(){
  if( resC1.prop('checked') ) {
    resC2.prop('checked', false);
    resA1.prop('checked', false);
    resB1.prop('checked', false);
    resD1.prop('checked', false);
    resE1.prop('checked', false);
    col2.removeClass('hidden');
    txtOpC.removeClass('hidden');
    document.getElementById('txtOpC').disabled = true;
    txtOpC.val('C');  
    txtOpA.addClass('hidden');
    txtOpB.addClass('hidden');
    txtOpD.addClass('hidden');
    txtOpE.addClass('hidden');   
  }
}

function porPeriodoC2(){
  if( resC2.prop('checked') ) {
    resC1.prop('checked', false);
    col2.addClass('hidden');
    txtOpC.addClass('hidden');    
  }
}
function porRangoD1(){
  if( resD1.prop('checked') ) {
    resD2.prop('checked', false);
    resA1.prop('checked', false);
    resB1.prop('checked', false);
    resC1.prop('checked', false);
    resE1.prop('checked', false);
    col2.removeClass('hidden');
    txtOpD.removeClass('hidden');
    document.getElementById('txtOpD').disabled = true;
    txtOpD.val('D'); 
    txtOpA.addClass('hidden');
    txtOpB.addClass('hidden');
    txtOpC.addClass('hidden');
    txtOpE.addClass('hidden');   
  }
}

function porPeriodoD2(){
  if( resD2.prop('checked') ) {
    resD1.prop('checked', false);
    col2.addClass('hidden');
    txtOpD.addClass('hidden');  
  }
}
function porRangoE1(){
  if( resE1.prop('checked') ) {
    resE2.prop('checked', false); 
    resA1.prop('checked', false);
    resB1.prop('checked', false);
    resC1.prop('checked', false);
    resD1.prop('checked', false);   
    col2.removeClass('hidden');
    txtOpE.removeClass('hidden');
    document.getElementById('txtOpE').disabled = true;
    txtOpE.val('E');
    txtOpA.addClass('hidden');
    txtOpB.addClass('hidden');
    txtOpC.addClass('hidden');
    txtOpD.addClass('hidden');
  }
}

function porPeriodoE2(){
  if( resE2.prop('checked') ) {
    resE1.prop('checked', false);
    col2.addClass('hidden');
    txtOpE.addClass('hidden');    
  }
}

resA1.on('click',porRangoA1);
resA2.on('click',porPeriodoA2);
resB1.on('click',porRangoB1);
resB2.on('click',porPeriodoB2);
resC1.on('click',porRangoC1);
resC2.on('click',porPeriodoC2);
resD1.on('click',porRangoD1);
resD2.on('click',porPeriodoD2);
resE1.on('click',porRangoE1);
resE2.on('click',porPeriodoE2);