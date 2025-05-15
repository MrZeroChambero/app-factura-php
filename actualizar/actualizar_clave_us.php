<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=consulta_usuario"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>

<?php
require_once($_SERVER['DOCUMENT_ROOT']."/facturacion/conexion/conexion.php");
require_once($_SERVER['DOCUMENT_ROOT']."/facturacion/funciones_generales.php");
nivel_maximo();

$conexion=conectar();

$patron_texto_sin_espacios = "/^[0-9a-zA-ZáéíóúñüÁÉÍÓÚÑÜ]+$/";



if (!isset($_SESSION['editar_clave'])) {

  echo "<script>setTimeout(function(){window.location.replace('http://localhost/facturacion/index.php?pagina=consulta_usuario')},0);</script>";

    exit();	
}

$verificar=verificar_usuario($_SESSION['editar_clave']);

if ($verificar==false) {

  echo "<script>setTimeout(function(){window.location.replace('http://localhost/facturacion/index.php?pagina=consulta_usuario')},0);</script>";

    exit();		
}

    $titulo="Campos vacios";

    $msg="Complete todos los campos";

    $val=msg_interrogante($msg,$titulo);

if (!isset($_POST['pass'])) {

    echo $val;

    exit();	
}
if (empty(trim($_POST['pass']))) {

    echo $val;

    exit();	
}

if (!isset($_POST['pass2'])) {

    echo $val;

    exit();	
}
if (empty(trim($_POST['pass2']))) {

    echo $val;

    exit();	
}

$id_us=$conexion->real_escape_string($_SESSION['editar_clave']);




$clave=$_POST['pass'];

$clave2=$_POST['pass2'];

 if( !preg_match($patron_texto_sin_espacios,$clave)){

    $titulo="Clave invalida";

    $msg="La clave solo debe contener letras  y numeros";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}

if (strlen($clave)>20) {

    $titulo="Clave muy larga";

    $msg="La clave no debe pasar de 20 caracteres";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}
if (strlen($clave)<3) {

    $titulo="Clave muy corta";

    $msg="La clave no debe ser menor de 3 caracteres";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}

if ($clave!==$clave2) {

    $titulo="Verifique la información";

    $msg="Los datos no coinciden";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}

$pass1=$conexion->real_escape_string($clave);

$pass=md5($pass1);

$id_us=$conexion->real_escape_string($_SESSION['editar_clave']);

$actulizar=actualizar_pass($id_us,$pass);

if ($actulizar==false) {
	
	$titulo="Error";

    $msg="Error al cambiar clave";

    $val=msg_error($msg,$titulo);

    echo $val;

    exit();
}
$filas_usuario=mysqli_fetch_assoc($verificar);

        $campo="La clave fue actualizada";

        $codigo="Cedula:".$filas_usuario['cedula_us'];

        $registro="Usuario";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo); 



	$titulo="Correcto";

    $msg="Se ha actualizado la clave";

    $val=msg_positivo($msg,$titulo);

    echo $val;

    echo "<script>cerrar_ventana();</script>";

    exit();
?>