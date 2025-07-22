<?php 
require_once("../control_general/sesionOut.php");
require_once("control/validar_rol.php");
require_once("../control_general/conexion.php");

// Procesar actualización si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar'])) {
    foreach ($_POST['limites'] as $rango => $nuevoMax) {
        $rango = intval($rango);
        $nuevoMax = intval($nuevoMax);
        $conexion->query("UPDATE rangos SET max = $nuevoMax WHERE rango = $rango");
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Límite de creación de cuenta por roles</title>
    <style>
        .form-limites { display: none; margin-top: 20px; }
        .btn-toggle { margin-top: 10px; }
    </style>
</head>
<body>
    <h2>Límites actuales por rol</h2>
    <?php 
    $consulta = $conexion->query("SELECT * FROM rangos ORDER BY rango ASC");
    while($mostrar = mysqli_fetch_array($consulta)){
        echo "<p>Límite de cuentas para el rol <strong>" . htmlspecialchars($mostrar['nombre_rango']) . "</strong>: " . $mostrar['max'] ."</p>";
    }
    ?>

    <button class="btn-toggle" onclick="document.querySelector('.form-limites').style.display='block'">Editar Límites</button>

    <form method="POST" class="form-limites">
        <h3>Modificar límites</h3>
        <?php 
        $consulta = $conexion->query("SELECT * FROM rangos ORDER BY rango ASC");
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
    <a href="">Actualizar</a> |
    <a href="registro.php">Volver al registro</a>

    <script>
        // Puedes agregar validaciones JS si lo deseas
    </script>
</body>
</html>
