<?php
require_once("conexion.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Iniciar la sesión si no está ya iniciada
}
if(isset($_POST['btn'])){
    $ci = trim($_POST['ci']);
    $contraseña = trim($_POST['contraseña']);
    if (empty($ci) || empty($contraseña)) {
        $_SESSION['error'] = "Por favor, complete todos los campos.";
        header("Location: index.php");
        exit();
    }
    // Preparar la consulta para evitar inyecciones SQL
    $consulta = $conexion->prepare("SELECT * FROM user WHERE ci = ? AND contraseña = ?");
    // "i" indica que el primer parámetro es un entero, "s" indica que el segundo parámetro es una cadena
    $consulta->bind_param("is", $ci, $contraseña);
    $consulta->execute();
    $resultado = $consulta->get_result();
    if($resultado->num_rows > 0){
        // Verificar si la sesion es == true o == false en caso de que se true es porque ya se inició en otro dispositivo y verificar el tiempo de la sesion anterior si han pasado mas de x segundos se cerrará y se abrirá esta
        $mostrar = $resultado->fetch_assoc();
        $ultima_sesion = $conexion->query("SELECT fecha_entrada FROM reportes_entradas WHERE ci = '$ci' ORDER BY id DESC LIMIT 1");
        $ultima_sesion = $ultima_sesion->fetch_assoc();
        if($mostrar['sesion'] == 'False'){
            $sesion_activar = 'True';
            $conexion->query("UPDATE user SET sesion = '$sesion_activar' WHERE ci = '$ci'");
            $rango = $mostrar['rango'];
            $_SESSION['sesion'] =$sesion_activar;
            $_SESSION['rango'] = $rango;
            $_SESSION['id'] = $mostrar['ci'];
            date_default_timezone_set('America/Caracas');
            $fecha = date("Y-m-d H:i:s");
            //PARA REGISTRAR SESIONES NO CERRADAS ANTERIORMENTE EN REPORTES
            $buscarSesionesAnteriores = $conexion->query("SELECT * FROM reportes_entradas WHERE fecha_salida = ''");
            if($buscarSesionesAnteriores->num_rows > 0){
                while($mostrar = $buscarSesionesAnteriores->fetch_assoc()){
                    $id = $mostrar['id'];
                    $conexion->query("UPDATE reportes_entradas SET fecha_salida = '$fecha' WHERE id = '$id'");
                }
            }
            $consulta = $conexion->query("INSERT INTO reportes_entradas(ci,fecha_entrada) values ('$ci','$fecha')");
            // Capturar el ID del reporte insertado
            $id_entrada = $conexion->insert_id;
            // Guardar el ID de la sesión que se está iniciando en la variable de sesión
            $_SESSION['id_entrada'] = $id_entrada;
            switch ($rango){
                case 0:
                    header("Location: ./secretaria de oficina/main.php");
                    exit();
                case 1:
                    header("Location: ./despacho/main.php");
                    exit();
                case 2:
                    header("Location: ./administrador secundario/main.php");
                    exit();
                case 3:
                    header("Location: ./administrador/main.php");
                    exit();
            }
        }
        else if($mostrar['sesion'] == 'True'){
                // Cerrar todas las sesiones activas
                $conexion->query("UPDATE user SET sesion = 'False' WHERE ci = '$ci'");
                $_SESSION['error'] = "Se han cerrado las sesiones activas. Por favor, vuelva a iniciar sesión.";
                header("Location: index.php");
                exit();
        }
        else{
            // Establecer un mensaje de error en la sesión
            $_SESSION['error'] = "Ya hay una sesión activa con este usuario.";
            header("Location: index.php");
            exit();
        }
    
    } 
    else {
                // Establecer un mensaje de error en la sesión
                $_SESSION['error'] = "Datos incorrectos, por favor inténtelo de nuevo.";
                header("Location: index.php");
                exit();
    }
    $consulta->close();
}

?>