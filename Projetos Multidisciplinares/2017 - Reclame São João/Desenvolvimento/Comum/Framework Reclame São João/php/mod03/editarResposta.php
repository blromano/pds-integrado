<?php

	include '../../modelo/RespostasReclamacoes.php';
	include '../../controle/RespostaReclamacaoDAO.php';

		$respostasreclamacoes = new RespostasReclamacoes();

		$respostareclamacaoDAO = new RespostaReclamacaoDAO();
	
		$respostasreclamacoes->setRER_ID($_POST['RER_ID']);
		$respostasreclamacoes->setRER_DESCRICAO($_POST['RER_DESCRICAO']);
	
		$respostareclamacaoDAO->editarResposta($respostasreclamacoes);

		header("location:../../est_gerenciar-respostas_reclamacoes.php"); 
?>