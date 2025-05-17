<?php
require_once('../conexion/conexion.php');

require_once('../funciones_generales.php');
nivel_maximo();
        $titulo="Error";

        $msg="Si ve este mensaje, porfavor reinicie la sección y vuelva a intentarlo";

        $val=msg_error($msg,$titulo);

if (!isset($_POST['agregar_consumo'])){
        echo $val;

        echo "<script>cerrar_ventana();</script>";

        exit();
}
if (!isset($_SESSION['analisis'])) {
        echo $val;

        echo "<script>cerrar_ventana();</script>";

        exit();
}
if (!filter_var($_SESSION['analisis'],FILTER_VALIDATE_INT)) {
        echo $val;

        echo "<script>cerrar_ventana();</script>";

        exit();
}

if (!isset($_POST['id_in'])) {
        echo $val;

        echo "<script>cerrar_ventana();</script>";

        exit();
}
if (empty(trim($_POST['id_in']))) {
        echo $val;

        echo "<script>cerrar_ventana();</script>";

        exit();
}
if (!filter_var($_POST['id_in'],FILTER_VALIDATE_INT)) {
        echo $val;

        echo "<script>cerrar_ventana();</script>";

        exit();
}
if (!isset($_POST['can_in'])) {


        echo $val;


        exit();
}

$valida_cantidad=validar_float($_POST['can_in']);

if ($valida_cantidad==false) {

        $titulo="Error";

        $msg="Ingrese una cantidad válidad";

        $val=msg_error($msg,$titulo);

        echo $val;


        exit();
}
$validar_completo=validar_numeros_zero($_POST['can_in']);
if ($validar_completo==false) {

        $titulo="Error";

        $msg="Ingrese una cantidad válidad";

        $val=msg_error($msg,$titulo);

        echo $val;


        exit();
}
if ($_POST['can_in']<0.01) {
         $titulo="Error";

        $msg="Ingrese una cantidad válidad";

        $val=msg_error($msg,$titulo);

        echo $val;


        exit();       
}

	$ag_an =$conexion->real_escape_string($_SESSION['analisis']);

	$id_in = $conexion->real_escape_string ($_POST['id_in']);

	$can_in = $conexion->real_escape_string ($_POST['can_in']);


	$verificar_insumo=verificar_insumo($id_in);

	$verificar_analsis=verificar_analisis($ag_an);

	if (!($verificar_analsis->num_rows>0)) {

        echo $val;

        echo "<script>cerrar_ventana();</script>";

        exit();
		
	}
        $filas_an=mysqli_fetch_assoc($verificar_analsis);

	if (!($verificar_insumo->num_rows>0)) {
		
        echo $val;

        echo "<script>cerrar_ventana();</script>";

        exit();

	}

        $filas=mysqli_fetch_assoc($verificar_insumo);

        if ($filas['unidad_medicion']==1) {
                
                if (!filter_var($can_in,FILTER_VALIDATE_INT)) {

        $titulo="Error";

        $msg="La cantidad debe ser un numero entero";

        $val=msg_error($msg,$titulo);

        echo $val;


        exit();
                        
                }
        }
        if ($filas['tipo_in']!=$filas_an['tipo_an'] and $filas['tipo_in']!=5) {

        $titulo="Insumo incompatible";

        $msg="El insumo que a elegido no es compatible con este tipo de análsis";

        $val=msg_error($msg,$titulo);

        echo $val;


        exit();

   
        }



	$verificar_existencia=consultar_consumo_analisis_insumos($id_in);

if($verificar_existencia->num_rows>0){

	$existencia=mysqli_fetch_assoc($verificar_existencia);
               	
    $id=$existencia['id_co'];
               	
    $actualizar_consumo=actualizar_consumo($id,$can_in);	
               
if ($actualizar_consumo == false) {

        $titulo="Error";

        $msg="Error al actualizar";

        $val=msg_error($msg,$titulo);

        echo $val;

        echo "<script>cerrar_ventana();</script>";

        exit();
}

        $campo="Insumo actualizado:".$filas['cod_in'];

        $codigo="Codigo:".$filas_an['cod_an'];

        $registro="Análisis";

        $accion="Ha sido actualizado un consumo";

        auditoria($registro,$accion,$campo,$codigo);



        $titulo="correcto";

        $msg="Se ha actualizado el consumo";

        $val=msg_positivo($msg,$titulo);

        echo $val;

        echo "<script>cerrar_ventana();</script>";

        $conexion->close();

        exit();

          	
}


$asignar_consumo=asignar_consumo($id_in,$can_in);

if($asignar_consumo==false){

        $titulo="Error";

        $msg="Error al Asignar";

        $val=msg_error($msg,$titulo);

        echo $val;

        echo "<script>cerrar_ventana();</script>";

        exit();
}

        $campo="Insumo asignado:".$filas['cod_in'];

        $codigo="Codigo:".$filas_an['cod_an'];

        $registro="Análisis";

        $accion="Ha sido asignado un consumo";

        auditoria($registro,$accion,$campo,$codigo);



        $titulo="correcto";

        $msg="Se han guardado";

        $val=msg_positivo($msg,$titulo);

        echo $val;

        echo "<script>cerrar_ventana();</script>";

        exit();

?>