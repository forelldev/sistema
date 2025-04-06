<?php
include("../control general/conexion.php"); 
include("../control general/sesionOut.php");
// En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
include("control/validar_rol.php");
// Verificar si hay filtros aplicados
$fecha_inicio = isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : '';
$fecha_final = isset($_POST['fecha_final']) ? $_POST['fecha_final'] : '';
$estado = isset($_POST['estado']) ? $_POST['estado'] : '';
// Intercambiar las fechas si están invertidas
if ($fecha_inicio && $fecha_final && strtotime($fecha_inicio) > strtotime($fecha_final)) {
    $temp = $fecha_inicio;
    $fecha_inicio = $fecha_final;
    $fecha_final = $temp;
}
// Ajustar la fecha final para incluir todo el día si está presente
if ($fecha_final) {
    $fecha_final = date('Y-m-d 23:59:59', strtotime($fecha_final));
    $fecha_fin = date('Y-m-d', strtotime($fecha_final));
}
// Construir la consulta SQL
$sql = "SELECT * FROM system_help WHERE 1=1";
// Validaciones de fechas
if ($fecha_inicio && !$fecha_final) {
    // Solo fecha de inicio
    $sql .= " AND fecha_solicitud >= '$fecha_inicio'";
} elseif ($fecha_final && !$fecha_inicio) {
    // Solo fecha final
    $sql .= " AND fecha_solicitud <= '$fecha_final'";
} elseif ($fecha_inicio && $fecha_final) {
    // Ambas fechas están presentes
    $sql .= " AND fecha_solicitud BETWEEN '$fecha_inicio' AND '$fecha_final'";
}

if ($estado) {
    $sql .= " AND estado = '$estado'";
}
$sql .= " ORDER BY id DESC";
$consulta = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/styleindex.css">
    <title>Proceso de solicitud de ayudas</title>
</head>
<body class="container-body">
<header class="header-main">
        <div class="header-systemhelp">
        <p class="titulo-systemhelp">Sistema de solicitud de ayudas</p>
        <nav class="menu-systemhelp">
            <ul>
              <li><a href="main.php">Inicio</a></li>
              <li><a href="">Usuario</a>
                <ul>
                  <li><a href=".././control general/logout.php">Cerrar Sesión</a></li>
                </ul>
              </li>
              <li><a href="new_help.php">Rellenar Formulario</a></li>
              <li><a href="system_help.php">Volver atrás</a></li>
            </ul>
          </nav>
        </div>
        
    </header>
    <div class="formulario-filtro-systemhelplist">
    <form action="system_help.php" method="POST">
        <p class="texto-systemhelp">Desde</p>
        <input type="date" name="fecha_inicio" value="<?php echo $fecha_inicio; ?>">
        <p class="texto-systemhelp">Hasta</p>
        <input type="date" name="fecha_final" value="<?php echo $fecha_final; ?>">
        <select name="estado">
            <option value="">Seleccione un estado</option>
            <option value="En espera del documento físico para ser procesado 0/3" <?php if ($estado == "En espera del documento físico para ser procesado 0/3") echo 'selected'; ?>>En espera del documento físico para ser procesado 0/3</option>
            <option value="En Proceso 1/3" <?php if ($estado == "En Proceso 1/3") echo 'selected'; ?>>En Proceso 1/3</option>
            <option value="En Proceso 2/3" <?php if ($estado == "En Proceso 2/3") echo 'selected'; ?>>En Proceso 2/3</option>
            <option value="Proceso Finalizado 3/3" <?php if ($estado == "Proceso Finalizado 3/3") echo 'selected'; ?>>Proceso Finalizado 3/3</option>
        </select>
        </div>
        <button type="submit" name="btn" value="Filtrar" class="formulario-btn-systemhelp">Filtrar</button>
    </form>
    
    <section class="table-systemhelplist">
    <table>
        <tr>
            <th>Título</th>
            <th>Estado</th>
        </tr>
        <?php while($mostrar = mysqli_fetch_array($consulta)){ ?>
        <tr>
            <td><?php echo $mostrar['titulo'] ?></td>
            <td><?php echo $mostrar['estado'] ?></td>
        </tr>
        <?php } ?>
    </table>
    </section>
</body>
<script src="../js/verificar_sesiones.js"></script>
</html>