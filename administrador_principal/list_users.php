<?php 
require_once(".././control_general/conexion.php");
require_once("../control_general/sesionOut.php");
require_once("control/validar_rol.php");
$consulta = $conexion->query("SELECT * FROM user INNER JOIN user_info ON user.ci = user_info.ci");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de usuarios</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/solicitud.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../css/registro.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../font/css/all.css?v=<?php echo time();?>">
</head>
<body class="solicitud-body">
  <header class="header">
    <div class="titulo-header">Usuarios registrados</div>
    <div class="header-right">
      <a href="registro.php"><button class="nav-btn"><i class="fa fa-user-plus"></i> Nuevo usuario</button></a>
      <a href="main.php"><button class="nav-btn"><i class="fa fa-arrow-left"></i> Volver</button></a>
    </div>
  </header>
  <main>
    <section class="usuarios-lista">
      <?php while($mostrar = mysqli_fetch_array($consulta)){ 
        // Rol
        switch($mostrar['rango']){
          case 0: $rol = "Promotor Social"; break;
          case 1: $rol = "Despacho"; break;
          case 2: $rol = "Administración"; break;
          case 3: $rol = "Admin"; break;
          default: $rol = "Desconocido";
        }
        // Estado
        $activo = ($mostrar['sesion'] === 'True') ? "Activo" : "Inactivo";
        $estadoClass = ($mostrar['sesion'] === 'True') ? "usuario-estado" : "usuario-estado inactivo";
      ?>
      <div class="usuario-card">
        <div class="usuario-info">
          <span class="usuario-nombre"><i class="fa fa-user"></i> <?php echo htmlspecialchars($mostrar['nombre'] . " " . $mostrar['apellido']); ?></span>
          <span class="usuario-rol"><?php echo $rol; ?></span>
          <span class="<?php echo $estadoClass; ?>"><?php echo $activo; ?></span>
        </div>
        <div class="usuario-actions">
          <a href="configuracion_user.php?id=<?php echo urlencode($mostrar['ci']); ?>"><button class="usuario-btn"><i class="fa fa-cog"></i> Configurar</button></a>
          <a href="eliminar_usuario.php?id=<?php echo urlencode($mostrar['ci']); ?>" onclick="return confirm('¿Seguro que desea eliminar este usuario?');"><button class="usuario-btn eliminar"><i class="fa fa-trash"></i> Eliminar</button></a>
        </div>
      </div>
      <?php } ?>
    </section>
  </main>
</body>
</html>