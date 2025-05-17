<?php
require_once('../conexion/conexion.php');

require_once("../funciones_generales.php");

require_once("../validar/validar_analisis.php");

$conexion= conectar();

nivel_maximo();

$cod_an=$conexion->real_escape_string($codigo);

$pre_an=$conexion->real_escape_string($precio);

$nom_an=$conexion->real_escape_string($nombre);

$des_an=$conexion->real_escape_string($descripcion);

$tipo_an=$conexion->real_escape_string($tipo);

$q=$cod_an;

$conexion->close();

$analisis_registrados=validar_analisis($q);

if ($analisis_registrados->num_rows >0){

        $titulo="Codigo registrado";

        $msg="Ya se encuentra registrado un análisis con este codigo, <br> diríjase a consulta y verifique si se trata del mismo análisis";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();

}

$registrar_analisis = registrar_analisis($cod_an,$nom_an,$des_an,$tipo_an,$pre_an);


if($registrar_analisis==false){

        $titulo="Error";

        $msg="Error al registrar";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();

}

$titulo="Correcto";

$msg="Registro completado, <br> Cada análisis tiene un consumo, para asignar dicho consumo debe dirijirse al menú de consulta de análisis, <br> ahí podrá ver todos los análisis registrados, pulse el boton asignar del análisis que desea y sera enviado al menú de asignar consumo.";

$val=msg_positivo_sin($msg,$titulo);

echo $val;

echo "<script> 
document.getElementById('nom_an').value = '';
document.getElementById('des_an').value = '';
document.getElementById('tipo_an').value = '';
document.getElementById('cod_an').value = '';
document.getElementById('pre_an').value = ''; 
</script>";

exit();

 ?>