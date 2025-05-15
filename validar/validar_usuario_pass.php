<?php 
if (empty(trim($_POST['pass_us']))) {
      $vacio=false;  
}
$clave=$_POST['pass_us'];
 if( !preg_match($patron_texto_sin_espacios,$clave)){

    $titulo="Clave invalida";

    $msg="La clave solo debe contener letras  y numeros";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}

if (strlen($clave)>20) {

    $titulo="Clave muy larga";

    $msg="La clave no debe pasar de 20 caracteres";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}
if (strlen($clave)<3) {

    $titulo="Clave muy corta";

    $msg="La clave no debe ser menor de 3 caracteres";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}
 ?>