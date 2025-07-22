<?php
require_once("../../control_general/conexion.php");
require '../../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json');
ini_set('display_errors', 0); // Evita que errores se impriman como HTML

if (!$conexion) {
    echo json_encode(['success' => false, 'message' => 'Error de conexión']);
    exit;
}

$sql = "
    SELECT id_doc, DATE(fecha_solicitud) AS fecha_solicitud, estado, descripcion, 
           DATEDIFF(CURDATE(), DATE(fecha_solicitud)) AS dias_transcurridos
    FROM system_help
    WHERE DATEDIFF(CURDATE(), DATE(fecha_solicitud)) >= 5
      AND estado IN (
          'En espera del documento físico para ser procesado 0/3',
          'En Proceso 1/3',
          'En Proceso 2/3'
      )
      AND categoria = 'Medicamentos'
      AND correo_enviado = 0;
";

$consulta_help = $conexion->query($sql);
if (!$consulta_help) {
    echo json_encode(['success' => false, 'message' => 'Error en la consulta: ' . $conexion->error]);
    exit;
}

$resultados = [];
$mensaje = "Solicitud Caducada, Información:\n\n";

while ($fila = $consulta_help->fetch_assoc()) {
    $conexion->query("UPDATE system_help SET correo_enviado = 1 WHERE id_doc = {$fila['id_doc']}");
    $resultados[] = [
        'id_doc' => $fila['id_doc'],
        'descripcion' => $fila['descripcion']
    ];
    $mensaje .= "ID: {$fila['id_doc']}\n";
    $mensaje .= "Fecha: {$fila['fecha_solicitud']}\n";
    $mensaje .= "Estado: {$fila['estado']}\n";
    $mensaje .= "Descripción: {$fila['descripcion']}\n";
    $mensaje .= "Días transcurridos: {$fila['dias_transcurridos']}\n";
    $mensaje .= "Envie un correo si quiere renovar\n";
}

$response = [
    'success' => true,
    'message' => '',
    'data' => $resultados
];

if (count($resultados) > 0) {
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'pruebacorreitos23@gmail.com';
        $mail->Password   = 'ihre eyid dwcq nqtn';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('pruebacorreitos23@gmail.com', 'Sistema de Ayuda');
        $mail->addAddress('forell.music@gmail.com', 'Destinatario');

        $mail->isHTML(false);
        $mail->Subject = 'Solicitud Caducada ¿Desea Renovarla?';
        $mail->Body    = $mensaje;

        $mail->send();
        $response['message'] = 'Correo enviado con éxito';
    } catch (Exception $e) {
        $response['message'] = 'Error al enviar el correo: ' . $mail->ErrorInfo;
    }
} else {
    $response['message'] = 'No hay solicitudes pendientes';
}

echo json_encode($response, JSON_PRETTY_PRINT);
