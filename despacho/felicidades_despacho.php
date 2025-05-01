<?php
require_once("../control_general/sesionOut.php");
// En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
require_once("control/validar_rol.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subido exitosamente</title>
</head>
<body>
    <a href="help_despacho_list.php">Volver</a>
    <h1>Tu documento se ha subido con éxito</h1>
</body>
</html>