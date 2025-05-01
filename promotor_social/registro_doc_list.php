<?php 
require_once("../control_general/sesionOut.php");
// En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
require_once("control/validar_rol.php");
require_once("control/registro_doc_list_script.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de registro de documentos</title>
    <link rel="stylesheet" href="../estilos/styleindex.css?v=<?php echo time();?>">
</head>
<body>
    <a href="registro_doc.php">Rellenar Formulario</a>
    <a href="main.php">Volver</a>
    <h1>Lista de documentos registrados</h1>
    <table>
        <tr>
            <th>Tipo de Documento</th>
            <th>CI</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Asunto</th>
            <th>Fecha</th>
        </tr>
        <?php while($mostrar = mysqli_fetch_array($consulta)){

         ?>
        <tr>
            <td><?php echo $mostrar['tipo_doc'] ?></td>
            <td><?php echo $mostrar['ci']  ?></td>
            <td><?php echo $mostrar['nombre']  ?></td>
            <td><?php echo $mostrar['apellido']  ?></td>
            <td><?php echo $mostrar['asunto']  ?></td>
            <td><?php echo $mostrar['fecha']; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>