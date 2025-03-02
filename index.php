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
    <?php include("./control general/login.php"); ?>
    <form method="POST" class="formulario-index">
        <input type="text" name="ci" class="input-index" placeholder="Cédula">
        <input type="password" name="contraseña" class="input-index" placeholder="Contraseña">
        <button type="submit" name="btn" class="formulario-btn-index">Iniciar Sesión</button>
        
    </form>
    <p class="iniciarsesion-label">
        ¿No tienes cuenta?<span class="iniciarsesion-link"> Registrate</span>
      </p>
      
</div>
</body>
</html>