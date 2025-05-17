<?php 
require_once('../conexion/conexion.php');
require_once("../funciones_generales.php");
nivel_medio();
    $titulo="Error";

    $msg="Verifique los datos";

    $val=msg_error($msg,$titulo);

if (!isset($_POST['confirmar'])) {

  echo $val;

	exit();
}
if (empty(trim($_POST['confirmar']))) {

  echo $val;
  
  exit();
}
$q=$_POST['confirmar'];

if (!filter_var($_POST['confirmar'],FILTER_VALIDATE_INT)) {

  echo $val;
  
  exit();
}
$confirmar=$_POST['confirmar'];

$verificar_factura=verificar_factura_activa($confirmar);

if (!($verificar_factura->num_rows>0)) {

  echo $val;
  
  exit();
}
/*$filas=mysqli_fetch_assoc($verificar_factura);


  echo $val;
  
  exit();*/


$actualizar_fac=confirmar_factura($confirmar);

if ($actualizar_fac==false) {

          $titulo="Error";

          $msg="Error al guardar los cambios";

          $val=msg_error($msg,$titulo);

          echo $val;
        
          exit();

}

$resta_inventario=restar_insumos($confirmar);

if ($resta_inventario == false) {

          $titulo="Error";

          $msg="Error al guardar los cambios";

          $val=msg_error($msg,$titulo);

          echo $val;
        
          exit();
}

    $titulo="Correcto";

    $msg="Se han guardados los cambios";

    $val=msg_positivo($msg,$titulo);

    echo $val;
  
		echo"<script>
    cerrar_ventana2();
    </script>";
	   
     exit();
?>
