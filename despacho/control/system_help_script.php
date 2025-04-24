<?php 
// Verificar si hay filtros aplicados
$fecha_inicio = isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : '';
$fecha_final = isset($_POST['fecha_final']) ? $_POST['fecha_final'] : '';
// Intercambiar las fechas si están invertidas
if ($fecha_inicio && $fecha_final && strtotime($fecha_inicio) > strtotime($fecha_final)) {
    $temp = $fecha_inicio;
    $fecha_inicio = $fecha_final;
    $fecha_final = $temp;
}
// Ajustar la fecha final para incluir todo el día si está presente
if ($fecha_final) {
    $fecha_final = date('Y-m-d 23:59:59', strtotime($fecha_final));
    $fecha_fin = date('Y-m-d', strtotime($fecha_final));
}
// Construir la consulta SQL
$sql = "
    SELECT DISTINCT sh.*, dp.*, da.*
    FROM system_help sh
    LEFT JOIN datos_personales dp ON sh.id_doc = dp.id_doc
    LEFT JOIN datos_ambiental da ON sh.id_doc = da.id_doc
    WHERE 1=1
";
// Validaciones de fechas
if ($fecha_inicio && !$fecha_final) {
    // Solo fecha de inicio
    $sql .= " AND fecha_solicitud >= '$fecha_inicio'";
} elseif ($fecha_final && !$fecha_inicio) {
    // Solo fecha final
    $sql .= " AND fecha_solicitud <= '$fecha_final'";
} elseif ($fecha_inicio && $fecha_final) {
    // Ambas fechas están presentes
    $sql .= " AND fecha_solicitud BETWEEN '$fecha_inicio' AND '$fecha_final'";
}
$sql .= " AND estado = 'En Proceso 1/3'";
$sql .= " ORDER BY sh.id_doc DESC";
$consulta = $conexion->query($sql);
?>