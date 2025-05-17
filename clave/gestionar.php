
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
if (isset($_SESSION['autenticado'])) {
   $_SESSION['usuario_clave']=null;

   echo"<script>setTimeout(function(){window.location.replace('http://localhost:8080/facturacion/index.php?pagina=login')},0);</script>"; 

   exit();     
}
if (!isset($_SESSION['verificar_respuesta'])) {
   $_SESSION['usuario_clave']=null;

   echo"<script>setTimeout(function(){window.location.replace('http://localhost:8080/facturacion/index.php?pagina=login')},0);</script>"; 

   exit();   
}

if (empty(trim($_SESSION['verificar_respuesta']))) {
    $_SESSION['usuario_clave']=null;

   echo"<script>setTimeout(function(){window.location.replace('http://localhost:8080/facturacion/index.php?pagina=login')},0);</script>"; 

   exit();      
}

if ($_SESSION['verificar_respuesta']!==true) {
     $_SESSION['usuario_clave']=null;

   echo"<script>setTimeout(function(){window.location.replace('http://localhost:8080/facturacion/index.php?pagina=login')},0);</script>"; 

   exit();     
}

if (!isset($_SESSION['usuario_clave'])) {

$_SESSION['usuario_clave']="";	

}

$usuario=$_SESSION['usuario_clave'];

$verificar=verificar_usuario_activo($usuario);

if (!($verificar->num_rows>0)) {

   $_SESSION['usuario_clave']=null;

   echo"<script>setTimeout(function(){window.location.replace('http://localhost:8080/facturacion/index.php?pagina=login')},0);</script>"; 

   exit();

}

$patron_texto_sin_espacios = "/^[0-9a-zA-ZáéíóúñüÁÉÍÓÚÑÜ]+$/";

    $titulo="Campos vacio";

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

$clave=$_POST['pass'];

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
$clave2=$_POST['pass2'];

 if( !preg_match($patron_texto_sin_espacios,$clave2)){

    $titulo="Clave invalida";

    $msg="La clave solo debe contener letras  y numeros";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}

if (strlen($clave2)>20) {

    $titulo="Clave muy larga";

    $msg="La clave no debe pasar de 20 caracteres";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}
if (strlen($clave2)<3) {

    $titulo="Clave muy corta";

    $msg="La clave no debe ser menor de 3 caracteres";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}

if ($clave!==$clave2) {

    $titulo="Verifique los datos";

    $msg="La clave no coinciden";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();	
}

$_SESSION['id_us']=$_SESSION['usuario_clave'];

$id_us=$_SESSION['usuario_clave'];

$passmd=md5($clave);

$actualizar=actualizar_pass($id_us,$passmd);

if ($actualizar==false) {

    $titulo="Error";

    $msg="No se ha podido actualizar";

    $val=msg_error($msg,$titulo);

    echo $val;
    echo"<script>setTimeout(function(){window.location.replace('http://localhost:8080/facturacion/index.php?pagina=login')},1500);</script>"; 

    session_unset();
session_destroy();

    exit();	
}

$filas_usuario=mysqli_fetch_assoc($verificar);

        $campo="La clave fue actualizada";

        $codigo="Cedula:".$filas_usuario['cedula_us'];

        $registro="Usuario";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo); 


session_unset();
session_destroy();

    $titulo="Correcto";

    $msg="Se ha cambiado clave";

    $val=msg_positivo($msg,$titulo);

    echo $val;

    echo"<script>setTimeout(function(){window.location.replace('http://localhost:8080/facturacion/index.php?pagina=login')},1500);</script>"; 

    exit();
?>