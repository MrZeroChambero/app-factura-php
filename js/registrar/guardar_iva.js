$(document).ready(function() {
$("#reg_iva").validate({
rules:{
	cantidad:{
		required: true,
		number: true,
		minlength:1,
		maxlength:5,
		range:[0,99]
	}
	}


});
});
function enviar_datos(){

if($('#reg_iva').valid() == false){

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
var cantidad=document.getElementById('cantidad').value;
$.ajax({
	url: 'registros/g_iva.php',
	type: 'POST',
	data: {cantidad: cantidad},
})
.done(function(respuesta) {
$("#aler").html(respuesta);
})
.fail(function() {
	console.log("error");
});
}