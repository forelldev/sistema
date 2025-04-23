<?php 
    require_once("../control_general/conexion.php");
    if (session_status() == PHP_SESSION_NONE) {
        session_start(); // Iniciar la sesión si no está ya iniciada
    }
    $id = $_SESSION['id'];
    $consulta = $conexion->query("SELECT * FROM user INNER JOIN user_info ON user.ci = user_info.ci WHERE user.ci = $id");
    $mostrar = mysqli_fetch_array($consulta);
?>