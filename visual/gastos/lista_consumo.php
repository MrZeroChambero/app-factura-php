
<?php 
require_once("../../conexion/conexion.php");
require_once("../../funciones_generales.php");
nivel_medio();
$consumo_sin_confirmar=consumo_sin_confirmar();
              $msg="No hay facturas para confirmar";

              $titulo="Vacio";

              $val=msg_interrogante($msg,$titulo);


if (!($consumo_sin_confirmar->num_rows>0)) {     

	echo $val;

	echo "<script>cerrar_ventana();</script>";
exit();	
}
 ?>

 	
<section class="fondo_ventana letra_small listado_t" >	
<div  class="lista small listado" style="scroll-behavior: auto;">	
	<table>
	<thead>
		<tr>
			<th style="min-width: 35px;">
				<p >Nª <br> factura</p>
			</th>
			<th style="min-width: 200px;">
				<p >Realizada por:</p> 
			</th>
			<th style="min-width: 60px;">
			<p  > fecha de <br> elaboracion</p>	
			</th>
			<th style="min-width: 35px;"></th>

		</tr>
	</thead>
	<tbody class="letra_small_negras">
						<?php
			while($filas=mysqli_fetch_assoc($consumo_sin_confirmar)){
				$fecha=date("d/m/Y", strtotime($filas['fecha_fac']));
				?>
				<tr>
				<td style="min-width: 35px;">
					<p><?php echo $filas['id_fac']; ?></p>
				</td>
				<td style="min-width: 200px;">
					<p><?php echo $filas['nom_us']; ?></p>
				</td>
				
				<td  style="min-width: 60px;">
					<p><?php echo $fecha; ?></p>
				</td>
				<td>
					 <p ><input class='pushy__btn pushy__btn--md pushy__btn--green' type="button" name="elejir" value="confimar" onclick="verificar_consumo(<?php echo $filas['id_fac']; ?>)"> </p>
				</td>
				</tr>
			<?php	
			} 
			 ?>
		</tbody>
	</table>

</div>

<input class='pushy__btn pushy__btn--md pushy__btn--blue' type="button" value="volver" onclick="cerrar_ventana()">
</section>
