<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
nivel_maximo();

        $pro=$_SESSION['proveedor_insumo'];
if (!isset($pro)) {
 exit();       
}
if (empty(trim($pro))) {
exit();        
}
$verificar_proveedor=verificar_proveedor_activo($pro);

if (!($verificar_proveedor->num_rows>0)) {

exit();
        
}

        $titulo="Sin resultado";

        $msg="Ah ocurrido un error, si el problema presiste recargue la paguina";

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

$verificar=verificar_mercancia_id($q);

if (!($verificar->num_rows>0)) {

        echo $val;

        exit();
}

$filas=mysqli_fetch_assoc($verificar);

$id_mercancia=$filas['id_lista_mercancia'];

$quitar=quitar_mercancia($id_mercancia);


if ($quitar == false) {

        $titulo="Error";

        $msg="No se puedieron borrar los datos";

        $val=msg_positivo($msg,$titulo);
        
        echo $val;

        echo"<script>buscar_insumo();</script>";
        exit();
}

$veirifcar_insumo=verificar_insumo($filas['id_insumo_mercancia']);

$filas_insumo=mysqli_fetch_assoc($veirifcar_insumo);

$verificar_proveedor=verificar_proveedor_activo($_SESSION['proveedor_insumo']);

$filas_proveedor=mysqli_fetch_assoc($verificar_proveedor);

        $campo="insumo removido:".$filas_insumo['cod_in'];

        $codigo="RIF:".$filas_proveedor['rif_pro'];

        $registro="Proveedor";

        $accion="Se ha removido un insumo a la lista del proveedor";

        auditoria($registro,$accion,$campo,$codigo);  


        $titulo="Correcto";

        $msg="Se ha removido el insumo de la lista del proveedor";

        $val=msg_positivo($msg,$titulo);
        
        echo $val;

        echo" <script>buscar_insumo();</script>";
        exit();
 ?>