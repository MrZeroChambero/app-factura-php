$(document).ready(function(){
  $("#f_cli").validate({

rules:{
  tipo_cliente:{
  required:true
  },
  cedula_2:{
  required:true,
  number:true,
      range: [1, 10]   
  },
  nom_cli:{
    required:true,
    minlength:3,
    maxlength:40

  },
  di_cli:{
    required:true,
    minlength:3,
    maxlength:40

  },
  cedula_cli:{

    required: true,
    number: true,
    minlength:4,
    maxlength:8
  },
  
  num_tlf:{

    required: true,
    number: true,
    minlength:11,
    maxlength:11
  }


  }
});
});


function validar_cliente(){
  if($('#f_cli').valid() == false){
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
function enviar_datos(){
var nom_cli=document.getElementById('nom_cli').value;
var cedula_cli=document.getElementById('cedula_cli').value;
var di_cli=document.getElementById('di_cli').value;
var num_tlf=document.getElementById('num_tlf').value;
var ac_cli='';

var tipo_cliente=document.getElementById('tipo_cliente').value;

if (tipo_cliente!=6) {
var cedula_2=document.getElementById('cedula_2').value;
var valor_cli="nom_cli="+nom_cli+"&cedula_cli="+cedula_cli+"&di_cli="+di_cli+"&num_tlf="+num_tlf+"&ac_cli="+ac_cli+'&tipo_cliente='+tipo_cliente+'&cedula_2='+cedula_2;
}else {
var valor_cli="nom_cli="+nom_cli+"&cedula_cli="+cedula_cli+"&di_cli="+di_cli+"&num_tlf="+num_tlf+"&ac_cli="+ac_cli+'&tipo_cliente='+tipo_cliente;
}

  $.ajax({
    url:'actualizar/actualizar_cliente.php',
    type:'POST',
    data:valor_cli,
  })
  .done(function(respuesta){
    $("#aler").html(respuesta);
  }).fail(function() {
    console.log("error");
  });
}



function verificar_tipo(){
var tipo_cliente=document.getElementById('tipo_cliente').value; 


if (tipo_cliente==6 || tipo_cliente=="") {
desactivar_cedula();
}else {
  activar_cedula();
} 
}

function desactivar_cedula(){
var cedula_2=document.getElementById('cedula_2');
cedula_2.disabled = true;
document.getElementById('cedula_2').value="";
$("#cedula_2").removeClass("controls_cortos");
$("#cedula_2").addClass("oculto");
}

function activar_cedula(){
var cedula_2=document.getElementById('cedula_2');
cedula_2.disabled = false;
document.getElementById('cedula_2').value="";
$("#cedula_2").removeClass("oculto");
$("#cedula_2").addClass("controls_cortos");
}

