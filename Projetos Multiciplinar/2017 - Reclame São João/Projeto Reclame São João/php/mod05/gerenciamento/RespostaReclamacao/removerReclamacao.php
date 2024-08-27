<?php

include '../../../../controle/RespostaReclamacaoDAO.php';


$RespostaReclamacaoDAO = new RespostaReclamacaoDAO();
$php = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($php['idDelet'])){
		$RespostaReclamacaoDAO->excluirADM($php['idDelet']);
	}
};
?> 