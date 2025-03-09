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
    <link rel="stylesheet" href="../estilos/styleindex.css">
    <title>Principal</title>
</head>
<body class="container-body">
    <header class="header-main">
        <div class="cajadetexto-main">
    <a href="system_help.php" class="link-main">Sistema de solicitud de ayudas</a>
        </div>
        <div class="cajadetexto-main">
    <a href="configuracion_user.php" class="link-main">Configuración de usuario</a>
        </div>
        <div class="cajadetexto-main">
    <a href=".././control general/logout.php" class="link-main">Cerrar Sesión</a>
        </div>
    </header>
</body>
</html>