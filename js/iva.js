$(consulta_iva());
function consulta_iva(consulta) {
$.ajax({
	url: 'crud_iva.php',
	type: 'POST',
	data: {consulta_iva: consulta},
})
.done(function(resultado) {
	$("#datos").html(resultado);
})
.fail(function() {
	console.log("error");

});

}

$(document).on('keyup', '#caja', function(){
		var valor = $(this).val();
		if(valor!=""){
			consulta_iva(valor);
		} else {
			consulta_iva();
		}
	});
	function registrar() {
$("#ventana").removeClass("modal-container");
$("#ventana").addClass("modal-container show");
iva();	
}
function iva(){
	$.ajax({
	url: 'registrar_iva.php',
})
.done(function(respuesta) {
$("#ventana2").html(respuesta);
})
.fail(function() {
	console.log("error");
})
.always(function() {
	console.log("complete");
});
}

function cerrar_ventana(){
$("#ventana").removeClass("modal-container show");
$("#ventana").addClass("modal-container");
$("#ventana").html("<section class='modal_editar' id='ventana2'></section>");
}
function activar(id) {

$.ajax({
	url: 'activar_iva.php',
	type: 'POST',
	data: {activar: id},
})
.done(function(respuesta) {
$("#aler").html(respuesta);
})
.fail(function() {
	console.log("error");
});


}