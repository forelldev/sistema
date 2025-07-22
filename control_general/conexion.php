<?php
try {
    $conexion = new mysqli("localhost", "root", "", "sistema_antiguo");

    if ($conexion->connect_error) {
        throw new Exception("No se pudo establecer conexión con la base de datos: " . $conexion->connect_error);
    }
    // No mostrar mensaje si la conexión es exitosa
} catch (Exception $e) {
    echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
}
?>