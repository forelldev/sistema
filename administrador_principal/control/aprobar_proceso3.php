<?php
require_once("../../control_general/conexion.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Iniciar la sesión si no está ya iniciada
}
// Validar que el ID sea un número entero
$id_doc = filter_var($_GET['id_doc'], FILTER_VALIDATE_INT);
if ($id_doc === false) {
    die("ID inválido.");
}

// Preparar la consulta para evitar inyecciones SQL
$stmt = $conexion->prepare("UPDATE system_help SET estado = ? WHERE id_doc = ?");
if ($stmt) {
    $estado = "Proceso Finalizado 3/3";

    // Vincular los parámetros
    $stmt->bind_param("si", $estado, $id_doc);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redirigir al usuario si la consulta fue exitosa
        $id = $_SESSION['id'];
        date_default_timezone_set('America/Caracas');
        $fecha = date("Y-m-d H:i:s");
        $user_info = $conexion->query("SELECT * FROM user_info WHERE ci = $id");
        $user_rol = $conexion->query("SELECT * FROM user WHERE ci = $id");
        $rol = mysqli_fetch_assoc($user_rol)['rango']; // Directamente el valor sin necesidad de otra variable
        $datos_usuario = $user_info->fetch_assoc();
        $nombre = $datos_usuario['nombre'];
        $consulta_reporte = $consulta = $conexion->query("INSERT INTO reportes_solicitudes (rol,nombre,accion,fecha,id_doc) VALUES ('$rol','$nombre','Aprobó el tercer proceso','$fecha','$id_doc')");
        header("Location: ../system_help.php");
        exit();
    } else {
        // Manejar errores en la ejecución de la consulta
        echo "Error al ejecutar la consulta: " . $stmt->error;
    }

    // Cerrar el statement
    $stmt->close();
} else {
    // Manejar errores en la preparación de la consulta
    echo "Error al preparar la consulta: " . $conexion->error;
}
?>