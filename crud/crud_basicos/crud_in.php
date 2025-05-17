
<?php
require_once('../../conexion/conexion.php');

require_once('../../funciones_generales.php');
verificar_nivel();
$salida_in='';


$conexion = conectar();

$query=consultar_insumo();

if (isset($_POST['consulta_in'])){

	//esto espara evitar que registre caracteres especiales
	$q = $conexion->real_escape_string($_POST['consulta_in']);
	
	$query=buscar_insumos_consulta($q);

}  




if ($query->num_rows > 0 ){
	$salida_in .= "
	
	<link rel='stylesheet' href='/facturacion/estiloT.css'>
	<div class='main-container'>
	<table class='tablas'>
		<thead>
			<tr>
				<th>codigo</th>
				<th>Nombre</th>
				<th>disponible</th>
				<th> <p style='max-width:10%;' >Unidad <br> de <br> medición</p></th>
				<th>stock maximo</th>
				<th>stock min</th>";

				if ($_SESSION['nivel_us']==1) {
					$salida_in .="<th></th>
				<th></th>";
				}
				

			$salida_in .="</tr>
		</thead>
		<tbody>";


		while ($filas = mysqli_fetch_assoc($query)) {
$estado=$filas['estado_in'];
$unidad=$filas['unidad_medicion'];
if ($unidad==1) {
	$unidad="Unidad/s";
}else{
$unidad="mililitro/s";
}
		$salida_in .= "
					<tr>
						<td>".$filas['cod_in']."</td>
						<td><p style=' min-width: 30%; width: 350px; margin-top:0px margin-bottom: 0px' align-items:center;>".$filas['nom_in']."</p> </td>
						<td>".$filas['cantidad_in']."</p></td>
						<td><p>".$unidad."</td>
						<td>".$filas['stockmax']."</td>
						<td>".$filas['stockmin']."</td>";


	
							if( $_SESSION['nivel_us'] == 1){
$salida_in .= "<td><input class='pushy__btn pushy__btn--md pushy__btn--green' type='button'  value='Editar' onclick='ventana_editar(".$filas['id_in'].")'></td>";
							if ($estado==false) {
$salida_in .= "<td><input class='pushy__btn pushy__btn--md pushy__btn--blue' type='button'  value='Activar' onclick='activar(".$filas['id_in'].")'></td></div>";
							}else{
$salida_in .= "<td><input class='pushy__btn pushy__btn--md pushy__btn--red' type='button'  value='Desactivar' onclick='desactivar(".$filas['id_in'].")'>
							</form>

						</td></div>";
							}

					}
					
					
					$salida_in .= "</tr>";
	}

	$salida_in .= "</tbody></table></div>";

} else {
	$salida_in .= "<h4 class='form-h4'>no se encuentran datos</h4>";
}

echo $salida_in;
$conexion->close();

?>
