<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=compras"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once('../conexion/conexion.php');

require_once('../funciones_generales.php');

nivel_medio();
if (isset($_POST['quitar_lista'])) {
    
if (!filter_var($_POST['id_in'],FILTER_VALIDATE_INT)) {

        $titulo="Verifique los datos";

        $msg="Este insumo no se encuentra en la lista";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();
}

    $id=$_POST['id_in'];
        

$buscar_lista=verificar_lista_compra($id);

if (!($buscar_lista->num_rows>0)) {

        $titulo="Verifique los datos";

        $msg="Este insumo no se encuentra en la lista";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();

    }
$quitar_listas=quitar_lista($id);

if ($quitar_listas==true) {

        $titulo="Correcto";

        $msg="Se quitado el insumo de la lista";

        $val=msg_positivo($msg,$titulo);

        echo $val;

if (isset($_POST['recargar']) and ($_POST['recargar']== true)) {
    echo"<script>buscar_insumo(); cerrar_ventana2(); ver_lista(); </script>";
}

  exit();

}else{

        $titulo="Error";

        $msg="Al quitar de la lista";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();
}
} 
 ?>