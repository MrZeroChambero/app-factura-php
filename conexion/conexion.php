<?php

define('HOSTNAME', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'facturacion');
define('PORT', 3306);

function base_url()
{
    return sprintf(
        "%s://%s",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        $_SERVER['SERVER_NAME']
    );
}
class Conexion extends mysqli {
    public function __construct($hostname, $username, $password, $database, $port = 3306)
    {
        parent::__construct($hostname, $username, $password, $database, $port);

        if((mysqli_connect_error())) {
            die('Error de Conexión (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
        }
    }
}

function conectar() {
    return new Conexion(HOSTNAME, USERNAME, PASSWORD, DATABASE, PORT);
}
$conexion=conectar();  
?>