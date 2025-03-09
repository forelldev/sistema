<?php 
include("../.././control general/conexion.php"); 
$id = $_GET['id'];
$estado = "En espera del documento físico para ser procesado 1/3";
$consulta = $conexion->query("UPDATE system_help SET estado = '$estado', descripcion = '' WHERE id = '$id'");
header("Location: ../system_help.php");
exit();
?>