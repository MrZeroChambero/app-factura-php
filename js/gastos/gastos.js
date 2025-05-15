
$(buscar_datos1());
$(document).ready(function() {
	$(buscar_datos1());
$('#buscar').click(function(){
var fecha_i=document.getElementById('fecha_i').value;
var fecha_f=document.getElementById('fecha_f').value;
var fechas='fecha_i='+fecha_i+'&fecha_f='+fecha_f;
	if ((fecha_i != '') && (fecha_f != '')) {


$(buscar_datos2(fechas));	
	}else {
		$(buscar_datos1());
	}
	});
});
function buscar_datos2(fechas){
	$.ajax({
		url:'crud/crud_factura/crud_gastos.php',
		type:'POST',
		data: fechas,
	})
	.done(function(respuesta){
		$("#datos").html(respuesta);
			})
	.fail(function() {
		console.log("error");
	})
	
	
}
function buscar_datos1(){
var consulta='';
	$.ajax({
		url:'crud/crud_factura/crud_gastos.php',
		type:'POST',
		data: consulta,
	})
	.done(function(respuesta){
		$("#datos").html(respuesta);
			})
	.fail(function() {
		console.log("error");
	})
	
	
}



function ventana_lista(){
$("#ventana").removeClass("modal-container");
$("#ventana").addClass("modal-container show");
lista_consumo();

}
function lista_consumo(){
$.ajax({
		url: 'visual/gastos/lista_consumo.php',
	})
	.done(function(respuesta) {
		$("#ventana2").html(respuesta);
	})
	.fail(function() {
		console.log("error");
	});
	
}
function verificar_consumo(id){
$("#ventana3").removeClass("modal-container");
$("#ventana3").addClass("modal-container show");
cerrar_ventana();
confirma_consumo(id);


}
function verificar_datos(id){
$("#ventana5").removeClass("modal-container");
$("#ventana5").addClass("modal-container show");
enviar_datos(id);
}
function confirma_consumo(id){
$.ajax({
		url: 'editar_consumo.php',
		type: 'POST',
		data: {id_in: id},
	})
	.done(function(respuesta) {
		$("#ventana6").html(respuesta);
	})
	.fail(function() {
		console.log("error");
	});
	
}
function confirma_consumo(id){
$.ajax({
		url: 'visual/gastos/confirmar_consumo.php',
		type: 'POST',
		data: {id_in: id},
	})
	.done(function(respuesta) {
		$("#ventana4").html(respuesta);
	})
	.fail(function() {
		console.log("error");
	});
	
}
function cerrar_ventana(){
$("#ventana").removeClass("modal-container show");
$("#ventana").addClass("modal-container");
$("#ventana").html("<section class='modal' id='ventana2'></section>");
}
function cerrar_ventana2(){
$("#ventana3").removeClass("modal-container show");
$("#ventana3").addClass("modal-container");
$("#ventana3").html("<section class='modal' id='ventana4'></section>");
}
function cerrar_ventana3(){
$("#ventana5").removeClass("modal-container show");
$("#ventana5").addClass("modal-container");
$("#ventana5").html("<section class='modal' id='ventana6'></section>");
}




function confirmar_datos(id){

 const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
       cancelButton: 'btn btn-danger',
      },
     buttonsStyling: true
    })
  
   swalWithBootstrapButtons.fire({
      title: 'Esta seguro?',
     html: "despues no podra revertir esto!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'si, guardar cambios!',
     cancelButtonText: 'No, cancela!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
confirmar_trabajo(id);
      } else if (
       
        result.dismiss === Swal.DismissReason.cancel
      ) {

      }
    })
}
function enviar_datos(id){
$.ajax({
	url: 'visual/gastos/editar_gasto.php',
	type: 'POST',
	data: {id_in:id},
})
.done(function(respuesta) {
		$("#ventana6").html(respuesta);
})
.fail(function() {
	console.log("error");
});
					
}

function actualizar_datos(id) {
	var id_in=id;
	var cantidad=document.getElementById('cantidad').value;
	var valor="cantidad="+cantidad+"&id_in="+id_in;
	$.ajax({
		url: 'gastos/confimar_gasto.php',
		type: 'POST',
		data: valor,
	})
	.done(function(respuesta) {
		$("#aler").html(respuesta);
	})
	.fail(function() {
		console.log("error");
	});
	
}
function validar_datos(id){

$("#editar_gasto").validate({

rules:{
	cantidad:{

		required: true,
		number: true,
		minlength:1,
		maxlength:10,
		min:0
	},
	}

});
if ($('#editar_gasto').valid() == false) {
  Swal.fire({
        title: 'Completa los campos',
        text: 'Debe completar todos los campos',
        icon:'warning',
        confirmButtonText: 'Ok',
        backdrop: true,
        timer: 5000,
        timerProgressBar: true,
       position: 'center',
       allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        stopKeydownPropagation: true,
        buttonsStyling: true,
        showCloseButton: true,
        closeButtonAriaLabel: 'cerrar alerta',
     });
return;	
}
actualizar_datos(id);
}
function confirmar_trabajo(id){
$.ajax({
	url: 'gastos/confirmar_trabajo.php',
	type: 'POST',
	data: {confirmar: id},
})
.done(function(respuesta) {
$("#aler").html(respuesta);
})
.fail(function() {
	console.log("error");
});


}

function ventana_pdf(){
$("#ventana7").removeClass("modal-container");
$("#ventana7").addClass("modal-container show");
pdf_gatos();
}
function pdf_gatos(){
var fecha_i=document.getElementById('fecha_i').value;
var fecha_f=document.getElementById('fecha_f').value;

if (fecha_i!="" && fecha_f!="") {

        var pdf="<iframe class='ventanas' src='pdf/pdf_gatos.php?fecha_incial="+fecha_i+"&fecha_final="+fecha_f+"'></iframe>";
        var boton="<button class='pushy__btn pushy__btn--df pushy__btn--blue'  onclick='cerrar_ventana_pdf()'>Cerrar</button>";
        var pdf_boton=pdf+boton;
        $("#ventana8").html(pdf_boton);
}else {
	        var pdf="<iframe class='ventanas' src='pdf/pdf_gatos.php'></iframe>";
        var boton="<button class='pushy__btn pushy__btn--df pushy__btn--blue'  onclick='cerrar_ventana_pdf()'>Cerrar</button>";
        var pdf_boton=pdf+boton;
        $("#ventana8").html(pdf_boton);
}
}



function cerrar_ventana_pdf(){
$("#ventana7").removeClass("modal-container show");
$("#ventana7").addClass("modal-container");
$("#ventana7").html("<section class='ventanas' id='ventana8'></section>");
}