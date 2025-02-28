<?php
include(".././control general/conexion.php");
if(isset($_POST['btn'])){
    $ci = $_POST['ci'];
    $contraseña = $_POST['contraseña'];
    $rango = $_POST['rango'];
    $consulta = $conexion->query("INSERT INTO usuarios(ci,contraseña,rango) values ('$ci','$contraseña','$rango')");
    header("Location: felicidades_newuser.php");
    exit();
}
?>