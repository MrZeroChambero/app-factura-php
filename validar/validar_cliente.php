<?php 
$vacio=true;
$patron_texto = "/^[a-zA-Z\sáéíóúñüÁÉÍÓÚÑÜ]+$/";
$patron_texto_numeros = "/^[0-9a-zA-Z\sáéíóúñüÁÉÍÓÚÑÜ]+$/";
$patron_texto_sin_espacios = "/^[0-9a-zA-ZáéíóúñüÁÉÍÓÚÑÜ]+$/";
$patron_numeros_completo = "/^[0-9]+$/";

if ((!isset($_POST['nom_cli']))
        and (!isset($_POST['cedula_cli'])) 
        and (!isset($_POST['num_tlf'])) 
        and (!isset($_POST['di_cli']))) {

    $titulo="Campos vacios";

    $msg="Complete todos los campos";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}
$campo_f="";
                if (empty(trim($_POST['nom_cli']))) {
$vacio=false;
$campo_f.="Nombre";
                }

                if (empty(trim($_POST['cedula_cli']))) {
$vacio=false;
$campo_f.=",Cedula/rif";
                }

                if (empty(trim($_POST['num_tlf']))) {
$vacio=false;
$campo_f.=",Telefono";
                }

                if (empty(trim($_POST['di_cli']))) {
$vacio=false;
$campo_f.=",dirección";
                }
                if (empty(trim($_POST['tipo_cliente']))) {
$vacio=false;
$campo_f.=",Tipo de identificador";
                }
if ($_POST['tipo_cliente']!=6) {

                if (empty(trim($_POST['cedula_2']))) {
$vacio=false;
$campo_f.=",Ultimo numero del rif";
                }
    
}
                if ($vacio==false) {

    $titulo="Campos vacio";

    $msg="Complete todos los campos <br> campos faltantes:";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}


 ////////////////////////////////////////////////////////////////        

 if (!filter_var($_POST['tipo_cliente'],FILTER_VALIDATE_INT,["options" =>["min_range"=>1, "max_range"=>6]])) {

    $titulo="Cedula inválida";

    $msg="Debe elegir un tipo de identificador, ya sea cedula, rif juridico, entre otros";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();          
}        

    $cedula=$_POST['cedula_cli'];

                
if (!preg_match($patron_numeros_completo,$cedula)) {

    $titulo="Cedula inválida";

    $msg="Ingrese una Cedula válida, no escriba puntos ni comas porfavor";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}

if ($_POST['tipo_cliente']==6) {
   $validar_cedula=validar_numeros_zero($cedula);

    $titulo="Cedula inválida";

    $msg="Ingrese una Cedula válida, no escriba puntos ni comas, solo numeros porfavor";

    $val=msg_interrogante($msg,$titulo);

   if ($validar_cedula==false) {

    echo $val;

    exit();

   }
$validar_cedula_float=validar_float($cedula);
if ($validar_cedula_float==false) {

    echo $val;

    exit();   
}

if (strlen($cedula)<4){

    echo $val;

    exit();

}
if (strlen($cedula)>8){

    echo $val;

    exit();
}


 if ($cedula<1000000){

    echo $val;

    exit();

}

$cedula_2=0;

}else{


    $titulo="Rif inválida";

    $msg="Ingrese un Rif válida, no escriba puntos ni comas, solo numeros porfavor";

    $val=msg_interrogante($msg,$titulo);

$validar_cedula_float=validar_float($cedula);

if ($validar_cedula_float==false) {

    echo $val;

    exit();   
}

if (strlen($cedula)!=8){

    echo $val;

    exit();
}


 if ($cedula<1000000){

    echo $val;

    exit();

}
    $titulo="Rif inválida";

    $msg="Elija el ultimo numero del rif, debe ser un numero del 0 al 9";

    $val=msg_interrogante($msg,$titulo);


if (!filter_var($_POST['cedula_2'],FILTER_VALIDATE_INT,["options" =>["min_range"=>1, "max_range"=>10]])){   

    echo $val;

    exit();

}

$cedula_2=$_POST['cedula_2'];
if ($cedula_2==10) {
    $cedula_2=0;
}

}
  ////////////////////////////////////////////////////////////////             
$tlf=$_POST['num_tlf'];

if (!preg_match($patron_numeros_completo,$tlf)) {

    $titulo="Numero de telefono";

    $msg="Ingrese un numero de telefono, no utilice comas ni puntos porfavor";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}
             
 if (strlen($tlf)!=11) {

    $titulo="Numero de telefono";

    $msg="Ingrese un numero de telefono, no utilice comas ni puntos porfavor";

    $val=msg_interrogante($msg,$titulo);

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
//////////////////////////////////////////////////


$nombre=trim($_POST['nom_cli']);
if ($_POST['tipo_cliente']==6) {
    

          if(!preg_match($patron_texto, $nombre)){

            $titulo="Nombre no válido";

            $msg="El nombre solo debe contener letras";

            $val=msg_interrogante($msg,$titulo);

            echo $val;

            exit();

        }
}else{
          if(!preg_match($patron_texto_numeros, $nombre)){

            $titulo="Nombre no válido";

            $msg="El nombre solo debe contener letras, numeros y espacios";

            $val=msg_interrogante($msg,$titulo);

            echo $val;

            exit();

        }

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


/////////////////////////////////////////////
        $direccion=trim($_POST['di_cli']);

if( !preg_match($patron_texto_numeros, $direccion)){

    $titulo="Dirección no válida";

    $msg="La dirreción solo debe contener letras, numeros y espacios";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}

if (strlen($direccion)>40) {

    $titulo="Dirección muy larga";

    $msg="La dirreción no debe pasar de 40 caracteres";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}
if (strlen($direccion)<3) {

    $titulo="Dirección muy corta";

    $msg="La dirreción no debe ser menor de 3 caracteres";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

}

 ?>