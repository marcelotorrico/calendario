<!-- $tarea deberia ser definida antes de llamar a este archivo. Esto es un parcial -->
<tr> 
<td> <a href="/estudiantes/tarea.php?id=<?=$tarea->getId()?>"><?=$tarea->getNombre()?></a></td> 
<td> <?=$tarea->getFechaInicio()?> </td> 
<td> <?=$tarea->getFechaEntrega()?> </td>
<td> <?=$tarea->getMateria()->getNombre()?> </td>
<td> <?=$tarea->getDescripcion()?></td>
<?php
if (isset($ver_entrega) && $ver_entrega == true){
	echo "<td>".$estudiante->estadoDe($tarea)."</td>";
}
?>
</tr> 