<?php 
//efine('__ROOT__', dirname(dirname(__FILE__))); 
require_once(dirname(dirname(__FILE__))."/libs/datosviales/Estaciones.class.php");

$params = json_decode($_GET['params']);

//$anios   = array();
//$estados = array();
//$carreteras  = array(16);
/*
$query   = new stdClass();  
$query->anios = $anios;
$query->estados = $estados;
$query->carreteras = $carreteras;
*/ 
$estaciones = new Estaciones($params);

echo json_encode(array_values($estaciones->find()));