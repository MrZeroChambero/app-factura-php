<?php 
$vacio=true;

$patron_texto = "/^[a-zA-Z\sáéíóúñüÁÉÍÓÚÑÜ]+$/";

$patron_texto_numeros = "/^[0-9a-zA-Z\sáéíóúñüÁÉÍÓÚÑÜ]+$/";

$patron_texto_sin_espacios = "/^[0-9a-zA-ZáéíóúñüÁÉÍÓÚÑÜ]+$/";

$patron_numeros = "/^[2-3]+$/";

$patron_numeros_completo = "/^[0-9]+$/";

if ((!isset($_POST['cod_an'])) 
    and (!isset($_POST['pre_an'])) 
    and (!isset($_POST['nom_an'])) 
    and (!isset($_POST['des_an'])) 
    and (!isset($_POST['tipo_an']))) {

    $titulo="Campos vacios";

    $msg="Complete todos los campos";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();
}
if (empty(trim($_POST['cod_an']))) {
    $vacio=false;
}
if (empty(trim($_POST['pre_an']))) {
    $vacio=false;
}
if (empty(trim($_POST['nom_an']))) {
    $vacio=false;
}
if (empty(trim($_POST['des_an']))) {
    $vacio=false;
}
if (empty(trim($_POST['tipo_an']))) {
    $vacio=false;
}

if (!isset($_POST['pre_an2'])) {
	$precio2="00";
}
if ($vacio==false) {

    $titulo="Campo vacios";

    $msg="Complete todos los campos";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}
$codigo=trim($_POST['cod_an']);

$validar_codigo=validar_float($codigo);

if ($validar_codigo==false) {
      $titulo="código incorrecta";

    $msg="Ingrese un código válido, porfavor no use comas ni puntos";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();  
}
if ($codigo<0) {
       $titulo="código incorrecta";

    $msg="Ingrese un código válido, porfavor no use comas ni puntos";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();     
}
if ($codigo==0) {
       $titulo="código incorrecta";

    $msg="Ingrese un código válido, porfavor no use comas ni puntos";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();     
}
if (strlen($codigo)!=6) {
     $titulo="código incorrecta";

    $msg="Ingrese un código válido,<br> debe tener 6 digitos, <br> porfavor no use comas ni puntos";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();   
}

/*if (!filter_var($codigo,FILTER_VALIDATE_INT)){

    $titulo="Codigo incorrecta";

    $msg="Ingrese un codigo valido, porfavor no use comas ni puntos";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}
    if (!filter_var($codigo,FILTER_VALIDATE_INT,["options" =>["min_range"=>100, "max_range"=>1000000000]])) {

    $titulo="Codigo incorrecta";

    $msg="El codigo debe estar entre 100 y 1000000000";// hay que ajustarlo a la cantidad de digitos

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();
     
}*/
$nombre=trim($_POST['nom_an']);

if( !preg_match($patron_texto_numeros, $nombre)){

    $titulo="Nombre no válido";

    $msg="El nombre solo debe contener letras, numeros y espacios";

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
    $precio=$_POST['pre_an'];

    $validar_precio=validar_float($precio);

if ($validar_precio==false){

    $titulo="Precio inválido";

    $msg="Ingrese un Precio valido, <br> solo debe ser numeros y use punto para expresar los decimales, <br> solo use 2 deciamles";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}
$validar_completo=validar_numeros_zero($precio);

if ($validar_completo==false){

    $titulo="Precio inválido";

    $msg="Ingrese un Precio válido , <br> solo debe ser numeros y use punto para expresar los decimales, <br> solo use 2 deciamles";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}
if ($precio<=0) {
    $titulo="Precio inválido";

    $msg="Ingrese un Precio válido, <br> solo debe ser numeros y use punto para expresar los decimales, <br> debe ser mayor que cero";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();  
}
if ($precio<0.01) {
    $titulo="Precio inválido";

    $msg="Ingrese un Precio válido, <br> solo debe ser numeros y use punto para expresar los decimales, <br> debe ser mayor que cero";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();  
}
/*    $titulo="Precio invalido";

    $msg="Los decimales solo deben estar entre 0 y 99";

    $val=msg_interrogante($msg,$titulo);

    $precio2=$_POST['pre_an2'];

if (!preg_match($patron_numeros_completo,$precio2)) {

    echo $val;
 
    exit();   

}
if (strlen($precio2)>2) {


    echo $val;
 
    exit();
	
}
if ($precio2>99) {

    echo $val;
 
    exit();
	
}
if ($precio2<0) {

    echo $val;
 
    exit();
}*/
if (!is_numeric($precio)) {

    $titulo="Precio inválido";

    $msg="El precio debe ser expresado solo en numeros";

    $val=msg_interrogante($msg,$titulo);

    echo $val;
 
    exit();
     
}

if ($precio<0) {
     $titulo="Precio inválido";

    $msg="El precio debe ser expresado solo en numeros";

    $val=msg_interrogante($msg,$titulo);

    echo $val;
 
    exit();   
}
$descripcion=trim($_POST['des_an']);
if( !preg_match($patron_texto_numeros, $descripcion)){

    $titulo="Descripción no válida";

    $msg="La descripción solo debe contener letras, numeros y espacios";

    $val=msg_interrogante($msg,$titulo);

    echo $val;
 
    exit();

}

if (strlen($descripcion)>40) {

    $titulo="Descripción muy larga";

    $msg="La descripción solo debe contener letras, numeros y espacios";

    $val=msg_interrogante($msg,$titulo);

    echo $val;
 
    exit();
}

if (strlen($descripcion)<3) {

    $titulo="Descripción muy corta";

    $msg="La descripción no debe ser menor de 3 caracteres";

    $val=msg_interrogante($msg,$titulo);

    echo $val;
 
    exit();

}


$tipo=$_POST['tipo_an'];
if (!filter_var($tipo,FILTER_VALIDATE_INT,["options" =>["min_range"=>1, "max_range"=>4]])){
    $titulo="Tipo inválido";

    $msg="Elija un tipo de Análsis válido";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();   
}

?>