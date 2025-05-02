<?php
require_once("../control_general/conexion.php");
date_default_timezone_set('America/Caracas');
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Iniciar la sesión si no está ya iniciada
}
// Validar que la solicitud sea POST y que el botón haya sido presionado
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['btn'])) {
    // Recopilar datos y convertir enteros
    $titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_STRING);
    $nombres_apellidos = filter_var($_POST['nombres_apellidos'], FILTER_SANITIZE_STRING);
    $ci_perso = filter_var($_POST['ci_perso'], FILTER_VALIDATE_INT);
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $telefono = $_POST['telefono'];
    $lugar_nacimiento = filter_var($_POST['lugar_nacimiento'], FILTER_SANITIZE_STRING);
    $edad = filter_var($_POST['edad'], FILTER_VALIDATE_INT);
    $estado_civil = $_POST['estado_civil'];
    $codigo_patria = filter_var($_POST['codigo_patria'], FILTER_VALIDATE_INT);
    $serial_patria = filter_var($_POST['serial_patria'], FILTER_VALIDATE_INT);
    $nivel_instruc = $_POST['nivel_instruc'];
    $profesion = filter_var($_POST['profesion'], FILTER_SANITIZE_STRING);
    $op = $_POST['trabajo1'];
    if ($op === 'Si') {
        $trabajo = filter_var($_POST['trabajo'], FILTER_SANITIZE_STRING);
        $direc_trabajo = filter_var($_POST['direc_trabajo'],FILTER_SANITIZE_STRING);
        $trabaja_public = filter_var($_POST['trabaja_public'], FILTER_SANITIZE_STRING);
        $nombre_insti = ($trabaja_public === "Si") ? $_POST['nombre_insti'] : 'N/A';
    } else {
        $trabajo = "No tiene";
        $direc_trabajo = "N/A";
        $nombre_insti = 'N/A';
        $trabaja_public = "No";
    }
    
    $comunidad = filter_var($_POST['comunidad'], FILTER_SANITIZE_STRING);
    $direc_habita = filter_var($_POST['direc_habita'], FILTER_SANITIZE_STRING);
    $estruc_base = filter_var($_POST['estruc_base'], FILTER_SANITIZE_STRING);
    $propiedad = $_POST['propiedad'];
    $propiedad_est = $_POST['propiedad_est'];
    if(isset($_POST['observaciones'])){
        $observaciones = filter_var($_POST['observaciones'], FILTER_SANITIZE_STRING);
    }
    else{
        $observaciones = "No tiene observaciones";
    }
    $nivel_ingreso = filter_var($_POST['nivel_ingreso'],FILTER_VALIDATE_INT);
    $bono = filter_var($_POST['bono'], FILTER_SANITIZE_STRING);
    $pension = filter_var($_POST['pension'], FILTER_SANITIZE_STRING);
    if(isset($_POST['patologia'])){
        $patologia = $_POST['patologia'];
    }
    else{
        $patologia = "Sin familiares con patología";
    }
    $tip_ayuda = filter_var($_POST['tip_ayuda'], FILTER_SANITIZE_STRING);
    $remitente = filter_var($_POST['remitente'], FILTER_SANITIZE_STRING);
    if(isset($_POST['observaciones_ayuda'])){
        $observaciones_ayuda = filter_var($_POST['observaciones_ayuda'], FILTER_SANITIZE_STRING);
    }
    else{
        $observaciones_ayuda = "Sin observaciones";
    }
    $estado = "En espera del documento físico para ser procesado 0/3";
    $fecha = date("Y-m-d H:i:s");
    $visto = 0;
    // Iniciar transacción
    $conexion->begin_transaction();
    $id = $_SESSION['id'];
    $user_info = $conexion->query("SELECT * FROM user_info WHERE ci = $id");
    $datos_usuario = $user_info->fetch_assoc();
    $nombre_completo = $datos_usuario['nombre'] . ' ' . $datos_usuario['apellido'];
    $promotor_social = $nombre_completo;
    try {
        // Primer INSERT: Tabla principal
        $stmt1 = $conexion->prepare("INSERT INTO system_help (titulo, estado, fecha_solicitud, visto, remitente, observaciones_ayuda,promotor) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt1->bind_param("sssssss", $titulo, $estado, $fecha, $visto, $remitente, $observaciones_ayuda,$promotor_social);
        $stmt1->execute();
        $id_doc = $conexion->insert_id;

        // Segundo INSERT: Tabla datos_personales
        $stmt2 = $conexion->prepare("INSERT INTO datos_personales (id_doc, nombres_apellidos, fecha_nacimiento, lugar_nacimiento, edad, estado_civil) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt2->bind_param("isssis", $id_doc, $nombres_apellidos, $fecha_nacimiento, $lugar_nacimiento, $edad, $estado_civil);
        $stmt2->execute();

        // Tercer INSERT: Tabla datos_extra
        $stmt3 = $conexion->prepare("INSERT INTO datos_extra (id_doc, nivel_instruc, profesion, comunidad, direc_habita, estruc_base) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt3->bind_param("isssss", $id_doc, $nivel_instruc, $profesion,  $comunidad, $direc_habita, $estruc_base);
        $stmt3->execute();

        // Cuarto INSERT: Tabla datos_ambiental
        $stmt4 = $conexion->prepare("INSERT INTO datos_ambiental (id_doc, propiedad, propiedad_est, observacion) VALUES (?, ?, ?, ?)");
        $stmt4->bind_param("isss", $id_doc, $propiedad, $propiedad_est, $observaciones);
        $stmt4->execute();

        // Quinto INSERT: Tabla datos_economicos
        $stmt5 = $conexion->prepare("INSERT INTO datos_economicos (id_doc, nivel_ingreso, trabajo, pension, bono) VALUES (?, ?, ?, ?, ?)");
        $stmt5->bind_param("issss", $id_doc, $nivel_ingreso, $trabajo, $pension, $bono);
        $stmt5->execute();

        // Sexto INSERT: Tabla datos_import
        $stmt6 = $conexion->prepare("INSERT INTO datos_import (id_doc, ci_perso, telefono, codigo_patria, serial_patria) VALUES (?, ?, ?, ?, ?)");
        $stmt6->bind_param("iiiii", $id_doc, $ci_perso, $telefono, $codigo_patria, $serial_patria);
        $stmt6->execute();

        // Séptimo INSERT: Tabla datos_medicos
        if ($patologia === 'Sin familiares con patología') {
            // Inserta directamente si no hay familiares con patología
            $stmt7 = $conexion->prepare("INSERT INTO datos_medicos (id_doc, patologia) VALUES (?, ?)");
            $stmt7->bind_param("is", $id_doc, $patologia);
            $stmt7->execute();
        } else {
            // Si $patologia es un array, iteramos para insertar cada patología asociada, en este caso lo hice con foreach en vez de while
            if (is_array($patologia)) {
                $stmt7 = $conexion->prepare("INSERT INTO datos_medicos (id_doc, patologia) VALUES (?, ?)");
                foreach ($patologia as $valor) {
                    $stmt7->bind_param("is", $id_doc, $valor);
                    $stmt7->execute();
                }
            } else {
                // Si no es un array, insertamos directamente (para evitar errores si llega en formato de string)
                $stmt7 = $conexion->prepare("INSERT INTO datos_medicos (id_doc, patologia) VALUES (?, ?)");
                $stmt7->bind_param("is", $id_doc, $patologia);
                $stmt7->execute();
            }
        }
        


        // Octavo INSERT: Tabla tipo_ayuda
        $stmt8 = $conexion->prepare("INSERT INTO tipo_ayuda (id_doc, tip_ayuda) VALUES (?, ?)");
        $stmt8->bind_param("is", $id_doc, $tip_ayuda);
        $stmt8->execute();

        // Noveno INSERT: Tabla trabajo
        $stmt9 = $conexion->prepare("INSERT INTO trabajo (id_doc, trabaja_public,nombre_insti, trabajo, direc_trabajo) VALUES (?, ?, ?, ?, ?)");
        $stmt9->bind_param("issss", $id_doc, $trabaja_public,$nombre_insti, $trabajo, $direc_trabajo);
        $stmt9->execute();

        // Confirmar la transacción
        $conexion->commit();
        header("Location: felicidades_help.php");
        exit();

    } catch (Exception $e) {
        $conexion->rollback();
        echo "Error: " . $e->getMessage();
    } finally {
        $stmt1->close();
        $stmt2->close();
        $stmt3->close();
        $stmt4->close();
        $stmt5->close();
        $stmt6->close();
        $stmt7->close();
        $stmt8->close();
        $stmt9->close();
        $conexion->close();
    }
}
?>
