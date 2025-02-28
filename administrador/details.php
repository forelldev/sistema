<?php 
include(".././control general/conexion.php"); 
include(".././control general/session_validar.php");
$id = $_GET['id'];
$consulta = $conexion->query("SELECT * FROM system_help WHERE id = '$id'");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver detalles</title>
</head>
<body>
    <table>
        <tr>
            <th>Título</th>
            <th>Estado</th>
            <th>Descripción</th>
        </tr>
        <?php while($mostrar = mysqli_fetch_array($consulta)){ ?>
        <tr>
            <td><?php echo $mostrar['titulo'] ?></td>
            <td><?php echo $mostrar['estado'] ?></td>
            <td><?php echo $mostrar['descripcion'] ?></td>
        </tr>
        <?php } ?>
    </table>
    <a href="system_help.php">Volver atrás</a>
</body>
</html>