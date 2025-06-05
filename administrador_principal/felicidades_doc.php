<?php 
require_once("../control_general/sesionOut.php");
// En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
require_once("control/validar_rol.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/styleindex.css?v=<?php echo time();?>">
    <title>Felicitaciones</title>
</head>
<body class="container-body">
<header class="header-main">
        <div class="header-systemhelp">
        <p class="titulo-systemhelp">¡Registro exitoso!</p>
        <nav class="menu-systemhelp">
            <ul>
                <li><a href="">Usuario</a>
                <ul>
                    <li><a href="../control_general/logout.php">Cerrar Sesión</a></li>
                </ul>
                </li>
                <li><a href="registro_doc_list.php">Volver atrás</a></li>
            </ul>
        </nav>
        </div>
    </header>
    <section class="section-felicidadesnewuser">
    <h1>¡Felicidades! tu documento ha sido registrado con éxito</h1>
    <a href="registro_doc_list.php">Volver</a>
    </section>
</body>
</html>