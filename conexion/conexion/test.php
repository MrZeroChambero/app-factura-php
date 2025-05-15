<?php 
require('Conexion.php');
	$data=new Conexion1();
	$conexion=$data->conect();
	$strquery ="SELECT * FROM tb_productos";
	$result = $conexion->prepare($strquery);
	$result->execute();
	$data = $result->fetchall(PDO::FETCH_ASSOC);
	
	var_dump($data);
 ?>