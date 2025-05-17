<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
nivel_maximo();
    $titulo="Cedula invalida";

    $msg="Ingrese una cedula valida, no utilice comas ni puntos porfavor";

    $val=msg_interrogante($msg,$titulo);


    if (!isset($_POST['cantidad'])) {

    echo $val;

    exit();
}

$validar_cantidad=validar_float($_POST['cantidad']);

if ($validar_cantidad==false) {

    echo $val;

    exit(); 
}

$validar_completo=validar_numeros_zero($_POST['cantidad']);

if ($validar_completo==false) {

    echo $val;

    exit(); 
}
if ($_POST['cantidad']>99) {

    $titulo="Verifique los datos";

    $msg="Ingrese un iva valido, <br> no puede ingresar mas del 99%";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

     exit();

}
if ($_POST['cantidad']<0) {


    $titulo="Verifique los datos";

    $msg="Ingrese un iva valido, <br> no puede ingresar menos del 0%";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

     exit();

}


$cantidad=$conexion->real_escape_string($_POST['cantidad']);


$conexion = conectar();

$verificar_iva=$conexion->query("SELECT * FROM iva");

if (!($verificar_iva->num_rows>0)) {

         $crear_iva=$conexion->query("INSERT INTO iva(cantidad_iva) VALUES('{$cantidad}')");

        if ($crear_iva==false) {

            $titulo="Error";

            $msg="Error al actualizar el iva";

            $val=msg_error($msg,$titulo);

            echo $val;

             exit();
        }   
}else{

    $filas=mysqli_fetch_assoc($verificar_iva);

    $id_iva=$filas['id_iva'];
    
             $actualizar=$conexion->query("UPDATE iva set cantidad_iva = '{$cantidad}' WHERE iva.id_iva = '{$id_iva}'");

        if ($actualizar==false) {

            $titulo="Error";

            $msg="Error al actualizar el iva";

            $val=msg_error($msg,$titulo);

            echo $val;

             exit();
        }   
}

        $campo="";

        $codigo="";

        $registro="Iva";

        $accion="Ha sido actualizado el iva";

        auditoria($registro,$accion,$campo,$codigo); 

  
    $titulo="Correcto";

    $msg="Se ha actualizado el iva";

    $val=msg_positivo($msg,$titulo);

    echo $val;
$conexion->close();
     exit();

 ?>
