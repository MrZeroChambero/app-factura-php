$(buscar_datos());
function buscar_datos(consulta_us){

	
	$.ajax({
		/*el url es el nombre del archivo php que va a realisar una accion*/
		url:'crud/crud_basicos/crud_us.php',
		/*type es el metodo de envio get o post*/
		type:'POST',
		/*es para ubicar donde resivira los datos creo que se refiere al archivo donde se mostraran*/
		dataType:'html',
		/*el parametro que se enviara al archivo php osea el valor que van en la funcion*/
		data: {consulta_us: consulta_us},
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



function desactivar_us(id){
	$.ajax({
		url: 'desactivar/desactivar_us.php',
		type: 'POST',
		data: {id_us_des: id},
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
var msg='Desea desactivar este Usuario?';
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
      	desactivar_us(id);
        
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
var msg='Desea activar este Usuario?';
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
      	activar_us(id);
        
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
function activar_us(id){
	$.ajax({
		url: 'activar/activar_us.php',
		type: 'POST',
		data: {id_us_act: id},
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
editar_usuario(id);
}
function editar_usuario(id){
$.ajax({
	url: 'visual/editar/editar_us.php',
	type: 'POST',
	data: {editar_usuario: id},
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
function preguntas(id){
	$.ajax({
		url: 'preguntas/preguntas.php',
		type: 'POST',
		data: {preguntas: id},
	})
	.done(function(respuesta) {
	$("#aler").html(respuesta);
	})
	.fail(function() {
		console.log("error");
	});
	
}


function elejir_editar(id){




	Swal.fire({

  title: '¿Que desea hacer?',

  showDenyButton: true,

  showCancelButton: true,

  confirmButtonText: 'Editar información',

  denyButtonText: 'Cambiar clave',

  cancelButtonText:'Cerrar',

  customClass: {

    actions: 'my-actions',

    cancelButton: 'order-1 right-gap',

    confirmButton: 'order-2',

    denyButton: 'order-3',

  }

}).then((result) => {

  if (result.isConfirmed) {

    ventana_editar(id);

  } else if (result.isDenied) {

    ventana_clave(id);

  }
})

}

function ventana_clave(id){
$("#ventana").removeClass("modal-container");
$("#ventana").addClass("modal-container show");
clave(id);
}
function clave(id){
$.ajax({
	url: 'visual/editar/editar_clave_us.php',
	type: 'POST',
	data: {editar_clave: id},
})
.done(function(respuesta) {
		$("#ventana2").html(respuesta);
})
.fail(function() {
	console.log("error");
});
}


function eliminar_info(id){
	$.ajax({
		url: 'informes/quitar_info.php',
		type: 'POST',
		data: {info: id},
	})
	.done(function(respuesta) {
	$("#aler").html(respuesta);
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
}
function eliminar_todos(){
	$.ajax({
		url: 'informes/quitar_todos.php',
		type: 'POST',
		data: {info: 'true'},
	})
	.done(function(respuesta) {
	$("#aler").html(respuesta);
	})
	.fail(function() {
		console.log("error");
	});
	
}