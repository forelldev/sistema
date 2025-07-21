<?php 
    require_once("../control_general/conexion.php");
    require_once("../control_general/sesionOut.php");
    // En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
    require_once("control/validar_rol.php");
    require_once("control/configuracion_user_script.php");
    require_once("control/config_user.php"); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración de usuario</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/solicitud.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../css/registro.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../font/css/all.css?v=<?php echo time();?>">
</head>
<body class="solicitud-body">
  <header class="header">
    <div class="titulo-header">Configuración de usuario</div>
    <div class="header-right">
      <button class="nav-btn"><i class="fa fa-user"></i> Perfil</button>
      <a href="main.php"><button class="nav-btn"><i class="fa fa-arrow-left"></i> Volver</button></a>
    </div>
  </header>
  <main>
    <form class="registro-card form-user" method="POST" autocomplete="off">
      <h2><i class="fa fa-cog"></i> Configuración de usuario</h2>
      <div class="campo-user">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre" required value="<?php echo htmlspecialchars($mostrar['nombre']); ?>">
      </div>
      <div class="campo-user">
        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido" placeholder="Apellido" required value="<?php echo htmlspecialchars($mostrar['apellido']); ?>">
      </div>
      <div class="campo-user">
        <label for="cedula">Cédula</label>
        <input type="text" id="cedula" name="ci" placeholder="Cédula" required pattern="[0-9]+" value="<?php echo htmlspecialchars($mostrar['ci']); ?>">
      </div>
      <div class="campo-user">
        <label for="rol">Rol</label>
        <!-- Se le puede poner disabled cuando sea otro rol -->
        <select id="rol" name="rol" required>
          <option value="Admin" <?php if(isset($mostrar['rol']) && $mostrar['rol']=="Admin") echo "selected"; ?>>Admin</option>
          <option value="Administracion" <?php if(isset($mostrar['rol']) && $mostrar['rol']=="Administracion") echo "selected"; ?>>Administracion</option>
          <option value="Despacho" <?php if(isset($mostrar['rol']) && $mostrar['rol']=="Despacho") echo "selected"; ?>>Despacho</option>
          <option value="Promotor Social" <?php if(isset($mostrar['rol']) && $mostrar['rol']=="Promotor Social") echo "selected"; ?>>Promotor Social</option>
        </select>
        <!-- <small style="color:#888;">El rol no puede ser modificado</small> -->
      </div>
      <div class="campo-user">
        <label for="password">Nueva Contraseña</label>
        <input type="password" id="password" name="password" placeholder="Dejar en blanco si no desea cambiar">
      </div>
      <div class="campo-user">
        <label for="password2">Repetir Nueva Contraseña</label>
        <input type="password" id="password2" name="password2" placeholder="Repetir contraseña">
      </div>
      <button type="submit" name="btn" class="boton-enviar-ayuda"><i class="fa fa-save"></i> Guardar cambios</button>
    </form>
  </main>
</body>
<script src="../js/verificar_sesiones.js"></script>
</html>