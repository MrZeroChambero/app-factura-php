
$(buscar_datos());
 function m() {
 	editar=document.getElementById('edit').value;
 	editar1="editar="+editar;
 	 $.ajax({
 	 	url: 'v_editar.php',
 	 	type: 'POST',
 	 	data: editar1,
 	 })
 	 .done(function() {
 	 	console.log("success");
 	 })
 	 .fail(function() {
 	 	console.log("error");
 	 });
 	 
 }

function buscar_datos(consulta_co){

	
	$.ajax({
		/*el url es el nombre del archivo php que va a realisar una accion*/
		url:'crud/crud_basicos/crud_co.php',
		/*type es el metodo de envio get o post*/
		type:'POST',
		/*es para ubicar donde resivira los datos creo que se refiere al archivo donde se mostraran*/
		dataType:'html',
		/*el parametro que se enviara al archivo php osea el valor que van en la funcion*/
		data: {consulta_co: consulta_co},
	})
	.done(function(respuesta){
		//aqui se accede a la caja osea el div con el id correspondiente para agregar codigo
		$("#aler").html(respuesta);
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
