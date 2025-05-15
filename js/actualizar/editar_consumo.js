$(document).ready(function() {


consulta='';
$.ajax({
	url: 'consulta_consumo_an.php',
	type: 'POST',
	data: consulta,
})
.done(function(respuesta) {
	$("#datos").html(respuesta);
})
.fail(function() {
	console.log("error");

});
	
});

var consulta2="";
$(buscar_insumo(consulta2));
function buscar_insumo(consulta2){


$.ajax({
	url: 'crud_co.php',
	type: 'POST',
	dataType:'html',
	data: {consulta2: consulta2},
})
.done(function(respuesta2) {
	$("#insumos").html(respuesta2);
})
.fail(function() {
	console.log("error");

});

}


//ejecuta la funcion para verificar que el proveedor exista
$(document).on('keyup', '#b_in', function(){
		var valor = $(this).val();
		if(valor!=""){
			buscar_insumo(valor);
		} else {
			buscar_insumo(valor);
		}
	});


function editar(id){
var elemento1 = document.getElementById("boton1");
var elemento2 = document.getElementById("boton2");
$("#ventana").removeClass("modal-container");
$("#ventana").addClass("modal-container show");
ventana_editar(id);
}
function ventana_editar(id){
	$.ajax({
		url: 'editar_consumo.php',
		type: 'POST',
		data: {editar: id},
	})
	.done(function(respuesta2) {
		$("#ventana2").html(respuesta2);
	})
	.fail(function() {
		console.log("error");
	});
}
function cerrar_ventana(){
$("#ventana").removeClass("modal-container show");
$("#ventana").addClass("modal-container");
$("#ventana").html("<section class='modal_editar' id='ventana2'></section>");
}
function validar(id) {
	$("#editar_co").validate({

rules:{
	num_tlf:{
		required: true,
		number: true,
		maxlength:11,
		min:1
	}
	}

});
verificar_datos(id);
}

function verificar_datos(id){
	if($('#editar_co').valid() == false){
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
enviar_datos(id);
}
function enviar_datos(id){
	var cantidad=document.getElementById('cantidad').value;
	var valor="id="+id+"&cantidad="+cantidad;
	$.ajax({
		url: 'ed_co.php',
		type: 'POST',
		data: valor,
	})
	.done(function(respuesta2) {
		$("#aler").html(respuesta2);
	})
	.fail(function() {
		console.log("error");
	});
	
}
function quitar(id){
var msg='Desea quitar este insumo?';
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
      	kitar(id);
        
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
function kitar(id){
	$.ajax({
		url: 'quitar_co.php',
		type: 'POST',
		data: {quitar:id},
	})
	.done(function(respuesta24) {
	$("#aler").html(respuesta24);
	})
	.fail(function() {
		console.log("error");
	});
	
}