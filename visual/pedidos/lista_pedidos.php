<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
nivel_medio();
$pedido_sin_confirmar=consultar_pedidos_sin_confirmar();

if (!($pedido_sin_confirmar->num_rows>0)) {

	echo "<script>cerrar_ventana();</script>";

exit();	

}
?>

 	
<section class="fondo_ventana letra_small listado_t " >		
		<section  class="lista small listado" style="max-height: 200px;">
	
		<table  class="letra_small" style="scroll-behavior: auto;">
	<thead>
		<tr>
			<th style="min-width: 60px;">
				<p style="min-width: 30px;">Nª <br> compra</p>
			</th>
			<th style="min-width: 200px;">
				<p style="min-width: 200px;">Realizada por:</p> 
			</th>
			<th style="min-width: 30px;">
			<p  style="min-width: 50px;"> fecha de <br> elaboracion</p>	
			</th>
				<th style="min-width: 30px;">
	
			</th>
			

		</tr>
	</thead>
	<tbody class="letra_small_negras">
		
		
						<?php
			while($filas=mysqli_fetch_assoc($pedido_sin_confirmar)){

				$fecha=date("d/m/Y", strtotime($filas['fecha_com']));
				?>
				<tr>
				<td style="min-width: 70px;">
					<p ><?php echo $filas['id_compra']; ?></p>
				</td>
				<td style="min-width: 200px;">
					<p ><?php echo $filas['nom_us']; ?></p>
				</td>
				
				<td  style="min-width: 50px;">
					<p><?php echo $fecha; ?></p>
				</td>
				<td>
					 <p style="width: 10%;"><input class='pushy__btn pushy__btn--md pushy__btn--green' type="button" name="elejir" value="confimar" onclick="verificar_pedido(<?php echo $filas['id_compra']; ?>)"> </p>
				</td>
				</tr>
			<?php	
			} 
			 ?>
		
	
		
	</tbody>
	</table>
</section>

<input class='pushy__btn pushy__btn--md pushy__btn--blue' type="button" value="volver" onclick="cerrar_ventana()">
</section>
