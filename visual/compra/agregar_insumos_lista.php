<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=compras"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php
require_once('../../conexion/conexion.php');
require_once('../../funciones_generales.php');

nivel_medio();
$costo_in1="";
$costo_in2="";

/*echo "<input class='pushy__btn pushy__btn--md pushy__btn--blue' type='button' value='Volver' onclick='cerrar_ventana2()'>";*/
if (!isset($_POST['insumo_elegido'])) {
	echo "<script>window.location.replace('error404.php');</script>";
	exit();}
	$q=$conexion->real_escape_string($_POST['insumo_elegido']);
	if (!filter_var($q,FILTER_VALIDATE_INT)) {


		 echo "<script>window.location.replace('compras.php');</script>";  	
		 exit();
	}
	$cantidad_lista_mostrar=0;
	$buscar_insumo=verificar_insumo_activo($q);

	if (!($buscar_insumo->num_rows>0)) {

	echo "<script>cerrar_ventana2();</script>";
	  exit();
	}
		$filas = mysqli_fetch_assoc($buscar_insumo);

		$buscar_lista=verificar_insumo_lista_compra($q);

		if ($filas['unidad_medicion']==1) {
			$unidad=".U";
		}else{
			$unidad=".ML";
		}
		
	
	    if ($buscar_lista->num_rows>0) {

	    	$filas1=mysqli_fetch_assoc($buscar_lista);

	    	$costo_in_lista=$filas1['costo_in_com'];

	    	$cantidad_lista=$filas1['can_in_com'];
	    	$cantidad_lista_mostrar=round($cantidad_lista,2);

	if ($filas['unidad_medicion']==2) {

	    	$valores=explode('.', $cantidad_lista);

			if(count($valores)>1){

				if (strlen($valores[1])==1) {
					$cantidad_lista.="0";
				}
			}
			if (count($valores)==1) {
				$cantidad_lista.="00";
			}
}
			$id_lista=$filas1['id_lista_compra'];
	    }
	    if (!isset($cantidad_lista)) {

	    	$cantidad_lista=0;

	    }
		    if (isset($costo_in_lista)) {

	    		$costo_in=$costo_in_lista;

    		$costo_in1=$costo_in_lista;

	    		/*$costo_in2=($costo_in_lista-$costo_in1)*100;*/
	    }else{

	    	$costo_in="Sin definir";

	    }
	    if (!isset($_POST['lista'])) {

	    	$lista=false;
	    	
	    }else{

		$lista=$_POST['lista'];

	    }
	$verificar_pedidos=verificar_pedido_insumos_sin_confirmar($_POST['insumo_elegido']);

if ($verificar_pedidos->num_rows>0) {

$cantidad_pedidos=0;

    while($filas_pedidos=mysqli_fetch_assoc($verificar_pedidos)){

        $cantidad_pedidos+=$filas_pedidos['cantidad_pe'];
    }
}else{
$cantidad_pedidos=0;
}

?>
<script type="text/JavaScript" src="js/fw/jquery.min.js"></script>

<script type="text/javascript" src="js/fw/jquery.mask.js"></script>

<script type="text/javascript" src="js/fw/validate1.9.js"></script>

<script type="text/javascript" src="js/fw/traduccion.js"></script>
 	
<section class="fondo_ventana"> 	

	<section  class="lista small" style="height: min-content;">

	<h4 class="form-h4n">Agregar insumo</h4> 
			

		<table id="carrito" class="tablas listado2">

			<thead>

				<tr>
					<th>codigo</th>
					<th style="min-width:300px;">Nombre</th>
					<th>disponible</th>
					<th>Cantidad en lista</th>
					<th>costo</th>
					<th>stock maximo</th>
					<th>En esepera</th>
				</tr>

			</thead>

			<tbody>

				<tr>
					<td><?php echo $filas['cod_in'];?></td>
					<td><?php echo $filas['nom_in']?></td>
					<td><?php echo $filas['cantidad_in'].$unidad;?></td>
					<td><?php echo $cantidad_lista_mostrar.$unidad;?></td>
					<td><?php echo $costo_in;?></td>
					<td><?php echo $filas['stockmax'];?></td>
					<td><?php echo $cantidad_pedidos;?></td>
				</tr>

			</tbody>

		</table>

	</section>


	<form style='color: white;' name="agrega_in" id="agregar_in" method="post">

	<p>costo</p>

	

	<input  type="text" maxlength="11" name="costo_in"   id="costo_in"  class="controls_cortos" autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" value="<?php echo $costo_in1; ?>">


	

	<br>

	<p>Cantidad a agregar</p>

	<?php 
if ($filas['unidad_medicion']==1) {?>

<input type="text" maxlength="11" name="can_ag_in" required id="can_ag_in"   class="controls_cortos" autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" <?php if (isset($cantidad_lista)) {echo "value=".$cantidad_lista."";} ?>>
<script type="text/javascript"> 

		document.getElementById("can_ag_in").addEventListener("input", (e) => {

		let value =e.target.value;

		e.target.value = value.replace(/[^0-9, '']/g, "");});
</script>

	<?php }else {?>

	 <input type="text" maxlength="11" name="can_ag_in2" required id="can_ag_in2"   class="controls_cortos" autocomplete="off"   <?php if (isset($cantidad_lista)) {echo "value=".$cantidad_lista."";} ?>  onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">

<script type="text/javascript">
	$(document).ready(function($){
	$('#can_ag_in2').mask('##0.00', {reverse: true});
	});

		document.getElementById("can_ag_in2").addEventListener("input", (e) => {

		let value =e.target.value;

		e.target.value = value.replace(/[^0-9., '']/g, "");});

</script>
<?php } ?>
	 	<br>


		<input class="pushy__btn pushy__btn--md pushy__btn--green" type="button" id="agregar" name="agregar"  value="Agregar" onclick="agregar_lista( <?php echo $filas['id_in']; ?><?php if ($lista == true) { echo ",".$lista.",";} echo $filas['unidad_medicion'];?>)">



		<input class="pushy__btn pushy__btn--md pushy__btn--red" type="button" id="quitar" name="quitar" value="Quitar" onclick="quitar_lista( <?php if (isset($id_lista)) {echo $id_lista.",".$lista;}else {echo"false";} ?> )">

		<input class="pushy__btn pushy__btn--md pushy__btn--blue" type="button" value="Volver" onclick="cerrar_ventana2()">
	
	</form>

</section>

<script type="text/javascript"> 
/**/
$(document).ready(function($){
$('#costo_in').mask('##0.00', {reverse: true});
});


  document.getElementById("costo_in").addEventListener("input", (e) => {

  	let value = e.target.value;

  	e.target.value = value.replace(/[^0-9., '']/g, "");});

</script>

