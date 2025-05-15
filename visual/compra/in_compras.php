<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=compras"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>

<?php
require_once('f_menu.php');

$salida_in='';
$tabla="insumos";
$campo1="id_in";
$campo2='des_in';
$campo3='nom_in';
$resultado="";

$conexion = conectar();

$query=buscar_sql($tabla,$campo1);

if (isset($_POST['consulta_in'])){

	//esto espara evitar que registre caracteres especiales
	$q = $conexion->real_escape_string($_POST['consulta_in']);
	
	$query=buscar3($tabla,$q,$campo1,$campo2,$campo3);

}  

$resultado=$conexion->query($query);
$resultado14=$conexion->query($query);


if ($resultado->num_rows > 0 ){
	$salida_in .= "
	
	<link rel='stylesheet' href='/facturacion/estiloT.css'>
	<div class='main-container'>
	<table>
		<thead>
			<tr>
				<th>codigo</th>
				<th>Nombre</th>
				<th>descripcion</th>
				<th>disponible</th>
				<th>costo</th>
			</tr>
		</thead>
		<tbody>";


		while ($filas = mysqli_fetch_assoc($resultado)) {

		$salida_in .= "
					<tr>
						<td>".$filas['cod_in']."</td>
						<td>".$filas['nom_in']."</td>
						<td>".$filas['des_in']."</td>
						<td>".$filas['cantidad_in']."</td>
						<td>".$filas['costo_in']."</td>
						<td>
							
							<form action='select_in.php' id='insumo_en' name='insumo_en'  method='post'>
							<input type='hidden'  value=".$filas['id_in']." name='insumoelegido' id='insumoelegido'>
							<input type='hidden'  value=".$_SESSION['ubicacion']." name='ub_in' id='ub_in'>
							<input  class='crudbed' type='submit' name='enviar' value='enviar' id='enviar'>
							</form></td></tr>";
	}

	$salida_in .= "</tbody></table></div>";

} else {
	$salida_in .= "no se encuentran datos";
}

echo $salida_in;
$conexion->close();

?>
