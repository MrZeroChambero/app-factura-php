<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=consulta_factura"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once('../conexion/conexion.php');

require_once('../funciones_generales.php');
nivel_maximo();
  $titulo="Error";

  $msg="Verifique los datos";

  $val=msg_error($msg,$titulo);

if (!isset($_POST['id_fac'])) {


  echo $val;

  exit();
}

if (empty(trim($_POST['id_fac']))) {



   echo $val;

  exit();
}
if (!filter_var($_POST['id_fac'],FILTER_VALIDATE_INT)) {

  echo $val;

  exit();
}

$id_fac1=trim($_POST['id_fac']);

$id_fac=$conexion->real_escape_string($id_fac1);

$conexion->close();

$buscar_factura=$buscar_factura=verificar_factura($id_fac);

if (!($buscar_factura->num_rows>0)) {

  $titulo="Error";

  $msg="Error no se ha encotrado la factura";

  $val=msg_error($msg,$titulo);

  echo $val;

  exit();
}

$resultado_fac=mysqli_fetch_assoc($buscar_factura);

$estado_fac=$resultado_fac['estado_fac'];

if ($estado_fac==false) {

  $titulo="Factura anulada";

  $msg="Esta Factura ya se encuentra anulada";

  $val=msg_interrogante($msg,$titulo);

  echo $val;

  exit();

}	
		$anular_fac=anular_factura($id_fac);

if ($anular_fac == false) {

  $titulo="Error";

  $msg="Error al anular la factura";

  $val=msg_error($msg,$titulo);

  echo $val;

  exit();

}

  $msg2="";

if ($estado_fac == 2) {

  $gastos=devolver_inventario($id_fac);

  $msg2="<br> Se han devuelto al inventario los insumos usados";

  if ($gastos == false) {
    $msg2="<br>Error al devolver al inventario";
  }


}

  $titulo="Correcto";

  $msg="La factura se a anulado".$msg2;

  $val=msg_positivo($msg,$titulo);

  echo $val;

  exit();

?>