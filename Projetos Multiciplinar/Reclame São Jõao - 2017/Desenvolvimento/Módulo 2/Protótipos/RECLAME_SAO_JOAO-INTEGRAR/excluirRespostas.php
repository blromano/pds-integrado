<?php
include '../../controle/RespostaReclamacaoDAO.php';
include '../../modelo/RespostasReclamacoes.php';

$respostareclamacaoDAO = new RespostaReclamacaoDAO();

$respostareclamacaoDAO->excluirResposta($_POST['RER_ID']);

header("location:../../../php/mod03/mod03-gerenciar-reclamacao-atendida.php");
?>

