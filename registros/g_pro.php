<?php
require_once('../conexion/conexion.php');

require_once("../funciones_generales.php");

require_once("../validar/validar_proveedor.php");

$conexion = conectar();

nivel_maximo();

$nom_pro =$conexion->real_escape_string($nombre);

$rif_pro =$conexion->real_escape_string($rif);

$tlf_num_pro =$conexion->real_escape_string($tlf);

$dir_pro =$conexion->real_escape_string($Dirección);

$correo_pro =$conexion->real_escape_string($correo);


$tipo_pro =$conexion->real_escape_string($_POST['tipo_pro']);

$rif_2 =$conexion->real_escape_string($_POST['rif_2']);
if ($rif_2==10) {
  $rif_2=0;      
}
$q=$rif_pro;

$buscar_rif=validar_proveedor($q);

$conexion->close();

if($buscar_rif->num_rows > 0){

        $titulo="Rif registrado";

        $msg="Ya se encuenta registrado un proveedor con dicha rif, <br> direjase a consulta y verfique si se trata del mismo proveedor";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();

}

    $proveedor_registrado =registrar_proveedor($rif_pro,$nom_pro,$tlf_num_pro,$dir_pro,$correo_pro,$tipo_pro,$rif_2);
           

if($proveedor_registrado == false){

        $titulo="Error";

        $msg="Error al registrar";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();

}

        $titulo="Correcto";

        $msg="Registro completado, A cada Proveedor se le debe asignar una lista de insumos que proveer, para asignar dichos insumos debe dirijirse al menú de consulta de proveedores y pulsar el boton asignar del proveedor que deseé, luego sera enviado a un menú donde podrá asignar la lista de insumos.";

        $val=msg_positivo_sin($msg,$titulo);

        echo $val;

        echo "<script>
document.getElementById('nom_pro').value = '';
document.getElementById('rif_pro').value = '';
document.getElementById('num_tlf_pro').value = '';
document.getElementById('dir_pro').value = '';
document.getElementById('correo_pro').value = '';
document.getElementById('tipo_pro').value = '';
document.getElementById('rif_2').value = '';
                </script>";

        exit();                         

?>