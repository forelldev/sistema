<?php
require_once('conexion.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['id'])) {
    $ci = $_SESSION['id'];
    $sql = $conexion->query("SELECT * FROM user WHERE ci='$ci'");
    $sesion = $sql->fetch_assoc();

    if ($sesion['sesion'] == 'False') {
        session_unset();
        session_destroy();
        echo json_encode(['redirect' => true]);
        exit();
    }
}

echo json_encode(['redirect' => false]);
?>

