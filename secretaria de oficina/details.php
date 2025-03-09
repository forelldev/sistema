<?php 
include(".././control general/conexion.php"); 
include(".././control general/session_validar.php");
// En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
include("control/validar_rol.php");
$id = $_GET['id'];
$consulta = $conexion->query("SELECT * FROM system_help WHERE id = '$id'");
$mostrar = mysqli_fetch_array($consulta);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/styleindex.css">
    <title>Ver detalles</title>
</head>
<body class="container-body">
    <table>
        <tr>
            <th>Título</th>
            <th>Estado</th>
            <th>Descripción</th>
        </tr>
        <tr>
            <td><?php echo $mostrar['titulo'] ?></td>
            <td><?php echo $mostrar['estado'] ?></td>
            <td><?php echo $mostrar['descripcion'] ?></td>
            <td><a href="./control/invalid_act.php?id=<?php echo $mostrar['id']?>">Recuperar documento</a></td>
        </tr>
    </table>
    <a href="system_help.php">Volver atrás</a>
</body>
</html>