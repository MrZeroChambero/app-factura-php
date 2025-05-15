<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=respaldo"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
nivel_maximo();


if (isset($_FILES['archivo'])) {
	/*var_dump($_FILES['archivo']);*/


	$nombre_archivo=basename($_FILES['archivo']['name']);

	$tipo_archivo=$_FILES['archivo']['type'];


	if(!(is_readable($_FILES['archivo']['tmp_name']))){

	   		$titulo="Archivo alterado";

        $msg="Este Archivo no es legible";


        $val=msg_interrogante($msg,$titulo);

         $conexion->close();

        echo $val;  

        exit(); 

}


	if ($tipo_archivo!="application/octet-stream") {
	   	$titulo="Error";

        $msg="El formato del archivo debe ser .sql";


        $val=msg_error_sin($msg,$titulo);


        echo $val;  
		exit();
	}

	$extension = pathinfo($nombre_archivo, PATHINFO_EXTENSION);
	if ($extension!="sql") {
	   	$titulo="Error";

        $msg="El formato del archivo debe ser .sql";


        $val=msg_error_sin($msg,$titulo);


        echo $val;  
		exit();
	}





    $fecha = date("Y-m-d");

$hora=date("H:i:s"); 

    $fecha1 =$fecha." ".$hora; 

    $fecha2= date("d_m_Y_H_i_s", strtotime($fecha1)); 


	$nombre_nuevo=$fecha2.$nombre_archivo;
	 $conexion = conectar();

$query_buscar=$conexion->query("SELECT * FROM respaldo WHERE ruta ='{$nombre_archivo}' and fecha = '{$fecha}' and hora ='{$hora}'");

if ($query_buscar->num_rows>0) {
      
   		$titulo="Ocurrio un error inesperado";

        $msg="Ya existe un respaldo con el mismo nombre";


        $val=msg_interrogante($msg,$titulo);

         $conexion->close();

        echo $val;  
        exit(); 
}

   
	$ruta="C:\\xampp\\htdocs\\facturacion\\respaldo\\respaldos\\".$nombre_nuevo;

	$mover_archivo=move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta);
	if ($mover_archivo==true) {
   		$titulo="Correcto";

        $msg="El archivo fue agregado en la carpeta de respaldos con el nombre:".$nombre_nuevo;


        $val=msg_positivo_sin($msg,$titulo);

        echo $val;  
         echo "<script>consulta_vacio(); document.getElementById('archivo').value='';</script>";
$agregar=agregar_respaldo($nombre_nuevo,$fecha,$hora);
if ($agregar==false) {

	   	$titulo="Ocurrio un error inesperado";

        $msg="No se pudo guadar en la base de datos";


        $val=msg_interrogante($msg,$titulo);


        echo $val;  
         echo "<script>consulta_vacio();</script>";
	
}


 $conexion->close();
        exit();
	}else{
   		$titulo="Ocurrio un error inesperado";

        $msg="El archivo no se puedo mover";


        $val=msg_interrogante($msg,$titulo);
         $conexion->close();

        echo $val;  

        echo "<script>consulta_vacio();</script>";
        exit();
	}
}

patucasa();
exit();
?>
