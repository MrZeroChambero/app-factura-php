
<?php
require_once('../../conexion/conexion.php');

require_once('../../funciones_generales.php');      
verificar_nivel();

$salida_cli = "";

$query=consultar_cliente();

if (isset($_POST['consulta_cli'])) {

	//esto espara evitar que registre caracteres especiales
	$q = $conexion->real_escape_string($_POST['consulta_cli']);
	
	$query=buscar_cliente_consulta($q);

} 



if ($query->num_rows > 0 ){
	$salida_cli .= "
	
	<link rel='stylesheet' href='/facturacion/estiloT.css'>
	<div class='main-container'>
	<table class='tablas'>
		<thead>
			<tr>
				<th>cedula / rif</th>
				<th>Nombre</th>
				<th>direccion</th>
				<th>telefono</th>";

if ($_SESSION['nivel_us']==1) {
				$salida_cli .="<th>estado</th>
				<th>Editar</th>
				<th></th>";	
}


			$salida_cli .="</tr>
		</thead>
		<tbody>";
	while ($filas = mysqli_fetch_assoc($query)) {
if ($filas['estado_cli']==true) {
	$estado="Activado";
}else{
	$estado="Desactivado";
}


$tipo="j";
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
						<td><p style=' min-width: 30%; width: 300px; margin-top:0px margin-bottom: 0px' align-items:center;>".$filas['nom_cli']."</p></td>
						<td><p style=' min-width: 30%; width: 300px; margin-top:0px margin-bottom: 0px' align-items:center;>".$filas['di_cli']."</p></td>
						<td>".$filas['tlf_num_cli']."</td>
						";
						
							if($_SESSION['nivel_us'] == 1){
							$salida_cli .= "<td>".$estado."</td>
							<td>
							<input class='pushy__btn pushy__btn--md pushy__btn--green' type='button' value='Editar' onclick='ventana_editar(".$filas['id_cli'].")'>
							</td>";
if ($filas['estado_cli']==true) {
	$salida_cli .="<td><input class='pushy__btn pushy__btn--md pushy__btn--red' type='button'  value='Desactivar' onclick='desactivar(".$filas['id_cli'].")'>
							</td></div>";

					$salida_cli .="</tr>";
}else{
$salida_cli .="<td><input class='pushy__btn pushy__btn--md pushy__btn--blue' type='button'  value='Activar' onclick='activar(".$filas['id_cli'].")'>
							</td></div>";

					$salida_cli .="</tr>";
}

	}
}

	$salida_cli .= "</tbody></table></div>";

} else {
	$salida_cli .= "<h4 class='form-h4'>no se encuentran datos</h4>";
}

echo $salida_cli;
$conexion->close();


?>