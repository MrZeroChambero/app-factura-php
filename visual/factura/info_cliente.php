<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=factura"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once('../../conexion/conexion.php');

require_once('../../funciones_generales.php');
verificar_nivel();

if (!isset($_SESSION['cliente'])) {
$_SESSION['cliente']="";
}

	$q=$conexion->real_escape_string($_SESSION['cliente']);

	$cliente=verificar_cliente_activo($q);



if ($cliente->num_rows>0){
?>
<div class='texto-principal margen-interno'>

<section class="principal upper maxw">

	<h4 class="form-h4">Cliente elegido</h4>

<label for="eli_cli">
	<section >
<?php



if ($cliente->num_rows > 0 ){
	$salida_cli = "
	
	<link rel='stylesheet' href='/facturacion/estiloT.css'>

	<table class='tablas'>
		<thead >
			<tr >
				<th>cedula / rif</th>
				<th>Nombre</th>
				<th>Telefono</th>
				<th></th>
				<th></th>";
			
			$salida_cli .="</tr>
		</thead>
		<tbody>";
	while ($filas = mysqli_fetch_assoc($cliente)) {

$tipo="v";
if ($filas['tipo_cli']==1) {
	$tipo="V";

}
if ($filas['tipo_cli']==2) {
	$tipo="J";

}
if ($filas['tipo_cli']==3) {
	$tipo="E";
}
if ($filas['tipo_cli']==4) {
	$tipo="G";
}
if ($filas['tipo_cli']==5) {
	$tipo="P";
}
$cedula=$tipo."-".$filas['cedula_rif']."-".$filas['cedula_2'];
if ($filas['tipo_cli']==6) {
$cedula=$filas['cedula_rif'];
}

		$salida_cli .= "
					<tr>
						<td><p>".$cedula."</p></td>
						<td><p>".$filas['nom_cli']."</p></td>
						<td><p>".$filas['tlf_num_cli']."</p></td>";
$salida_cli .="<td><input class='pushy__btn pushy__btn--md pushy__btn--red' type='button' name='boton2' value='Cambiar' id='boton2'onclick='eliminar_cliente(".$filas['id_cli'].")'></td>";

	$salida_cli .= "<td><input class='pushy__btn pushy__btn--md pushy__btn--green' type='button'  name='boton1'  id='boton1'  onclick='ventana_carrito()' value='ver carrito'></td><tr></tbody></table>";

	}

} else {
	$salida_cli .= "<h4 class='form-h4' >no se encuentran datos</h4>";
}

echo $salida_cli;
echo"<script>lista_analisis();</script>";


?>
	</section>


<section class="principal upper">
	
</section>

</label>

</section>

</div>

<?php
exit(); 
}else{
?>

		

		<label for="buscar_cliente">
				<h4 class="form-h4">Buscar Cliente</h4>
				<br>
				<p class="form-h4" style="font-size: 16px; font-weight: bold;">puede usar la barra de busqueda para encontrar un cliente en específico, <br> o puede usar la rueda del mouse sobre el formulario para ver mas clientes</p>

				<input class="controls_cortos" type="text" name="buscar_cliente" id="buscar_cliente" width="100%" placeholder="Buscar cliente...">

				<div class="crud"  style="justify-content: center; " id="seleccion_cliente" name="seleccion_cliente"></div>

		</label>

	<script>buscar_clientes();</script>	
		
		<div id="aler" ></div>
		


<?php
exit();	
} 
?>
	

