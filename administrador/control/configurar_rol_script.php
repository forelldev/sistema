<?php 
require_once(".././control_general/conexion.php");

if (isset($_POST['btn'])) {
    // Validar y sanitizar el ID
    $id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
    if (empty($id)) {
        die("ID inválido.");
    }

    // Validar y sanitizar el rango
    $rango = filter_var($_POST['rango'], FILTER_VALIDATE_INT);
    if ($rango === false) {
        die("Rango inválido.");
    }

    // Preparar la consulta para evitar inyecciones SQL
    $stmt = $conexion->prepare("UPDATE user SET rango = ?, sesion = 'False' WHERE ci = ?");
    if ($stmt) {
        // Vincular los parámetros
        $stmt->bind_param("is", $rango, $id);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Redirigir al usuario si la consulta fue exitosa
            header("Location: list_users.php");
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