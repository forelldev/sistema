<?php
include("conexion.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Iniciar la sesión si no está ya iniciada
}
if(isset($_POST['btn'])){
    $ci = $_POST['ci'];
    $contraseña = $_POST['contraseña'];
    // Preparar la consulta para evitar inyecciones SQL
    $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE ci = ? AND contraseña = ?");
    // "i" indica que el primer parámetro es un entero, "s" indica que el segundo parámetro es una cadena
    $consulta->bind_param("is", $ci, $contraseña);
    $consulta->execute();
    $resultado = $consulta->get_result();
    if($resultado->num_rows > 0){
        $mostrar = $resultado->fetch_assoc();
        $rango = $mostrar['rango'];
        $_SESSION['sesion'] = 1;
        $_SESSION['rango'] = $rango;
        $_SESSION['id'] = $mostrar['ci'];
        if($rango == 0){
            header("Location: ./secretaria de oficina/main.php");
            exit();
        }
        else if ($rango == 1){
            header("Location: ./administrador secundario/main.php");
            exit();
        }
        else if ($rango == 2){
            header("Location: ./administrador/main.php");
            exit();
        }
    }   
    else {
        echo "Datos Incorrectos";
    }
    $consulta->close();
}
?>