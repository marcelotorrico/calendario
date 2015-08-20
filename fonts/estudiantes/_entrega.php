<form action =  "/estudiantes/tarea.php?id=<?=$tarea->getId()?>" method = "POST">
    <label for="archivo">Seleccione el archivo a entregar</label><br>
    <input type="file" name="archivo" accept = ".pdf, .zip"/>
    <br>
    <input type="submit" value = "Entregar"/>
</form>

