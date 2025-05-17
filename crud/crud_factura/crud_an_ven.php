<?php
require_once('../../conexion/conexion.php');

require_once('../../funciones_generales.php');
verificar_nivel();
$query=consultar_analisis_factura();

if (isset($_POST['consulta_an'])and ($_POST['consulta_an'] != '')){

	$q = $conexion->real_escape_string($_POST['consulta_an']);
	
	$query=buscar_analisis_factura($q);

} 
$salida_an="";
$salida_an2="";
if ($query->num_rows > 0 ){
	$salida_an = "
	
	<link rel='stylesheet' href='/facturacion/estiloT.css'>
	<table class='tablas' >
		<thead>
			<tr> 
				<th>codigo</th>
				<th>Nombre</th>
				<th>precio</th>
				<th>disponible</th>
				<th></th>	
			</tr>
		</thead>
		<tbody>";
		$servicios=0;
$estado=0;
	while ($filas = mysqli_fetch_assoc($query)) {

			
	if ($filas['estado_an']==true) {
		
		$estado++;
$disponible=0;
$i=0;
$an=$filas['id_an'];

$disponible=servicios_disponibles($an);

if ($disponible>0) {

$servicios++;
$disponible2=servicios_disponibles_mostrar($an);
	$salida_an2 .= "
					<tr>
						 <td>".$filas['cod_an']."</td>
						<td>".$filas['nom_an']."</td>
						<td>".$filas['pre_an'].".Bs"."</td>
						<td>".$disponible2."</td>";

							

	$salida_an2 .="<td><input class='pushy__btn pushy__btn--md pushy__btn--blue' type='button' name='enviar_an' value='agregar' id='enviar_an' onclick='ventana_agregar(".$filas['id_an'].")'></td>";


					$salida_an2 .= "</tr>";
	
	}
	
}

}
$salida_an2 .= "</tbody></table>";
if ($servicios===0) {
	$salida_an = "<h4 class='form-h4'>No hay materiales <br> suficientes para trabajar</h4> ";
}else{
	$salida_an.=$salida_an2;
}
if ($estado===0) {
	$salida_an = "<h4 class='form-h4'>No hay analisis disponibles <br> Contactese con el administrador</h4> ";
}
} else {
	$salida_an .= "<h4 class='form-h4'>no se encuentran datos</h4> ";
}

echo $salida_an;
$conexion->close();

?>
