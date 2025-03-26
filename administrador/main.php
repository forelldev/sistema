<?php 
include(".././control general/session_validar.php");
// En caso de qué un rol no perteneciente esté aquí, lo mande a redirigirse
include("control/validar_rol.php");
include("../control general/conexion.php");
    // Consulta para seleccionar los registros con `visto = 0`
$consulta = $conexion->query("SELECT * FROM system_help ORDER BY fecha DESC LIMIT 20");
$consulta2 = $conexion->query("SELECT * FROM system_help WHERE visto = 0 ORDER BY fecha DESC LIMIT 20");
$numeroFilas = $consulta2->num_rows;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificamos si se envió la acción 'mark_as_read' para actualizar las notificaciones
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data['action']) && $data['action'] === 'mark_as_read') {


        if (!$consulta) {
            die(json_encode(["error" => "Error en la consulta SELECT: " . $conexion->error]));
        }

        $ids_actualizados = []; // Array para almacenar los IDs que se actualizaron
        
        // Preparar la consulta UPDATE
        $stmt = $conexion->prepare("UPDATE system_help SET visto = 1 WHERE id = ?");
        if (!$stmt) {
            die(json_encode(["error" => "Error preparando la consulta UPDATE: " . $conexion->error]));
        }

        while ($fila = $consulta->fetch_assoc()) {
            $id = (int) $fila['id']; // Convertir a entero
            $stmt->bind_param("i", $id); // Vincular el parámetro
            $stmt->execute(); // Ejecutar la consulta
            $ids_actualizados[] = $id; // Almacenar el ID actualizado
        }

        $stmt->close(); // Cerrar la consulta preparada

        // Devolver un JSON con los IDs que se actualizaron
        echo json_encode(["success" => true, "ids_actualizados" => $ids_actualizados]);
    } else {
        // Si no se recibe la acción esperada, solo muestra la página
        echo json_encode(["success" => false, "message" => "Acción no válida"]);
    }
} 
    if (!$consulta) {
        die(json_encode(["error" => "Error en la consulta SELECT: " . $conexion->error]));
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/styleindex.css?v=<?php echo time();?>">
    <input id="numeroFilas" type="hidden" value="<?php echo $numeroFilas ?>">
    <title>Principal</title>
</head>
<body class="container-body">

<header class="header-main">
<div class="header-systemhelp">
        <nav class="menu-main">
            <ul>
              <li><a href="system_help.php">Solicitud de Ayudas</a></li>
              
              <li><a href="list_users.php">Lista de usuarios</a></li>
              <li><a href="reportes.php">Reportes</a></li>
              <li><a href="estadisticas.html">Estadísticas</a></li>
              <li><a href="#">Usuario</a>
                <ul>
                  <li><a href="registro.php">Registrar Nueva Persona</a></li>
                  <li><a href="configuracion_user.php">Configuración de Usuario</a></li>
                  <li><a href=".././control general/logout.php">Cerrar Sesión</a></li>
                </ul>
              </li>
            </ul>
          </nav>
</div>
        <div class="infousuario-main">
            <p>Rol: Administrador
            </p>
        </div>
</header>
<div class="notis-main"> 
    <div id="notification-icon">
        <?php if ($numeroFilas > 0): ?>
        <p id="noti-main">🔔</p>
        <?php else: ?>
        <p id="noti-main">🔕</p>
        <?php endif; ?>
    </div>
    <ul id="barra-main">
    <?php 
        if ($consulta) {
            $notificacionesNoVistas = [];
            $notificacionesVistas = [];

            while($mostrar = mysqli_fetch_array($consulta)){
                $id = (int) $mostrar['id'];
                if($mostrar['visto'] == 0){
                    $notificacionesNoVistas[] = "<li class='li'><a class='li-main-novisto' href='#' onclick='markAsRead($id)'>".$mostrar['titulo']."</a></li>";
                } else {
                    $notificacionesVistas[] = "<li class='li'><a class='li-main-visto' href='#'>".$mostrar['titulo']."</a></li>";
                }
            }

            // Mostrar primero las no vistas y luego las vistas
            foreach ($notificacionesNoVistas as $notificacion) {
                echo $notificacion;
            }
            foreach ($notificacionesVistas as $notificacion) {
                echo $notificacion;
            }
        }
    ?>
    </ul>
</div>
<script>
    function markAsRead(id) {
        fetch('main.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ action: 'mark_as_read', id: id })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload(); // Recargar la página para reflejar los cambios
            } else {
                console.error('Error:', data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>
<main class="main-content">
        <section class="section-main">
            <h1>Bienvenido al Sistema de Solicitud de Ayudas</h1>
            <p>Utilice el menú de arriba para navegar por las diferentes secciones del sistema.</p>
        </section>
        <section class="section-main">
            <h2>Últimas Noticias</h2>
            <ul>
                <li>Actualización del sistema realizada el 13/3/2025.</li>
                <li>Nuevas funcionalidades añadidas para mejorar la experiencia del usuario.</li>
                <li>Recuerde actualizar su perfil en la sección de configuración de usuario.</li>
            </ul>
        </section>
        <section class="section-main">
            <h2>Características del Sistema</h2>
            <ul>
                <li>Gestión de solicitudes de ayuda de manera eficiente y rápida.</li>
                <li>Interfaz amigable y fácil de usar.</li>
                <li>Acceso seguro y protegido a través de validación de sesión.</li>
                <li>Configuración personalizada del perfil de usuario.</li>
            </ul>
        </section>
    </main>
</body>
<script src="../js/notificaciones.js"></script>
</html>