<?php
require_once '../model/Usuario.php';

    $usuario= $_POST['usuario'];
    $contrasena= $_POST['contrasena'];
   
    $usuario_id = Usuario::autenticar($usuario, $contrasena);
    
    if($usuario_id != null){
        session_start();
        $_SESSION['usuario_id'] = $usuario_id;
        echo "<script>window.location='/estudiantes/inicio.php';</script>";
    }else{
        $mensaje = "Registro incorrecto. Vuelva a intentarlo";
        echo "<script>alert('$mensaje'); window.location='../index.php';</script>";
    }
?>
