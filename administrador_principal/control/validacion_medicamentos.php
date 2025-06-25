<?php
require_once("../../control_general/conexion.php");
header('Content-Type: application/json'); // Solo JSON, sin HTML

// Verificar conexión
if (!$conexion) {
    echo json_encode(['success' => false, 'message' => 'Error de conexión']);
    exit;
}

$sql = "
    SELECT id_doc, DATE(fecha_solicitud) AS fecha_solicitud, estado, descripcion, 
           DATEDIFF(CURDATE(), DATE(fecha_solicitud)) AS dias_transcurridos
    FROM system_help
    WHERE DATEDIFF(CURDATE(), DATE(fecha_solicitud)) >= 5
      AND estado IN ('En espera del documento físico para ser procesado 0/3', 'En Proceso 1/3', 'En Proceso 2/3')
      AND categoria = 'Medicamentos';
";

$consulta_help = $conexion->query($sql);
if (!$consulta_help) {
    echo json_encode(['success' => false, 'message' => 'Error en la consulta: ' . $conexion->error]);
    exit;
}

$resultados = [];
while ($fila = $consulta_help->fetch_assoc()) {
    $resultados[] = $fila;
}

echo json_encode(['success' => true, 'data' => $resultados], JSON_PRETTY_PRINT);
?>
