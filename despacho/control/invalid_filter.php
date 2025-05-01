<?php 
require_once("../control_general/conexion.php");
$consulta = $conexion->query("SELECT * FROM system_despacho WHERE estado = 'No Aprobado'");
?>