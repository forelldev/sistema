<?php 
require_once("../control_general/sesionOut.php");
require_once("control/validar_rol.php");
require_once("../control_general/conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Actividades</title>
    <link rel="stylesheet" href="../css/solicitud.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../font/css/all.css?v=<?php echo time();?>">
</head>
<body class="solicitud-body">
  <header class="header">
    <div class="titulo-header">Registro de Actividades</div>
    <div class="header-right">
      <a href="main.php"><button class="nav-btn"><i class="fa fa-home"></i> Inicio</button></a>
      <button class="nav-btn"><i class="fa fa-user"></i> Usuario</button>
    </div>
  </header>
  <main class="auditoria-main">
    <div class="auditoria-header">
      <h1><i class="fa fa-clipboard-list"></i> Auditoría de Actividades</h1>
      <p>Consulta las acciones realizadas por los usuarios y administradores del sistema.</p>
    </div>
    <!-- Filtros y acciones -->
    <div class="auditoria-filtros-bar">
      <input type="text" id="filtro-nombre" class="auditoria-filtro" placeholder="Buscar por nombre...">
      <select id="filtro-rol" class="auditoria-filtro">
        <option value="">Todos los roles</option>
        <option value="Moderador">Promotor Social</option>
        <option value="Admin">Despacho</option>
        <option value="Array">Administración</option>
        <option value="Usuario">Admin</option>
      </select>
      <input type="date" id="filtro-fecha" class="auditoria-filtro">
      <button class="filtrar-btn"><i class="fa fa-search"></i> Filtrar</button>
      <button class="filtrar-btn"><i class="fa fa-file-excel"></i> Exportar Excel</button>
    </div>
    <section class="auditoria-tabla-card">
      <div class="tabla-responsive">
        <table class="auditoria-tabla" id="tabla-auditoria">
          <thead>
            <tr>
              <th>ID</th>
              <th>Rol</th>
              <th>Nombre</th>
              <th>Acción</th>
              <th>Fecha</th>
              <th>ID Relacionado</th>
              <th>CI del solicitante</th>
              <th>Descripción</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $consulta = $conexion->query("SELECT * FROM reportes_solicitudes ORDER BY fecha DESC");
            while ($fila = $consulta->fetch_assoc()) {
                $id = $fila['id_doc'];
                $consulta2 =  $conexion->query("SELECT * FROM system_help WHERE id_doc = '$id'");
                $consulta3 =  $conexion->query("SELECT * FROM datos_import WHERE id_doc = '$id'");
                $desc = ($consulta2 && $consulta2->num_rows > 0) ? $consulta2->fetch_assoc() : null;
                $descripcion = $desc ? $desc['descripcion'] : "Sin descripción";
                $ci = "";
                if ($consulta3 && $consulta3->num_rows > 0) {
                    $datos_import = $consulta3->fetch_assoc();
                    $ci = $datos_import['ci_perso'];
                }
                // Badge para el rol
                $rolBadge = '<span class="badge rol-admin">'.$fila['rol'].'</span>';
                // Badge para el ID relacionado
                $idBadge = '<span class="badge doc">#'.$fila['id_doc'].'</span>';
                // Acción con icono
                $accionIcon = '<i class="fa fa-cog"></i> '.$fila['accion'];
                if (stripos($fila['accion'], 'creó') !== false) $accionIcon = '<i class="fa fa-plus"></i> '.$fila['accion'];
                if (stripos($fila['accion'], 'aprobó') !== false) $accionIcon = '<i class="fa fa-check"></i> '.$fila['accion'];
                if (stripos($fila['accion'], 'reinició') !== false) $accionIcon = '<i class="fa fa-redo"></i> '.$fila['accion'];
                echo "<tr>";
                echo "<td>{$fila['id']}</td>";
                echo "<td>$rolBadge</td>";
                echo "<td>".htmlspecialchars($fila['nombre'])."</td>";
                echo "<td class='auditoria-accion'>$accionIcon</td>";
                echo "<td class='auditoria-fecha'>".$fila['fecha']."</td>";
                echo "<td>$idBadge</td>";
                echo "<td>".htmlspecialchars($ci)."</td>";
                echo "<td class='auditoria-desc' title='".htmlspecialchars($descripcion)."'>".htmlspecialchars($descripcion)."</td>";
                echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
      <!-- Paginación (puedes implementar la lógica JS/PHP si lo deseas) -->
      <div class="auditoria-paginacion" id="auditoria-paginacion">
        <button>&laquo;</button>
        <span id="pagina-actual">1</span> / <span id="total-paginas">1</span>
        <button>&raquo;</button>
      </div>
    </section>
  </main>
</body>
</html>