<?php 
require_once("../../control_general/conexion.php");
if (isset($_GET['num'])){
    $num = $_GET['num'];
    $id = $_GET['id'];
    switch($num){
        case 0:
            $consulta = $conexion->query("UPDATE system_despacho SET estado = 'Aprobado', razon = '' WHERE id = $id");
            header("Location: ../help_despacho_list.php");
            break;
        case 1:
            header("Location: ../invalid_razon.php?id=$id");
            break;
        case 2:
            $consulta = $conexion->query("UPDATE system_despacho SET estado = 'En Espera...', razon = '' WHERE id = $id");
            header("Location: ../help_despacho_list.php");
            break;
        case 3:
            $consulta = $conexion->query("UPDATE system_despacho SET estado = 'En Espera...', razon = '' WHERE id = $id");
            header("Location: ../help_despacho_list.php");
    }
}
?>