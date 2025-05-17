
<?php
$nrointentos=consultar_intentos_login();
$cantidad=5;
if ($nrointentos->num_rows>0) {
    $filas=mysqli_fetch_assoc($nrointentos);
    $cantidad_intentos=$filas['cantidad'];
    if ($cantidad_intentos>=5) {
        $cantidad=0;
    }
    else {
        $cantidad=5-$cantidad_intentos;
    }
}
$verificar=verificar_fechas();
limpieza();
if ($verificar==true) {
    $_SESSION['bloqueo']=null;
    limpiar_intentos();
}
if (isset($_SESSION['bloqueo'])) {
    $_SESSION['msg_in']="Se agotaron los intentos espere 5 minutos porfavor";
}else{
    $_SESSION['msg_in']="";
}
if (!isset($_SESSION['bloqueo'])) {
    


            if(isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true){

 

        $campo="";

        $codigo="";

$registro="sección";

$accion="Ha Iniciado sección";

        auditoria($registro,$accion,$campo,$codigo);  

                header('Location: ' . base_url() . ':8080/facturacion/index.php?pagina=menu');

                exit();
            }

            $enviar = isset($_POST['enviar']);


            if ($enviar) {

                $txtusuario = $_POST['txtusuario'];

                $txtclave = md5($_POST['txtclave']);

                if (!empty($txtclave) && !empty($txtusuario)) {

                    $conexion = conectar();

                    $tabla='usuario';

                    $campo1='nick_us';

                    $nickname = validar_usuario($txtusuario);;

                    $num = mysqli_num_rows($nickname);

                    if($num == 0) {

                        $_SESSION['error'] = "Datos incorrectos, tiene solo ".$cantidad." intentos";

                    } else {

                        $datos = mysqli_fetch_assoc($nickname);

                        //$encrypted_password = md5($txtclave);
                        $encrypted_password = $txtclave;

                        if($encrypted_password != $datos['pass_us']) {

                            $_SESSION['error'] = null;
                            $_SESSION['error'] = "Datos incorrectos, tiene solo ".$cantidad." intentos";

                        } else {

                            if ($txtusuario!==$datos["nick_us"]) {

                                 $_SESSION['error'] = null;

                                $_SESSION['error'] = "Datos incorrectos, tiene solo ".$cantidad." intentos";

                            }else{

                            $_SESSION['error'] = null;

                            $_SESSION['autenticado'] = true;

                            $_SESSION['id_us'] = $datos['id_us'];

                            $_SESSION['nom_us'] = $datos['nom_us'];

                            $_SESSION['nick_us'] = $datos["nick_us"];

                            $_SESSION['nivel_us'] = $datos["nivel_us"];

        $campo="";

        $codigo="";

$registro="sección";

$accion="Ha Iniciado sección";

        auditoria($registro,$accion,$campo,$codigo);  

                            header('Location: ' . base_url() . ':8080/facturacion/index.php?pagina=menu');

                            exit();
                            }
                        }


                    }
                } else {
                    $_SESSION['error'] = "Introduzca Usuario y Contraseña";
                }
            }

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset='UTF-8'>
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
<body class="margen">
    <form name="formulario" method="post" action="index.php?pagina=login">
        <?php if(isset($_SESSION['error'])) { ?>
            <div class="login-error"><?php echo $_SESSION['error']."<br>".$_SESSION['msg_in'];?></div>
            <?php
            }
            ?>
        <div class="form">
            <h1 style="color: black;">Acceso al Sistema</h1>
            <div class="grupo">
                <input type="text" autocomplete="off" name="txtusuario" required><span class="barra"></span>
                <label for="">Usuario</label>
            </div>
            <div class="grupo">
                <input type="password" autocomplete="off" name="txtclave" required><span class="barra"></span>
                <label for="">Clave</label>
            </div>

            <input class="pushy__btn pushy__btn--df pushy__btn--blue margen" name="enviar" type="submit" value="Enviar">
            
           <p> <a class="pushy__btn pushy__btn--df pushy__btn--green margen" href="index.php?pagina=recuparar_clave">Recuperar clave</a></p>
        </div>


    </form>



    <script src="mainP.js"></script>
</body>
</html>
<style>
    .login-error {
        color: red;
        display: flex;
        justify-content: center;
        font-weight: bold;
    }
</style>
<?php 
if (isset($_SESSION['error'])) {
$validar=true;
}

if (isset($validar)) {



    $intentos=consultar_intentos_login();

    if (!($intentos->num_rows>0)) {

        $agregar=agregar_intentos_login();

        if ($agregar==false) {

            echo "error al agregar";
            
        }

    }else{

        $filas_intentos=mysqli_fetch_assoc($intentos);

        $fecha_hora=$filas_intentos['fecha_hora'];

        $cantidad=$filas_intentos['cantidad'];

        $id=$filas_intentos['id_intentos'];

        $cantidad++;

        if ($cantidad>=5) {

            $_SESSION['bloqueo']=true;

        }else{

            $actualizar=actualizar_intentos($cantidad,$id);

            if ($actualizar==false) {
                
                echo "error al actaulizar";
            }
        }
    }

    
}

/*function verifica_rango($date_inicio, $date_fin, $date_nueva) {
   $date_inicio = strtotime($date_inicio);
   $date_fin = strtotime($date_fin);
   $date_nueva = strtotime($date_nueva);
   if (($date_nueva >= $date_inicio) && ($date_nueva <= $date_fin))
       return true;
   return false;
}*/
/**/ 

?>