$(document).ready(function() {
 mascara();

    document.getElementById("stockmax").addEventListener("input", (e) => {

    let value =e.target.value;

    e.target.value = value.replace(/[^0-9., '']/g, "");});
    
    document.getElementById("stockmin").addEventListener("input", (e) => {

    let value =e.target.value;

    e.target.value = value.replace(/[^0-9., '']/g, "");});

  $("#f_in").validate({
rules:{
  nom_in:{
    required:true,
    minlength:3,
    maxlength:40
  },
  des_in:{
    required:true,
    minlength:3,
    maxlength:40
  },
    cod_in:{
    required: true,
    number: true,
    minlength:6,
    maxlength:6
  },
  tipo_in:{
       required: true,
    number: true,
    range: [1, 5]
  },
  stockmin:{
    required: true,
    number: true,
    minlength:1,
    maxlength:15
  },
  stockmax:{
    required: true,
    number: true,
    minlength:1,
    maxlength:15
  }
  }

});
});

function actualizar_insumos () {
  if($('#f_in').valid() == false){
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
var cod_in=document.getElementById('cod_in').value;
var nom_in=document.getElementById('nom_in').value;
var unidad=document.getElementById('unidad').value;
var stock_max=document.getElementById('stockmax').value;
var stock_min=document.getElementById('stockmin').value; 

var tipo_in=document.getElementById('tipo_in').value; 
var valor_in="nom_in="+nom_in+"&unidad="+unidad+"&stock_min="+stock_min+"&stock_max="+stock_max+"&cod_in="+cod_in+"&tipo_in="+tipo_in;
  $.ajax({
    url:'actualizar/actualizar_insumo.php',
    type:'POST',
    data:valor_in,
  })
  .done(function(respuesta){
    $("#aler").html(respuesta);
  })
      
  .fail(function() {
    console.log("error");
  });

}