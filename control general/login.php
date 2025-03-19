<?php
include("conexion.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Iniciar la sesión si no está ya iniciada
}
if(isset($_POST['btn'])){
    $ci = $_POST['ci'];
    $contraseña = $_POST['contraseña'];
    // Preparar la consulta para evitar inyecciones SQL
    $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE ci = ? AND contraseña = ?");
    // "i" indica que el primer parámetro es un entero, "s" indica que el segundo parámetro es una cadena
    $consulta->bind_param("is", $ci, $contraseña);
    $consulta->execute();
    $resultado = $consulta->get_result();
    if($resultado->num_rows > 0){
        $mostrar = $resultado->fetch_assoc();
        $rango = $mostrar['rango'];
        $_SESSION['sesion'] = 1;
        $_SESSION['rango'] = $rango;
        $_SESSION['id'] = $mostrar['ci'];
        date_default_timezone_set('America/Caracas');
        $fecha = date("Y-m-d");
        $hora = date("H:i:s");
        $buscarSesionesAnteriores = $conexion->query("SELECT * FROM reportes_entradas WHERE hora_salida = ''");
        if($buscarSesionesAnteriores->num_rows > 0){
            while($mostrar = $buscarSesionesAnteriores->fetch_assoc()){
                $id = $mostrar['id'];
                $conexion->query("UPDATE reportes_entradas SET hora_salida = '$hora' WHERE id = '$id'");
            }
        }
        $consulta = $conexion->query("INSERT INTO reportes_entradas(ci,fecha,hora_entrada) values ('$ci','$fecha','$hora')");
        // Capturar el ID del reporte insertado
        $id_entrada = $conexion->insert_id;
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
    else {
                // Establecer un mensaje de error en la sesión
                $_SESSION['error'] = "Datos incorrectos, por favor inténtelo de nuevo.";
                header("Location: index.php");
                exit();
    }
    $consulta->close();
}

?>