<?php

function carpetaPara($materia){
	$raiz = realpath($_SERVER['DOCUMENT_ROOT']);
	return "$raiz/archivos/$materia";
}

function crearCarpeta(){
	
}

function recibirArchivo($estudiante, $tarea){
	$materia = $tarea->getMateria()->getNombre();
	$destino = carpetaPara($materia);
	
	if (!existe($destino)){
		crearCarpeta($destino);
	}
	
	echo $destino;
}

?>