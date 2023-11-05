<?php

include '../../../../controle/RespostaReclamacaoDAO.php';

$RespostaReclamacaoDAO = new RespostaReclamacaoDAO();
$php = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    
    $num2 = $php['editastatus'];
    $id2 = $php['idstatus'];                
    $RespostaReclamacaoDAO->editarSuspender_PublicarADM($num2,$id2);

?> 