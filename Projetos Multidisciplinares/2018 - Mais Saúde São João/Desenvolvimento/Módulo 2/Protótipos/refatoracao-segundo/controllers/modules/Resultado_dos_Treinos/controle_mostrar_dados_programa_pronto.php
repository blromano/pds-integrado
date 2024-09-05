<?php
				
    include "./classes/DAO/programas_de_treinamentos_prontos_dao.php";
    include "./classes/programas_de_treinamento_prontos.php";                    
    
    //$obj_programas_prontos = new programas_de_treinamentos_prontos();
    //$obj_programas_prontos ->getPtp_codigo(2);
    
    $obj_programas_prontos_dao = new programas_de_treinamentos_prontos_dao();
                        
    //$resultado = $obj_programas_prontos_dao->selecionar_programa($obj_programas_prontos);
    $resultado = $obj_programas_prontos_dao->selecionar_programa(1);                    
?>