<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=preguntas"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
nivel_maximo();
if (!isset($_SESSION['preguntas'])) {
echo "<script> setTimeout(function(){window.location.replace('http://localhost/facturacion/index.php?pagina=consulta_usuario')},0);</script>";

	exit();	
}
$usuario=$_SESSION['preguntas'];
$patron = "/^[0-9a-zA-Z\s?¿áéíóúñüÁÉÍÓÚÑÜ]+$/";
$patron_2 = "/^[0-9a-zA-Z\sáéíóúñüÁÉÍÓÚÑÜ]+$/";
$verificar_us=verificar_usuario_activo($usuario);
if (!($verificar_us->num_rows>0)) {
	
echo "<script> setTimeout(function(){window.location.replace('http://localhost/facturacion/index.php?pagina=consulta_usuario')},0);</script>";

	exit();
}
$verificar_cantidad=consultar_preguntas();

    $titulo="Muchas preguntas";

    $msg="Solo puede tener 60 preguntas";

    $val=msg_interrogante($msg,$titulo);
    $cantidad_preguntas=$verificar_cantidad->num_rows;

if ($cantidad_preguntas>=60) {
    echo $val;

    exit();  
}
    $titulo="Complete todos los campos";

    $msg="Falta:pregunta";

    $val=msg_interrogante($msg,$titulo);


if (!isset($_POST['pregunta'])) {

    echo $val;

    exit();	
}
if (empty(trim($_POST['pregunta']))) {

    echo $val;

    exit();
	
}
if (!preg_match($patron,$_POST['pregunta'])) {

    $titulo="Verifique los datos";

    $msg="Error en pregunta; solo puede poner letras, numeros, espacios y los simbolos ¿?";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();
	
}
if (strlen($_POST['pregunta'])>30) {
    $titulo="Verifique los datos";

    $msg="Error en pregunta; No escriba mas de 30 digitos";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();
}
    $titulo="Complete todos los campos";

    $msg="Falta:respuesta";

    $val=msg_interrogante($msg,$titulo);

if (!isset($_POST['respuesta'])) {

 echo $val;

    exit();
}
if (empty(trim($_POST['respuesta']))) {

	 echo $val;

    exit();
}
if (!isset($_POST['respuesta2'])) {

	 echo $val;

    exit();
}

if (empty(trim($_POST['respuesta2']))) {


	 echo $val;

    exit();
}
if ($_POST['respuesta']!=$_POST['respuesta2']) {
    $titulo="Verifique los datos";

    $msg="Error en respuesta; las respuesta no coinciden";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();
}
if (!preg_match($patron_2,$_POST['respuesta'])) {
    $titulo="Verifique los datos";

    $msg="Error en respuesta; solo puede poner letras, numeros y espacios";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();	
}
if (strlen($_POST['respuesta'])>30) {

    $titulo="Verifique los datos";

    $msg="Error en respuesta; No escriba mas de 30 digitos";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();	
}

$pregunta=$conexion->real_escape_string($_POST['pregunta']);

$respuesta1=$conexion->real_escape_string($_POST['respuesta']);

$respuesta=md5($respuesta1);

$verificar=verificar_pregunta($pregunta,$respuesta);

if ($verificar->num_rows>0) {
    $titulo="Error";

    $msg="Este pregunta ya se encuantra registrada";

    $val=msg_error($msg,$titulo);

    echo $val;

    exit();		
}

$agregar=agregar_pregunta($pregunta,$respuesta);

if ($agregar==false) {
    $titulo="Error";

    $msg="Error al agregar la pregunta";

    $val=msg_error($msg,$titulo);

    echo $val;

    exit();		
}

$filas_us=mysqli_fetch_assoc($verificar_us);


 
        $campo="";

        $codigo="Cedula:".$filas_us['cedula_us'];

        $registro="Usuario";

        $accion="Ha sido asignada una pregunta de seguridad";

        auditoria($registro,$accion,$campo,$codigo); 


    $titulo="Correcto";

    $msg="Se han guadardos los cambios";

    $val=msg_positivo($msg,$titulo);

    echo $val;

    echo "<script>cerrar_ventana();</script>";

    exit();		
?>