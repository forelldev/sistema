<?php 
require_once '../control_general/conexion.php';
date_default_timezone_set('America/Caracas');
if(isset($_POST['btn'])){
    $fecha = date("Y-m-d H:i:s");
    $tipo_doc = $_POST['tipo_doc'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $ci = $_POST['ci'];
    $asunto = $_POST['asunto'];

    // Insertar datos en la base de datos
    $consulta = $conexion->query("INSERT INTO registro_docs (tipo_doc, nombre, apellido, ci, asunto,fecha) VALUES ('$tipo_doc', '$nombre', '$apellido', '$ci', '$asunto','$fecha')");
    // Cerrar la conexión
        $id = $_SESSION['id'];
        date_default_timezone_set('America/Caracas');
        $fecha = date("Y-m-d H:i:s");
        $user_info = $conexion->query("SELECT * FROM user_info WHERE ci = $id");
        $user_rol = $conexion->query("SELECT * FROM user WHERE ci = $id");
        $rol = mysqli_fetch_assoc($user_rol)['rango']; // Directamente el valor sin necesidad de otra variable
        $datos_usuario = $user_info->fetch_assoc();
        $nombre2 = $datos_usuario['nombre'];
        $consulta_reporte = $consulta = $conexion->query("INSERT INTO reportes_solicitudes (rol,nombre,accion,fecha,id_doc) VALUES ('$rol','$nombre2','Registró documento interno Desarrollo Social','$fecha','$id_doc')");
    header("Location: felicidades_doc.php");
}
?>