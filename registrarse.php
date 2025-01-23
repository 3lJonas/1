<?php 
require_once 'usuarioc.php';

$usuario=new Usuario();

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['Registrarse'])){
    $cedula=$_POST['cedula'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $contraseña=$_POST['contraseña'];
    if($usuario->Registrar($cedula,$nombre,$apellido,$contraseña)){
            header('location: index.php');
    }else{
        $error= "ocurrio un error inesperado";
        header('location: registrarse.php?error');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <?php
        if(isset($_GET['error'])){
            echo"<h2>Ingrese todos los campos</h2>";
        }
        ?>
        <input type="text" name="cedula" id="cedula" placeholder="Cedula"><br>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre"><br>
        <input type="text" name="apellido" id="apellido" placeholder="Apellido"><br>
        <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña"><br>
        <button type="submit" name="Registrarse">Registrarse</button>

    </form>
<button><a href="index.php">Cancelar</a></button>
</body>
</html>