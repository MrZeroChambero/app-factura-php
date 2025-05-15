	$(filtro_consumo());

function buscar_datos(consulta){
/*
var consultas="consulta="+consulta+"&buscar"+buscar;*/
	$.ajax({

		url:'visual/consultas/buscador_consumo_asignado.php',

		type:'POST',

		dataType:'html',

		data: {consulta:consulta},
	})
	.done(function(respuesta){

		$("#buscar").html(respuesta);
			})
	.fail(function() {
		console.log("error");
	})
}
function filtro_consumo(){
	var filtro=document.getElementById('filtro').value;
	$(buscar_datos(filtro));
}