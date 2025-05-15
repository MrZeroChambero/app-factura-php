function pregunta(){

	var respuesta=document.getElementById('respuesta').value;

	$.ajax({
		url: 'clave/seguridad.php',
		type: 'POST',
		data: {respuesta:respuesta},
	})

	.done(function(respuesta){
		$("#aler").html(respuesta);
	})

	.fail(function() {
		console.log("error");

	});
}

$('#enviar').click(function(){

	pregunta();
});