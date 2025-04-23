<?php
require_once("../control_general/conexion.php"); 
require_once("../control_general/sesionOut.php");
// En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
require_once("control/validar_rol.php");
require_once("control/system_help_script.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/styleindex.css">
    <title>Proceso de solicitud de ayudas</title>
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
              <li><a href="new_help.php">Rellenar Formulario</a></li>
              <li><a href="system_help_list.php">Ver todos los documentos</a></li>
            </ul>
          </nav>
        </div>
        
    </header>

    <div class="formulario-filtro-systemhelp">
    <form action="system_help.php" method="POST" >
        <p class="texto-systemhelp">Desde</p>
        <input type="date" name="fecha_inicio" value="<?php echo $fecha_inicio; ?>" required>
        <p class="texto-systemhelp">Hasta</p>
        <input type="date" name="fecha_final" value="<?php echo $fecha_final; ?>" required>
        </div>
        <button type="submit" name="btn" value="Filtrar" class="formulario-btn-systemhelp">Filtrar</button>
    </form>

    <section class="table-systemhelp">
    <table>
    <tr>
            <th>Título</th>
            <th>Nombres y Apellidos</th>
            <th>Estado</th>
            <th>Fecha de registro</th>
            <th>Promotor Social</th>
            <th>Remitente</th>
            <th>Observaciones</th>
            <th>Aprobar</th>
            <th>No aprobar</th>
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
            <td><a href="<?php if($mostrar['estado'] == "En Proceso 1/3"){ echo "./control/aprobar_proceso2.php?id_doc=".$mostrar['id_doc'];}else if($mostrar['estado'] == "Documento inválido"){echo "details.php?id_doc=".$mostrar['id_doc'];}?>" class="botonaprobado-systemhelp"> 
            <?php if($mostrar['estado'] == "En Proceso 1/3"){ 
                    echo "Enviar a Administración";}else if($mostrar['estado'] == "Documento inválido"){echo "Ver detalles";}?></a></td>
            <?php if($mostrar['estado'] !== "Documento inválido"){ ?>
            <td><a href="dar_invalido.php?id_doc=<?php echo $mostrar['id_doc']?>" class="botoninvalido-systemhelp">Dar inválido el documento</a></td>
            <?php }?>
        </tr>
        <?php } ?>
        
    </table>
    </section>
</body>
<script src="../js/verificar_sesiones.js"></script>
</html>