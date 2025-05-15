<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=consulta_mercancia"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/} </script>
<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
nivel_medio();
$filtro=$_SESSION['buscador'];

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
<script type="text/javascript" src="js/consulta/crud_mercanciaj.s"></script>

 <select id="insumos"  name="insumos"  class="controls_cortos"  style="width: 380px;" onchange="consultar_insumos()">
 	<option value="">Seleccione un insumo</option>
 	<?php 

    while($filas=mysqli_fetch_assoc($verificar)){  ?>

 	<option value="<?php echo $filas['id_in']; ?>"> <?php echo "Codigo:".$filas['cod_in']." Nombre:".$filas['nom_in'];  ?></option>
<?php } ?>
 </select>


<?php 
 }else{

    $verificar=consultar_proveedor_compra();

if (isset($_POST['consulta']) and ($_POST['consulta'] !="")) {
    
    $q=$_POST['consulta'];

    $verificar=buscar_proveedor_compra($q);
}


    if (!($verificar->num_rows>0)) {
        ?>
 <select id="proveedor"  name="proveedor" class="controls_cortos">
    <option value="">Seleccione un Proveedor</option>
</select>

        <?php

        exit();
    }

 ?>
 <script type="text/JavaScript" src="js/fw/jquery.min.js"></script>
<script type="text/javascript" src="js/consulta/crud_mercancia.js"></script>

 <select id="proveedor"  name="proveedor" class="controls_cortos" style="width: 380px;" onchange="consultar_proveedor()">
    <option value="">Seleccione un Proveedor</option>
    <?php while($filas=mysqli_fetch_assoc($verificar)){ 

if ($filas['tipo_pro']==1) {
 $tipo_rif="V";
}
if ($filas['tipo_pro']==2) {
 $tipo_rif="J";
}
if ($filas['tipo_pro']==3) {
 $tipo_rif="E";
}
if ($filas['tipo_pro']==4) {
 $tipo_rif="G";
}
if ($filas['tipo_pro']==5) {
 $tipo_rif="P";
}
$rif=$tipo_rif."-".$filas['rif_pro']."-".$filas['rif_2'];

        ?>
    <option value="<?php echo $filas['id_pro']; ?>"> <?php echo "Rif:".$rif." Nombre:".$filas['nom_pro'];  ?></option>
<?php } ?>
 </select>

 <?php 

} ?>