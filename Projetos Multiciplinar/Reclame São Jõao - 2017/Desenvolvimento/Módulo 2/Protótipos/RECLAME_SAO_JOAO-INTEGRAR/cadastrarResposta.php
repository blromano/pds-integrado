<?php

include '../../modelo/RespostasReclamacoes.php';
include '../../controle/RespostaReclamacaoDAO.php';

$respostasreclamacoes = new RespostasReclamacoes();
$respostareclamacaoDAO = new RespostaReclamacaoDAO();

$respostasreclamacoes->setRER_DESCRICAO($_POST['RER_DESCRICAO']);
$respostasreclamacoes->setADM_ID($_POST['ADM_ID']);
$respostasreclamacoes->setREC_ID($_POST['REC_ID']);


$respostareclamacaoDAO->inserirResposta($respostasreclamacoes);



header("location:../../../php/mod03/mod03-gerenciar-reclamacao-nao-atendida.php");  




?>
