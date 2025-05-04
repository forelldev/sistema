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
    <link rel="stylesheet" href="../estilos/styleindex.css?v=<?php echo time();?>">
</head>
<header class="header-main">
        <div class="header-systemhelp">
        <p class="titulo-systemhelp">Registro de documentos</p>
        <nav class="menu-systemhelp">
            <ul>
              <li><a href="main.php">Inicio</a></li>
              <li><a href="#">Usuario</a>
                <ul>
                  <li><a href="../control_general/logout.php">Cerrar Sesión</a></li>
                </ul>
              </li>
              <li><a href="registro_doc.php">Rellenar Formulario</a></li>
            </ul>
          </nav>
        </div>
    </header>
<body class="container-body">
    
    <table class="table-systemhelp">
    <h1 class="h1-registro-doc">Lista de documentos registrados</h1>
        <tr>
            <th>Tipo de Documento</th>
            <th>CI</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Asunto</th>
            <th>Fecha</th>
        </tr>
        <?php while($mostrar = mysqli_fetch_array($consulta)){

         ?>
        <tr>
            <td><?php echo $mostrar['tipo_doc'] ?></td>
            <td><?php echo $mostrar['ci']  ?></td>
            <td><?php echo $mostrar['nombre']  ?></td>
            <td><?php echo $mostrar['apellido']  ?></td>
            <td><?php echo $mostrar['asunto']  ?></td>
            <td><?php echo $mostrar['fecha']; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>