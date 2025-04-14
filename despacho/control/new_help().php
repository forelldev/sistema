<?php
include(".././control general/conexion.php");
date_default_timezone_set('America/Caracas');
if (isset($_POST['btn'])) {
    $titulo = $_POST['titulo'];
    $estado = "En espera del documento físico para ser procesado 0/3";
    $fecha = date("Y-m-d H:i:s");
    // Preparar la consulta para evitar inyecciones SQL
    $stmt = $conexion->prepare("INSERT INTO system_help (titulo, estado, fecha_solicitud) VALUES (?, ?, ?)");
    if ($stmt) {
        // Vincular los parámetros
        $stmt->bind_param("sss", $titulo, $estado, $fecha);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Redirigir al usuario si la consulta fue exitosa
            header("Location: felicidades_help.php");
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
}
?>