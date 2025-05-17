<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');

nivel_maximo();

$salida_an = "";

$query=consultar_analisis_factura();

if (isset($_POST['consulta_an'])and ($_POST['consulta_an'] != '')){

	//esto espara evitar que registre caracteres especiales
	$q = $conexion->real_escape_string($_POST['consulta_an']);
	
	$query=buscar_analisis_fatura($q);

}  



if ($query->num_rows > 0 ){
	$salida_an .= "
	
	<link rel='stylesheet' href='/facturacion/estiloT.css'>
	<div class='main-container'>
	<table>
		<thead>
			<tr> 
				<th>codigo</th>
				<th>Nombre</th>
				<th>descripcion</th>
				<th>tipo analisis</th>
				<th></th>	
			</tr>
		</thead>
		<tbody>";
	while ($filas = mysqli_fetch_assoc($query)) {

		$salida_an .= "
					<tr>
						<td>".$filas['cod_an']."</td>
						<td>".$filas['nom_an']."</td>
						<td>".$filas['des_an']."</td>
						<td>".$filas['tipo_an']."</td>";

						if(isset($_SESSION['ubicacion']) and  ($_SESSION['ubicacion']== 'consumo1')){
							

							$salida_an .="<td>

							<form action='proceso3.php' method='post'>
							<input type='hidden'  value=".$filas['id_an']." name='ag_an' id='ag_an'>
							<input type='hidden'  value=".$_SESSION['ubicacion']." name='ub_an' id='ub_an'>
							<input class='pushy__btn pushy__btn--md pushy__btn--blue' type='submit' name='enviar_an' value='agregar' id='enviar_an'>
							</form>

						</td>";
					}else if(isset($_SESSION['ubicacion']) and  ($_SESSION['ubicacion']== 'consumo2')){
					$salida_an .="<td><form action='proceso3.php' method='post'>
					<input type='hidden' name='eli_an' id='eli_an'>
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