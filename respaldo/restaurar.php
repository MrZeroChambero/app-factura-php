<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
nivel_maximo();
if (!isset($_POST['id'])) {
    patucasa();
    exit();
}
if ($_POST['id']!="zero") {
    if (!filter_var($_POST['id'],FILTER_VALIDATE_INT)) {
    patucasa();
    exit();   
    }
    $verificar_respaldo=verificar_respaldo($_POST['id']);
    if (!($verificar_respaldo->num_rows>0)) {
    patucasa();
    exit();  
    }
    $filas_respaldo=mysqli_fetch_assoc($verificar_respaldo);

    $respaldo_name=$filas_respaldo['ruta'];

}else{
    $respaldo_name="facturacion_respaldo.sql";
}
function restoreDatabaseTables($dbHost, $dbUsername, $dbPassword, $dbName, $filePath){
    // Connect & select the database
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 

    // Temporary variable, used to store current query
    $templine = '';
    
    // Read in entire file
    $lines = file($filePath);
    
    $error = '';
    
    // Loop through each line
    foreach ($lines as $line){
        // Skip it if it's a comment
        if(substr($line, 0, 2) == '--' || $line == ''){
            continue;
        }
        
        // Add this line to the current segment
        $templine .= $line;
        
        // If it has a semicolon at the end, it's the end of the query
        if (substr(trim($line), -1, 1) == ';'){
            // Perform the query
            if(!$db->query($templine)){
                // Ignorar error de tabla existente
                if (strpos($db->error, 'already exists') === false) {
                    $error .= 'Error performing query "<b>' . $templine . '</b>": ' . $db->error . '<br /><br />';
                }
            }
            
            // Reset temp variable to empty
            $templine = '';
        }
    }
    return !empty($error)?$error:true;
}

$dbHost='localhost';
$dbUsername='root';
$dbPassword='';
$dbName="facturacionphp";

$filePath="C:\\xampp\\htdocs\\facturacion\\respaldo\\respaldos\\".$respaldo_name;
if (!(file_exists($filePath))) {
        $titulo="Error";

        $msg="Respaldo no encontrado";


        $val=msg_error_sin($msg,$titulo);


        echo $val;  
        exit();
}


    if(!(is_readable($filePath))){

            $titulo="Archivo alterado";

        $msg="Este Archivo no es legible";


        $val=msg_interrogante($msg,$titulo);

         $conexion->close();

        echo $val;  

        exit(); 

}


$restaurar=restoreDatabaseTables($dbHost, $dbUsername, $dbPassword, $dbName, $filePath);
if($restaurar==true){

        $titulo="Correcto";

        $msg="La restauración se realizo correctamente";


        $val=msg_positivo_sin($msg,$titulo);


        echo $val;  
        exit();
}else{
            $titulo="Error";

        $msg="No se pudo realizar la restauración";


        $val=msg_error_sin($msg,$titulo);


        echo $val;  
        exit();
}




 ?>
