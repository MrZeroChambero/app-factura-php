<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=agregar_consumo"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/} </script>
<?php 
require_once('../conexion/conexion.php');

require_once('../funciones_generales.php');
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


if (!isset($_POST['id'])) {

echo "<script>cerrar_ventana();</script>"; 

        echo$val;

        exit();
}
if (empty(trim($_POST['id']))) {

echo "<script>cerrar_ventana();</script>"; 
        echo$val;

        exit();
}
if (!filter_var($_POST['id'],FILTER_VALIDATE_INT)) {

        echo "<script>cerrar_ventana();</script>"; 

        echo$val;

        exit();
}

$q=$conexion->real_escape_string($_POST['id']);

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
$filas_consumo=mysqli_fetch_assoc($buscar);

$id_an=$filas_consumo['id_an_co'];
$id_in=$filas_consumo['id_in_co'];
$verificar_an=verificar_analisis_activo($id_an);
$filas_an=mysqli_fetch_assoc($verificar_an);

$verificar_in=verificar_insumo_activo($id_in);
$filas_in=mysqli_fetch_assoc($verificar_in);


        $campo="Insumo retirado:".$filas_in['cod_in'];

        $codigo="Codigo:".$filas_an['cod_an'];

        $registro="Análisis";

        $accion="Ha sido eliminado un consumo";

        auditoria($registro,$accion,$campo,$codigo);


        $titulo="correcto";

        $msg="Se ha quitado de  la  lista";

        $val=msg_positivo($msg,$titulo);

        echo $val;

        echo "<script>cerrar_ventana();</script>"; 
   
        exit();

?>
