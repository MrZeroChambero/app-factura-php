<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
verificar_nivel();
$filtro=$_SESSION['buscador_consumo'];

if ($filtro=="insumos") {

	$verificar=consultar_insumo_compra();

if (isset($_POST['consulta']) and ($_POST['consulta'] !="")) {
    
    $q=$_POST['consulta'];

    $verificar=buscar_insumos_compra($q);
}

	if (!($verificar->num_rows>0)) {

 ?>


 <select id="insumos"  name="insumos" class="controls_cortos">
    <option value="">Seleccione un insumo</option>
 </select>

<?php 
exit();
	}

 ?>
<script type="text/JavaScript" src="js/fw/jquery.min.js"></script>
<script type="text/javascript" src="js/consulta/crud_consumo.js"></script>

 <select id="insumos"  name="insumos"  class="controls_cortos"  style="width: 380px;" onchange="consultar_insumos()">
 	<option value="">Seleccione un insumo</option>
 	<?php 

    while($filas=mysqli_fetch_assoc($verificar)){  ?>

 	<option value="<?php echo $filas['id_in']; ?>"> <?php echo "Codigo:".$filas['cod_in']." Nombre:".$filas['nom_in'];  ?></option>
<?php }  ?>
 </select>


<?php 

 }else{

    $verificar=consultar_analisis_factura();

if (isset($_POST['consulta']) and ($_POST['consulta'] !="")) {
    
    $q=$_POST['consulta'];

    $verificar=buscar_analisis_factura($q);
}


    if (!($verificar->num_rows>0)) {
        ?>
 <select id="analsis"  name="analsis" class="controls_cortos">
    <option value="">Seleccione un Análisis</option>
</select>

        <?php

        exit();
    }

 ?>
 <script type="text/JavaScript" src="js/fw/jquery.min.js"></script>
<script type="text/javascript" src="js/consulta/crud_consumo.js"></script>

 <select id="analisis"  name="analisis" class="controls_cortos" style="width: 380px;" onchange="consultar_analisis()">
    <option value="">Seleccione un Análsis</option>
    <?php while($filas=mysqli_fetch_assoc($verificar)){ 

        ?>
    <option value="<?php echo $filas['id_an']; ?>"> <?php echo "Codigo:".$filas['cod_an']." Nombre:".$filas['nom_an'];  ?></option>
<?php } ?>
 </select>

 <?php 

} ?>