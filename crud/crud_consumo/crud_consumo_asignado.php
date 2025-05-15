
<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=agregar_consumo"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');

nivel_maximo();

$salida_in='';


$conexion = conectar();

$q=$_SESSION['analisis'];

$query=buscar_consumo_analisis($q);



if (isset($_POST['consulta_in'])){

	//esto espara evitar que registre caracteres especiales
	$id_in = $conexion->real_escape_string($_POST['consulta_in']);
	
	$query=buscar_consumo_asignado($id_in);

}  




if (!($query->num_rows > 0) ){

	$salida_in .= "<h4 class='form-h4'>no se encuentran datos</h4>";

	echo $salida_in;

	$conexion->close();

	exit();
}
	$salida_in .= "
	
	<link rel='stylesheet' href='/facturacion/estiloT.css'>

	<table class='tablas'>
		<thead>
			<tr>
				<th>codigo</th>
				<th>Nombre</th>
				<th>Asignado</th>
				<th>U M</th>
				<th></th>
			</tr>
		</thead>
		<tbody>";


		while ($filas = mysqli_fetch_assoc($query)) {
			if ($filas['unidad_medicion']==1) {
				$unidad="Unidad/s";
			}else{
				$unidad="Mililitro/s";
			}

		$salida_in .= "
					<tr>
						<td>".$filas['cod_in']."</td>
						<td>".$filas['nom_in']."</td>
						<td>".$filas['ca_co']."</td>
						<td>".$unidad."</td>
";

	
							if( $_SESSION['nivel_us'] == 1){
							$salida_in .= "<td>
						

							<input  class='pushy__btn pushy__btn--md pushy__btn--green' type='button' name='enviar' value='Editar' id='Enviar' onclick='ventana_agregar(".$filas['id_in'].")'>


						</td>";
							}

					}
					
					
					$salida_in .= "</tr>";
	

	$salida_in .= "</tbody></table>";


echo $salida_in;
$conexion->close();
exit();
?>
