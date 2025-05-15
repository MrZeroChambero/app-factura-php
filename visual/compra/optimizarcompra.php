<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=compras"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>

<?php

			if(isset($_SESSION['msg'])){
			$msg=$_SESSION['msg'];
			echo "$msg";
			$_SESSION['msg']=null;
			
		}
	}else{
$insumos=verificar_insumo_activo();

$i=0;

$mssg="<script type='text/javascript'>
var msg='Recomiendo comprar los siguentes insumos:<br><div style=\"max-height: 350px;\">';
		";
$b="";

$mssg2="var msg2='Estos insumos estan por debajo del stock minimo, pero ya fueron solicitados:<br><div style=\"max-height: 350px;\">';";

while ($filas_insumos=mysqli_fetch_assoc($insumos)) {


//stock

$stockmin1=$filas_insumos['stockmin'];

$stockmin=($stockmin1*20)/100;

$stockmin+=$stockmin1;

/////////

$id_in=$filas_insumos['id_insumos'];

$cantidad_in=0;

$cantidad_in=$filas_insumos['cantidad_in'];

$pedidos=verificar_pedido_insumos_sin_confirmar($id_in);

////

if ($pedidos->num_rows>0) {

	$cantidad_pe=0;

	while($filas_pedidos=mysqli_fetch_assoc($pedidos)){

	$cantidad_pe+=$filas_insumos['cantidad_in'];

	}
	$cantidad_in+=$cantidad_pe;

$cantidad_normal=$cantidad_in;

if ($cantidad_in>=$stockmin) {

	if ($cantidad_normal<=$stockmin) {

		$mssg.= " msg2+='<p>".$filas_insumos['nom_in']."</p>';";
		$b=true;
	}
}


}
////

if ($cantidad_in<=$stockmin) {

        
        	$mssg.= " msg+='<p>".$filas_insumos['nom_in']."</p>';";

        	$a=true;
        
        $i++;
}





}

$mssg.="</div><br>";
if ($b==true) {
$mssg.=$mssg2;	
}

	if ($a!='') {

		$mssg.="
		var msg3=(tildes_unicode(msg));
		Swal.fire({
        title: 'Pocos insumos',
        html:msg3,
        icon:'warning',
        confirmButtonText: 'Ok',
        backdrop: true,
        timerProgressBar: true,
       position: 'center',
       allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        stopKeydownPropagation: true,
        buttonsStyling: true,
        showCloseButton: true,
        closeButtonAriaLabel: 'cerrar alerta',
     }); 
 </script>";
	} 
    

/*$mssg.="msg+='</div><p><a class=\"pushy__btn pushy__btn--md pushy__btn--blue\" href=\"index.php?pagina=comprar_recomendados\">Gestionar</a></p>';";
*/

----------------------------------------------------------------

   $verificar_informe=consultar_informe();

   if (!($verificar_informe->num_rows>0)) {
      return;
}
      
   



$insumos=verificar_insumo_activo();

$i=0;

$mssg="<script type='text/javascript'>
var msg='Los siguentes usuarios estan solucitando un cambio de clave:<br><div style=\"max-height: 350px;\">';";
$b="";

$mssg2="var msg2='<p>Para cambiar la clave, vay a consulta de usuarios</p>';";

while($filas=mysqli_fetch_assoc($verificar_informe)){

$mssg.= " msg2+='<p>".$filas['nick_us']."</p>';";
}



$mssg.="</div><br>";
if ($b==true) {
$mssg.=$mssg2;	
}

	if ($a!='') {

		$mssg.="
		var msg3=(tildes_unicode(msg));
		Swal.fire({
        title: 'Informe',
        html:msg3,
        icon:'warning',
        confirmButtonText: 'Ok',
        backdrop: true,
        timerProgressBar: true,
       position: 'center',
       allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        stopKeydownPropagation: true,
        buttonsStyling: true,
        showCloseButton: true,
        closeButtonAriaLabel: 'cerrar alerta',
     }); 
 </script>";
	} 
    

/*$mssg.="msg+='</div><p><a class=\"pushy__btn pushy__btn--md pushy__btn--blue\" href=\"index.php?pagina=comprar_recomendados\">Gestionar</a></p>';";
*/



?>