<?php 
require_once(".././control_general/conexion.php");
require_once("../control_general/sesionOut.php");
// En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
require_once("control/validar_rol.php");
$id_doc = $_GET['id_doc'];
$consulta = $conexion->query("SELECT * FROM system_help WHERE id_doc = '$id_doc'");
$mostrar = mysqli_fetch_array($consulta);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/styleindex.css">
    <title>Dar inválido el documento</title>
</head>
<body class="container-body">
<header class="header-main">
        <div class="header-systemhelp">
        <p class="titulo-systemhelp">Dar invalido el documento</p>
        <nav class="menu-systemhelp">
            <ul>
              
              <li><a href="">Usuario</a>
                <ul>
                  <li><a href="../control_general/logout.php">Cerrar Sesión</a></li>
                </ul>
              </li>
              <li><a href="system_help.php">Volver atrás</a></li>
            </ul>
          </nav>
        </div>
        
    </header>

    <form method="POST" class="formulario-darinvalido">
        <p class="titulo-darinvalido">Invalida tu documento</p>
        <label for="estado" class="label-darinvalido">Titulo</label>
        <input type="text" name="estado" placeholder="Estado" value="<?php echo $mostrar['descripcion']; ?>" class="input-darinvalido" readonly>
        <label for="descripcion" class="label-darinvalido">¿Por qué es invalido?</label>
        <input type="text" name="descripcion" placeholder="Escriba porque es inválido" class="input-darinvalido" required>
        <button type="submit" value="Dar inválido" name="btn" class="button-darinvalido">Dar Invalido</button>
        <input type="hidden" value="<?php echo $mostrar['id_doc']; ?>" name="id_doc">
        <?php include("control/dar_invalido_script.php")?>
    </form>
</body>
<script src="../js/verificar_sesiones.js"></script>
</html>