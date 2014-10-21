<?php 

define('__ROOT__', dirname(dirname(__FILE__))); 

require_once(__ROOT__.'/DatosViales.class.php');
require_once(__ROOT__.'/Log/LogDatosViales.class.php');
/**
* subClase Estaciones
*/
class Estaciones extends DatosViales
{
	private $_mongoQuery = array('$and'=>array());
	private $_isOk= true;

	public function __construct($query= null)
	{
		foreach ($query as $fn => $params) {
			$this->{"_setQuery_".$fn}($params);	
		}

		var_dump($this->_isOk);
	}

	function __call($key,$value)
	{
	//	echo "<BR>esta funcion no existe: {$key}";
	}
	function __get($name)
	{
	//	echo "<BR>esta funcion no existe: {$key}";
	}

	private function _setQuery_anios($arrayAnios){
		$arrayQuery = array('$or'=>array());
		foreach ($arrayAnios as $anio) {
			$arrayQuery['$or'][]= array('anio'=>(int)$anio);
		}
		$this->_mongoQuery['$and'][]=$arrayQuery;
		$this->_isOk= $this->_isOk && true;
		
	}
	
	private function _setQuery_estados($arrayEstados){
		if (!$this->valid_estados($arrayEstados))
			{
				$this->_isOk=false;
	        	$this->writeError("hubo un problema con _setQuery_tramos");
     		}else{
     			$arrayQuery = array('$or'=>array());
				foreach ($arrayEstados as $estado) {
					$arrayQuery['$or'][]= array('estado'=>(string)$estado);
				}
				$this->_mongoQuery['$and'][]=$arrayQuery;
				$this->_isOk= $this->_isOk && true;
		}

	}
	private function valid_estados($array){
		return ($array == null || count($array)==0 ) ? false : true ;		
	}
	
	private function _setQuery_tramos($arrayTramos){
		$arrayQuery = array('$or'=>array());
		foreach ($arrayTramos as $tramo) {
			$arrayQuery['$or'][]= array('tramo'=>(string)$tramo);
		}
		$this->_mongoQuery['$and'][]=$arrayQuery;

        
        $this->_isOk= $this->_isOk && true;
		
	}

	function writeError($msg){
		new LogDatosViales(array('status'=>"0002",'msg'=>(string)$msg),true);
	}

	function getJson(){
		return;
	}
}

//->find(array('$and'=>array()))
