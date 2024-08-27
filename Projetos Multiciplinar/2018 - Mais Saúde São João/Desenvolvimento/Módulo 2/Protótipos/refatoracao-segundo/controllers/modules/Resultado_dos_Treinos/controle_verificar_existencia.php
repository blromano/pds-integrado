<?php
    require_once "./classes/DAO/usuarios_treinamentos_prontos_dao.php";  
        
    $usuarios_treinamentos_prontos_dao = new usuarios_treinamentos_prontos_dao();
    $vinculo = $usuarios_treinamentos_prontos_dao->verificarExistenciaVinculo(1, $resultado[$i]["PTP_CODIGO"]);
    
    if (count($vinculo) > 0) {
        echo "Desvincular";
     } else {
        echo "Vincular";
     }
    
?>