<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
nivel_maximo();

$titulo="Error";

$msg="Este usuario no se encuentra activo";

$val=msg_interrogante($msg,$titulo);

if (!isset($_POST['preguntas'])) {
echo $val;

echo "<script> setTimeout(function(){window.location.replace('http://localhost:8080/facturacion/index.php?pagina=consulta_usuario')},3000);</script>";

exit();	
}
if (empty(trim($_POST['preguntas']))) {
echo $val;

echo "<script> setTimeout(function(){window.location.replace('http://localhost:8080/facturacion/index.php?pagina=consulta_usuario')},3000);</script>";

exit();	
}
$verificar=verificar_usuario_activo($_POST['preguntas']);

if (!($verificar->num_rows>0)) {


echo $val;

echo "<script> setTimeout(function(){window.location.replace('http://localhost:8080/facturacion/index.php?pagina=consulta_usuario')},3000);</script>";

exit();	
}

$_SESSION['preguntas']=$conexion->real_escape_string($_POST['preguntas']);

echo "<script> setTimeout(function(){window.location.replace('http://localhost:8080/facturacion/index.php?pagina=preguntas')},0);</script>";

exit();

?>