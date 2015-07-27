<?php

    if (!isset($_POST['name'])){
        header('location: /tareas/nueva.php');
    }
    else {
        include '../model/Tarea.php';
        
        $fechaInicio    = $_POST['fechaInicioE'];
        $fechaEntrega   = $_POST['fechaFinalE'];
        $nombreTarea    = $_POST['name'];
        $nombreMateria  = $_POST['materia'];
        $descripcion    = $_POST['descripcion'];
        $horaInicio     = $_POST['horaIni'];
        $horaFin        = $_POST['horaFin'];
        
        $nuevaTarea = new Tarea();
        $nuevaTarea->setNombre($nombreTarea);
        $nuevaTarea->setDescripcion($descripcion);
        $nuevaTarea->setMateria($nombreMateria);
        $nuevaTarea->setFechaInicio($fechaInicio, $horaInicio);
        $nuevaTarea->setFechaEntrega($fechaEntrega, $horaFin);
        $nuevaTarea->guardar();
        
        header('Location: /vista/tareas/index.php');
    }
?>