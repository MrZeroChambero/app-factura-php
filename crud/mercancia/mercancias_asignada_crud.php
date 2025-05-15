<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=asignar_mercancia"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php
require_once('../../conexion/conexion.php');

require_once('../../funciones_generales.php');

$salida_in='';

$pro=$_SESSION['proveedor_insumo'];

$query=mercancia_proveedor($pro);

if (isset($_POST['consulta'])){

	//esto espara evitar que registre caracteres especiales
	$q = $conexion->real_escape_string($_POST['consulta']);
	
	$query=buscar_mercancia($pro,$q);
}  

if ($query->num_rows > 0 ){
	$salida_in .= "
	
	<link rel='stylesheet' href='/facturacion/estiloT.css'>

	<table class='tablas margen'>
		<thead>
			<tr>
				<th>codigo</th>
				<th>Nombre</th>
				<th></th>
			
			</tr>
		</thead>
		<tbody>";


while ($filas = mysqli_fetch_assoc($query)) {


		$salida_in .= "<tr>
						<td>".$filas['cod_in']."</td>
						<td><p style=' min-width: 450px; width: 100%;  margin-top:0px margin-bottom: 0px' align-items:center;>".$filas['nom_in']."</p> </td>";


		$salida_in .= "<td><input class='pushy__btn pushy__btn--md pushy__btn--red' type='button'  value='Quitar' onclick='quitar(".$filas['id_lista_mercancia'].")'></td>";	
		
					$salida_in .= "</tr>";
	}

	$salida_in .= "</tbody></table>";

} else {
	$salida_in .= "<h4 class='form-h4'>no se encuentran datos</h4>";
}

echo $salida_in;
$conexion->close();

?>
