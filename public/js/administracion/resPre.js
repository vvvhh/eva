var resA1 = $('#resA1'),resA2 = $('#resA2'),resB1 = $('#resB1'),resB2 = $('#resB2'),resC1 = $('#resC1'),resC2 = $('#resC2'),
    resD1 = $('#resD1'),resD2 = $('#resD2'),resE1 = $('#resE1'),resE2 = $('#resE2'),col2 = $('#col2'),txtOp = $('#txtOp');

function porRangoA1(){
  if( resA1.prop('checked') ) {
    resA2.prop('checked', false);
    col2.removeClass('hidden');
    txtOp.removeClass('hidden');
    document.getElementById('txtOp').disabled = true;
    txtOp.val('A');
  }
}

function porPeriodoA2(){
  if( resA2.prop('checked') ) {
    resA1.prop('checked', false); 
    col2.addClass('hidden');
    txtOp.addClass('hidden');  
  }
}

function porRangoB1(){
  if( resB1.prop('checked') ) {
    resB2.prop('checked', false);
    col2.removeClass('hidden');
    txtOp.removeClass('hidden');
    document.getElementById('txtOp').disabled = true;
    txtOp.val('B');    
  }
}

function porPeriodoB2(){
  if( resB2.prop('checked') ) {
    resB1.prop('checked', false);  
    col2.addClass('hidden');
    txtOp.addClass('hidden');  
  }
}
function porRangoC1(){
  if( resC1.prop('checked') ) {
    resC2.prop('checked', false);
    col2.removeClass('hidden');
    txtOp.removeClass('hidden');
    document.getElementById('txtOp').disabled = true;
    txtOp.val('C');    
  }
}

function porPeriodoC2(){
  if( resC2.prop('checked') ) {
    resC1.prop('checked', false);
    col2.addClass('hidden');
    txtOp.addClass('hidden');    
  }
}
function porRangoD1(){
  if( resD1.prop('checked') ) {
    resD2.prop('checked', false);
    col2.removeClass('hidden');
    txtOp.removeClass('hidden');
    document.getElementById('txtOp').disabled = true;
    txtOp.val('D');    
  }
}

function porPeriodoD2(){
  if( resD2.prop('checked') ) {
    resD1.prop('checked', false);
    col2.addClass('hidden');
    txtOp.addClass('hidden');  
  }
}
function porRangoE1(){
  if( resE1.prop('checked') ) {
    resE2.prop('checked', false);    
    col2.removeClass('hidden');
    txtOp.removeClass('hidden');
    document.getElementById('txtOp').disabled = true;
    txtOp.val('E');
  }
}

function porPeriodoE2(){
  if( resE2.prop('checked') ) {
    resE1.prop('checked', false);
    col2.addClass('hidden');
    txtOp.addClass('hidden');    
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