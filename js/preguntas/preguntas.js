$(crud_preguntas());
function crud_preguntas(){
	$.ajax({
	url: 'crud/crud_basicos/crud_preguntas.php',
})
.done(function(respuesta) {
	$("#preguntas").html(respuesta);
})
.fail(function() {
	console.log("error");
});

}

function ventana_agregar(){
$("#ventana").removeClass("modal-container");
$("#ventana").addClass("modal-container show");
agregar();
}

function cerrar_ventana(){
$("#ventana").removeClass("modal-container show");
$("#ventana").addClass("modal-container");
$("#ventana").html("<section class='modal_editar' id='ventana2'></section>");
crud_preguntas();
}

function agregar(){
$.ajax({
  url: 'visual/preguntas/agregar_pregunta.php',
})
.done(function(respuesta) {
    $("#ventana2").html(respuesta);
})
.fail(function() {
  console.log("error");
});

}


function eliminar(id){
var msg='¿Esta segura que desea eliminar esta pregunta?';
 const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
       cancelButton: 'btn btn-danger',
      },
     buttonsStyling: true
    })
  
   swalWithBootstrapButtons.fire({
      title: msg,

      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'si, Eliminar!',
     cancelButtonText: 'No, cancela!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
      	enviar_eliminar(id);
        
      } else if (
       
        result.dismiss === Swal.DismissReason.cancel
      ) {
      }
    })
}
function enviar_eliminar(id){
$.ajax({
	url: 'preguntas/quitar_pregunta.php',
	type: 'POST',
	data: {id: id},
})
.done(function(respuesta) {
		$("#aler").html(respuesta);
})
.fail(function() {
	console.log("error");
});	
}

function volver(){
  setTimeout(function(){window.location.replace('http://localhost/facturacion/index.php?pagina=consulta_usuario')},0);
}