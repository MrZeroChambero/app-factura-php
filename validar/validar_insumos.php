<?php 
$vacio=true;
$patron_texto = "/^[a-zA-Z\s]+$/";
$patron_e = "/^[e-e]+$/";
$patron_texto_numeros = "/^[0-9a-zA-Z\sáéíóúñüÁÉÍÓÚÑÜ]+$/";
$patron_texto_sin_espacios = "/^[0-9a-zA-Z]+$/";
$patron_numeros_completo = "/^[0-9]+$/";
$patron_unidad= "/^[1-2]+$/";
$mas= "/^[+]+$/";
$var1='';

    $titulo="Campos vacios";

    $msg="Complete todos los campos";

    $val=msg_interrogante($msg,$titulo);

if (!isset($_POST['tipo_in'])) {
    echo $val;

    exit();    
}
if ((!isset($_POST['cod_in'])) 

and (!isset($_POST['nom_in']))

and (!isset($_POST['unidad'])) 

and (!isset($_POST['stock_max']))

and (!isset($_POST['stock_min']))){

    echo $val;

    exit();

}
if (empty(trim($_POST['cod_in']))) {
    $msg2=":código";
    $vacio=false;
}

if (empty(trim($_POST['nom_in']))) {
    $msg2=":Nombre";
     $vacio=false;
}

if (empty(trim($_POST['unidad']))) {
    $msg2=":Unidad";
     $vacio=false;

}

if (empty(trim($_POST['stock_max']))) {

     $vacio=false;

}

if (empty(trim($_POST['stock_min']))) {
    $msg2=":Stock minimo";
   $vacio=false;
} 
if (empty(trim($_POST['tipo_in']))) {
    $msg2=":tipo";
   $vacio=false;
} 


if ($vacio == false) {
    $titulo="Campos vacios";

    $msg="Complete todos los campos".$msg2;

    $val=msg_interrogante($msg,$titulo);
  
    echo $val;

    exit();
}
$codigo=trim($_POST['cod_in']);

$validar_codigo=validar_float($codigo);

if ($validar_codigo==false) {
    $titulo="código inválido";

    $msg="El código debe ser expresado solo en numeros";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();  
}
if ($codigo==0) {
    $titulo="código inválido";

    $msg="El código debe ser expresado solo en numeros";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();      
}
if ($codigo<0) {
    $titulo="código inválido";

    $msg="El código debe ser expresado solo en numeros menor";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();      
}
if (strlen($codigo)!=6) {
    $titulo="código inválido";

    $msg="El código debe ser expresado solo en numeros, <br> debe tener 6 digitos";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();      
}

/*if (preg_match($mas,$codigo)) {

    $titulo="Codigo invalido";

    $msg="El codigo debe ser expresado solo en numeros";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}

if (!filter_var($codigo,FILTER_VALIDATE_INT)){

    $titulo="Codigo incorrecta";

    $msg="Ingrese un codigo valido, <br> porfavor no use comas ni puntos";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}

if (!filter_var($codigo,FILTER_VALIDATE_INT,["options" =>["min_range"=>100, "max_range"=>1000000000]])) {

    $titulo="Codigo incorrecta";

    $msg="Ingrese un codigo valido, <br> porfavor no use comas ni puntos";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();
      
}*/

$nombre=trim($_POST['nom_in']);

if( !preg_match($patron_texto_numeros, $nombre)){

    $titulo="Nombre no válido";

    $msg="El nombre solo debe contener letras, <br> numeros y espacios";

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
               
$unidad=trim($_POST['unidad']);

if( !preg_match($patron_unidad, $unidad)){

    $titulo="Unidad no válida";

    $msg="Elija una unidad válida";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}

if (!filter_var($unidad,FILTER_VALIDATE_INT,["options" =>["min_range"=>1, "max_range"=>2]])) {

     $titulo="Unidad no válida";

    $msg="Elija una unidad válida";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();   
}

$stockmin=trim($_POST['stock_min']);

$validar_stockmin=validar_float($stockmin);

if ($validar_stockmin==false) {
    
    $titulo="Stock mínimo inválido";

    $msg="El Stock minimo  debe ser expresado solo en numeros";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();
}
if (strlen($stockmin)>=3) {
    $minimo=0.01;
    if ($stockmin<$minimo) {
    $titulo="Stock mínimo inválido";

    $msg="El Stock mínimo  debe ser expresado solo en numeros";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();       
    }
}
$validar_completo=validar_numeros_zero($stockmin);
if ($validar_completo==false) {
     $titulo="Stock mínimo inválido";

    $msg="El Stock mínimo  debe ser expresado solo en numeros";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();          
}

if ($unidad==1) {
 if (!filter_var($stockmin,FILTER_VALIDATE_INT,["options" =>["min_range"=>1, "max_range"=>100000000000000]])) {

    $titulo="Stock mínimo inválido";

    $msg="El Stock mínimo debe estar entre 1 y 1000000";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();
    
}   
}

/*if (!filter_var($stockmin,FILTER_VALIDATE_INT)){

    $titulo="Stock minimo invalido";

    $msg="Ingrese un Stock minimo valido";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}



if (!is_numeric($stockmin)){

    $titulo="Stock minimo invalido";

    $msg="El Stock minimo  debe ser expresado solo en numeros";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();
   
}*/

$stockmax=trim($_POST['stock_max']);

$validar_stockmax=validar_float($stockmax);

if ($validar_stockmax==false) {

    $titulo="Stock máximo inválido";

    $msg="Ingrese un Stock máximo válido";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();  
}
if ($stockmax<0) {
     $titulo="Stock máximo inválido";

    $msg="Ingrese un Stock máximo válido";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();    
}
$validar_completo_max=validar_numeros_zero($stockmax);
if ($validar_completo_max==false) {
     $titulo="Stock máximo inválido";

    $msg="El Stock mínimo  debe ser expresado solo enwwnumeros";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();          
}
if ($unidad==1) {

if (!filter_var($stockmax,FILTER_VALIDATE_INT,["options" =>["min_range"=>1, "max_range"=>1000000]])) {

    $titulo="Stock máximo inválido";

    $msg="El Stock máximo debe estar entre 1 y 1000000";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();
   
}
}
/*if (!filter_var($stockmax,FILTER_VALIDATE_INT)){

    $titulo="Stock maximo invalido";

    $msg="Ingrese un Stock maximo valido";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}


if (!is_numeric($stockmax)){

    $titulo="Stock maximo invalido";

    $msg="El Stock maximo  debe ser expresado solo en numeros";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}*/
if ($stockmax<$stockmin) {

    $titulo="Stock Confuso";

    $msg="El Stock máximo  debe ser Mayor que el Stock mínimo";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}
if ($stockmax==$stockmin) {

    $titulo="Stock Confuso";

    $msg="El Stock máximo  debe ser Mayor que el Stock mínimo";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}
$tipo_in=$_POST['tipo_in'];
if (!filter_var($tipo_in,FILTER_VALIDATE_INT,["options" =>["min_range"=>1, "max_range"=>5]])){
    $titulo="Tipo inválido";

    $msg="Elija un tipo válido";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();   
}
?>