<?php
require_once 'data/Connection.php';

class Tarea{

	private $tiempo_inicio;
	private $tiempo_limite;
	private $nombre;
	private $descripcion;
	private $materia_id;
	private $id;
	
	function construct_new(){
		$connection 	= Connection::getInstance();
		$connection->query("INSERT INTO tareas (nombre) VALUES('')");
		$res = $connection->query("SELECT currval('tareas_id_seq')");
		$arr = pg_fetch_array($res);
		$this->id = $arr[0];
	}
	
	function __construct($id = -1){
		if ($id == -1)
			$this->construct_new();
		else {
			$connection 	= Connection::getInstance();
			$datosDeTarea 	= $connection->query("SELECT * FROM tareas WHERE id = $id");
			
			$this->id = $id;
			
			while ($aRow = pg_fetch_assoc($datosDeTarea)){
				$this->tiempo_inicio  	= $aRow['tiempo_inicio'];
				$this->tiempo_limite  	= $aRow['tiempo_limite'];
				$this->nombre 	    	= $aRow['nombre'];
				$this->descripcion		= $aRow['descripcion'];
				$this->materia_id	 	= $aRow['materia_id'];
			}
		}
	}
	
	public function guardar(){
            
         $connection = Connection::getInstance();
         //agregar los tiempos
         $consulta 	 = "UPDATE tareas SET
         				nombre = '$this->nombre',
         				descripcion = '$this->descripcion',
        				materia_id = '$this->materia_id'
         				WHERE id = $this->id";
         				
         $connection->query($consulta);
    }
	
	public function printTime(){
		echo $this->nombre;
		echo $this->tiempo_limite."---<br>";
		echo date("Y-m-d H:i:s")."<br>";
	}
	
	public function getNombre(){
		return $this->nombre;
	}
	
	public static function execClosure($aClosure){
		$a = new Tarea(1);
		echo 'esto es un closure en accion :D <br>';
		$aClosure($a);
	}
	
	//aca buscar materia
	public function setMateria($materia){
		$this->materia_id = 1;
	}
	
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}
  
}

?>