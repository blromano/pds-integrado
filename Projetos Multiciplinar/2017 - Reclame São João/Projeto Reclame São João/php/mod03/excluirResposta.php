<?php
	include '../../controle/RespostaReclamacaoDAO.php';
	include '../../modelo/RespostasReclamacoes.php';

		$respostareclamacaoDAO = new RespostaReclamacaoDAO();

		$respostareclamacaoDAO->excluirResposta($_POST['RER_ID']);

		header("location:../../est_gerenciar-respostas_reclamacoes.php"); 
?>

