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
<body>
    <a href="registro_doc_list.php">Volver</a>
    <form method="POST">
        <label for="tipo_doc" class="formulario-newhelp">Tipo de documento: </label>
        <select name="tipo_doc" id="tipo_doc" required>
            <option value="Consulta de Soltería">Consulta de Soltería</option>
            <option value="Consulta de buena conducta">Consulta de buena conducta</option>
        </select>

        <label for="nombre" class="formulario-newhelp">Nombre del solicitante: </label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre del solicitante" required>

        <label for="apellido" class="formulario-newhelp">Apellido del solicitante: </label>
        <input type="text" name="apellido" id="apellido" placeholder="Apellido del solicitante" required>

        <label for="ci" class="formulario-newhelp">Cédula de identidad del solicitante: </label>
        <input type="text" name="ci" id="ci" placeholder="Cédula de identidad del solicitante" required oninput="this.value = this.value.replace(/[^0-9]/g, '')">

        <label for="asunto" class="formulario-newhelp">Asunto del documento: </label>
        <input type="text" name="asunto" id="asunto" placeholder="Asunto del documento" required>
        
        <input type="submit" name="btn">
    </form>
</body>
<style>
    form{
        display:flex;
        justify-content:center;
        align-items:center;
        flex-direction:column;
    }
</style>
</html>