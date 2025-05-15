
$(buscar_datos());

function buscar_datos(consulta_pro){
	$.ajax({
		url:'crud/crud_basicos/crud_pro.php',
		type:'POST',
		data: {consulta_pro: consulta_pro},
	})
	.done(function(respuesta){
		$("#datos").html(respuesta);
			})
	.fail(function() {
		console.log("error");
	})
	
	
}
function asignar(id) {
	$.ajax({
		url: 'mercancia/elejir_proveedor_mercancia.php',
		type: 'POST',
		data: {proveedor: id},
	})
	.done(function(respuesta7) {
		$("#aler").html(respuesta7);
	})
	.fail(function() {
		console.log("error");

	});
	

}


$(document).on('keyup', '#caja', function(){
		var valor = $(this).val();
		if(valor!=""){
			buscar_datos(valor);
		} else {
			buscar_datos();
		}
	});

function desactivar_pro(id){
	$.ajax({
		url: 'desactivar/desactivar_pro.php',
		type: 'POST',
		data: {id_pro_des: id},
	})
	.done(function(respuesta) {
		$("#aler").html(respuesta);
		buscar_datos();
	})
	.fail(function() {
		console.log("error");
	});
	
}
function desactivar(id){
var msg='Desea desactivar este Proveedor?';
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
      confirmButtonText: 'si, Desactivar!',
     cancelButtonText: 'No, cancela!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
      	desactivar_pro(id);
        
      } else if (
       
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelado',
          'A cancelado la desactivacion',
          'error'
        )
      }
    })
}

function activar(id){
var msg='Desea activar este Proveedor?';
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
      confirmButtonText: 'si, activar!',
     cancelButtonText: 'No, cancela!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
      	activar_pro(id);
        
      } else if (
       
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelado',
          'A cancelado la activacion',
          'error'
        )
      }
    })
}
function activar_pro(id){
	$.ajax({
		url: 'activar/activar_pro.php',
		type: 'POST',
		data: {id_pro_act: id},
	})
	.done(function(respuesta) {
		$("#aler").html(respuesta);
		buscar_datos();
	})
	.fail(function() {
		console.log("error");
	});
	
}
function ventana_editar(id){
$("#ventana").removeClass("modal-container");
$("#ventana").addClass("modal-container show");
editar_proveedor(id);
}
function editar_proveedor(id){
$.ajax({
	url: 'visual/editar/editar_pro.php',
	type: 'POST',
	data: {editar_proveedor: id},
})
.done(function(respuesta) {
		$("#ventana2").html(respuesta);
})
.fail(function() {
	console.log("error");
});
}
function cerrar_ventana(){
$("#ventana").removeClass("modal-container show");
$("#ventana").addClass("modal-container");
$("#ventana").html("<section class='modal_editar' id='ventana2'></section>");
buscar_datos();
}
