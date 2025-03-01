<?php 
include("../control general/conexion.php");
include(".././control general/session_validar.php");
$id = $_GET['id'];
$consulta = $conexion->query("SELECT * FROM usuarios WHERE ci = $id");
$mostrar = mysqli_fetch_array($consulta);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurar Rol</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="id" value="<?php echo $mostrar['ci']?>" readonly>
        <input type="text" name="contraseña" value="<?php echo $mostrar['contraseña']?>" readonly>
        <select name="rango">
                <option value="0" <?= $mostrar['rango'] == 0 ? 'selected' : '' ?>>Secretaria de oficina</option>
                <option value="1" <?= $mostrar['rango'] == 1 ? 'selected' : '' ?>>Administrador Secundario</option>
                <option value="2" <?= $mostrar['rango'] == 2 ? 'selected' : '' ?>>Administrador</option>
        </select>
        <input type="submit" value="Cambiar" name="btn">
        <?php 
        include("./control/configurar_rol().php");
        ?>
    </form>
    <a href="list_users.php">Volver</a>
</body>
</html>