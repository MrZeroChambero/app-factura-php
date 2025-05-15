<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=compras"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0);}</script>

<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
nivel_medio();
if (!isset($_SESSION['proveedor1'])) {
	limpiar_todo();
	echo"<script>setTimeout(function(){window.location.replace('http://localhost/facturacion/index.php?pagina=compras')},0);</script>";
exit();	
}	

$proveedor=verificar_proveedor_activo($_SESSION['proveedor1']);
if (!($proveedor->num_rows>0)) {

	limpiar_todo();
	echo"<script>setTimeout(function(){window.location.replace('http://localhost/facturacion/index.php?pagina=compras')},0);</script>";
exit();	
}


	$agregar=agregar_auto_compra();
	if ($agregar==false) {

	$titulo="Error";

	$msg="Error al agregar afuera";

	$valor=msg_error_sin($msg,$titulo);

	echo $valor;

	exit();
	}

	$titulo="Correcto";

	$msg="Los insumos se ha agregar, <br> recuerde que debe ingresar los precios en el menu de lista de compras";

	$valor=msg_positivo_sin($msg,$titulo);

	echo $valor;

	echo "<script>buscar_insumo();cerrar_ventana2();</script>";

	$_SESSION['precios']=true;

	exit();

 ?>