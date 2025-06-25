<?php
require_once("../control_general/conexion.php"); 
require_once("../control_general/sesionOut.php");
require_once("control/validar_rol.php");
if(isset($_GET['id_doc'])){
    $id_doc = $_GET['id_doc'];
    $cons = $conexion->query("SELECT * FROM system_help WHERE id_doc = '$id_doc'");
}
else{
    $cons = $conexion->query("SELECT * FROM system_help");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicamentos</title>
    <link rel="stylesheet" href="../estilos/styleindex.css">
</head>
<body>
    <h1>Han pasado más de 5 días</h1>
    <table>
        <tr>
            <th>Descripción</th>
            <th>Acción</th>
        </tr>
            <?php
                while($mostrar = mysqli_fetch_array($cons)){
            ?>
        <tr>
            <td><?php echo $mostrar['descripcion'] ?></td>
            <td><a href="medicamentos_renovar.php?id_doc=<?php echo $mostrar['id_doc'] ?>">Renovar</a></td>
        </tr>
        <?php } ?>
    </table>

    <a href="system_help.php">Volver</a>
</body>
</html>