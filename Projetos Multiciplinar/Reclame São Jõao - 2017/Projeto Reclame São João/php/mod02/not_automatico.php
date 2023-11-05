<?php

	include 'modelo/Notificacoes.php';
    include 'controle/NotificacoesDAO.php';
	
	date_default_timezone_set('America/Sao_Paulo');
	$date = date('Y-m-d H:i');
	$cont=0;
	$cont2=0;
	$cont3=0;

	$ReclamacaoDAO = new ReclamacoesDAO;

	$REC_RESPONDIDO = $ReclamacaoDAO->selecionarInformacaoRespondida();
	$CONT_REC_ID_RESPONDIDO = $ReclamacaoDAO->contRecIdRespondida();
	$CON_ID_RESPONDIDA = $ReclamacaoDAO->selecionarInformacaoRespondidaConId();
	
	
	// Criando uma Nova Notificação
        $notificacoes = new Notificacoes();

        $notificacoesDAO = new NotificacoesDAO();
	
	//Inserir Notificação - Reclamação Respondida
		for($i=0;$i<$CONT_REC_ID_RESPONDIDO;$i++)
			{	
				$notificacoes->setNOT_ID_RECLAMACAO($REC_RESPONDIDO[$cont3]["REC_ID"]);
				$notificacoes->setNOT_NOME('2');
				$notificacoes->setNOT_DATA_EVENTO($date);
				$notificacoes->setNOT_VISUALIZADA(0);
				$notificacoes->setNOT_TIPO_NOTIFICACAO('Reclamação Respondida');
				$notificacoes->setNOT_ID_CONSUMIDORES($idReuniao);
				
				$resultado = $notificacoesDAO->inserirNotificacaoReclamacao($notificacoes);
				$cont3++;
			}

	//Inserir Notificação - Reclamação Publicada
		$REC_PUBLICADO = $ReclamacaoDAO->selecionarInformacaoPublicado();
		$CONT_REC_ID_PUBLICADO = $ReclamacaoDAO->contRecIdPublicado();
		
		$notificacoes = new Notificacoes();

		for($i=0;$i<$CONT_REC_ID_PUBLICADO;$i++)
			{	
				$notificacoes->setNOT_ID_RECLAMACAO($REC_PUBLICADO[$cont]["REC_ID"]);
				$notificacoes->setNOT_NOME('3');
				$notificacoes->setNOT_DATA_EVENTO($date);
				$notificacoes->setNOT_VISUALIZADA(0);
				$notificacoes->setNOT_TIPO_NOTIFICACAO('Reclamação Publicada');
				$notificacoes->setNOT_ID_CONSUMIDORES($REC_PUBLICADO[$cont]["CON_ID"]);
				
				$resultado = $notificacoesDAO->inserirNotificacaoReclamacao($notificacoes);
				$cont++;
			}
		
		//Inserir Notificação - Reclamação Suspensa
			$REC_SUSPENSA = $ReclamacaoDAO->selecionarInformacaoSuspensa();
			$CONT_REC_ID_SUSPENSA = $ReclamacaoDAO->contRecIdSuspensa();

			for($i=0;$i<$CONT_REC_ID_SUSPENSA;$i++)
				{	
					$notificacoes->setNOT_ID_RECLAMACAO($REC_SUSPENSA[$cont2]["REC_ID"]);
					$notificacoes->setNOT_NOME('4');
					$notificacoes->setNOT_DATA_EVENTO($date);
					$notificacoes->setNOT_VISUALIZADA(0);
					$notificacoes->setNOT_TIPO_NOTIFICACAO('Reclamação Suspensa');
					$notificacoes->setNOT_ID_CONSUMIDORES($REC_SUSPENSA[$cont2]["CON_ID"]);
					
					$resultado = $notificacoesDAO->inserirNotificacaoReclamacao($notificacoes);
					$cont2++;
				}
?>