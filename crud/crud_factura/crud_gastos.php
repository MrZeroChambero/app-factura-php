<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=consumo"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once('../../conexion/conexion.php');

require_once('../../funciones_generales.php');
	$salida_in='';

$inventario=consultar_gastos_listos();

if (isset($_POST['fecha_i'])and (isset($_POST['fecha_f']))) {

	$fecha_inicio=$conexion->real_escape_string($_POST['fecha_i']);

	$fecha_final=$conexion->real_escape_string($_POST['fecha_f']);

	$inventario=consultar_gastos_fechas_listo($fecha_inicio,$fecha_final);

}

if ($inventario->num_rows > 0 ){
	$salida_in .= "
	
	<link rel='stylesheet' href='/facturacion/estiloT.css'>
<div class='texto-principal margen-interno maxw'>

	<section 	class='principal upper maxw margen'>
	<table class='tablas'>
		<thead>
			<tr>
				<th>codigo <br> consumo</th>
				<th>codigo <br> factura</th>
				<th>Nombre</th>
				<th>Gasto</th>
				<th>fecha</th>
			</tr>
		</thead>
		<tbody>";


		while ($filas = mysqli_fetch_assoc($inventario)) {

			if ($filas['unidad_medicion']==2) {
				$unidad=".ml";
			}else{
				$unidad=".un";
			}

			$fecha=date("d/m/Y", strtotime($filas['fecha_gas']));

		$salida_in .= "
					<tr>
						<td>".$filas['cod_in']."</td>
						<td>".$filas['id_fac_gas']."</td>
						<td><p style=' min-width: 30%; max-width: 100%; width:300px; margin-top:0px margin-bottom: 0px' align-items:center;>".$filas['nom_in']."</p></td>
						<td>".$filas['can_ins_gasto'].$unidad."</td>
						<td>".$fecha."</td>";
					
					
					$salida_in .= "</tr>";
	}

	$salida_in .= "</tbody></table><section></div>";

} else {
	$salida_in .= "<h4 class='form-h4'>no se encuentran datos</h4>";
}

echo $salida_in;
$conexion->close();

 ?>