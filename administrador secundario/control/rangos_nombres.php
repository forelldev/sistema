<?php
include(".././control general/conexion.php");
if($mostrar['rango'] == 0){
    echo "Secretaria de oficina";
}
else if ($mostrar['rango'] == 1){
    echo "Administrador Secundario";
}
else if ($mostrar['rango'] == 2){
    echo "Administrador";
}
?>