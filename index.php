<?php require_once("control_general/session_iniciada.php")?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="font/css/all.css?v=<?php echo time();?>">
    <title>Login</title>
</head>
<body class="login-body">
    
<div class="login-container">
    <img src="assets/body.png" alt="Logo">
    <h1>Bienvenido</h1>
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
        <div class="input-group">
            <i class="fa fa-id-card"></i>
            <input type="text" name="ci" class="input-index invalid" placeholder="Cédula" required>
        </div>
        <div class="input-group">
            <i class="fa fa-lock"></i>
            <input type="password" name="contraseña" class="invalid" id="password" placeholder="Contraseña" required>
           <button class="password-toggle" id="toggle-Password" type="button">
          <i class="fa fa-eye"></i>
        </button>
        </div>
        <button type="submit" name="btn" class="login-btn">Iniciar Sesión</button>
    </form>
    </div>
    <footer class="footer">
     Desarrollado por: Carlos Soteldo, David Felipe, Luis Lucena, Stefanni Legon, Manuel Rosales
    </footer>
</body>
<script src="js/script.js"></script>
</html>