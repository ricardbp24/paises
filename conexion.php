<?php

class connexio extends mysqli {
	private $bd;
	private $query;

    public function __construct() {

        parent::__construct("localhost", "root", "", "paises");

        if (mysqli_connect_error()) {

            die('Error de Conexión (' . mysqli_connect_errno() . ') '

                . mysqli_connect_error());

        }

    }

    public function cerrarconexion($bd,$query){
    	$bd->close();
    	$query->close();
    }

}