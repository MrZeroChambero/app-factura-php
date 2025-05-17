
<?php
require_once('../../conexion/conexion.php');

require_once('../../funciones_generales.php');
nivel_maximo();
	$salida_us = "";

	$query=consulta_usuario();

if (isset($_POST['consulta_us'])) {

	//esto espara evitar que registre caracteres especiales
	$q = $conexion->real_escape_string($_POST['consulta_us']);
	
	$query=buscar_usuario_consulta($q); // falta agregar

} 



if ($query->num_rows > 0 ){
	$salida_us .= "
	<link rel='stylesheet' href='/facturacion/estiloT.css'>
	<div class='main-container'>
	<table class='tablas'>
		<thead>
			<tr>
				<th>cedula</th>
				<th>Nombre</th>
				<th>apellido</th>
				<th>usuario</th>
				<th>nivel</th>
				<th>numero telefonico</th>
				<th>Estado</th>
				<th>editar</th>";
				if ($_SESSION['nivel_us']==1) {
					$salida_us .="<th>Pregunstas<br>seguridad</th><th></th>";
				}
				
			$salida_us .="</tr>
		</thead>
		<tbody>";
	while ($filas = mysqli_fetch_assoc($query)) {
if ($filas['estado_us']==true) {
	$estado="Activado";
}else{
	$estado="Desactivado";
}
if ($filas['nivel_us'] ==1) {
	$nick_us="Administrador";
} else if ($filas['nivel_us'] ==2) {
	$nick_us="Gerente";
}else if ($filas['nivel_us'] ==3) {
	$nick_us="Trabajador";
}
		$salida_us .= "
					<tr>
						<td>".$filas['cedula_us']."</td>
						<td>".$filas['nom_us']."</td>
						<td>".$filas['apellido_us']."</td>
						<td>".$filas['nick_us']."</td>
						<td>".$nick_us."</td>
						<td>".$filas['num_tlf_us']."</td>
						<td>".$estado."</td>";

							if($_SESSION['nivel_us'] == 1 ){

							$salida_us .= "<td><input class='pushy__btn pushy__btn--md pushy__btn--green' type='button' value='Editar' onclick='elejir_editar(".$filas['id_us'].")'></td>";
							$salida_us .= "<td><input class='pushy__btn pushy__btn--md pushy__btn--green' type='button' value='Preguntas' onclick='preguntas(".$filas['id_us'].")'></td>";

							if (($filas['estado_us']==true )and ($filas['nivel_us']!=1)) {
							$salida_us .= "<td>	<input class='pushy__btn pushy__btn--md pushy__btn--red' type='button' value='Desactivar' onclick='desactivar(".$filas['id_us'].")'></td></div>";
						}else if (($filas['estado_us']!=true )and ($filas['nivel_us']!=1)) {
$salida_us .= "<td>	<input class='pushy__btn pushy__btn--md pushy__btn--blue' type='button' value='Activar' onclick='activar(".$filas['id_us'].")'></td></div>";
						}
					$salida_us .="</tr>";
	}
	}
	$salida_us .= "</tbody></table></div>";


} else {
	$salida_us .= "<h4 class='form-h4'>no se encuentran datos</h4>";
}

echo $salida_us;
$conexion->close();

?>