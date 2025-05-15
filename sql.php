<?php 
require_once('f_menu.php');
	//$location1=$link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	//alert(location1);


ini_set("default_charset", "UTF-8");
mb_internal_encoding("UTF-8");
function ubicaciones(){

$vali ='';
$location1='';	
if (!isset($_SESSION['location'])) {
	$location1='';	
	$_SESSION['location']='';
}
	if (empty(trim($_SESSION['location']))) {

		
		$vali = false;
		$location1='';	
		//echo 'noexiste';
	}else{
	

	$location1=$_SESSION['location'];

}

	$login='http://localhost/facturacion/index.php';
	$gastos='http://localhost/facturacion/gastos.php';
	$menu='http://localhost/facturacion/menu_pri.php';
	$salida='http://localhost/facturacion/salir.php';
	$auditoria='http://localhost/facturacion/auditoria.php';
	$crud_usuario='http://localhost/facturacion/b_us.php';
	$crud_analisis='http://localhost/facturacion/b_an.php';
	$crud_cliente='http://localhost/facturacion/b_cli.php';
	$crud_insumos='http://localhost/facturacion/b_in.php';
	$crud_proveedor='http://localhost/facturacion/b_pro.php';
	$crud_consumo='http://localhost/facturacion/b_con.php';
	$factura='http://localhost/facturacion/fac.php';
	$compras='http://localhost/facturacion/entrada.php';
	$error = 'http://localhost/facturacion/error404.php';
	$editar ='http://localhost/facturacion/editar.php';
	$registro_in ='http://localhost/facturacion/registro_in.php';
	$registro_an ='http://localhost/facturacion/registro_an.php';
	$registro_us ='http://localhost/facturacion/registro_us.php';
	$registro_pro ='http://localhost/facturacion/registro_pro.php';
	$registro_cli ='http://localhost/facturacion/registro_cli.php';
	$sel_in='http://localhost/facturacion/select_in.php';
	$consumo ='http://localhost/facturacion/agregar_co.php';
	$consulta_consumo ='http://localhost/facturacion/consulta_consumo.php';
	$consulta_compras ='http://localhost/facturacion/consulta_compras.php';
	$consulta_factura ='http://localhost/facturacion/consulta_factura.php';
	$proceso1 ='http://localhost/facturacion/proceso1.php';
	$proceso2 ='http://localhost/facturacion/proceso2.php';
	$proceso3 ='http://localhost/facturacion/proceso3.php';
	$lista_en='http://localhost/facturacion/lista_compras.php';
	$pdf='http://localhost/facturacion/pdf3.php';
	$pdf2='http://localhost/facturacion/pdf4.php';
	
	if ($location1 == $login) {
		$vali = true;
	} else if ($location1 == $menu) {
		$vali = true;
	} else if ($location1 == $gastos) {
		$vali = true;
	}
	else if ($location1 == $pdf2) {
		$vali = true;
	}
else if ($location1 == $pdf) {
		$vali = true;
	}
	else if ($location1 == $consumo) {
		$vali = true;
	} else if ($location1 == $lista_en) {
		$vali = true;
	} else if ($location1 == $sel_in) {
		$vali = true;
	} else if ($location1 == $salida) {
		$vali = true;
	}else if ($location1 == $auditoria) {
		$vali = true;
	} else if ($location1 == $crud_cliente) {
		$vali = true;
	} else if ($location1 == $crud_analisis) {
		$vali = true;
	} else if ($location1 == $crud_insumos) {
		$vali = true;
	} else if ($location1 == $proceso1) {
		$vali = true;
	} else if ($location1 == $proceso2) {
		$vali = true;
	} else if ($location1 == $proceso3) {
		$vali = true;
	}else if ($location1 == $crud_proveedor) {
		$vali = true;
	}else if ($location1 == $crud_consumo) {
		$vali = true;
	}else if ($location1 == $crud_usuario) {
		$vali = true;
	}else if ($location1 == $factura) {
		$vali = true;
	}else if ($location1 == $compras) {
		$vali = true;
	}else if ($location1 == $error) {
		$vali = true;
	} else if ($location1 == $editar) {
		$vali = true;
	} else if ($location1 == $registro_in) {
		$vali = true;
	} else if ($location1 == $registro_an) {
		$vali = true;
	} else if ($location1 == $registro_us) {
		$vali = true;
	} else if ($location1 == $registro_pro) {
		$vali = true;
	} else if ($location1 == $registro_cli) {
		$vali = true;
	} else if ($location1 == $consulta_consumo) {
		$vali = true;
	} else if ($location1 == $consulta_compras) {
		$vali = true;
	} else if ($location1 == $consulta_factura) {
		$vali = true;
	}else{
		$vali = false;
	}
	if($vali == false){
		
		//echo "<script>window.location='error404.php';</script>"; 
		//echo "location1".$location1;
		//ho $link;
		//exit();
		

	}
	return $vali;
}
function fecha_a(){
$date=date('Y-m-d H:i:s');
return $date; 
}
function monitoreo($v)
{
                $conexion=conectar();
                $tabla='auditoria';
                $campo1='id_us_au';
                $campo2='tabla';
                $campo3='campo';
                $campo4='accion';
                $campo5='id_af';
                $campo6='fecha_aud';
                $valor1=$_SESSION['id_us'];
                $valor2=$tabla;
                $valor3='campo';
                $valor4=$v;
                $valor5=1;
                $valor6=fecha_a();
                $au=registrar6($tabla,$campo1,$campo2,$campo3,$campo4,$campo5,$campo6,$valor1,$valor2,$valor3,$valor4,$valor5,$valor6);
                return $au;
   } 
   
   function auditoria($valor2,$valor3,$valor4,$valor5)
{
	
                $conexion=conectar();
                $tabla='auditoria';
                $campo1='id_us_au';
                $campo2='tabla';
                $campo3='campo';
                $campo4='accion';
                $campo5='id_af';
                $campo6='fecha_aud';
                $valor1=$_SESSION['id_us'];
                $valor6=fecha_a();
                $au=registrar6($tabla,$campo1,$campo2,$campo3,$campo4,$campo5,$campo6,$valor1,$valor2,$valor3,$valor4,$valor5,$valor6);
                return $au;
   } 


function ubicacion($casa){
	if($casa == "c"){
		$u = 'crud';
		return $u;
	}else if($casa == 'en1'){
		$u = 'entrada1';
		return $u;
	}  else if($casa == 'en2'){
		$u = 'entrada2';
		return $u;
	}else if($casa == 're1'){
		$u = 'registro1';
		return $u;
	}  else if($casa == 're2'){
		$u = 'registro2';
		return $u;
	}else if($casa == 'co1'){
		$u = 'consumo1';
		return $u;
	}else if($casa == 'co2'){
		$u = 'consumo2';
		return $u;
	} else if ($casa == 'fac1'){
		$u = 'factura1';
		return $u;
	}else if($casa == 'fac2'){
		$u = 'factura2';
		return $u;
	}else if($casa == 'm'){
		$u = 'menu';
		return $u;
	}else if($casa == 'ed'){
		$u = 'editar';
		return $u;
	}else if(empty($casa)){
		$u = null;
		return $u;
		echo "<script>window.location='error404.php';</script>";
	} else {
		$u = null;
		return $u;
		echo "<script>window.location='error404.php';</script>";
	}
}



function buscar_sql($tabla,$campo1)
{
	$query="SELECT * FROM $tabla ORDER By $campo1";
	return $query;
}
function buscar1($tabla,$q,$campo1){

    $conexion = conectar();

    $res="SELECT * FROM $tabla WHERE $campo1 LIKE'%". $q ."%'";
   
    return $res;

}
/*
function buscar_igual($tabla,$q,$campo1){

    $conexion = conectar();

    $res="SELECT * FROM $tabla WHERE $campo1 = $q ";
   
    return $res;

}*/

function actualizar1($tabla,$campo1,$cam_id,$valor1,$id){
	$query="UPDATE $tabla SET $campo1 = '{$valor1}' WHERE $tabla . $cam_id = '{$id}'";
	return $query;
}		
function actualizar2($tabla,$campo1,$campo2,$cam_tb,$valor1,$valor2,$id){
	$query="UPDATE $tabla SET $campo1 = '{$valor1}', $campo2 = '{$valor2}' WHERE $tabla.$cam_tb = '{$id}'";
	var_dump($query);
	return $query;
}
function actualizar3($tabla,$campo1,$campo2,$campo3,$valor1,$valor2,$valor3,$id){
	$query="UPDATE $tabla SET $campo1 = '{$valor1}', $campo2 = '{$valor2}', $campo3 = '{$valor3}' WHERE $tabla.$campo1 = '{$id}'";
	return $query;
}

function buscar_igual($tabla,$q,$campo1){

    $conexion = conectar();

    $res="SELECT * FROM $tabla WHERE $campo1 = '{$q}' ";
   
    return $res;

}
function union2($tabla1,$tabla2,$tabla1_cam,$tabla2_cam){
	$conexion = conectar();
$query="SELECT * FROM $tabla1 INNER JOIN $tabla2 ON $tabla1_cam = $tabla2_camp";
$resultado =  $conexion->query($query);
return $resultado;
}
function union3($tabla1,$tabla2,$tabla3,$tabla1_cam,$tabla1_cam2,$tabla2_cam,$tabla3_cam){
	   $conexion = conectar();
	$query="SELECT * FROM $tabla1 INNER JOIN $tabla2 ON $tabla1_cam = $tabla2_cam INNER JOIN $tabla3 ON $tabla1_cam2 = $tabla3_cam";
	//var_dump($query);
$resultado=  $conexion->query($query);
return $resultado;
}
function editar($tabla,$cam_ac,$id_nom,$valor_intro,$valor_id){
 $conexion = conectar();
            $actualizar=actualizar1($tabla,$cam_ac,$id_nom,$valor_intro,$valor_id);
            //var_dump($actualizar);
            $comprobacion=$conexion->query($actualizar);
            if($comprobacion){
            	$V=true;
               $valor=$tabla;
               $valor2=$cam_ac;
               $valor3='actualizar';
               $valor4=$valor_id;
               $au=auditoria($valor,$valor2,$valor3,$valor4);
               $comprobacion2=$conexion->query($au);
               if (!($comprobacion2)) {
                echo "<script> Swal.fire({
     title: 'Error auditoria',
     text: 'Error en la auditoria',
     icon:'error',
     confirmButtonText: 'Ok',
     backdrop: true,
     timer: 5000,
     timerProgressBar: true,
    position: 'center',
    allowOutsideClick: false,
   allowEscapeKey: false,
   allowEnterKey: false,
   stopKeydownPropagation: true,
    //  showConfirmButton: true,
   // confirmButtonColor:
   // confirmButtonAriaLabel: 'Confirmar',
   // showCancelButton: true,
    //  cancelButtonText: 'Cancelar',
   // cancelButtonColor:
   // cancelButtonAriaLabel: 'Cancelar',
     buttonsStyling: true,
   showCloseButton: true,
   closeButtonAriaLabel: 'cerrar alerta',
  });</script>";

               }
               
                 }else{
                 	$V=false;
                 	 
               echo "<script> Swal.fire({
     title: 'Error',
     text: 'Error al actualizar',
     icon:'error',
     confirmButtonText: 'Ok',
     backdrop: true,
     timer: 5000,
     timerProgressBar: true,
    position: 'center',
    allowOutsideClick: false,
   allowEscapeKey: false,
   allowEnterKey: false,
   stopKeydownPropagation: true,
    //  showConfirmButton: true,
   // confirmButtonColor:
   // confirmButtonAriaLabel: 'Confirmar',
   // showCancelButton: true,
    //  cancelButtonText: 'Cancelar',
   // cancelButtonColor:
   // cancelButtonAriaLabel: 'Cancelar',
     buttonsStyling: true,
   showCloseButton: true,
   closeButtonAriaLabel: 'cerrar alerta',
  });</script>";
            }
             $conexion->close();
             return $V;
}
function buscar_igual2($tabla,$q1,$q2,$campo1,$campo2){

    $conexion = conectar();

    $res="SELECT * FROM $tabla WHERE $campo1 = '{$q1}' AND $campo2 = '{$q2}'";
   
    return $res;

}

function buscar_igual3($tabla,$q1,$q2,$q3,$campo1,$campo2,$campo3){

    $conexion = conectar();

    $res="SELECT * FROM $tabla WHERE $campo1 = '{$q1}' AND $campo2 = '{$q2}' AND $campo3 = '{$q3}'";
   
    return $res;

}
function buscar_igual4($tabla,$q1,$q2,$q3,$q4,$campo1,$campo2,$campo3,$campo4){

    $conexion = conectar();

    $res="SELECT * FROM $tabla WHERE $campo1 = '{$q1}' AND $campo2 = '{$q2}' AND $campo3 = '{$q3}'AND $campo4 = '{$q4}'";
   
    return $res;

}
function buscar_igual5($tabla,$q1,$q2,$q3,$q4,$q5,$campo1,$campo2,$campo3,$campo4,$campo5){

    $conexion = conectar();

    $res="SELECT * FROM $tabla WHERE $campo1 = '{$q1}' AND $campo2 = '{$q2}' AND $campo3 = '{$q3}'AND $campo4 = '{$q4}'AND $campo5 = '{$q5}'";
   
    return $res;

}
function buscar_igual6($tabla,$q1,$q2,$q3,$q4,$q5,$q6,$campo1,$campo2,$campo3,$campo4,$campo5,$campo6){

    $conexion = conectar();

    $res="SELECT * FROM $tabla WHERE $campo1 = '{$q1}' AND $campo2 = '{$q2}' AND $campo3 = '{$q3}'AND $campo4 = '{$q4}'AND $campo5 = '{$q5}'AND $campo6 = '{$q6}'";
   //echo $res;
    return $res;

}
function buscar_igual7($tabla,$q1,$q2,$q3,$q4,$q5,$q6,$q7,$campo1,$campo2,$campo3,$campo4,$campo5,$campo6,$campo7){

    $conexion = conectar();

    $res="SELECT * FROM $tabla WHERE $campo1 = '{$q1}' AND $campo2 = '{$q2}' AND $campo3 = '{$q3}'AND $campo4 = '{$q4}'AND $campo5 = '{$q5}'AND $campo6 = '{$q6}' AND $campo7 = '{$q7}'";
   //echo $res;
    return $res;

}
function buscar_igual8($tabla,$q1,$q2,$q3,$q4,$q5,$q6,$q7,$q8,$campo1,$campo2,$campo3,$campo4,$campo5,$campo6,$campo7,$campo8){

    $conexion = conectar();

    $res="SELECT * FROM $tabla WHERE $campo1 = '{$q1}' AND $campo2 = '{$q2}' AND $campo3 = '{$q3}'AND $campo4 = '{$q4}'AND $campo5 = '{$q5}'AND $campo6 = '{$q6}' AND $campo7 = '{$q7}'AND $campo8 = '{$q8}'";
   //echo $res;
    return $res;

}
function buscar_igual9($tabla,$q1,$q2,$q3,$q4,$q5,$q6,$q7,$q8,$q9,$campo1,$campo2,$campo3,$campo4,$campo5,$campo6,$campo7,$campo8,$campo9){

    $conexion = conectar();

    $res="SELECT * FROM $tabla WHERE $campo1 = '{$q1}' AND $campo2 = '{$q2}' AND $campo3 = '{$q3}'AND $campo4 = '{$q4}'AND $campo5 = '{$q5}'AND $campo6 = '{$q6}' AND $campo7 = '{$q7}'AND $campo8 = '{$q8}' AND $campo9 = '{$q9}'";
   //echo $res;
    return $res;

}
function buscar2($tabla,$q,$campo1,$campo2){
	conectar();
	$conexion = conectar();
   		 $res="SELECT * FROM $tabla WHERE $campo LIKE'%". $q ."%' OR $campo2 LIKE '%". $q ."%'";
 
         return $res;
}
function buscar3($tabla,$q,$campo1,$campo2,$campo3){
	conectar();
	$conexion = conectar();
    
    $res="SELECT * FROM $tabla WHERE $campo1 LIKE'%". $q ."%' OR $campo2 LIKE'%". $q ."%'OR $campo3 LIKE'%". $q ."%'";
 
     return $res;
}
function buscar4($tabla,$q,$campo1,$campo2,$campo3,$campo4){
	conectar();
	$conexion = conectar();
    
    $res="SELECT * FROM $tabla WHERE $campo1 LIKE'%". $q ."%' OR $campo2 LIKE '%". $q ."%' OR $campo3 LIKE'%". $q ."%' OR $campo4 LIKE'%". $q ."%'";
 
     return $res;
}


function buscar5($tabla,$q,$campo1,$campo2,$campo3,$campo4,$campo5){
	conectar();
	$conexion = conectar();
	
	
	$query="SELECT * FROM $tabla WHERE $campo1 LIKE'%". $q ."%' OR $campo2 LIKE'%". $q ."%'OR $campo3 LIKE'%". $q ."%'  OR $campo4 LIKE'%". $q ."%' OR $campo5 LIKE'%". $q ."%' ";

return $query;
}
function buscar6($tabla,$q,$campo1,$campo2,$campo3,$campo4,$campo5,$campo6){
	conectar();
	$conexion = conectar();
	
	
	$query="SELECT * FROM $tabla WHERE $campo1 LIKE'%". $q ."%' OR $campo2 LIKE'%". $q ."%'OR $campo3 LIKE'%". $q ."%'  OR $campo4 LIKE'%". $q ."%' OR $campo5 LIKE'%". $q ."%' OR $campo6 LIKE'%". $q ."%'";

return $query;
}
function buscar7($tabla,$q,$campo1,$campo2,$campo3,$campo4,$campo5,$campo6,$campo7){
	conectar();
	$conexion = conectar();
	
	
	$query="SELECT * FROM $tabla WHERE $campo1 LIKE'%". $q ."%' OR $campo2 LIKE'%". $q ."%'OR $campo3 LIKE'%". $q ."%'  OR $campo4 LIKE'%". $q ."%' OR $campo5 LIKE'%". $q ."%' OR $campo6 LIKE'%". $q ."%'OR $campo7 LIKE'%". $q ."%'";

return $query;
}
function buscar8($tabla,$q,$campo1,$campo2,$campo3,$campo4,$campo5,$campo6,$campo7,$campo8){
	conectar();
	$conexion = conectar();
	
	
	$query="SELECT * FROM $tabla WHERE $campo1 LIKE'%". $q ."%' OR $campo2 LIKE'%". $q ."%'OR $campo3 LIKE'%". $q ."%'  OR $campo4 LIKE'%". $q ."%' OR $campo5 LIKE'%". $q ."%' OR $campo6 LIKE'%". $q ."%'OR $campo7 LIKE'%". $q ."%' OR $campo8 LIKE'%". $q ."%'";

return $query;
}
function registrar3($tabla,$campo1,$campo2,$campo3,$valor1,$valor2,$valor3)
{
		conectar();
	$conexion = conectar();
	$query="INSERT into $tabla($campo1,$campo2,$campo3) VALUES('$valor1','$valor2','$valor3')";
	return $query;

}
function registrar4($tabla,$campo1,$campo2,$campo3,$campo4,$valor1,$valor2,$valor3,$valor4)
{
		conectar();
	$conexion = conectar();
	$query="INSERT into $tabla($campo1,$campo2,$campo3,$campo4) VALUES('$valor1','$valor2','$valor3','$valor4')";
	return $query;

}
function registrar5($tabla,$campo1,$campo2,$campo3,$campo4,$campo5,$valor1,$valor2,$valor3,$valor4,$valor5)
{
		conectar();
	$conexion = conectar();
	$query="INSERT into $tabla($campo1,$campo2,$campo3,$campo4,$campo5) VALUES('$valor1','$valor2','$valor3','$valor4','$valor5')";
	return $query;

}
function registrar6($tabla,$campo1,$campo2,$campo3,$campo4,$campo5,$campo6,$valor1,$valor2,$valor3,$valor4,$valor5,$valor6)
{
		conectar();
	$conexion = conectar();
	$query="INSERT into $tabla($campo1,$campo2,$campo3,$campo4,$campo5,$campo6) VALUES('$valor1','$valor2','$valor3','$valor4','$valor5','$valor6')";
	return $query;

}
function registrar7($tabla,$campo1,$campo2,$campo3,$campo4,$campo5,$campo6,$campo7,$valor1,$valor2,$valor3,$valor4,$valor5,$valor6,$valor7)
{
		conectar();
	$conexion = conectar();
	$query="INSERT into $tabla($campo1,$campo2,$campo3,$campo4,$campo5,$campo6,$campo7) VALUES('{$valor1}','{$valor2}','{$valor3}','{$valor4}','{$valor5}','{$valor6}','{$valor7}')";
	return $query;

}
function registrar8($tabla,$campo1,$campo2,$campo3,$campo4,$campo5,$campo6,$campo7,$campo8,$valor1,$valor2,$valor3,$valor4,$valor5,$valor6,$valor7,$valor8)
{
		conectar();
	$conexion = conectar();
	$query="INSERT into $tabla($campo1,$campo2,$campo3,$campo4,$campo5,$campo6,$campo7,$campo8) VALUES('{$valor1}','{$valor2}','{$valor3}','{$valor4}','{$valor5}','{$valor6}','{$valor7}','{$valor8}')";
	return $query;

}
function registrar9($tabla,$campo1,$campo2,$campo3,$campo4,$campo5,$campo6,$campo7,$campo8,$campo9,$valor1,$valor2,$valor3,$valor4,$valor5,$valor6,$valor7,$valor8,$valor9)
{
		conectar();
	$conexion = conectar();
	$query="INSERT into $tabla($campo1,$campo2,$campo3,$campo4,$campo5,$campo6,$campo7,$campo8,$campo9) VALUES('{$valor1}','{$valor2}','{$valor3}','{$valor4}','{$valor5}','{$valor6}','{$valor7}','{$valor8}','{$valor9}')";
	return $query;

}
function insertar3_au($tabla,$campo1,$campo2,$campo3,$valor1,$valor2,$valor3,$id_cre){
	$conexion = conectar();
	$query=registrar3($tabla,$campo1,$campo2,$campo3,$valor1,$valor2,$valor3);
$resultado=$conexion->query($query);
if ($resultado){
	$query_b=buscar_igual3($tabla,$valor1,$valor2,$valor3,$campo1,$campo2,$campo3);
	$resultado1=$conexion->query($query_b);
	$res2=mysqli_fetch_assoc($resultado1);
	$valor_id=$res2[$id_cre];
               $valor=$tabla;
               $valor2=$id_cre;
               $valor3='Crear';
               $valor4=$valor_id;
               $au=auditoria($valor,$valor2,$valor3,$valor4);
               $comprobacion2=$conexion->query($au);
               if (!($comprobacion2)) {
                echo " <script>alert('error auditoria');</script>";
               }
   }else{
                 	 
                echo " <script>alert('error al crear');</script>";
            }
            
return $resultado;
 $conexion->close();
}
function insertar4_au($tabla,$campo1,$campo2,$campo3,$campo4,$valor1,$valor2,$valor3,$valor4,$id_cre){
	$conexion = conectar();
	$query=registrar4($tabla,$campo1,$campo2,$campo3,$campo4,$valor1,$valor2,$valor3,$valor4);
$resultado=$conexion->query($query);
if ($resultado){
	$query_b=buscar_igual4($tabla,$valor1,$valor2,$valor3,$valor4,$campo1,$campo2,$campo3,$campo4);
	$resultado1=$conexion->query($query_b);
	$res2=mysqli_fetch_assoc($resultado1);
	$valor_id=$res2[$id_cre];
	$_SESSION['id_cre']=$valor_id;
               $valor=$tabla;
               $valor2=$id_cre;
               $valor3='Crear';
               $valor4=$valor_id;
               $au=auditoria($valor,$valor2,$valor3,$valor4);
               $comprobacion2=$conexion->query($au);
               if (!($comprobacion2)) {
                echo " <script>alert('error auditoria');</script>";
               }
   }else{
                 	 
                echo " <script>alert('error al crear');</script>";
            }
            
return $resultado;
 $conexion->close();
}
function insertar5_au($tabla,$campo1,$campo2,$campo3,$campo4,$campo5,$valor1,$valor2,$valor3,$valor4,$valor5,$id_cre){
	$conexion = conectar();
	$query=registrar5($tabla,$campo1,$campo2,$campo3,$campo4,$campo5,$valor1,$valor2,$valor3,$valor4,$valor5);
$resultado=$conexion->query($query);
if ($resultado){
	$query_b=buscar_igual5($tabla,$valor1,$valor2,$valor3,$valor4,$valor5,$campo1,$campo2,$campo3,$campo4,$campo5);
	$resultado1=$conexion->query($query_b);
	$res2=mysqli_fetch_assoc($resultado1);
	$valor_id=$res2[$id_cre];
	$_SESSION['id_cre']=$valor_id;
               $valor=$tabla;
               $valor2=$id_cre;
               $valor3='Crear';
               $valor4=$valor_id;
               $au=auditoria($valor,$valor2,$valor3,$valor4);
               $comprobacion2=$conexion->query($au);
               if (!($comprobacion2)) {
                echo " <script>alert('error auditoria');</script>";
               }
   }else{
                 	 
                echo " <script>alert('error al crear');</script>";
            }
            
return $resultado;
 $conexion->close();
}
function insertar6_au($tabla,$campo1,$campo2,$campo3,$campo4,$campo5,$campo6,$valor1,$valor2,$valor3,$valor4,$valor5,$valor6,$id_cre){
	$conexion = conectar();
	$query=registrar6($tabla,$campo1,$campo2,$campo3,$campo4,$campo5,$campo6,$valor1,$valor2,$valor3,$valor4,$valor5,$valor6);
$resultado=$conexion->query($query);
echo $query;
if ($resultado){
	$query_b=buscar_igual6($tabla,$valor1,$valor2,$valor3,$valor4,$valor5,$valor6,$campo1,$campo2,$campo3,$campo4,$campo5,$campo6);
	$resultado1=$conexion->query($query_b);
	$res2=mysqli_fetch_assoc($resultado1);
	$valor_id=$res2[$id_cre];
	$_SESSION['id_cre']=$valor_id;
               $valor=$tabla;
               $valor2=$id_cre;
               $valor3='Crear';
               $valor4=$valor_id;
               $au=auditoria($valor,$valor2,$valor3,$valor4);
               $comprobacion2=$conexion->query($au);
               if (!($comprobacion2)) {
                echo " <script>alert('error auditoria');</script>";
               }
   }else{
                 	 
                echo " <script>alert('error al crear');</script>";
            }
            
return $resultado;
 $conexion->close();
}
function insertar7_au($tabla,$campo1,$campo2,$campo3,$campo4,$campo5,$campo6,$campo7,$valor1,$valor2,$valor3,$valor4,$valor5,$valor6,$valor7,$id_cre){
	$conexion = conectar();
	$query=registrar7($tabla,$campo1,$campo2,$campo3,$campo4,$campo5,$campo6,$campo7,$valor1,$valor2,$valor3,$valor4,$valor5,$valor6,$valor7);
	var_dump($query);
$resultado=$conexion->query($query);
if ($resultado){
	$query_b=buscar_igual7($tabla,$valor1,$valor2,$valor3,$valor4,$valor5,$valor6,$valor7,$campo1,$campo2,$campo3,$campo4,$campo5,$campo6,$campo7);
	var_dump($query_b);
	$resultado1=$conexion->query($query_b);
	$res2=mysqli_fetch_assoc($resultado1);
	$valor_id=$res2[$id_cre];
	$_SESSION['id_cre']=$valor_id;
               $valor=$tabla;
               $valor2=$id_cre;
               $valor3='Crear';
               $valor4=$valor_id;
               $au=auditoria($valor,$valor2,$valor3,$valor4);
               $comprobacion2=$conexion->query($au);
               if (!($comprobacion2)) {
                echo " <script>alert('error auditoria');</script>";
               }
   }else{
                 	 
                echo " <script>alert('error al crear');</script>";
            }
            
return $resultado;
 $conexion->close();
}
function insertar8_au($tabla,$campo1,$campo2,$campo3,$campo4,$campo5,$campo6,$campo7,$campo8,$valor1,$valor2,$valor3,$valor4,$valor5,$valor6,$valor7,$valor8,$id_cre){
	$conexion = conectar();
	$query=registrar8($tabla,$campo1,$campo2,$campo3,$campo4,$campo5,$campo6,$campo7,$campo8,$valor1,$valor2,$valor3,$valor4,$valor5,$valor6,$valor7,$valor8);
	var_dump($query);
$resultado=$conexion->query($query);
if ($resultado){
	$query_b=buscar_igual8($tabla,$valor1,$valor2,$valor3,$valor4,$valor5,$valor6,$valor7,$valor8,$campo1,$campo2,$campo3,$campo4,$campo5,$campo6,$campo7,$campo8);
	var_dump($query_b);
	$resultado1=$conexion->query($query_b);
	$res2=mysqli_fetch_assoc($resultado1);
	$valor_id=$res2[$id_cre];
	$_SESSION['id_cre']=$valor_id;
               $valor=$tabla;
               $valor2=$id_cre;
               $valor3='Crear';
               $valor4=$valor_id;
               $au=auditoria($valor,$valor2,$valor3,$valor4);
               $comprobacion2=$conexion->query($au);
               if (!($comprobacion2)) {
                echo " <script>alert('error auditoria');</script>";
               }
   }else{
                 	 
                echo " <script>alert('error al crear');</script>";
            }
            
return $resultado;
 $conexion->close();
}
function insertar9_au($tabla,$campo1,$campo2,$campo3,$campo4,$campo5,$campo6,$campo7,$campo8,$campo9,$valor1,$valor2,$valor3,$valor4,$valor5,$valor6,$valor7,$valor8,$valor9,$id_cre){
	echo "insertar9";
	$conexion = conectar();
	$query=registrar9($tabla,$campo1,$campo2,$campo3,$campo4,$campo5,$campo6,$campo7,$campo8,$campo9,$valor1,$valor2,$valor3,$valor4,$valor5,$valor6,$valor7,$valor8,$valor9);
	var_dump($query);
$resultado=$conexion->query($query);
if ($resultado){
	$query_b=buscar_igual9($tabla,$valor1,$valor2,$valor3,$valor4,$valor5,$valor6,$valor7,$valor8,$valor9,$campo1,$campo2,$campo3,$campo4,$campo5,$campo6,$campo7,$campo8,$campo9);
	var_dump($query_b);
	$resultado1=$conexion->query($query_b);
	$res2=mysqli_fetch_assoc($resultado1);
	$valor_id=$res2[$id_cre];
	$_SESSION['id_cre']=$valor_id;
               $valor=$tabla;
               $valor2=$id_cre;
               $valor3='Crear';
               $valor4=$valor_id;
               $au=auditoria($valor,$valor2,$valor3,$valor4);
               $comprobacion2=$conexion->query($au);
               if (!($comprobacion2)) {
                echo " <script>alert('error auditoria');</script>";
               }
   }else{
                 	 
                echo " <script>alert('error al crear');</script>";
            }
            
return $resultado;
 $conexion->close();
}


function insertar3($tabla,$campo1,$campo2,$campo3,$valor1,$valor2,$valor3){
	$conexion = conectar();
	$query=registrar3($tabla,$campo1,$campo2,$campo3,$valor1,$valor2,$valor3);
	echo 'culo';
	//var_dump($query);
$resultado=$conexion->query($query);
if (!($resultado)){
	echo " <script>alert('error al crear');</script>";
	return $resultado;
	$r=false;
}else{
$r=true;
$conexion->close();
}
return $r;
}
function insertar4($tabla,$campo1,$campo2,$campo3,$campo4,$valor1,$valor2,$valor3,$valor4){
	$conexion = conectar();
	$query=registrar4($tabla,$campo1,$campo2,$campo3,$campo4,$valor1,$valor2,$valor3,$valor4);
	//var_dump($query);
$resultado=$conexion->query($query);
if (!($resultado)){
	echo " <script>alert('error al crear');</script>";
	return $resultado;
}else{
return $resultado;
$conexion->close();
}
}



function limpiar_lista($tabla,$campo1){
	$conexion = conectar();

	$query=buscar_sql($tabla,$campo1);
	//var_dump($query);

	$resultado=$conexion->query($query);
	if ($resultado->num_rows > 0) {
		borrar_todo($tabla);
		}
		$conexion->close();
		
	}
function borrar_todo($tabla){
	$conexion = conectar();
	$query1="SELECT * FROM $tabla";
	$comprobacion=$conexion->query($query1);
	if ($comprobacion->num_rows>0) {
			$query="DELETE FROM $tabla";
	$resultado=$conexion->query($query);
	if (!($resultado)) {
		echo " <script>alert('error al borrar');</script>";
	}
		
	}

	//var_dump($query);
	$conexion->close();

}

function limpiar_procesos(){
	if (isset($_SESSION['analisis'])) {
		$_SESSION['analisis']=null;
	}
	if (isset($_SESSION['proveedor1'])) {
		$_SESSION['proveedor1']=null;
		$tabla2='lista_compra';
$querycomp=borrar_todo($tabla2);
	}
	if (isset($_SERVER['cliente'])) {
		$_SESSION['cliente']=null;
		$tabla1='carrito';
$queryfac=borrar_todo($tabla1);
	}
	$tabla='insumos_temp';
$query=borrar_todo($tabla);


}

 ?>
