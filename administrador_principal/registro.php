<?php 
require_once("../control_general/sesionOut.php");
require_once("../control_general/conexion.php");
require_once("control/validar_rol.php");
$consulta = $conexion->query("SELECT * FROM rangos ORDER BY rango DESC");
if (!$consulta) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/styleindex.css?v=<?php echo time();?>">
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
                        <li><a href="../control_general/logout.php">Cerrar Sesión</a></li>
                    </ul>
                </li>
                <li><a href="main.php">Volver atrás</a></li>
            </ul>
        </nav>
    </div>
</header>
    <form class="formulario-configuracionuser" id="form" method="POST">
        <p class="titulo-index">Registro de usuario</p>
        <label for="nombre" class="label-configuracionuser">Nombre</label>
        <input type="text" name="nombre" placeholder="Nombre" class="input-configuracionuser" required>
        <label for="apellido" class="label-configuracionuser">Apellido</label>
        <input type="text" name="apellido" placeholder="Apellido" class="input-configuracionuser" required>
        <label for="ci" class="label-configuracionuser">Cédula</label>
        <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" name="ci" placeholder="Cedula" class="input-configuracionuser" required>
        <label for="contraseña" class="label-configuracionuser">Contraseña</label>
        <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña" class="input-configuracionuser" required>
        <label for="rango" class="label-configuracionuser">Rango</label>
        <select name="rango" class="input-configuracionuser" required>
            <?php
            while ($fila = mysqli_fetch_assoc($consulta)) {
                echo '<option value="' . $fila['rango'] . '">' . htmlspecialchars($fila['nombre_rango']) . '</option>';
            }
            ?>
            <option value="plus">Agregar Rol</option>
            <?php include("control/registro_user.php"); ?>
        </select>
        <button type="submit" class="button-configuracionuser" name="btn">Enviar</button>
        <br>
        <a href="limites.php">Límites de rol por usuarios</a>
    </form>
    <form class="formulario-configuracionuser" id="form-rango" style="display:none;" method="POST">
        <p class="titulo-index">Agregar nuevo rango</p>
        <label for="nombre_rango" class="label-configuracionuser">Nombre del nuevo rango</label>
        <input type="text" name="nombre_rango" placeholder="Nombre del rango" class="input-configuracionuser" required>
        <label for="max" class="label-configuracionuser">Máximo de cuentas</label>
        <input type="number" name="max" placeholder="Máximo permitido" class="input-configuracionuser" min="1" required>
        <button type="submit" class="button-configuracionuser" name="crear_rango">Crear Rol</button>
        <button type="submit" class="button-configuracionuser" onclick="volverAlRegistro()">Volver al formulario de usuario</button>
        <br>
        <a href="limites.php">Límites de rol por usuarios</a>
    </form>

</body>
<script src="../js/verificar_sesiones.js"></script>
<!-- <script src="../js/registrar_ajax.js"></script> -->
 <script>
function volverAlRegistro() {
    document.getElementById('form-rango').style.display = 'none';
    document.getElementById('form').style.display = 'block';

    const select = document.querySelector('select[name="rango"]');

    // Seleccionar manualmente un valor específico
    if (select.value === 'plus') {
        // Selecciona el primero distinto de 'plus'
        for (let i = 0; i < select.options.length; i++) {
            if (select.options[i].value !== 'plus') {
                select.value = select.options[i].value;
                break;
            }
        }
    }
}


document.querySelector('select[name="rango"]').addEventListener('change', function() {
    if (this.value === 'plus') {
        document.getElementById('form').style.display = 'none';
        document.getElementById('form-rango').style.display = 'block';
    } else {
        volverAlRegistro(); // por si eligen un rango normal después de "plus"
    }
});



</script>

</html>
