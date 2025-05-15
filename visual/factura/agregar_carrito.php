<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=factura"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
verificar_nivel();
              $titulo="Error";

              $msg="Si sigue viendo este mensaje recargue la pagina porfavor";

              $val=msg_error($msg,$titulo);


if (!isset($_POST['id_an_car'])) {

	echo $val;

	echo"<script>cerrar_ventana2();lista_analisis();</script>";

	exit();

	}
if (empty(trim($_POST['id_an_car']))) {

	echo $val;

		echo"<script>cerrar_ventana2();lista_analisis();</script>";

	exit();
}
if (!filter_var($_POST['id_an_car'],FILTER_VALIDATE_INT)) {



	echo $val;

		echo"<script>cerrar_ventana2();lista_analisis();</script>";

	exit();
}

	$q=$conexion->real_escape_string($_POST['id_an_car']);

	$disponible=0;

	$can_ag=0;

	$query_analisis=verificar_analisis($q);

	if (!($query_analisis->num_rows>0)) {

	          $titulo="No disponible";

              $msg="No hay insumos suficiente para la realización";

              $val=msg_error($msg,$titulo);


	echo $val;
	echo"<script>cerrar_ventana2();lista_analisis();</script>";
	exit();
	}

$disponible=servicios_disponibles($q);

	$cantidad_carrito=validar_carrito($q);
	
	if ($cantidad_carrito->num_rows>0) {

		$filas_carrito=mysqli_fetch_assoc($cantidad_carrito);

		$can_ag=$filas_carrito['can_car'];

	}
/*
if($disponible<1) {



	echo $val;

		echo"<script>cerrar_ventana2();lista_analisis();</script>";

	exit();
		
}*/

$filas_analisis = mysqli_fetch_assoc($query_analisis);

/*if (isset($_POST['val'])) {

	$var=$_POST['val'];
		
	}	
	*/
 	?>


<script type="text/JavaScript" src="js/fw/jquery.min.js"></script>

<script type="text/javascript" src="js/fw/jquery.mask.js"></script>

<script type="text/javascript" src="js/fw/validate1.9.js"></script>

<script type="text/javascript" src="js/fw/traduccion.js"></script>
	
<script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>

<script type="text/JavaScript" src="js/fw/tildes.js"></script>	

<section class="fondo_ventana" style=" width: 100%; color: black; border-radius: 10px; ">			


			<h4 class="form-h4n">Agregar a carrito</h4> 
			<label for="carrito">
			<div>
			<table class="tablas" id="carrito">
		<thead>
			<tr>
				<th>codigo</th>
				<th width="300px">Nombre</th>
				<th>carrito</th>
				<th>precio</th>
				<th>disponible</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $filas_analisis['cod_an'];?></td>
				<td><?php echo $filas_analisis['nom_an'];?></td>
				<td><?php echo $can_ag; ?></td>
				<td><?php echo $filas_analisis['pre_an'];?></td>
				<td><?php echo $disponible; ?></td>
			</tr>
</tbody>
</table>


<form name="agrega_an" id="agregar_an" method="post">
	<h4 class="form-h4n"> Cantidad a agregar</h4>
	
<section style='color: white;'> 
<input type="text" maxlength="10" name="documento" style="width: 250px;" id="can_ag_an" name="can_ag_an"  class="controls"
              required autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" min="1" <?php if ($can_ag>0) { echo "value='".$can_ag."'";
              	
              } ?> />
</section>
	


<input type="hidden" name="id_an_fac" id="id_an_fac" value="<?php echo $filas_analisis['id_an']; ?>"/>
<br>
		<input class="pushy__btn2 pushy__btn2--df2 pushy__btn2--green2" type="button" id="agregar" name="agregar"  value="Agregar" onclick="agregar_carrito(<?php echo $filas_analisis['id_an']; if (isset($var)) {echo ",".$var;} ?>)"/>
		<input class="pushy__btn2 pushy__btn2--df2 pushy__btn2--red2" type="button" id="quitar" name="quitar" value="Quitar" onclick="quitar_carrito(<?php echo $filas_analisis['id_an']; if (isset($var)) { echo ",".$var;}  ?>)"/>
		<input class="pushy__btn2 pushy__btn2--df2 pushy__btn2--blue2" type="button"  id="volver" name="volver" value="volver" onclick="cerrar_ventana2()">
</form>

</label>

</section>
<section id="aler2"></section>
</section>


                       
</div>	
</header><!-- /header -->

    </div></body>
</html>
