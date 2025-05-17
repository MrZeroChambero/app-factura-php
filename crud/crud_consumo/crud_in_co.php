<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');

nivel_maximo();

$salida_in='';

$id_an=$_SESSION['analisis'];
$verificar_datos=verificar_analisis_activo($id_an);

if (!($verificar_datos->num_rows>0)) {
	patucasa();
	exit();
}
$filas_an=mysqli_fetch_assoc($verificar_datos);
$tipo=$filas_an['tipo_an'];
$query=consultar_insumo_asignar($tipo);



if (isset($_POST['consulta_in'])){

	//esto espara evitar que registre caracteres especiales
	$q = $conexion->real_escape_string($_POST['consulta_in']);
	
	$query=buscar_insumos_asignar($q,$tipo);

}  

if (!($query->num_rows > 0) ){

	$salida_in .= "<h4 class='form-h4'>no se encuentran datos</h4>";

	echo $salida_in;

	$conexion->close();

	exit();
}
	$salida_in .= "
	
	<link rel='stylesheet' href='/facturacion/estiloT.css'>
	<table class='tablas'>
		<thead>
			<tr>
				<th>codigo</th>
				<th>Nombre</th>
				<th>disponible</th>
				<th>U M</th>
				<th>stock maximo</th>
				<th>stock min</th>
				<th></th>
			</tr>
		</thead>
		<tbody>";

$i=0;

		while ($filas = mysqli_fetch_assoc($query)) {

			if ($filas['unidad_medicion']==1) {
				$unidad="Unidad/s";
			}else{
				$unidad="Mililitro/s";
			}
$id_in=$filas['id_in'];

$insumos_asginados=consultar_consumo_analisis_insumos($id_in);
$similares=0;
if ($insumos_asginados->num_rows>0) {

$asginado=mysqli_fetch_assoc($insumos_asginados);

if ($asginado['id_in']==$filas['id_in']) {

$similares=1;	

}

}


	if ($similares==0) {
		
	$i++;

		$salida_in .= "
					<tr>
						<td>".$filas['cod_in']."</td>
						<td>".$filas['nom_in']."</td>
						<td>".$filas['cantidad_in']."</td>
						<td>".$unidad."</td>
						<td>".$filas['stockmax']."</td>
						<td>".$filas['stockmin']."</td>";
/*	<input class='controls' type='number' name='can_in".$i."' required id='can_in".$i."' min='1' max='1000' autocomplete='off'>*/

						if($_SESSION['nivel_us'] == 1){
							$salida_in .= "<td>
						

							<input  class='pushy__btn pushy__btn--md pushy__btn--blue' type='button' name='enviar' value='Agregar' id='Enviar' onclick='ventana_agregar(".$filas['id_in'].")'>


						</td>";
					}
					
					
					$salida_in .= "</tr>";
	}
}

	$salida_in .= "</tbody></table>";

if ($i==0) {
	$salida_in = "<h4 class='form-h4'>No hay insumos para asignar</h4>";
}

echo $salida_in;
$conexion->close();

?>