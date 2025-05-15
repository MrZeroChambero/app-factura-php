	$(filtro());

function buscar_datos(consulta){
/*
var consultas="consulta="+consulta+"&buscar"+buscar;*/
	$.ajax({

		url:'visual/consultas/buscador_mercancia.php',

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
function filtro(){
	var filtro=document.getElementById('filtro').value;
	$(buscar_datos(filtro));
}

/*$(document).on('keyup', '#buscador', function(){
		var valor = $(this).val();
		if(valor!=""){
			buscar_datos(valor);
		} else {
			buscar_datos();
		}
	});*/