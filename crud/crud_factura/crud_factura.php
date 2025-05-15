<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=consulta_factura"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php
require_once('../../conexion/conexion.php');

require_once('../../funciones_generales.php');
verificar_nivel();
	
	$salida_fac='';

	$factura=consultar_factura_sin_pago();

if (isset($_POST['fecha_i'])and (isset($_POST['fecha_f']))) {

	$fecha_inicio=$conexion->real_escape_string($_POST['fecha_i']);

	$fecha_final=$conexion->real_escape_string($_POST['fecha_f']);

	$factura=consultar_factura_fechas_sin_pago($fecha_inicio,$fecha_final);

// $q="SELECT * from factura,cliente,forma_pago,iva where id_cli = id_cli_fac and id_iva = iva_factura and fecha_fac BETWEEN '{$fecha_inicio}' AND '{$fecha_final}' ORDER BY id_fac";

}

if ($factura->num_rows > 0 ){
	$salida_fac .= "
	
	<link rel='stylesheet' href='/facturacion/estiloT.css'>
<div class='main-container'>
	<table class='tablas'>
		<thead>
			<tr>
				<th>Nª</th>
				<th>cedula cliente</th>
				<th>Nombre cliente</th>
				<th>total neto</th>
				<th>total + iva</th>
				<th>Formas de pago</th>
				<th>fecha</th>
				<th>hora</th>
				<th>estado</th>
				<th>PDF</th>";

				if ($_SESSION['nivel_us']==1) {

					$salida_fac .="<th></th>";
					
				}
				
			$salida_fac .="</tr>
		</thead>
		<tbody>";


		while ($filas = mysqli_fetch_assoc($factura)) {
			if ($filas['estado_fac']==true) {
				$estado="Activa";
			}else{
				$estado="Anulada";
			}
				$fecha=date("d/m/Y", strtotime($filas['fecha_fac']));
			$iva=($filas['precio_total']*$filas['iva_factura'])/100;
$precio_total=round($filas['precio_total']+$iva,2);
$formas_pago=ver_pagos_factura($filas['id_fac']);
$pagos="<select class='controls'>";
$cantidad_pago=$formas_pago->num_rows;
if ($cantidad_pago==0) {
	$pagos.="<option>Efectivo Referencia:0000000000000 cantidad:".$precio_total."</option>";

	 $pagos.="</select>";
}else{
while($filas_pago=mysqli_fetch_assoc($formas_pago)){

 	$pagos.="<option>".$filas_pago['nom_forma_pago']." Referencia:".$filas_pago['referencia']." cantidad:".round($filas_pago['cantidad_pago'],2).".Bs"."</option>";

 }
 $pagos.="</select>";

}


		$salida_fac .= "
					<tr>
					<td>".$filas['id_fac']."</td>
						<td>".$filas['cedula_rif']."</td>
						<td>".$filas['nom_cli']."</td>
						<td>".round($filas['precio_total'],2).".Bs"."</td>
						<td>".$precio_total.".Bs"."</td>
							<td>". $pagos."</td>
						<td>".$fecha."</td>
						<td>".$filas['hora_fac']."</td>
						<td>".$estado."</td>";
					
					
					
							$salida_fac .= "<td>
							

							<input  class='pushy__btn pushy__btn--md pushy__btn--blue' type='button' name='enviar' value='Ver' id='PDF' onclick='ventana2(".$filas['id_fac'].")'>
							</td>";
			
	if ($estado=="Activa" and $_SESSION['nivel_us']==1) {
									$salida_fac .= "<td>
							
			
							<input  class='pushy__btn pushy__btn--md pushy__btn--red' type='button' name='anular' value='anular' id='enviar' onclick='anular(".$filas['id_fac'].")'>
							</td>";
	}	
							
						}					

	$salida_fac .= "</tr></tbody></table></div>";

} else {
	$salida_fac .= "<h4 class='form-h4'>no se encuentran datos</h4>";
}

echo $salida_fac;
$conexion->close();

 ?>