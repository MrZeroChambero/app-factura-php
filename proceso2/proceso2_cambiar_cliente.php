<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=factura"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once('../conexion/conexion.php');

require_once('../funciones_generales.php');

verificar_nivel();

if (isset($_POST['eliminar_cliente'])) {

	$_SESSION['cliente']=null;

/*	$titulo="Elija un cliente";

	$msg="";

 	$val=msg_positivo($msg,$titulo);
 	echo $val;*/
 	limpiar_todo();
	$r=r_factura();

	echo $r;

  	exit();
}else{
		$titulo="Elija un cliente";

	$msg="asddddddddddddddd";

 	$val=msg_positivo($msg,$titulo);
 	echo $val;

	patucasa();
	
}

 ?>