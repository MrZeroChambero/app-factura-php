$(filtro_insumos());
function filtro_insumos(){
	var consulta=document.getElementById('buscardor_insumos').value;

	$.ajax({
		url: 'visual/consultas/seleccion_consumo.php',
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