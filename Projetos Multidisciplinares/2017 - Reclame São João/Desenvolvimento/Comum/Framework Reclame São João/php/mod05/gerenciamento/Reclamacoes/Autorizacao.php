<?php
session_start();
include '../../../../controle/ReclamacoesDAO.php';
$ReclamacoesDAO = new ReclamacoesDAO();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	include '../../email.php';
	if (isset($_POST["btnAprovar"])) {
		$ReclamacoesDAO->alterarStatus(1,$_POST["aprovar"]);
		$emailConsumidor = $ReclamacoesDAO->obterEmailConsummidorPelaReclamacao($_POST["aprovar"]);
		$dados = $ReclamacoesDAO->obterDadosReclamacaoParaEmail($_POST["aprovar"]);
		enviarEmail("Reclamação Aprovada","Sua reclamação intitulada: '<b>".$dados["REC_TITULO_RECLAMACAO"]."</b>' contra a empresa '<b>".$dados["EST_NOME_FANTASIA"]."</b>' foi aprovada! <img src='https://i.imgur.com/9S3rj2v.png'>",$emailConsumidor);
		enviarEmail("Nova Reclamação","Prezado usuário,<br>O seu estabelecimento '<b>".$dados["EST_NOME_FANTASIA"]."</b>' recebeu uma nova denúncia!<p>Por favor, acesse nosso site para mais detalhes.</p>",$dados["USU_EMAIL"]);
	}elseif (isset($_POST["btnReprovar"])) {
		$ReclamacoesDAO->alterarStatus(-1,$_POST["reprovar"]);
		$emailConsumidor = $ReclamacoesDAO->obterEmailConsummidorPelaReclamacao($_POST["reprovar"]);
		$dados = $ReclamacoesDAO->obterDadosReclamacaoParaEmail($_POST["reprovar"]);
		enviarEmail("Reclamação Reprovada","Sua reclamação intitulada: '<b>".$dados["REC_TITULO_RECLAMACAO"]."</b>' contra a empresa '<b>".$dados["EST_NOME_FANTASIA"]."</b>' foi reprovada! <img src='https://i.imgur.com/1bzPk9i.png'><p>Por favor, consulte nossas regras...</p>",$emailConsumidor);
	}
	$_SESSION["Modal"] = ["Status","Status alterado com sucesso!"];
	header("location: ../../../../admin.php?pagina=2");
}
?>