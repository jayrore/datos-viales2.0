<?php 

include "libs/MongoConection.class.php";

$conexion = new MongoConection("jayroserver-pc:27017", "devDatosViales");

var_dump($conexion->get_host());