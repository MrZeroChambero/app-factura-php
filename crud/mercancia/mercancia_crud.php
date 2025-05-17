<?php
require_once('../../conexion/conexion.php');
require_once('../../funciones_generales.php');

$salida_in='';

$query=consultar_insumo_compra();

$pro=$_SESSION['proveedor_insumo'];

if (isset($_POST['consulta'])){

	//esto espara evitar que registre caracteres especiales
	$q = $conexion->real_escape_string($_POST['consulta']);
	
	$query=buscar_insumos_compra($q);

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
				<th></th>
			</tr>
		</thead>
		<tbody>";

$i=0;

		while ($filas = mysqli_fetch_assoc($query)) {


$id_in=$filas['id_in'];


$verificar=verificar_mercancia($id_in);

$similares=0;
if ($verificar->num_rows>0) {

$asginado=mysqli_fetch_assoc($verificar);

if ($asginado['id_insumo_mercancia']==$filas['id_in']) {

$similares=1;	

}

}


	if ($similares==0) {
		
	$i++;

		$salida_in .= "
					<tr>
						<td>".$filas['cod_in']."</td>
						<td><p style=' min-width: 450px; width: 100%;  margin-top:0px margin-bottom: 0px' align-items:center;>".$filas['nom_in']."</p></td>";

						if($_SESSION['nivel_us'] == 1){

						$salida_in .= "<td><input class='pushy__btn pushy__btn--md pushy__btn--green' type='button'  value='Agregar' onclick='asignar(".$filas['id_in'].")'></td>";	

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