$(validar());
function validar(){
$("#agrega_pregunta").validate({

rules:{
  pregunta:{
    required:true,
    minlength:3,
    maxlength:40

  },
    respuesta:"required",
      respuesta2: {
        equalTo: "#respuesta"
      }

  }


});
}

function enviar_pregunta(){

if($('#agrega_pregunta').valid() == false){

 Swal.fire({
        title: 'Completa los campos',
        text: 'Debe completar todos los campos',
        icon:'warning',
        confirmButtonText: 'Ok',
        backdrop: true,
        timer: 5000,
        timerProgressBar: true,
       position: 'center',
       allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        stopKeydownPropagation: true,
        buttonsStyling: true,
        showCloseButton: true,
        closeButtonAriaLabel: 'cerrar alerta',
     });
return; 
}
guardar();
}
function guardar(){
var pregunta=document.getElementById('pregunta').value;
var respuesta=document.getElementById('respuesta').value;
var respuesta2=document.getElementById('respuesta2').value;

if (respuesta2!=respuesta) {

 Swal.fire({
        title: 'Completa los campos',
        text: 'La respuesta no coincide',
        icon:'warning',
        confirmButtonText: 'Ok',
        backdrop: true,
        timer: 5000,
        timerProgressBar: true,
       position: 'center',
       allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        stopKeydownPropagation: true,
        buttonsStyling: true,
        showCloseButton: true,
        closeButtonAriaLabel: 'cerrar alerta',
     });
  return;
}

var valor="pregunta="+pregunta+"&respuesta="+respuesta+"&respuesta2="+respuesta2;

  $.ajax({
    url:'preguntas/registrar_preguntas.php',
    type:'POST',
    data:valor,
  })
  .done(function(respuesta){
    $("#aler").html(respuesta);
  })
      
  .fail(function() {
    console.log("error");
  });

  
}

