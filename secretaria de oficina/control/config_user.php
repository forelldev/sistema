<?php 
include("../control general/conexion.php");
if(isset($_POST['btn'])){
    $ci = $_POST['ci'];
    $id = $_SESSION['id'];
    $contraseña = $_POST['contraseña'];
    $consulta = $conexion->query("UPDATE usuarios SET ci = '$ci',contraseña = '$contraseña' WHERE ci = '$id'");
    $_SESSION['id'] = $ci;
    header("Location: main.php");
    exit();
}
?>