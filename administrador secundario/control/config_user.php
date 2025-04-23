<?php 
require_once("../control_general/conexion.php");
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
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];

    // Obtener el ID de la sesión
    $id = $_SESSION['id'];

    // Preparar la consulta para evitar inyecciones SQL
    $stmt = $conexion->prepare("UPDATE user INNER JOIN user_info ON user.ci = user_info.ci SET user.ci = ?, user.contraseña = ?, user_info.nombre = ?, user_info.apellido = ? WHERE user.ci = ?");
    if ($stmt) {
        // Vincular los parámetros
        $stmt->bind_param("isssi", $ci, $contraseña,$nombre,$apellido, $id);

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