<?php

    if (!isset($_POST['name'])){
        header('location: /tareas/nueva.php');
    }
    else {
        include '../model/Tarea.php';
        $fechaInicio   = date("Y-m-d",strtotime($_POST['dateIni']));
        $fechaEntrega   = date("Y-m-d",strtotime($_POST['dateLimi']));
        $nombreTarea    = $_POST['name'];
        $nombreMateria  = $_POST['materia'];
        $descripcion    = $_POST['descripcion'];
        $horaInicio     = $_POST['horaIni'];
        $horaFin        = $_POST['horaFin'];
        
        //este atributo aun no es parte de nuestra historia
        $archivo = $_FILES["archivo_adjunto"]; 
        
        echo "creando nueva tarea :D";
        echo "<br>";
        echo "nombre: ".$nombreTarea;
        echo "<br>";
        echo "fecha de Entrega: ".$fechaEntrega;
        echo "<br>";
        echo "nombreMateria: ".$nombreMateria;
        echo "<br>";
        echo "descripcion: ".$descripcion;
        echo "<br>";
        echo "horafin: ".$horaFin;
        echo "<br>";
        echo "horaInicio: ".$horaInicio;
        
        $nuevaTarea = new Tarea();
        $nuevaTarea->setNombre($nombreTarea);
        $nuevaTarea->setDescripcion($Descripcion);
        $nuevaTarea->setMateria($nombreMateria);
        $nuevaTarea->guardar();
    }
?>