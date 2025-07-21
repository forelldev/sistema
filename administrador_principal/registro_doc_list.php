<?php 
require_once("../control_general/sesionOut.php");
// En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
require_once("control/validar_rol.php");
require_once("control/registro_doc_list_script.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de registro de documentos</title>
    <link rel="stylesheet" href="../css/solicitud.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../css/registro.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../font/css/all.css?=<?php echo time();?>">
</head>

<body class="solicitud-body">
    <header class="header">
        <div class="titulo-header">Sistema de solicitud de ayudas</div>
        <div class="header-right">
            <a href="main.php"><button class="nav-btn"><i class="fa fa-home"></i> <span>Inicio</span></button></a>
            <button class="nav-btn"><i class="fa fa-user"></i> <span>Usuario</span></button>
            <a href="registro_doc.php"><button class="nav-btn principal-btn"><i class="fa fa-plus"></i> <span>Rellenar Formulario</span></button></a>
        </div>
    </header>
    <main>
    <h2 style="text-align:center; margin: 2rem 0 1.2rem 0;">Lista de documentos registrados</h2>
    <section class="documentos-lista">
      <?php while($mostrar = mysqli_fetch_array($consulta)){ ?>
        <div class="documento-card">
          <div class="documento-header">
            <span class="documento-tipo"><?php echo htmlspecialchars($mostrar['tipo_doc']); ?></span>
            <span class="documento-fecha"><i class="fa fa-calendar"></i> <?php echo htmlspecialchars($mostrar['fecha']); ?></span>
          </div>
          <div class="documento-info">
            <div><strong>CI:</strong> <?php echo htmlspecialchars($mostrar['ci']); ?></div>
            <div><strong>Nombre:</strong> <?php echo htmlspecialchars($mostrar['nombre']); ?></div>
            <div><strong>Apellido:</strong> <?php echo htmlspecialchars($mostrar['apellido']); ?></div>
            <div><strong>Asunto:</strong> <?php echo htmlspecialchars($mostrar['asunto']); ?></div>
          </div>
          <div class="documento-actions">
            <button class="registro-btn"><i class="fa fa-eye"></i> Ver</button>
            <button class="registro-btn"><i class="fa fa-edit"></i> Editar</button>
            <button class="registro-btn eliminar"><i class="fa fa-trash"></i> Eliminar</button>
          </div>
        </div>
      <?php } ?>
    </section>
</body>
</html>