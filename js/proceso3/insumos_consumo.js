$(document).ready(function() {
//$('#enviar').click(function(){


$("#agregar_in_co").validate({

rules:{
	
	can_ag_in_co:{

		required: true,
		number: true,
		minlength:1,
		maxlength:8
	},
		id_in_cons:{

		required: true,
		number: true,
		minlength:1,
		maxlength:8
	}

	}

});

});



function agregar_consumos(id) {


if($('#agregar_in_co').valid() == false){

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
}else {
alerta_opcion(id);
}


}
function enviar (id) {
	var can_in=document.getElementById('can_ag_in_co').value;

  var id_in=id;

  var agregar_consumo='';

  var valor="can_in="+can_in+"&id_in="+id_in+"&agregar_consumo="+agregar_consumo;

	$.ajax({
		url:'proceso3/proceso3_asignar_consumo.php',	
		type:'POST',
		data:valor,
	})
	.done(function(respuesta){
		$("#aler1").html(respuesta);
	})
	.fail(function() {
		console.log("error");
	});
}
function alerta_opcion(id){

 const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
       cancelButton: 'btn btn-danger',
      },
     buttonsStyling: true
    })
  
   swalWithBootstrapButtons.fire({
      title: 'esta seguro?',
     text: "Elija si para realizar la agregar el consumo",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, Agregar',
     cancelButtonText: 'No, cancela!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
      	enviar(id);

      } else if (
       
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelado',
          'tome el tiempo necesario',
          'error'
        )
      }
    })
}

function quitar_consumo(id){

 const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
       cancelButton: 'btn btn-danger',
      },
     buttonsStyling: true
    })
  
   swalWithBootstrapButtons.fire({
      title: '¿Esta seguro?',
     text: "Elija si, para realizar la quitar el consumo",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, quitar',
     cancelButtonText: 'No, cancela!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        quitar(id);

      } else if (
       
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelado',
          'tome el tiempo necesario',
          'error'
        )
      }
    })
}
function quitar(id){

  $.ajax({
    url:'proceso3/proceso3_quitar_consumo.php',  
    type:'POST',
    data:{id:id},
  })
  .done(function(respuesta){
    $("#aler1").html(respuesta);
  })
  .fail(function() {
    console.log("error");
  });
  
}

