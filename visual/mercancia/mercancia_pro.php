<?php 
require_once("f_menu.php"); 
$msg="<script> Swal.fire({
        title: 'Verifique los datos',
        text: 'datos invalidos',
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
     });</script>"; 
maxlvl();
if (!isset($_POST['id'])) {
	echo $msg;
	exit();
}
if (empty(trim($_POST['id']))) {
	echo $msg;
	exit();
}
if (!filter_var($_POST['id'],FILTER_VALIDATE_INT)) {
	echo $msg;
	exit();
}
$q=$conexion->real_escape_string($_POST['id']);
$query=$conexion->query("SELECT * FROM proveedor WHERE id_pro = '{$q}'");
if (!($query->num_rows>0)) {
	echo $msg;
	exit();
}
$_SESSION['proveedor_insumo']=$q;
echo "<script>window.location.replace('asignar_mercancia.php');</script>";
 ?>