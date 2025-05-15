<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=factura"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php
require_once('../../conexion/conexion.php');

require_once('../../funciones_generales.php');
verificar_nivel();


$lista = "";

$disponible=0;

$total =0;

$totaln=0;

$carrito=consultar_carrito();

$carrito1 =consultar_carrito();


/*
if (!($iva_en_uso->num_rows>0)) {
	echo "sin resultados";
}*/

$iva_usado=obtener_iva();

$obten_formas_pago=consultar_forma_pago();

if (!($carrito->num_rows > 0 )){
?>
<section class="principal upper margen">
<h4 class='form-h4 margen'>Carrito vacio</h4>
</section>
<?php
exit();
}

$filas1 = mysqli_fetch_assoc($carrito);

$tipo="v";
if ($filas1['tipo_cli']==1) {
	$tipo="V";

}
if ($filas1['tipo_cli']==2) {
	$tipo="J";

}
if ($filas1['tipo_cli']==3) {
	$tipo="E";
}
if ($filas1['tipo_cli']==4) {
	$tipo="G";
}
if ($filas1['tipo_cli']==5) {
	$tipo="P";
}
$cedula=$tipo."-".$filas1['cedula_rif']."-".$filas1['cedula_2'];
if ($filas1['tipo_cli']==6) {
$cedula=$filas1['cedula_rif'];
}

 ?>
			

	 	<section class="letra_small listado_t maxw margen" >

	 		<section class="principal upper">
	 			<h4 class="form-h4 margen">Clinte elegido</h4>
	 		</section>
 		

 		<table class="small" >
 			<thead>
 			<th>Cedula/ rif</th>
 			<th>Nombre</th><tr>
 		</thead>
 		<tbody class="letra_small_negras">
 		<tr>
 		<td><?php echo $cedula;?></td>
 		<td><?php echo $filas1['nom_cli'];?></td>
 		</tr>
 	</tbody>
 	</table>

		<section  class="lista small listado">
			
		
			<h4 class="form-h4">Carito de compras</h4> 
			
			<div>
			<table id="carrito" class="letra_small tablas" style="scroll-behavior: auto;">
		<thead >
			<tr>
			<th style="padding: 5px;">codigo</th>
			<th style="padding: 5px; width: 300px;" >Analisis</th>
			<th style="padding: 5px;">cantidad en espera</th>
			<th style="padding: 5px;">Precio unidad</th>
			<th style="padding: 5px;">Precio total</th>
			<th></th>
			<th></th>

			</tr>
		</thead>
	<tbody  class="letra_small_negras">

<?php 

$i=0; 

while ($filas = mysqli_fetch_assoc($carrito1)) { 

$i++;

$totalu=0;

$totalu =$filas['pre_an'] * $filas['can_car']; 

$totaln+= $totalu;?>

				<tr>

					<td style="padding: 5px;"><?php echo $filas['cod_an'];?></td>

					<td style="padding: 5px;" ><?php echo $filas['nom_an']?></td>

					<td style="padding: 5px;"><?php echo $filas['can_car'];?></td>

					<td style="padding: 5px;"><?php echo $filas['pre_an'].".Bs";?></td>

					<td style="padding: 5px;"><?php echo round($totalu,2).".Bs";?></td>

					<td><input class="pushy__btn2 pushy__btn2--md2 pushy__btn2--green2"type="button" name="editar" id="editar" value="editar" onclick='ventana_agregar("<?php echo $filas['id_an']; ?>")' ></td>
					<td>
						<input class="pushy__btn2 pushy__btn2--df2 pushy__btn2--red2" type="button" id="quitar" name="quitar" value="Quitar" onclick="quitar_carrito(<?php echo $filas['id_an'];?>)"/>
					</td>
				
			<?php 
		}

			 $iva=($totaln*$iva_usado)/100;

			 $total=$iva+$totaln;
			?>

			</tr>
	</tbody>

</table>

	<table class="small">

		<thead class="letra_small">
		
			<tr>

				<th>total neto</th>

				<th>iva</th>

				<th>Total a cobrar</th>

			</tr> 

		</thead>

		<tbody class="letra_small_negras">

			<tr>
				<td><?php echo round($totaln,2).".Bs"; ?></td>

				<td><?php echo round($iva,2)."Bs"; ?></td>

				<td><?php echo round($total,2).".Bs"; ?></td>

			</tr>

		</tbody>

	</table>

 </section>	

 </tbody>

 </table>

	</section>
<div id="aler"></div>

                        <script type="text/JavaScript" src="js/fw/jquery-3.6.0.min.js"></script>
                        <script type="text/JavaScript" src="js/fw/validate1.9.js"></script>
                        <script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>
                        <script type="text/javascript" src="js/fw/traduccion.js"></script>
                        <script type="text/JavaScript" src="js/proceso2/ventas.js"></script>
