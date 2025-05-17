<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
nivel_maximo();


if (!isset($_POST['respaldo'])) {
 patucasa();
    exit();
}
if ($_POST['respaldo']!=true) {
patucasa();
      exit();
}


    $db_host = 'localhost'; //Host del Servidor MySQL
    $name = 'facturacionphp'; //Nombre de la Base de datos
    $user = 'root'; //Usuario de MySQL
    $pass = ''; //Password de Usuario MySQL
//$sql_file='db_backup.sql';

    $fecha = date("Y-m-d");

$hora=date("H:i:s"); 

    $fecha1 =$fecha." ".$hora; 

    $fecha2= date("d_m_Y_H_i_s", strtotime($fecha1)); 

$salida_sql = "respaldos\\".$name.'_'.$fecha2.'.sql'; 

$ruta=$name.'_'.$fecha2.'.sql'; 

$cmd='C:\xampp\mysql\bin\mysqldump --user='.$user.' --password='.$pass .' --host=localhost facturacion > '.$salida_sql;

//var_dump($cmd);exit;

exec($cmd, $output, $return);
if ($return != 0) { //0 is ok
    die('Error: ' . implode("\r\n", $output));
}

$crear=crear_respaldo($ruta,$fecha,$hora);

if ($crear==0) {
   $titulo="Error";

        $msg="Error al crear respaldo";


        $val=msg_error($msg,$titulo);

        echo $val;  
}
if ($crear==2) {
   $titulo="ocurrio un problema";

        $msg="Si ve este mesaje espera 5min porfavor";


        $val=msg_interrogante($msg,$titulo);

        echo $val;  
}

 $titulo="Correcto";

        $msg="Respaldo completo, el nombre del respadol es:".$ruta;


        $val=msg_positivo($msg,$titulo);

        echo $val;


exit();
/*if (unlink(filename)) {
    
}*/
?>