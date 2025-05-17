
<?php
require_once('../../conexion/conexion.php');
require_once('../../funciones_generales.php');
nivel_medio();
$salida_pro = "";

$i=0;

$query=consultar_proveedor_compra();

if (isset($_POST['consulta_pro'])) {
	
$q = $conexion->real_escape_string($_POST['consulta_pro']);

	$query=buscar_proveedor_compra($q);
}  


if ($query->num_rows > 0 ){
	$salida_pro .= "
	
	<link rel='stylesheet' href='/facturacion/estiloT.css'>

	<table class='tablas'>
		<thead>
			<tr>
				<th>rif</th>
				<th style='min-width:450px;'>Nombre o razon social</th>
				<th></th>
			</tr>
		</thead>
		<tbody>";
	while ($filas1 = mysqli_fetch_assoc($query)) {
	
	$id_pro=$filas1['id_pro'];

	$verificar=verificar_proveedor_compra($id_pro);
	if ($verificar->num_rows>0) {
$tipo="V";
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

		$i++;
	
		$salida_pro .= "<tr>
						<td>".$tipo."-".$filas1['rif_pro']."-".$filas1['rif_2']."</td>
						<td>".$filas1['nom_pro']."</td>";

							$salida_pro .= "<td>
							<input class='pushy__btn pushy__btn--md pushy__btn--blue' type='button' name='enviar_pro' value='agregar' id='enviar_pro' onclick='agregar_proveedor(".$filas1['id_pro'].")'>";			


		}			
	}
	$salida_pro .= "</tbody></table>";

} else {
	$salida_pro = "<h4 class='form-h4'>no se encuentran datos</h4>";
	
}
if ($i==0) {

	$salida_pro = "<h4 class='form-h4'>no se encuentran datos</h4>";
}
echo $salida_pro;
$conexion->close();

?>