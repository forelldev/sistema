<?php 
require_once("../control_general/sesionOut.php");
require_once("control/validar_rol.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Actividades</title>
    <link rel="stylesheet" href="../estilos/styleindex.css?v=<?php echo time();?>">
</head>
<body>
    <h1>Registro de Actividades</h1>
    <p>En esta sección se registran las actividades realizadas por los administradores.</p>
    <table class="table-systemhelp">
            <tr>
                <th>ID</th>
                <th>Rol</th>
                <th>Nombre</th>
                <th>Acción</th>
                <th>Fecha</th>
                <th>ID del documento</th>
                <th>CI del solicitante</th>
                <th>Descripción del documento</th>
            </tr>
            <?php
            require_once("../control_general/conexion.php");
            $consulta = $conexion->query("SELECT * FROM reportes_solicitudes ORDER BY fecha DESC");
            while ($fila = $consulta->fetch_assoc()) {
                $id = $fila['id_doc'];
                $consulta2 =  $conexion->query("SELECT * FROM system_help WHERE id_doc = '$id'");
                $consulta3 =  $conexion->query("SELECT * FROM datos_import WHERE id_doc = '$id'");
                $desc = ($consulta2 && $consulta2->num_rows > 0) ? $consulta2->fetch_assoc() : null;
                $descripcion = $desc ? $desc['descripcion'] : "Sin descripción";
                if ($consulta3 && $consulta3->num_rows > 0) {
                    $datos_import = $consulta3->fetch_assoc();
                    $ci = $datos_import['ci_perso'];
                }
                echo "<tr>";
                echo "<td>" . $fila['id'] . "</td>";
                echo "<td>" . $fila['rol'] . "</td>";
                echo "<td>" . $fila['nombre'] . "</td>";
                echo "<td>" . $fila['accion'] . "</td>";
                echo "<td>" . $fila['fecha'] . "</td>";
                echo "<td>" . $fila['id_doc'] . "</td>";
                echo "<td>" . $ci . "</td>";
                echo "<td>" . $descripcion . "</td>";
                echo "</tr>";
            }
            ?>
    </table>
    <a href="main.php">Volver</a>
</body>
</html>