<?php 	

require_once('f_menu.php');
$conexion=conectar();
$resultado = "";
$campo1 ='rif_pro';
$campo2 ='dir_pro';
$campo3 ='nom_pro';
$campo4 ='tipo_pro';
$campo5 ='correo_pro';
$tabla = 'proveedor';


$query_pro=buscar_sql($tabla,$campo1);



if (isset($_POST['en_pro1']) and ($_POST['en_pro1'] != '' )){
$q = $conexion->real_escape_string($$_POST['en_pro1']);
	$query_pro = buscar5($tabla,$q,$campo1,$campo2,$campo3,$campo4,$campo5);


} else if (isset($_SESSION['proveedor1']) and(!isset($_POST['en_pro1'])) ){

	$q = $conexion->real_escape_string($_SESSION['proveedor1']);

$query_pro=buscar_igual($tabla,$q,$campo1);

}  


$resultado=$conexion->query($query);



	$op_pro="";


					$com_pro1 = $conexion->query($query_pro);



				if ($com_pro1->num_rows > 0 ){
					$op_pro .="<table border='2'>
				<thead>
					<tr>
					<th>rif</th>
					<th>Nombre o razon social</th>
					<th>telefono</th>
					<th>direccion</th>
					<th>correo electronico</th>
					<th>tipo</th>
					</tr>
				</thead>
			<tbody border='2'>";
$com_pro = mysqli_fetch_assoc($com_pro1);

		$op_pro .= "<tr align='center'>
					<td>".$com_pro['rif_pro']."</td>
					<td>".$com_pro['nom_pro']."</td>
					<td>".$com_pro['tlf_num_pro']."</td>
					<td>".$com_pro['dir_pro']."</td>
					<td>".$com_pro['correo_pro']."</td>
					<td>".$com_pro['tipo_pro']."</td>
					<td>";
					if(!isset($_SESSION['proveedor1'])){
							$op_pro .="<form action='proce.php' method='post'>
							<input type='hidden'  value=".$com_pro['id_pro']." name='id_pro' id='id_pro'>
							<input type='submit' name='enviar_pro' value='enviar' id='enviar_pro'>
							</form></td>";
						}

$op_pro .= "</tbody></table>";
echo $op_pro;
							
} else {
		$op_pro.="Este proveedor no se encuentra registrado";
		echo $op_pro;
		
	}



 ?>