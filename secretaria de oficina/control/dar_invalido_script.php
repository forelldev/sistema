<?php
include(".././control general/conexion.php");

if (isset($_POST['btn'])) {
    // Validar que el ID sea un número entero
    $id_doc = filter_var($_POST['id_doc'], FILTER_VALIDATE_INT);
    if ($id_doc === false) {
        die("ID inválido.");
    }

    // Validar y sanitizar la descripción
    $descripcion = trim($_POST['descripcion']);
    if (empty($descripcion)) {
        die("La descripción no puede estar vacía.");
    }

    // Preparar la consulta para evitar inyecciones SQL
    $stmt = $conexion->prepare("UPDATE system_help SET estado = ?, descripcion = ? WHERE id_doc = ?");
    if ($stmt) {
        $estado = "Documento inválido";

        // Vincular los parámetros
        $stmt->bind_param("ssi", $estado, $descripcion, $id_doc);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Redirigir al usuario si la consulta fue exitosa
            header("Location: system_help.php");
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