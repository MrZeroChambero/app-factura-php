$(document).ready(function(){
  validar_datos();
});  
function validar_datos()
{ $("#f_us").validate({
rules:{
  nom_us:{
    required:true,
    minlength:3,
    maxlength:40
  },
  cedula_us:{
    required: true,
    number: true,
    minlength:4,
    maxlength:8
  },    
apellido_us:{
    required:true,
    minlength:3,
    maxlength:40
   },
  nick_us:{
    required:true,
    minlength:3,
    maxlength:40
  },
  apellido_us:{
    required:true,
    minlength:3,
    maxlength:40
  },
  nivel_us: {
  required: true
  },
tlf_us:{
    required: true,
    number: true,
    minlength:11,
    maxlength:11 
}
}
});
}


function verificar_datos(id) {
if($('#f_us').valid() == false){

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
actualizar();
}
function actualizar(){
const swalWithBootstrapButtons = Swal.mixin({
customClass: {
confirmButton: 'btn btn-success',
cancelButton: 'btn btn-danger',
},
buttonsStyling: true
})
   swalWithBootstrapButtons.fire({
    title: '¿Desea guardar los cambios?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Si, guardar',
    cancelButtonText: 'No',
    reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
         enviar_datos();

      } else if (
       
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
        
          'Cancelado',
          'su archivo esta seguro :)',
          'error'
        )
      }
    })
}

function actualizar_pass(){
const swalWithBootstrapButtons = Swal.mixin({
customClass: {
confirmButton: 'btn btn-success',
cancelButton: 'btn btn-danger',
},
buttonsStyling: true
})
   swalWithBootstrapButtons.fire({
    title: '¿Desea guardar los cambios?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Si, guardar',
    cancelButtonText: 'No',
    reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
         enviar_pass();

      } else if (
       
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
        
          'Cancelado',
          'su archivo esta seguro :)',
          'error'
        )
      }
    })
}
function enviar_datos(){
var nom_us=document.getElementById('nom_us').value;
var apellido_us=document.getElementById('apellido_us').value;
var nick_us=document.getElementById('nick_us').value;
var cedula_us=document.getElementById('cedula_us').value;
var nivel_us=document.getElementById('nivel_us').value;
var tlf_us=document.getElementById('tlf_us').value;

 var valor_us="nom_us="+nom_us+"&apellido_us="+apellido_us+"&nick_us="+nick_us+"&cedula_us="+cedula_us+"&nivel_us="+nivel_us+"&tlf_us="+tlf_us; 





  $.ajax({
    url:'actualizar/actualizar_usuario.php',
    type:'POST',
    data:valor_us,
  })
  .done(function(respuesta){
    $("#aler").html(respuesta);
  })  
  .fail(function() {
    console.log("error");
  });
}