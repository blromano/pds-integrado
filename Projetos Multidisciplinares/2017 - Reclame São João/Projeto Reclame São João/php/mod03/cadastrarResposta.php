<?php

	include '../../modelo/RespostasReclamacoes.php';
	include '../../controle/RespostaReclamacaoDAO.php';
	
	include '../../modelo/Notificacoes.php';
    include '../../controle/NotificacoesDAO.php';

		$respostasreclamacoes = new RespostasReclamacoes();

		$respostareclamacaoDAO = new RespostaReclamacaoDAO();

		$respostasreclamacoes->setRER_DESCRICAO($_POST['RER_DESCRICAO']);
		$respostasreclamacoes->setADM_ID($_POST['ADM_ID']);
		$respostasreclamacoes->setREC_ID($_POST['REC_ID']);
		$respostasreclamacoes->setRER_AVALIACAO("0");
		$respostasreclamacoes->setRER_STATUS_APROVADO(0);
		$respostasreclamacoes->setRER_STATUS_RESOLVIDO(1);

		$respostareclamacaoDAO->inserirResposta($respostasreclamacoes);
		
	// Criando uma Nova Notificação
        $notificacoes = new Notificacoes();

        $notificacoesDAO = new NotificacoesDAO();
	
	// Inserir Notificação
		$notificacoes->setNOT_TIPO_NOTIFICACAO('2');
		$notificacoes->setNOT_NOME('Resposta da Reclamação');
		$notificacoes->setNOT_VISUALIZADA(0);
		$notificacoes->setNOT_ID_CONSUMIDORES($_POST['CON_ID']);
		$notificacoes->setNOT_DATA_EVENTO(date('Y-m-d H:i'));
		
		$idNotificacao = $notificacoesDAO->inserirNotificacaoResposta($notificacoes);

		header("location:../../est_gerenciar-respostas_reclamacoes.php");  
?>
