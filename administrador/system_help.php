<?php
include("../control general/conexion.php"); 
include("../control general/sesionOut.php");
// Verificar si hay filtros aplicados
$fecha_inicio = isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : '';
$fecha_final = isset($_POST['fecha_final']) ? $_POST['fecha_final'] : '';
$estado = isset($_POST['estado']) ? $_POST['estado'] : '';
// Ajustar la fecha final para incluir todo el día
if ($fecha_final) {
    $fecha_final = date('Y-m-d', strtotime($fecha_final));
}
// Construir la consulta SQL
$sql = "SELECT * FROM system_help WHERE 1=1";
if ($fecha_inicio && $fecha_final) {
    $sql .= " AND fecha BETWEEN '$fecha_inicio' AND '$fecha_final'";
}
if ($estado) {
    $sql .= " AND estado = '$estado'";
}
$sql .= " ORDER BY id DESC";
$consulta = $conexion->query($sql);
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
              <li><a href="#">Usuario</a>
                <ul>
                  <li><a href=".././control general/logout.php">Cerrar Sesión</a></li>
                </ul>
              </li>
              <li><a href="new_help.php">Rellenar Formulario</a></li>
            </ul>
          </nav>
        </div>
    </header>
    <div class="formulario-filtro-systemhelplist">
    <form action="system_help.php" method="POST">
        <p class="texto-systemhelp">Desde</p>
        <input type="date" name="fecha_inicio" value="<?php echo $fecha_inicio; ?>">
        <p class="texto-systemhelp">Hasta</p>
        <input type="date" name="fecha_final" value="<?php echo $fecha_final; ?>">
        <select name="estado">
            <option value="">Seleccione un estado</option>
            <option value="En espera del documento físico para ser procesado 1/3" <?php if ($estado == "En espera del documento físico para ser procesado 1/3") echo 'selected'; ?>>En espera del documento físico para ser procesado 1/3</option>
            <option value="En Proceso 2/3" <?php if ($estado == "En Proceso 2/3") echo 'selected'; ?>>En Proceso 2/3</option>
            <option value="Proceso Finalizado 3/3" <?php if ($estado == "Proceso Finalizado 3/3") echo 'selected'; ?>>Proceso Finalizado 3/3</option>
        </select>
    </div>
        <button type="submit" name="btn" value="Filtrar" class="formulario-btn-systemhelp">Filtrar</button>
    </form>
    <section class="table-systemhelp">
    <table>
        <tr>
            <th>Título</th>
            <th>Estado</th>

        </tr>
        <?php while($mostrar = mysqli_fetch_array($consulta)){ ?>
        <tr>
            <td><?php echo $mostrar['titulo'] ?></td>
            <td><?php echo $mostrar['estado'] ?></td>
            <td><a class="botonaprobado-systemhelp" href="<?php if($mostrar['estado'] == "En espera del documento físico para ser procesado 0/3"){ 
                                echo "./control/aprobar_proceso1.php?id=".$mostrar['id'];}
                                else if($mostrar['estado'] == "En Proceso 1/3"){
                                echo "./control/aprobar_proceso2.php?id=".$mostrar['id'];
                                 }
                                else if($mostrar['estado'] == "En Proceso 2/3"){
                                echo "./control/aprobar_proceso3.php?id=".$mostrar['id'];
                                }
                                else if($mostrar['estado'] == "Proceso Finalizado 3/3"){
                                    echo "./control/reiniciar_proceso.php?id=".$mostrar['id'];
                                    }
                                else if($mostrar['estado'] == "Documento inválido"){
                                echo "details.php?id=".$mostrar['id'];
                                }
                                ?>">
                        <?php if($mostrar['estado'] == "En espera del documento físico para ser procesado 0/3"){ 
                                 echo "Aprobar para su procedimiento";
                                }
                                else if($mostrar['estado'] == "En Proceso 1/3"){
                                    echo "Enviar a administracion";
                                }

                                else if($mostrar['estado'] == "En Proceso 2/3"){
                                    echo "Finalizar Proceso";
                                }

                                else if($mostrar['estado'] == "Proceso Finalizado 3/3"){
                                    echo "Reiniciar Proceso (En caso de algún error)";
                                }

                                else if($mostrar['estado'] == "Documento inválido"){
                                    echo "Ver detalles";
                                }?></a></td>
            <?php if($mostrar['estado'] !== "Documento inválido"){ ?>
            <td><a href="dar_invalido.php?id=<?php echo $mostrar['id']?>" class="botoninvalido-systemhelp">Dar inválido el documento</a></td>
            <?php }?>
        </tr>
        <?php } ?>
    </table>
    </section>
</body>
<script src="../js/verificar_sesiones.js"></script>
</html>