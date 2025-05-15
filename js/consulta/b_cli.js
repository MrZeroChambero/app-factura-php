
$(buscar_datos());

function buscar_datos(consulta_cli){

	
	$.ajax({
		/*el url es el nombre del archivo php que va a realisar una accion*/
		url:'crud/crud_basicos/crud_cli.php',
		/*type es el metodo de envio get o post*/
		type:'POST',
		/*es para ubicar donde resivira los datos creo que se refiere al archivo donde se mostraran*/
		dataType:'html',
		/*el parametro que se enviara al archivo php osea el valor que van en la funcion*/
		data: {consulta_cli: consulta_cli},
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

function desactivar_cli(id){
	$.ajax({
		url: 'desactivar/desactivar_cli.php',
		type: 'POST',
		data: {id_cli_des: id},
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
var msg='¿Desea desactivar este Cliente?';
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
      	desactivar_cli(id);
        
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
var msg='Desea activar este Cliente?';
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
      	activar_cli(id);
        
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
function activar_cli(id){
	$.ajax({
		url: 'activar/activar_cli.php',
		type: 'POST',
		data: {id_cli_act: id},
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
editar_cliente(id);
}
function editar_cliente(id){
$.ajax({
	url: 'visual/editar/editar_cli.php',
	type: 'POST',
	data: {editar_cliente: id},
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
