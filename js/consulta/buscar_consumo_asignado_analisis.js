$(filtro_analsis());
function filtro_analsis(){
	var consulta=document.getElementById('buscador_analisis').value;

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