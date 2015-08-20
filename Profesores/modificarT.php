<?php
session_start();
require_once "../model/Estudiante.php";
if (isset($_SESSION['usuario_id'])){
    $estudiante = new Estudiante($_SESSION['usuario_id']);
} else {
    header("Location: /index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <body style="background:#F0F8FF">
        <meta charset="UTF-8">
        <title>Tareas de <?=$estudiante->getNombreUsuario()?></title>
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
	     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	     <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
	     <link rel="stylesheet" type="text/css" href="../../dist/bootstrap-clockpicker.min.css">
	     <link rel="stylesheet" type="text/css" href="../../assets/css/github.min.css">
         <link rel="stylesheet" href="../../css/bootstrap.css">
         <link rel="stylesheet" href="../../css/datepicker.css">
    </head>
    <body>
        <div class="container">
            <h1>Lista de Tareas de <?=$estudiante->getNombreUsuario()?></h1>
            <table class="table table-striped table-hover table-bordered table-condensed">
            <tr class="info">
                <th>Nombre</th>
                <th>Fecha de Inicio</th>
                <th>fecha de Entrega</th>
                <th>Materia</th>
                <th>Descripcion</th>
                
            </tr>
            <?php 
                require_once '../model/modificar.php';
                $ver_entrega = true;
                foreach($estudiante->tareas() as $tarea){ 
                	require "../vista/tareas/_lineaTarea.php";
                }
            ?> 
            </table>
            <a href="inicio.php"><button class="btn btn-primary">Volver</button></button></a>
        </div>
    </body>
</html>
