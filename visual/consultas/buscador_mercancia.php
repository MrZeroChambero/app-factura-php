<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
nivel_medio();
$filtro=$_POST['consulta'];
if ($filtro=="insumos") {

?>
<script type="text/JavaScript" src="js/fw/jquery.min.js"></script>
<script type="text/javascript" src="js/consulta/buscar_insumos_mercancia.js"></script>
	 			 	<p>Buscar</p>

	<input type="text" id="buscardor_insumos" name="buscardor_insumos" class="controls_cortos"  style="width: 380px;" autocomplete="off" placeholder="Buscar..." onkeyup="filtro_insumos()">

<div id="select" ></div>

<?php 
$_SESSION['buscador']=$filtro;
exit();
 }else{

 ?>
 <script type="text/JavaScript" src="js/fw/jquery.min.js"></script>
<script type="text/javascript" src="js/consulta/buscar_proveedor_mercancia.js"></script>
	 			 	<p>Buscar</p>

	<input type="text" id="buscardor_proveedor" name="buscardor_proveedor" class="controls_cortos"  style="width: 380px;" placeholder="Buscar..." autocomplete="off" onkeyup="filtro_proveedor()">

		<div id="select"></div>


 <?php 
$_SESSION['buscador']=$filtro;

exit();
} ?>