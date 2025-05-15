$(consulta_vacio());

function enviar(){

let archivo_enviar= document.querySelector('#archivo').files[0];

let archivo = new FormData();

archivo.append('archivo', archivo_enviar);


		$.ajax({
			url: 'respaldo/guardar_respado.php',
			type: 'POST',
			dataType: "html",
			data: archivo,
			 processData: false,  // tell jQuery not to process the data
  contentType: false   // tell jQuery not to set contentType
		})
		.done(function(result) {
			$("#aler").html(result);
			
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}


	function crear_respaldo(){

 const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
       cancelButton: 'btn btn-danger',
      },
     buttonsStyling: true
    })
  
   swalWithBootstrapButtons.fire({
      title: 'Crear respaldo',
     html: "¿Esta seguro?, <br>se creara un respaldo con la información actual de la base de datos",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, Crear',
     cancelButtonText: 'No, cancela!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
      	respaldo();

      } else if (
       
        result.dismiss === Swal.DismissReason.cancel
      ) {

      }
    })
}


function subir_respaldo(){

 const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
       cancelButton: 'btn btn-danger',
      },
     buttonsStyling: true
    })
  
   swalWithBootstrapButtons.fire({
      title: 'Subir respaldo',
     html: "¿Esta seguro?,Elija si para subir el agregar el archivo a los respaldos",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, Agregar',
     cancelButtonText: 'No, cancela!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
      	 enviar();

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

function respaldo() {
$.ajax({
	url: 'respaldo/respaldo.php',
	type: 'POST',
	dataType: 'html',
	data: {respaldo: true},
})
.done(function(result1) {

$("#aler").html(result1);			
})
.fail(function() {
	console.log("error");
})
.always(function() {
	console.log("complete");
});

}

function validar(){
$("#formulario").validate({

rules:{
  archivo:{
    required:true

  }

  }

});

if($('#formulario').valid() == false){

 Swal.fire({
        title: 'Elija un archivo',
        text: '',
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

}else {
  $(subir_respaldo());
}
}

function consulta(){
  var fecha_i=document.getElementById('fecha_i').value;
  var fecha_f=document.getElementById('fecha_f').value;

if (fecha_f!= "" && fecha_i!="") {
    var valor='fecha_i='+fecha_i+'&fecha_f='+fecha_f;
}else {
    var valor="";
}
$.ajax({
  url: 'crud/crud_basicos/crud_respaldos.php',
  type: 'POST',
  data: valor,
})
.done(function(respuesta1) {
  $('#datos').html(respuesta1);
})
.fail(function() {
  console.log("error");
})
.always(function() {
  console.log("complete");
});

}
function consulta_vacio(){

    var valor="";

$.ajax({
  url: 'crud/crud_basicos/crud_respaldos.php',
  type: 'POST',
  data: valor,
})
.done(function(respuesta1) {
  $('#datos').html(respuesta1);
})
.fail(function() {
  console.log("error");
})
.always(function() {
  console.log("complete");
});

}

  function restaurar(id){

 const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
       cancelButton: 'btn btn-danger',
      },
     buttonsStyling: true
    })
  
   swalWithBootstrapButtons.fire({
      title: 'Restaurar a un punto anterior',
     html: "¿Esta seguro?, <br> este opción le permite realizar una restauración de la base de datos a un punto anterior, <br> se recomienda crear un punto de restauración primero",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, Restaurar',
     cancelButtonText: 'No, cancela!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        enviar_restaurar(id);

      } else if (
       
        result.dismiss === Swal.DismissReason.cancel
      ) {

      }
    })
}

function enviar_restaurar(id){
  $.ajax({
    url: 'respaldo/restaurar.php',
    type: 'POST',
    data: {id: id},
  })
  .done(function(respuesta_2) {
    $('#aler').html(respuesta_2);
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
  
}

  function restaurar_zero(){

 const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
       cancelButton: 'btn btn-danger',
      },
     buttonsStyling: true
    })
  
   swalWithBootstrapButtons.fire({
      title: 'Restaurar a un punto anterior',
     html: "¿Esta seguro?, <br> este opción le permite realizar una restauración con los datos por defecto del sistema, <br> se recomienda crear un punto de restauración primero",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, Restaurar',
     cancelButtonText: 'No, cancela!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        enviar_restaurar_zero();

      } else if (
       
        result.dismiss === Swal.DismissReason.cancel
      ) {

      }
    })
}

function enviar_restaurar_zero(){
  var id="zero";
  $.ajax({
    url: 'respaldo/restaurar.php',
    type: 'POST',
    data: {id: id},
  })
  .done(function(respuesta_2) {
    $('#aler').html(respuesta_2);
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
  
}