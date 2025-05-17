<?php
require_once('../conexion/conexion.php');
require_once('../funciones_generales.php');
nivel_maximo();

    $titulo="Error";

    $msg="No se encontraron resultados";

    $val=msg_error($msg,$titulo);

if (!isset($_POST['id_cli_act'])) {

    echo $val;
    
    exit();
}
if (empty(trim($_POST['id_cli_act']))) {

    echo $val;
    
    exit();
}
if (!filter_var(trim($_POST['id_cli_act']),FILTER_VALIDATE_INT)) {

    echo $val;
    
    exit();
}

    $id_cli=trim($_POST['id_cli_act']);

    $verificar_cliente=verificar_cliente($id_cli);

if ($verificar_cliente->num_rows>0) {

        	$resultado_cliente=mysqli_fetch_assoc($verificar_cliente);

        	$codigo=$resultado_cliente['cedula_rif'];

        	$activar=activar_cliente($id_cli);

        	if ($activar==true) {




$tipo="V";
if ($resultado_cliente['tipo_cli']==1) {
    $tipo="V";

}
if ($resultado_cliente['tipo_cli']==2) {
    $tipo="J";

}
if ($resultado_cliente['tipo_cli']==3) {
    $tipo="E";
}
if ($resultado_cliente['tipo_cli']==4) {
    $tipo="G";
}
if ($resultado_cliente['tipo_cli']==5) {
    $tipo="P";
}
$cedula=$tipo."-".$resultado_cliente['cedula_rif']."-".$resultado_cliente['cedula_2'];
if ($resultado_cliente['tipo_cli']==6) {
$cedula=$resultado_cliente['cedula_rif'];
}

        $campo="Estado Cliente: activo";

        $codigo="Cedula/rif:". $cedula;

        $registro='Cliente';

        $accion="Ha sido activado";

        auditoria($registro,$accion,$campo,$codigo);

                  $titulo="correcto";

                  $msg="cliente Activado";

                  $val=msg_positivo($msg,$titulo);

                  echo $val;

                  exit();

          }else{

                $titulo="Error";

                $msg="Error activar";

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