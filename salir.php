<?php
require_once('conexion/conexion.php');
require_once('funciones_generales.php');
if (!isset($_SESSION['id_us'])) {
$_SESSION['id_us']=1;	
}




        $campo="";

        $codigo="";

$registro="sección";

$accion="Ha Cerrado sección";

        auditoria($registro,$accion,$campo,$codigo);  

session_unset();
session_destroy();


echo "<script>window.location.replace('index.php?pagina=login');</script>";
exit();
?>
