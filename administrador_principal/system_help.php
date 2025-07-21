<?php
require_once("../control_general/conexion.php"); 
require_once("../control_general/sesionOut.php");
require_once("control/system_help_logic.php");
require_once("control/validar_rol.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/solicitud.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../css/registro.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../font/css/all.css?v=<?php echo time();?>">
    <title>Proceso de solicitud de ayudas</title>
</head>
<body class="solicitud-body">
    <header class="header">
        <div class="titulo-header">Sistema de solicitud de ayudas</div>
        <div class="header-right">
            <a href="main.php"><button class="nav-btn"><i class="fa fa-home"></i> <span>Inicio</span></button></a>
            <button class="nav-btn"><i class="fa fa-user"></i> <span>Usuario</span></button>
            <a href="new_help.php"><button class="nav-btn principal-btn"><i class="fa fa-plus"></i> <span>Rellenar Formulario</span></button></a>
        </div>
    </header>
    <main>
        <section class="filtros-card">
            <form class="filtros-form" action="system_help.php" method="POST">
                <label>Desde <input type="date" name="fecha_inicio" value="<?php echo $fecha_inicio; ?>"></label>
                <label>Hasta <input type="date" name="fecha_final" value="<?php echo $fecha_final; ?>"></label>
                <select name="estado">
                    <option value="">Seleccione un estado</option>
                    <option value="En espera del documento físico para ser procesado 0/3" <?php if ($estado == "En espera del documento físico para ser procesado 0/3") echo 'selected'; ?>>En espera del documento físico para ser procesado 0/3</option>
                    <option value="En Proceso 1/3" <?php if ($estado == "En Proceso 1/3") echo 'selected'; ?>>En Proceso 1/3</option>
                    <option value="En Proceso 2/3" <?php if ($estado == "En Proceso 2/3") echo 'selected'; ?>>En Proceso 2/3</option>
                    <option value="Proceso Finalizado 3/3" <?php if ($estado == "Proceso Finalizado 3/3") echo 'selected'; ?>>Proceso Finalizado 3/3</option>
                </select>
                <button type="submit" name="btn" value="Filtrar" class="filtrar-btn"><i class="fa fa-filter"></i> <span>Filtrar</span></button>
            </form>
        </section>
        <nav class="filtros-categorias">
            <button class="filtro-btn"><i class="fa fa-clock"></i> Más recientes</button>
            <button class="filtro-btn"><i class="fa fa-clock"></i> Más antiguos</button>
            <button class="filtro-btn"><i class="fa fa-exclamation-circle"></i> Más urgentes</button>
            <button class="filtro-btn"><i class="fa fa-medkit"></i> Medicinas</button>
            <button class="filtro-btn"><i class="fa fa-wheelchair"></i> Ayudas técnicas</button>
            <button class="filtro-btn"><i class="fa fa-flask"></i> Laboratorio</button>
            <button class="filtro-btn"><i class="fa fa-couch"></i> Enseres</button>
        </nav>
        <section class="solicitudes-lista">
            <?php while($mostrar = mysqli_fetch_array($consulta)){ ?>
            <div class="solicitud-card">
                <div class="solicitud-header">
                    <span class="solicitud-estado 
                        <?php
                            if($mostrar['estado'] == 'En espera del documento físico para ser procesado 0/3') echo 'pendiente';
                            else if($mostrar['estado'] == 'En Proceso 1/3') echo 'activo1';
                            else if($mostrar['estado'] == 'En Proceso 2/3') echo 'activo2';
                            else if($mostrar['estado'] == 'Proceso Finalizado 3/3') echo 'activo3';
                            else if($mostrar['estado'] == 'Documento inválido') echo 'invalido';
                        ?>">
                        <?php echo $mostrar['estado']; ?>
                    </span>
                    <span class="solicitud-tipo">Categoría: <?php echo $mostrar['categoria']; ?></span>
                    <span class="solicitud-fecha"><?php echo $mostrar['fecha_solicitud']; ?></span>
                </div>
                <div class="solicitud-info">
                    <h3 class="solicitud-desc"><?php echo $mostrar['descripcion'] ?: 'Sin descripción'; ?></h3>
                    <div><strong>Nombre:</strong> <?php echo $mostrar['nombres_apellidos']; ?></div>
                    <div><strong>Promotor:</strong> <?php echo $mostrar['promotor']; ?></div>
                    <div><strong>Remitente:</strong> <?php echo $mostrar['remitente']; ?></div>
                    <div><strong>Observaciones:</strong> <?php echo $mostrar['observacion']; ?></div>
                    <div><strong>Tipo de ayuda:</strong> <?php echo $mostrar['categoria']; ?></div>
                    <div><strong>Documento:</strong> <a href="#">Ver</a></div>
                </div>
                <div class="solicitud-actions">
                    <a href="<?php
                        if($mostrar['estado'] == 'En espera del documento físico para ser procesado 0/3'){
                            echo "./control/aprobar_proceso1.php?id_doc=".$mostrar['id_doc'];
                        } else if($mostrar['estado'] == 'En Proceso 1/3'){
                            echo "./control/aprobar_proceso2.php?id_doc=".$mostrar['id_doc'];
                        } else if($mostrar['estado'] == 'En Proceso 2/3'){
                            echo "./control/aprobar_proceso3.php?id_doc=".$mostrar['id_doc'];
                        } else if($mostrar['estado'] == 'Proceso Finalizado 3/3'){
                            echo "./control/reiniciar_proceso.php?id_doc=".$mostrar['id_doc'];
                        } else if($mostrar['estado'] == 'Documento inválido'){
                            echo "details.php?id_doc=".$mostrar['id_doc'];
                        }
                    ?>" class="aprobar-btn" title="<?php
                        if($mostrar['estado'] == 'Proceso Finalizado 3/3'){
                            echo 'Reiniciar proceso';
                        } else {
                            echo 'Aprobar';
                        }
                    ?>">
                        <?php if($mostrar['estado'] == 'Proceso Finalizado 3/3'){ ?>
                            <i class="fa fa-undo"></i>
                        <?php } else { ?>
                            <i class="fa fa-check"></i>
                        <?php } ?>
                    </a>
                    <?php if($mostrar['estado'] !== "Documento inválido"){ ?>
                    <a href="dar_invalido.php?id_doc=<?php echo $mostrar['id_doc']?>" class="rechazar-btn" title="Rechazar">
                        <i class="fa fa-times"></i>
                    </a>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </section>
    </main>
</body>
<script src="../js/verificar_sesiones.js"></script>
<script src="js/validacion_medicamentos.js"></script>
</html>