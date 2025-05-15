
$(v_pro());
function v_pro(en_pro1){


$.ajax({
	url: 'pro.php',
	type: 'POST',
	dataType:'html',
	data: {en_pro1: en_pro1},
})
.done(function(respuesta5) {
	$("#datos").html(respuesta5);
})
.fail(function() {
	console.log("error");

});

}


//ejecuta la funcion para verificar que el proveedor exista
$(document).on('keyup', '#prove', function(){
		var valor = $(this).val();
		if(valor!=""){
			v_pro(valor);
		} else {
			v_pro(valor);
		}
	});
