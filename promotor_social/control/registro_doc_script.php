<?php 
require_once '../control_general/conexion.php';
if(isset($_POST['btn'])){
    $tipo_doc = $_POST['tipo_doc'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $ci = $_POST['ci'];
    $asunto = $_POST['asunto'];
    // Insertar datos en la base de datos
    $consulta = $conexion->query("INSERT INTO registro_docs (tipo_doc, nombre, apellido, ci, asunto) VALUES ('$tipo_doc', '$nombre', '$apellido', '$ci', '$asunto')");
    // Cerrar la conexión
    header("Location: felicidades_doc.php");
}
?>