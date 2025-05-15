<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=recuparar_clave"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
if (isset($_SESSION['autenticado'])) {
   $_SESSION['usuario_clave']=null;
   session_unset();
   session_destroy();
   echo"<script>setTimeout(function(){window.location.replace('http://localhost/facturacion/index.php?pagina=login')},0);</script>"; 

   exit();     
}

if (isset($_SESSION['bloqueo_preguntas']) and $_SESSION['bloqueo_preguntas'] == true) {
   echo"<script>setTimeout(function(){window.location.replace('http://localhost/facturacion/index.php?pagina=login')},0);</script>";

   exit();  
}
 ?>
<!DOCTYPE html>

<html lang="es">

<head>

    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
    
    <!-- Place your kit's code here -->
    <script src='medical_health.js' crossorigin='anonymous'></script>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Lora&family=Montserrat:wght@500&family=Noto+Serif:ital@1&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href='/facturacion/PROYECTO-WEB/css/estilo.css'>
    <link rel='stylesheet' href='/facturacion/PROYECTO-WEB/css/fontawesome.min.css'>
    <link rel='stylesheet' href='/facturacion/estiloT.css'>
    <link rel='icon' type='image/ico' href='/facturacion/PROYECTO-WEB/Recursos/favio.ico'>
    <!-- <link rel='stylesheet' href='bootstrap-5.1.3-dist/css/bootstrap.min.css'> -->
    <title >Acceso</title>
    <link rel="stylesheet" href="estiloP.css">

</head>

<body style="min-height: 100vh; height: 100%;" class="ajuste w">

<div id="aler"></div>

<div class='texto-principal margen-interno '>

    <section    class='principal upper margen'>

        <form name="formulario" id="formulario">

        <div class="form">

            <h1 style="color: black;">Ingrese su usuario</h4>

            <input style="max-width: 300px;" type="text" name="usuario" id="usuario" autocomplete="off" placeholder="Escriba el usuario">

            <input class="pushy__btn pushy__btn--df pushy__btn--blue" onclick="enviar()" type="button" value="Enviar" > 

            <a class="pushy__btn pushy__btn--df pushy__btn--blue" href="index.php?pagina=login">Volver</a>

        </div>

        </form>

    </section>

</div>



        <script type="text/JavaScript" src="js/fw/jquery-3.6.0.min.js"></script>

        <script type="text/JavaScript" src="js/fw/validate1.9.js"></script>

        <script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>

        <script type="text/javascript" src="js/fw/traduccion.js"></script>

        <script type="text/javascript" src="js/clave/recuperar_contrasena.js"></script>

</body>

</html>
