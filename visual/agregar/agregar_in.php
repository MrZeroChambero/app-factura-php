<?php 
require_once('f_menu.php');
if (isset($_POST['v_in'])) {
$can_in=$conexion->real_escape_string($_POST['can_in']);
$id_in=$conexion->real_escape_string($_POST['comp_in']);
echo " <script >
 	 Swal.fire({
        title: 'qwewq',
        text: 'Dqweweqs campos',
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
 </script>";	
}else {
	echo " <script >
 	 Swal.fire({
        title: 'sexo',
        text: 'sexo',
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
 </script>";	
}

 ?>
