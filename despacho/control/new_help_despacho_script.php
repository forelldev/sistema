<?php 
require_once("../control_general/conexion.php");
date_default_timezone_set('America/Caracas');
if(isset($_POST['btn'])){
    $fecha = date("Y-m-d H:i:s");
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $ci = $_POST['ci'];
    $telefono = $_POST['telefono'];
    $asunto = $_POST['asunto'];
    $estado = "En Espera...";
    $direccion = $_POST['direccion'];
    // Insertar datos en la base de datos
    $consulta = $conexion->query("INSERT INTO system_despacho (nombre, apellido, ci, telefono, asunto, estado,direccion,fecha) VALUES ('$nombre', '$apellido', '$ci', '$telefono', '$asunto', '$estado','$direccion','$fecha')");
    // Cerrar la conexión
    header("Location: felicidades_despacho.php");
}
?>