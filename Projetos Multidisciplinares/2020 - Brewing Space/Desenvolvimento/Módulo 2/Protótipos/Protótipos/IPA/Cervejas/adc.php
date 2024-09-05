<?php
session_start();
require_once('../../conexao/request.class.php');

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
	$id = $_SESSION['id'];

	if (isset($_POST['nome']) && !empty($_POST['nome'])) {

		$fk_estilo = $_POST['estilo'];
		$nome = $_POST['nome'];

		$conexao = new Receita();

		$info = $conexao->getIdMicrocervejaria($id);
		$fk_micro = $info->MIC_ID;

		$info = $conexao->addCerveja($nome, $fk_estilo, $fk_micro, $id);
		header("Location: index.php?sucess=1");
		exit;
	}

}
header("Location: index.php?sucess=0");


/*
codigos referente a passagem do sucess. 
1 -> sucesso
0 -> erro
*/


?>