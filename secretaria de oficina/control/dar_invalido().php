<?php
include(".././control general/conexion.php");
if(isset($_POST['btn'])){
    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];
    // Actualizar el estado del documento en la base de datos
    $consulta = $conexion->query("UPDATE system_help SET estado = 'Documento inválido', descripcion = '$descripcion' WHERE id = '$id'");
    header("Location: system_help.php");
    exit();
}
?>