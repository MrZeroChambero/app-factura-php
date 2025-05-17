<?php
require_once('../conexion/conexion.php');
require_once('../funciones_generales.php');
nivel_maximo();
require_once("../validar/validar_proveedor.php");

$id_pro=$conexion->real_escape_string($_SESSION['editar_proveedor']);

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
            
            $validar=validar_proveedor($rif_pro);

            $verificar=verificar_proveedor($id_pro);

            $res=mysqli_fetch_assoc($verificar);

if(!($verificar->num_rows > 0)){

            $titulo="Sin resultado";

            $msg="Error no se ha encontrado resultados";

            $val=msg_error($msg,$titulo);

            echo $val;

            exit();
}
if ($res['rif_pro'] != $rif_pro) {

        if($validar->num_rows >0){

                $titulo="RIF en uso";

                $msg="Error este RIF ya esta en uso";

                $val=msg_error($msg,$titulo);

                echo $val;

                exit(); 

    }
}
    $actualizar=actualizar_proveedor($id_pro,$rif_pro,$nom_pro,$tlf_num_pro,$dir_pro,$correo_pro,$tipo_pro,$rif_2);

if ($actualizar == false) {

        $titulo="Error";

        $msg="Error al actualizar";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit(); 
 
}


$tipo="j";
if ($res['tipo_pro']==1) {
        $tipo="V";
}
if ($res['tipo_pro']==2) {
        $tipo="J";
}
if ($res['tipo_pro']==3) {
        $tipo="E";
}
if ($res['tipo_pro']==4) {
        $tipo="G";
}
if ($res['tipo_pro']==5) {
        $tipo="P";
}

$rif_auditoria=$tipo."-".$res['rif_pro']."-".$rif_2;

if ($tipo_pro==1) {
        $tipo="V";
}
if ($tipo_pro==2) {
        $tipo="J";
}
if ($tipo_pro==3) {
        $tipo="E";
}
if ($tipo_pro==4) {
        $tipo="G";
}
if ($tipo_pro==5) {
        $tipo="P";
}

$rif_anterior=$tipo."-".$rif_pro."-".$rif_2;
$r=true;
if ($res['rif_pro']!=$rif_pro) {

        $campo="El RIF fue actualizado; RIF anterior:".$rif_anterior.", RIF actual:".$rif_auditoria;

        $codigo="RIF:".$rif_auditoria;

        $registro="Proveedor";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo);  

$r=false;
}

if ($res['nom_pro']!=$nom_pro) {

        $campo="El Nombre/Razon social fue actualizado";

        $codigo="RIF:".$rif_auditoria;

        $registro="Proveedor";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo);  


}

if ($res['correo_pro']!=$correo) {

        $campo="El Correo fue actualizado";

        $codigo="RIF:".$rif_auditoria;

        $registro="Proveedor";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo);   


}

if ($res['dir_pro']!=$dir_pro) {

        $campo="La Dirección fue actualizada";

        $codigo="RIF:".$rif_auditoria;

        $registro="Proveedor";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo);  


}

if ($res['tlf_num_pro']!=$tlf_num_pro) {

        $campo="El Numero Telefonico fue actualizado";

        $codigo="RIF:".$rif_auditoria;

        $registro="Proveedor";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo);  


}

if (($res['tipo_pro']!=$tipo_pro) and ($r==true)) {

        $campo="El RIF fue actualizado; RIF anterior:".$rif_anterior.", RIF actual:".$rif_auditoria;

        $codigo="RIF:".$rif_auditoria;

        $registro="Proveedor";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo);  

$r=false;


}
if (($res['rif_2']!=$rif_2) and ($r==true)) {

        $campo="El RIF fue actualizado; RIF anterior:".$rif_anterior.", RIF actual:".$rif_auditoria;

        $codigo="RIF:".$rif_auditoria;

        $registro="Proveedor";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo);  

$r=false;

}


        $titulo="Correcto";

        $msg="Cambios guardados";

        $val=msg_positivo($msg,$titulo);

        echo $val;

        echo "<script>cerrar_ventana();</script>";

        $_SESSION['editar_proveedor']=null;

        exit();

 ?>