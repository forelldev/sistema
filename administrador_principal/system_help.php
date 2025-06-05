<?php
require_once("../control_general/conexion.php"); 
require_once("../control_general/sesionOut.php");
require_once("control/system_help_logic.php");
require_once("control/validar_rol.php");
require_once("control/validacion_medicamentos.php");
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
                  <li><a href="../control_general/logout.php">Cerrar Sesión</a></li>
                </ul>
              </li>
              <li><a href="new_help.php">Rellenar Formulario</a></li>
            </ul>
            <div class="notis-main"> 
                    <?php 
                    $mensaje_noti = ""; // Inicializamos vacío
                    $hay_alertas = false; // Variable para verificar si hay alertas

            if ($consulta_help && $consulta_help->num_rows > 0) {
                while ($fila_help = $consulta_help->fetch_assoc()) {
                    $fecha_solicitud = new DateTime($fila_help['fecha_solicitud']);
                    $dias_transcurridos = $fecha_solicitud->diff($hoy)->days;

                if ($dias_transcurridos > 5 && in_array($fila_help['estado'], ['0/3', '1/3', '2/3'])) {
                    $hay_alertas = true;
                    $mensaje_noti .= "<li>⚠️ La solicitud con ID " . $fila_help['id'] . " lleva más de 5 días en estado '" . $fila_help['estado'] . "'</li>";
                }
            }
            } else {
                $mensaje_noti = "<li>No hay solicitudes registradas para medicamentos.</li>";
            }

                    ?>
    <!-- Mostrar icono de notificación -->
    <p class="noti-main" id="noti-main"><?php echo $hay_alertas ? "🔔" : "🔕"; ?></p>
    </div>
    <ul class="barra-main" id="barra-main">
        <?php echo $mensaje_noti; // Mostrar alertas en la barra ?>
    </ul>
          </nav>
        </div>
    </header>
    <div class="formulario-filtro-systemhelplist">
    <form action="system_help.php" method="POST">
        <p class="texto-systemhelp">Desde</p>
        <input type="date" name="fecha_inicio" value="<?php echo $fecha_inicio; ?>" required>
        <p class="texto-systemhelp">Hasta</p>
        <input type="date" name="fecha_final" value="<?php echo $fecha_fin; ?>" required>
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
    <section class="table-systemhelp">
    <table>
        <tr>
            <th>Descripción</th>
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
            <td><?php echo $mostrar['descripcion'] ?></td>
            <td><?php echo $mostrar['nombres_apellidos'] ?></td>
            <td><?php echo $mostrar['estado'] ?></td>
            <td><?php echo $mostrar['fecha_solicitud'] ?></td>
            <td><?php echo $mostrar['promotor'] ?></td>
            <td><?php echo $mostrar['remitente'] ?></td>
            <td><?php echo $mostrar['observacion'] ?></td>
            <td><a class="botonaprobado-systemhelp" href="<?php if($mostrar['estado'] == "En espera del documento físico para ser procesado 0/3"){ 
                                echo "./control/aprobar_proceso1.php?id_doc=".$mostrar['id_doc'];}
                                else if($mostrar['estado'] == "En Proceso 1/3"){
                                echo "./control/aprobar_proceso2.php?id_doc=".$mostrar['id_doc'];
                                 }
                                else if($mostrar['estado'] == "En Proceso 2/3"){
                                echo "./control/aprobar_proceso3.php?id_doc=".$mostrar['id_doc'];
                                }
                                else if($mostrar['estado'] == "Proceso Finalizado 3/3"){
                                    echo "./control/reiniciar_proceso.php?id_doc=".$mostrar['id_doc'];
                                    }
                                else if($mostrar['estado'] == "Documento inválido"){
                                echo "details.php?id_doc=".$mostrar['id_doc'];
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
            <td><a href="dar_invalido.php?id_doc=<?php echo $mostrar['id_doc']?>" class="botoninvalido-systemhelp">Dar inválido el documento</a></td>
            <?php }?>
        </tr>
        <?php } ?>
    </table>
    </section>
</body>
<script src="../js/verificar_sesiones.js"></script>
</html>