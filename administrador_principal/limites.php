<?php
// ADVERTENCIA: Este script usa consultas directas sin sanitización adecuada.
// Es ALTAMENTE VULNERABLE a la Inyección SQL.
// ÚSALO SÓLO EN UN ENTORNO DE PRUEBA LOCAL Y AISLADO.

require_once("../control_general/sesionOut.php");
require_once("control/validar_rol.php");
require_once("../control_general/conexion.php"); // Asegúrate de que $conexion esté disponible aquí

// Habilitar reporte de errores para depuración (ÚTIL SOLO EN DESARROLLO)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Variable para controlar la vista de eliminación
$mostrar_eliminacion_usuarios = false;
$rol_a_ajustar = null;
$nuevo_limite_rol = null;
$usuarios_excedentes = [];

// --- Paso 1: Procesar la actualización de límites (cuando se envía el formulario principal) ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar'])) {
    $limites_nuevos = $_POST['limites'];
    $problema_encontrado = false;

    foreach ($limites_nuevos as $rango_id => $nuevoMax) {
        // Sanitización básica para asegurar que sean números enteros
        // Se mantiene intval() aquí, ya que los IDs de rango deberían ser enteros.
        // Si el $rango_id de la BD es '0', intval('0') sigue siendo 0.
        $rango_id = intval($rango_id);
        $nuevoMax = intval($nuevoMax);

        // Obtener el límite actual y el nombre del rol (Consulta directa)
        $res_rango_actual = $conexion->query("SELECT max, nombre_rango FROM rangos WHERE rango = $rango_id");
        if (!$res_rango_actual) {
            die("Error en consulta de rango actual: " . $conexion->error);
        }
        $rango_actual_info = $res_rango_actual->fetch_assoc();
        $limite_actual = $rango_actual_info['max'];
        $nombre_rol = $rango_actual_info['nombre_rango'];

        // Contar usuarios actuales para este rol (Consulta directa, usando 'rango' para el rol en la tabla 'user')
        $res_contar_usuarios = $conexion->query("SELECT COUNT(*) AS total_usuarios FROM user WHERE rango = $rango_id");
        if (!$res_contar_usuarios) {
            die("Error en conteo de usuarios: " . $conexion->error);
        }
        $usuarios_actuales = $res_contar_usuarios->fetch_assoc()['total_usuarios'];

        // Si el nuevo límite es menor que el número actual de usuarios y el límite actual era mayor o igual
        if ($nuevoMax < $usuarios_actuales && $limite_actual >= $usuarios_actuales) {
            $problema_encontrado = true;
            $rol_a_ajustar = $rango_id; // Aquí se asigna el valor que termina en sesión
            $nuevo_limite_rol = $nuevoMax;

            // Guardar en sesión para persistir el estado durante la eliminación
            $_SESSION['rol_a_ajustar'] = $rol_a_ajustar; // Aquí se guarda
            $_SESSION['nuevo_limite_rol'] = $nuevo_limite_rol;
            
            // Redirigir para activar la vista de eliminación
            header("Location: " . $_SERVER['PHP_SELF'] . "?action=ajustar_usuarios&rol=" . $rango_id . "&nuevo_limite=" . $nuevoMax);
            exit;
        } else {
            // Si no hay problema, simplemente actualiza el límite
            $update_query = "UPDATE rangos SET max = $nuevoMax WHERE rango = $rango_id";
            if (!$conexion->query($update_query)) {
                die("Error al actualizar límite de rango: " . $conexion->error);
            }
        }
    }

    // Si no hubo problemas, redirigir normalmente
    if (!$problema_encontrado) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

// --- Paso 2: Procesar la eliminación de un usuario (cuando se hace clic en 'Eliminar' en la lista) ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar_user_id'])) {
    $user_ci_a_eliminar = $_POST['eliminar_user_id'];
    
    // Recuperar datos de la sesión
    // Modificado para aceptar 0 como valor válido para el rol
    $rol_a_ajustar_sesion = isset($_SESSION['rol_a_ajustar']) ? intval($_SESSION['rol_a_ajustar']) : null;
    $nuevo_limite_rol_sesion = isset($_SESSION['nuevo_limite_rol']) ? intval($_SESSION['nuevo_limite_rol']) : null;

    // --- DEBUGGING: Mostrar valores antes de la eliminación ---
    echo "<pre>DEBUG: --- INTENTO DE ELIMINACIÓN ---</pre>";
    echo "<pre>DEBUG: Valor recibido por POST['eliminar_user_id']: " . (isset($_POST['eliminar_user_id']) ? htmlspecialchars($_POST['eliminar_user_id']) : 'NO RECIBIDO POR POST') . "</pre>";
    echo "<pre>DEBUG: user_ci_a_eliminar (variable asignada): " . htmlspecialchars($user_ci_a_eliminar) . "</pre>";
    echo "<pre>DEBUG: Contenido de SESSION['rol_a_ajustar']: " . (isset($_SESSION['rol_a_ajustar']) ? htmlspecialchars($_SESSION['rol_a_ajustar']) : 'NO SET EN SESIÓN') . "</pre>";
    echo "<pre>DEBUG: rol_a_ajustar_sesion (variable parseada): " . htmlspecialchars($rol_a_ajustar_sesion) . "</pre>";
    echo "<pre>DEBUG: Contenido de SESSION['nuevo_limite_rol']: " . (isset($_SESSION['nuevo_limite_rol']) ? htmlspecialchars($_SESSION['nuevo_limite_rol']) : 'NO SET EN SESIÓN') . "</pre>";
    echo "<pre>DEBUG: nuevo_limite_rol_sesion (variable parseada): " . htmlspecialchars($nuevo_limite_rol_sesion) . "</pre>";
    echo "<pre>DEBUG: --- FIN DEBUG INTENTO ---</pre>";

    // MODIFICACIÓN CLAVE AQUÍ: Permite que $rol_a_ajustar_sesion sea 0.
    // Se verifica que sea numérico y que $user_ci_a_eliminar no esté vacío.
    if ($user_ci_a_eliminar !== '' && is_numeric($rol_a_ajustar_sesion) && $nuevo_limite_rol_sesion !== null) {
        $user_ci_a_eliminar_escaped = $conexion->real_escape_string($user_ci_a_eliminar);

        // Eliminar el usuario de la tabla user
        $delete_user_query = "DELETE FROM user WHERE ci = '$user_ci_a_eliminar_escaped' AND rango = $rol_a_ajustar_sesion";
        $delete_user_result = $conexion->query($delete_user_query);

        if (!$delete_user_result) {
            die("Error al eliminar usuario de la tabla 'user': " . $conexion->error . "<br>Consulta: " . htmlspecialchars($delete_user_query));
        }

        // Eliminar también de user_info
        $delete_user_info_query = "DELETE FROM user_info WHERE ci = '$user_ci_a_eliminar_escaped'";
        $delete_user_info_result = $conexion->query($delete_user_info_query);

        if (!$delete_user_info_result) {
            die("Error al eliminar usuario de la tabla 'user_info': " . $conexion->error . "<br>Consulta: " . htmlspecialchars($delete_user_info_query));
        }
        
        // Redirección después de la eliminación
        header("Location: " . $_SERVER['PHP_SELF'] . "?action=ajustar_usuarios&rol=" . $rol_a_ajustar_sesion . "&nuevo_limite=" . $nuevo_limite_rol_sesion);
        exit;

    } else {
        echo "<pre>DEBUG: Faltan datos necesarios para la eliminación (CI no vacío, Rol numérico o Nuevo Límite no nulo).</pre>";
    }
}

// --- Paso 3: Determinar si mostrar la interfaz de eliminación (o recalcular si ya se está en ella) ---
if (isset($_GET['action']) && $_GET['action'] === 'ajustar_usuarios' && isset($_GET['rol']) && isset($_GET['nuevo_limite'])) {
    // Se mantiene intval() aquí, ya que los parámetros GET deberían ser numéricos.
    $rol_a_ajustar = intval($_GET['rol']);
    $nuevo_limite_rol = intval($_GET['nuevo_limite']);

    // Recalcular usuarios actuales para el rol después de CUALQUIER acción (actualización o eliminación)
    $res_contar_usuarios_actual = $conexion->query("SELECT COUNT(*) AS total_usuarios FROM user WHERE rango = $rol_a_ajustar");
    if (!$res_contar_usuarios_actual) {
        die("Error en reconteo de usuarios para mostrar: " . $conexion->error);
    }
    $usuarios_actuales_para_mostrar = $res_contar_usuarios_actual->fetch_assoc()['total_usuarios'];

    // Si aún hay usuarios por encima del límite, mostrar la interfaz de eliminación
    if ($usuarios_actuales_para_mostrar > $nuevo_limite_rol) {
        $mostrar_eliminacion_usuarios = true;
        // Obtener los usuarios para mostrar la lista (JOIN con user_info para el nombre)
        $res_usuarios_excedentes = $conexion->query("SELECT u.ci, ui.nombre FROM user u JOIN user_info ui ON u.ci = ui.ci WHERE u.rango = $rol_a_ajustar");
        if (!$res_usuarios_excedentes) {
            die("Error en consulta de usuarios excedentes para la interfaz: " . $conexion->error);
        }
        $usuarios_excedentes = [];
        while ($user = $res_usuarios_excedentes->fetch_assoc()) {
            $usuarios_excedentes[] = $user;
        }
    } else {
        // Si el número de usuarios ya es igual o menor que el nuevo límite,
        // actualizar el límite final en la DB y redirigir a la página principal.
        $update_final_query = "UPDATE rangos SET max = $nuevo_limite_rol WHERE rango = $rol_a_ajustar";
        if (!$conexion->query($update_final_query)) {
            die("Error al actualizar límite final en la recarga: " . $conexion->error);
        }
        // Limpiar sesiones relacionadas con el ajuste de límites
        unset($_SESSION['rol_a_ajustar']);
        unset($_SESSION['nuevo_limite_rol']);
        header("Location: " . $_SERVER['PHP_SELF'] . "?mensaje=limite_ajustado");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Límite de creación de cuenta por roles</title>
    <style>
        /* Estilos CSS (puedes mover esto a un archivo .css) */
        body { font-family: sans-serif; margin: 20px; background-color: #f4f4f4; color: #333; }
        h1, h2, h3 { color: #0056b3; }
        hr { border: 0; height: 1px; background-color: #ccc; margin: 20px 0; }
        p { margin-bottom: 10px; }
        .form-limites {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-top: 20px;
            display: none; /* Por defecto oculto */
        }
        .form-limites label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .form-limites input[type="number"] {
            width: 80px;
            padding: 8px;
            margin-left: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-limites button, .btn-toggle {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        .form-limites button:hover, .btn-toggle:hover {
            background-color: #0056b3;
        }
        .eliminacion-usuarios {
            background-color: #ffe0e0;
            border: 1px solid #dc3545;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            color: #dc3545;
        }
        .eliminacion-usuarios h2 { color: #dc3545; }
        .eliminacion-usuarios ul { list-style: none; padding: 0; }
        .eliminacion-usuarios li {
            background-color: #fff;
            margin-bottom: 8px;
            padding: 10px 15px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #f5c6cb;
            color: #333;
        }
        .eliminacion-usuarios button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 14px;
        }
        .eliminacion-usuarios button:hover {
            background-color: #c82333;
        }
        a {
            color: #007bff;
            text-decoration: none;
            margin-right: 15px;
        }
        a:hover {
            text-decoration: underline;
        }
        .mensaje-exito {
            color: green;
            font-weight: bold;
            background-color: #e6ffe6;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #00cc00;
            margin-bottom: 20px;
        }
        pre {
            background-color: #f8d7da; /* Light red for debug output */
            border: 1px solid #f5c6cb;
            padding: 10px;
            margin-top: 10px;
            white-space: pre-wrap;
            word-wrap: break-word;
            font-family: monospace;
            color: #721c24; /* Dark red text */
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <h1>Administración de Límites de Cuentas por Rol</h1>
    <hr>

    <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'limite_ajustado'): ?>
        <p class="mensaje-exito">✅ Límite ajustado y cuentas verificadas exitosamente.</p>
    <?php endif; ?>

    <?php if ($mostrar_eliminacion_usuarios): ?>
        <div class="eliminacion-usuarios">
            <h2>⚠️ Atención: Se excedió el límite para un rol</h2>
            <?php
            $res_nombre_rol = $conexion->query("SELECT nombre_rango FROM rangos WHERE rango = $rol_a_ajustar");
            if (!$res_nombre_rol) {
                die("Error en consulta de nombre de rango para interfaz: " . $conexion->error);
            }
            $nombre_rol_display = $res_nombre_rol->fetch_assoc()['nombre_rango'];

            $usuarios_actuales_para_mostrar_msg = $usuarios_actuales_para_mostrar ?? 0;
            $necesario_eliminar = $usuarios_actuales_para_mostrar_msg - $nuevo_limite_rol;
            ?>
            <p>El nuevo límite para el rol **"<?php echo htmlspecialchars($nombre_rol_display); ?>"** es **<?php echo $nuevo_limite_rol; ?>** cuenta(s).</p>
            <p>Actualmente hay **<?php echo $usuarios_actuales_para_mostrar_msg; ?>** cuenta(s) para este rol. Necesitas eliminar **<?php echo $necesario_eliminar; ?>** cuenta(s).</p>
            <p>Por favor, selecciona una cuenta para eliminar:</p>
            <ul>
                <?php if (!empty($usuarios_excedentes)): ?>
                    <?php foreach ($usuarios_excedentes as $user): ?>
                        <li>
                            <span>CI: <?php echo htmlspecialchars($user['ci']); ?> - Nombre: **<?php echo htmlspecialchars($user['nombre']); ?>**</span>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="eliminar_user_id" value="<?php echo htmlspecialchars($user['ci']); ?>">
                                <button type="submit">Eliminar</button>
                            </form>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No hay usuarios excedentes listados actualmente. Si crees que esto es un error, por favor recarga la página o contacta al soporte.</p>
                <?php endif; ?>
            </ul>
            <p style="font-style: italic;">Una vez que el número de cuentas sea igual o menor que el nuevo límite, el sistema lo ajustará automáticamente.</p>
        </div>
        <hr>
    <?php endif; ?>

    <h2>Límites actuales por rol</h2>
    <?php
    $consulta = $conexion->query("SELECT * FROM rangos ORDER BY rango ASC");
    if (!$consulta) {
        die("Error al consultar rangos: " . $conexion->error);
    }
    while($mostrar = mysqli_fetch_array($consulta)){
        echo "<p>Límite de cuentas para el rol <strong>" . htmlspecialchars($mostrar['nombre_rango']) . "</strong>: " . $mostrar['max'] ."</p>";
    }
    ?>

    <button class="btn-toggle" onclick="document.querySelector('.form-limites').style.display='block'">Editar Límites</button>

    <form method="POST" class="form-limites">
        <h3>Modificar límites</h3>
        <?php
        $consulta = $conexion->query("SELECT * FROM rangos ORDER BY rango ASC"); // Nueva consulta para asegurar datos frescos
        if (!$consulta) {
            die("Error al consultar rangos para edición: " . $conexion->error);
        }
        while($mostrar = mysqli_fetch_array($consulta)){
            echo '<label>' . htmlspecialchars($mostrar['nombre_rango']) . ':
                <input type="number" name="limites[' . $mostrar['rango'] . ']" value="' . $mostrar['max'] . '" min="0">
            </label><br>';
        }
        ?>
        <br>
        <button type="submit" name="actualizar">Guardar Cambios</button>
    </form>

    <br><br>
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>">Actualizar</a> |
    <a href="registro.php">Volver al registro</a>

    <script>
        // Mantiene el formulario de edición visible si hubo un intento de actualizar
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar'])): ?>
            document.querySelector('.form-limites').style.display = 'block';
        <?php endif; ?>
    </script>
</body>
</html>