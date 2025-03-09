<?php 
include(".././control general/session_validar.php");
// En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
include("control/validar_rol.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de ayuda</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="titulo">
        <input type="submit" name="btn">
        <?php include("./control/new_help().php");?>
    </form>
</body>
<a href="system_help.php">Volver atrás</a>
</html>