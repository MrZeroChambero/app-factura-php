
$(buscar_todos());
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
		url:'crud/crud_factura/crud_factura.php',
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
		url:'crud/crud_factura/crud_factura.php',
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

function anular(id){
alerta_opcion(id);	
}
function alerta_opcion(id){
var msg='Desea anular la factura:'+id+'?';
 const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
       cancelButton: 'btn btn-danger',
      },
     buttonsStyling: true
    })
  
   swalWithBootstrapButtons.fire({
      title: msg,
     text: "despues no podra revertir esto!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'si, Anular!',
     cancelButtonText: 'No, cancela!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
      	enviar_anulacion(id);
        
      } else if (
       
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelado',
          'su archivo esta seguro :)',
          'error'
        )
      }
    })
}
function enviar_anulacion(id){
	$.ajax({
		url: 'proceso2/anular_fac.php',
		type: 'POST',
		data: {id_fac: id},
	})
	.done(function(respuesta2) {

		$("#aler2").html(respuesta2);
		$(buscar_todos());
	})
	.fail(function() {
		console.log("error");
	});
	
}
function ventana(){
	var msg2=$(buscar_datos3());
}
function buscar_datos3(){
var consulta='';
	$.ajax({
		/*el url es el nombre del archivo php que va a realisar una accion*/
		url:'crud/crud_factura/crud_factura.php',
		/*type es el metodo de envio get o post*/
		type:'POST',
		/*es para ubicar donde resivira los datos creo que se refiere al archivo donde se mostraran*/
		dataType:'html',
		/*el parametro que se enviara al archivo php osea el valor que van en la funcion*/
		data: consulta,
	})
	.done(function(respuesta){
	Swal.fire({
     title: 'correcto',
     html: respuesta,
     icon:'success',
     confirmButtonText: 'Bien',
     backdrop: true,
     position: 'center',
     allowOutsideClick: false,
 	allowEscapeKey: false,
 	allowEnterKey: false,
 	stopKeydownPropagation: true,
     showConfirmButton: true,
 	confirmButtonAriaLabel: 'Confirmar',
     buttonsStyling: true,
 	showCloseButton: true,
 	closeButtonAriaLabel: 'cerrar alerta',
 });
			})
	.fail(function() {
		console.log("error");
	})
	
	
}


function pdf(id){
	        $("#pdf").removeClass("modal-container");
        $("#pdf").addClass("modal-container show");

        var pdf="<iframe class='ventanas' src='pdf/pdf_factura.php?id="+id+"'></iframe>";
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

