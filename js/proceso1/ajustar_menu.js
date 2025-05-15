function cambiar_menu() {
	info_proveedor();
buscar_insumos_compra();
}

function buscar_insumos_compra(){
	$.ajax({
		url: 'visual/compra/consultar_insumos_compra.php',
	})
	.done(function(respuesta) {
		$("#consultar_insumos").html(respuesta);
		buscar_insumo(); crud_lista();
	})
	.fail(function() {
		console.log("error");
	});
	
}