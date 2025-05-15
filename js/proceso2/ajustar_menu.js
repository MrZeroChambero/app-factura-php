$(info_cliente());
function info_cliente() {
$.ajax({
	url: 'visual/factura/info_cliente.php',
})
.done(function(respuesta) {
	$("#info_cliente").html(respuesta);
})
.fail(function() {
	console.log("error");
});

}

/*function boton_carrito(){
$.ajax({
	url: 'visual/factura/ver_carrito.php',
})
.done(function(respuesta) {
$("#botoncarrito").html(respuesta);
})
.fail(function() {
	console.log("error");

});

}*/


function lista_analisis(){
$.ajax({
	url: 'visual/factura/listas_analisis.php',
})
.done(function(respuesta) {
$("#lista_analisis").html(respuesta);
})
.fail(function() {
	console.log("error");

});

}


function cambiar_menu(){
info_cliente();
lista_analisis();
 crud_carrito();
}