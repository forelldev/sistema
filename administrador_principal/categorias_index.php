<?php
require_once("../control_general/conexion.php");
require_once("../control_general/sesionOut.php");
// En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
require_once("control/validar_rol.php");
if(isset($_GET['categoria'])){
    $categoria = $_GET['categoria'];
    $consulta = $conexion->query("SELECT * FROM system_help WHERE categoria = '$categoria'");
}
else{
    $categoria = "No se escogió";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoría: <?php echo $categoria?></title>
</head>
<body>
    <table>
        <tr>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Fecha de creación</th>
        </tr>
        <?php
        while($mostrar = mysqli_fetch_array($consulta)){
        ?>
        <tr>
            <td><?php echo $mostrar['descripcion'] ?></td>
            <td><?php echo $mostrar['estado'] ?></td>
            <td><?php echo $mostrar['fecha_solicitud'] ?></td>
        </tr>
        <?php
        }
         ?>
    </table>
</body>
</html>