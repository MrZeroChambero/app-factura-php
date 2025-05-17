<?php 
if (!isset($_SESSION['autenticado'])){
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
}
verificar_nivel();
parte_arriba();
?>


<div id="js">

	<script type="text/JavaScript" src="js/fw/jquery.min.js"></script>

	<script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>

	<script type="text/JavaScript" src="js/consulta/consulta_factura.js"></script>

</div>

 
<div class='texto-principal margen-interno margen' style="height: 95vh;">

	<section 	class="principal upper maxw margen">

		<h4 class="form-h4">Facturas </h4>

<div>
			<table class="tablas">
				<thead>
					<tr>
						<th>
					
			<label class="form-h4n" for="fecha_i"> 
			<h4 class="form-h4n">fecha inicial</h4></label>
						</th>
						<th>
							<label class="form-h4n" for="fecha_f"> 
			<h4 class="form-h4n">fecha Final</h4></label>
						</th>
					</tr>
			</thead>

				<tbody>

					<tr>

						<td>
							<input class="controls_cortos" type="date" name="fecha_i" id="fecha_i">
						</td>

						<td>
							<input class="controls_cortos" type="date" name="fecha_f" id="fecha_f">
						</td>

					</tr>

				</tbody>

			</table>

<br>
<input class="pushy__btn pushy__btn--df pushy__btn--blue" type="button" name="buscar" id="buscar" value="Buscar" >
<input class="pushy__btn pushy__btn--df pushy__btn--blue" type="button" name="ver" id="ver" value="Ver todos" onclick="buscar_todos()">
<br>
</div>
<div class="dope" id='aler' style=" height: 60vh;"></div>


		</section>

<div id="ventanas">
	<section class="modal-container" id="pdf">

		<section class='modal_box' id='pdf2'></section>

	</section>

</div>
		
</div>     







<div id='aler2'></div>
<?php parte_abajo(); ?>