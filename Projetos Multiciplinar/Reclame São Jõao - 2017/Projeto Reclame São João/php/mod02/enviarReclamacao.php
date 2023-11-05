<?php
session_start();
include "../../controle/ReclamacoesDAO.php";
header("Content-Type: text/html; charset=ISO-8859-1",true);
include '../../modelo/Notificacoes.php';
include '../../controle/NotificacoesDAO.php';

$nome_estabelecimento = $_SESSION["nome"];
$id_estabelecimento = $_SESSION["EST_ID"]; 

date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d H:i');
print_r($_SESSION);
$reclamacao = new Reclamacoes();
$reclamacao->setREC_TITULO_RECLAMACAO($_SESSION['REC_TITULO_RECLAMACAO']);
$reclamacao->setREC_DESCRICAO($_SESSION['REC_DESCRICAO']); 
$reclamacao->setREC_DATA_HORA($_SESSION['REC_DATA_HORA']);
$reclamacao->setREC_LINK_IMAGEM($_SESSION['REC_LINK_IMAGEM']);
$reclamacao->setREC_NOTA_FORMATADA($_SESSION['REC_NOTA_FORMATADA']);
$reclamacao->setREC_APROVADO($_SESSION['REC_APROVADO']);
$reclamacao->setEST_ID($_SESSION['EST_ID']);
$reclamacao->setCON_ID($_SESSION['CON_ID']);


$ReclamacaoDAO = new ReclamacoesDAO();
 $idReclamacao = $ReclamacaoDAO->inserirReclamacao($reclamacao);
 
 echo $idReclamacao;

	// Criando uma Nova Notificação
        $notificacoes = new Notificacoes();

        $notificacoesDAO = new NotificacoesDAO();
			
	// Inserir Notificação
		$notificacoes->setNOT_ID_RECLAMACAO($idReclamacao);
		$notificacoes->setNOT_ID_ESTABELECIMENTO($_SESSION["EST_ID"]);
		$notificacoes->setNOT_NOME('3');
		$notificacoes->setNOT_DATA_EVENTO($_SESSION['REC_DATA_HORA']);
		$notificacoes->setNOT_VISUALIZADA(0);
		$notificacoes->setNOT_TIPO_NOTIFICACAO('Reclamação');
				
	//	$resultado = $notificacoesDAO->inserirNotificacaoNovaReclamacao($notificacoes);
header("location:../../rec_enviado.php"); 

?>