


$(document).ready(function() {
//$('#enviar').click(function(){

		document.getElementById("stock_max").addEventListener("input", (e) => {

		let value =e.target.value;

		e.target.value = value.replace(/[^0-9., '']/g, "");});
		
		document.getElementById("stock_min").addEventListener("input", (e) => {

		let value =e.target.value;

		e.target.value = value.replace(/[^0-9., '']/g, "");});

$("#reg_in").validate({

rules:{
	nom_in:{
		required:true,
		minlength:3,
		maxlength:40

	},
	unidad:{
		required:true,
		number:true,
		minlength:1,
		maxlength:1

	},
	cod_in:{

		required: true,
		number: true,
		minlength:6,
		maxlength:6
	},

	stock_min:{

		required: true,
		number: true,
		minlength:1,
		maxlength:15
	},
	tipo_in:{

		required: true,
		number: true,
		range: [1, 5]
	},
	stock_max:{

		required: true,
		number: true,
		minlength:1,
		maxlength:15
	}

	}

});




$('#enviar').click(function(){


if($('#reg_in').valid() == false){

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
var cod_in=document.getElementById('cod_in').value;
var nom_in=document.getElementById('nom_in').value;
var unidad=document.getElementById('unidad').value;
var stock_max=document.getElementById('stock_max').value;
var stock_min=document.getElementById('stock_min').value;

var tipo_in=document.getElementById('tipo_in').value;
var v_in='';

var valor_in="nom_in="+nom_in+"&cod_in="+cod_in+"&unidad="+unidad+"&stock_min="+stock_min+"&stock_max="+stock_max+"&v_in="+v_in+"&tipo_in="+tipo_in;



		$.ajax({
		/*el url es el nombre del archivo php que va a realisar una accion*/
		url:'registros/g_in.php',
		/*type es el metodo de envio get o post*/
		type:'POST',
		/*es para ubicar donde resivira los datos creo que se refiere al archivo donde se mostraran*/
	
		/*el parametro que se enviara al archivo php osea el valor que van en la funcion*/
		data:valor_in,
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
	
function decimales(){
var unidad=document.getElementById('unidad').value;
if (unidad==1) {

document.getElementById('stock_max').value='';

document.getElementById('stock_min').value='';

	$(document).ready(function($){
	$('#stock_max').mask('##000', {reverse: true});
	});
	$(document).ready(function($){
	$('#stock_min').mask('##000', {reverse: true});
	});
}else {
document.getElementById('stock_max').value='';

document.getElementById('stock_min').value='';

	$(document).ready(function($){
	$('#stock_max').mask('##0.00', {reverse: true});
	});
	$(document).ready(function($){
	$('#stock_min').mask('##0.00', {reverse: true});
	});

}	




}
