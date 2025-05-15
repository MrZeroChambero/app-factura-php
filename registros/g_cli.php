<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=registro_cliente"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once('../conexion/conexion.php');

require_once("../funciones_generales.php");

require_once("../validar/validar_cliente.php");
        
        verificar_nivel();

            $conexion = conectar();

            $nom_cli=$conexion->real_escape_string($nombre);

            $cedula_cli=$conexion->real_escape_string($cedula);

            $num_tlf=$conexion->real_escape_string($tlf);

            $di_cli=$conexion->real_escape_string($direccion);

            $q=$cedula_cli;

            $buscar_cedula=validar_cliente($q);

            $cedula_f=$conexion->real_escape_string($cedula_2);

             $tipo_cliente=$conexion->real_escape_string($_POST['tipo_cliente']);
            
            $conexion->close();

if($buscar_cedula->num_rows > 0){

        $titulo="Rif / cédula registrado";

        $msg="ya se encuentra registrado un cliente con dicha cédula/RIF, <br> diríjase a consulta y verifique si se trata del mismo cliente";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();

}

$registrar_cliente = registrar_cliente($cedula_cli,$nom_cli,$num_tlf,$di_cli,$tipo_cliente,$cedula_f);

if($registrar_cliente == false){

        $titulo="Error";

        $msg="Error al registrar";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();

}
        $titulo="correcto";

        $msg="Registro completado";

        $val=msg_positivo($msg,$titulo);

        echo $val;

echo "<script>
document.getElementById('nom_cli').value = '';
document.getElementById('cedula_cli').value = '';
document.getElementById('di_cli').value = '';
document.getElementById('num_tlf').value = '';
document.getElementById('tipo_cliente').value = '';
document.getElementById('cedula_2').value = '';
</script>";

exit();
     
?>