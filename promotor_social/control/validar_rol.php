<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Iniciar la sesión si no está ya iniciada
}

// Verificar si 'rango' está definido en la sesión
if (!isset($_SESSION['rango'])) {
    die("Acceso denegado: no se ha definido el rango de usuario.");
}

$rango = $_SESSION['rango'];

switch ($rango) {
    case 1:
        header("Location: ../despacho/main.php");
        exit();
    case 2:
        header("Location: ../administracion/main.php");
        exit();
    case 3:
        header("Location: ../administrador_principal/main.php");
        exit();
}
?>