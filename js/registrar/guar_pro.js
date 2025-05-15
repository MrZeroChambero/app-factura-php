


$(document).ready(function() {



$("#reg_pro").validate({

rules:{
	nom_pro:{
		required:true,
		minlength:3,
		maxlength:40

	},
	rif_pro:{
		required:true,
		number:true,
		minlength:4,
		maxlength:10

	},
	num_tlf_pro:{

		required: true,
		number: true,
		minlength:10,
		maxlength:11
	},
	dir_pro:{
		required:true,
		minlength:3,
		maxlength:40


   },
   tipo_pro:{
required: true,
number: true
   },
   rif_2:{
required: true,
number: true,
range: [1, 10] 
   },

	correo_pro:{
		required:true,
		email:true,
		minlength:3,
		maxlength:40


	},


}
});




$('#enviar').click(function(){

if($('#reg_pro').valid() == false){

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

var nom_pro=document.getElementById('nom_pro').value;
var rif_pro=document.getElementById('rif_pro').value;
var num_tlf_pro=document.getElementById('num_tlf_pro').value;
var dir_pro=document.getElementById('dir_pro').value;
var correo_pro=document.getElementById('correo_pro').value;
var tipo_pro=document.getElementById('tipo_pro').value;
var  rif_2=document.getElementById('rif_2').value;
var v_pro='';

var valor_pro="nom_pro="+nom_pro+"&rif_pro="+rif_pro+"&num_tlf_pro="+num_tlf_pro+"&dir_pro="+dir_pro+"&correo_pro="+correo_pro+"&v_pro="+v_pro+'&tipo_pro='+tipo_pro+'&rif_2='+rif_2;

	



	
	$.ajax({
		/*el url es el nombre del archivo php que va a realisar una accion*/
		url:'registros/g_pro.php',
		/*type es el metodo de envio get o post*/
		type:'POST',
		/*es para ubicar donde resivira los datos creo que se refiere al archivo donde se mostraran*/
	
		/*el parametro que se enviara al archivo php osea el valor que van en la funcion*/
		data:valor_pro,
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
	

