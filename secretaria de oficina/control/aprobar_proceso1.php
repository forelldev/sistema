<?php
    include("../.././control general/conexion.php");
    $id = $_GET['id'];
    $consulta = $conexion->query("UPDATE system_help SET estado = 'En Proceso 2/3' WHERE id = '$id'"); 
    header("Location: ../system_help.php");
    exit();
?>