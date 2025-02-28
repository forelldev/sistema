<?php
include("../control general/conexion.php"); 
include(".././control general/session_validar.php");
$consulta = $conexion->query("SELECT * FROM system_help");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proceso de solicitud de ayudas</title>
</head>
<body>
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