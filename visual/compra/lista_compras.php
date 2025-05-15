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

$forma_pago2=consultar_forma_pago();
$forma_pago3=consultar_forma_pago();

if (!($lista_compras->num_rows > 0 )){

	echo "<script>cerrar_ventana();</script>";

	exit();
}

$iva=obtener_iva();

$verificar_costo=false;

 	?>
<section class="fondo_ventana letra_small listado_t" >


<script type="text/JavaScript" src="js/fw/jquery.min.js"></script>

<script type="text/javascript" src="js/fw/jquery.mask.js"></script>

<script type="text/javascript" src="js/fw/validate1.9.js"></script>

<script type="text/javascript" src="js/fw/traduccion.js"></script>

<script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>

<script type="text/JavaScript" src="js/proceso1/comprar.js"></script>

	<h4 class="form-h4n">Lista de compras</h4> 

	<section  class="lista small listado">
	
		<table  class="letra_small" style="scroll-behavior: auto;">

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

				<?php 	while ($filas = mysqli_fetch_assoc($lista_compras)) {$totalu=0;$totalu =$filas['costo_in_com'] * $filas['can_in_com']; $totalneto+= $totalu;
if ($filas['costo_in_com']==1) {
	$verificar_costo=true;
}
$total_deciamles=round($totalu, 2);
$totalu=$total_deciamles;
				?>


				<tr>

					<td><?php echo $filas['cod_in'];?></td>

					<td><?php echo $filas['nom_in']?></td>

					<td><?php echo $filas['cantidad_in'];?></td>

					<td><?php echo $filas['can_in_com'];?></td>

					<td><?php echo $filas['costo_in_com'].".Bs";?></td>

					<td><?php echo $totalu.".Bs";?></td>

					<td><input  class='pushy__btn pushy__btn--md pushy__btn--blue' type='button'  value='Editar'  onclick='ventana_agregar(<?php echo$filas['id_in']; ?>,true)'>
							</td>
				
			<?php }$iva_total=$totalneto*$iva/100;$total=$iva_total+$totalneto;?>

				</tr>

			</tbody>

	 	</table>

		 <table>

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

	 <form id="f_compras" name="f_compras" method='post'>
	<div style="height: 200px; overflow-y: scroll;">
	 	<p class="form-h4n">Fecha del pedido</p>
	 	
	 	<input class="controls_cortos" type="date" name="fecha" id="fecha" required>

	<p>cantidad de pagos a usar</p>
	<select class="controls_cortos" id="cantidad_formas_pago"  name="cantidad_formas_pago" onChange="ajustar_pagos_f()">
		<option value="">Selecione una forma de pago</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>

	</select>

	 	<p class="form-h4n">Forma de pago</p>

		<input type="hidden" name="total" id="total" value="<?php echo $total; ?>">

		<select class="controls_cortos" id="forma_pago" name="forma_pago" onChange="verificar_tipo_pago()">

			<option value="">Selecione una forma de pago</option>

			<?php while ($filas3=mysqli_fetch_assoc($comprobacion)){?>

			<option value="<?php echo$filas3['id_forma_pago']; ?>"><?php echo $filas3['nom_forma_pago']; ?></option>
			<?php } ?>

		</select>
	
	<p class="form-h4n">Referencia de pago</p>

	<input class="controls_cortos" type="text" maxlength="13"  minlength="13"name="referencia_com" id="referencia_com" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">

	<br>

		
<label id="pago2">
<p>cantidad n°1</p>
<input class="controls_cortos"   type="text" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" maxlength="13" minlength="13" name="cantidad_pagar1" id="cantidad_pagar1">
<br>

	 	<p class="form-h4n">Forma de pago n°2</p>


		<select class="controls_cortos" id="forma_pago2" name="forma_pago2" onChange="limpiar_referencia2()">

			<option value="">Selecione una forma de pago</option>

			<?php while ($filas_pago2=mysqli_fetch_assoc($forma_pago2)){?>

			<option value="<?php echo$filas_pago2['id_forma_pago']; ?>"><?php echo $filas_pago2['nom_forma_pago']; ?></option>
			<?php } ?>

		</select>
	
	<p class="form-h4n">Referencia de pago n°2</p>

	<input class="controls_cortos" type="text" maxlength="13"  minlength="13"name="referencia2" id="referencia2" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">

	<br>	
<p>cantidad n°2</p>
<input class="controls_cortos"   type="text" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" maxlength="13" minlength="13" name="cantidad_pagar2" id="cantidad_pagar2">
<br>
</label>

<label id="pago3">

	 	<p class="form-h4n">Forma de pago n°3</p>


		<select class="controls_cortos" id="forma_pago3" name="forma_pago3" onChange="limpiar_referencia3()">

			<option value="">Selecione una forma de pago</option>

			<?php while ($filas_pago3=mysqli_fetch_assoc($forma_pago3)){?>

			<option value="<?php echo$filas_pago3['id_forma_pago']; ?>"><?php echo $filas_pago3['nom_forma_pago']; ?></option>
			<?php } ?>

		</select>
	
	<p class="form-h4n">Referencia de pago n°3</p>

	<input class="controls_cortos" type="text" maxlength="13"  minlength="13"name="referencia3" id="referencia3" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">

	<br>	
<p>cantidad n°3</p>
<input class="controls_cortos"   type="text" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" maxlength="13" minlength="13" name="cantidad_pagar3" id="cantidad_pagar3">
<br>
</label>




	</div>

	<input class="pushy__btn2 pushy__btn2--md2 pushy__btn2--blue2" type='button' id="comprar" name="comprar" value='Comprar'>

	<input class="pushy__btn2 pushy__btn2--md2 pushy__btn2--blue2" type="button" id="volver" name="volver" value="Volver" onclick="cerrar_ventana()">
	</form> 

</section>
<script type="text/javascript">
		$(document).ready(function($){
	$('#cantidad_pagar1').mask('##0.00', {reverse: true});
	$('#cantidad_pagar2').mask('##0.00', {reverse: true});
	$('#cantidad_pagar3').mask('##0.00', {reverse: true});
	});
</script>

<?php
if (!isset($_SESSION['ya'])) {
	

if ($verificar_costo==true) {
	$_SESSION['ya']=true;
	$titulo="Ajuste de precios";

	$msg="Recuerde ajustar los precios";

	$valor=msg_interrogante($msg,$titulo);

	echo $valor;

	exit();	
}
$_SESSION['ya']=true;
}else{
	$_SESSION['ya']=null;
}
 ?>

