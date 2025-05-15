$(filtro_proveedor());
function filtro_proveedor(){
	var consulta=document.getElementById('buscardor_proveedor').value;

	$.ajax({
		url: 'visual/consultas/seleccion.php',
		type: 'POST',
		data: {consulta: consulta},
	})
	.done(function(respuesta) {
		$("#select").html(respuesta);
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
}