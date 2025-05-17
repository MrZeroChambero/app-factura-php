<?php
require_once('../conexion/conexion.php');
require_once('../funciones_generales.php');
nivel_maximo();

    $titulo="Error";

    $msg="No se encontraron resultados";

    $val=msg_error($msg,$titulo);

if (!isset($_POST['id_in_act'])) {

  echo "no existe";

    echo $val;

    exit();
}
if (empty(trim($_POST['id_in_act']))) {
	
	echo "vacia";

    echo $val;

    exit();
}
if (!filter_var(trim($_POST['id_in_act']),FILTER_VALIDATE_INT)) {

	echo "no es un id";

  echo $val;

    exit();
}

$id_in=trim($_POST['id_in_act']);

$verificar_insumo=verificar_insumo($id_in);

if ($verificar_insumo->num_rows>0) {

          $resultado_insumos=mysqli_fetch_assoc($verificar_insumo);

          if ($resultado_insumos['estado_in']==true) {

                  $titulo="algo va mal";

                  $msg="Este insumo ya se encuentra activado";

                  $val=msg_interrogante($msg,$titulo);

                  echo $val;

                  exit();

          }
          	$activar=activar_insumos($id_in);

          	if ($activar==true) {



        $campo="Estado Insumo: activo";

        $codigo="Codigo:". $resultado_insumos['cod_in'];

        $registro='Insumos';

        $accion="Ha sido activado";

        auditoria($registro,$accion,$campo,$codigo);



                    $titulo="correcto";

                    $msg="insumo activado";

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