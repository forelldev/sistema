<?php 
require_once("../control_general/sesionOut.php");
// En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
require_once("control/validar_rol.php");
require_once("control/registro_doc_script.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de documentos</title>
    <link rel="stylesheet" href="../css/solicitud.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../css/registro.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../font/css/all.css?v=<?php echo time();?>">
</head>

<body class="solicitud-body">
  <header class="header">
        <div class="titulo-header">Registro de documento</div>
        <div class="header-right">
            <a href="main.php"><button class="nav-btn"><i class="fa fa-home"></i> <span>Inicio</span></button></a>
            <button class="nav-btn"><i class="fa fa-user"></i> <span>Usuario</span></button>
            <a href="registro_doc_list.php"><button class="nav-btn"><i class="fa fa-arrow-left"></i> <span>Regresar</span></button></a>
        </div>
    </header>
    <form method="POST" class="formulario-ayuda">
    <h2><i class="fa fa-file"></i> Formulario</h2>
    <div class="titulo-seccion"><i class="fa fa-"></i> Elije tu formulario</div>
        <label for="tipo_doc">Tipo de documento: </label>
        <select name="tipo_doc" id="tipo_doc" required>
            <option value="Consulta de Soltería">Consulta de Soltería</option>
            <option value="Consulta de buena conducta">Consulta de buena conducta</option>
        </select>

        <label for="nombre">Nombre del solicitante: </label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre del solicitante" required>

        <label for="apellido">Apellido del solicitante: </label>
        <input type="text" name="apellido" id="apellido" placeholder="Apellido del solicitante" required>

        <label for="ci">Cédula de identidad del solicitante: </label>
        <input type="text" name="ci" id="ci" placeholder="Cédula de identidad del solicitante" required oninput="this.value = this.value.replace(/[^0-9]/g, '')">

        <label for="asunto">Asunto del documento: </label>
        <input type="text" name="asunto" id="asunto" placeholder="Asunto del documento" required>
        
        <input type="submit" name="btn" class="boton-newhelp">
    </form>
</body>
</html>