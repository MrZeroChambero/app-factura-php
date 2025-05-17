<?php
require_once('../conexion/conexion.php');
require_once('../funciones_generales.php');
nivel_maximo();

$titulo="Error";

$msg="No se encontraron resultados";

$val=msg_error($msg,$titulo);

if(!isset($_POST['id_in_des'])) {

echo $val;

exit();

}

if (empty(trim($_POST['id_in_des']))) {

echo"esta vacio";

echo $val;

exit();
}
if (!filter_var(trim($_POST['id_in_des']),FILTER_VALIDATE_INT)){

echo "noes numero";

echo $val;

exit();
}

$id_in=trim($_POST['id_in_des']);

$verificar_insumo=verificar_insumo($id_in);

if ($verificar_insumo->num_rows>0) {

          $desactivar=desactivar_insumos($id_in);

          if($desactivar==true){



$resultado_insumos=mysqli_fetch_assoc($verificar_insumo);

        $campo="Estado Insumo: desactivado";

        $codigo="Codigo:". $resultado_insumos['cod_in'];

        $registro='Insumos';

        $accion="Ha sido desactivado";

        auditoria($registro,$accion,$campo,$codigo);



                  $titulo="correcto";

                  $msg="insumo desactivado";

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