<?php 
require_once("../../control_general/conexion.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Iniciar la sesión si no está ya iniciada
}
date_default_timezone_set('America/Caracas');
$fecha = date("Y-m-d H:i:s");
$consulta = $conexion->query("UPDATE system_help SET fecha_solicitud = '$fecha'");
header("Location: ../system_help.php");
?>
