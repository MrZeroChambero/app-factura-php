
function consultar_proveedor(){
var consulta=document.getElementById('proveedor').value;
	$.ajax({
		url: 'crud/crud_compra/crud_mercancia_proveedor.php',
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
		url: 'crud/crud_compra/crud_mercancia_insumos.php',
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