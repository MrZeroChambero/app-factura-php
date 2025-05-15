<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=registro_insumo"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 

require_once('../conexion/conexion.php');

require_once("../funciones_generales.php");

require_once("../validar/validar_insumos.php");

nivel_maximo();

$conexion = conectar();

$cod_in = $conexion->real_escape_string($codigo);

$nom_in = $conexion->real_escape_string($nombre);

$uni = $conexion->real_escape_string($unidad);

$stock_max = $conexion->real_escape_string($stockmax);

$stock_min = $conexion->real_escape_string($stockmin);

$tipo=$conexion->real_escape_string($tipo_in);

$q = $cod_in;

$buscar_codigo=validar_insumo($q);

$conexion->close();

if($buscar_codigo->num_rows > 0){

        $titulo="Codigo registrado";

        $msg="Ya se encuentra registrado un insumo con dicho codigo, <br> diríjase a consulta y verifique si se trata del mismo insumo";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();

}
           
$crear_insumo =registrar_insumo($cod_in,$nom_in,$uni,$stock_max,$stock_min,$tipo);

if($crear_insumo==false){

        $titulo="Error";

        $msg="Error al registrar";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();
}
        $titulo="Correcto";

        $msg="Registro completado, para realizar una compra de insumos, debe asignar cada insumo a uno, o varios proveedores, para ello debe dirijirse al menú de consulta proveedor y pulsar el boton de asignar, del proveedor que desea elegir y sera enviado a un menú para realizar dicha acción. Ademas, los insumos se deben asignar a cada análisis que los requiera, para ello debe diríjirse al menú de consulta de análisis y pulsar el boton asignar consumo del análisis que deseé, luego sera enviado a un menú para asignar la cantidad de insumos";
/*
                $msg="Registro completado, los insumos son consumos al realizar un análisis, para asginar en cuales análisis son consumidos diríjase al menu de análisis y pulse el boton";*/

        $val=msg_positivo_sin($msg,$titulo);

        echo $val;

        echo "<script>
document.getElementById('cod_in').value = '';
document.getElementById('nom_in').value = '';
document.getElementById('unidad').value = '';
document.getElementById('stock_max').value = '';
document.getElementById('stock_min').value = '';
document.getElementById('tipo_in').value = '';
                </script>";

        exit();

?>