<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=consulta_proveedor"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/} </script>
<?php
require_once('../conexion/conexion.php');
require_once('../funciones_generales.php');
nivel_maximo();

    $titulo="Error";

    $msg="No se encontraron resultados";

    $val=msg_error($msg,$titulo);

if (!isset($_POST['id_pro_act'])) {

    echo $val;

    exit();
}
if (empty(trim($_POST['id_pro_act']))) {

    echo $val;

    exit();
}
if (!filter_var(trim($_POST['id_pro_act']),FILTER_VALIDATE_INT)) {

    echo $val;

    exit();
}

$id_pro=trim($_POST['id_pro_act']);

$verificar_proveedor=verificar_proveedor($id_pro);

        if ($verificar_proveedor->num_rows>0) {

        	 $activar=activar_proveedor($id_pro);

        	 if ($activar==true) {

            $filas1=mysqli_fetch_assoc($verificar_proveedor);

$tipo="j";
if ($filas1['tipo_pro']==1) {
    $tipo="V";
}
if ($filas1['tipo_pro']==2) {
    $tipo="J";
}
if ($filas1['tipo_pro']==3) {
    $tipo="E";
}
if ($filas1['tipo_pro']==4) {
    $tipo="G";
}
if ($filas1['tipo_pro']==5) {
    $tipo="P";
}

$rif=$tipo."-".$filas1['rif_pro']."-".$filas1['rif_2'];

        $campo="Estado Proveedor: activo";

        $codigo="RIF:". $rif;

        $registro='Proveedor';

        $accion="Ha sido activado";

        auditoria($registro,$accion,$campo,$codigo);

                      $titulo="correcto";

                      $msg="Proveedor Activado";

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