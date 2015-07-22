<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Tareas Registradas</title>
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
        <table class="table table-striped table-hover table-bordered table-condensed">
        <tr class="info">
            <th>nombre</th>
            <th>fecha inicio</th>
            <th>fecha fin</th>
            <th>materia</th>
        </tr>
        <?php 
        include '../model/connection.php';
while ($datos = pg_fetch_array($aRow)){ 
?> 
<tr> 
<td> <?=$aRow["nombre"]?> </td> 
<td> <?=$aRow["fecha_inicio"]?> </td> 
<td> <?=$aRow["fecha_entrega"]?> </td>
<td> <?=$aRow["materia_id"]?> </td>
</tr> 
<?php 
} 
pg_free_result($aRow); 
?> 
</table> 
<?php 
} else { 
echo "No se encontraron datos en la base de datos"; 
} 
?>  
      
        </div>
    </body>
</html>