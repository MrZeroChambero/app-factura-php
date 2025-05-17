<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');

if (isset($_SESSION['bloqueo_preguntas']) and $_SESSION['bloqueo_preguntas'] == true) {
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

  $_SESSION['id_pregunta']=null;


   echo"<script>setTimeout(function(){window.location.replace('http://localhost:8080/facturacion/index.php?pagina=login')},0);</script>";

   exit();
}

$preguntas=consultar_preguntas_buscar($_SESSION['usuario_clave']);

if (!($preguntas->num_rows>0)) {

  $_SESSION['usuario_clave']=null;

  $_SESSION['id_pregunta']=null;


   echo"<script>setTimeout(function(){window.location.replace('http://localhost:8080/facturacion/index.php?pagina=login')},0);</script>"; 

   exit();   
}
$q=$_SESSION['usuario_clave'];

if (!isset($_SESSION['id_pregunta'])) {
	
  $_SESSION['usuario_clave']=null;

  $_SESSION['id_pregunta']=null;


   echo"<script>setTimeout(function(){window.location.replace('http://localhost:8080/facturacion/index.php?pagina=login')},0);</script>"; 

   exit();   
}

if (empty(trim($_SESSION['id_pregunta']))) {
	
  $_SESSION['usuario_clave']=null;

  $_SESSION['id_pregunta']=null;

   echo"<script>setTimeout(function(){window.location.replace('http://localhost:8080/facturacion/index.php?pagina=login')},0);</script>"; 

   exit();   
}


    $titulo="Campos vacio";

    $msg="Complete todos los campos";

    $val=msg_interrogante($msg,$titulo);

if (!isset($_POST['respuesta'])) {

	echo $val;


	exit();
}

if (empty(trim($_POST['respuesta']))) {

	echo $val;

	exit();

}

$respuesta=md5($_POST['respuesta']);

$pregunta=$_SESSION['id_pregunta'];

$id_us=$_SESSION['usuario_clave'];

$verificar=verificar_pregunta_usuario($id_us,$pregunta,$respuesta);


if (!($verificar->num_rows>0)) {

	$_SESSION['verificar_respuesta']=false;

	$titulo="Error";

    $msg="Vuelva a intentarlo";

    $val=msg_interrogante($msg,$titulo);

   	echo $val;
bloquear_preguntas();
	exit();
}

$_SESSION['verificar_respuesta']=true;

echo"<script>setTimeout(function(){window.location.replace('http://localhost:8080/facturacion/index.php?pagina=cambio_clave')},0);</script>";

exit();

?>
