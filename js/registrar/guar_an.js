


$(document).ready(function() {
//$('#enviar').click(function(){


$("#reg_an").validate({

rules:{
	nom_an:{
		required:true,
		minlength:3,
		maxlength:40

	},
	cod_an:{
		required:true,
		number:true,
		minlength:6,
		maxlength:6

	},
	des_an:{
		required:true,
		minlength:3,
		maxlength:40

	},
	
	pre_an:{

		required: true,
		number: true,

	},
	
	tipo_an:{

		required: true,
		
		number: true,
		range: [1, 4]
	}


	}


});




$('#enviar').click(function(){

if($('#reg_an').valid() == false){

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

var nom_an=document.getElementById('nom_an').value;
var des_an=document.getElementById('des_an').value;
var tipo_an=document.getElementById('tipo_an').value;
var cod_an=document.getElementById('cod_an').value;
var pre_an=document.getElementById('pre_an').value;
var v_an='';
var valor_an="nom_an="+nom_an+"&des_an="+des_an+"&tipo_an="+tipo_an+"&cod_an="+cod_an+"&pre_an="+pre_an+"&v_an="+v_an;

	



	
	$.ajax({
		/*el url es el nombre del archivo php que va a realisar una accion*/
		url:'registros/g_an.php',
		/*type es el metodo de envio get o post*/
		type:'POST',
		/*es para ubicar donde resivira los datos creo que se refiere al archivo donde se mostraran*/
	
		/*el parametro que se enviara al archivo php osea el valor que van en la funcion*/
		data:valor_an,
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
	

