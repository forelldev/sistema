<?php
require_once("../../control general/conexion.php");

if (isset($_GET['id'])) {
    // Validar que el ID sea un número entero
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    if ($id === false) {
        die("ID inválido.");
    }

    // Preparar la consulta para evitar inyecciones SQL
    $stmt = $conexion->prepare("UPDATE system_help SET estado = ? WHERE id = ?");
    if ($stmt) {
        $estado = "En espera del documento físico para ser procesado 0/3";

        // Vincular los parámetros
        $stmt->bind_param("si", $estado, $id);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Redirigir al usuario si la consulta fue exitosa
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
} else {
    echo "ID no proporcionado.";
}
?>