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
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../font/css/all.css?v=<?php echo time();?>">
    <title>Principal</title>
</head>
<body class="body-main">
<header class="header">
    <div class="titulo-header">Sistema de Solicitud de Ayudas</div>
    <div class="header-right">
        <div class="rol">Rol: Administrador Principal</div>
        <a href="system_help.php"><button class="nueva-solicitud-btn"><i class="fas fa-plus"></i>Nueva Solicitud</button></a>
        <button class="notificaciones-btn"><i class="fas fa-bell"></i> Notificaciones</button>
</header>
<nav class="navbar" aria-label="Menú principal">
    <div class="dropdown">
        <button class="nav-btn dropdown-toggle" aria-label="Menú" id="menuDropdownBtn">
            <i class="fas fa-bars"></i> Menú
        </button>
        <div class="dropdown-menu" id="menuDropdown">
            <a href="system_help.php"><i class="fas fa-clipboard-list"></i> Solicitud de Ayudas</a>
            <a href="registro_doc_list.php"><i class="fas fa-file-alt"></i> Registro de Documentos</a>
            <a href="registro_actividades.php"><i class="fas fa-tasks"></i> Registro de Actividades</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="nav-btn dropdown-toggle" aria-label="Usuario" id="usuarioDropdownBtn">
            <i class="fas fa-user"></i> Usuario
        </button>
        <div class="dropdown-menu" id="usuarioDropdown">
            <a href="registro.php"><i class="fas fa-user-plus"></i> Registrar Nueva Persona</a>
            <a href="list_users.php"><i class="fas fa-users"></i> Lista de Usuarios</a>
            <a href="configuracion_user.php"><i class="fas fa-cog"></i> Configuración de Usuario</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="nav-btn dropdown-toggle" aria-label="Reportes" id="reportesDropdownBtn">
            <i class="fas fa-chart-bar"></i> Reportes
        </button>
        <div class="dropdown-menu" id="reportesDropdown">
            <a href="reportes.php"><i class="fas fa-chart-bar"></i> Reportes</a>
            <a href="estadisticas.php"><i class="fas fa-chart-line"></i> Estadísticas</a>
            <a href="estadisticas_entradas.php"><i class="fas fa-folder-open"></i> Estadísticas de Entradas</a>
        </div>
    </div>
    <div class="dropdown">
        <a class="nav-btn dropdown-toggle" aria-label="Cerrar" id="cerrarDropdownBtn" href="../control_general/logout.php">
            <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
        </a>
    </div>
    <div class="dropdown">
        <button class="nav-btn dropdown-toggle" aria-label="Ayuda" id="ayudaDropdownBtn">
            <i class="fas fa-question-circle"></i> Ayuda
        </button>
        <div class="dropdown-menu" id="ayudaDropdown">
            <a href="#"><i class="fas fa-book"></i> Manual de Usuario</a>
        </div>
    </div>
</nav>
<main>
        <section class="main-content">
            <div class="card desc-section">
                <h1>Descripción del Programa</h1>
                <p>
                    Este sistema permite gestionar solicitudes de ayuda de manera eficiente, proporcionando herramientas para la administración de usuarios, generación de reportes y estadísticas. Además, facilita la visualización de solicitudes pendientes y su estado, permitiendo a los administradores priorizar y atender las solicitudes de manera oportuna.<br><br>
                    Con una interfaz intuitiva, los usuarios pueden navegar fácilmente por las diferentes secciones del sistema, como la gestión de usuarios, la configuración de perfiles y la consulta de datos relevantes para la toma de decisiones estratégicas.
                </p>
            </div>
            <div class="card img-section">
                <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=400&q=80" alt="Ilustración sistema">
            </div>
        </section>
        <section class="novedades">
            <h2>¿Qué hay de nuevo?</h2>
            <ul>
                <li>Se agregó la funcionalidad para marcar solicitudes como vistas.</li>
                <li>Mejoras en la generación de reportes y estadísticas.</li>
                <li>Optimización de la interfaz para dispositivos móviles.</li>
            </ul>
        </section>
    </main>
</body>
<script src="../js/verificar_sesiones.js"></script>
<script src="../js/dropdown.js"></script>
<script src="../js/notification.js"></script>
</html>