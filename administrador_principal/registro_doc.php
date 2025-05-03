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
    <link rel="stylesheet" href="../estilos/styleindex.css?v=<?php echo time();?>">
</head>
<header class="header-main">
        <div class="header-systemhelp">
        <p class="titulo-systemhelp">Registro de documentos</p>
        <nav class="menu-systemhelp">
            <ul>
            <li><a href="#">Usuario</a>
                <ul>
                  <li><a href="../control_general/logout.php">Cerrar Sesión</a></li>
                </ul>
              <li><a href="registro_doc_list.php">Volver Atras</a></li>
              </li>
            </ul>
          </nav>
        </div>
    </header>
<body class="container-body">
    <form method="POST" class="formulario-newhelp">
    <p class="titulo-index">Elige tu formulario</p>
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