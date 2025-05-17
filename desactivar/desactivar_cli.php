<?php
require_once('../conexion/conexion.php');
require_once('../funciones_generales.php');
nivel_maximo();
$titulo="Error";

$msg="No se encontraron resultados";

$val=msg_error($msg,$titulo);

if(!isset($_POST['id_cli_des'])) {

echo $val;

exit();

}
if(empty(trim($_POST['id_cli_des']))) {

echo $val;

exit();

}
if(!filter_var(trim($_POST['id_cli_des']),FILTER_VALIDATE_INT)) {

echo $val;

exit();

}

$id_cli=trim($_POST['id_cli_des']);

$verificar_cliente=verificar_cliente($id_cli);

          if ($verificar_cliente->num_rows>0) {

                    $activar=desactivar_cliente($id_cli);

          if($activar==true) {

                    
$filas_cli=mysqli_fetch_assoc($verificar_cliente);
$tipo="V";
if ($filas_cli['tipo_cli']==1) {
    $tipo="V";

}
if ($filas_cli['tipo_cli']==2) {
    $tipo="J";

}
if ($filas_cli['tipo_cli']==3) {
    $tipo="E";
}
if ($filas_cli['tipo_cli']==4) {
    $tipo="G";
}
if ($filas_cli['tipo_cli']==5) {
    $tipo="P";
}
$cedula=$tipo."-".$filas_cli['cedula_rif']."-".$filas_cli['cedula_2'];
if ($filas_cli['tipo_cli']==6) {
$cedula=$filas_cli['cedula_rif'];
}

        $campo="Estado Cliente: desactivado";

        $codigo="Cedula/rif:". $cedula;

        $registro='Cliente';

        $accion="Ha sido desactivado";

        auditoria($registro,$accion,$campo,$codigo);

                    $titulo="correcto";

                    $msg="cliente desactivado";

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