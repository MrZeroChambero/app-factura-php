<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=compras"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once('../conexion/conexion.php');

require_once('../funciones_generales.php');

nivel_medio();
if(isset($_POST['agregar_proveedor'])){
 $proveedor=$_POST['agregar_proveedor'];

       $verificar_existe = verificar_proveedor_activo($proveedor);

       $verificar=verificar_proveedor_compra($proveedor);

 if (!($verificar_existe->num_rows>0)) {

        $titulo="Verifique los datos";

        $msg="No se ha encuantrado el proveedor";

        $val=msg_error($msg,$titulo);

        echo $val;

        echo "<script>window.location.replace('index.php?pagina=compras');</script>";

        exit();
 }
  if (!($verificar->num_rows>0)) {

        $titulo="Verifique los datos";

        $msg="No se ha encuantrado el proveedor";

        $val=msg_error($msg,$titulo);

        echo $val;

        echo "<script>window.location.replace('index.php?pagina=compras');</script>";

        exit();
 }
 $estado_proveedor=mysqli_fetch_assoc($verificar_existe);

 if ($estado_proveedor['estado_pro']==false) {

        $titulo="Verifique los datos";

        $msg="Este proveedor se encuentra desactivado";

        $val=msg_error($msg,$titulo);

        echo$val;

        echo "<script>window.location.replace('index.php?pagina=compras');</script>";

        exit();
 }
$agregar_proveedor=$conexion->real_escape_string($_POST['agregar_proveedor']);

        $_SESSION['proveedor1']=$agregar_proveedor;

        $titulo="Correcto";

        $msg="Se ha agregado un proveedor";

        $val=msg_positivo($msg,$titulo);

        echo $val;

        limpiar_todo();

        echo "<script>cambiar_menu();</script>";
}
 ?>