<?php 
include(".././control general/conexion.php");
include("../control general/sesionOut.php");
// En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
include("control/validar_rol.php");
$consulta = $conexion->query("SELECT * FROM usuarios");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/styleindex.css">
    <title>Lista de Usuarios</title>
</head>
<body class="container-body">
<header class="header-main">
        <div class="header-systemhelp">
        <p class="titulo-systemhelp">Lista de usuarios</p>
        <nav class="menu-systemhelp">
            <ul>
                <li><a href="">Usuario</a>
                <ul>
                    <li><a href=".././control general/logout.php">Cerrar Sesión</a></li>
                </ul>
                </li>
                <li><a href="main.php">Volver atrás</a></li>
            </ul>
        </nav>
        </div>
</header>
    <section class="table-reportes">
    <table>
        <tr>
            <th>CI</th>
            <th>Rango</th>
            <th>Contraseña</th>
            <th>Cambio de rol</th>
        </tr>
        <?php while($mostrar = mysqli_fetch_array($consulta)){ ?>
        <tr>
            <td><?php echo $mostrar['ci']?></td>
            <td><?php if($mostrar['rango'] == 0){
                            echo "Secretaria de oficina";
                        }
                        else if ($mostrar['rango'] == 1){
                            echo "Despacho";
                        }
                        else if ($mostrar['rango'] == 2){
                            echo "Administrador Secundario";
                        }
                        else if ($mostrar['rango'] == 3){
                            echo "Administrador";
                        };?></td>
            <td><?php echo $mostrar['contraseña']?></td>
            <td><a href="configurar_rol.php?id=<?php echo $mostrar['ci']?>" class="botonaprobado-systemhelp">Cambiar Rol</a></td>
        </tr>
        <?php } ?>
    </table>
    </section>
</body>
<script src="../js/verificar_sesiones.js"></script>
</html>