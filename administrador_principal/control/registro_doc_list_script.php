<?php 
require_once '../control_general/conexion.php';
$consulta = $conexion->query("SELECT * FROM registro_docs ORDER BY fecha DESC");
?>