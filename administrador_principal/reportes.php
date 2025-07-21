<?php 
require_once(".././control_general/conexion.php");
require_once("../control_general/sesionOut.php");
require_once("control/validar_rol.php");

// Filtros de fechas
$fecha_inicio = isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : '';
$fecha_final = isset($_POST['fecha_final']) ? $_POST['fecha_final'] : '';
if ($fecha_inicio && $fecha_final && strtotime($fecha_inicio) > strtotime($fecha_final)) {
    $temp = $fecha_inicio;
    $fecha_inicio = $fecha_final;
    $fecha_final = $temp;
}
if ($fecha_final) {
    $fecha_final = date('Y-m-d 23:59:59', strtotime($fecha_final));
    $fecha_fin = date('Y-m-d', strtotime($fecha_final));
}

// Consulta SQL
$sql = "SELECT * FROM reportes_entradas WHERE 1=1";
if ($fecha_inicio && !$fecha_final) {
    $sql .= " AND fecha_entrada >= '$fecha_inicio'";
} elseif ($fecha_final && !$fecha_inicio) {
    $sql .= " AND fecha_entrada <= '$fecha_final'";
} elseif ($fecha_inicio && $fecha_final) {
    $sql .= " AND fecha_entrada BETWEEN '$fecha_inicio' AND '$fecha_final'";
}
$sql .= " ORDER BY id DESC";
$consulta = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reportes</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:700,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/reportes.css?v=<?php echo time();?>">
  <link rel="stylesheet" href="../css/solicitud.css?v=<?php echo time();?>">
  <link rel="stylesheet" href="../font/css/all.css?v=<?php echo time();?>">
</head>
<body class="solicitud-body">
  <header class="header">
    <div class="titulo-header">Reportes</div>
    <div class="header-right">
      <button class="nav-btn"><i class="fa fa-user"></i> Usuario</button>
      <a href="main.php"><button class="nav-btn"><i class="fa fa-arrow-left"></i> Volver atrás</button></a>
    </div>
  </header>
  <main>
    <section class="reportes-filtros">
      <form class="reportes-form" action="reportes.php" method="POST">
        <div class="filtro-fecha">
          <label for="fecha_inicio"><i class="fa fa-calendar"></i> Desde</label>
          <input type="date" id="fecha_inicio" name="fecha_inicio" value="<?php echo htmlspecialchars($fecha_inicio); ?>">
        </div>
        <div class="filtro-fecha">
          <label for="fecha_final"><i class="fa fa-calendar"></i> Hasta</label>
          <input type="date" id="fecha_final" name="fecha_final" value="<?php echo isset($fecha_fin) ? htmlspecialchars($fecha_fin) : ''; ?>">
        </div>
        <button type="submit" class="buscar-btn"><i class="fa fa-search"></i> Buscar</button>
      </form>
    </section>
    <div class="reportes-busqueda">
      <input type="text" placeholder="Buscar CI o nombre..." class="buscar-input" id="busqueda-ci">
      <button class="buscar-btn" type="button" onclick="filtrarTabla()"><i class="fa fa-search"></i> Buscar</button>
      <button class="buscar-btn" type="button"><i class="fa fa-file-excel"></i> Exportar Excel</button>
    </div>
    <section class="reportes-tabla-card">
      <div class="tabla-responsive">
        <table class="reportes-tabla" id="tabla-reportes">
          <thead>
            <tr>
              <th>Número</th>
              <th>CI</th>
              <th>Fecha Entrada</th>
              <th>Fecha Salida</th>
              <th>Estado</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            while($mostrar = mysqli_fetch_array($consulta)){
              $estado = ($mostrar['fecha_salida'] == '0000-00-00 00:00:00') ? 
                '<span class="estado online">En línea</span>' : 
                '<span class="estado offline">Desconectado</span>';
              $fecha_salida = ($mostrar['fecha_salida'] == '0000-00-00 00:00:00') ? "En línea" : $mostrar['fecha_salida'];
              echo "<tr>";
              echo "<td>".htmlspecialchars($mostrar['id'])."</td>";
              echo "<td>".htmlspecialchars($mostrar['ci'])."</td>";
              echo "<td>".htmlspecialchars($mostrar['fecha_entrada'])."</td>";
              echo "<td>".htmlspecialchars($fecha_salida)."</td>";
              echo "<td>$estado</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </section>
    <div class="paginacion">
      <button>&laquo;</button>
      <button class="active">1</button>
      <button>2</button>
      <button>3</button>
      <button>&raquo;</button>
    </div>
  </main>
</body>
<script src="../js/verificar_sesiones.js"></script>
</html>