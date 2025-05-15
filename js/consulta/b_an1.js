$(document).ready(function() {
var casa1 =document.getElementById('casa').value;
$.ajax({
	url: 'crud_au.php',
	type: 'POSt',
	data: {casa: casa1},
})
	.done(function(respuesta){
		//aqui se accede a la caja osea el div con el id correspondiente para agregar codigo
		$("#datos1").html(respuesta);
		})
.fail(function() {
	console.log("error");

});
	
});