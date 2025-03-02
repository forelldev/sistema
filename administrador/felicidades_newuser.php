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
    <title>Felicidades nuevo usuario!</title>
</head>
<body>
    <h1>Felicidades!</h1>
    <a href="main.php">Volver a principal</a>
</body>
</html>