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
    SELECT 
        sh.*, 
        dp.*,
        dm.*,
        da.*,
        di.*,
        de.*,
        t.*,
        ta.*
    FROM system_help sh
    INNER JOIN datos_personales dp ON sh.id_doc = dp.id_doc
    INNER JOIN datos_medicos dm ON sh.id_doc = dm.id_doc
    INNER JOIN datos_ambiental da ON sh.id_doc = da.id_doc
    INNER JOIN datos_import di ON sh.id_doc = di.id_doc
    INNER JOIN datos_extra de ON sh.id_doc = de.id_doc
    INNER JOIN trabajo t ON sh.id_doc = t.id_doc
    INNER JOIN tipo_ayuda ta ON sh.id_doc = ta.id_doc
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
$sql .= " AND estado = 'En espera del documento físico para ser procesado 0/3'";
$sql .= " ORDER BY sh.id_doc DESC";
$consulta = $conexion->query($sql);
?>