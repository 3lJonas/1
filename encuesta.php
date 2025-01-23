<?php
require_once 'usuarioc.php';
require_once 'encuestac.php';

session_start();

$usuario = new Usuario();
$encuesta = new Encuesta();

if (!$usuario->estaLogueado()) {
    header('location: index.php');
}
$id = $_SESSION['id'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$es_admin = $_SESSION['es_admin'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['cancelar'])) {
        $usuario->Salir();
        header('location: index.php');
    }
    if (isset($_POST['enviarEncuesta']) && !$es_admin) {

        if (!$encuesta->existeEncuesta($id)) {
            $encuesta->guardarEncuesta($id, $_POST['p1'], $_POST['p2']);
            $mensaje = "la encuesta se envio correctamente";
        } else {
            $mensaje = "La encuesta ya fue realizada";
        }
    }

}

$encuestaUsuario = $encuesta->existeEncuesta($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta</title>
</head>

<body>
    <?php if ($es_admin){ ?>
        <h1>Bienvenido Administrador, solo tienes acceso a los reportes</h1>
        
        <button type="button" onclick="window.location.href='reporte.php'">Ver reporte</button>

    <?php }else{ ?>
        <?php if ($encuestaUsuario){ ?>
            <h1>Ya has contestado las preguntas</h1>
            <h3>1.-¿Sabes programacion orientada a objetos?</h3>
            <h4>Respuesta: <?php echo $encuestaUsuario['p1'] ?></h4>
            <h3>1.-¿Sabes php?</h3>
            <h4>Respuesta: <?php echo $encuestaUsuario['p2'] ?></h4>

        <?php }else{ ?>
            <form method="POST">
                <h1>Bienvenido a la encuesta <?php echo $_SESSION['nombre']; echo " ".$_SESSION['apellido']; ?></h1>
                <h3>a continuación responda las 2 preguntas para enviar:</h3>
                <h3>1.-¿Sabes programacion orientada a objetos?</h3>
                <input type="radio" name="p1" value="SI" required>Si<br>
                <input type="radio" name="p1" value="NO" required>No<br>

                <h3>1.-¿Sabes php?</h3>
                <input type="radio" name="p2" value="SI" required>Si<br>
                <input type="radio" name="p2" value="NO" required>No<br>
                <button type="submit" name="enviarEncuesta">Enviar</button>

            </form>

        <?php }}?>
    <form method="POST">
        <button type="submit" name="cancelar">Cancelar</button>
    </form>
</body>

</html>