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
    <title>Principal</title>
</head>
<body>
    <a href="system_help.php">Sistema de solicitud de ayudas</a>
    <a href="registro.php">Registrar nueva persona</a>
    <a href="list_users.php">Lista de usuarios</a>
    <a href="reportes.php">Reportes</a>
    <a href="configuracion_user.php">Configuración de usuario</a>
    <a href=".././control general/logout.php">Cerrar Sesión</a>
</body>
</html>