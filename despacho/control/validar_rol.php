<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Iniciar la sesión si no está ya iniciada
}
$rango = $_SESSION['rango'];
switch($rango){
    case 0: header("Location ../secretaria de oficina/main.php"); 
            exit();
    case 2: header("Location: ../administrador secundario/main.php"); 
            exit();
    case 3: header("Location: ../administrador/main.php"); 
            exit();
}
?>