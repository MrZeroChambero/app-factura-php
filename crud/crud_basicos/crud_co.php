<?php
require_once('../../conexion/conexion.php');

require_once('../../funciones_generales.php');
mediumlvl();
valida();

   $salida_co ="";
   
  if (empty(trim($_SESSION['analisis_b'])) && empty(trim($_POST['consulta2']))) {
  $_SESSION['analisis_b']="";
  $_POST['consulta2']="";
  $query=consultar_consumo(); 	
  $valor=1;
}
if (empty(trim($_SESSION['analisis_b'])) && (!empty(trim($_POST['consulta2'])))) {

	  $query=consultar_consumo(); 	
	  
  $valor=1;
}
if (!empty(trim($_SESSION['analisis_b'])) && empty(trim($_POST['consulta2']))) {
	$q = $conexion->real_escape_string($_SESSION['analisis_b']);
$query=buscar_consumo_analisis($q); 	
  $valor=2;
}
if (!empty(trim($_SESSION['analisis_b'])) && (!empty(trim($_POST['consulta2'])))) {
	$q = $conexion->real_escape_string($_SESSION['analisis_b']);
	$q2=$conexion->real_escape_string($_POST['consulta2']);

	$query=buscar_insumos_consumo($q,$q2);	
		$valor=3;

}

if ($query->num_rows > 0 ){
	$salida_co = "<table>
		<thead>
			<tr>";
			if ($valor==1) {
				
			
				$salida_co .= "<th>codigo analisis</th>
				<th>nombre analisis</th>";
			}
				$salida_co .= "<th>codigo insumo</th>
				<th> nombre insumo</th>
				<th>cantidad de consumo</th>
				";
				if($_SESSION['nivel_us'] == 1){
				$salida_co .="<th></th>
				<th></th>
			</tr>";
		}
		$salida_co .="</thead>
		<tbody border='2'>";
	while ($filas = mysqli_fetch_assoc($query)) {

		$salida_co .= "<tr align='center'>";
if ($valor==1) {
$salida_co .= "<td>".$filas['cod_an']."</td>
						<td>".$filas['nom_an']."</td>";
						}
	$salida_co .= "<td>".$filas['cod_in']."</td>
						<td>".$filas['nom_in']."</td>
						<td>".$filas['ca_co']."</td>";

							if($_SESSION['nivel_us'] == 1){
							$salida_co .= "<td>

						<input class='pushy__btn pushy__btn--md pushy__btn--green' type='submit' value='Editar' onclick='editar(".$filas['id_co'].")' >
</td>
<td>
<input class='pushy__btn pushy__btn--md pushy__btn--red' type='submit' value='Quitar' onclick='quitar(".$filas['id_co'].")' >
							</td>";

					$salida_co .="</tr>";
	}
}

	$salida_co .= "</tbody></table>";

} else {
	$salida_co .= "<h4 class='form-h4'>no se encuentran datos</h4> ";
}

echo $salida_co;

$conexion->close();

 ?>