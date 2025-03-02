<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Iniciar la sesión si no está ya iniciada
}
include("conexion.php");
date_default_timezone_set("America/Caracas");
$hora = date("H:i:s");
$id=$_SESSION['id_entrada'];
$registroOut = $conexion->query("UPDATE reportes_entradas SET hora_salida='$hora' WHERE id LIKE'$id'");
session_unset();
session_destroy();
header("Location: ../index.php");
exit();
?>