<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');

verificar_nivel();

$verificar_usuario=verificar_usuario_activo($_SESSION['id_us']);
$patron_texto_sin_espacios = "/^[0-9a-zA-ZáéíóúñüÁÉÍÓÚÑÜ]+$/";

    $titulo="Verifique los datos";

    $msg="Complete todos los campos";

    $val=msg_interrogante($msg,$titulo);

    

if (!($verificar_usuario->num_rows>0)) {
cerra_seccion();
	exit();
}

if (!isset($_POST['pass'])) {
echo $val;
echo "noexisteo";
	exit();
}
if (empty(trim($_POST['pass']))) {
echo $val;
echo "vacio".$_POST['pass'];
	exit();
}
if (!isset($_POST['pass2'])) {
	echo "noexisteo2";
echo $val;
	exit();
}
if (empty(trim($_POST['pass2']))) {
	echo "vacio2";

echo $val;	
	exit();
}


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

    $titulo="Clave invalida";

    $msg="Las claves no coinciden";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();	

}
$pass1=$conexion->real_escape_string($clave);
$pass=md5($pass1);
$id_us=$_SESSION['id_us'];

$actualizar=actualizar_pass($id_us,$pass);

if ($actualizar==false) {

    $titulo="Error";

    $msg="Error actualizar la clave";

    $val=msg_error($msg,$titulo);

    echo $val;

    exit();		
}

$filas_usuario=mysqli_fetch_assoc($verificar_usuario);

        $campo="La clave fue actualizada";

        $codigo="Cedula:".$filas_usuario['cedula_us'];

        $registro="Usuario";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo); 

     echo "<script> 
document.getElementById('pass').value = '';
document.getElementById('pass2').value = '';
        </script>";

    $titulo="Correcto";

    $msg="Se ha actualizado la clave";

    $val=msg_positivo($msg,$titulo);

    echo $val;

    
$conexion->close();
exit();		
?>