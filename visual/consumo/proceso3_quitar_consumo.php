<?php 
if(isset($_POST['quitar'])){
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
?>