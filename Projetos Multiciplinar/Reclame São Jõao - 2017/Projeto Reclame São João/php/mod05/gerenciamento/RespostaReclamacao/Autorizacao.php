<?php
session_start();
include '../../../../controle/RespostaReclamacaoDAO.php';
$RespostaReclamacaoDAO = new RespostaReclamacaoDAO();

include '../../../../controle/EstabelecimentosDAO.php';
$EstabelecimentosDAO = new EstabelecimentosDAO();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	include '../../email.php';
	
	if (isset($_POST["btnAprovar"])) {
		$RespostaReclamacaoDAO->alterarStatus(1,$_POST["aprovar"]);
		$emailConsumidor = $RespostaReclamacaoDAO->obterEmailConsumidorPelaResposta($_POST["reprovar"]);
		$dados = $RespostaReclamacaoDAO->obterDadosRespostaParaEmail($_POST["aprovar"]);
		enviarEmail("Resposta da empresa","A empresa: <b>".$dados['EST_NOME_FANTASIA']."</b> respondeu sua reclamação (<b>".$dados['REC_TITULO_RECLAMACAO']."</b>) <br>Acesse nosso portal para mais detalhes...",$emailConsumidor);
	}elseif (isset($_POST["btnReprovar"])) {
		$RespostaReclamacaoDAO->alterarStatus(-1,$_POST["reprovar"]);
		$emailEstabelecimento = $RespostaReclamacaoDAO->obterEmailEstabelecimentoPelaResposta($_POST["aprovar"]);
		$dados = $RespostaReclamacaoDAO->obterDadosRespostaParaEmail($_POST["reprovar"]);
		enviarEmail("Resposta reprovada","Sua resposta: '<small>".$dados["RER_DESCRICAO"]."</small>' foi reprovada! <img src='https://i.imgur.com/1bzPk9i.png'><p>Por favor, consulte nossas regras...</p>",$emailEstabelecimento);
	}
	$_SESSION["Modal"] = ["Status","Status alterado com sucesso!"];
	header("location: ../../../../admin.php?pagina=3");
}
?>