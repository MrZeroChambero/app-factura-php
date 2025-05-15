<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=compras"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>

<?php
require_once('../../conexion/conexion.php');
require_once('../../funciones_generales.php');
if (!isset($_SESSION['proveedor1'])){
exit();	
}
if (empty(trim($_SESSION['proveedor1']))) {
exit();		
}
$proveedor=verificar_proveedor_activo($_SESSION['proveedor1']);
if (!($proveedor->num_rows>0)) {
	echo"limpiar procesos y recargar la pagina";
exit();	
}
?>

<div class='texto-principal margen-interno'>

	<section class="principal upper maxw">

		<p class="form-h4" style="font-size: 16px; font-weight: bold;">puede usar la barra de busqueda para encontrar un insumos en específico, <br> o puede usar la rueda del mouse sobre el formulario para ver mas insumos</p>
		<br>

		<h4 class="form-h4">Elija los insumos</h4>

		<label for="b_in">

			<input class="controls_cortos" type="text" name="b_in" id="b_in" placeholder="Buscar insumos...">

			<div class="form1_2">

				<div class="dope" id="insumos"></div>

			</div>

		</label>

	</section>

</div>