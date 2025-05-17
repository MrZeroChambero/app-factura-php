<?php 
if (!isset($_SESSION['autenticado'])){
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
}
verificar_nivel();
parte_arriba();
 ?>


				<div class='texto-principal margen-interno margen' style="height: 95vh;">

					<section 	class="principal upper maxw">

						<h4 class="form-h4">Insumos registrados</h4>

						<div class="form1_2">

							<label for="caja"><h4 class="form-h4">buscar</h4>

								<input class="controls_cortos" type="text" name="caja" id="caja" value=""  autocomplete="off" />

							</label>

						</div>

						<div id="datos" class='dope' style="height: 50vh;"></div>

					    <div id="aler"></div>
					
					</section>

				<section class="modal-container" id="ventana">

				<section class='modal_editar' id='ventana2'></section>	

				<script type="text/JavaScript" src="js/fw/jquery.min.js"></script>

				<script type="text/JavaScript" src="js/fw/validate1.9.js"></script>

				<script type="text/javascript" src="js/fw/traduccion.js"></script>

				<script type="text/JavaScript" src="js/consulta/b_in.js"></script>

				<script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>

				</div>
<?php parte_abajo(); ?>