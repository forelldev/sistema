<?php
include "control/parametros.php";
function permisos() {  
  if (isset($_SERVER['HTTP_ORIGIN'])){
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
      header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
      header('Access-Control-Allow-Credentials: true');      
  }  
  if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))          
        header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
    exit(0);
  }
}
permisos();
$conexion =  Conectar($db);
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header("Content-Type: application/json"); // Configurar respuesta como JSON

    try {
        // Inicializar las variables de conteo
        $secretaria = 0;
        $despacho = 0;
        $administrador_secundario = 0;
        $administrador = 0;

        // Mapeo de rango numérico a texto
        $rangoMap = [
            0 => 'secretaria',
            1 => 'despacho',
            2 => 'administrador_secundario',
            3 => 'administrador'
        ];

        // Consulta SQL para calcular conteos
        $sql = "
            SELECT u.rango, COUNT(r.CI) as total
            FROM reportes_entradas r
            JOIN usuarios u ON r.CI = u.CI
            GROUP BY u.rango;
        ";

        $stmt = $conexion->query($sql);

        // Procesar los resultados
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $rango = $row['rango']; // Obtener rango numérico
            $total = $row['total'];

            // Convertir rango numérico a texto
            $rangoTexto = $rangoMap[$rango] ?? null;

            if ($rangoTexto) {
                switch ($rangoTexto) {
                    case 'secretaria':
                        $secretaria += $total;
                        break;
                    case 'despacho':
                        $despacho += $total;
                        break;
                    case 'administrador_secundario':
                        $administrador_secundario += $total;
                        break;
                    case 'administrador':
                        $administrador += $total;
                        break;
                }
            }
        }

        // Formar la respuesta JSON
        $response = [
            "secretaria" => $secretaria,
            "despacho" => $despacho,
            "administrador_secundario" => $administrador_secundario,
            "administrador" => $administrador
        ];

        // Enviar la respuesta JSON
        http_response_code(200); // Código HTTP OK
        echo json_encode($response);
        exit();

    } catch (PDOException $e) {
        // Manejo de errores
        http_response_code(500); // Código HTTP de error interno del servidor
        echo json_encode(["error" => $e->getMessage()]);
        exit();
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header("Content-Type: application/json"); // Configurar respuesta como JSON

    try {
        // Inicializar las variables de conteo
        $secretaria = 0;
        $despacho = 0;
        $administrador_secundario = 0;
        $administrador = 0;

        // Mapeo de rango numérico a texto
        $rangoMap = [
            0 => 'secretaria',
            1 => 'despacho',
            2 => 'administrador_secundario',
            3 => 'administrador'
        ];

        // Consulta SQL para calcular conteos
        $sql = "
            SELECT u.rango, COUNT(r.CI) as total
            FROM reportes_entradas r
            JOIN usuarios u ON r.CI = u.CI
            GROUP BY u.rango;
        ";

        $stmt = $conexion->query($sql);

        // Procesar los resultados
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $rango = $row['rango']; // Obtener rango numérico
            $total = $row['total'];

            // Convertir rango numérico a texto
            $rangoTexto = $rangoMap[$rango] ?? null;

            if ($rangoTexto) {
                switch ($rangoTexto) {
                    case 'secretaria':
                        $secretaria += $total;
                        break;
                    case 'despacho':
                        $despacho += $total;
                        break;
                    case 'administrador_secundario':
                        $administrador_secundario += $total;
                        break;
                    case 'administrador':
                        $administrador += $total;
                        break;
                }
            }
        }

        // Formar la respuesta JSON
        $response = [
            "secretaria" => $secretaria,
            "despacho" => $despacho,
            "administrador_secundario" => $administrador_secundario,
            "administrador" => $administrador
        ];

        // Enviar la respuesta JSON
        http_response_code(200); // Código HTTP OK
        echo json_encode($response);
        exit();

    } catch (PDOException $e) {
        // Manejo de errores
        http_response_code(500); // Código HTTP de error interno del servidor
        echo json_encode(["error" => $e->getMessage()]);
        exit();
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'PUT'){
    $input = $_GET;	
    $id = $input['id'];
    $campos = getParams($input);
    $sql = "UPDATE system_help SET $campos WHERE id='$id'";
    $resultado = $conexion->prepare($sql);
    bindAllValues($resultado, $input);
    $resultado->execute();
    header("HTTP/1.1 200 OK");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'DELETE'){
  $id = $_GET['id'];
  $resultado = $conexion->prepare("DELETE FROM system_help where id=:id");
  $resultado->bindValue(':id', $id);
  $resultado->execute();
  header("HTTP/1.1 200 OK");
  exit();
}
header("HTTP/1.1 400 Peticion HTTP inexistente");
?>