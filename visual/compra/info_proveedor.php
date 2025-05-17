
<?php
require_once('../../conexion/conexion.php');
require_once('../../funciones_generales.php');
nivel_medio();
if (isset($_SESSION['proveedor1'])) {
	

$proveedor=verificar_proveedor_activo($_SESSION['proveedor1']);
if (!($proveedor->num_rows>0)) {

	limpiar_todo();
	echo"<script>setTimeout(function(){window.location.replace('http://localhost/facturacion/index.php?pagina=compras')},0);</script>";
exit();	
}
$msg=calcular_insumos_faltantes_agregar();
echo $msg;
?>
<div class='texto-principal margen-interno'>

	<section class="principal upper maxw">

		<h4 class="form-h4">Proveedor elegido</h4>

		<br>
		<?php 


		$filas1 = mysqli_fetch_assoc($proveedor);
$tipo="V";
if ($filas1['tipo_pro']==1) {
	$tipo="V";
}
if ($filas1['tipo_pro']==2) {
	$tipo="J";
}
if ($filas1['tipo_pro']==3) {
	$tipo="E";
}
if ($filas1['tipo_pro']==4) {
	$tipo="G";
}
if ($filas1['tipo_pro']==5) {
	$tipo="P";
}

		$salida_pro = "<table class='tablas'>
				<thead>
					<tr>
						<th>rif</th>
						<th style='min-width:300px;'>Nombre o razon social</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>";

				$salida_pro .= "
							<tr>
								<td style='padding:5px;'>".$tipo."-".$filas1['rif_pro']."-".$filas1['rif_2']."</td>
								<td style='padding:5px;'>".$filas1['nom_pro']."</td>";

							$salida_pro .= "<td>
									<input class='pushy__btn pushy__btn--md pushy__btn--red' type='button' id='boton1' name='boton1'value='cambiar' onclick='eliminar_proveedor()'></td>
									<td><input class='pushy__btn pushy__btn--md pushy__btn--blue' type='button' id='boton2' name='boton2' value='Lista' onclick='ventana_lista()'></td>
								</tr></div>";		
			
			$salida_pro .= "</tbody></table></div>";
			echo $salida_pro;
			echo "<script>buscar_insumos_compra();</script>"
		 ?>


	</label>
	</section>

</div>

<?php  
exit();
}

$msg=calcular_insumos_faltantes_msg();

echo $msg;

?>

<div class='texto-principal margen-interno'>

	<section class="principal upper">

		<h4 class="form-h4">Orden de compra</h4>

		<br>

		<p class="form-h4" style="font-size: 16px; font-weight: bold;">puede usar la barra de busqueda para encontrar un Proveedor en específico, <br> o puede usar la rueda del mouse sobre el formulario para ver mas Proveedores</p>
		<br>

		<h4 class="form-h4">buscar proveedor</h4>

		<label for="prove">

			<input class="controls_cortos" type="text" name="prove" id="prove" placeholder="Buscar proveedor...">

		</label>

		<div class="dope"  id="proveedor" name="proveedor"></div>

	</section>

</div>