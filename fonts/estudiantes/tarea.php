<?php
	session_start();
	require_once "../model/Estudiante.php";
	require_once "../model/Tarea.php";
	$estudiante = new Estudiante($_SESSION['usuario_id']);
	$tarea 		= new Tarea($_GET['id']);
	
	if (isset($_POST['archivo'])){
		require_once "../controlador/manejadorDeArchivos.php";	
		recibirArchivo($estudiante, $tarea);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		
        <body style="background:#F0F8FF">
        <meta charset="UTF-8">
        <title>Tarea: <?=$tarea->getNombre()?></title>
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="/dist/bootstrap-clockpicker.min.css">
	    <link rel="stylesheet" type="text/css" href="/assets/css/github.min.css">
	    <link rel="stylesheet" href="/css/bootstrap.css">
	    <link rel="stylesheet" href="/css/datepicker.css">
	</head>
	<body>
		<h1>Tarea: <?=$tarea->getNombre()?></h1>
		<p><b>Estado: </b> <?=$estudiante->estadoDe($tarea)?></p>
		<p>Publicada en: <?=$tarea->getFechaInicio()->mostrar()?></p>
		<p>Fecha limite de entrega: <?=$tarea->getFechaEntrega()->mostrar()?></p>
		<p>Descripcion: <i> <?=$tarea->getDescripcion()?></i></p>
		<?php
			if ($estudiante->estadoDe($tarea) == Tarea::PENDIENTE){
				require "_entrega.php";
			}
		?>
	</body>
</html>