<?php 
include(".././control general/conexion.php");
include(".././control general/session_validar.php");
$consulta = $conexion->query("SELECT * FROM usuarios");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
</head>
<body>
    <table>
        <tr>
            <th>CI</th>
            <th>Rango</th>
            <th>Contraseña</th>
        </tr>
        <?php while($mostrar = mysqli_fetch_array($consulta)){ ?>
        <tr>
            <td><?php echo $mostrar['ci']?></td>
            <td><?php include("./control/rangos_nombres.php");?></td>
            <td><?php echo $mostrar['contraseña']?></td>
            <td><a href="configurar_rol.php?id=<?php echo $mostrar['ci']?>">Cambiar Rol</a></td>
        </tr>
        <?php } ?>
    </table>
    <a href="main.php">Volver</a>
</body>
</html>