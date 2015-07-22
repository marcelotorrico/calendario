<?php
require_once 'data/Connection.php';
require_once 'PersistentObject.php';
require_once 'Timestamp.php';
require_once 'Materia.php';

class Tarea extends PersistentObject{

	private $fecha_inicio;
	private $fecha_entrega;
	private $nombre;
	private $descripcion;
	private $materia_id;
	
	function __construct($id = -1){
		parent::__construct($id);
	}
	
	protected function initialize_from($aRow){
		$this->fecha_inicio  	= new Timestamp($aRow['fecha_inicio']);
		$this->fecha_entrega  	= new Timestamp($aRow['fecha_entrega']);
		$this->nombre 	    	= $aRow['nombre'];
		$this->descripcion		= $aRow['descripcion'];
		$this->materia_id	 	= $aRow['materia_id'];
	}
	
	public static function all(){
		//ahora implemento esto :)
		$connection 	= Connection::getInstance();
		$class = "tareas";
		$result = $connection->query("SELECT id FROM $class");
		
		$res = array();
		
		while ($id = pg_fetch_array($result)[0]){
			echo "$id<br>";
			$res[] = new Tarea($id);
		}
		
		return $res;
	}
	
	public function guardar(){
            
         $connection = Connection::getInstance();
         $consulta 	 = "UPDATE tareas SET
         				nombre = '$this->nombre',
         				descripcion = '$this->descripcion',
        				materia_id = $this->materia_id,
        				fecha_inicio = '$this->fecha_inicio',
        				fecha_entrega = '$this->fecha_entrega'
         				WHERE id = $this->id";
         
         $connection->query($consulta);
    }
	
	public function setMateria($materia_id){
	//	$this->materia_id = $materia_id;
		$this->materia_id = 1;
	}
	
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}
 	public function setFechaInicio($date, $hour){
 		$this->fecha_inicio = new Timestamp($date, $hour);
 	}
 	public function setFechaEntrega($date, $hour){
 		$this->fecha_entrega = new Timestamp($date, $hour);
 	}
 	
 	public function getMateria(){
 		return new Materia($this->materia_id);
 	}
 	public function getNombre(){
 		return $this->nombre;
 	}
 	public function getFechaInicio(){
 		return $this->fecha_inicio;
 	}
 	public function getFechaEntrega(){
 		return $this->fecha_entrega;
 	}
 	public function getDescripcion(){
 		return $this->descripcion;
 	}
 	
 	public function __toString(){
 		return "$this->nombre :) <br>";
 	}
}

?>