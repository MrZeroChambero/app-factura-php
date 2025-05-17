<?php 

require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');

require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');

nivel_maximo();

if (!isset($_SESSION['preguntas'])) {

echo "<script> setTimeout(function(){window.location.replace('http://localhost:8080/facturacion/index.php?pagina=consulta_usuario')},0);</script>";

	exit();	
}
$usuario=$_SESSION['preguntas'];

$verificar=verificar_usuario_activo($usuario);

if (!($verificar->num_rows>0)) {
	
echo "<script> setTimeout(function(){window.location.replace('http://localhost:8080/facturacion/index.php?pagina=consulta_usuario')},0);</script>";

	exit();
}
    $titulo="Verifique los datos";

    $msg="Si sigue viendo este mensaje, reinicie sección porfavor";

    $val=msg_interrogante($msg,$titulo);


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
$id=$conexion->real_escape_string($_POST['id']);

$quitar=quitar_pregunta($id);

if ($quitar==false) {
    $titulo="Error";

    $msg="No se ha podido quitar la pregunta";

    $val=msg_error($msg,$titulo);

	echo $val;

    exit();		
}
$filas_us=mysqli_fetch_assoc($verificar);


 
        $campo="";

        $codigo="Cedula:".$filas_us['cedula_us'];

        $registro="Usuario";

        $accion="Ha sido eliminada una pregunta de seguridad";

        auditoria($registro,$accion,$campo,$codigo); 

    $titulo="Correcto";

    $msg="Se han actualizado los datos";

    $val=msg_positivo($msg,$titulo);

	echo $val;

	echo "<script>cerrar_ventana();</script>";

    exit();		
?>