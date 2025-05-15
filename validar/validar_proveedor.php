<?php 
$patron_texto = "/^[a-zA-ZáéíóúñüÁÉÍÓÚÑÜ.\s]+$/";

$patron_texto_sin_espacios = "/^[0-9a-zA-ZáéíóúñüÁÉÍÓÚÑÜ]+$/";

$patron_numeros = "/^[2-3]+$/";

$patron_numeros_completo = "/^[0-9]+$/";

$patron_completo = "/^[0-9a-zA-Z\sáéíóúñüÁÉÍÓÚÑÜ]+$/";

$vacio=true;

if (empty(trim($_POST['nom_pro'])) 

    and empty(trim($_POST['rif_pro']))

    and empty(trim($_POST['num_tlf_pro'])) 

    and empty(trim($_POST['dir_pro'])) 

    and empty(trim($_POST['tipo_pro'])) 

    and empty(trim($_POST['correo_pro']))) {

    $titulo="Campos vacios";

    $msg="Complete todos los campos, <br> faltan:";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}
$campo_f="";
if (empty(trim($_POST['nom_pro']))){
$vacio=false;
$campo_f.="Nombre";
}
if (empty(trim($_POST['rif_pro']))) {
$vacio=false;
$campo_f.=", RIF";
}
  if (empty(trim($_POST['num_tlf_pro']))) {
$vacio=false;
$campo_f.=", Telefono";                        
}            	             

if (empty(trim($_POST['dir_pro']))) {
$vacio=false;

$campo_f.=", Dirección";
}
if (empty(trim($_POST['correo_pro']))) {
$vacio=false;

$campo_f.=", Correo";
}

if (!isset($_POST['tipo_pro'])) {
 $vacio=false;

$campo_f.=", Correo";   
}
if (empty(trim($_POST['tipo_pro']))) {
 $vacio=false;

$campo_f.=", Tipo de rif";   
}
if (!isset($_POST['rif_2'])) {
 $vacio=false;

$campo_f.=", Rif";   
}

if ($vacio==false) {

    $titulo="Campos vacio";

    $msg="Complete todos los campos";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();
}

if (!filter_var($_POST['tipo_pro'],FILTER_VALIDATE_INT,["options" =>["min_range"=>1, "max_range"=>5]])) {
 
    $titulo="Tipo de rif";

    $msg="Elija el tipo de rif";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit(); 

}

if (!filter_var($_POST['rif_2'],FILTER_VALIDATE_INT,["options" =>["min_range"=>1, "max_range"=>10]])) {

    $titulo="Rif inválido";

    $msg="Eleja el ultimo numero, debe estar entre 0 y 9";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();    
}


$rif=$_POST['rif_pro'];

if (!preg_match($patron_numeros_completo,$rif)) {

    $titulo="Rif inválido";

    $msg="Ingrese un Rif válido,  no utilice comas ni puntos porfavor";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}
$validar_rif=validar_float($rif);
if ($validar_rif==false) {
    $titulo="Rif inválido";

    $msg="Ingrese un Rif válido,  no utilice comas ni puntos porfavor";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();  
}
             
 if (strlen($rif)!=8) {

    $titulo="Rif inválido";

    $msg="Ingrese un Rif válido, debe tener 8 numeros, no utilice comas ni puntos porfavor";

    $val=msg_interrogante($msg,$titulo);

    echo $val;
    exit();  

 }


$nombre=trim($_POST['nom_pro']);

if( !preg_match($patron_completo, $nombre)){

    $titulo="Nombre no válida";

    $msg="El nombre solo debe contener letras, numeros o espacios";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}

if (strlen($nombre)>40) {

    $titulo="Nombre muy largo";

    $msg="El nombre no debe pasar de 40 caracteres";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}
if (strlen($nombre)<3) {

    $titulo="Nombre muy corto";

    $msg="El nombre no debe ser menor de 3 caracteres";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}

    $Dirección=trim($_POST['dir_pro']);

 if( !preg_match($patron_completo, $Dirección)){

    $titulo="Dirección no válida";

    $msg="La dirección solo debe contener letras, numeros o espacios";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}

if (strlen($Dirección)>40) {

    $titulo="Dirección muy larga";

    $msg="La dirección no debe pasar de 40 caracteres";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}

if (strlen($Dirección)<3) {

    $titulo="Dirección muy corta";

    $msg="La Dirección no debe ser menor de 3 caracteres";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}

$correo=trim($_POST['correo_pro']);

if (!filter_var($correo,FILTER_VALIDATE_EMAIL)) {

    $titulo="Correo inválido";

    $msg="Ingrese una direcciónde correo válida";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}

    $tlf=$_POST['num_tlf_pro'];

    $titulo="Numero de telefono";

    $msg="Ingrese un numero de telefono, no utilice comas ni puntos porfavor";

    $val=msg_interrogante($msg,$titulo);


if (!preg_match($patron_numeros_completo,$tlf)) {

    echo $val;

    exit();

}

if ($tlf<2000000000) {
    
    echo $val;

    exit();

}               
             
if(strlen($tlf)!=11) {

    echo $val;

    exit();
 }   


if ($tlf>9000000000) {

    echo $val;

    exit();

}
$validar_tlf=validar_float($tlf);

if ($validar_tlf==false) {

      echo $val;

    exit();                         
} 

?>