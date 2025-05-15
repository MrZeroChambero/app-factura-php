$(buscar_todos);
$(document).ready(function() {
	$(buscar_todos());
$('#buscar').click(function(){
var fecha_i=document.getElementById('fecha_i').value;
var fecha_f=document.getElementById('fecha_f').value;
var f='';

	if ((fecha_i != '') && (fecha_f != '')) {


$(buscar_fechas(fecha_i,fecha_f));	
	}else {
		$(buscar_todos());
	}
	});
});
function buscar_fechas(fecha_i,fecha_f){
var fechas='fecha_i='+fecha_i+'&fecha_f='+fecha_f;
	$.ajax({
		/*el url es el nombre del archivo php que va a realisar una accion*/
		url:'crud/crud_compra/crud_compras.php',
		/*type es el metodo de envio get o post*/
		type:'POST',
		/*es para ubicar donde resivira los datos creo que se refiere al archivo donde se mostraran*/
		dataType:'html',
		/*el parametro que se enviara al archivo php osea el valor que van en la funcion*/
		data: fechas,
	})
	.done(function(respuesta){
		//aqui se accede a la caja osea el div con el id correspondiente para agregar codigo
		$("#aler").html(respuesta);
			})
	.fail(function() {
		console.log("error");
	})
	
	
}
function buscar_todos(){
var consulta='';
	$.ajax({
		/*el url es el nombre del archivo php que va a realisar una accion*/
		url:'crud/crud_compra/crud_compras.php',
		/*type es el metodo de envio get o post*/
		type:'POST',
		/*es para ubicar donde resivira los datos creo que se refiere al archivo donde se mostraran*/
		dataType:'html',
		/*el parametro que se enviara al archivo php osea el valor que van en la funcion*/
		data: consulta,
	})
	.done(function(respuesta){
		//aqui se accede a la caja osea el div con el id correspondiente para agregar codigo
		$("#aler").html(respuesta);
			})
	.fail(function() {
		console.log("error");
	})
	
	
}



function pdf(id){
	        $("#pdf").removeClass("modal-container");
        $("#pdf").addClass("modal-container show");

        var pdf="<iframe class='ventanas' src='pdf/pdf_compras.php?id="+id+"'></iframe>";
        var boton="<button class='pushy__btn pushy__btn--df pushy__btn--blue'  onclick='cerrarventana()'>Cerrar</button>";
        var pdf_boton=pdf+boton;
        $("#pdf2").html(pdf_boton);
}

function ventana2(id){
	var msg2=$(pdf(id));
}

function cerrarventana(){
 				$("#pdf").removeClass("modal-container show");
        $("#pdf").addClass("modal-container");
				$("#pdf").html("<section class='modal_box' id='pdf2'></section>");
}
