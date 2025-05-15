<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=consulta_usuario"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/} </script>
<?php 
if (!isset($_SESSION['autenticado'])){
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
}
nivel_maximo();

	$titulo="Verifique los datos";

	$msg="Este informe no exite";

	$valor=msg_interrogante($msg,$titulo);


if (!isset($_POST['info'])) {

	echo $valor;

	exit();	
}
if (!filter_var($_POST['info'],FILTER_VALIDATE_INT)) {

	echo $valor;

	exit();	
}
$q=$_POST['info'];

$quitar_info=borrar_informe($q);

if ($quitar_info==false) {

	$titulo="Error";

	$msg="Error al quitar informe";

	$valor=msg_error($msg,$titulo);

	echo $valor;

	exit();
}
	$titulo="Correcto";

	$msg="Se ha eliminado el informe";

	$valor=msg_positivo($msg,$titulo);


 echo $valor;
	   $verificar_informe=consultar_informe();

   if (!($verificar_informe->num_rows>0)) {
     
     exit();
}

$mssg="<script type='text/javascript'> 
function mostrar_info(){
var msg='Los siguentes usuarios <br> estan solucitando un cambio de clave:<br><div style=\"max-height: 200px;\">';";


while($filas=mysqli_fetch_assoc($verificar_informe)){
$id=$filas['id_info'];
$mssg.= " msg+='<p style=\"border-width: 1px;border-style: solid;border-color: black;\">".$filas['nick_us']."<input class=\"pushy__btn pushy__btn--md pushy__btn--red\" style=\"width:110px; height:30px; padding:0px;\" type=\"button\" value=\"Eliminar\"  onclick=\"eliminar_info(".$id.")\"></p>';";
}



$mssg.="msg+='</div><br>';";


$mssg.="
var msg3=(tildes_unicode(msg));
 const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
       cancelButton: 'btn btn-danger',
      },
     buttonsStyling: true
    })
  
   swalWithBootstrapButtons.fire({
      title: 'Informe',
     html:msg3,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Eliminar todos los informes',
     cancelButtonText: 'Cerrar',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
      	eliminar_todos();
      } else if (
       
        result.dismiss === Swal.DismissReason.cancel
      ) {

      }
    })
  }

    setTimeout(function(){mostrar_info()},0);

 </script>";

	echo $mssg;

	exit();
?>