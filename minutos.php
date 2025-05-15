<?php 
/*$mifecha = new DateTime(); 


$mifecha->modify('+5 minute'); 

$mifecha->format('Y-m-d H:i:s');

echo $mifecha;*/
require_once("1/1.php");
$mifecha= date('Y-m-d H:i:s'); 
$NuevaFecha = strtotime ( '+5 minute' , strtotime ($mifecha) ) ; 

$NuevaFecha = date ( 'Y-m-d H:i:s' , $NuevaFecha); 

echo $NuevaFecha;
?>