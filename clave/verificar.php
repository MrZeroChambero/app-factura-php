
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');

if (isset($_SESSION['autenticado'])) {
   $_SESSION['usuario_clave']=null;

   echo"<script>setTimeout(function(){window.location.replace('http://localhost:8080/facturacion/index.php?pagina=login')},0);</script>"; 

   exit();     
}
$verificar=verificar_fechas_preguntas();

if ($verificar==true) {
    $_SESSION['bloqueo_preguntas']=null;
    limpiar_intentos_preguntas();
}


    $titulo="Se acabaron los intentos";

    $msg="debe esperar 5min";

    $val=msg_interrogante($msg,$titulo);



if (isset($_SESSION['bloqueo_preguntas'])) {
     echo $val;

    exit();    
}
if ($_SESSION['bloqueo_preguntas']==true) {
     echo $val;

    exit();    
}

    $titulo="Campos vacio";

    $msg="Complete todos los campos";

    $val=msg_interrogante($msg,$titulo);


if (!isset($_POST['usuario'])) {
    echo $val;

    exit();	
}
if (empty(trim($_POST['usuario']))) {
    echo $val;

    exit();	
}

    $titulo="Verifique los datos";

    $msg="";

    $val=msg_interrogante($msg,$titulo);
$conexion=conectar();

$usuario=$conexion->real_escape_string($_POST['usuario']);

$buscar=buscar_usuario_nick($usuario);

if (!($buscar->num_rows>0)) {
    bloquear_preguntas();

	echo $val;

    exit();	
}

$obtener_datos=mysqli_fetch_assoc($buscar);

/*$verificar=verificar_usuario_activo($usuario);

$conexion->close();

if (!($verificar->num_rows>0)) {

	echo $val;

    exit();	
}

$filas=mysqli_fetch_assoc($verificar);*/

$id_us=$obtener_datos['id_us'];

$nick_us=$obtener_datos['nick_us'];

if ($usuario!==$nick_us) {

bloquear_preguntas();

	echo $val;

    exit();		
}
$informe_viejos=buscar_informe_usuario($id_us);

        $titulo="Se ha creado un informe";

    $msg="Se le informara a administrador sobre el cambio de contraseña";

    $val=msg_interrogante($msg,$titulo);

if ($informe_viejos->num_rows>0) {


    echo $val;

        session_unset();
session_destroy();

echo"<script>setTimeout(function(){window.location.replace('http://localhost:8080/facturacion/index.php?pagina=login')},3000);</script>";

    exit();   

}

$verificar_preguntas=consultar_preguntas_buscar($id_us);

if (!($verificar_preguntas->num_rows>0)) {


   	$informe=crear_informe($id_us);

   	if ($informe==false) {
  	
  	$titulo="Error";

    $msg="No se ha podido crear el informe";

    $val=msg_interrogante($msg,$titulo);

   	echo $val;

        session_unset();
session_destroy();

   	 exit();	
   	}

        session_unset();
session_destroy();

echo $val;

echo"<script>setTimeout(function(){window.location.replace('http://localhost:8080/facturacion/index.php?pagina=login')},3000);</script>";

    exit();   
}

$_SESSION['usuario_clave']=$id_us;

$_SESSION['preguntas']=false;

echo"<script>setTimeout(function(){window.location.replace('http://localhost:8080/facturacion/index.php?pagina=preguntas_seguridad')},0);</script>";
//echo"<script>setTimeout(function(){window.location.replace('http://localhost/facturacion/index.php?pagina=cambio_clave')},0);</script>";

exit();
?>