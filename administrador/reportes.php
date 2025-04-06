<?php 
include(".././control general/conexion.php");
include("../control general/sesionOut.php");
// En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
include("control/validar_rol.php");
// Verificar si hay filtros aplicados
$fecha_inicio = isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : '';
$fecha_final = isset($_POST['fecha_final']) ? $_POST['fecha_final'] : '';
$estado = isset($_POST['estado']) ? $_POST['estado'] : '';
// Ajustar la fecha final para incluir todo el día
if ($fecha_final) {
    $fecha_final = date('Y-m-d', strtotime($fecha_final));
}
// Construir la consulta SQL
$sql = "SELECT * FROM reportes_entradas WHERE 1=1";
if ($fecha_inicio && $fecha_final) {
    $sql .= " AND fecha BETWEEN '$fecha_inicio' AND '$fecha_final'";
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
    <title>Reportes de entrada y salida</title>
</head>
<body class="container-body">
<header class="header-main">
        <div class="header-systemhelp">
        <p class="titulo-systemhelp">Reportes</p>
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


<div class="formulario-filtro-systemhelp">
<form action="reportes.php" method="POST" class="">
            
        <p class="texto-systemhelp">Desde</p>
        <input type="date" name="fecha_inicio" id="fecha_inicio" class="" required>
        <p class="texto-systemhelp">Hasta</p>
        <input type="date" name="fecha_final" id="fecha_final" class="" required>
                
        </div>
        <button type="submit" name="btn" value="Buscar" class="formulario-btn-systemhelp">Buscar</button>
            
</form>
    <section class="table-reportes">
    <table>
        <tr>
            <th>Número</th>
            <th>CI</th>
            <th>Fecha Entrada</th>
            <th>Fecha Salida</th>
        </tr>
        <?php 
            while($mostrar = mysqli_fetch_array($consulta)){
        ?>
        <tr>
            <td><?php echo $mostrar['id']?></td>
            <td><?php echo $mostrar['ci']?></td>
            <td><?php echo $mostrar['fecha_entrada']?></td>
            <td><?php if ($mostrar['fecha_salida'] == '0000-00-00 00:00:00'){echo "En línea";} else{echo $mostrar['fecha_salida'];}?></td>
        </tr>
        <?php 
            }
        ?>
    </table>
    </section>
</body>
<script src="../js/verificar_sesiones.js"></script>
</html>