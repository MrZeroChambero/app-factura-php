
<?php
require_once('../../conexion/conexion.php');

require_once('../../funciones_generales.php');
verificar_nivel();
$conexion=conectar();

$salida_an = "";

$query=consultar_analisis();

if (isset($_POST['consulta_an'])and ($_POST['consulta_an'] != '')){

	//esto espara evitar que registre caracteres especiales
	$q = $conexion->real_escape_string($_POST['consulta_an']);
	
	$query=buscar_analisis_consulta($q);

}  


if ($query->num_rows > 0){
	$salida_an .= "
	
	<link rel='stylesheet' href='/facturacion/estiloT.css'>
	<div class='main-container margen'>
		<table class='tablas'>
		<thead>
			<tr> 
				<th><p>codigo</p></th>
				<th style='min-width:200px;'>Nombre</th>
				<th>descripcion</th>
				<th>tipo analisis</th>
				<th>precio analisis</th>";

							if ($_SESSION['nivel_us']==1) {
								$salida_an .="<th>Consumo</th>	
									<th>editar</th>
									<th>estado</th>	
									<th></th>";	
							}
			$salida_an .="</tr>
		</thead>
		<tbody>";
	while ($filas = mysqli_fetch_assoc($query)) {
if($filas['estado_an'] == true){
	$estado="Activado";
}else {
	$estado="Desactivado";
}
$tipo="";
if ($filas['tipo_an']==1) {
	$tipo="Química sanguínea";
}
if ($filas['tipo_an']==2) {
	$tipo="Hematología";
}
if ($filas['tipo_an']==3) {
	$tipo="Serología";
}
if ($filas['tipo_an']==4) {
	$tipo="orina y heces";
}
if ($filas['tipo_an']==5) {
	$tipo="mixtos";
}




		$salida_an .= "
					<tr>
						<td>".$filas['cod_an']."</td>
						<td>".$filas['nom_an']."</td>
						<td>".$filas['des_an']."</td>
						<td>".$tipo."</td>
						<td>".$filas['pre_an'].".Bs"."</td>
						
						";

							if($_SESSION['nivel_us'] == 1){

$salida_an .= "<td><input class='pushy__btn pushy__btn--md pushy__btn--blue' type='button' value='Asignar' onclick='consumo(".$filas['id_an'].")'></td>";								
$salida_an .= "<td><input class='pushy__btn pushy__btn--md pushy__btn--green' type='button' value='Editar' onclick='ventana_editar(".$filas['id_an'].")'></td>";
$salida_an .= "<td>".$estado."</td>";
							if ($filas['estado_an'] == true) {
$salida_an .="<td><input type='hidden'  value=".$filas['id_an']." name='id_an_des' id='id_an_des'>
							<input class='pushy__btn pushy__btn--md pushy__btn--red' type='button'  value='Desactivar' onclick='desactivar(".$filas['id_an'].")'></td></div>";
							}else{
							$salida_an .="
							<td>
							<input class='pushy__btn pushy__btn--md pushy__btn--blue' type='button'  value='Activar' onclick='activar(".$filas['id_an'].")'>
							</form>

						</td></div>";
							}
						
					}
					$salida_an .= "</tr>";
	}
	$salida_an .= "</tbody></table></div>";


} else {
	$salida_an .= "<h4 class='form-h4'>no se encuentran datos</h4>";
}

echo $salida_an;
$conexion->close();

?>