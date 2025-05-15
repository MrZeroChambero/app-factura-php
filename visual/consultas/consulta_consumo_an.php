
<?php
require_once('f_menu.php');

$resultado=consultar_analisis();

if (isset($_POST['consulta_an'])and ($_POST['consulta_an'] != '')){

	//esto espara evitar que registre caracteres especiales
	$q = $conexion->real_escape_string($_POST['consulta_an']);
	
	$resultado=buscar_analisis_factura($q);

}  




if ($resultado->num_rows > 0 ){
	$salida_an .= "
	
	<link rel='stylesheet' href='/facturacion/estiloT.css'>
	<div class='main-container'>
	<table>
		<thead>
			<tr> 
				<th>codigo</th>
				<th>Nombre</th>
				<th></th>	
			</tr>
		</thead>
		<tbody>";
	while ($filas = mysqli_fetch_assoc($resultado)) {

		$salida_an .= "
					<tr>
						<td>".$filas['cod_an']."</td>
						<td>".$filas['nom_an']."</td>";

						if(isset($_SESSION['ubicacion']) and  ($_SESSION['ubicacion']== 'consulta_consumo')){
							

							$salida_an .="<td>

							<form action='f_consulta_con.php' method='post'>
							<input type='hidden'  value=".$filas['id_an']." name='agregado' id='agregado'>
							<input class='pushy__btn pushy__btn--md pushy__btn--blue' type='submit' name='enviar_an' value=' Buscar' id='enviar_an'>
							</form>

						</td>";
					}else if(isset($_SESSION['ubicacion']) and  ($_SESSION['ubicacion']== 'consulta_consumo2')){
					$salida_an .="<td><form action='f_consulta_con.php' method='post'>
					<input type='hidden' name='quitar' id='quitar'>
					<input class='pushy__btn pushy__btn--md pushy__btn--red' type='submit' name='enviar' value='Cambiar'>
					</form></td>";	
}

					$salida_an .= "</tr>";
	}
	$salida_an .= "</tbody></table></div>";


} else {
	$salida_an .= "<h4 class='form-h4'>no se encuentran datos</h4> ";
}

echo $salida_an;
$conexion->close();

?>