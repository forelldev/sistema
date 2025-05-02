<?php
require_once("../control_general/conexion.php"); 
require_once("../control_general/sesionOut.php");
// En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
require_once("control/validar_rol.php");
require_once("control/system_help_list_script.php")
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proceso de solicitud de ayudas</title>
    <link rel="stylesheet" href="../estilos/styleindex.css">
</head>
<body class="container-body">
<header class="header-main">
        <div class="header-systemhelp">
        <p class="titulo-systemhelp">Sistema de solicitud de ayudas</p>
        <nav class="menu-systemhelp">
            <ul>
              <li><a href="main.php">Inicio</a></li>
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
    <div class="formulario-filtro-systemhelplist">
    <form action="system_help.php" method="POST">
        <p class="texto-systemhelp">Desde</p>
        <input type="date" name="fecha_inicio" value="<?php echo $fecha_inicio; ?>" required>
        <p class="texto-systemhelp">Hasta</p>
        <input type="date" name="fecha_final" value="<?php echo $fecha_final; ?>" required>
        <select name="estado">
            <option value="">Seleccione un estado</option>
            <option value="En espera del documento físico para ser procesado 0/3" <?php if ($estado == "En espera del documento físico para ser procesado 0/3") echo 'selected'; ?>>En espera del documento físico para ser procesado 0/3</option>
            <option value="En Proceso 1/3" <?php if ($estado == "En Proceso 1/3") echo 'selected'; ?>>En Proceso 1/3</option>
            <option value="En Proceso 2/3" <?php if ($estado == "En Proceso 2/3") echo 'selected'; ?>>En Proceso 2/3</option>
            <option value="Proceso Finalizado 3/3" <?php if ($estado == "Proceso Finalizado 3/3") echo 'selected'; ?>>Proceso Finalizado 3/3</option>
        </select>
        </div>
    <button type="submit" name="btn" value="Filtrar" class="formulario-btn-systemhelp">Filtrar</button>
    </form>
    <section class="table-systemhelplist">
    <table>
    <tr>
            <th>Título</th>
            <th>Nombres y Apellidos</th>
            <th>Estado</th>
            <th>Fecha de registro</th>
            <th>Promotor Social</th>
            <th>Remitente</th>
            <th>Observaciones</th>
        </tr>
        <?php while($mostrar = mysqli_fetch_array($consulta)){ ?>
        <tr>
            <td><?php echo $mostrar['titulo'] ?></td>
            <td><?php echo $mostrar['nombres_apellidos'] ?></td>
            <td><?php echo $mostrar['estado'] ?></td>
            <td><?php echo $mostrar['fecha_solicitud'] ?></td>
            <td><?php echo $mostrar['promotor'] ?></td>
            <td><?php echo $mostrar['remitente'] ?></td>
            <td><?php echo $mostrar['observacion'] ?></td>
            <?php if($mostrar['estado'] == 'Documento inválido'){?>
              <td><a href="details.php?id_doc=<?php echo $mostrar['id_doc']; ?>">Ver Detalles</a></td>
            <?php } ?>
        </tr>
        <?php } ?>
    </table>
    </section>
</body>
<script src="../js/verificar_sesiones.js"></script>
</html>