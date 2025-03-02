<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Iniciar la sesión si no está ya iniciada
}
if (!isset($_SESSION['sesion']) || $_SESSION['sesion'] !== 1) {
    header("Location: ../index.php");
exit(); // Asegúrate de que el script se detenga después de la redirección
}
?>

