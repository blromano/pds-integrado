<?php


include_once "class/FeedbackDAO.php";



$topico;


switch ($_POST['FEE_TOPICO']) {
	    case '1':
		$topico = "Duvidas";
		break;

		case '2':
		$topico = "Criticas";
		break;

		case '3':
		$topico = "Sugestões";
		break;
	
	default:
		$topico = "Assunto";
		break;
}

$dadosMensagem = array($topico, $_POST['FEE_MENSAGEM'], $_POST['USU_ID'], str_replace('/', '-', date("Y/m/d h:i:s")), 0);

$feedback = new FeedbackDAO();

$feedback->CadastrarFeedBack($dadosMensagem[0], $dadosMensagem[1], $dadosMensagem[2], $dadosMensagem[3], $dadosMensagem[4]);

Header("location: FaleConosco.php");
?>