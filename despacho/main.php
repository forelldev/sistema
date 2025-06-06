<?php 
    require_once("../control_general/sesionOut.php");
// En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
require_once("control/validar_rol.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/styleindex.css">
    <title>Principal</title>
</head>
<body class="container-body">
    <header class="header-main">
        <h1 class="main-h1">Sistema de Solicitud de Ayudas</h1>
        <div class="infousuario-main">
            <p>Rol: Despacho
            </p>
            </div>
    </header>
    <nav class="menu-main">
            <ul>
                <li><a href="#">☰ Menú</a>
              <ul>
              <li><a href="system_help.php">📋 Solicitud de Ayudas</a></li>
              <li><a href="help_despacho_list.php">📋 Solicitudes de Despacho</a></li>
              </ul>
              </li>

              <li><a href="#">👤 Usuario</a>
                <ul>
                  <li><a href="configuracion_user.php">⚙️ Configuración de Usuario</a></li>
                </ul>
                <li><a href="../control_general/logout.php">🚪 Cerrar Sesión</a></li>
              </li>
            </ul>
          </nav>
    <main class="main-descripcion">
    <div class="main-texto">
        <h2>Descripción del Programa</h2>
        <p>Este sistema permite gestionar solicitudes de ayuda de manera eficiente, proporcionando herramientas para la administración de usuarios, generación de reportes y estadísticas. Además, facilita la visualización de solicitudes pendientes y su estado, permitiendo a los administradores priorizar y atender las solicitudes de manera oportuna. Con una interfaz intuitiva, los usuarios pueden navegar fácilmente por las diferentes secciones del sistema, como la gestión de usuarios, la configuración de perfiles y la consulta de datos relevantes para la toma de decisiones estratégicas.</p>
    </div>
    <div class="main-imagen">
        <img src="../img/unnamed.gif" alt="Descripción del Programa">
    </div>
</main>
<section class="main-updates">
    <div class="updates-texto">
        <h2>¿Qué hay de nuevo?</h2>
        <ul>
            <li>✔️ Se agregó la funcionalidad para marcar solicitudes como vistas.</li>
            <li>✔️ Mejoras en la interfaz de usuario para una navegación más intuitiva.</li>
            <li>✔️ Optimización en las consultas a la base de datos para un mejor rendimiento.</li>
            <li>✔️ Corrección de errores menores en la gestión de usuarios.</li>
            <li>✔️ Nuevas estadísticas disponibles en la sección de reportes.</li>
        </ul>
    </div>
</section>
</body>
<script src="../js/verificar_sesiones.js"></script>
</html>