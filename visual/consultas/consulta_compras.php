<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=consulta_compras"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
if (!isset($_SESSION['autenticado'])){
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
}
nivel_medio();
parte_arriba();
?>

  
  <div class='texto-principal margen-interno' style="height: 95vh;">

		<section 	class="principal upper maxw margen">

		<h4 class="form-h4">Compras </h4>

		<table class="tablas">

			<thead>

				<tr>
					<th>
					
						<label class="form-h4n" for="fecha_i"><h4 class="form-h4n">fecha inicial</h4></label>

					</th>

					<th>

						<label class="form-h4n" for="fecha_f"><h4 class="form-h4n">fecha Final</h4></label>

					</th>

				</tr>

			</thead>

			<tbody>

				<tr>

					<td>

						<input class="controls" type="date" name="fecha_i" id="fecha_i">

					</td>

					<td>

						<input class="controls" type="date" name="fecha_f" id="fecha_f">

					</td>

				</tr>

			</tbody>

		</table>

		<br>
			<input class="pushy__btn pushy__btn--df pushy__btn--blue" type="button" name="buscar" id="buscar" value="Buscar" >
			<input class="pushy__btn pushy__btn--df pushy__btn--blue" type="button" name="ver" id="ver" value="Ver todos" onclick="buscar_todos()">
		<br>
<div class="dope" id='aler' style="height: 50vh;"></div>
		</section>

	</div>   




<div id="js">

	<script type="text/JavaScript" src="js/fw/jquery.min.js"></script>

	<script type="text/JavaScript" src="js/consulta/consulta_compras.js"></script>

</div>


<div id="ventanas">
	<section class="modal-container" id="pdf">

		<section class='modal_box' id='pdf2'></section>

	</section>

</div>

<?php parte_abajo(); ?>