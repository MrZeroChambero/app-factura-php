<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
nivel_maximo();
	$salida_us = "";

	$query=consultar_preguntas();

if ($query->num_rows > 0 ){
	$salida_us .= "
	<link rel='stylesheet' href='/facturacion/estiloT.css'>
<div class='texto-principal margen-interno maxw'>

	<section 	class='principal upper maxw margen'>
	<table class='tablas'>
		<thead>
			<tr>
				<th style='min-width:300px; max-width:400px;'>Pregunta</th>
				<th>Eliminar</th>

			</tr>
		</thead>
		<tbody>";
	while ($filas = mysqli_fetch_assoc($query)) {

	$salida_us .= "
					<tr>
						<td>".$filas['pregunta']."</td>";

		$salida_us .= "<td><input class='pushy__btn pushy__btn--md pushy__btn--red' type='button' value='Eliminar' onclick='eliminar(".$filas['id_pregunta'].")'></td>";

		$salida_us .="</tr>";

	}
	$salida_us .= "</tbody></table></section></div>";


} else {
	$salida_us .= "<h4 class='form-h4'>no se encuentran datos</h4>";
}

echo $salida_us;
$conexion->close();

?>