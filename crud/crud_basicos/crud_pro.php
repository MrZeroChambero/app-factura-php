
<?php
require_once('../../conexion/conexion.php');

require_once('../../funciones_generales.php');
 verificar_nivel();
$salida_pro = "";


$query =consultar_proveedor();

if (isset($_POST['consulta_pro'])  and ($_POST['consulta_pro'] != '')) {

	$q = $conexion->real_escape_string($_POST['consulta_pro']);

	$query = buscar_proveedor_consulta($q);
} 




if ($query->num_rows > 0 ){
	$salida_pro .= "
	
<div class='main-container'>
	<table class='tablas'>
		<thead>
			<tr>
				<th  style='min-width:140px;'>rif</th>
				<th style='min-width:240px;'>Nombre o razon social</th>
				<th>telefono</th>
				<th  >direccion</th>
				<th width='50px'>correo electronico</th>

				";
if ($_SESSION['nivel_us'] == 1) {
	
				$salida_pro .="<th>estado</th><th>Editar</th>
				<th>Cambiar <br> estado</th>
				<th>asignar<br>insumos</th>";
			}
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
						<td style='min-width:140px;'>".$tipo."-".$filas1['rif_pro']."-".$filas1['rif_2']."</td>
						<td><p style=' min-width: 30%; max-width: 100%; margin-top:0px margin-bottom: 0px' align-items:center;>".$filas1['nom_pro']."</p></td>
						<td>".$filas1['tlf_num_pro']."</td>
						<td><p style=' min-width: 50%; max-width: 100%; width:400px; margin-top:0px margin-bottom: 0px' align-items:center;>".$filas1['dir_pro']."</p></td>
						<td>".$filas1['correo_pro']."</td>

						";

							if($_SESSION['nivel_us'] == 1){
$salida_pro .= "<td>".$estado."</td><td><input class='pushy__btn pushy__btn--md pushy__btn--green' type='button' name='edi_pro' value='Editar' id='edi_pro' onclick='ventana_editar(".$filas1['id_pro'].")''></td>";
if ($filas1['estado_pro']==true) {
	$salida_pro .= "<td><input  class='pushy__btn pushy__btn--md pushy__btn--red' type='button' name='id_pro_desenviar' value='Desactivar' id='enviar' onclick='desactivar(".$filas1['id_pro'].")'>
						

						</td>";
}else{
	$salida_pro .= "<td><input  class='pushy__btn pushy__btn--md pushy__btn--blue' type='button' name='enviar' value='Activar' id='enviar' onclick='activar(".$filas1['id_pro'].")'>
						</td>";
					}
}
if ($_SESSION['nivel_us'] == 1) {
		$salida_pro .= "<td><input  class='pushy__btn pushy__btn--md pushy__btn--blue' type='button' name='enviar' value='Asignar' onclick='asignar(".$filas1['id_pro'].")'>
						</td>";
}
					
	}
	$salida_pro .= "</tbody></table></div>";

} else {
	$salida_pro .= "<h4 class='form-h4'>no se encuentran datos</h4>";
	
}

echo $salida_pro;
$conexion->close();

?>
