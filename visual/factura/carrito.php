<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=factura"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
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
$obten_formas_pago2=consultar_forma_pago();
$obten_formas_pago3=consultar_forma_pago();
if ($carrito->num_rows > 0 ){

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
 	

<script type="text/JavaScript" src="js/fw/jquery.min.js"></script>

<script type="text/javascript" src="js/fw/jquery.mask.js"></script>

<script type="text/javascript" src="js/fw/validate1.9.js"></script>

<script type="text/javascript" src="js/fw/traduccion.js"></script>
	
<script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>

<script type="text/JavaScript" src="js/proceso2/ventas.js"></script>	
		
			

	 	<section class="fondo_ventana letra_small listado_t" >
 		<h4 class="form-h4n">Cleinte elegido</h4>

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
			
		
			<h4 class="form-h4n">Carito de compras</h4> 
			
			<div>
			<table id="carrito" class="letra_small tablas" style="scroll-behavior: auto;">
		<thead >
			<tr>
			<th style="padding: 5px;">codigo</th>
			<th style="padding: 5px; width: 300px;">Analisis</th>
			<th style="padding: 5px;">cantidad en espera</th>
			<th style="padding: 5px;">Precio unidad</th>
			<th style="padding: 5px;">Precio total</th>
			<th></th>

			</tr>
		</thead>
		<tbody  class="letra_small_negras">
			<?php $i=0; 	while ($filas = mysqli_fetch_assoc($carrito1)) { $i++;
				$totalu=0;
		$totalu =$filas['pre_an'] * $filas['can_car']; $totaln+= round($totalu, 2);?>

			<tr>
				<td><?php echo $filas['cod_an'];?></td>
				<td><?php echo $filas['nom_an']?></td>
				<td><?php echo $filas['can_car'];?></td>
				<td><?php echo $filas['pre_an'].".Bs";?></td>
				<td><?php echo round($totalu,2).".Bs";?></td>
				<td><input class="pushy__btn2 pushy__btn2--md2 pushy__btn2--green2"type="button" name="editar" id="editar" value="editar" onclick='ventana_agregar("<?php echo $filas['id_an']; ?>",true)' ></td>
			
		<?php }
		 $iva=($totaln*$iva_usado)/100;
		 $total=round($iva+$totaln, 2);
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
		<td><?php echo  round($total,2).".Bs"; ?></td>
	</tr>
</tbody>
</table>
 </section>		
<td>
<div style="height: 200px; overflow-y: scroll;">
	<form  id="factura" name="factura" method='post'>
	<p>cantidad de pagos a usar</p>
	<select class="controls_cortos" id="cantidad_formas_pago" style="width: 250px;" name="cantidad_formas_pago" onChange="ajustar_pagos_j()">
		<option value="" >Selecione una forma de pago</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>

	</select>
<label >
	<p>forma de pago n°1</p>
	<select class="controls_cortos" id="tipo_pago" style="width: 250px;" name="tipo_pago" onChange="verificar()">
		<option value="" >Selecione una forma de pago</option>
		<?php while ($filas_pago=mysqli_fetch_assoc($obten_formas_pago)) {?>
		<option id="opcion" name="opcion" value="<?php echo$filas_pago['id_forma_pago']; ?>"

		><?php echo $filas_pago['nom_forma_pago']; ?></option>
		<?php } ?>
	</select>

<p>referencia n°1</p>
<input class="controls_cortos" style="width: 250px;"  type="text" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" maxlength="13" minlength="13" name="referencia" id="referencia">
<br>

</label>
<label id="pago2" class="modal-container">
<p>cantidad n°1</p>
<input class="controls_cortos" style="width: 250px;"  type="text" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" maxlength="13" minlength="13" name="cantidad_pagar1" id="cantidad_pagar1">
<br>
	<p>forma de pago n°2</p>
	<select class="controls" id="tipo_pago2" style="width: 250px;" name="tipo_pago2" onChange="limpiar_referencia2()">
		<option value="">Selecione una forma de pago</option>
		<?php while ($filas_pago=mysqli_fetch_assoc($obten_formas_pago2)) {?>
		<option id="opcion" name="opcion" value="<?php echo$filas_pago['id_forma_pago']; ?>"

		><?php echo $filas_pago['nom_forma_pago']; ?></option>
		<?php } ?>
	</select>

<p>Refencia de pago n°2</p>
<input class="controls" style="width: 250px;"  type="text" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" maxlength="13" minlength="13" name="referencia2" id="referencia2">
<br>
<p>cantidad n°2</p>
<input class="controls_cortos" style="width: 250px;"  type="text" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" maxlength="13" minlength="13" name="cantidad_pagar2" id="cantidad_pagar2">
<br>	
</label>
<label id="pago3" class="modal-container">
		<p>forma de pago n°3</p>
	<select class="controls_cortos" id="tipo_pago3" style="width: 250px;" name="tipo_pago3" onChange="limpiar_referencia3()">
		<option value="">Selecione una forma de pago </option>
		<?php while ($filas_pago=mysqli_fetch_assoc($obten_formas_pago3)) {?>
		<option id="opcion" name="opcion" value="<?php echo$filas_pago['id_forma_pago']; ?>"

		><?php echo $filas_pago['nom_forma_pago']; ?></option>
		<?php } ?>
	</select>

<p>Refencia de pago n°3</p>
<input class="controls_cortos" style="width: 250px;"  type="text" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" maxlength="13" minlength="13" name="referencia3" id="referencia3">
<br>
<p>cantidad n°3</p>
<input class="controls_cortos" style="width: 250px;"  type="text" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" maxlength="13" minlength="13" name="cantidad_pagar3" id="cantidad_pagar3">
<br>
</label>
</div>
<input class="pushy__btn2 pushy__btn2--md2 pushy__btn2--green2" type='button' id="vender" name="vender" value='Vender'>

<input class="pushy__btn2 pushy__btn2--md2 pushy__btn2--blue2" type="button" id="volver" name="volver" value="Volver" onclick="cerrar_ventana()">

</form></td>
 </tbody>
 </table>

	</section>
<div id="aler"></div>

<script type="text/javascript">
		$(document).ready(function($){
	$('#cantidad_pagar1').mask('##0.00', {reverse: true});
	$('#cantidad_pagar2').mask('##0.00', {reverse: true});
	$('#cantidad_pagar3').mask('##0.00', {reverse: true});
	});
</script>
 	<?php 
 }
 
 else {
 	echo "<script>cerrar_ventana();</script>";
	    //echo "<script>window.location.replace('factura.php');</script>";
}
?>