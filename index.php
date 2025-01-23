<?php 
require_once 'usuarioc.php';
session_start();
$usuario= new Usuario();
if($usuario->estaLogueado()){
    header('location: encuesta.php'); 
}
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){
$cedula=$_POST['cedula'];
$contraseña=$_POST['contraseña'];
echo $usuario->Login($cedula,$contraseña);
if($usuario->Login($cedula,$contraseña)){
    header('location: encuesta.php');
}else{
    echo "credenciales incorrectas";
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="POST">
        <h1>Login</h1>
        <input type="text" name="cedula" placeholder="cedula"><br>
        <input type="password" name="contraseña" placeholder="contraseña"><br>
        <button type="submit" name="login">Entrar</button>
        <button type="button" onclick="window.location.href='registrarse.php'">Registrarse</button>
    </form>
</body>
</html>