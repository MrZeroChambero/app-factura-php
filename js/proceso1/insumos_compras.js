$(document).ready(function() {
//$('#enviar').click(function(){


$("#agregar_in").validate({

rules:{
	
	cantidad:{

		required: true,
		number: true,
		minlength:1,
		maxlength:8
	},
		costo_in:{

		required: true,
		number: true,
		minlength:1,
		maxlength:20
	}
	}

});
function quitar_insumos(id){
var id_in=id;
var quitar_lista="";
var valor="id_in="+id_in+"&quitar_lista="+quitar_lista;
$.ajax({
		url:'proceso1.php',
		type:'POST',
		data:valor,
	})
	.done(function(respuesta){
		$("#aler").html(respuesta);	
	})
			
	.fail(function() {
		console.log("error");
	});	

}
function validar(id){
if($('#agregar_in').valid() == false){

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
agregar_insumo(id);
}
function agregar_insumo(id){

}
$('#agregar').click(function(){


var can_in=document.getElementById('can_ag_in').value;

var costo_in=document.getElementById('costo_in').value;

var id_in=document.getElementById('id_in_comp').value;

var agregar_lista='';

var valor="can_in="+can_in+"&id_in="+id_in+"&agregar_lista="+agregar_lista+"&costo_in="+costo_in;

	$.ajax({
		/*el url es el nombre del archivo php que va a realisar una accion*/
		url:'proceso1.php',
		/*type es el metodo de envio get o post*/
		type:'POST',
		/*es para ubicar donde resivira los datos creo que se refiere al archivo donde se mostraran*/
	
		/*el parametro que se enviara al archivo php osea el valor que van en la funcion*/
		data:valor,
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