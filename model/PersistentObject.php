<?php

function pluralize($str){
	return $str."s";
}

abstract class PersistentObject{
		
	protected $id;
	
	protected function __construct($id = -1){
		if ($id < 0){
			$this->construct_new();
		} else {
			$connection = Connection::getInstance();
			$class 		= $this->getClass();
			$data 		= $connection->query("SELECT * FROM $class WHERE id = $id");
			
			$this->id = $id;
			
			while ($aRow = pg_fetch_assoc($data)){
				$this->initialize_from($aRow);
			}
		}
	}
	
	private function construct_new(){
		$connection 	= Connection::getInstance();
		$class = $this->getClass();
		$connection->query("INSERT INTO $class DEFAULT VALUES");
		$res = $connection->query("SELECT currval('$class"."_id_seq')");
		$arr = pg_fetch_array($res);
		$this->id = $arr[0];
	}
	
	private function getClass(){
		return strtolower(pluralize(get_class($this)));
	}
	
	
	protected abstract function initialize_from($aRow);
	
}
	
?>