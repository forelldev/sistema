<?php 
require_once("../control_general/sesionOut.php");
require_once("control/validar_rol.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/styleindex.css?v=<?php echo time();?>">
    <title>Registro</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Librería jQuery -->
</head>
<body class="container-body">
<header class="header-main">
    <div class="header-systemhelp">
        <p class="titulo-systemhelp">Registro de usuario</p>
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

<form class="formulario-configuracionuser" id="form">
    <p class="titulo-index">Registro de usuario</p>
    <label for="nombre" class="label-configuracionuser">Nombre</label>
    <input type="text" name="nombre" placeholder="Nombre" class="input-configuracionuser" required>
    <label for="apellido" class="label-configuracionuser">Apellido</label>
    <input type="text" name="apellido" placeholder="Apellido" class="input-configuracionuser" required>
    <label for="ci" class="label-configuracionuser">Cédula</label>
    <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" name="ci" placeholder="Cedula" class="input-configuracionuser" required>
    <label for="contraseña" class="label-configuracionuser">Contraseña</label>
    <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña" class="input-configuracionuser" required>
    <label for="contraseña_repe" class="label-configuracionuser">Repetir Contraseña</label>
    <input type="password" id="contraseña_repe" name="contraseña_repe" placeholder="Contraseña" class="input-configuracionuser" required>
    <label for="rango" class="label-configuracionuser">Rango</label>
    <select name="rango" class="input-configuracionuser" required>
        <option value="3">Administrador</option>
        <option value="2">Administrador Secundario</option>
        <option value="1">Despacho</option>
        <option value="0">Secretaria de oficina</option>
    </select>
    <button type="button" class="button-configuracionuser" id="submitBtn">Enviar</button>
</form>

<div id="message" style="margin-top: 20px; text-align: center; color: red;"></div> <!-- Mensaje de respuesta -->
</body>
<script src="../js/verificar_sesiones.js"></script>
<script src="../js/registrar_ajax.js"></script>
</html>
