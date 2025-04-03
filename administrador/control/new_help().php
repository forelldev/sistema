<?php
include(".././control general/conexion.php");
date_default_timezone_set('America/Caracas');
if(isset($_POST['btn'])){
    $titulo = $_POST['titulo'];
    $estado = "En espera del documento físico para ser procesado 0/3";
    $fecha = date("Y-m-d H:i:s");
    $consulta = $conexion->query("INSERT INTO system_help(titulo,estado,fecha_solicitud) values ('$titulo','$estado','$fecha')");
    header("Location: felicidades_help.php");
    exit();
}
?>