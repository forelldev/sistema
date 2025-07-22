<?php 
require_once '../control_general/conexion.php';
// Crear nuevo rango
if (isset($_POST['crear_rango'])) {
    $nombre_rango = $_POST['nombre_rango'];
    $max = intval($_POST['max']);
    // Obtener el número más alto del campo 'rango'
    $consultaMax = $conexion->query("SELECT MAX(rango) as ultimo_rango FROM rangos");
    $datosMax = mysqli_fetch_assoc($consultaMax);
    $rango = intval($datosMax['ultimo_rango']) + 1;
    // Insertar el nuevo rango
    $insert = $conexion->query("INSERT INTO rangos (rango, nombre_rango, max) VALUES ('$rango', '$nombre_rango', $max)");
    if ($insert) {
        echo "<script>alert('Rango creado exitosamente'); window.location.href='registro.php';</script>";
    } else {
        echo "Error al crear el rango: " . mysqli_error($conexion);
    }
    exit;
}

// Registrar usuario
if (isset($_POST['btn'])) {
    $rango = $_POST['rango'];
    // Validar límite
    $limite = $conexion->query("SELECT max FROM rangos WHERE rango = '$rango'");
    $actual = $conexion->query("SELECT COUNT(*) as total FROM user WHERE rango = '$rango'");
    $max = mysqli_fetch_assoc($limite)['max'];
    $total = mysqli_fetch_assoc($actual)['total'];
    if ($total >= $max) {
        echo "<script>alert('Ya se alcanzó el límite de usuarios para este rango'); window.location.href='registro.php';</script>";
        exit;
    }
    // Insertar usuario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $ci = $_POST['ci'];
    $contraseña = $_POST['contraseña'];
    $sesion = "False";

    $consulta = $conexion->query("INSERT INTO user (ci,contraseña,rango,sesion) VALUES ('$ci','$contraseña','$rango','$sesion')");
    $consulta2 = $conexion->query("INSERT INTO user_info (ci,nombre,apellido) VALUES ('$ci','$nombre','$apellido')");

    header("Location: felicidades_newuser.php");
    exit;
}
?>