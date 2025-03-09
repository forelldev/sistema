<?php
    include("../.././control general/conexion.php");
    $id = $_GET['id'];
    $consulta2 = $conexion->query("UPDATE system_help SET estado = 'En espera del documento físico para ser procesado 0/3' WHERE id = '$id'");
    header("Location: ../system_help.php");
    exit();
?>