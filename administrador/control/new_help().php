<?php
include(".././control general/conexion.php");
if(isset($_POST['btn'])){
    $titulo = $_POST['titulo'];
    $estado = "En espera del documento físico para ser procesado 1/3";
    $consulta = $conexion->query("INSERT INTO system_help(titulo,estado) values ('$titulo','$estado')");
    header("Location: felicidades_help.php");
    exit();
}
?>