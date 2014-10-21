<?php 
require_once("libs/datosviales/Estaciones.class.php");

$anios   = array("2012",2013,"2014");
$estados = array();
$tramos  = array("a-004-1","a-004-2","a-004-3");

$query   = new stdClass();  
$query->anios = $anios;
$query->estados = $estados;
$query->tramos = $tramos;

echo"<pre>";

$estaciones = new Estaciones($query);


