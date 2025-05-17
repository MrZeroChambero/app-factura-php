
<?php
require_once('../../conexion/conexion.php');

require_once('../../funciones_generales.php');
verificar_nivel();
$salida_in='';




	//esto espara evitar que registre caracteres especiales
	$id_in = $conexion->real_escape_string($_POST['consulta']);
	
	$query=buscar_consumo_general_insumos($id_in);



if ($query->num_rows > 0 ){
	$salida_in .= "
	
	<link rel='stylesheet' href='/facturacion/estiloT.css'>
  <div class='texto-principal margen-interno' >

		<section 	class='principal upper maxw margen'>
	<table class='tablas'>
		<thead>
			<tr>
				<th style='padding:5px;'>codigo</th>
				<th style='padding:5px; min-width:200px; width:200px;' max-width:450px;>Nombre</th>
				<th style='padding:5px;'>Asignado</th>";

				

			$salida_in .="</tr>
		</thead>
		<tbody>";


		while ($filas = mysqli_fetch_assoc($query)) {
$unidad=$filas['unidad_medicion'];
if ($unidad==1) {
	$unidad=".Un";
}else{
$unidad=".ml";
}
		$salida_in .= "
					<tr>
						<td style='padding:5px;'>".$filas['cod_an']."</td>

						<td style='padding:5px;'>".$filas['nom_an']." </td>

						<td style='padding:5px;'><p>".$filas['ca_co'].$unidad."</td>";


	

					
					
					$salida_in .= "</tr>";
	}

	$salida_in .= "</tbody></table></section></div>";

} else {
	$salida_in .= "<h4 class='form-h4'>no se encuentran datos</h4>";
}

echo $salida_in;
$conexion->close();

?>
