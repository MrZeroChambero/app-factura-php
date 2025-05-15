<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=compras"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>

<?php
require_once('../../conexion/conexion.php');
require_once('../../funciones_generales.php');
nivel_medio();

$salida_in='';

$conexion = conectar();
$proveedor=$_SESSION['proveedor1'];
$query=mercancia_proveedor($proveedor);


if (isset($_POST['consulta_in']) and (!empty(trim($_POST['consulta_in'])))){
	//esto espara evitar que registre caracteres especiales
	$q = $conexion->real_escape_string($_POST['consulta_in']);

	$query=buscar_mercancia($proveedor,$q);
}  


if ($query->num_rows > 0 ){
	$salida_in .= "
	
	<link rel='stylesheet' href='/facturacion/estiloT.css'>
<div class='texto-principal margen-interno maxw'>

	<section 	class='principal upper maxw margen'>
	<table class='tablas listado2'>
		<thead>
			<tr>
				<th>codigo</th>
				<th>Nombre</th>
				<th>disponible</th>
				<th>stock maximo</th>
				<th>stock min</th>
				<th></th>
			</tr>
		</thead>
		<tbody>";
 $i=0;
$disponibles=0;
		while ($filas = mysqli_fetch_assoc($query)) {
$i++;
		$verificar=verificar_insumo_lista_compra($filas['id_in']);

		if (!($verificar->num_rows>0)) {

		if($filas['cantidad_in']<$filas['stockmax']){
		$disponibles++;	
		
		$salida_in .= "<tr>
						<td>".$filas['cod_in']."</td>
						<td><p style=' min-width: 30%; max-width: 100%; width:300px; margin-top:0px margin-bottom: 0px' align-items:center;>".$filas['nom_in']."</p></td>
						<td>".$filas['cantidad_in']."</td>
						<td>".$filas['stockmax']."</td>
						<td>".$filas['stockmin']."</td>";
/*	<input class='controls' type='number' name='can_in".$i."' required id='can_in".$i."' min='1' max='1000' autocomplete='off'>*/

	
							$salida_in .= "<td><input  class='pushy__btn pushy__btn--md pushy__btn--blue' type='button' name='enviar' value='enviar' id='enviar' onclick='ventana_agregar(".$filas['id_in'].",false)'></td>";


				
					
					
					$salida_in .= "</tr>";
	}				
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
$conexion->close();

?>

