<?php

session_start();
include ('../../controle/ConsideracaoFinalDAO.php');
include ('../../controle/ReclamacoesDAO.php');
$ConsideracaoFinalDAO = new ConsideracaoFinalDAO;
$ReclamacaoDAO = new ReclamacoesDAO;

$primeiromaiusculo = $ReclamacaoDAO->primeiroMaiusculo();
$COF_DESCRICAO = $_POST['COF_DESCRICAO'];
$COF_STATUS_RESOLVIDO = $_POST['consideracao'];
$REC_ID = $_SESSION["not_reclamacao_id"];

$consideracao = new ConsideracaoFinal();
$consideracao->setCOF_DESCRICAO($COF_DESCRICAO);
$consideracao->setREC_ID($REC_ID);
$consideracao->setCOF_STATUS_RESOLVIDO($COF_STATUS_RESOLVIDO);

$resultado = $ConsideracaoFinalDAO->inserirConsideracaoFinal($consideracao);

if($resultado==true){
	echo "<script>alert('Consideracao Final enviada sucesso')</script><script>window.location='../../rec_reclamacaoeavaliacao.php?pagina=2.php';</script>";
}else{
	echo "<script>alert('Consideracao Final não foi enviada sucesso')</script><script>window.location='../../rec_reclamacaoeavaliacao.php?pagina=2.php';</script>";
}

?>