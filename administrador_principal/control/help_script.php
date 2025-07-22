<?php
require_once("../control_general/conexion.php"); // Asegúrate de que esta ruta sea correcta relativa a help_script.php

$id_doc = isset($_GET['id_doc']) ? intval($_GET['id_doc']) : null; // intval() ofrece una seguridad básica contra no-numéricos
$datos = []; // Inicializa el array $datos

if ($id_doc) {
    // Datos personales
    $res = $conexion->query("SELECT * FROM datos_personales WHERE id_doc = $id_doc");
    if ($res && $res->num_rows > 0) {
        $datos = array_merge($datos, $res->fetch_assoc());
    }

    // Datos importantes
    $res = $conexion->query("SELECT * FROM datos_import WHERE id_doc = $id_doc");
    if ($res && $res->num_rows > 0) {
        $datos = array_merge($datos, $res->fetch_assoc());
    }

    // Datos extra
    $res = $conexion->query("SELECT * FROM datos_extra WHERE id_doc = $id_doc");
    if ($res && $res->num_rows > 0) {
        $datos = array_merge($datos, $res->fetch_assoc());
    }

    // Datos ambientales
    $res = $conexion->query("SELECT * FROM datos_ambiental WHERE id_doc = $id_doc");
    if ($res && $res->num_rows > 0) {
        $datos = array_merge($datos, $res->fetch_assoc());
    }

    // Datos económicos
    $res = $conexion->query("SELECT * FROM datos_economicos WHERE id_doc = $id_doc");
    if ($res && $res->num_rows > 0) {
        $datos = array_merge($datos, $res->fetch_assoc());
    }

    // Trabajo
    $res = $conexion->query("SELECT * FROM trabajo WHERE id_doc = $id_doc");
    if ($res && $res->num_rows > 0) {
        $datos = array_merge($datos, $res->fetch_assoc());
    }

    // Tipo de ayuda
    $res = $conexion->query("SELECT * FROM tipo_ayuda WHERE id_doc = $id_doc");
    if ($res && $res->num_rows > 0) {
        $datos = array_merge($datos, $res->fetch_assoc());
    }

    // Patologías (solo para contar y autocompletar 'pers_patologia')
    $res = $conexion->query("SELECT COUNT(*) AS num_patologias FROM datos_medicos WHERE id_doc = $id_doc");
    if ($res && $res->num_rows > 0) {
        $datos['pers_patologia'] = $res->fetch_assoc()['num_patologias'];
    }

    // system_help (para descripción, id_manual, remitente, observaciones, categoría)
    $res = $conexion->query("SELECT * FROM system_help WHERE id_doc = $id_doc");
    if ($res && $res->num_rows > 0) {
        $datos = array_merge($datos, $res->fetch_assoc());
    }
}

// Función auxiliar para obtener un valor del array $datos de forma segura
function get_value($key, $default = '') {
    global $datos;
    return isset($datos[$key]) ? htmlspecialchars($datos[$key]) : $default;
}
?>