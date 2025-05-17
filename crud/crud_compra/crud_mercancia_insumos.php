
<?php
require_once('../../conexion/conexion.php');

require_once('../../funciones_generales.php');
nivel_medio();
$salida_pro = "";

$in=$_POST['consulta'];
$query =mercancia_proveedor_insumos($in);



if ($query->num_rows > 0 ){
	$salida_pro .= "
	
<div class='main-container'>
	<table class='tablas'>
		<thead>
			<tr>
				<th  style='min-width:140px; padding:5px;' >rif</th>
				<th style='min-width:240px; padding:5px;'>Nombre o razon social</th>
				<th style='padding:5px;'>telefono</th>
				<th style='padding:5px;' >direccion</th>
				<th style='min-width:240px; padding:5px;'>correo electronico</th>";

			$salida_pro .="</tr>
		</thead>
		<tbody>";
	while ($filas1 = mysqli_fetch_assoc($query)) {
if ($filas1['estado_pro']==true) {
	$estado="Activado";
}else{
	$estado="Desactivado";
}
$tipo="j";
if ($filas1['tipo_pro']==1) {
	$tipo="V";
}
if ($filas1['tipo_pro']==2) {
	$tipo="J";
}
if ($filas1['tipo_pro']==3) {
	$tipo="E";
}
if ($filas1['tipo_pro']==4) {
	$tipo="G";
}
if ($filas1['tipo_pro']==5) {
	$tipo="P";
}

		$salida_pro .= "
					<tr>
						<td style='min-width:140px; padding:5px;'>".$tipo."-".$filas1['rif_pro']."-".$filas1['rif_2']."</td>
						<td><p style=' min-width: 30%; max-width: 100%; margin-top:0px margin-bottom: 0px' align-items:center;>".$filas1['nom_pro']."</p></td>
						<td style='padding:5px;'>".$filas1['tlf_num_pro']."</td>
						<td style='padding:5px;'><p style=' min-width: 50%; max-width: 100%; width:400px; margin-top:0px margin-bottom: 0px' align-items:center;>".$filas1['dir_pro']."</p></td>
						<td style='padding:5px;'>".$filas1['correo_pro']."</td>

						";

					
	}
	$salida_pro .= "</tbody></table></div>";

} else {
	$salida_pro .= "<h4 class='form-h4'>no se encuentran datos</h4>";
	
}

echo $salida_pro;
$conexion->close();

?>
