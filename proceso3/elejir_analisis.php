<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=consulta_analisis"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/} </script>
<?php

require_once('../conexion/conexion.php');

require_once('../funciones_generales.php');
nivel_maximo();
        $titulo="Sin resultado";

        $msg="Ah ocurrido un error, si el problema presiste recargue la paguina";

        $val=msg_error($msg,$titulo);

if (!isset($_POST['id'])) {

	 echo $val;

	exit();
}
if (empty(trim($_POST['id']))) {

	 echo $val;

	exit();
}
if (!filter_var($_POST['id'],FILTER_VALIDATE_INT)) {

	 echo $val;

	exit();
}
$verificar=verificar_analisis($_POST['id']);

if (!($verificar->num_rows>0)) {

 echo $val;

exit();	
}
$_SESSION['analisis']=$conexion->real_escape_string($_POST['id']);

$conexion->close();

		r_asignar_consumo();

		exit();
?>