<?php
include '../../modelo/RespostasReclamacoes.php';
include '../../controle/RespostaReclamacaoDAO.php';




$respostasreclamacoes = new RespostasReclamacoes();
$respostareclamacaoDAO = new RespostaReclamacaoDAO();
	
$respostasreclamacoes->setRER_ID($_GET['RER_ID']);
$respostasreclamacoes->setRER_DESCRICAO($_GET['RER_DESCRICAO']);
	
$respostareclamacaoDAO->editarResposta($respostasreclamacoes);


//header("location:../../../php/mod03/mod03-gerenciar-reclamacao-atendida.php"); 

?>