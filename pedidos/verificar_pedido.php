<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=pedidos"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once('../conexion/conexion.php');
require_once('../funciones_generales.php');
nivel_medio();
        $titulo="Error";

        $msg="Verifique los datos";

        $val=msg_error($msg,$titulo);
if (!isset($_POST['confirmar'])) {

echo $val;

	exit();

}
if (empty(trim($_POST['confirmar']))) {

echo $val;

	exit();

}

$q=$_POST['confirmar'];

if (!filter_var($_POST['confirmar'],FILTER_VALIDATE_INT)) {
echo $val;

	exit();

}

$confirmar=$_POST['confirmar'];

$verificar_compra=verificar_compra_activa($confirmar);

if (!($verificar_compra->num_rows>0)) {
echo $val;
	exit();

}

$filas=mysqli_fetch_assoc($verificar_compra);

if ($filas['estado_compra'] == 0) {
echo $val;
exit();	

}

$estado=2;
//acomodar estados compra




$obetener_pedidos=obetener_pedidos_informacion($q);
/*
  $orden_de_compras=verificar_compra_activa($id_compra);

  $filas_compra=mysqli_fetch_assoc($orden_de_compras);

  $estado_compra=$filas_compra['estado_compra'];

*/

while ($filas=mysqli_fetch_assoc($obetener_pedidos)) {

  $id_in=$filas['id_in_pe'];

  $id_pedido=$filas['id_pedidos'];

  $estado_pedido=$filas['estado_pe'];

  $obtener_detalles=buscar_detalles_compra($confirmar,$id_in);

  if (!($obtener_detalles->num_rows>0)) {

    $titulo="Error";

    $msg="Error Verifique los datos";

    $val=msg_error($msg,$titulo);

    echo $val;
  
    exit();
  }
  
  $filas_compra=mysqli_fetch_assoc($obtener_detalles);

  $cantidad=$filas['cantidad_in'];

  $pedido=$filas['cantidad_pe'];

  $cantidad_actual=$cantidad+$pedido;

  $estado_pedido=$filas['estado_pe'];



$pedidos_ya_confirmados=contar_pedidos_insumos_compra($q,$id_in);

if ($pedidos_ya_confirmados->num_rows>0) {

      while($filas_confrimados=mysqli_fetch_assoc($pedidos_ya_confirmados)){

      $pedido+=$filas_confrimados['cantidad_pe'];
    }

}
/*var_dump($pedido);*/

  if ($filas_compra['can_in_det']>$pedido and $estado_pedido==6) {
    

  
      $cantidad_faltante=$filas_compra['can_in_det']-$pedido;


      $fecha=$filas['fecha_pedido'];

      $usuario=$_SESSION['id_us'];

      $crear_faltante=crear_pedidos($id_in,$cantidad_faltante,$fecha,$usuario,$confirmar);

      if ($crear_faltante==false) {

    $titulo="Error";

    $msg="Ocurrio un problema la crear el pedidos restante";

    $val=msg_error($msg,$titulo);

    echo $val;
  
    exit();
        
      }
  
    }



  




if ($estado_pedido == 5) {

  $estado_actual=2;


}else if ($estado_pedido == 4){


  $estado_actual=7;

}else if ($estado_pedido == 3) {

  $estado_actual=1;
  
} else if ($estado_pedido==1) {

  $estado_actual=2;
}else if ($estado_pedido == 6) {

   $estado_actual=2;

}else if ($estado_pedido == 0) {

  $estado_actual=0;

}else{

  $estado_actual=0;
}

  if ($estado_actual!=0) {
    if ($estado_actual==7) {
      $estado_actual=0;
    }
    
      $actualizar_estado_pedido=actualizar_pedidos_estado($id_pedido,$estado_actual);

      if ($actualizar_estado_pedido == false) {

              $titulo="Error";

              $msg="Error al actualizar el pedidos";

              $val=msg_error($msg,$titulo);

              echo $val;
        
        exit();
        
      }

      if ($estado_actual==2) {

                  $actualizar_inventario=sumar_inventario($id_in,$cantidad_actual);

                  if ($actualizar_inventario != true) {


                          $titulo="Error";

                          $msg="Error al actualizar el inventario";

                          $val=msg_error($msg,$titulo);

                          echo $val;
                    
                    exit();
                  }

        if ($filas['cod_in']==1) {
          $unidad=".unidad/s";
        }else{
          $unidad=".mililitro/s";
        }

        $campo="Cantidad:".$pedido.$unidad;

        $codigo="Codigo de insumo:".$filas['cod_in'];

        $registro="Pedidos";

        $accion="Han sido recibido";

        auditoria($registro,$accion,$campo,$codigo);

        $campo="Cantidad:".$pedido.$unidad;

        $codigo="Codigo:".$filas['cod_in'];

        $registro="Insumos";

        $accion="Han sido aumentado el stock";

        auditoria($registro,$accion,$campo,$codigo);



              }

  }




}
$conexion=conectar();
$verificar_si_quedan_pedidos=$conexion->query("SELECT * FROM compra,pedidos WHERE id_compra_pe = id_compra and id_compra= '{$q}' and estado_pe !=0 and estado_pe !=2");

if (!($verificar_si_quedan_pedidos->num_rows>0)) {
  

$actualizar_compra=confirmar_compra($confirmar);

if ($actualizar_compra==false) {

  $titulo="Error";

  $msg="Error al guardar los cambios";

  $val=msg_positivo($msg,$titulo);

  echo $val;

  exit();

}

}
        $titulo="correcto";

        $msg="Se han guardados los cambios";

        $val=msg_positivo($msg,$titulo);

        echo $val;

		echo"<script>cerrar_ventana2();</script>";

	exit();


 ?>
