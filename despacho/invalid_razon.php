<?php
require_once("../control_general/sesionOut.php");
// En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
require_once("control/validar_rol.php");
require_once("control/invalid_razon_script.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razón por la cual se invalida</title>
</head>
<body>
    <h1>Porque razon invalidará esta solicitud?</h1>
    <form method="POST">
        <label for="razon">Razón: </label>
        <input type="text" name="razon" id="razon" placeholder="Escriba la razón" required>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" name="btn" value="Enviar">
    </form>
</body>
</html>