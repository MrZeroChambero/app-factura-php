
function buscar(consulta,consulta2) {
var valor="consulta="+consulta+"&consulta2="+consulta2;				
$.ajax({
	url: 'crud_co.php',
	type: 'POST',
	data: valor,
})
.done(function(respuesta) {
		$("#mostrar_in").html(respuesta);
})
.fail(function() {
	console.log("error");

});
}
$(document).ready(function(){
	var elejir ="";
	var gasto ="";
buscar(elejir,gasto);
$('#enviar').click(function(){
	var elejir =document.getElementById('analisis').value;
	var gasto =document.getElementById('buscar').value;
buscar(elejir,gasto);
});
});


