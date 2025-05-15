$(buscar_clientes());

$(document).on('keyup', '#buscar_cliente', function(){
		var valor = $(this).val();
		if(valor!=""){
			buscar_clientes(valor);
		} else {
			buscar_clientes();
		}
});

function buscar_clientes(consulta){
	$.ajax({
	url: 'crud/crud_factura/crud_cli_ven.php',
	type: 'POST',
	data: {consulta_cli: consulta},
})
.done(function(respuesta) {
	$("#seleccion_cliente").html(respuesta);
})
.fail(function() {
	console.log("error");

});
}
function agregar_cliente(id) {
	$.ajax({
		url: 'proceso2/proceso2_agregar_cliente.php',
		type: 'POST',
		data: {agregar_cliente: id},
	})
	.done(function(respuesta) {
$("#aler").html(respuesta);
	})
	.fail(function() {
		alert("error");

	});
	
}
