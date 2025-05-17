<?php 
require_once('../../conexion/conexion.php');
require_once('../../funciones_generales.php');
	$salida_in='';
$conexion=conectar();

$inventario=consultar_pedidos_confirmados();

if(isset($_POST['fecha_i'])and (isset($_POST['fecha_f']))) {

	$fecha_inicio=$conexion->real_escape_string($_POST['fecha_i']);

	$fecha_final=$conexion->real_escape_string($_POST['fecha_f']);

	$inventario=consultar_pedidos_fechas($fecha_inicio,$fecha_final);

}

if ($inventario->num_rows > 0 ){
	$salida_in .= "
	
	<link rel='stylesheet' href='/facturacion/estiloT.css'>
<div class='texto-principal margen-interno maxw'>

	<section 	class='principal upper maxw margen'>
	<table class='tablas'>
		<thead>
			<tr>
				<th>codigo <br> pedido</th>
				<th>codigo <br> compra</th>
				<th>Nombre</th>
				<th>ingresado</th>
				<th>fecha</th>
			</tr>
		</thead>
		<tbody>";


		while ($filas = mysqli_fetch_assoc($inventario)) {
$fecha=date("d/m/Y", strtotime($filas['fecha_pedido']));

if ($filas['unidad_medicion']==2) {
	$unidad=".ml";
}else{
	$unidad=".un";
}
		$salida_in .= "
					<tr>
						<td>".$filas['cod_in']."</td>
						<td>".$filas['id_compra_pe']."</td>
						<td><p style=' min-width: 30%; max-width: 100%; width:300px; margin-top:0px margin-bottom: 0px' align-items:center;>".$filas['nom_in']."</p></td>
						<td>".$filas['cantidad_pe'].$unidad."</td>
						<td>".$fecha."</td>";
					
					
					$salida_in .= "</tr>";
	}

	$salida_in .= "</tbody></table></section></div>";

} else {
	$salida_in .= "<h4 class='form-h4'>no se encuentran datos</h4>";
}

echo $salida_in;
$conexion->close();

 ?>