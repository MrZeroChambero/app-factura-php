<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=consulta_consumo"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
verificar_nivel();
parte_arriba();
 ?>
<div class='texto-principal margen-interno margen' style="height: 95vh;">

	<section 	class="principal upper maxw margen">

	<h4 class="form-h4">Consumos asginados</h4>


	<table class="tablas">

	 <thead>

	 	<tr>

	 		<th>
	 			<p>Elija el tipo de busqueda</p>

	<select name="filtro" id="filtro" class="controls_cortos" onchange="filtro_consumo()">

		<option value="analisis">Análisis</option>

		<option value="insumos">Insumos</option>

	</select>

	 			
	 		</th>

	 		<th style="padding: 0px;">


	 			<div id="buscar" >
	 				
	 			</div>

	 		</th>

	 	</tr>

	 </thead>

</table>


<br>

<div id="crud" class="dope" style=" height: 60vh;">
	<p class="form-h4">¿Que desea buscar?</p>
</div>
		<div id="js">
	 		<script type="text/JavaScript" src="js/fw/jquery.min.js"></script>
			<script type="text/javascript" src="js/consulta/consulta_consumo_asginado.js"></script>
		</div>

<div id="aler"></div>
</section>
</div>

<?php 
parte_abajo(); ?>