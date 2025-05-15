


$(document).ready(function() {
//$('#enviar').click(function(){

	

$("#reg_us").validate({

rules:{
	nom_us:{
		required:true,
		minlength:3,
		maxlength:40

	},
	pass_us:{
		required:true,
		minlength:3,
		maxlength:40

	},
	cedula_us:{
		required: true,
		number: true,
		minlength:4,
		maxlength:8
		
	},
	apellido_us:{
		required:true,
		minlength:3,
		maxlength:20


   },

	nick_us:{
		required:true,
		minlength:3,
		maxlength:12


	},


	nivel_us: {
	required: true
	},


tlf_us:{
		required: true,
		number: true,
		minlength:10,
		maxlength:11
		
	
}

}
});




$('#enviar').click(function(){

if($('#reg_us').valid() == false){
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

var nom_us=document.getElementById('nom_us').value;
var apellido_us=document.getElementById('apellido_us').value;
var nick_us=document.getElementById('nick_us').value;
var pass_us=document.getElementById('pass_us').value;
var cedula_us=document.getElementById('cedula_us').value;
var nivel_us=document.getElementById('nivel_us').value;
var tlf_us=document.getElementById('tlf_us').value;
var v_us='';
var valor_us="nom_us="+nom_us+"&apellido_us="+apellido_us+"&nick_us="+nick_us+"&pass_us="+pass_us+"&cedula_us="+cedula_us+"&nivel_us="+nivel_us+"&tlf_us="+tlf_us+"&v_us="+v_us;

	$.ajax({
		/*el url es el nombre del archivo php que va a realisar una accion*/
		url:'registros/g_us.php',
		/*type es el metodo de envio get o post*/
		type:'POST',
		/*es para ubicar donde resivira los datos creo que se refiere al archivo donde se mostraran*/
	
		/*el parametro que se enviara al archivo php osea el valor que van en la funcion*/
		data:valor_us,
	})
	.done(function(respuesta){
		//aqui se accede a la caja osea el div con el id correspondiente para agregar codigo
		$("#aler").html(respuesta);


		
	})
			
	.fail(function() {
		console.log("error");
	});
	});
	});
	

