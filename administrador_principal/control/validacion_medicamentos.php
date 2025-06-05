<?php
require_once("../control_general/conexion.php");
date_default_timezone_set('America/Caracas');
// Obtener los IDs de tipo_ayuda con 'Medicamentos'
$consulta2 = $conexion->query("SELECT id_doc FROM system_help WHERE categoria = 'Medicamentos'");
$ids = [];

while ($fila = $consulta2->fetch_assoc()) {
    $ids[] = $fila['id_doc'];
}
$consulta_help = null;
// Validar si hay IDs antes de hacer la segunda consulta2
if (!empty($ids)) {
    // Convertir IDs en una lista separada por comas para la consulta2 SQL
    $ids_str = implode(",", $ids);

    // Consultar la tabla system_help
    $consulta_help = $conexion->query("
        SELECT id_doc, fecha_solicitud, estado 
        FROM system_help 
        WHERE id_doc IN ($ids_str)
    ");

    $hoy = new DateTime();
    

}

?>