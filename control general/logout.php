<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Iniciar la sesión si no está ya iniciada
}
include("conexion.php");
date_default_timezone_set("America/Caracas");
$fecha = date("Y-m-d H:i:s");
$id=$_SESSION['id_entrada'];
$registroOut = $conexion->query("UPDATE reportes_entradas SET fecha_salida='$fecha' WHERE id LIKE'$id'");
session_unset();
session_destroy();
header("Location: ../index.php");
exit();
?>