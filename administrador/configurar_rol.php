<?php 
include("../control general/conexion.php");
include("../control general/sesionOut.php");
// En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
include("control/validar_rol.php");
$id = $_GET['id'];
$consulta = $conexion->query("SELECT * FROM usuarios WHERE ci = $id");
$mostrar = mysqli_fetch_array($consulta);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/styleindex.css">
    <title>Configurar Rol</title>
</head>
<body class="container-body">
    <header class="header-main">
        <div class="header-systemhelp">
        <p class="titulo-systemhelp">Configurar Rol</p>
        <nav class="menu-systemhelp">
            <ul>
                <li><a href="">Usuario</a>
                <ul>
                    <li><a href=".././control general/logout.php">Cerrar Sesión</a></li>
                </ul>
                </li>
                <li><a href="list_users.php">Volver atrás</a></li>
            </ul>
        </nav>
        </div>
    </header>
    <form method="POST" class="formulario-configuracionuser">
        <label for="ci" class="label-configuracionuser">Cédula</label>
        <input type="text" name="id" value="<?php echo $mostrar['ci']?>" class="input-configuracionuser" readonly>
        <label for="contraseña" class="label-configuracionuser">Contraseña</label>
        <input type="text" name="contraseña" value="<?php echo $mostrar['contraseña']?>" class="input-configuracionuser" readonly>
        <label for="rango" class="label-configuracionuser">Rango</label>
        <select name="rango" class="input-configuracionuser">
                <option value="0" <?= $mostrar['rango'] == 0 ? 'selected' : '' ?>>Secretaria de oficina</option>
                <option value="1" <?= $mostrar['rango'] == 1 ? 'selected' : '' ?>>Despacho</option>
                <option value="2" <?= $mostrar['rango'] == 2 ? 'selected' : '' ?>>Administrador Secundario</option>
                <option value="3" <?= $mostrar['rango'] == 3 ? 'selected' : '' ?>>Administrador</option>
        </select>
        <button type="submit" value="Cambiar" name="btn" class="button-configuracionuser">Cambiar</button>
        <?php 
        include("./control/configurar_rol().php");
        ?>
    </form>
</body>
<script src="../js/verificar_sesiones.js"></script>
</html>