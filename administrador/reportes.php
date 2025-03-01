<?php 
include(".././control general/conexion.php");
include(".././control general/session_validar.php");
// Verificar si hay filtros aplicados
$fecha_inicio = isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : '';
$fecha_final = isset($_POST['fecha_final']) ? $_POST['fecha_final'] : '';
$estado = isset($_POST['estado']) ? $_POST['estado'] : '';
// Ajustar la fecha final para incluir todo el día
if ($fecha_final) {
    $fecha_final = date('Y-m-d', strtotime($fecha_final));
}
// Construir la consulta SQL
$sql = "SELECT * FROM reportes_entradas WHERE 1=1";
if ($fecha_inicio && $fecha_final) {
    $sql .= " AND fecha BETWEEN '$fecha_inicio' AND '$fecha_final'";
}
if ($estado) {
    $sql .= " AND estado = '$estado'";
}
$sql .= " ORDER BY id DESC";
$consulta = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes de entrada y salida</title>
</head>
<body>
<form action="reportes.php" method="POST" class="form-desac">
            <div class="cont-reporte">
                <div class="container-fechainicioyfinal">
                   <label for="fecha_inicio">Fecha inicio:</label>
                   <input type="date" name="fecha_inicio" id="fecha_inicio" class="input-fechainicioyfinal" required>
                </div>
            <p>Hasta: </p>
                <div class="container-fechainicioyfinal">
                    <label for="fecha_final">Fecha final:</label>
                    <input type="date" name="fecha_final" id="fecha_final" class="input-fechainicioyfinal" required>
                </div>
                <input type="submit" name="btn" value="Buscar">
            </div>
</form>
    
    <table>
        <tr>
            <th>Número</th>
            <th>CI</th>
            <th>Fecha</th>
            <th>Hora Entrada</th>
            <th>Hora Salida</th>
        </tr>
        <?php 
            while($mostrar = mysqli_fetch_array($consulta)){
        ?>
        <tr>
            <td><?php echo $mostrar['id']?></td>
            <td><?php echo $mostrar['ci']?></td>
            <td><?php echo $mostrar['fecha']?></td>
            <td><?php echo $mostrar['hora_entrada']?></td>
            <td><?php if ($mostrar['hora_salida'] == ''){echo "En línea";} else{echo $mostrar['hora_salida'];}?></td>
        </tr>
        <?php 
            }
        ?>
    </table>
    <a href="main.php">Volver atrás</a>
</body>
</html>