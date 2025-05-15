


$(document).ready(function() {
//$('#enviar').click(function(){





$('#comprar').click(function(){

alerta_opcion();
});
function alerta_opcion(){

 const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
       cancelButton: 'btn btn-danger',
      },
     buttonsStyling: true
    })
  
   swalWithBootstrapButtons.fire({
      title: 'esta seguro?',
     text: "elija si para realizar la compra",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'si, comprar',
     cancelButtonText: 'No, cancela!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
      	enviar();
        swalWithBootstrapButtons.fire(

          'compra en proceso',
          'la compra se esta realizando.',
          'success',

        )
      } else if (
       
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelado',
          'tome el tiempo necesario',
          'error'
        )
      }
    })
}

function enviar(){
var total=document.getElementById('total').value;
var entrada=document.getElementById('entrada').value;


var valor="total="+total+"&entrada="+entrada;

	$.ajax({
		/*el url es el nombre del archivo php que va a realisar una accion*/
		url:'proce.php',
		/*type es el metodo de envio get o post*/
		type:'POST',
		/*es para ubicar donde resivira los datos creo que se refiere al archivo donde se mostraran*/
	
		/*el parametro que se enviara al archivo php osea el valor que van en la funcion*/
		data:valor,
	})
	.done(function(respuesta){
		//aqui se accede a la caja osea el div con el id correspondiente para agregar codigo
		$("#aler").html(respuesta);

		
	})
			
	.fail(function() {
		console.log("error");
	});
	


	}
	});