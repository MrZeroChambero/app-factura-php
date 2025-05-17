<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
nivel_medio();
parte_arriba();
 ?>
<div class='texto-principal margen-interno margen' style="height: 95vh;">

	<section 	class="principal upper maxw margen">

	<h4 class="form-h4">Lista de mercancia</h4>


	<table class="tablas">

	 <thead>

	 	<tr>

	 		<th>
	 			<p>Elija el tipo de busqueda</p>

	<select name="filtro" id="filtro" class="controls_cortos" onchange="filtro()">

		<option value="Proveedor">Proveedor</option>

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
			<script type="text/javascript" src="js/consulta/consulta_mercancia.js"></script>
		</div>

<div id="aler"></div>
</section>
</div>

<?php 
parte_abajo(); ?>