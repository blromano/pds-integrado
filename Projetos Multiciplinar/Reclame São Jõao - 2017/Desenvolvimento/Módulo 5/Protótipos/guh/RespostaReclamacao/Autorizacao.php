<?php
session_start();
include '../../../../controle/RespostaReclamacaoDAO.php';
$RespostaReclamacaoDAO = new RespostaReclamacaoDAO();
$php = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	include '../../email.php';
	if (isset($php["aprova"])) {
//troca o Statos
		$RespostaReclamacaoDAO->editarSuspender_PublicarADM($php['aprova'],$php['idstatus']);
//Pega os 2 email de consumidor e empresa
		$emailConsumidor = $RespostaReclamacaoDAO->obterEmailConsummidorPelaReclamacao($php["idusu"]);
                $emailEstabelecimento = $RespostaReclamacaoDAO-> obterEmailEstabelecimentoPelaReclamacao($php["idusu"]);
//pega os dados para cada email                 
		$dados = $RespostaReclamacaoDAO->obterDadosPelaReclamacaoParaEmail($php["idusu"]);
//Contuçao do email a ser enviado 
		enviarEmail("Reclamação respondida","Sua reclamação intitulada: '<b>".$dados["REC_TITULO_RECLAMACAO"]."</b>' contra a empresa '<b>".$dados["EST_NOME_FANTASIA"]."</b>' foi Respondida! <img src='https://i.imgur.com/9S3rj2v.png'>",$emailConsumidor);
		enviarEmail("Resposta reclamação enviada","Prezado '<b>".$dados["EST_NOME_FANTASIA"]."</b>'<br> Foi aprovado a Resposta da Denuncia intitulada: '<b>".$dados["REC_TITULO_RECLAMACAO"]."</b>' <img src='https://i.imgur.com/9S3rj2v.png'> <p>Para mais detalhes acesse nosso site.</p>",$emailEstabelecimento);
	}elseif (isset($php["reprovar"])) {
//troca o Statos            
		$ReclamacoesDAO->editarSuspender_PublicarADM($php['reprova'],$php['idstatus']);
//Pega os 2 email de consumidor e empresa
		$emailConsumidor = $RespostaReclamacaoDAO->obterEmailConsummidorPelaReclamacao($php["idusu"]);
                $emailEstabelecimento = $RespostaReclamacaoDAO-> obterEmailEstabelecimentoPelaReclamacao($php["idusu"]);
//pega os dados para cada email
		$dados = $ReclamacoesDAO->obterDadosReclamacaoParaEmail($php["idusu"]);
//Contuçao do email a ser enviado 
		enviarEmail("Reclamação respondida","Sua reclamação intitulada: '<b>".$dados["REC_TITULO_RECLAMACAO"]."</b>' contra a empresa '<b>".$dados["EST_NOME_FANTASIA"]."</b>' foi Respondida! <img src='https://i.imgur.com/9S3rj2v.png'>",$emailConsumidor);
		enviarEmail("Resposta reclamação enviada","Prezado '<b>".$dados["EST_NOME_FANTASIA"]."</b>'<br> Foi aprovado a Resposta da Denuncia intitulada: '<b>".$dados["REC_TITULO_RECLAMACAO"]."</b>' <img src='https://i.imgur.com/9S3rj2v.png'> <p>Para mais detalhes acesse nosso site.</p>",$emailEstabelecimento);
                }
	$_SESSION["Modal"] = ["Status","Status alterado com sucesso!"];
	header("location: ../../../index.php?pagina=3");
}



    

?> 
?>