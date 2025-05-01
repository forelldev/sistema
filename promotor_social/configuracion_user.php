<?php 
    require_once("../control_general/conexion.php");
    require_once("../control_general/sesionOut.php");
    // En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
    require_once("control/validar_rol.php");
    require_once("control/configuracion_user_script.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/styleindex.css">
    <title>Configuración de usuario</title>
</head>
<body class="container-body">
<header class="header-main">
        <div class="header-systemhelp">
        <p class="titulo-systemhelp">Edita tu cuenta</p>
        <nav class="menu-systemhelp">
            <ul>
              
              <li><a href="">Usuario</a>
                <ul>
                  <li><a href="../control_general/logout.php">Cerrar Sesión</a></li>
                </ul>
              </li>
              <li><a href="main.php">Volver atrás</a></li>
            </ul>
          </nav>
        </div>
        
    </header>

    <form method="POST" class="formulario-configuracionuser">
        <p class="titulo-index">Edita tu cuenta</p>
        <label for="ci" class="label-configuracionuser">Cédula</label>
        <input type="text" name="ci" value="<?php echo $mostrar['ci'] ?>" class="input-configuracionuser" required>
        <label for="contraseña" class="label-configuracionuser">Contraseña</label>
        <input type="text" name="contraseña" value="<?php echo $mostrar['contraseña'] ?>" class="input-configuracionuser" required>
        <button type="submit" name="btn" class="button-configuracionuser">Enviar</button>
        <?php require_once("control/config_user.php"); ?>
    </form>
</body>
<script src="../js/verificar_sesiones.js"></script>
</html>