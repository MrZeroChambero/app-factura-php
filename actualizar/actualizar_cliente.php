<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=consulta_clientes"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php
require_once('../conexion/conexion.php'); 
require_once('../funciones_generales.php');
nivel_medio();
require_once("../validar/validar_cliente.php");

$id_cli=$conexion->real_escape_string($_SESSION['editar_cliente']);

$nom_cli=$conexion->real_escape_string($nombre);

$cedula_cli=$conexion->real_escape_string($cedula);

$num_tlf=$conexion->real_escape_string($tlf);

$di_cli=$conexion->real_escape_string($direccion);

$cedula_f=$conexion->real_escape_string($cedula_2);

$tipo_cliente=$conexion->real_escape_string($_POST['tipo_cliente']);

$validar=validar_cliente($cedula_cli);

$verificar=verificar_cliente($id_cli);

$res=mysqli_fetch_assoc($verificar);

if(!($verificar->num_rows > 0)){

        $titulo="Error";

        $msg="No se encontraron resultados";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit(); 
}

if($res['cedula_rif'] != $cedula_cli){

        if($validar->num_rows >0){

                $titulo="Cedula en uso";

                $msg="Esta la esta usando otro cliente";

                $val=msg_interrogante($msg,$titulo);

                echo $val;

                exit();
   
        }
}

        $actualizar=actualizar_cliente($id_cli,$cedula_cli,$nom_cli,$num_tlf,$di_cli,$cedula_f,$tipo_cliente);

        if ($actualizar == false) {

                $titulo="Error";

                $msg="Error al actualizar";

                $val=msg_error($msg,$titulo);

                echo $val;

                exit(); 
            
        }

$tipo="j";
if ($res['tipo_cli']==1) {
        $tipo="V";

}
if ($res['tipo_cli']==2) {
        $tipo="J";

}
if ($res['tipo_cli']==3) {
        $tipo="E";
}
if ($res['tipo_cli']==4) {
        $tipo="G";
}
if ($res['tipo_cli']==5) {
        $tipo="P";
}
$cedula_anterior=$tipo."-".$res['cedula_rif']."-".$res['cedula_2'];
if ($res['tipo_cli']==6) {
$cedula_anterior=$res['cedula_rif'];
}



$tipo="j";
if ($tipo_cliente==1) {
        $tipo="V";

}
if ($tipo_cliente==2) {
        $tipo="J";

}
if ($tipo_cliente==3) {
        $tipo="E";
}
if ($tipo_cliente==4) {
        $tipo="G";
}
if ($tipo_cliente==5) {
        $tipo="P";
}
$cedula_auditoria=$tipo."-".$cedula_cli."-".$cedula_f;
if ($tipo_cliente==6) {
$cedula_auditoria=$cedula_cli;
}



$r=true;



if ($cedula_f != $res['cedula_rif']) {

        $campo="Cedula/RIF fue actualizada; Cedula/RIF anterior:".$cedula_anterior.", Cedula/RIF actual:".$cedula_auditoria;

        $codigo="Cedula/RIF:".$cedula_auditoria;

        $registro="Cliente";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo);

        $r=false;
}

if ($nom_cli != $res['nom_cli']) {

        $campo="El Nombre fue actualizado";

        $codigo="Cedula/RIF:".$cedula_auditoria;

        $registro="Cliente";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo);
}
if (($cedula_f != $res['cedula_2']) and ($r==true)) {

        $campo="Cedula/RIF fue actualizada; Cedula/RIF anterior:".$cedula_anterior.", Cedula/RIF actual:".$cedula_auditoria;

        $codigo="Cedula/RIF:".$cedula_auditoria;

        $registro="Cliente";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo);

        $r=false;
}
if ($num_tlf != $res['tlf_num_cli']) {

        $campo="El Numero Telefonico fue actualizado";

        $codigo="Cedula/RIF:".$cedula_auditoria;

        $registro="Cliente";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo); 

}

if ($di_cli != $res['di_cli']) {
 
        $campo="La Dirección fue actualizada";

        $codigo="Cedula/RIF:".$cedula_auditoria;

        $registro="Cliente";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo); 

}

if (($tipo_cliente != $res['tipo_cli']) and ($r==true)) {
        
        $campo="Cedula/RIF fue actualizada; Cedula/RIF anterior:".$cedula_anterior.", Cedula/RIF actual:".$cedula_auditoria;

        $codigo="Cedula/RIF:".$cedula_auditoria;

        $registro="Cliente";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo);

        $r=false;


}
            
        $titulo="Correcto";

        $msg="Cambios guardados";

        $val=msg_positivo($msg,$titulo);

        echo $val;

        echo "<script>cerrar_ventana();</script>";

        $_SESSION['editar_cliente']=null;

        exit();              
        

 ?>