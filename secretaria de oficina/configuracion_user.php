<?php 
    include("../control general/conexion.php");
    include(".././control general/session_validar.php");
    $id = $_SESSION['id'];
    $consulta = $conexion->query("SELECT * FROM usuarios WHERE ci = $id");
    $mostrar = mysqli_fetch_array($consulta);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración de usuario</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="ci" value="<?php echo $mostrar['ci'] ?>" required>
        <input type="text" name="contraseña" value="<?php echo $mostrar['contraseña'] ?>" required>
        <input type="submit" name="btn">
        <?php include("control/config_user.php"); ?>
    </form>
    <a href="main.php">Volver atrás</a>
</body>
</html>