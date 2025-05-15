<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=compras"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once('../conexion/conexion.php');

require_once('../funciones_generales.php');

nivel_medio();
        $titulo="Verifique los datos";

        $msg="complete los campos";

        $val=msg_interrogante($msg,$titulo);


if (!isset($_POST['agregar_lista'])) {

        echo $val;

    exit();

}

        
   if(!isset($_SESSION['proveedor1'])){

    echo $val;

    exit();

   }
   if (empty(trim($_SESSION['proveedor1']))) {

    echo $val;

      exit(); 

   }

   if (!isset($_POST['id_in'])) {

        echo $val;

      exit(); 
       
   }

   if (empty(trim($_POST['id_in']))) {
    echo $val;

      exit(); 
   }

   if (!isset($_POST['can_in'])) {
    echo $val;

      exit();    }
   if (empty(trim($_POST['can_in']))) {
    echo $val;

      exit();        
   }

   if (!isset($_POST['costo_in'])) {
    echo $val;

      exit();        
   }

   if (empty(trim($_POST['costo_in']))) {
      echo $val;

      exit();      
   }

   $proveedor=$_SESSION['proveedor1'];

   $verificar_proveedor=verificar_proveedor($proveedor);

   if (!($verificar_proveedor->num_rows>0)) {
    
    echo $val;

       exit(); 

   }

    if (!filter_var($_POST['id_in'],FILTER_VALIDATE_INT,["options" =>["min_range"=>1, "max_range"=>1000000]])){

        $titulo="Verifique los datos";

        $msg="Ingrese una insumo válido";

        $val=msg_error($msg,$titulo);

        echo $val;

     	exit();
    }

$verificar_id=verificar_insumo_activo($_POST['id_in']);

if (!($verificar_id->num_rows>0)) {

          $titulo="Verifique los datos";

        $msg="Ingrese una insumo válido";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();  
}

$filas=mysqli_fetch_assoc($verificar_id);

if ($filas['unidad_medicion']==1) {

        if (!filter_var($_POST['can_in'],FILTER_VALIDATE_INT)) {

        $titulo="Verifique los datos";

        $msg="Ingrese una cantidad válida unidad";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();
        }

}else{

    $validar_cantidad=validar_float($_POST['can_in']);

    if ($validar_cantidad==false){

        $titulo="Verifique los datos";

        $msg="Ingrese una cantidad válida";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();

    }
    $validar_completo=validar_numeros_zero($_POST['can_in']);
        if ( $validar_completo==false){

        $titulo="Verifique los datos";

        $msg="Ingrese una cantidad válida";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();

    }

        if (!($_POST['can_in']>0)){

        $titulo="Verifique los datos";

        $msg="Ingrese una cantidad válida";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();

    }
        if ($_POST['can_in']<0.01){

        $titulo="Verifique los datos";

        $msg="Ingrese una cantidad válida";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();

    }

}


    $validar_costo=validar_float($_POST['costo_in']);

    if  ($validar_costo==false){

        $titulo="Verifique los datos";

        $msg="Ingrese un costo válido";

        $val=msg_error($msg,$titulo);

        echo $val;

     	exit();

    }
    $validar_completo_costo=validar_numeros_zero($_POST['costo_in']);
        if ( $validar_completo_costo==false){

        $titulo="Verifique los datos";

        $msg="Ingrese un costo válido";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();


    }


    if (!($_POST['costo_in']>0)) {

         $titulo="Verifique los datos";

        $msg="El costo debe ser mayor a 0bs";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();       
    }
    if ($_POST['costo_in']<0.01) {

         $titulo="Verifique los datos";

        $msg="El costo debe ser mayor a 0bs";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();       
    }
                    $patron_numeros= "/^[0-9]+$/";

                     $patron_espacio= "/^[\s]+$/";

/* if( !preg_match($patron_numeros, $_POST['costo_in2'])){

        $titulo="Verifique los datos";

        $msg="El costo debe expresar sus <br> decimales entre 01 hasta 99";

        $val=msg_error($msg,$titulo);

        echo $val;

     	exit();

    }
     if(preg_match($patron_espacio, $_POST['costo_in2'])){

        $titulo="Verifique los datos";

        $msg="El costo debe expresar sus <br> decimales entre 01 hasta 99";

        $val=msg_error($msg,$titulo);

        echo $val;

     	exit();

     }
  if (strlen($_POST['costo_in2'])>2) {

        $titulo="Verifique los datos";

        $msg="El costo debe expresar sus <br> decimales entre 01 hasta 99";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();

    }*/

        $id_in = $conexion->real_escape_string($_POST['id_in']);

        $can_in = $conexion->real_escape_string($_POST['can_in']);

        $costo_in1 = $conexion->real_escape_string($_POST['costo_in']);

/*        $costo_in2 = $conexion->real_escape_string($_POST['costo_in2']);*/

        $costo_in=$costo_in1;

        $id_pro = $_SESSION['proveedor1'];



$buscar_lista=verificar_insumo_lista_compra($id_in);

$res=mysqli_fetch_assoc($buscar_lista);

$insumos_encontrado=verificar_insumo($id_in);

if (!($insumos_encontrado->num_rows > 0)) {

        $titulo="Verifique los datos";

        $msg="Este insumo no se encuentra registrado";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();

}
$estado_in=mysqli_fetch_assoc($insumos_encontrado);

if ($estado_in['estado_in']==false) {

        $titulo="Verifique los datos";

        $msg="No se pueden agregar el insumos <br> se encuentra desactivado";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();

}
if($buscar_lista->num_rows > 0){

    $id_lista=$res['id_lista_compra'];

    $limite_insumo=verificar_insumo($id_in);

    $res_limite=mysqli_fetch_assoc($limite_insumo);

    $stock_max=$res_limite['stockmax'];

    $insumo_in=$res_limite['cantidad_in'];

    $total_in=$can_in+$insumo_in;

    if ($stock_max<$total_in) {

        $titulo="Verifique los datos";

        $msg="Esta agregando mas de la cantidad permitida, porfavor no ingrese mas de :".$stock_max;

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();

}

$verificar_pedidos=verificar_pedido_insumos_sin_confirmar($id_in);
$cantidad_pedidos=0;
if ($verificar_pedidos->num_rows>0) {

    while($filas_pedidos=mysqli_fetch_assoc($verificar_pedidos)){
        $cantidad_pedidos+=$filas_pedidos['cantidad_pe'];
    }
    
}
$total_in+=$cantidad_pedidos;
if ($stock_max<$total_in) {
    
        $titulo="Verifique los datos";

        $msg="Se esta esperando un pedidos de esté insumos <br> solicitar mas supera el limite:".$stock_max;

        $val=msg_interrogante($msg,$titulo);

        echo $val;

        exit();
}

   $actualizarizar_lista=actualizar_lista_compra($can_in,$costo_in,$id_lista);


   if($actualizarizar_lista == true){

        $titulo="correcto";

        $msg="Se ha actualizado la lista de compras";

        $val=msg_positivo($msg,$titulo);

        echo $val;

        

         if (isset($_POST['recargar'])) {
                 if ($_POST['recargar']==true) {
                 echo"<script>cerrar_ventana2(); buscar_insumo();ver_lista();</script>";

             }
         }

        exit();

   }else{

        $titulo="Error";

        $msg="Error al actualizar a lista";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();

   }
   
  
}else{

    $limite_insumo=verificar_insumo($id_in);

    $campo5='costo_in_com';

    $res_limite=mysqli_fetch_assoc($limite_insumo);

    $stock_max=$res_limite['stockmax'];

    $insumo_in=$res_limite['cantidad_in'];

    $total_in=$can_in+$insumo_in;

    if ($stock_max<$total_in) {

        $titulo="Error";

        $msg="Esta agregando mas de la cantidad permitida, no puede tener en existencia mas de :".$stock_max;

        $val=msg_error($msg,$titulo);

        echo $val;
        
        exit();

}
$verificar_pedidos=verificar_pedido_insumos_sin_confirmar($id_in);
$cantidad_pedidos=0;
if ($verificar_pedidos->num_rows>0) {

    while($filas_pedidos=mysqli_fetch_assoc($verificar_pedidos)){
        $cantidad_pedidos+=$filas_pedidos['cantidad_pe'];
    }
    
}
$total_in+=$cantidad_pedidos;
if ($stock_max<$total_in) {
        $titulo="Verifique los datos";

        $msg="Se esta esperando un pedidos de esté insumos <br> solicitar mas supera el limite:".$stock_max;

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();
}

    $agregar_lista=agregar_lista_compra($id_in,$can_in,$costo_in);


    if($agregar_lista == true){

        $titulo="correcto";

        $msg="El insumo se agregar a la lista de compras";

        $val=msg_positivo($msg,$titulo);

        echo $val;

        echo "<script>buscar_insumo();cerrar_ventana2();</script>";

        exit();


}else {
   //echo 'gg';
   //var_dump($comprobacion);
}


}



 ?>