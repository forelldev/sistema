<?php include("control general/session_iniciada.php")?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/styleindex.css">
    <title>Login</title>
</head>
    
    
<body class="container-body">
    
<div class="formulario-container-index">
    <p class="titulo-index">Bienvenido</p>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include("./control general/login.php");
        // Redirigir después de procesar el formulario
        if (!headers_sent()) {
            header("Location: index.php");
        } else {
            echo "<script>window.location.href='index.php';</script>";
        }
        exit();
    }
    ?>
    <form method="POST" class="formulario-index">
        <input type="text" name="ci" class="input-index" placeholder="Cédula">
        <input type="password" name="contraseña" class="input-index" placeholder="Contraseña">
        <button type="submit" name="btn" class="formulario-btn-index">Iniciar Sesión</button>
        
    </form>
    <p class="iniciarsesion-label">
        ¿No tienes cuenta?<span class="iniciarsesion-link"> Registrate</span>
    </p>

</div>

<footer class="footer">
    <div class="footer-content">
        <p>Desarrollado por: <a href="https://github.com/carlosso11/sistema" target="_blank">Carlos Soteldo, David Felipe, Jesús Flores, Luis Lucena, Stefanni Legon</a></p>
    </div>
</footer>
</body>
</html>