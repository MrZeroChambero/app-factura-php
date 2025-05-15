<?php 
require_once('f_menu.php');
valida();
maxlvl();
$_SESSION['location']="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
ubicaciones();
if (isset($_POST['quitar']) and isset($_POST['agregado'])) {

 echo "<script>window.location.replace('consulta_consumo.php');</script>";
 exit();
} 
if (!isset($_POST['quitar']) and!isset($_POST['agregado']) ) {

 echo "<script>window.location.replace('consulta_consumo.php');</script>";
 exit();
}
if(isset($_POST['agregado'])){
  if (empty(trim($_POST['agregado']))) {

  echo "<script>window.location.replace('consulta_consumo.php');</script>";
  exit();
  }
  if (!filter_var($_POST['agregado'],FILTER_VALIDATE_INT,["options" =>["min_range"=>1, "max_range"=>100000]])) {

  echo "<script>window.location.replace('consulta_consumo.php');</script>"; 
  exit();
  }

  $agregado=$conexion->real_escape_string($_POST['agregado']);

  $verificar=$conexion->query("SELECT * FROM analisis WHERE id_an = '{$agregado}'");

  $resultado=mysqli_fetch_assoc($verificar);

  if (!($verificar->num_rows>0)) {

   echo "<script>window.location.replace('consulta_consumo.php');</script>"; 
   exit();
  }
  if ($_SESSION['ubicacion'] == 'consulta_consumo') {
    	$_SESSION['analisis_b'] = $agregado;
    	$_SESSION['msg']= "<script> Swal.fire({
         title: 'correcto',
         text: '',
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
  echo "<script>window.location.replace('consulta_consumo.php');</script>";
  }else{
  echo "<script>window.location.replace('consulta_consumo.php');</script>";  
  }

}
else if(isset($_POST['quitar'])){
      if ($_SESSION['ubicacion'] != 'consulta_consumo2') {
       echo "<script>window.location.replace('consulta_consumo.php');</script>";   
      }
      $_SESSION['analisis_b']= null;
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
      echo "<script>window.location.replace('consulta_consumo.php');</script>";
} 
$_SESSION['location']=null;