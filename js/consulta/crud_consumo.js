function consultar_analisis(){
var consulta=document.getElementById('analisis').value;
	$.ajax({
		url: 'crud/crud_factura/crud_consumo_asignado_analisis.php',
		type: 'POST',
		data: {consulta: consulta},
	})
	.done(function(respuesta) {
		$("#crud").html(respuesta);
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
}


function consultar_insumos(){
var consulta=document.getElementById('insumos').value;
	$.ajax({
		url: 'crud/crud_factura/crud_consumo_asignado_insumos.php',
		type: 'POST',
		data: {consulta: consulta},
	})
	.done(function(respuesta) {
		$("#crud").html(respuesta);
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
}