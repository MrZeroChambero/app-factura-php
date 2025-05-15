<?php


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

?>