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