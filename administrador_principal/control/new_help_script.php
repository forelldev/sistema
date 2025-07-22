<?php
require_once("../control_general/conexion.php");
date_default_timezone_set('America/Caracas');
session_start();
if (isset($_POST['crear_comunidad'])) {
    $nombre = $_POST['nombre_comunidad'];

    // Aquí podrías hacer sanitización o validaciones
    $insert = $conexion->query("INSERT INTO comunidades (nombre_comunidad) VALUES ('$nombre')");

    if ($insert) {
        echo "<script>alert('¡Comunidad registrada exitosamente!'); window.location.href='registro.php';</script>";
    } else {
        echo "Error al registrar la comunidad: " . mysqli_error($conexion);
    }
    exit;
}
if (isset($_POST['btn'])) {
    // Datos básicos
    $id_manual         = $_POST['id_manual'];
    $descripcion       = $_POST['descripcion'];
    $categoria         = $_POST['categoria'];
    $remitente         = $_POST['remitente'];
    $observaciones_ayuda = $_POST['observaciones_ayuda'] ?? "Sin observaciones";
    $estado            = "En espera del documento físico para ser procesado 0/3";
    $fecha             = date("Y-m-d H:i:s");
    $visto             = 0;
    // Datos del promotor
    $id = $_SESSION['id'];
    $datos = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT * FROM user_info WHERE ci = $id"));
    $user  = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT * FROM user WHERE ci = $id"));
    $promotor_social = $datos['nombre'] . ' ' . $datos['apellido'];
    $rol = $user['rango'];
    // Insert principal
    mysqli_query($conexion, "INSERT INTO system_help (id_manual, descripcion, estado, fecha_solicitud, visto, remitente, observaciones_ayuda, promotor, categoria)
    VALUES ('$id_manual', '$descripcion', '$estado', '$fecha', '$visto', '$remitente', '$observaciones_ayuda', '$promotor_social', '$categoria')");
    $id_doc = mysqli_insert_id($conexion);
    // Datos personales
    $nombres_apellidos  = $_POST['nombres_apellidos'];
    $fecha_nacimiento   = $_POST['fecha_nacimiento'];
    $lugar_nacimiento   = $_POST['lugar_nacimiento'];
    $edad               = $_POST['edad'];
    $estado_civil       = $_POST['estado_civil'];
    mysqli_query($conexion, "INSERT INTO datos_personales (id_doc, nombres_apellidos, fecha_nacimiento, lugar_nacimiento, edad, estado_civil)
    VALUES ('$id_doc', '$nombres_apellidos', '$fecha_nacimiento', '$lugar_nacimiento', '$edad', '$estado_civil')");

    // Datos extra
    $nivel_instruc      = $_POST['nivel_instruc'];
    $profesion          = $_POST['profesion'];
    $comunidad          = $_POST['comunidad'];
    $direc_habita       = $_POST['direc_habita'];
    $estruc_base        = $_POST['estruc_base'];
    mysqli_query($conexion, "INSERT INTO datos_extra (id_doc, nivel_instruc, profesion, comunidad, direc_habita, estruc_base)
    VALUES ('$id_doc', '$nivel_instruc', '$profesion', '$comunidad', '$direc_habita', '$estruc_base')");

    // Datos ambientales
    $propiedad      = $_POST['propiedad'];
    $propiedad_est  = $_POST['propiedad_est'];
    $observaciones  = $_POST['observaciones'] ?? "No tiene observaciones";
    mysqli_query($conexion, "INSERT INTO datos_ambiental (id_doc, propiedad, propiedad_est, observacion)
    VALUES ('$id_doc', '$propiedad', '$propiedad_est', '$observaciones')");

    // Datos económicos
    $nivel_ingreso  = $_POST['nivel_ingreso'];
    $bono           = $_POST['bono'];
    $pension        = $_POST['pension'];
    $trabajo1       = $_POST['trabajo1'];
    
    if ($trabajo1 === "Si") {
        $trabajo        = $_POST['trabajo'];
        $direc_trabajo  = $_POST['direc_trabajo'];
        $trabaja_public = $_POST['trabaja_public'];
        $nombre_insti   = $trabaja_public === "Si" ? $_POST['nombre_insti'] : "N/A";
    } else {
        $trabajo        = "No tiene";
        $direc_trabajo  = "N/A";
        $trabaja_public = "No";
        $nombre_insti   = "N/A";
    }

    mysqli_query($conexion, "INSERT INTO datos_economicos (id_doc, nivel_ingreso, trabajo, pension, bono)
    VALUES ('$id_doc', '$nivel_ingreso', '$trabajo', '$pension', '$bono')");

    mysqli_query($conexion, "INSERT INTO trabajo (id_doc, trabaja_public, nombre_insti, trabajo, direc_trabajo)
    VALUES ('$id_doc', '$trabaja_public', '$nombre_insti', '$trabajo', '$direc_trabajo')");

    // Datos importantes
    $ci_perso        = $_POST['ci_perso'];
    $telefono        = $_POST['telefono'];
    $codigo_patria   = $_POST['codigo_patria'];
    $serial_patria   = $_POST['serial_patria'];
    mysqli_query($conexion, "INSERT INTO datos_import (id_doc, ci_perso, telefono, codigo_patria, serial_patria)
    VALUES ('$id_doc', '$ci_perso', '$telefono', '$codigo_patria', '$serial_patria')");

    // Datos médicos
    $patologia = $_POST['patologia'] ?? "Sin familiares con patología";
    if (is_array($patologia)) {
        foreach ($patologia as $p) {
            mysqli_query($conexion, "INSERT INTO datos_medicos (id_doc, patologia) VALUES ('$id_doc', '$p')");
        }
    } else {
        mysqli_query($conexion, "INSERT INTO datos_medicos (id_doc, patologia) VALUES ('$id_doc', '$patologia')");
    }

    // Tipo de ayuda
    $tip_ayuda = $_POST['tip_ayuda'];
    mysqli_query($conexion, "INSERT INTO tipo_ayuda (id_doc, tip_ayuda) VALUES ('$id_doc', '$tip_ayuda')");

    // Reporte
    mysqli_query($conexion, "INSERT INTO reportes_solicitudes (rol, nombre, accion, fecha, id_doc)
    VALUES ('$rol', '{$datos['nombre']}', 'Creó Solicitud', '$fecha', '$id_doc')");

    header("Location: felicidades_help.php");
    exit();
}
?>
