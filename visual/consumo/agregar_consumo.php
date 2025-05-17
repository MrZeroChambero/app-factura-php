

<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
	
	nivel_maximo();

        $titulo="Sin resultado";

        $msg="Ah ocurrido un error, si el problema presiste recargue la paguina";

        $val=msg_error($msg,$titulo);

if (!isset($_SESSION['analisis'])) {

 		 echo $val;

	exit();
 } 
if (empty(trim($_SESSION['analisis']))) {

		 echo $val;

	exit();
	
}
if (!filter_var($_SESSION['analisis'],FILTER_VALIDATE_INT)) {

		 echo $val;

	exit();
	
}

$verificar=verificar_analisis($_SESSION['analisis']);

if (!($verificar->num_rows>0)) {
	
		 echo $val;

	exit();
}
parte_arriba();
?>


<div class="margen" style="height: 95vh;">

  <div class="fila">

    <div class="col" style="width: 100vw;">

    	<div class='texto-principal margen-interno'>

								<section class="principal upper">
									
									<h4 class="form-h4">Analisis elegido</h4>

									<label for="eli_pro">

										<div>
											
											<?php 
											$crud_analisis="";

											$filas=mysqli_fetch_assoc($verificar);

											 ?>

											 <table class="tablas">
											 	<thead>
											 		<tr>
											 			<th>
											 			<p>Codigo</p>
											 			</th>
											 			<th>
											 			<p>Nombre</p>
											 			</th>
											 			<th>
											 			
											 			</th>
											 		</tr>
											 	</thead>
											 	<tbody>
											 		<tr>
											 			<td>
											 				<p><?php echo $filas['cod_an']; ?> </p>
											 			</td>
											 			<td>
											 				<p><?php echo $filas['nom_an']; ?> </p>
											 			</td>
											 			<td>
											 			<input class='pushy__btn pushy__btn--md pushy__btn--blue' type='button'  value='volver' onclick='volver(<?php echo$filas['id_an']; ?>)'>	
											 			</td>
											 		</tr>
											 	</tbody>
											 </table>

										</div>

									</label>

								</section>

							</div>

    </div>

  </div>

  <div class="fila">

    <div class="col" style="width: 100vw;">


    	
	   	<div class='texto-principal margen-interno'>
	   		<section 	class="principal upper maxw">
	   		<div class="form1_2">

			<h4 class="form-h4">Asignar</h4> 
			<br>
			<label ><h4 class="form-h4"></h4>

			<input class="controls_cortos" type="text" name="buscar_insumos" id="buscar_insumos">

			</label>

		</div>
	

    	<div class="dope" id="consumo_asignado"></div>
</section>

  </div>

</div>
</div>
  <div class="fila">

    <div class="col" style="width: 100vw;">

	<div class='texto-principal margen-interno'>

		<section 	class="principal upper maxw">

			<h4 class="form-h4">Insumos Asignado</h4>

			<div class="form1_2">

				<label for="caja"><h4 class="form-h4"></h4>

					<input class="controls_cortos" type="text" name="buscar_asignado" id="buscar_asignado"   autocomplete="off" />

				</label>

			</div>

			<div class="dope" id="asignado"></div>
							
		</section>
	
    </div>
    	
    </div>

  </div>



	  <section class="modal-container" id="ventana">

		<section class='modal_small' id='ventana2'></section>

	</section>	

<div id="aler1" name="aler1" ></div>
   <div id="js">

	<script type="text/JavaScript" src="js/fw/jquery.min.js"></script>

	<script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>

	<script type="text/javascript" src="js/proceso3/f_co.js"></script>

   </div>
<?php parte_abajo(); ?>