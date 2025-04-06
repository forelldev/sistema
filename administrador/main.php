<?php
include("../control general/sesionOut.php");
// En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
include("control/validar_rol.php");
include("../control general/conexion.php");

// Consulta para seleccionar los registros y contar los no vistos
$stmt = $conexion->prepare("
    SELECT *, 
           (SELECT COUNT(*) FROM system_help WHERE visto = 0) AS no_vistos 
    FROM system_help 
    ORDER BY visto ASC, fecha_solicitud DESC 
    LIMIT 20
");
$stmt->execute();
$resultado = $stmt->get_result();
$numeroFilas = 0;

if ($fila = $resultado->fetch_assoc()) {
    $numeroFilas = $fila['no_vistos'];
    $resultado->data_seek(0); // Reiniciar el puntero para recorrer los resultados.
}
$stmt->close();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data['action']) && $data['action'] === 'mark_as_read') {
        $stmt = $conexion->prepare("UPDATE system_help SET visto = 1 WHERE visto = 0");
        if ($stmt) {
            $stmt->execute();
            $stmt->close();
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "error" => $conexion->error]);
        }
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/styleindex.css?v=<?php echo time();?>">
    <input id="numeroFilas" type="hidden" value="<?php echo $numeroFilas ?>">
    <title>Principal</title>
</head>
<body class="container-body">

<header class="header-main">
<div class="header-systemhelp">
        <nav class="menu-main">
            <ul>
              <li><a href="system_help.php">Solicitud de Ayudas</a></li>
              
              <li><a href="list_users.php">Lista de usuarios</a></li>
              <li><a href="reportes.php">Reportes</a></li>
              <li><a href="estadisticas.php">Estadísticas</a></li>
              <li><a href="estadisticas_entradas.php">Estadísticas de Entradas</a></li>
              <li><a href="#">Usuario</a>
                <ul>
                  <li><a href="registro.php">Registrar Nueva Persona</a></li>
                  <li><a href="configuracion_user.php">Configuración de Usuario</a></li>
                  <li><a href=".././control general/logout.php">Cerrar Sesión</a></li>
                </ul>
              </li>
            </ul>
          </nav>
</div>
        <div class="infousuario-main">
            <p>Rol: Administrador
            </p>
        </div>
</header>
<div class="notis-main"> 
    <p class="noti-main" id="noti-main"><?php echo $numeroFilas > 0 ? "🔔" : "🔕"; ?></p>
</div>
<ul class="barra-main" id="barra-main">
    <?php 
    while ($mostrar = $resultado->fetch_assoc()) {
        if ($mostrar['visto'] == 0) {
            echo "<li class='li'><a href='#' class='li-main-novisto'>".$mostrar['titulo']."</a></li>";
        } else {
            echo "<li class='li'><a href='#' class='li-main-visto'>".$mostrar['titulo']."</a></li>";
        }
    }
    ?>
</ul>
<main class="main-content">
        <section class="section-main">
            <h1>Bienvenido al Sistema de Solicitud de Ayudas</h1>
            <p>Utilice el menú de arriba para navegar por las diferentes secciones del sistema.</p>
        </section>
        <section class="section-main">
            <h2>Últimas Noticias</h2>
            <ul>
                <li>Actualización del sistema realizada el 13/3/2025.</li>
                <li>Nuevas funcionalidades añadidas para mejorar la experiencia del usuario.</li>
                <li>Recuerde actualizar su perfil en la sección de configuración de usuario.</li>
            </ul>
        </section>
        <section class="section-main">
            <h2>Características del Sistema</h2>
            <ul>
                <li>Gestión de solicitudes de ayuda de manera eficiente y rápida.</li>
                <li>Interfaz amigable y fácil de usar.</li>
                <li>Acceso seguro y protegido a través de validación de sesión.</li>
                <li>Configuración personalizada del perfil de usuario.</li>
            </ul>
        </section>
    </main>
</body>
<script src="../js/notification.js"></script>
<script src="../js/verificar_sesiones.js"></script>
</html>