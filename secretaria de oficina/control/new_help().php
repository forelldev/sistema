<?php
include(".././control general/conexion.php");
date_default_timezone_set('America/Caracas');
if(isset($_POST['btn'])){
    $titulo = $_POST['titulo'];
    $estado = "En espera del documento físico para ser procesado 1/3";
    $fecha = date("Y-m-d");
    $consulta = $conexion->query("INSERT INTO system_help(titulo,estado,fecha) values ('$titulo','$estado','$fecha')");
    header("Location: felicidades_help.php");
    exit();
}
?>