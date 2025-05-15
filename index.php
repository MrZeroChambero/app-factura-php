<?php
require_once('conexion/conexion.php');

require_once('funciones_generales.php'); 

require_once('menus.php');


if (!isset($_GET['pagina'])) {
	$pagina="login";
}else{
	$_SESSION['entrada']="activa";
	$pagina=$_GET['pagina'];
}
if ($pagina=="") {
	echo "<script type='text/javascript'>setTimeout(function(){window.location.replace('http://localhost/facturacion/index.php?pagina=login')},0);</script>";
	exit();
}
if ($pagina=="login") {

	require_once("login.php");

	exit();

}else if ($pagina=="menu") {

	require_once("menu_pri.php");

	exit();

}else if ($pagina=="") {

	require_once("login.php");

	exit();

}else if ($pagina=="registro_analisis") {

	require_once("visual/registros/registro_an.php");

	exit();

}else if ($pagina=="registro_insumo") {

	require_once("visual/registros/registro_in.php");

	exit();

}else if ($pagina=="registro_proveedor") {

	require_once("visual/registros/registro_pro.php");

	exit();

}else if ($pagina=="registro_cliente") {

	require_once("visual/registros/registro_cli.php");

	exit();

}else if ($pagina=="registro_usuario") {

	require_once("visual/registros/registro_us.php");

	exit();

}else if ($pagina=="agregar_consumo") {

	require_once("visual/consumo/agregar_consumo.php");

	exit();

}else if ($pagina=="factura") {

	require_once("visual/factura/factura.php");

	exit();

}else if ($pagina=="compras") {

	require_once("visual/compra/compras.php");

	exit();

}else if ($pagina=="consulta_usuario") {

	require_once("visual/consultas/b_us.php");

	exit();

}else if ($pagina=="consulta_clientes") {

	require_once("visual/consultas/b_cli.php");

	exit();

}else if ($pagina=="consulta_proveedor") {

	require_once("visual/consultas/b_pro.php");

	exit();

}else if ($pagina=="consulta_analisis") {

	require_once("visual/consultas/b_an.php");

	exit();

}else if ($pagina=="consulta_insumos") {

	require_once("visual/consultas/b_in.php");

	exit();

}else if ($pagina=="consulta_mercancia") {

	require_once("visual/consultas/consulta_mercancia.php");

	exit();

}else if ($pagina=="consulta_factura") {

	require_once("visual/consultas/consulta_factura.php");

	exit();

}else if ($pagina=="consulta_compras") {

	require_once("visual/consultas/consulta_compras.php");

	exit();

}else if ($pagina=="consulta_consumo") {

	require_once("visual/consultas/consulta_consumo_asignado.php");

	exit();

}else if ($pagina=="consumo") {

	require_once("visual/gastos/gastos.php");

	exit();

}else if ($pagina=="asignar_mercancia") {

	require_once("visual/mercancia/asignar_mercancia.php");

	exit();

}else if ($pagina=="auditoria"){

	require_once("visual/consultas/auditoria.php");

	exit();
}else if ($pagina=="respaldo"){

	require_once("respaldo/enviar_archivo.php");

	exit();

}else if ($pagina=="pedidos"){

	require_once("visual/pedidos/pedidos.php");

	exit();


}else if ($pagina=="recuparar_clave") {

	require_once("clave/recuperar_contraseña.php");

	exit();

}else if($pagina=="preguntas"){
	
		require_once("visual/preguntas/asignar_preguntas.php");

	exit();
}else if($pagina=="preguntas_seguridad"){
	
		require_once("clave/preguntas.php");

	exit();

}else if($pagina=="registro_iva"){
	
		require_once("visual/registros/registrar_iva.php");

	exit();

}else if($pagina=="cambio_clave"){
	
		require_once("clave/cambiar_clave.php");

	exit();
}else if($pagina=="cambiar_clave_us"){
	
		require_once("visual/editar/editar_clave_login.php");

	exit();
	
}else{

	require_once("error404.php");

	exit();

}
 ?>
