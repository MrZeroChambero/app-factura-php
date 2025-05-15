<?php 
require_once('f_menu.php');
valida();
maxlvl();
$_SESSION['location']="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
ubicaciones();
if(isset($_POST['ag_an'])){
$ag_an=$conexion->real_escape_string($_POST['ag_an']);
if ($_SESSION['ubicacion'] == 'consumo1') {
	
	$_SESSION['analisis'] = $ag_an;
	$_SESSION['msg']= "<script> Swal.fire({
     title: 'correcto',
     text: 'Se ha Analisis para asignar su consumo',
     icon:'success',
     confirmButtonText: 'Bien',
     backdrop: true,
     timer: 5000,
     timerProgressBar: true,
     position: 'center',
     allowOutsideClick: false,
   allowEscapeKey: false,
   allowEnterKey: false,
   stopKeydownPropagation: true,
     showConfirmButton: true,
   confirmButtonAriaLabel: 'Confirmar',
     buttonsStyling: true,
   showCloseButton: true,
   closeButtonAriaLabel: 'cerrar alerta',
 });</script>";
echo "<script>window.location='agregar_co.php';</script>";


//sin terminar

}
}

//elimina el analisis de la variable seccion
else if(isset($_POST['eli_an'])){
$_SESSION['analisis']= null;
$_SESSION['msg']="<script> Swal.fire({
     title: 'correcto',
     text: 'Eleja un nuevo analsis',
     icon:'success',
     confirmButtonText: 'Bien',
     backdrop: true,
     timer: 5000,
     timerProgressBar: true,
     position: 'center',
     allowOutsideClick: false,
   allowEscapeKey: false,
   allowEnterKey: false,
   stopKeydownPropagation: true,
     showConfirmButton: true,
   confirmButtonAriaLabel: 'Confirmar',
     buttonsStyling: true,
   showCloseButton: true,
   closeButtonAriaLabel: 'cerrar alerta',
 });</script>";
echo "<script>window.location='agregar_co.php';</script>";
   


   } 

//registra los insumo a consumir por analisis
  else if (isset($_POST['v_in_co'])){
	//if($_POST['ub_in'] == 'consumo2'){
	$ag_an =$conexion->real_escape_string($_SESSION['analisis']);
	$id_in = $conexion->real_escape_string ($_POST['id_in']);
	$can_in = $conexion->real_escape_string ($_POST['can_in']);
	$tabla='consumo';
	$campo1='id_an_co';
	$campo2='id_in_co';
	$campo3='ca_co';
	$campo4='id_co';
	$queryb=buscar_igual2($tabla,$ag_an,$id_in,$campo1,$campo2);
	
               $res=$conexion->query($queryb);
               $resultado=mysqli_fetch_assoc($res);
               if($res->num_rows	> 0){
               	$id=$resultado['id_co'];
               	$can_co =$resultado['ca_co'];

               	$can_t=$can_co + $can_in;
               	$queryup=editar($tabla,$campo3,$campo4,$can_t,$id);	
               
               	if ($queryup == true) {
               		     echo "<script> Swal.fire({
     title: 'correcto',
     text: 'Se ha actualizado el consumo',
     icon:'success',
     confirmButtonText: 'Bien',
     backdrop: true,
     timer: 5000,
     timerProgressBar: true,
     position: 'center',
     allowOutsideClick: false,
   allowEscapeKey: false,
   allowEnterKey: false,
   stopKeydownPropagation: true,
     showConfirmButton: true,
   confirmButtonAriaLabel: 'Confirmar',
     buttonsStyling: true,
   showCloseButton: true,
   closeButtonAriaLabel: 'cerrar alerta',
 });</script>";
 echo "<script>window.location.replace('agregar_co.php');</script>";
               	}else{
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
               	
               	
               }else{

			$query=registrar3($tabla,$campo1,$campo2,$campo3,$ag_an,$id_in,$can_in);
			$comprobacion=$conexion->query($query);
			if($comprobacion){

  echo "<script> Swal.fire({
     title: 'correcto',
     text: 'Registro completado',
     icon:'success',
     confirmButtonText: 'Bien',
     backdrop: true,
     timer: 5000,
     timerProgressBar: true,
     position: 'center',
     allowOutsideClick: false,
   allowEscapeKey: false,
   allowEnterKey: false,
   stopKeydownPropagation: true,
     showConfirmButton: true,
   confirmButtonAriaLabel: 'Confirmar',
     buttonsStyling: true,
   showCloseButton: true,
   closeButtonAriaLabel: 'cerrar alerta',
 });</script>";

               $queryb=buscar_igual3($tabla,$ag_an,$id_in,$can_in,$campo1,$campo2,$campo3);
               $res=$conexion->query($queryb);
               $resultado=mysqli_fetch_assoc($res);


               $valor1=$tabla;
               $valor2=$campo4;
               $valor3='Crear';
               $valor4=$resultado['id_co'];

               $au=auditoria($valor1,$valor2,$valor3,$valor4);
               $comprobacion2=$conexion->query($au);
               if ($comprobacion2) {
                  $conexion->close(); 
               }else{
echo "<script> Swal.fire({
     title: 'Error',
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
               $conexion->close();
               }
               	echo "<script>window.location.replace('agregar_co.php');</script>";
               }
           else{
echo "<script> Swal.fire({
     title: 'Error',
     text: 'Error al registrar',
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
               $conexion->close(); 
               echo "<script>window.location.replace('agregar_co.php');</script>";
	}
}
}else{

}

 ?>
