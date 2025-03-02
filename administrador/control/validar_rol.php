<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Iniciar la sesión si no está ya iniciada
}
$rango = $_SESSION['rango'];
if ($rango == 0){
    header("Location: ../secretaria de oficina/main.php");
}
else if($rango == 1){
    header("Location: ../administrador secundario/main.php");
}
?>