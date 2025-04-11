<?php 
include("../control general/conexion.php");
include("../control general/sesionOut.php");
// En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
include("control/validar_rol.php");

// Inicializar variables
$filtro = isset($_POST['opcion']) ? $_POST['opcion'] : 'Día'; // Valor predeterminado: 'Día'
$inicio = $fin = "";

// Configurar la zona horaria
date_default_timezone_set('America/Caracas');

// Calcular fechas según el filtro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hoy = date("Y-m-d");
    switch ($filtro) {
        case "Día":
            $inicio = $hoy . " 00:00:00"; // Inicio del día
            $fin = $hoy . " 23:59:59";    // Fin del día
            break;
        case "Semana":
            $inicio = date("Y-m-d", strtotime("-7 days")) . " 00:00:00";
            $fin = $hoy . " 23:59:59";
            break;
        case "Mes":
            $inicio = date("Y-m-d", strtotime("-1 month")) . " 00:00:00";
            $fin = $hoy . " 23:59:59";
            break;
        case "Año":
            $inicio = date("Y-m-d", strtotime("-1 year")) . " 00:00:00";
            $fin = $hoy . " 23:59:59";
            break;
        default:
            $inicio = $hoy . " 00:00:00";
            $fin = $hoy . " 23:59:59";
            break;
    }
}
// Contar usuarios por rol
$queryUsuarios = "
    SELECT rango, COUNT(*) AS cantidad 
    FROM usuarios 
    GROUP BY rango
";
$resultadoUsuarios = $conexion->query($queryUsuarios);

// Contar entradas por rango de fechas
$cantidadEntradas = 0;
if (!empty($inicio) && !empty($fin)) {
    $stmt = $conexion->prepare("
        SELECT COUNT(*) AS cantidad 
        FROM reportes_entradas 
        WHERE fecha_entrada BETWEEN ? AND ?
    ");
    $stmt->bind_param("ss", $inicio, $fin);
    $stmt->execute();
    $resultadoEntradas = $stmt->get_result();
    $filaEntradas = $resultadoEntradas->fetch_assoc();
    $cantidadEntradas = $filaEntradas['cantidad'];
    $stmt->close();

    $consulta = $conexion->query("SELECT * FROM reportes_entradas WHERE fecha_entrada BETWEEN '$inicio' AND '$fin' ORDER BY fecha_entrada DESC");
}
// Formatear las fechas para mostrarlas en formato d-m-Y
$inicioFormateado = date("d-m-Y", strtotime(explode(" ", $inicio)[0]));
$finFormateado = date("d-m-Y", strtotime(explode(" ", $fin)[0]));
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estadísticas de Entradas</title>
    <link rel="stylesheet" href="../estilos/styleindex.css?v=<?php echo time();?>">
        <!-- Styles -->
        <style>
    #chartdiv {
        margin: auto;
        width: 100%;
        height: 200px;
    }
    </style>
</head>
<body class="container-body">
    <header class="header-main">
        <div class="header-systemhelp">
        <p class="titulo-systemhelp">Estadísticas de entrada</p>
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
    <div class="formulario-filtro-estadistica">
    <form method="POST" id="filtro-form">
        <label for="fecha" class="texto-systemhelp">Filtrar por:</label>
        <select name="opcion" id="fecha">
            <option value="Día" <?php echo $filtro === "Día" ? "selected" : ""; ?>>Día</option>
            <option value="Semana" <?php echo $filtro === "Semana" ? "selected" : ""; ?>>Semana</option>
            <option value="Mes" <?php echo $filtro === "Mes" ? "selected" : ""; ?>>Mes</option>
            <option value="Año" <?php echo $filtro === "Año" ? "selected" : ""; ?>>Año</option>
        </select>
        </div>    
        <button type="submit" value="Filtrar" class="formulario-btn-systemhelp">Filtrar</button>  
    </form>

    <h2 class="p-estadisticas-de-entradas">Usuarios por Rol</h2>
    <table class="table-estadisticas-de-entradas">
        <thead>
            <tr>
                <th>Rol</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($fila = $resultadoUsuarios->fetch_assoc()) {
                $rolTexto = '';
                switch ($fila['rango']) {
                    case 0: $rolTexto = 'Secretaria'; break;
                    case 1: $rolTexto = 'Despacho'; break;
                    case 2: $rolTexto = 'Administrador Secundario'; break;
                    case 3: $rolTexto = 'Administrador'; break;
                }
                echo "<tr><td>$rolTexto</td><td>{$fila['cantidad']}</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <?php 
        if(!empty($inicio) && !empty($fin) &&  $inicioFormateado != $finFormateado){
    ?>
    <h2>Entradas por Filtro: <?php echo ucfirst($filtro); ?></h2>
    <p>
        Total de entradas desde <?php echo $inicioFormateado; ?> hasta hoy <?php echo $finFormateado; ?>:
        <?php echo $cantidadEntradas; ?>
    </p>
    <table>
        <tr>
            <th>CI</th>
            <th>Fecha entrada</th>
            <th>Fecha salida</th>
        </tr>
        <?php while($mostrar = mysqli_fetch_array($consulta)){ ?>
        <tr>
            <td><?php echo $mostrar['ci'] ?></td>
            <td><?php echo date("d-m-Y", strtotime($mostrar['fecha_entrada']));?></td>
            <td><?php if ($mostrar['fecha_salida'] == '0000-00-00 00:00:00') { echo 'En Línea'; } else { echo date("d-m-Y", strtotime($mostrar['fecha_salida']));}?></td>
        </tr>
        <?php } ?>
    <?php 
        }
        else if(!empty($inicio) && !empty($fin) && $inicioFormateado == $finFormateado){
    ?>
    <p class="p-estadisticas-de-entradas">Total de entradas de hoy: <?php echo $cantidadEntradas; ?></p>
    <table class="table-estadisticas-de-entradas">
        <tr>
            <th>CI</th>
            <th>Fecha entrada</th>
            <th>Fecha salida</th>
        </tr>
    <?php while($mostrar = mysqli_fetch_array($consulta)){ ?>
        <tr>
            <td><?php echo $mostrar['ci'] ?></td>
            <td><?php echo date("d-m-Y", strtotime($mostrar['fecha_entrada'])); ?></td>
            <td><?php if ($mostrar['fecha_salida'] == '0000-00-00 00:00:00') { echo 'En Línea'; } else { echo date("d-m-Y", strtotime($mostrar['fecha_salida']));}?></td>
        </tr>
    <?php } ?>
    </table>
    <?php 
    }
    ?>
    <section class="section-estadisticas">
        <h1 class="titulo-estadisticas">Estadísticas de las entradas por rol</h1>
        <p class="descripcion-estadisticas">A continuación se muestra un gráfico con la cantidad de entradas por rol.</p>
    <div id="chartdiv"></div>
    </section>
</body>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="../js/estadisticas_entradas.js"></script>
<script src="../js/filter_estadisticas.js"></script>
<script src="../js/verificar_sesiones.js"></script>
</html>