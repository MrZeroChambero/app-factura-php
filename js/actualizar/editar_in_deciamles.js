function decimales_editar(){
  
var unidad=document.getElementById('unidad').value;
if (unidad==1) {

document.getElementById('stockmax').value='';

document.getElementById('stockmin').value='';

  $(document).ready(function($){
  $('#stockmax').mask('##000', {reverse: true});
  });
  $(document).ready(function($){
  $('#stockmin').mask('##000', {reverse: true});
  });
}else {
document.getElementById('stockmax').value='';

document.getElementById('stockmin').value='';

  $(document).ready(function($){
  $('#stockmax').mask('##0.00', {reverse: true});
  });
  $(document).ready(function($){
  $('#stockmin').mask('##0.00', {reverse: true});
  });
}

}

function mascara(){
  var unidad=document.getElementById('unidad').value;
if (unidad==1) {


  $(document).ready(function($){
  $('#stockmax').mask('##000', {reverse: true});
  });
  $(document).ready(function($){
  $('#stockmin').mask('##000', {reverse: true});
  });
}else {

  $(document).ready(function($){
  $('#stockmax').mask('##0.00', {reverse: true});
  });
  $(document).ready(function($){
  $('#stockmin').mask('##0.00', {reverse: true});
  });
}
}