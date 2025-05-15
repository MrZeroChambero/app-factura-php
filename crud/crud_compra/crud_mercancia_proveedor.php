<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=consulta_mercancia"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>

<?php
require_once('../../conexion/conexion.php');
require_once('../../funciones_generales.php');
nivel_medio();

$salida_in='';

$conexion = conectar();
$proveedor=$_POST['consulta'];
$_SESSION['proveedor1']=$proveedor;
$query=mercancia_proveedor($proveedor);


/*if (isset($_POST['consulta']) and (!empty(trim($_POST['consulta'])))){
	//esto espara evitar que registre caracteres especiales
	$q = $conexion->real_escape_string($_POST['consulta']);

	$query=buscar_mercancia($proveedor);
}  */


if ($query->num_rows > 0 ){
	$salida_in .= "
	
	<link rel='stylesheet' href='/facturacion/estiloT.css'>
<div class='texto-principal margen-interno maxw'>

	<section 	class='principal upper maxw margen'>
	<table class='tablas listado2'>
		<thead>
			<tr>
				<th style='padding:5px;'>codigo</th>
				<th style='padding:5px;'>Nombre</th>
				<th style='padding:5px;'>disponible</th>
				<th style='padding:5px;'>stock maximo</th>
				<th style='padding:5px;'>stock min</th>
			</tr>
		</thead>
		<tbody>";
 $i=0;
$disponibles=0;
		while ($filas = mysqli_fetch_assoc($query)) {
$i++;
		$verificar=verificar_insumo_lista_compra($filas['id_in']);
if ($filas['unidad_medicion']==2) {
$unidad=".ml";			
		}else{
$unidad=".un";				
		}		

		if (!($verificar->num_rows>0)) {


		$disponibles++;	
		
		$salida_in .= "<tr>
						<td style='padding:5px;'>".$filas['cod_in']."</td>
						<td style='padding:5px;'><p style=' min-width: 30%; max-width: 100%; width:300px; margin-top:0px margin-bottom: 0px' align-items:center;>".$filas['nom_in']."</p></td>
						<td style='padding:5px;'>".$filas['cantidad_in'].$unidad."</td>
						<td style='padding:5px;'>".$filas['stockmax'].$unidad."</td>
						<td style='padding:5px;'>".$filas['stockmin'].$unidad."</td>";



				
					
					
					$salida_in .= "</tr>";
				
}

}
if ($disponibles>0) {
	$salida_in .= "</tbody></table></section></div>";
}else{
	$salida_in = "<h4 class='form-h4'>no se encuentran datos</h4>";
}
	

} else {
	$salida_in .= "<h4 class='form-h4'>no se encuentran datos</h4>";
}




echo $salida_in;
$_SESSION['proveedor1']=null;
$conexion->close();

?>

