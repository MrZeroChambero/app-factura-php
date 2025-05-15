<?php
// esto no se va a usar
    $titulo="Error";

    $msg="Verifique los datos";

    $val=msg_error($msg,$titulo);

    echo $val;

    exit();
if(!isset($_POST['agregado'])){

    echo $val;

    exit();	
}
  if (empty(trim($_POST['agregado']))) {

    echo $val;

    exit();
  }
  if (!filter_var($_POST['agregado'],FILTER_VALIDATE_INT,["options" =>["min_range"=>1, "max_range"=>100000]])) {

    echo $val;

    exit();
  }

  $agregado=$conexion->real_escape_string($_POST['agregado']);

  $verificar=verificar_analisis($agregado);

  $resultado=mysqli_fetch_assoc($verificar);

  if (!($verificar->num_rows>0)) {

    echo $val;

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
?>