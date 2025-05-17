
<?php
require_once('../conexion/conexion.php');
require_once('../funciones_generales.php');
nivel_maximo();
require_once("../validar/validar_insumos.php");

$id_in=$conexion->real_escape_string($_SESSION['editar_insumo']);

$cod_in=$conexion->real_escape_string($codigo);

$nom_in =$conexion->real_escape_string($nombre);

$uni =$conexion->real_escape_string($unidad);

$stock_max =$conexion->real_escape_string($stockmax);

$stock_min =$conexion->real_escape_string($stockmin);

$tipo=$conexion->real_escape_string($tipo_in);

$verificar_asignado=consultar_consumo_insumos($id_in);


if ($stock_min > $stock_max) {

        $titulo="Verifique los datos";

        $msg="El stock minimo debe ser menor que el stock maximo";

        $val=msg_interrogante($msg,$titulo);

        echo $val;

        exit(); 

}

            $validar=validar_insumo($cod_in);

            $verificar=verificar_insumo($id_in);

            $res=mysqli_fetch_assoc($verificar);

if(!($verificar->num_rows > 0)){

            $titulo="Sin resultado";

            $msg="Error no se ha encontrado resultados";

            $val=msg_error($msg,$titulo);

            echo $val;

            exit();                

}

if ($uni!=$res['unidad_medicion']) {
    
    if ($verificar_asignado->num_rows>0) {
            $titulo="Insumo en uso";

            $msg="Este insumos ya esta asignado a algun análisis,<br> debe quitarlo de todos los análisis a los cuales esta asignado antes de cambiar la unidad de mercancia";

            $val=msg_interrogante($msg,$titulo);

            echo $val;

            exit();    
    }    
}
if ($tipo!=$res['tipo_in']) {
    
    if ($verificar_asignado->num_rows>0) {
            $titulo="Insumo en uso";

            $msg="Este insumos ya esta asignado a algun análisis,<br> debe quitarlo de todos los análisis a los cuales esta asignado antes de cambiar el tipo";

            $val=msg_interrogante($msg,$titulo);

            echo $val;

            exit();    
    }    
}

if($res['cod_in'] != $cod_in){

    if($validar->num_rows >0){
      
                $titulo="Codigo en uso";

                $msg="Error este codigo ya esta en uso";

                $val=msg_error($msg,$titulo);

                echo $val;

                exit();   

    }
}
    $actualizar=actualizar_insumos($id_in,$cod_in,$nom_in,$uni,$stock_max,$stock_min,$tipo);

if ($actualizar == false) {

        $titulo="Error";

        $msg="Error al actualizar";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();   
}
if ($tipo != $res['tipo_in']) {

        

        $campo="El Tipo de insumo fue actualizado";

        $codigo="Codigo:".$cod_in;

        $registro="Insumos";

        $accion="Ha sido actualizado";

         auditoria($registro,$accion,$campo,$codigo);
}

if ($cod_in != $res['cod_in']) {

        $campo="El Codigo fue actualizado; Codigo anterior:".$res['cod_in'].", actual:".$cod_in;

        $codigo="Codigo:".$cod_in;

       $registro="Insumos";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo);
}

if ($nom_in != $res['nom_in']) {

        $campo="El Nombre fue actualizado";

        $codigo="Codigo:".$cod_in;

       $registro="Insumos";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo);
}

if ($uni != $res['unidad_medicion']) {

        $campo="La Unidad de medición fue actualizada";

        $codigo="Codigo:".$cod_in;

        $registro="Insumos";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo);
}

if ($stock_max != $res['stockmax']) {

        $campo="El Stock maxímo fue actualizado";

        $codigo="Codigo:".$cod_in;

       $registro="Insumos";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo);  
}
if ($stock_min != $res['stockmin']) {

        $campo="El Stock minimo fue actualizado";

        $codigo="Codigo:".$cod_in;

       $registro="Insumos";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo);  
}
        $titulo="Correcto";

        $msg="Se actualizado la información";

        $val=msg_positivo($msg,$titulo);

        echo $val;

        echo "<script>cerrar_ventana();</script>";

        $_SESSION['editar_insumo']=null;

        exit();

 ?>