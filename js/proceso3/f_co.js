$(buscar_insumos());

function buscar_insumos(consulta_in){


$.ajax({
	url: 'crud/crud_consumo/crud_in_co.php',
	type: 'POST',
	dataType:'html',
	data: {consulta_in: consulta_in},
})
.done(function(respuesta2) {
	$("#consumo_asignado").html(respuesta2);
	asignado();
})
.fail(function() {
	console.log("error");

});

}


//ejecuta la funcion para verificar que el proveedor exista
$(document).on('keyup', '#buscar_insumos', function(){
		var valor = $(this).val();
		if(valor!=""){
			buscar_insumos(valor);
		} else {
			buscar_insumos(valor);
		}
	});


function ventana_agregar(id){
$("#ventana").removeClass("modal-container");
$("#ventana").addClass("modal-container show");
agregar(id);
}
function agregar(id){
$.ajax({
	url: 'visual/consumo/ventana_consumo.php',
	type: 'POST',
	data: {id: id},
})
.done(function(respuesta) {
		$("#ventana2").html(respuesta);
})
.fail(function() {
	console.log("error");
});
}
function cerrar_ventana(){
$("#ventana").removeClass("modal-container show");
$("#ventana").addClass("modal-container");
$("#ventana").html("<section class='modal_small' id='ventana2'></section>");
buscar_insumos();
}

function asignado(consulta_in){
	

	$.ajax({
		url: 'crud/crud_consumo/crud_consumo_asignado.php',
		type: 'POST',
		data: {consulta_in: consulta_in},
	})
	.done(function(respuesta) {
		$("#asignado").html(respuesta);
	})
	.fail(function() {
		console.log("error");
	});
	
}

$(document).on('keyup', '#buscar_asignado', function(){
		var valor = $(this).val();
		if(valor!=""){
			asignado(valor);
		} else {
			asignado(valor);
		}
	});

function volver(){
	setTimeout(function(){window.location.replace('index.php?pagina=consulta_analisis')},500);
}