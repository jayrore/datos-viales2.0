<?php 

abstract class Log{
	protected $_strFileName = "Log.txt";

	protected function Write($strContent){
		if($strContent == null || $strContent == "")
			exit();
		$file = fopen($this->_strFileName, 'a+');
		fwrite($file,"\r".$strContent);
		fclose($file);
	}

	protected function Read(){
		$file = fopen($this->_strFileName, 'r');
		$file_content = file_get_contents($this->_strFileName);
		return $file_content;
	}

	protected function DailyLogs(){
			$this->_strFileName = date("d-m-y")."_Log.txt";
	}
}
