
<?php 
require_once('../conexion/conexion.php');
require_once('../funciones_generales.php');
nivel_maximo();
require_once("../validar/validar_analisis.php");

$id_an=$conexion->real_escape_string($_SESSION['editar_analisis']);

$cod_an=$conexion->real_escape_string($codigo);

$pre_an=$conexion->real_escape_string($precio);

$nom_an=$conexion->real_escape_string($nombre);

$des_an=$conexion->real_escape_string($descripcion);

$tipo_an=$conexion->real_escape_string($tipo); 
 
$buscar_codigo=validar_analisis($cod_an);

    $verificar=verificar_analisis($id_an);
    
    $resultado=mysqli_fetch_assoc($verificar);

if(!($verificar->num_rows > 0)){

        $titulo="Sin resultado";

        $msg="Error no se ha encontrado resultados";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();
}

if($resultado['cod_an'] != $cod_an){

    if($buscar_codigo->num_rows >0){

        $titulo="Codigo en uso";

        $msg="Error este codigo ya esta en uso";

        $val=msg_interrogante($msg,$titulo);

        echo $val;

        exit();

    }
}
if ($tipo_an != $resultado['tipo_an']) {
 $verificar_consumo=buscar_consumo_general($id_an);
    if ($verificar_consumo->num_rows>0) {
             $titulo="Análisis en uso";

            $msg="Este análisis ya tiene insumos asginados,<br> para cambiar el tipo debe quitar los insumos asignados";

            $val=msg_interrogante($msg,$titulo);

            echo $val;

            exit();   
    }  


}
        $actualizar=actualizar_analisis($id_an,$cod_an,$nom_an,$des_an,$tipo_an,$pre_an);

        if ($actualizar == false) {

                $titulo="Error";

                $msg="Error al actualizar";

                $val=msg_error($msg,$titulo);

                echo $val;

                exit();
            
        }
if ($tipo_an != $resultado['tipo_an']) {

        $campo="El Tipo de análisis fue actualizado";

        $codigo="Codigo:".$cod_an;

        $registro="Análisis";

        $accion="Ha sido actualizado";

         auditoria($registro,$accion,$campo,$codigo);
}

if ($cod_an != $resultado['cod_an']) {

        $campo="El Codigo fue actualizado; Codigo anterior:".$resultado['cod_an'].", actual:".$cod_an;

        $codigo="Codigo:".$cod_an;

        $registro="Análisis";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo);
}

if ($nom_an != $resultado['nom_an']) {

        $campo="El Nombre fue actualizado";

        $codigo="Codigo:".$cod_an;

        $registro="Análisis";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo);
}

if ($des_an != $resultado['des_an']) {

        $campo="La Descripción fue actualizada";

        $codigo="Codigo:".$cod_an;

        $registro="Análisis";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo);
}

if ($pre_an != $resultado['pre_an']) {

        $campo="El Precio fue actualizado";

        $codigo="Codigo:".$cod_an;

        $registro="Análisis";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo);  
}

        $titulo="Correcto";

        $msg="Cambios guardados";

        $val=msg_positivo($msg,$titulo);

        echo $val;

        echo "<script>cerrar_ventana();</script>";

        $_SESSION['editar_analisis']=null;

        exit();

?>