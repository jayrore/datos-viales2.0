<?php 

define('__ROOT__', dirname(dirname(__FILE__))); 
require_once(__ROOT__.'/DatosViales.class.php');
require_once(__ROOT__.'/MongoConection.class.php');
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
		if (!$this->valid_anios($arrayAnios))
			{
				$this->_isOk=false;
	        	$this->writeError("hubo un problema con _setQuery_tramos");
     		}else{
			$arrayQuery = array('$or'=>array());
			foreach ($arrayAnios as $anio) {
				$arrayQuery['$or'][]= array('anyo'=>(int)$anio);
			}
			$this->_mongoQuery['$and'][]=$arrayQuery;
			$this->_isOk= $this->_isOk && true;
		}
	}
	
	private function _setQuery_estados($arrayEstados){
		if (!$this->valid_estados($arrayEstados))
			{
				$this->_isOk=false;
	        	$this->writeError("hubo un problema con _setQuery_estados");
     		}else{
     			$arrayQuery = array('$or'=>array());
				foreach ($arrayEstados as $estado) {
					$arrayQuery['$or'][]= array('estados'=>(int)$estado);
				}
		
				$this->_mongoQuery['$and'][]=$arrayQuery;
				$this->_isOk= $this->_isOk && true;
			}

	}

	private function _setQuery_carreteras($arrayCarreteras){
		if (!$this->valid_estados($arrayCarreteras))
			{
				$this->_isOk=false;
	        	$this->writeError("hubo un problema con _setQuery_carreteras");
     		}else{
				$arrayQuery = array('$or'=>array());
				foreach ($arrayCarreteras as $carretera) {
					$arrayQuery['$or'][]= array('id_carretera'=>(int)$carretera);
				}

				$this->_mongoQuery['$and'][]=$arrayQuery;
				$this->_isOk= $this->_isOk && true;
			}
		
	}

	private function valid_estados($array){
		return ($array == null || count($array)==0 ) ? false : true ;		
	}
	private function valid_anios($array){
		return ($array == null || count($array)==0 ) ? false : true ;		
	}
	private function valid_carreteras($array){
		return ($array == null || count($array)==0 ) ? false : true ;		
	}
	function writeError($msg){
		new LogDatosViales(array('status'=>"0002",'msg'=>(string)$msg),true);
	}

	function getJson(){
		return;
	}
	private function conectDB(){
		$con = new MongoConection("jayroserver-pc:27017", "devDatosViales");
		return $con;
	}
	/*
	*	@param $array_query 
	*/
	public function find($array_query=null){
		$array_query = ($array_query == null) ? $this->_mongoQuery : $array_query;
		
		$conexion = $this->conectDB();
		$db = $conexion->get_db();
		//print_r($this->query_estados);
		//print_r($this->query_anyo);
		//print_r($this->query_carreteras);
		//print_r($array_query);
		$result = $db->estaciones->find($array_query);

		return iterator_to_array( $result );
	}
}