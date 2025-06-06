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
    <title>Ver detalles</title>
</head>
<body class="container-body">
<header class="header-main">
        <div class="header-systemhelp">
        <p class="titulo-systemhelp">Recuperar documento</p>
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
    <section class="table-systemhelp">
    <table>
        <tr>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Razón de la invalidación</th>
        </tr>
        <tr>
            <td><?php echo $mostrar['descripcion'] ?></td>
            <td><?php echo $mostrar['estado'] ?></td>
            <td><?php echo $mostrar['razon_invalid'] ?></td>
            <td><a href="./control/invalid_act.php?id_doc=<?php echo $mostrar['id_doc']?>" class="botonaprobado-systemhelp">Recuperar documento</a></td>
        </tr>
    </table>
    </section>
</body>
<script src="../js/verificar_sesiones.js"></script>
</html>