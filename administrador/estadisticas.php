<?php 
include("../control general/sesionOut.php");
// En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
include("control/validar_rol.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../estilos/styleindex.css">
    <title>Estadísticas</title>
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
        <p class="titulo-systemhelp">Estadísticas</p>
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
    <section class="section-estadisticas">
        <h1 class="titulo-estadisticas">Estadísticas de los documentos</h1>
        <p class="descripcion-estadisticas">A continuación se muestra un gráfico con la cantidad de documentos en cada estado.</p>
        <div id="chartdiv"></div>
    </section>
</body>
<!-- Chart code -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="../js/estadisticas_solicitudes.js"></script>
<script src="../js/verificar_sesiones.js"></script>
</html>