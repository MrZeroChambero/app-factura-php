$(document).ready(function() {
info_proveedor();
});
function buscar_proveedor(consulta_pro){


$.ajax({
	url: 'crud/crud_compra/crud_pro_com.php',
	type: 'POST',
	dataType:'html',
	data: {consulta_pro: consulta_pro},
})
.done(function(respuesta5) {
	$("#proveedor").html(respuesta5);
})
.fail(function() {
	console.log("error");

});

}
$(document).on('keyup', '#prove', function(){
		var valor = $(this).val();
		if(valor!=""){
			buscar_proveedor(valor);
		} else {
			buscar_proveedor(valor);
		}
});
function agregar_proveedor(id){
	$.ajax({
		url: 'proceso1/proceso1_agregar_proveedor.php',
		type: 'POST',
		data: {agregar_proveedor: id},
	})
.done(function(respuesta) {
$("#aler").html(respuesta);})
.fail(function() {});	
}
function info_proveedor(){
	$.ajax({
		url: 'visual/compra/info_proveedor.php',
	})
	.done(function(respuesta) {
	$("#info_proveedor").html(respuesta);
		buscar_proveedor();
	})
	.fail(function() {
		console.log("error");
	});
	
}