<?php include("./control general/session_iniciada.php")?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="ci">
        <input type="password" name="contraseña">
        <input type="submit" name="btn">
        <?php include("./control general/login.php"); ?>
    </form>
</body>
</html>