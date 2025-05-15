<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=consulta_usuario"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/} </script>
<?php 
if (!isset($_SESSION['autenticado'])){
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
}
nivel_maximo();

	$titulo="Verifique los datos";

	$msg="Este informe no exite";

	$valor=msg_interrogante($msg,$titulo);


if (!isset($_POST['info'])) {

	echo $valor;

	exit();	
}


$quitar_info=borrar_todos_informes();

if ($quitar_info==false) {

	$titulo="Error";

	$msg="Error al quitar informe";

	$valor=msg_error($msg,$titulo);

	echo $valor;

	exit();
}
	$titulo="Correcto";

	$msg="Se han eliminado todos los informe";

	$valor=msg_positivo($msg,$titulo);

	echo $valor;



	exit();