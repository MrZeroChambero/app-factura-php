<?php 
require_once('../conexion/conexion.php');

require_once('../funciones_generales.php');
nivel_medio();
    $titulo="Error";

    $msg="Verifique los datos";

    $val=msg_error($msg,$titulo);


if (!isset($_POST['id_in'])) {

    echo $val;

    exit();
}
if (!isset($_POST['cantidad'])) {

    echo $val;

    exit();	
}

if (empty(trim($_POST['id_in']))) {

    echo $val;

    exit();		
}
if (!filter_var($_POST['id_in'],FILTER_VALIDATE_INT)) {

    echo $val;

    exit();		
}





$id_inv=$conexion->real_escape_string($_POST['id_in']);


$verificar_gasto=encontrar_gastos_factura_activa($id_inv);

if (!($verificar_gasto->num_rows>0)) {


    echo $val;

    exit();

}


$filas=mysqli_fetch_assoc($verificar_gasto);

if ($filas['unidad_medicion']==2) {

    $validar_cantidad=validar_float($_POST['cantidad']);

    if ($validar_cantidad==false) {

            $titulo="Error";

    $msg="Ingrese una cantidad válida";

    $val=msg_error($msg,$titulo);

        echo $val;

    exit(); 
        
    }
$validar_cantidad_completo=validar_numeros_zero($_POST['cantidad']);
    if ($validar_cantidad_completo==false) {

            $titulo="Error";

    $msg="Ingrese una cantidad válida";

    $val=msg_error($msg,$titulo);

        echo $val;

    exit(); 
        
    }
    
}else{
    if ($_POST['cantidad']!=0) {

            if (!filter_var($_POST['cantidad'],FILTER_VALIDATE_INT)) {
            $titulo="Error";

    $msg="Ingrese una cantidad valida";

    $val=msg_error($msg,$titulo);

        echo $val;

    exit(); 
}
        
    }else{

            $validar_cantidad=validar_float($_POST['cantidad']);

    if ($validar_cantidad==false) {

            $titulo="Error";

    $msg="Ingrese una cantidad válida";

    $val=msg_error($msg,$titulo);

        echo $val;

    exit(); 
        
    }

    }



}
if ($_POST['cantidad']>$filas['cantidad_in']) {

     $msg="No tiene insumos suficientes,<br> verifique la cantidad";

    $val=msg_error($msg,$titulo);

        echo $val;

    exit();    
}

$cantidad=$conexion->real_escape_string($_POST['cantidad']);
$id_in=$filas['insumos_id'];

$verificar_insumo=verificar_insumo($id_in);

if (!($verificar_insumo->num_rows>0)) {

	echo "insumo_ no existe";
    echo $val;

    exit();
}
$id_fac=$filas['id_fac_gas'];
$verificar_factura=verificar_factura($id_fac);

if (!($verificar_factura->num_rows>0)) {

    echo $val;

    exit();

}

$obetener_estado=mysqli_fetch_assoc($verificar_factura);

$estado=$obetener_estado['estado_fac'];

if ($estado!= 1) {

  echo "no se puede modificar";

  exit();
}

$id_gasto=$_SESSION['gasto'];

$actualizar_gasto=actualizar_gastos($id_inv,$cantidad);

	if ($actualizar_gasto == false) {

    $titulo="Error";

    $msg="Error al guardar verifique los datos";

    $val=msg_error($msg,$titulo);

    echo $val;
}

    $titulo="correcto";

    $msg="Se han guardados los cambios";

    $val=msg_positivo($msg,$titulo);

    echo $val;

		echo"<script>cerrar_ventana3();
    confirma_consumo(".$id_gasto.");
    </script>";

    exit();

 ?>
