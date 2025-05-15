<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=consulta_compras"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once('../../conexion/conexion.php');
require_once('../../funciones_generales.php');
nivel_medio();
	$salida_fac='';

$query=consultar_compras();

if (isset($_POST['fecha_i'])and (isset($_POST['fecha_f']))) {

	$fecha_inicio=$conexion->real_escape_string($_POST['fecha_i']);

	$fecha_final=$conexion->real_escape_string($_POST['fecha_f']);

	$query=consultar_compras_fechas($fecha_inicio,$fecha_final);

}

if ($query->num_rows > 0 ){
	$salida_fac .= "
	
	<link rel='stylesheet' href='/facturacion/estiloT.css'>
	<div class='main-container'>
	<table class='tablas'>
		<thead>
			<tr>
				<th>codigo  de compras</th>
				<th>Rif proveedor</th>
				<th>Razon social</th>
				<th>total neto</th>
				<th>total + iva</th>
				<th>Formas de Pagos</th>
				<th>fecha</th>
				<th>hora</th>
				<th>PDF</th>
			</tr>
		</thead>
		<tbody>";


		while ($filas = mysqli_fetch_assoc($query)) {
$fecha=date("d/m/Y", strtotime($filas['fecha_com']));

$tipo="j";
if ($filas['tipo_pro']==1) {
	$tipo="V";
}
if ($filas['tipo_pro']==2) {
	$tipo="J";
}
if ($filas['tipo_pro']==3) {
	$tipo="E";
}
if ($filas['tipo_pro']==4) {
	$tipo="G";
}
if ($filas['tipo_pro']==5) {
	$tipo="P";
}

$formas_pago=ver_pagos_compra($filas['id_compra']);


$pagos="<select class='controls'>";
$cantidad_pago=$formas_pago->num_rows;
if ($cantidad_pago==0) {
	$pagos.="<option></option>";

	 $pagos.="</select>";
}else{
while($filas_pago=mysqli_fetch_assoc($formas_pago)){

 	$pagos.="<option>".$filas_pago['nom_forma_pago']." Referencia:".$filas_pago['referencia']." cantidad:".round($filas_pago['cantidad_pago'],2).".Bs"."</option>";

 }
 $pagos.="</select>";

}
$iva=round(($filas['gasto_t']*$filas['iva_compra'])/100,2);
$iva+=round($filas['gasto_t'],2);
		$salida_fac .= "
					<tr>
					<td>".$filas['id_compra']."</td>
						<td>".$tipo."-".$filas['rif_pro']."-".$filas['rif_2']."</td>
						<td>".$filas['nom_pro']."</td>
						<td>".round($filas['gasto_t'],2).".Bs"."</td>
						<td>".$iva.".Bs"."</td>
						<td>".$pagos."</td>
						<td>".$fecha."</td>
						<td>".$filas['hora_com']."</td>";
					
					
					
							$salida_fac .= "<td>

							<input  class='pushy__btn pushy__btn--md pushy__btn--blue' type='button' name='enviar' value='Ver' id='enviar' onclick='ventana2(".$filas['id_compra'].")'>
							</td></tr>";
	}							

	$salida_fac .= "</tbody></table></div>";

} else {
	$salida_fac .= "<h4 class='form-h4'>no se encuentran datos</h4>";
}

echo $salida_fac;
$conexion->close();

 ?>
