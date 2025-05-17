<?php 
require_once('../conexion/conexion.php');

require_once('../funciones_generales.php');

nivel_medio();
if(isset($_POST['eliminar_proveedor'])){

		$_SESSION['proveedor1']= null;

        $titulo="Correcto";

        $msg="Cambios proveedor";

        $val=msg_positivo($msg,$titulo);

        $_SESSION['msg']=$val;

        limpiar_todo();

		echo "<script>window.location.replace('index.php?pagina=compras');</script>";

}

 ?>