<?php 
require_once("../control_general/conexion.php");
if(isset($_POST['btn'])){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $ci = $_POST['ci'];
    $telefono = $_POST['telefono'];
    $asunto = $_POST['asunto'];
    $estado = "En Espera...";
    $direccion = $_POST['direccion'];
    // Insertar datos en la base de datos
    $consulta = $conexion->query("INSERT INTO system_despacho (nombre, apellido, ci, telefono, asunto, estado,direccion) VALUES ('$nombre', '$apellido', '$ci', '$telefono', '$asunto', '$estado','$direccion')");
    // Cerrar la conexión
    header("Location: felicidades_despacho.php");
}
?>