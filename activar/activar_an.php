<?php
require_once('../conexion/conexion.php');
require_once('../funciones_generales.php');
nivel_maximo();

    $titulo="Error";

    $msg="No se encontraron resultados";

    $val=msg_error($msg,$titulo);


if (!isset($_POST['id_an_act'])) {


    echo $val;

    exit();
}
if (empty(trim($_POST['id_an_act']))) {



    echo $val;

    exit();
}
if (!filter_var(trim($_POST['id_an_act']),FILTER_VALIDATE_INT)) {



    echo $val;

    exit();
}

$msg2='';

$msg='';

$id_an=trim($_POST['id_an_act']);

$verificar_analisis=verificar_analisis($id_an);

if ($verificar_analisis->num_rows>0) {

                  $activar=activar_analisis($id_an);

              	if ($activar==true) {

     $filas_an=mysqli_fetch_assoc($verificar_analisis);                       




        $campo="Estado Análisis: activo";

        $codigo="Codigo:". $filas_an['cod_an'];

        $registro="Análisis";

        $accion="Ha sido activado";

        auditoria($registro,$accion,$campo,$codigo);

                            $titulo="correcto";

                            $msg="Análisis Activado";

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