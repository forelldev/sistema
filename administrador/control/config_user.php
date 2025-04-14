<?php 
include("../control general/conexion.php");
if (isset($_POST['btn'])) {
    // Validar y sanitizar el CI
    $ci = filter_var($_POST['ci'], FILTER_SANITIZE_STRING);
    if (empty($ci)) {
        die("El campo CI no puede estar vacío.");
    }

    // Validar y sanitizar la contraseña
    $contraseña = trim($_POST['contraseña']);
    if (empty($contraseña)) {
        die("La contraseña no puede estar vacía.");
    }

    // Obtener el ID de la sesión
    $id = $_SESSION['id'];

    // Preparar la consulta para evitar inyecciones SQL
    $stmt = $conexion->prepare("UPDATE usuarios SET ci = ?, contraseña = ? WHERE ci = ?");
    if ($stmt) {
        // Vincular los parámetros
        $stmt->bind_param("sss", $ci, $contraseña, $id);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Actualizar la sesión con el nuevo CI
            $_SESSION['id'] = $ci;

            // Redirigir al usuario
            header("Location: main.php");
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