<?php 
include("../.././control general/conexion.php"); 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $estado = "En espera del documento físico para ser procesado 0/3";
    $descripcion = "";

    // Preparar la consulta para evitar inyecciones SQL
    $stmt = $conexion->prepare("UPDATE system_help SET estado = ?, descripcion = ? WHERE id = ?");
    if ($stmt) {
        // Vincular los parámetros
        $stmt->bind_param("ssi", $estado, $descripcion, $id);

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