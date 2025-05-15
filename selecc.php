<?php 
session_name();
session_start();
$conexion = new mysqli("localhost","root","","facturacion");
$query_pro="SELECT * FROM proveedor";
if (isset($_POST['consulta_pro'])) {
	

	$q1 = $conexion->real_escape_string($_POST['consulta_pro']);
	
	$query_pro="SELECT * FROM proveedor WHERE nom_pro LIKE'%". $q1 ."%' OR rif_pro LIKE'%". $q1 ."%'";

} 

					$com_pro= $conexion ->query($query_pro);
					$opciones="";
					$opciones.="<select><option id='prove'value=''>seleccion un proveedor</option>";

					while ($fila_pro=$com_pro ->fetch_assoc()){
					$opciones.="<option value=".$fila_pro['rif_pro'].">".$fila_pro['nom_pro']."Rif:".$fila_pro['rif_pro']."</option>";	
}


							$opciones.="</select>";
							echo $opciones;

?>