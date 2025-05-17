
<?php
require_once($_SERVER['DOCUMENT_ROOT']."/facturacion/conexion/conexion.php");
require_once($_SERVER['DOCUMENT_ROOT']."/facturacion/funciones_generales.php");
nivel_maximo();
require_once($_SERVER['DOCUMENT_ROOT']."/facturacion/validar/validar_usuario.php");

$conexion=conectar();

$id_us=$conexion->real_escape_string($_SESSION['editar_usuario']);

$nom_us =$conexion->real_escape_string($nombre);

$apellido_us =$conexion->real_escape_string ($apellido);

$nick_us =$conexion->real_escape_string ($nick);

$cedula_us =$conexion->real_escape_string ($cedu);

$nivel_us =$conexion->real_escape_string ($nivel);

$tlf_us =$conexion->real_escape_string ($tlf);

$patron_numeros = "/^[2-3]+$/";




            $buscar_nick=validar_usuario($nick_us);

            $buscar_usuario=verificar_usuario($id_us);

            $res=mysqli_fetch_assoc($buscar_usuario);

if(!($buscar_usuario->num_rows > 0)){

        $titulo="Sin resultado";

        $msg="Error no se ha encontrado resultados";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit(); 
}
if($res['nick_us'] != $nick_us){

            if($buscar_nick->num_rows >0){

                $titulo="Nick name usado";

                $msg="Error este nick name esta en uso";

                $val=msg_error($msg,$titulo);

                echo $val;

                exit(); 
   
            }
}
if ($res['nivel_us']!=1) {
        

 if (!preg_match($patron_numeros,$nivel)) {

    $titulo="Nivel invalido";

    $msg="Ingrese un nivel de usuario válido";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

 }
}else{
        $nivel_us=$res['nivel_us'];
}

$actualizar=actualizar_usuario($id_us,$nom_us,$nick_us,$apellido_us,$tlf_us,$cedula_us,$nivel_us);

if ($actualizar == false) {

        $titulo="Error";

        $msg="Error al actualizar";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit(); 
}

if ($nick_us != $res['nick_us']) {
 
        $campo="El usuario fue actualizado";

        $codigo="Cedula:".$cedula_us;

        $registro="Usuario";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo); 

}
if ($nom_us != $res['nom_us']) {
 
        $campo="El Nombre fue actualizado";

        $codigo="Cedula:".$cedula_us;

        $registro="Usuario";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo); 

}
if ($apellido_us != $res['apellido_us']) {
 
        $campo="El Apellido fue actualizado";

        $codigo="Cedula:".$cedula_us;

        $registro="Usuario";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo); 

}
if ($tlf_us != $res['num_tlf_us']) {
 
        $campo="El Numero Telefonico fue actualizado";

        $codigo="Cedula:".$cedula_us;

        $registro="Usuario";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo); 

}
if ($nivel_us != $res['nivel_us']) {
 
        $campo="El Nivel fue actualizado";

        $codigo="Cedula:".$cedula_us;

        $registro="Usuario";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo); 

}
if ($cedula_us != $res['cedula_us']) {
 
        $campo="La cedula fue actualizada; Cedula anterior:".$res['cedula_us'].", Cedula actual:".$cedula_us;

        $codigo="Cedula:".$cedula_us;

        $registro="Usuario";

        $accion="Ha sido actualizado";

        auditoria($registro,$accion,$campo,$codigo); 

}


        $titulo="Correcto";

        $msg="Cambios guardados";

        $val=msg_positivo($msg,$titulo);

        echo $val;

        $_SESSION['editar_usuario']=null;
     
        echo "<script>cerrar_ventana();</script>";
        
        exit(); 

?>
