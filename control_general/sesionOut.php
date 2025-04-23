<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Iniciar la sesión si no está ya iniciada
}

if (!isset($_SESSION['sesion']) && $_SESSION['sesion'] !== 'True') {
    header("Location: ../index.php");
    exit();
}
?>