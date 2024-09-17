<?php

	include '../../modelo/DenunciaConsumidor.php';
	include '../../controle/DenunciaConsumidorDAO.php';
	
	include '../../modelo/Notificacoes.php';
    include '../../controle/NotificacoesDAO.php';

	$denunciaconsumidor = new DenunciaConsumidor();
	$denunciaconsumidorDAO = new DenunciaConsumidorDAO();

	$denunciaconsumidor->setDEC_TIPO_DENUNCIA($_POST['DEC_TIPO_DENUNCIA']);
	$denunciaconsumidor->setDEC_MOTIVO($_POST['DEC_MOTIVO']);
	$denunciaconsumidor->setEST_ID($_POST['EST_ID']);
	$denunciaconsumidor->setADM_ID($_POST['ADM_ID']);
	$denunciaconsumidor->setCON_ID($_POST['CON_ID']);
	$denunciaconsumidor->setDEC_STATUS_APROVADO(0);
	
	// Criando uma Nova Notificação
        $notificacoes = new Notificacoes();

        $notificacoesDAO = new NotificacoesDAO();
	
	//Notificação
		$notificacoes->setNOT_TIPO_NOTIFICACAO('4');
		$notificacoes->setNOT_NOME('Nova Denúncia');
		$notificacoes->setNOT_VISUALIZADA(0);
		$notificacoes->setNOT_ID_ESTABELECIMENTO($_POST['EST_ID']);
		$notificacoes->setNOT_ID_CONSUMIDORES($_POST['CON_ID']);
		$notificacoes->setNOT_DATA_EVENTO(date('Y-m-d H:i'));

		$notificacoesDAO->inserirNotificacaoDenuncia($notificacoes);
	
	header("location:../../est_gerenciar-respostas_reclamacoes.php"); 
?>