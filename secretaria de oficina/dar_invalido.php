<?php 
include(".././control general/conexion.php");
include(".././control general/session_validar.php");
$id = $_GET['id'];
$consulta = $conexion->query("SELECT * FROM system_help WHERE id = '$id'");
$mostrar = mysqli_fetch_array($consulta);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dar inválido el documento</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="estado" placeholder="Estado" value="<?php echo $mostrar['titulo']?>" readonly>
        <input type="text" name="descripcion" placeholder="Escriba porque es inválido">
        <input type="submit" value="Dar inválido" name="btn">
        <input type="hidden" value="<?php echo $mostrar['id']?>" name="id">
        <?php include("control/dar_invalido().php")?>
    </form>
</body>
</html>