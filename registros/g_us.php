<?php
require_once('../conexion/conexion.php');

require_once("../funciones_generales.php");

require_once("../validar/validar_usuario.php");

require_once("../validar/validar_usuario_pass.php");

nivel_maximo();

$conexion = conectar();

$nom_us =$conexion->real_escape_string($nombre);

$apellido_us =$conexion->real_escape_string ($apellido);

$nick_us =$conexion->real_escape_string ($nick);

$pass_us1 =$conexion->real_escape_string ($clave);

$pass_us = md5($pass_us1);

$cedula_us =$conexion->real_escape_string ($cedu);

$nivel_us =$conexion->real_escape_string ($nivel);

$tlf_us =$conexion->real_escape_string ($tlf);

$q=$nick_us;

$nick_usado=validar_usuario($q);

$conexion->close();

if($nick_usado->num_rows> 0){



        $titulo="Nick name en uso";

        $msg="Ya se encuenta registrado alguien con el mismo Nick name, utilize un Nick name diferente";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();
}     

$registrar_usuario = registrar_usuario($nom_us,$nick_us,$apellido_us,$pass_us,$tlf_us,$cedula_us,$nivel_us);

if($registrar_usuario == false){

        $titulo="Error";

        $msg="Error al registrar";

        $val=msg_error($msg,$titulo);

        echo $val;

        exit();
}

        $titulo="Correcto";

        $msg="Registro completado, <br> Debe asignar las preguntas de seguridad, <br> esto ayuda a recuperar la clave, <br> debe dirijirse al menu de usuario para asignar las preguntas de seguridad al usuario";

        $val=msg_positivo_sin($msg,$titulo);

        echo $val;
           
        echo "<script>
document.getElementById('nom_us').value = '';
document.getElementById('apellido_us').value = '';
document.getElementById('nick_us').value = '';
document.getElementById('pass_us').value = '';
document.getElementById('cedula_us').value = '';
document.getElementById('nivel_us').value = '';
document.getElementById('tlf_us').value = '';
      </script>";

/*        $titulo="Falta agregar preguntas de seguridad";

        $msg="Cada usuario debe tener preguntas de seguridad, <br> esto ayuda a recuperar la clave, <br> debe dirijirse al menu de usuario para asignar las preguntas de seguridad a cada usuario";

        $val=msg_interrogante($msg,$titulo);

        echo $val;*/


      exit();  

?>