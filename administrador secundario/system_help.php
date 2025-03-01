<?php
include("../control general/conexion.php"); 
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
$sql = "SELECT * FROM system_help WHERE 1=1";
if ($fecha_inicio && $fecha_final) {
    $sql .= " AND fecha BETWEEN '$fecha_inicio' AND '$fecha_final'";
}
$estado = "En proceso 2/3";
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
    <title>Proceso de solicitud de ayudas</title>
</head>
<body>
    <form action="system_help.php" method="POST">
        <input type="date" name="fecha_inicio" value="<?php echo $fecha_inicio; ?>">
        <input type="date" name="fecha_final" value="<?php echo $fecha_final; ?>">
        <input type="submit" name="btn" value="Filtrar">
    </form>
    <table>
        <tr>
            <th>Título</th>
            <th>Estado</th>
        </tr>
        <?php while($mostrar = mysqli_fetch_array($consulta)){ ?>
        <tr>
            <td><?php echo $mostrar['titulo'] ?></td>
            <td><?php echo $mostrar['estado'] ?></td>
            <td><a href="<?php include("./control/if2_help.php")?>"><?php include("./control/if_help.php")?></a></td>
            <?php if($mostrar['estado'] !== "Documento inválido"){ ?>
            <td><a href="dar_invalido.php?id=<?php echo $mostrar['id']?>">Dar inválido el documento</a></td>
            <?php }?>
        </tr>
        <?php } ?>
        <br>
        <a href="new_help.php">Formulario para llenar el documento</a>
    </table>
    <a href="main.php">Volver a principal</a>
    <a href=".././control general/logout.php">Cerrar Sesión</a>
</body>
</html>