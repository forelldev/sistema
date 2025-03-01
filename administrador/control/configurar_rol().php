<?php 
include(".././control general/conexion.php");
if(isset($_POST['btn'])){
    $id = $_POST['id'];
    $rango = $_POST['rango'];
    $consulta = $conexion->query("UPDATE usuarios SET rango = '$rango' WHERE ci = '$id'");
    header("Location: list_users.php");
    exit();
}
?>