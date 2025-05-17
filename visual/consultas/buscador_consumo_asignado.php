<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
verificar_nivel();
$filtro=$_POST['consulta'];
if ($filtro=="insumos") {

?>
<script type="text/JavaScript" src="js/fw/jquery.min.js"></script>
<script type="text/javascript" src="js/consulta/buscar_consumo_asignado_insumos.js"></script>
	 			 	<p>Buscar</p>

	<input type="text" id="buscardor_insumos" name="buscardor_insumos" class="controls_cortos"  style="width: 380px;" autocomplete="off" placeholder="Buscar..." onkeyup="filtro_insumos()">
<?php  ?>
<div id="select" ></div>

<?php 
$_SESSION['buscador_consumo']=$filtro;

 }else{

 ?>
 <script type="text/JavaScript" src="js/fw/jquery.min.js"></script>
<script type="text/javascript" src="js/consulta/buscar_consumo_asignado_analisis.js"></script>
	 			 	<p>Buscar</p>

	<input type="text" id="buscador_analisis" name="buscador_analisis" class="controls_cortos"  style="width: 380px;" placeholder="Buscar..." autocomplete="off" onkeyup="filtro_analsis()">

		<div id="select"></div>


 <?php 
$_SESSION['buscador_consumo']=$filtro;

exit();
} ?>