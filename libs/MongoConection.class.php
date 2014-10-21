<?php
class MongoConection 
{			
		protected $_conexion, $_hostConn, $_dbConn, $_hostName, $_dbName;

		/*  
		*	Hace instancia de conexion a la base de datos
		* 	@param   $_host  host de conexion a mongodb
		*	@param   $_db    base de datos a conectar
		*   @return  null
		*/
		public function __construct($_host="mongodb://localhost:27017", $_db="development" ) 
		{	
			$this->_hostName = $_host;
			$this->_dbName   = $_db;

			$this->_hostConn  = new MongoClient($this->_hostName);
			$this->_dbConn 	   = $this->_hostConn->selectDB($this->_dbName);
		}
		
		/*

		*/
		public function close(){
			//return $this->_hostConn->close(); 
		}
		/*
		*	@return _host nombre de le host
		*/
		public function get_host(){
			return $this->_hostConn;
		}
		/*
		*	@return _db nombre de la base de datos conectado
		*/
		public function get_db(){
			return $this->_dbConn;
		}
		/*
		*	@return _host nombre de le host
		*/
		public function get_hostName(){
			return $this->_hostName;
		}
		/*
		*	@return _db nombre de la base de datos conectado
		*/
		public function get_dbName(){
			return $this->_dbName;
		}

		function __destruct (){
			$this->close();
		}

}