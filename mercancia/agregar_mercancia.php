<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=asignar_mercancia"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');

nivel_maximo();

        $titulo="Verifique los datos";

        $msg="datos invalidos";

        $val=msg_error($msg,$titulo);

if (!isset($_POST['id'])) {

        echo $val;

        exit();
}
if (empty(trim($_POST['id']))) {

        echo $val;

        exit();
}
if (!filter_var($_POST['id'],FILTER_VALIDATE_INT)) {
	
        echo $val;

        exit();
}
$q=$conexion->real_escape_string($_POST['id']);

$query=verificar_insumo_activo($q);

if (!($query->num_rows>0)) {
	echo"insumo";
        echo $val;

        exit();
}

$verificar=verificar_mercancia($q);

if ($verificar->num_rows>0) {

        $titulo="Verifique los datos";

        $msg="Este insumo ya se encuantra asignado a este proveedor";

        $val=msg_interrogante($msg,$titulo);

        echo $val;

        exit();

}


$agregar=agregar_mercancia($q);

if ($agregar == false) {

        $titulo="Error";

        $msg="Error al agrega a la mercancia del proveedor";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();
}

$filas_insumo=mysqli_fetch_assoc($query);

$verificar_proveedor=verificar_proveedor_activo($_SESSION['proveedor_insumo']);

$filas_proveedor=mysqli_fetch_assoc($verificar_proveedor);

        $campo="insumo agregardo:".$filas_insumo['cod_in'];

        $codigo="RIF:".$filas_proveedor['rif_pro'];

        $registro="Proveedor";

        $accion="Se ha agregar un insumo a la lista del proveedor";

        auditoria($registro,$accion,$campo,$codigo);  

        $titulo="Correcto";

        $msg="Se agregado el insumo de la lista del proveedor";

        $val=msg_positivo($msg,$titulo);

        echo $val;

        echo"<script>buscar_insumo();</script>";

	exit();
?>