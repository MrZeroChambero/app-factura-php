<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=consulta_usuario"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/} </script>
<?php
require_once('../conexion/conexion.php');
require_once('../funciones_generales.php');
nivel_maximo();

$titulo="Error";

$msg="No se encontraron resultados";

$val=msg_error($msg,$titulo);

if (!isset($_POST['id_us_des'])) {

echo $val;

exit();
}
if (empty(trim($_POST['id_us_des']))) {

echo $val;

exit();

}
if (!filter_var(trim($_POST['id_us_des']),FILTER_VALIDATE_INT)) {

echo $val;

exit();

}

$id_us=trim($_POST['id_us_des']);

$verificar_usuario=verificar_usuario($id_us);

if ($verificar_usuario->num_rows>0) {

            $resultado_usuario=mysqli_fetch_assoc($verificar_usuario);

            if ($resultado_usuario['nivel_us']==1) {

                    $titulo="Error";

                    $msg="No se puede desactivar al administrador";

                    $val=msg_error($msg,$titulo);

                    echo $val;

                    exit();

            }

            $desactivar=desactivar_usuario($id_us);

            if($desactivar==true) {



        $campo="Estado Usuario: desactivado";

        $codigo="Cedula:".$resultado_usuario['cedula_us'];

        $registro='Usuario';

        $accion="Ha sido desactivado";

        auditoria($registro,$accion,$campo,$codigo);



                    $titulo="correcto";

                    $msg="Usuario Desactivado";

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