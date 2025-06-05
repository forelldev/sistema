<?php
require_once("../control_general/conexion.php");
require_once("../control_general/sesionOut.php");
// En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
require_once("control/validar_rol.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
</head>
<body>
    <div>
        <a href="categorias_index.php?categoria=Ayudas Técnicas">Ayudas Técnicas</a>
        <a href="categorias_index.php?categoria=Medicamentos">Medicamentos</a>
        <a href="categorias_index.php?categoria=Laboratorio">Laboratorio</a>
        <a href="categorias_index.php?categoria=Enseres">Enseres</a>
    </div>
</body>
</html>