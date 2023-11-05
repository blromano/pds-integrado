<?php 
	session_start();
	include ('../../controle/NotificacaoReclamacaoDAO.php');
	include ('../../controle/ConsumidorDAO.php');
	include ("../../controle/ReclamacoesDAO.php");
	$ReclamacaoDAO = new ReclamacoesDAO;
	$NotificacaoReclamacaoDAO = new NotificacaoReclamacaoDAO;
	$ConsumidorDAO = new ConsumidorDAO;
	$GET = strip_tags(trim($_GET['acao']));
	$USU_ID = $_SESSION['USU_ID'];
	$CON_ID = $ConsumidorDAO->idCon($USU_ID);
	$primeiromaiusculo = $ReclamacaoDAO->primeiroMaiusculo();
	
	switch ($GET) {

	case 'verificar':
	$total = $NotificacaoReclamacaoDAO->contarNotIdNaoVisualizado($CON_ID);
	$_SESSION['rec_notificacao_total'] = $total;
	echo $total;
		
	break;

	case 'getnots':
	
	$get_respondida = $NotificacaoReclamacaoDAO->listarInformacao($CON_ID);
	$li = '';
	foreach ($get_respondida as $row){
	$li .= '<li class="n" id="'.$row["idn"].'">';
	$li .= '<div class="imgn"></div>'; 
	$li .= '<div class="contn">';
	if($row["NOT_TIPO_NOTIFICACAO"] == 1){
	$li .= ''.$row["NOT_NOME"].': #'.$row["idn"].' <span> às '.date('d/m/Y H:i', strtotime($row["NOT_DATA_EVENTO"])).'</span>';
	}
	else{
	$li .= ''.$row["NOT_NOME"].': #'.$row["idn"].' <span> às '.date('d/m/Y H:i', strtotime($row["NOT_DATA_EVENTO"])).'</span>';
	}
	$li .= '</div>'; 

	$vis   = ($row["NOT_STATUS"] == 0) ? 'vis' : 'vis2';
	$title = ($row["NOT_STATUS"] == 0) ? 'Não visualizado' : 'Visualizado';

	$li .= '<div class="'.$vis.'" id="'.$row["idn"].'" title="'.$title.'"></div>';
	$li .= '</li>';
	}
	
	echo $li;
	break;
	
	case 'vis':
	$idnot = $_GET['idnot'];
	
	if(!empty($idnot) and is_numeric($idnot)){
	$atualiza = $NotificacaoReclamacaoDAO->atualizarVisualizado($idnot);

	if($atualiza): echo 'Visualizado!'; endif;
	}
	break;

	default:
	echo 'Erro';
	break;
	} 