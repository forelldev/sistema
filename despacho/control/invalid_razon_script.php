<?php 
require_once("../control_general/conexion.php");
if(isset($_POST['btn'])){
    $razon = $_POST['razon'];
    $id = $_POST['id'];
    $consulta = $conexion->query("UPDATE system_despacho SET estado = 'No Aprobado', razon = '$razon' WHERE id = $id");
    header("Location: despacho_noaprobados_list.php");
}
?>