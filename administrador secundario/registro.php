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
    <title>Registro</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="ci" placeholder="Cedula">
        <input type="password" name="contraseña" placeholder="Contraseña">
        <select name="rango">
            <option value="2">Administrador</option>
            <option value="1">Administrador Secundario</option>
            <option value="0">Secretaria de oficina</option>
        </select>
        <input type="submit" name="btn">
        <?php include("./control/register.php");?>
    </form>

</body>
</html>