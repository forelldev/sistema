<?php 
require_once("../control_general/sesionOut.php");
// En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
require_once("control/validar_rol.php");
require_once("control/help_despacho_list_script.php");
require_once("control/despacho_filter.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de solicitudes creadas en despacho</title>
</head>
<body>
    <a href="new_help_despacho.php">Rellenar Formulario</a>
    <a href="despacho_noaprobados_list.php">Ver documentos no aprobados</a>
    <a href="main.php">Volver a principal</a>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>CI</th>
            <th>Telefono</th>
            <th>Dirección</th>
            <th>Estado</th>
            <th>Asunto</th>
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
            <td><?php echo $mostrar['estado']; ?></td>
            <td><?php echo $mostrar['asunto']; ?></td>
            <?php if($mostrar['estado'] == 'En Espera...'){?>
            <td><a href="control/despacho_aprob.php?num=0&id=<?php echo $id ?>">Aprobar</a></td>
            <td><a href="control/despacho_aprob.php?num=1&id=<?php echo $id ?>">No Aprobar</a></td>
            <?php } ?>
        </tr>
        <?php } ?>
    </table>
</body>
</html>