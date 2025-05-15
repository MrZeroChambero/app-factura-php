<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=factura"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php
require_once('../../conexion/conexion.php');

require_once('../../funciones_generales.php');
verificar_nivel(); 

$salida_cli = "";

$i=0;

$query=consultar_cliente_factura();

if (isset($_POST['consulta_cli']) and (empty(trim($_SESSION['cliente'])))) {

	//esto espara evitar que registre caracteres especiales
	$q = $conexion->real_escape_string($_POST['consulta_cli']);
	
	$query=buscar_cliente_factura($q);

} 
/*if (isset($_SESSION['cliente'])) {
	$q = $conexion->real_escape_string($_POST['consulta_cli']);
	
	$query=buscar_cliente_factura($q);
}*/ 




if ($query->num_rows > 0 ){
	$salida_cli .= "
	
	
	<link rel='stylesheet' href='/facturacion/estiloT.css'>
	<table class='tablas'>
		<thead>
			<tr>
				<th>cedula / rif</th>
				<th>Nombre</th>";
				
				$salida_cli .="<th></th>";
			
			$salida_cli .="</tr>
		</thead>
		<tbody>";
	while ($filas = mysqli_fetch_assoc($query)) {
if ($filas['estado_cli'] == true) {
	$i++;
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
						<td>".$cedula."</td>
						<td>".$filas['nom_cli']."</td>";
	

							$salida_cli .="<td>
<input class='pushy__btn pushy__btn--md pushy__btn--blue' type='submit' name='enviar_cli' value='Agregar' id='enviar_cli' onclick=agregar_cliente(".$filas['id_cli'].")>
						</td>";
	
					$salida_cli .="</tr>";
	
}
}

	$salida_cli .= "</tbody></table>";
	if ($i==0) {
		$salida_cli = "<h4 class='form-h4' >no se encuentran Clientes disponibles, <br> contactese con el administrador</h4>";
	}

} else {
	$salida_cli .= "<h4 class='form-h4' >no se encuentran datos</h4>";
}

echo $salida_cli;
$conexion->close();


?>