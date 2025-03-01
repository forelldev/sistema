<?php 
if($mostrar['estado'] == "En espera del documento físico para ser procesado 1/3"){ 
    echo "Aprobar para su procedimiento";
}
else if($mostrar['estado'] == "En Proceso 2/3"){
    echo "Finalizar Proceso";
}

else if($mostrar['estado'] == "Proceso Finalizado 3/3"){
    echo "Reiniciar Proceso (En caso de algún error)";
}

else if($mostrar['estado'] == "Documento inválido"){
    echo "Ver detalles";
}
?>