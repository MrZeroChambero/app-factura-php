<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=pedidos"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php
require_once('../conexion/conexion.php');
require_once('../funciones_generales.php');
nivel_medio();
$patron_numeros = "/^[3-6]+$/";
$numeros = "/^[0-02-2]+$/";

        $titulo="Error";

        $msg="Verifique los datos, complete todos los campos";

        $val=msg_error($msg,$titulo);


if (!isset($_POST['id_in'])) {


       echo $val;

        exit();   
}
if (!isset($_POST['cantidad'])) {

       echo $val;

        exit(); 
}
if (empty(trim($_POST['cantidad']))) {

       echo $val;

        exit();    
}
if (empty(trim($_POST['id_in']))) {

       echo $val;

        exit();    
}
if (!filter_var($_POST['id_in'],FILTER_VALIDATE_INT)) {

       echo $val;

        exit();   
}



if (!isset($_POST['fecha'])) {
       echo $val;

        exit(); 
}
if (empty(trim($_POST['fecha']))) {
       echo $val;

        exit(); 
}
$fecha_v=validar_fecha($_POST['fecha']);

if ($fecha_v==false) {

       echo $val;

        exit(); 
} 
if (!isset($_POST['estado'])){

       echo $val;

        exit(); 
}
if (empty(trim($_POST['estado']))) {

       echo $val;

        exit(); 
}  
if (!preg_match($patron_numeros,$_POST['estado'])) {

       echo $val;

        exit(); 
}

$id_pedido=$_SESSION['pedidos'];

$cantidad=$conexion->real_escape_string($_POST['cantidad']);

$id_inv=$conexion->real_escape_string($_POST['id_in']);

$fecha=$conexion->real_escape_string($_POST['fecha']);

$estado=$conexion->real_escape_string($_POST['estado']);

$verificar_pedido=verificar_pedido($id_inv);

if (!($verificar_pedido->num_rows>0)) {


       echo $val;

        exit(); 

}

$filas=mysqli_fetch_assoc($verificar_pedido);

      $fecha_actual= date('Y-m-d'); 
$fecha_f=$_POST['fecha'];

$verificar_compra=verificar_compra_activa($filas['id_compra_pe']);

if (!($verificar_compra->num_rows>0)) {

         $titulo="Error";

        $msg="Si vez este mensaje reinicie la sección porfavor";

        $val=msg_error($msg,$titulo);

       echo $val;


        exit();       
       
}
/*
if ($fecha_actual>$fecha_f) {

        $titulo="Fecha inválida";

        $msg="No puede ingresar un fecha anterior a la actual";

        $val=msg_error($msg,$titulo);

       echo $val;


        exit(); 
       

}

  */




$id_in=$filas['id_in_pe'];

$estado_actual=$filas['estado_pe'];

if (preg_match($numeros,$estado_actual)) {
       echo $val;

       echo $estado_actual;

        exit(); 
}
$verificar_insumo=verificar_insumo($id_in);

if (!($verificar_insumo->num_rows>0)) {



       echo $val;

        exit(); 
}

$filas_in=mysqli_fetch_assoc($verificar_insumo);

if ($filas_in['unidad_medicion']==2) {
       $unidad=".ml";
         $validar_cantidad=validar_float($_POST['cantidad']);

                         $titulo="Error";

        $msg="Cantidad de insumos inválida";

        $val=msg_error($msg,$titulo);
 

        if ($validar_cantidad==false) {

               echo $val;

                exit(); 
        }  
        $validar_pedido_completo=validar_numeros_zero($_POST['cantidad']); 
        if ($validar_pedido_completo==false) {


 }
       if (!($_POST['cantidad']>0)) {
                 echo $val;

                exit();              
        }
       if ($_POST['cantidad']<0.01) {
                 echo $val;

                exit();              
        }


}else{
$unidad=".unidad/s";
    if (!filter_var($_POST['cantidad'],FILTER_VALIDATE_INT)) {
                $titulo="Error";

        $msg="Cantidad de insumos inválida";

        $val=msg_error($msg,$titulo);
 
               echo $val;

                exit();        
    }

}
$cantidad_maxima=$_POST['cantidad']+$filas_in['cantidad_in'];
if ($cantidad_maxima>$filas_in['stockmax']) {

         $titulo="Error";

        $msg="No puede ingresar más de:".$filas_in['stockmax'].$unidad;

        $val=msg_error($msg,$titulo);

       echo $val;


        exit();       
       
}



$actualizar_pedido=actualizar_pedido($id_inv,$fecha,$estado,$cantidad);

  if ($actualizar_pedido == false) {

        $titulo="Error";

        $msg="Error al guardar verifique los datos";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit(); 
}

       $campo="Codigo del pedido:".$id_pedido;

        $codigo="Codigo de Orden de compra:".$filas['id_compra_pe'];

       $registro="Pedidos";

        $accion="Han sido actualizado";

        auditoria($registro,$accion,$campo,$codigo);

        $titulo="correcto";

        $msg="Se han guardados los cambios";

        $val=msg_positivo($msg,$titulo);

        echo $val;
        
        echo"<script>
    cerrar_ventana3();
 confirmar_pedido(".$id_pedido.");
        </script>";

        exit(); 

 ?>
