<?php 
require_once("../control_general/conexion.php");
if (isset($_POST['btn'])) {
    $ci = $_POST['ci'];
    $consulta = $conexion->query("SELECT * FROM datos_import WHERE ci_perso = '$ci'");
    if ($consulta && $consulta->num_rows > 0) {
        // Redirigir si hay al menos una fila
        $fila = $consulta->fetch_assoc();
        $id_doc = $fila['id_doc'];
        // Redirigir con el ID como parámetro (opcional)
        header("Location: new_help.php?id_doc=" . urlencode($id_doc));
        exit;
    }
    else{
        header("Location: new_help.php");
    }
}
?>