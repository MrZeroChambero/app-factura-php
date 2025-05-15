
$(buscar_datos());

function buscar_datos(consulta_in){

	
	$.ajax({
		/*el url es el nombre del archivo php que va a realisar una accion*/
		url:'crud/crud_basicos/crud_in.php',
		/*type es el metodo de envio get o post*/
		type:'POST',
		/*es para ubicar donde resivira los datos creo que se refiere al archivo donde se mostraran*/
		dataType:'html',
		/*el parametro que se enviara al archivo php osea el valor que van en la funcion*/
		data: {consulta_in: consulta_in},
	})
	.done(function(respuesta){
		//aqui se accede a la caja osea el div con el id correspondiente para agregar codigo
		$("#datos").html(respuesta);
			})
	.fail(function() {
		console.log("error");
	})
	
	
}

$(document).on('keyup', '#caja', function(){
		var valor = $(this).val();
		if(valor!=""){
			buscar_datos(valor);
		} else {
			buscar_datos();
		}
	});


function desactivar_in(id){
	$.ajax({
		url: 'desactivar/desactivar_in.php',
		type: 'POST',
		data: {id_in_des: id},
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
var msg='Desea desactivar este insumo?';
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
      	desactivar_in(id);
        
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
var msg='Desea activar este insumo?';
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
      	activar_in(id);
        
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
function activar_in(id){
	$.ajax({
		url: 'activar/activar_in.php',
		type: 'POST',
		data: {id_in_act: id},
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
editar_insumo(id);
}
function editar_insumo(id){
$.ajax({
	url: 'visual/editar/editar_in.php',
	type: 'POST',
	data: {editar_insumos: id},
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