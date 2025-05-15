$(document).ready(function() {
  validar_datos();
  });
function validar_datos(){
  $("#f_an").validate({
rules:{
  nom_an:{
    required:true,
    minlength:3,
    maxlength:40
  },
    cod_an:{
    required:true,
    number:true,
    minlength:6,
    maxlength:6
  },
  des_an:{
    required:true,
    minlength:3,
    maxlength:40
  },
  pre_an:{
    required: true,
    number: true,
  },
  tipo_an:{
    required: true,
  number: true,
    range: [1, 4]
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
 if($('#f_an').valid() == false){
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
var nom_an=document.getElementById('nom_an').value;
var des_an=document.getElementById('des_an').value;
var tipo_an=document.getElementById('tipo_an').value;
var cod_an=document.getElementById('cod_an').value;
var pre_an=document.getElementById('pre_an').value;
/*var pre_an2=document.getElementById('pre_an2').value;*/
var valor_an="nom_an="+nom_an+"&des_an="+des_an+"&tipo_an="+tipo_an+"&pre_an="+pre_an+"&cod_an="+cod_an;

  $.ajax({
    url:'actualizar/actualizar_analisis.php',
    type:'POST',
    data:valor_an,
  })
  .done(function(respuesta){
    $("#aler").html(respuesta);
  })    
  .fail(function() {
    console.log("error");
  }); 
}


 