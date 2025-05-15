<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=factura"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once('../conexion/conexion.php');

require_once('../funciones_generales.php');

verificar_nivel();
if (isset($_POST['quitar_carrito'])) {
  
		$analisis=$_POST['quitar_carrito'];

		$titulo="Error";

		$msg="No se encuntra agregado";

        $val=msg_error($msg,$titulo);

        				

		  if (empty(trim($analisis))) {

        		echo $val;

				if (isset($_POST['val']) and $_POST['val'] == true) {

				  echo "<script>ver_carrito();</script>";

				}
				 
				  exit();
		  }

		  if (!filter_var($analisis,FILTER_VALIDATE_INT)) {

        		echo $val;

       			if (isset($_POST['val']) and $_POST['val'] == true) {

				  echo "<script>ver_carrito();</script>";

				}
				 
				  exit();


		}

		  $verificar_carrito=$conexion->query("SELECT * FROM carrito where id_an_car = '{$analisis}'");

		  if (!($verificar_carrito->num_rows>0)) {

				echo $val;

				exit();
		  }



       	$cliente = $_SESSION['cliente'];

        $cantidad=buscar_carrito($cliente,$id_an);

        $obtener_datos=mysqli_fetch_assoc($cantidad);

        $can = 0;

		quitar_analisis($analisis);

		gestionar_insumos_temporal();

		$titulo2="Removido";

		$msg2="El analisis ha sido quitado del carrito";

        $val=msg_positivo($msg2,$titulo2);

        echo $val;

        echo $obtener_datos;

		 if (isset($_POST['val']) and $_POST['val'] == true) {

		  echo "<script>cerrar_ventana2(); ver_carrito();</script>";

		}

		exit();

} else {

patucasa();

exit();

}

 ?>