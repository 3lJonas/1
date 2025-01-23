<?php
require_once 'usuarioc.php';
require_once 'reportec.php';
session_start();
$usuario = new Usuario();
$reporte = new Reporte();

if (!$usuario->estaLogueado() || !$_SESSION['es_admin']) {
    header('location: index.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cancelar'])) {
    $usuario->Salir();
    header('location: index.php');
}
$rep1 = $reporte->respuestaP1();
$rep2 = $reporte->respuestaP2();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Reporte</h1><br>
    <h3>1.-¿Sabes programacion orientada a objetos?</h3>
    
    <?php foreach ($rep1 as $reporte) {
        echo $reporte['p1'] . ": " . $reporte['total'];
    } ?>
    <h3>1.-¿Sabes php?</h3>
    <?php foreach ($rep2 as $reporte) {
        echo $reporte['p2'] . ": " . $reporte['total'];
    } ?>
    <form method="POST">
        <button type="submit" name="cancelar">Cancelar</button>
    </form>
</body>

</html>