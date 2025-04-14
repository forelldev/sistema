<?php
include(".././control general/conexion.php");

if (isset($_POST['btn'])) {
    $ci = $_POST['ci'];
    $contraseña = $_POST['contraseña'];
    $rango = $_POST['rango'];
    $sesion = 'False';

    // Preparar la consulta para evitar inyecciones SQL
    $stmt = $conexion->prepare("INSERT INTO usuarios (ci, contraseña, rango,sesion) VALUES (?, ?, ?, ?)");
    if ($stmt) {
        // Vincular los parámetros
        $stmt->bind_param("ssss", $ci, $contraseña, $rango,$sesion);

        // Ejecutar la consulta
        $stmt->execute();

        // Cerrar el statement
        $stmt->close();

        // Redirigir al usuario
        header("Location: felicidades_newuser.php");
        exit();
    } else {
        // Manejar errores en la preparación de la consulta
        echo "Error al preparar la consulta: " . $conexion->error;
    }
}
?>