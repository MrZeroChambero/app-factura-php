<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=factura"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once('../conexion/conexion.php');

require_once('../funciones_generales.php');

verificar_nivel();

if(isset($_POST['agregar_cliente'])){
    
    $cliente=$_POST['agregar_cliente'];

    $verificar=verificar_cliente_activo($cliente);

    if (empty(trim($cliente))) {
        $msg="Elija un cliente";

        $titulo="Error";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();
    }
    if (!filter_var($cliente,FILTER_VALIDATE_INT)) {

        $msg="Este cliente no esta registrado";

        $titulo="Error";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();
    }
    if(!($verificar->num_rows>0)){

        $msg="Este cliente no esta registrado";

        $titulo="Error";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();
    }
        limpiar_carrito();
        
        $_SESSION['cliente']=$conexion->real_escape_string($_POST['agregar_cliente']);

        $msg="Se ha Agregado un cliente";

        $titulo="Correcto";

        $val=msg_positivo($msg,$titulo);

        limpiar_todo();

        echo $val;

        echo"<script>cambiar_menu();</script>";

        //r_factura();

        exit();
}else{

  patucasa();

  exit();
}
 ?>
