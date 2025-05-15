<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=factura"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
/*if ($_SESSION['cliente']== null) {
 	exit();
 } */
 verificar_nivel();
?>
<script>buscar_analisis();</script>
		<label for="buscar_analisis">

		<h4 class="form-h4">Elija los Analisis</h4>

		<br>
	<p class="form-h4" style="font-size: 16px; font-weight: bold;">puede usar la barra de busqueda para encontrar un análsis en específico, <br> o puede usar la rueda del mouse sobre el formulario para ver mas análisis</p>

		<input class="controls_cortos" type="text" name="buscar_analisis" id="buscar_analisis" placeholder="Buscar análisis...">

		<div class="dope" id="analisis"></div>

		</label>

</div>

