<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=consulta_analisis"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/} </script>
<?php
require_once('../conexion/conexion.php');
require_once('../funciones_generales.php');
nivel_maximo();

    $titulo="Error";

    $msg="No se encontraron resultados";

    $val=msg_error($msg,$titulo);

if(!isset($_POST['id_an_des'])) {


    echo $val;

    exit();
}
if (empty(trim($_POST['id_an_des']))) {



echo $val;

exit();

}
if (!filter_var(trim($_POST['id_an_des']),FILTER_VALIDATE_INT)) {


echo $val;

exit();

}

$id_an=trim($_POST['id_an_des']);

$verificar_analisis=verificar_analisis($id_an);

          if ($verificar_analisis->num_rows>0) {

                    $resultado_analisis=mysqli_fetch_assoc($verificar_analisis);

                    $codigo=$resultado_analisis['cod_an'];

                    $estado_actual=$resultado_analisis['estado_an'];

          if ( $estado_actual==false) {

                    $titulo="Verifique los datos";

                    $msg="Este Análisis ya se encuantra desactivado";

                    $val=msg_interrogante($msg,$titulo);

                    echo $val;

                    exit();

          }

          $desactivar=desactivar_analisis($id_an);

          if($desactivar==true) {

  
        $campo="Estado Análisis: desactivado";

        $codigo="Codigo:". $resultado_analisis['cod_an'];

        $registro="Análisis";

        $accion="Ha sido desactivado";

        auditoria($registro,$accion,$campo,$codigo);

                  $titulo="correcto";

                  $msg="Análisis desactivado";

                  $val=msg_positivo($msg,$titulo);

                  echo $val;

                  exit();

          }else{

                  $titulo="Error";

                  $msg="Error desactivar";

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