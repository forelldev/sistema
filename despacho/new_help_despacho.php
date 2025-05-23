<?php 
require_once("../control_general/sesionOut.php");
// En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
require_once("control/validar_rol.php");
require_once("control/new_help_despacho_script.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de ayuda despacho</title>
</head>
<body>
    <a href="help_despacho_list.php">Volver</a>
    <form method="POST">
        <label for="nombre">Nombre del solicitante: </label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre del solicitante" required>

        <label for="apellido">Apellido del solicitante: </label>
        <input type="text" name="apellido" id="apellido" placeholder="Apellido del solicitante" required>

        <label for="ci">Cédula del solicitante: </label>
        <input type="text" name="ci" id="ci" placeholder="Cédula de identidad del solicitante" required oninput="this.value = this.value.replace(/[^0-9]/g, '')">

        <label for="telefono">Teléfono del solicitante: </label>
        <input type="text" name="telefono" id="telefono" placeholder="Teléfono del solicitante" required oninput="this.value = this.value.replace(/[^0-9]/g, '')">

    
        <label for="direccion">Dirección: </label>
        <input type="text" name="direccion" id="direccion" placeholder="Dirección" required>

        <label for="asunto">Asunto del documento: </label>
        <input type="text" name="asunto" id="asunto" placeholder="Asunto del documento" required>
        
        <input type="submit" name="btn" id="btn" value="Enviar">
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