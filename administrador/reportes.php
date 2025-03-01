<?php 
include(".././control general/conexion.php");
include(".././control general/session_validar.php");
$consulta = $conexion->query("SELECT * FROM reportes_entradas ORDER BY id desc");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes de entrada y salida</title>
</head>
<body>
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