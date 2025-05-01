<?php
require_once("../control_general/sesionOut.php");
// En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
require_once("control/validar_rol.php");
require_once("control/invalid_filter.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No aprobados</title>
</head>
<body>
    <a href="new_help_despacho.php">Rellenar Formulario</a>
    <a href="help_despacho_list.php">Ver documentos aprobados</a>
    <a href="main.php"></a>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>CI</th>
            <th>Telefono</th>
            <th>Dirección</th>
            <th>Asunto</th>
            <th>Razón por la cual está invalidado</th>
        </tr>
        <?php 
        while($mostrar = mysqli_fetch_array($consulta)){
            $id = $mostrar['id'];
        ?>
        <tr>
            <td><?php echo $mostrar['nombre']; ?></td>
            <td><?php echo $mostrar['apellido']; ?></td>
            <td><?php echo $mostrar['ci']; ?></td>
            <td><?php echo $mostrar['telefono']; ?></td>
            <td><?php echo $mostrar['direccion']; ?></td>
            <td><?php echo $mostrar['asunto']; ?></td>
            <td><?php echo $mostrar['razon']; ?></td>
            <td><a href="control/despacho_aprob.php?num=2&id=<?php echo $id ?>">Recuperar</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>