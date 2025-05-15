$(verificar());

function verificar(){

jQuery.validator.setDefaults({
  debug: true,
  success: "valid"
});

$( "#formulario" ).validate({
  rules: {
    pass: "required",
    pass2: {
      equalTo: "#pass"
    }
  }
});

}

function enviar_info(){

verificar();

if($('#formulario').valid() == false){

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
enviar_datos();
}

function enviar_datos(){

	var pass=document.getElementById('pass').value;

	var pass2=document.getElementById('pass2').value;


	if (pass!=pass2) {

 Swal.fire({
        title: 'Completa los campos',
        text: 'La claves no coinciden',
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
var valor="pass="+pass+"&pass2="+pass2;

	$.ajax({
		url: 'clave/gestionar.php',
		type: 'POST',
		data: valor,
	})

	.done(function(respuesta){
		$("#aler").html(respuesta);
	})

	.fail(function() {
		console.log("error");

	});
	
}

