<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=consulta_proveedor"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');

nivel_maximo();

        $titulo="Sin resultado";

        $msg="Ah ocurrido un error, si el problema presiste recargue la paguina";

        $val=msg_error($msg,$titulo);

if (!isset($_POST['proveedor'])) {
	echo $val;
	exit();
}
if (empty(trim($_POST['proveedor']))) {
		echo $val;
	exit();
}

if (!filter_var($_POST['proveedor'],FILTER_VALIDATE_INT)) {
		echo $val;
	exit();
}
$verificar=verificar_proveedor_activo($_POST['proveedor']);

if (!($verificar->num_rows>0)) {
		echo $val;
	exit();
}

$_SESSION['proveedor_insumo']=$conexion->real_escape_string($_POST['proveedor']);
echo $_SESSION['proveedor_insumo'];
r_asinar_mercancia();

exit();
?>