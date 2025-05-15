<?php 
require_once("f_menu.php");
$msg="<script>
        Swal.fire({
        title: 'Campos vacios',
        text: 'Complete todos los campos',
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

if (!isset($_POST['id'])) {
	echo$msg;
	exit();
}
if (empty(trim($_POST['id']))) {
	echo$msg;
	exit();
}
if (!filter_var($_POST['id'],FILTER_VALIDATE_INT)) {
	echo$msg;
	exit();
}
if (!isset($_POST['cantidad'])) {
	echo$msg;
	exit();
}
if (empty(trim($_POST['cantidad']))) {
	echo$msg;
	exit();
}
if (!filter_var($_POST['cantidad'],FILTER_VALIDATE_INT)) {
	echo$msg;
	exit();
}
if ($_POST['cantidad']<0) {
	echo$msg;
	exit();
}
$q=$conexion->real_escape_string($_POST['id']);
$buscar=$conexion->query("SELECT * FROM consumo where id_co = '{$q}'");

if (!($buscar->num_rows>0)) {
	echo $msg;;
	exit();
}
$cantidad=$conexion->real_escape_string($_POST['cantidad']);
$actualizar=$conexion->query("UPDATE consumo set ca_co = '{$cantidad}' WHERE consumo.id_co = '{$q}'");

if ($actualizar == true) {
	            echo "<script> Swal.fire({
                    title: 'correcto',
                    text: 'Datos registrados',
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
                });cerrar_ventana();</script>";
	exit();
}else{
	echo "<script>
        Swal.fire({
        title: 'Error',
        text: 'actualizar',
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
	exit();
}
 ?>
