
<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
nivel_medio();

$verificar=consultar_factura_activa();
if ($verificar->num_rows>0) {
	$menu=true;
}else{
	$menu=false;
}
parte_arriba();
?>

<div class='texto-principal margen-interno maxw margen' style="height: 95vh;">

	<section 	class="principal upper maxw margen">

<h4 class="form-h4">Consumos </h4>

<table class="tablas">

	<thead>

		<tr>

			<th style="padding:0px;">

			<form>

<label class="form-h4n" for="fecha_i"> 

<h4 class="form-h4n">fecha inicial</h4></label>

			</th>

			<th style="padding:0px;">

				<label class="form-h4n" for="fecha_f"> 

<h4 class="form-h4n">fecha Final</h4></label>

			</th>

			<th style="padding:0px;">

				<label class="form-h4n" for="Confirmar"> 

<h4 class="form-h4n">Confirmar <br> consumo</h4></label>

			</th>

		</tr>

</thead>

	<tbody>

		<tr>

			<td >

				<p ><input class="controls_cortos" type="date" name="fecha_i" id="fecha_i"></p>

			</td>

			<td >

				<p><input class="controls_cortos" type="date" name="fecha_f" id="fecha_f"></p>

			</td>

			<td class="margen">

				<input  class="pushy__btn pushy__btn--df pushy__btn--blue" type="button" name="confirmar" value="Ver lista" onclick="ventana_lista()" <?php if ($menu==false) { echo "disabled=''";
					
				} ?>
				>
				<input  class="pushy__btn pushy__btn--df pushy__btn--green" type="button" name="confirmar" value="Pdf" onclick="ventana_pdf()">

			</td>

		</tr>

</tbody>

</table>	

<br>

<input class="pushy__btn pushy__btn--df pushy__btn--blue" type="button" name="buscar" id="buscar" value="Buscar">

<br>

</form>
<br>
<div class='texto-principal margen-interno maxw'>

	<section 	class="principal upper maxw margen">
<div class="dope" id='datos' style="height: 50vh;"></div>
	      

</section>

</div>

</section>

</div>

	    </div>

  </div>
      
</div>


<div id="ventanas">

	<section class="modal-container" id="ventana">

	<section class='modal' id='ventana2'></section>	

	</section>

	<section class="modal-container" id="ventana3">

	<section class='modal' id='ventana4'></section>	

	</section>	

	<section class="modal-container" id="ventana5">

	<section class='modal' id='ventana6'></section>

	</section>

	<section class="modal-container" id="ventana7">

	<section class='ventanas' id='ventana8'></section>

	</section>

</div>
<div id='aler'></div>

<div id="js">

	<script type="text/JavaScript" src="js/fw/jquery.min.js"></script>

	<script type="text/JavaScript" src="js/fw/validate1.9.js"></script>

	<script type="text/javascript" src="js/fw/traduccion.js"></script>

	<script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>

	<script type="text/JavaScript" src="js/fw/jquery.mask.js"></script>

	<script type="text/JavaScript" src="js/gastos/gastos.js"></script>

</div>
<?php parte_abajo(); ?>