$(buscar_insumo());
function buscar_insumo(consulta){


$.ajax({
	url: 'crud/mercancia/mercancia_crud.php',
	type: 'POST',
	data: {consulta: consulta},
})
.done(function(respuesta5) {
	$("#Insumos_asignar").html(respuesta5);
  ver_asignados();
})
.fail(function() {
	console.log("error");

});

}
$(document).on('keyup', '#buscar', function(){
		var valor = $(this).val();
		if(valor!=""){
			buscar_insumo(valor);
		} else {
			buscar_insumo(valor);
		}
});

function asignar(id){
var msg='¿Desea agregar este insumo?';
 const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
       cancelButton: 'btn btn-danger',
      },
     buttonsStyling: true
    })
  
   swalWithBootstrapButtons.fire({
      title: msg,

      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'si!',
     cancelButtonText: 'No, cancela!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
      	enviar_agregar(id);
        
      } else if (
       
        result.dismiss === Swal.DismissReason.cancel
      ) {

      }
    })
}
function enviar_agregar(id){
	$.ajax({
		url: 'mercancia/agregar_mercancia.php',
		type: 'POST',
		data: {id: id},
	})
	.done(function(respuesta) {
	$("#aler").html(respuesta);
	})
	.fail(function() {
		console.log("error");
	});
	
}

function quitar(id){
var msg='¿Desea quitar este insumo?';
 const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
       cancelButton: 'btn btn-danger',
      },
     buttonsStyling: true
    })
  
   swalWithBootstrapButtons.fire({
      title: msg,

      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'si!',
     cancelButtonText: 'No, cancela!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
      	enviar_quitar(id);
        
      } else if (
       
        result.dismiss === Swal.DismissReason.cancel
      ) {

      }
    })
}
function enviar_quitar(id){
	$.ajax({
		url: 'mercancia/quitar_mercancia.php',
		type: 'POST',
		data: {id: id},
	})
	.done(function(respuesta) {
	$("#aler").html(respuesta);
	})
	.fail(function() {
		console.log("error");
	});
	
}

function ver_asignados(consulta){
  $.ajax({
    url: 'crud/mercancia/mercancias_asignada_crud.php',
    type: 'POST',
    data: {consulta: consulta},
  })
  .done(function(respuesta) {
  $("#Insumos_asignados").html(respuesta);
  })
  .fail(function() {
    console.log("error");
  });
}

$(document).on('keyup', '#buscar_asignados', function(){
    var valor = $(this).val();
    if(valor!=""){
      ver_asignados(valor);
    } else {
      ver_asignados(valor);
    }
});
