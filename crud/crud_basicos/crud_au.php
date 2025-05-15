<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=auditoria"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/} </script>

<?php 
require_once('../../conexion/conexion.php');

require_once('../../funciones_generales.php');
nivel_maximo();

$salida_au='';

$query=consultar_auditoria();
if (isset($_POST['consulta'])) {

if (empty(trim($_POST['registro']))) {

$_POST['registro']=null;	
}
if (empty(trim($_POST['accion']))) {
$_POST['accion']=null;
}
if (empty(trim($_POST['fecha_i']))) {
$_POST['fecha_i']=null;	
}
if (empty(trim($_POST['fecha_f']))) {
$_POST['fecha_f']=null;		
}
if (empty(trim($_POST['usuario']))) {
$_POST['usuario']=null;		
}
}

if (isset($_POST['usuario']) and (!isset($_POST['registro'])) and  (!isset($_POST['accion'])) and (!isset($_POST['fecha_i'])) and (!isset($_POST['fecha_f']))){
	
	$q = $conexion->real_escape_string($_POST['usuario']);
	
	$query=consultar_auditoria_usuario($q);
}
if((!isset($_POST['usuario'])) and (isset($_POST['registro'])) and  (!isset($_POST['accion'])) and (!isset($_POST['fecha_i'])) and (!isset($_POST['fecha_f']))){

	$q = $conexion->real_escape_string($_POST['registro']);
	
	$query=consultar_auditoria_registro($q);
}
if((!isset($_POST['usuario'])) and (!isset($_POST['registro'])) and  (isset($_POST['accion'])) and (!isset($_POST['fecha_i'])) and (!isset($_POST['fecha_f']))){

	$q = $conexion->real_escape_string($_POST['accion']);
	
	$query=consultar_auditoria_accion($q);
}   
if((!isset($_POST['usuario'])) and (!isset($_POST['registro'])) and  (!isset($_POST['accion'])) and (isset($_POST['fecha_i'])) and (isset($_POST['fecha_f']))){

	$q = $conexion->real_escape_string($_POST['fecha_i']);

	$q2 = $conexion->real_escape_string($_POST['fecha_f']);
	
	$query=consultar_auditoria_fechas($q,$q2);
}
//usuario
 if(isset($_POST['usuario']) and (isset($_POST['registro'])) and  (!isset($_POST['accion'])) and (!isset($_POST['fecha_i'])) and (!isset($_POST['fecha_f']))){

	$q = $conexion->real_escape_string($_POST['usuario']);

	$q2 = $conexion->real_escape_string($_POST['registro']);
	
	$query=consultar_auditoria_usuario_registro($q,$q2);
}
 if(isset($_POST['usuario']) and (!isset($_POST['registro'])) and  (isset($_POST['accion'])) and (!isset($_POST['fecha_i'])) and (!isset($_POST['fecha_f']))){

	$q = $conexion->real_escape_string($_POST['usuario']);

	$q2 = $conexion->real_escape_string($_POST['accion']);
	
	$query=consultar_auditoria_usuario_accion($q,$q2);
}
 if(isset($_POST['usuario']) and (!isset($_POST['registro'])) and  (!isset($_POST['accion'])) and (isset($_POST['fecha_i'])) and (isset($_POST['fecha_f']))){

	$q = $conexion->real_escape_string($_POST['usuario']);

	$q2 = $conexion->real_escape_string($_POST['fecha_i']);

	$q3 = $conexion->real_escape_string($_POST['fecha_f']);
	
	$query=consultar_auditoria_usuario_fechas($q,$q2,$q3);
}
//registro
 if(!(isset($_POST['usuario'])) and (isset($_POST['registro'])) and  (isset($_POST['accion'])) and (!isset($_POST['fecha_i'])) and (!isset($_POST['fecha_f']))){

	$q = $conexion->real_escape_string($_POST['registro']);

	$q2 = $conexion->real_escape_string($_POST['accion']);
	
	$query=consultar_auditoria_registro_accion($q,$q2);
}
 if(!(isset($_POST['usuario'])) and (isset($_POST['registro'])) and  (!isset($_POST['accion'])) and (isset($_POST['fecha_i'])) and (isset($_POST['fecha_f']))){

	$q = $conexion->real_escape_string($_POST['registro']);

	$q2 = $conexion->real_escape_string($_POST['fecha_i']);

	$q3 = $conexion->real_escape_string($_POST['fecha_f']);
	
	$query=consultar_auditoria_registro_fechas($q,$q2,$q3);
}
//accion
 if(!(isset($_POST['usuario'])) and (!isset($_POST['registro'])) and  (isset($_POST['accion'])) and (isset($_POST['fecha_i'])) and (isset($_POST['fecha_f']))){

	$q = $conexion->real_escape_string($_POST['accion']);

	$q2 = $conexion->real_escape_string($_POST['fecha_i']);

	$q3 = $conexion->real_escape_string($_POST['fecha_f']);
	
	$query=consultar_auditoria_accion_fechas($q,$q2,$q3);
}
//
 if(isset($_POST['usuario']) and (!isset($_POST['registro'])) and  (isset($_POST['accion'])) and (isset($_POST['fecha_i'])) and (isset($_POST['fecha_f']))){

 	$q = $conexion->real_escape_string($_POST['usuario']);

	$q2 = $conexion->real_escape_string($_POST['accion']);

	$q3 = $conexion->real_escape_string($_POST['fecha_i']);

	$q4 = $conexion->real_escape_string($_POST['fecha_f']);
	
	$query=consultar_auditoria_usuario_accion_fechas($q,$q2,$q3,$q4);
}
 if(isset($_POST['usuario']) and (isset($_POST['registro'])) and  (isset($_POST['accion'])) and (!isset($_POST['fecha_i'])) and (!isset($_POST['fecha_f']))){

 	$q = $conexion->real_escape_string($_POST['usuario']);

 	$q2 = $conexion->real_escape_string($_POST['registro']);

	$q3 = $conexion->real_escape_string($_POST['accion']);
	
	$query=consultar_auditoria_usuario_registro_accion($q,$q2,$q3);
}
 if(isset($_POST['usuario']) and (isset($_POST['registro'])) and  (!isset($_POST['accion'])) and (isset($_POST['fecha_i'])) and (isset($_POST['fecha_f']))){

 	$q = $conexion->real_escape_string($_POST['usuario']);

	$q2 = $conexion->real_escape_string($_POST['registro']);

	$q3 = $conexion->real_escape_string($_POST['fecha_i']);

	$q4 = $conexion->real_escape_string($_POST['fecha_f']);
	
	$query=consultar_auditoria_usuario_registro_fechas($q,$q2,$q3,$q4);
}
//
 if((!isset($_POST['usuario'])) and (isset($_POST['registro'])) and  (isset($_POST['accion'])) and (isset($_POST['fecha_i'])) and (isset($_POST['fecha_f']))){

 	$q = $conexion->real_escape_string($_POST['registro']);

	$q2 = $conexion->real_escape_string($_POST['accion']);

	$q3 = $conexion->real_escape_string($_POST['fecha_i']);

	$q4 = $conexion->real_escape_string($_POST['fecha_f']);
	
	$query=consultar_auditoria_registro_accion_fechas($q,$q2,$q3,$q4);
}
//
 if((isset($_POST['usuario'])) and (isset($_POST['registro'])) and  (isset($_POST['accion'])) and (isset($_POST['fecha_i'])) and (isset($_POST['fecha_f']))){

 	$q = $conexion->real_escape_string($_POST['usuario']);

 	$q2 = $conexion->real_escape_string($_POST['registro']);

	$q3 = $conexion->real_escape_string($_POST['accion']);

	$q4 = $conexion->real_escape_string($_POST['fecha_i']);

	$q5 = $conexion->real_escape_string($_POST['fecha_f']);
	
	$query=consultar_auditoria_usuario_registro_accion_fechas($q,$q2,$q3,$q4,$q5);
}
//$salida_au .="<div style='height: 20em; overflow: auto;'>";


if ($query->num_rows > 0 ){
	$salida_au .= "
	
	<link rel='stylesheet' href='/facturacion/estiloT.css'>
<div class='main-container'>
	<table class='tablas' >
		
		<thead>
			<tr>
				<th>Usuario</th>
				<th>Tipo de registro</th>
				<th style='min-width:300px;'>Accion realizada</th>
				<th>Identificador</th>
				<th></th>
				<th>Fecha</th>
				<th>Hora</th>		
			</tr>
		</thead>
		<tbody>";
	while ($filas = mysqli_fetch_assoc($query)) {
$fecha= date("d/m/Y", strtotime($filas['fecha'])); 
		$salida_au .= "
					<tr>

						<td>".$filas['nick_us']."</td>
						<td>".$filas['registro']."</td>
						<td>".$filas['accion']."</td>
						<td>".$filas['codigo']."</td>
						<td>".$filas['campo']."</td>
						<td>".$fecha."</td>
						<td>".$filas['hora']."</td>
						</tr>";
	}
	$salida_au .= "</tbody></table></div>";


} else {
	$salida_au .= "<h4 class='form-h4'>no se encuentran datos</h4>";
}
//$salida_au .="</div>";
echo $salida_au;
$conexion->close();

 ?>
