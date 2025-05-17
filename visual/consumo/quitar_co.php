<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
nivel_maximo();

        $titulo="Error";

        $msg="Si ve este mensaje, porfavor reinicie la sección y vuelva a intentarlo";

        $val=msg_error($msg,$titulo);
if (!isset($_SESSION['analisis'])) {
        echo $val;

        echo "<script>cerrar_ventana();</script>";

        exit();
}
if (!filter_var($_SESSION['analisis'],FILTER_VALIDATE_INT)) {
        echo $val;

        echo "<script>cerrar_ventana();</script>";

        exit();
}


if (!isset($_POST['quitar'])) {

echo "<script>cerrar_ventana();</script>";

        echo$val;

        exit();
}
if (empty(trim($_POST['quitar']))) {

echo "<script>cerrar_ventana();</script>";
        echo$val;

        exit();
}
if (!filter_var($_POST['quitar'],FILTER_VALIDATE_INT)) {

        echo "<script>cerrar_ventana();</script>";

        echo$val;

        exit();
}

$q=$conexion->real_escape_string($_POST['quitar']);

$buscar=verificar_consumo($q);

if (!($buscar->num_rows>0)) {

        echo "<script>cerrar_ventana();</script>";

        echo $val;

        exit();
}

$quitar=quitar_consumo($q);

if ($quitar == false) {

        $titulo="Verificar datos";

        $msg="Este insumo no  es valido";

        $val=msg_error($msg,$titulo);

        echo $val;
   
        exit();
        
}

        $titulo="correcto";

        $msg="Se ha quitado de  la  lista";

        $val=msg_positivo($msg,$titulo);

        echo $val;

        echo "<script>cerrar_ventana();</script>";
   
        exit();

?>
