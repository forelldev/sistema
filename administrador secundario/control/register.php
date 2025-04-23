<?php
require_once("../../control_general/conexion.php");

// Validar que los datos lleguen correctamente
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $ci = $_POST['ci'];
    $contraseña = $_POST['contraseña'];
    $rango = $_POST['rango'];
    $sesion = 'False';

    // Validar que CI sea numérico
    if (!ctype_digit($ci)) {
        echo "Error: La cédula debe contener solo números.";
        exit();
    }

    $ci = (int)$ci; // Convertir a entero después de validar

    // Iniciar la transacción
    $conexion->begin_transaction();

    try {
        // Insertar datos en la tabla 'user'
        $stmt = $conexion->prepare("INSERT INTO user (ci, contraseña, rango, sesion) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $ci, $contraseña, $rango, $sesion);
        $stmt->execute();
        $stmt->close();

        // Insertar datos en la tabla 'user_info'
        $stmt2 = $conexion->prepare("INSERT INTO user_info (ci, nombre, apellido) VALUES (?, ?, ?)");
        $stmt2->bind_param("iss", $ci, $nombre, $apellido);
        $stmt2->execute();
        $stmt2->close();

        // Confirmar la transacción
        $conexion->commit();
        echo "success";
        exit();
    } catch (Exception $e) {
        $conexion->rollback(); // Revertir los cambios en caso de error
        echo "Error: " . $e->getMessage();
    } finally {
        $conexion->close();
    }
}
?>
