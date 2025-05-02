<?php require_once("control_general/session_iniciada.php")?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/styleindex.css?v=<?php echo time();?>">
    <title>Login</title>
</head>
<body class="container-body">
    
<div class="formulario-container-index">
    <p class="titulo-index">Bienvenido</p>
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start(); // Iniciar la sesión si no está ya iniciada
    }
    if (isset($_SESSION['error'])) {
            echo "<p class='mensaje-index'>".$_SESSION['error'] ."</p>";
            unset($_SESSION['error']); // Eliminar el mensaje de error después de mostrarlo
        }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once("./control_general/login.php");
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
        <input type="text" name="ci" class="input-index invalid" placeholder="Cédula" required>
        <input type="password" name="contraseña" class="input-index invalid" placeholder="Contraseña" required>
        <button type="submit" name="btn" class="formulario-btn-index">Iniciar Sesión</button>
    </form>
</div>
<footer class="footer">
    <div class="footer-content">
        <p>Desarrollado por: <a href="https://github.com/forelldev/sistema" target="_blank">Carlos Soteldo, David Felipe, Jesús Flores, Luis Lucena, Stefanni Legon</a></p>
    </div>
</footer>
</body>
</html>