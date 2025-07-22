<?php 
require_once("../control_general/conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nueva Solicitud Consulta</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="ci" placeholder="Cédula del Solicitante">
        <button type="submit" name="btn">Continuar</button>
        <?php require_once("control/busqueda_script.php"); ?>
    </form>
</body>
</html>