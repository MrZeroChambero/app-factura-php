
$(buscar_datos());

function buscar_datos(consulta_an){

	
	$.ajax({
		/*el url es el nombre del archivo php que va a realisar una accion*/
		url:'crud/crud_basicos/crud_an.php',
		/*type es el metodo de envio get o post*/
		type:'POST',
		/*es para ubicar donde resivira los datos creo que se refiere al archivo donde se mostraran*/
		dataType:'html',
		/*el parametro que se enviara al archivo php osea el valor que van en la funcion*/
		data: {consulta_an: consulta_an},
	})
	.done(function(respuesta){
		//aqui se accede a la caja osea el div con el id correspondiente para agregar codigo
		$("#datos").html(respuesta);
			})
	.fail(function() {
		console.log("error AL CONSULTAR");
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

function desactivar_an(id){
	$.ajax({
		url: 'desactivar/desactivar_an.php',
		type: 'POST',
		data: {id_an_des: id},
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
var msg='Desea desactivar este analisis?';
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
      	desactivar_an(id);
        
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
var msg='Desea activar este analisis?';
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
      confirmButtonText: 'si, sactivar!',
     cancelButtonText: 'No, cancela!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
      	activar_an(id);
        
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
function activar_an(id){
	$.ajax({
		url: 'activar/activar_an.php',
		type: 'POST',
		data: {id_an_act: id},
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
editar_analsis(id);
}
function editar_analsis(id){
$.ajax({
	url: 'visual/editar/editar_an.php',
	type: 'POST',
	data: {editar_analisis: id},
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
function verificar() {
    Swal.fire({
        title: 'Algo ha salido mal',
        html: 'Porfavor vuelva a intentarlo<br> si el error presiste reinicie la pagina',
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
}
function consumo(id){
	$.ajax({
		url: 'proceso3/elejir_analisis.php',
		type: 'POST',
		data: {id: id},
	})
	.done(function(respuesta) {
		$("#aler").html(respuesta);	})
	.fail(function() {
		console.log("error");

	});
	
}