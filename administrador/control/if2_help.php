<?php 
if($mostrar['estado'] == "En espera del documento físico para ser procesado 1/3"){ 
    echo "./control/aprobar_proceso1.php?id=".$mostrar['id'];
}
else if($mostrar['estado'] == "En Proceso 2/3"){
    echo "./control/aprobar_proceso2.php?id=".$mostrar['id'];
}

else if($mostrar['estado'] == "Proceso Finalizado 3/3"){
    echo "./control/reiniciar_proceso.php?id=".$mostrar['id'];
}

else if($mostrar['estado'] == "Documento inválido"){
    echo "details.php?id=".$mostrar['id'];
}
?>