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
    <title>Registro</title>
</head>
<body class="container-body">
    <header class="header-main">
        <div class="header-systemhelp">
        <p class="titulo-systemhelp">Registro de usuario</p>
        <nav class="menu-systemhelp">
            <ul>
                <li><a href="">Usuario</a>
                <ul>
                    <li><a href=".././control general/logout.php">Cerrar Sesión</a></li>
                </ul>
                </li>
                <li><a href="main.php">Volver atrás</a></li>
            </ul>
        </nav>
        </div>
    </header>
    <form method="POST" class="formulario-configuracionuser">
        <p class="titulo-index">Registro de usuario</p>
        <label for="ci" class="label-configuracionuser">Cédula</label>
        <input type="text" name="ci" placeholder="Cedula" class="input-configuracionuser" required>
        <label for="contraseña" class="label-configuracionuser">Contraseña</label>
        <input type="password" name="contraseña" placeholder="Contraseña" class="input-configuracionuser" required>
        <label for="rango" class="label-configuracionuser">Rango</label>
        <select name="rango" class="input-configuracionuser" required>
            <option value="2">Administrador</option>
            <option value="1">Administrador Secundario</option>
            <option value="0">Secretaria de oficina</option>
        </select>
        <button type="submit" name="btn" class="button-configuracionuser">Enviar</button>
        <?php include("./control/register.php");?>
    </form>

</body>
</html>