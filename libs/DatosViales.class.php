<?php 
/**
* Clase Base Datos Viales
*/
abstract class DatosViales
{
	
	function __construct()
	{
		# code...
	}

	abstract protected function getJson();
}