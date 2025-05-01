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
    <link rel="stylesheet" href="../estilos/styleindex.css">
    <title>Su ayuda está siendo procesada...</title>
</head>
<body class="container-body">
    <header class="header-main">
    <p class="titulo-systemhelp">Formulario de la solicitud de ayudas</p>
    
    </header>
    <section class="section-felicidadeshelp">
    <p>Se ha guardado su documento, estamos en espera del documento físico...</p>
    <a href="system_help.php">Volver a ver estados</a>
    </section>
</body>
<script src="../js/verificar_sesiones.js"></script>
</html>