<?php 
require_once(__ROOT__."/Log.class.php");
/**
* 
*/
class LogDatosViales extends Log
{	
	private $_event;
	/*
	*	@param $event
	*/
	function __construct($event,$dailyLogs = false)
	{
		if($dailyLogs)
			$this->DailyLogs();

		$this->Write("Conexion con servidor de encuestas a las ". $this->getDate()); 
		$this->_event = $event;
		$this->evalStatus();

	}

	/*
	*
	*/
	private function getDate()
	{
		return date('Y-m-d H:i:s', time());
	}
	/*
	*
	*/
	private function evalStatus(){
		switch ($this->_event['status']) 
			{
				case '0001':
				# code...
					$this->Success();
				break;
				case '0002':
				# code...
					$this->Fail();
				break;				
				default:
				# code...
					$this->error("[ERROR] Evento no identificado");
				break;
			}				
	}
	/*
	*
	*/
	private function Success()
	{
		$msg = "user ".$this->_event['user'].
		" [".$this->_event['status']."] succesfuly ".$this->_event['type'].
		" on ".$this->_event['db'].
		" DB , collection ".$this->_event['col'].
		" at ".$this->getDate();  
		$this->Write($msg);
	}
	/*
	*
	*/
	private function Fail()
	{	$msg = "\r[".$this->getDate()."]".$this->_event['msg'];  
		$this->Write($msg);
	}

	/*
	*
	*/
	private function Error($msg)
	{
		$this->Write($msg);
	}
	/*
	*
	*/
	public function Monitor()
	{
		$text="dhjdkl";
		echo "{$this->Read()}";
	}
}
