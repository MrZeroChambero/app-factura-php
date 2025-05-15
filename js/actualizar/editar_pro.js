$(document).ready(function() {
  validar_datos();
  });
function validar_datos(){
  $("#f_pro").validate({

rules:{
  nom_pro:{
    required:true,
    minlength:3,
    maxlength:40

  },
  rif_pro:{
    required:true,
    number:true,
    minlength:4,
    maxlength:10
  },
  num_tlf_pro:{
    required: true,
    number: true,
    minlength:10,
    maxlength:11
  },
  dir_pro:{
    required:true,
    minlength:3,
    maxlength:40
   },
  correo_pro:{
    required:true,
    email:true,
    minlength:3,
    maxlength:40
  },
   tipo_pro:{
required: true,
number: true
   },
   rif_2:{
required: true,
number: true,
range: [1, 10] 
   }

}
});
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
function verificar_datos(){

if($('#f_pro').valid() == false){

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

function enviar_datos(){

var nom_pro=document.getElementById('nom_pro').value;
var rif_pro=document.getElementById('rif_pro').value;
var num_tlf_pro=document.getElementById('num_tlf_pro').value;
var dir_pro=document.getElementById('dir_pro').value;
var correo_pro=document.getElementById('correo_pro').value;

var tipo_pro=document.getElementById('tipo_pro').value;
var  rif_2=document.getElementById('rif_2').value;

var valor_pro="nom_pro="+nom_pro+"&rif_pro="+rif_pro+"&num_tlf_pro="+num_tlf_pro+"&dir_pro="+dir_pro+"&correo_pro="+correo_pro+'&tipo_pro='+tipo_pro+'&rif_2='+rif_2;
  $.ajax({
    url:'actualizar/actualizar_proveedor.php',
    type:'POST',
    data:valor_pro,
  })
  .done(function(respuesta){
    $("#aler").html(respuesta);
  })  
  .fail(function() {
    console.log("error");
  });
}


