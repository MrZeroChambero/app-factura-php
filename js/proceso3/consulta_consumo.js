
$(document).ready(function() {
$(buscar_analisis());
	});
function buscar_analisis(consulta_an){


$.ajax({
	url: 'consulta_consumo_an.php',
	type: 'POST',
	dataType:'html',
	data: {consulta_an: consulta_an},
})
.done(function(respuesta5) {
	$("#datos").html(respuesta5);
})
.fail(function() {
	console.log("error");

});

}


//ejecuta la funcion para verificar que el proveedor exista
$(document).on('keyup', '#analisis', function(){
		var valor = $(this).val();
		if(valor!=""){
			buscar_analisis(valor);
		} else {
			buscar_analisis(valor);
		}
	});
