<?php 
$vacio=true;
$patron_texto = "/^[a-zA-Z\sáéíóúñüÁÉÍÓÚÑÜ]+$/";
$patron_texto_sin_espacios = "/^[0-9a-zA-ZáéíóúñüÁÉÍÓÚÑÜ]+$/";
$patron_numeros = "/^[2-3]+$/";
$patron_numeros_completo = "/^[0-9]+$/";
$error="";

if (empty(trim($_POST['nom_us'])) 
    and empty(trim($_POST['apellido_us'])) 
    and empty(trim($_POST['nick_us'])) 
    and empty(trim($_POST['pass_us'])) 
    and empty(trim($_POST['cedula_us'])) 
    and empty(trim($_POST['nivel_us'])) 
    and empty(trim($_POST['tlf_us']))) {

    $titulo="Campos vacios";

    $msg="Complete todos los campos";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();           

}
if (empty(trim($_POST['nom_us']))) {
    $vacio=false;
    $error.="Nombre";
}
if (empty(trim($_POST['apellido_us']))) {

    $vacio=false;
    if ($error!="") {$error=",";} 
       $error.="Apellido";
}
if ( empty(trim($_POST['nick_us']))) {
     $vacio=false;   
      if ($error!="") {$error=",";} 
       $error.="Usuario";
}

if (empty(trim($_POST['cedula_us']))) {
    $vacio=false;
     if ($error!="") {$error=",";} 
       $error.="CeduLa";                
}  
if ($_POST['nivel_us']!=1) {
     if (empty(trim($_POST['nivel_us']))) {
    $vacio=false; 
     if ($error!="") {$error=",";} 
       $error.="Nivel";         
}      
    }    
  
if (empty(trim($_POST['tlf_us']))) {
     $vacio=false;   
}
if ($vacio==false) {

    $titulo = "Campos vacios";

    $msg = "Complete los siguentes campos:";
    
    $msg.=$error;

    $val = msg_interrogante($msg,$titulo);

    echo $val;

    exit();    
 
}
$cedu=trim($_POST['cedula_us']);
if (!filter_var($cedu,FILTER_VALIDATE_INT)){

    $titulo="Cedula inválida";

    $msg="Ingrese una Cedula válida, no utilice comas ni puntos porfavor";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}

if (!filter_var($cedu,FILTER_VALIDATE_INT,["options" =>["min_range"=>100000, "max_range"=>100000000]])) {

    $titulo="Cedula inválida";

    $msg="Ingrese una cedula válida";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}
                
$nombre=trim($_POST['nom_us']);
                
 if(!preg_match($patron_texto,$nombre)){

    $titulo="Nombre no válido";

    $msg="El nombre solo debe contener letras y espacios";

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

$nick=trim($_POST['nick_us']);

if( !preg_match($patron_texto_sin_espacios,$nick)){

    $titulo="Usuario no válido";

    $msg="El usuario solo debe contener letras y numeros";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}
    
if (strlen($nick)>20) {

    $titulo="Usuario muy largo";

    $msg="El usuario no debe pasar de 12 caracteres";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}

if (strlen($nick)<3) {

    $titulo="Usuario muy corto";

    $msg="El usuario no debe ser menor de 3 caracteres";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}

$apellido=trim($_POST['apellido_us']);

 if( !preg_match($patron_texto,$apellido)){

    $titulo="apellido no válido";

    $msg="El apellido solo debe contener letras  y espacios";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}

if (strlen($apellido)>20) {

    $titulo="apellido muy largo";

    $msg="El apellido no debe pasar de 40 caracteres";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}

if (strlen($apellido)<3) {

    $titulo="apellido muy corto";

    $msg="El apellido no debe ser menor de 3 caracteres";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}

$tlf=$_POST['tlf_us'];

    $titulo="Numero de telefono";

    $msg="Ingrese un numero de telefono, no utilice comas ni puntos porfavor";

    $val=msg_interrogante($msg,$titulo);

if (!preg_match($patron_numeros_completo,$tlf)) {

    echo $val;

    exit();

}
             
 if (strlen($tlf)!=11) {

    echo $val;

    exit();

 }
  if ($tlf<2000000000) {

    $titulo="Numero de telefono";

    $msg="Ingrese un numero de telefono, no utilice comas ni puntos porfavor";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

 }    
   if ($tlf>9000000000) {


    $titulo="Numero de telefono";

    $msg="Ingrese un numero de telefono, no utilice comas ni puntos porfavor";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

 }   
 $validar_tlf=validar_float($tlf);

 if ($validar_tlf==false) {
       $titulo="Numero de telefono";

    $msg="Ingrese un numero de telefono, no utilice comas ni puntos porfavor";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

     
 }

 $nivel=$_POST['nivel_us'];

 
    $titulo="Nivel inválido";

    $msg="Ingrese un nivel de usuario válido";

    $val=msg_interrogante($msg,$titulo);

 if (!filter_var($nivel,FILTER_VALIDATE_INT,["options" =>["min_range"=>1, "max_range"=>3]])) {

    echo $val;

    exit();  
 }

 if ($nivel!=1) {
     

 if (!preg_match($patron_numeros,$nivel)) {

    $titulo="Nivel inválido";

    $msg="Ingrese un nivel de usuario válido";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

 }
  }
 ?>