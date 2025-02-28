<?php
session_start();
if (!isset($_SESSION['sesion']) || $_SESSION['sesion'] !== 1) {
    header("Location: ../index.php");
exit(); // Asegúrate de que el script se detenga después de la redirección
}
?>

