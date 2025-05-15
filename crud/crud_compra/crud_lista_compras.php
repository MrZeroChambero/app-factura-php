<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=compras"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>

<?php
require_once('../../conexion/conexion.php');
require_once('../../funciones_generales.php');
nivel_medio();
$lista = "";

$total =0;

$totalneto=0;

$proveedor=$_SESSION['proveedor1'];

$lista_compras=lista_compras_proveedor($proveedor);

$comprobacion=consultar_forma_pago();

if (isset($_POST['consulta'])) {

	$q=$conexion->real_escape_string($_POST['consulta']);

	$lista_compras=lista_compras_buscar($proveedor,$q);
}

if (!($lista_compras->num_rows > 0 )){

	echo "<h4 class='form-h4'>no se encuentran datos</h4>";

	exit();
}
$conexion->close();

$iva=obtener_iva();
?>
<section  class="lista small listado2">
	
		<table  class="letra_small tablas" >

			<thead>

				<tr>

					<th>codigo</th>

					<th width="320px">Nombre</th>

					<th>cantidad actual</th>

					<th>cantidad agregar</th>

					<th>costo unidad</th>

					<th>costo total</th>

					<th></th>

				</tr>

			</thead>

			<tbody class="letra_small_negras">

				<?php 	while ($filas = mysqli_fetch_assoc($lista_compras)) {$totalu=0;$totalu =$filas['costo_in_com'] * $filas['can_in_com']; $totalneto+= $totalu;?>


				<tr>

					<td><?php echo $filas['cod_in'];?></td>

					<td><?php echo $filas['nom_in']?></td>

					<td><?php echo $filas['cantidad_in'];?></td>

					<td><?php echo $filas['can_in_com'];?></td>

					<td><?php echo $filas['costo_in_com'].".Bs";?></td>

					<td><?php echo round($totalu,2).".Bs";?></td>

					<td><input  class='pushy__btn pushy__btn--md pushy__btn--blue' type='button'  value='Editar'  onclick='ventana_agregar(<?php echo$filas['id_in']; ?>,false)'>
							</td>
				
			<?php }$iva_total=$totalneto*$iva/100;$total=$iva_total+$totalneto;?>

				</tr>

			</tbody>

	 	</table>

		 <table class="tablas">

		 	<thead>

		 		<tr>

					<th>gasto neto total</th>

					<th>iva</th>

					<th>gasto total</th>

		 		</tr>

		 	</thead>

		 	<tbody class="letra_small_negras">

		 		<tr>

				<td><?php echo round($totalneto,2).".Bs"; ?></td>

				<td><?php echo round($iva_total,2).".Bs";?></td>

				<td><?php echo round($total,2).".Bs"; ?></td>

		 		</tr>

		 	</tbody>

		 </table>

	</section>