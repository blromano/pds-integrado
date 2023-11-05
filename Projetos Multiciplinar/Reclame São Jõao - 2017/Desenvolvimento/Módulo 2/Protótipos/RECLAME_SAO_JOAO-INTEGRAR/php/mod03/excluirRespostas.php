<?php
include '../../controle/RespostaReclamacaoDAO.php';
include '../../modelo/RespostasReclamacoes.php';

$respostareclamacaoDAO = new RespostaReclamacaoDAO();

$respostareclamacaoDAO->excluirResposta($_POST['RER_ID']);

header("location: gerenciar-reclamacao-atendida.php");
?>

