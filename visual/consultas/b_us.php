<?php 
if (!isset($_SESSION['autenticado'])){
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
}
nivel_maximo();
parte_arriba();
?>

            	
						<div class='texto-principal margen-interno maxw margen' style="height: 95vh;">

							<section 	class="principal upper maxw">

								<h4 class="form-h4">Usuarios registrados</h4>
								
								<div class="form1_2">

									<label for="caja"><h4 class="form-h4">buscar</h4>

											<input class="controls_cortos" type="text" name="caja" id="caja" value=""  autocomplete="off" />

									</label>

								</div>

								<div id="datos" class="dope maxw" style="height: 50vh;"></div>

								<div id="aler"></div>

							</section>

							<section class="modal-container" id="ventana">

								<section class='modal_editar' id='ventana2'></section>

							</section>	

							<script type="text/JavaScript" src="js/fw/jquery.min.js"></script>

							<script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>

							<script type="text/JavaScript" src="js/consulta/b_us.js"></script>

							<script type='text/JavaScript' src='js/fw/tildes.js'></script>

						</div>

<?php
ver_informes_completo();
 parte_abajo(); ?>