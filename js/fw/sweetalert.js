
function alerta_bien(){

Swal.fire({
     title: 'correcto',
     text: 'lorem ipsum valm',
     icon:'success',
     confirmButtonText: 'Bien',
     backdrop: true,
     timer: 5000,
     timerProgressBar: true,
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
}



function alerta_error(){

 Swal.fire({
     title: 'incorrecto',
     text: 'lorem ipsum valm',
     icon:'error',
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
}



// llamado de alertas html
// onclick='alerta_bien()'
// onclick='alerta_error()'
// onclick='alerta_opcion()'
// onclick='alerta_requiere()'
// onclick='alerta_errord()'


// llamado de librerias y archivo (esto o antes del body o al final del head)
{/* <script src="js/sweetalerta.js"></script> */}
{/* <script src="js/sweetalert.js"></script> */}


// Swal.fire({
	// title:
	// text:
	// html:
	// icon: warning, error, success, info, and question
	// confirmButtonText:
	// footer:
	// width:
	// padding:
	// background:
	// grow:
	// backdrop:
	// timer:
	// timerProgressBar:
	// toast:
	// position:
	// allowOutsideClick:
	// allowEscapeKey:
	// allowEnterKey:
	// stopKeydownPropagation:

	// input:
	// inputPlaceholder:
	// inputValue:
	// inputOptions:
	
	//  customClass:
	// 	container:
	// 	popup:
	// 	header:
	// 	title:
	// 	closeButton:
	// 	icon:
	// 	image:
	// 	content:
	// 	input:
	// 	actions:
	// 	confirmButton:
	// 	cancelButton:
	// 	footer:	

	// showConfirmButton:
	// confirmButtonColor:
	// confirmButtonAriaLabel:

	// showCancelButton:
	// cancelButtonText:
	// cancelButtonColor:
	// cancelButtonAriaLabel:
	
	// buttonsStyling:
	// showCloseButton:
	// closeButtonAriaLabel:


	// imageUrl:
	// imageWidth:
	// imageHeight:
	// imageAlt:
// });

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
     text: "despues no podra revertir esto!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'si, borralo!',
     cancelButtonText: 'No, cancela!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        swalWithBootstrapButtons.fire(
          'borrado!',
          'el archivo fue borrado.',
          'success'
        )
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


function alerta_requiere(){

    Swal.fire({
        title: 'primero debes...',
        text: 'lorem ipsum valm',
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
    }


function alerta_errord(){

     Swal.fire({
        title: 'error desconocido...',
        text: 'lorem ipsum valm',
        icon:'question',
        confirmButtonText: 'Ok',
        backdrop: true,
        timer: 5000,
        timerProgressBar: true,
       position: 'center',
       allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        stopKeydownPropagation: true,
       //  showConfirmButton: true,
        // confirmButtonColor:
        // confirmButtonAriaLabel: 'Confirmar',
        // showCancelButton: true,
       //  cancelButtonText: 'Cancelar',
        // cancelButtonColor:
        // cancelButtonAriaLabel: 'Cancelar',
        buttonsStyling: true,
        showCloseButton: true,
        closeButtonAriaLabel: 'cerrar alerta',
     });
    }
    