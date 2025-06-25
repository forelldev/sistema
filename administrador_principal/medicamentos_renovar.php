<?php
require_once("../control_general/conexion.php"); 
require_once("../control_general/sesionOut.php");
require_once("control/validar_rol.php");
$id_doc = isset($_GET['id_doc']) ? $_GET['id_doc'] : ''; // Evita "undefined"
if (!empty($id_doc)) {
    $cons = $conexion->query("SELECT * FROM system_help WHERE id_doc = '$id_doc'");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicamentos</title>
    <link rel="stylesheet" href="../estilos/styleindex.css">
</head>
<body>
    <!-- <h1>Se enviará primero un gmail a ver si el cliente quiere renovarla, en caso de que no, no será renovada en caso de que diga que si será renovada automaticamente: </h1> -->
     <h1>Seguro quiere renovar la solicitud? se darán 5 días más y se le notificará nuevamente!</h1>
    <a href="control/email.php?id_doc=<?php echo $id_doc ?>">Confirmar</a>
    <a href="system_help.php">Volver</a>
</body>
</html>