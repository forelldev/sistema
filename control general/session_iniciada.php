<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Iniciar la sesión si no está ya iniciada
}
if (isset($_SESSION['sesion']) && $_SESSION['sesion'] == 1) {
    if ($_SESSION['rango'] == 0) {
        header("Location: ./secretaria de oficina/main.php");
        exit();
    } else if ($_SESSION['rango'] == 1) {
        header("Location: ./administrador secundario/main.php");
        exit();
    } else if ($_SESSION['rango'] == 2) {
        header("Location: ./administrador/main.php");
        exit();
    }
}
?>
