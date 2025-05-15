<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=respaldo"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
nivel_maximo();
	$salida = "";

	$query=consulta_respaldo();

if (isset($_POST['fecha_i']) and isset($_POST['fecha_f'])) {

	//esto espara evitar que registre caracteres especiales
	$fecha_i = $conexion->real_escape_string($_POST['fecha_i']);
	$fecha_f = $conexion->real_escape_string($_POST['fecha_f']);
	
	$query=consulta_respaldo_fechas($fecha_i,$fecha_f); // falta agregar

} 



if ($query->num_rows > 0 ){
	$salida .= "
	<link rel='stylesheet' href='/facturacion/estiloT.css'>
	<div class='main-container'>
	<table class='tablas'>
		<thead>
			<tr>
				<th>codigo</th>
				<th style='min-width:400px;'>Nombre</th>
				<th>fecha</th>
				<th>hora</th>
				<th>Restaurar</th>";

				
			$salida .="</tr>
		</thead>
		<tbody>";
	while ($filas = mysqli_fetch_assoc($query)) {

$fecha= date("d/m/Y", strtotime($filas['fecha'])); 
		$salida .= "
					<tr>
						<td>".$filas['id_respaldo']."</td>
						<td>".$filas['ruta']."</td>
						<td>".$fecha."</td>
						<td>".$filas['hora']."</td>
						<td><input class='pushy__btn pushy__btn--md pushy__btn--green' type='button'  value='Restaurar' onclick='restaurar(".$filas['id_respaldo'].")'>";

	$salida .="</tr>";
	}

	$salida .= "</tbody></table></div>";


} else {
	$salida .= "<h4 class='form-h4'>no se encuentran datos</h4>";
}

echo $salida;
$conexion->close();

exit();

?>