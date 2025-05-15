<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=consulta_usuario"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/} </script>
<?php
require_once('../conexion/conexion.php');
require_once('../funciones_generales.php');
nivel_maximo();

    $titulo="Error";

    $msg="No se encontraron resultados";

    $val=msg_error($msg,$titulo);

if (!isset($_POST['id_us_act'])) {

    echo $val;

    exit();
}
if (empty(trim($_POST['id_us_act']))) {

    echo $val;

    exit();
}
if (!filter_var(trim($_POST['id_us_act']),FILTER_VALIDATE_INT)) {

    echo $val;

    exit();
}

$id_us=trim($_POST['id_us_act']);

$verificar_usuario=verificar_usuario($id_us);

if($verificar_usuario->num_rows>0) {

        $filas_us=mysqli_fetch_assoc($verificar_usuario);

        if ($filas_us['nivel_us']==1) {
               $titulo="Error";

                $msg="El estado el administrador no puede alterarse";

                $val=msg_error($msg,$titulo);

                echo $val;

                exit();
            
        }


        $activar = activar_usuario($id_us);



        if($activar==true) {

                


        $campo="Estado Usuario: activo";

        $codigo="Cedula:". $filas_us['cedula_us'];

        $registro='Usuario';

        $accion="Ha sido activado";

        auditoria($registro,$accion,$campo,$codigo);


                $titulo="correcto";

                $msg="Usuario Activado";

                $val=msg_positivo($msg,$titulo);

                echo $val;

                exit();

        }else{

                $titulo="Error";

                $msg="Error al activar";

                $val=msg_error($msg,$titulo);

                echo $val;

                exit();
        }
}else{

    $titulo="Error";

    $msg="No se encontraron resultados";

    $val=msg_error($msg,$titulo);

    echo $val;

    exit();
}
?>