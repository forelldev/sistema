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
    <link rel="stylesheet" href="../estilos/styleindex.css">
    <title>Formulario de ayuda</title>
</head>
<body class="container-body">
<header class="header-main">
        <div class="header-systemhelp">
        <p class="titulo-systemhelp">Formulario de la solicitud de ayudas</p>
        <nav class="menu-systemhelp">
            <ul>
              <li><a href="main.php">Inicio</a></li>
              <li><a href="">Usuario</a>
                <ul>
                  <li><a href=".././control general/logout.php">Cerrar Sesión</a></li>
                </ul>
              </li>
              <li><a href="system_help_list.php">Ver todos los documentos</a></li>
              <li><a href="system_help.php">Volver atrás</a></li>
            </ul>
          </nav>
        </div>
        
    </header>

    <form method="POST" class="formulario-newhelp">
        <p class="titulo-index">Formulario</p>
        <input type="text" name="titulo" class="input-newhelp" placeholder="Titulo">
        <button type="submit" name="btn" class="boton-newhelp">Enviar</button>
        <?php include("./control/new_help().php");?>
    </form>
</body>
<script src="../js/verificar_sesiones.js"></script>
</html>