<?php
session_start();
require_once('../../conexao/request.class.php');

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    $id = $_SESSION['id'];

	$nome = $_POST['nome'];
	$estilo = $_POST['estilo'];
	$id_cerveja = $_GET['id'];

	$conexao = new Receita();

	$id_micro = $conexao->getIdMicrocervejaria($id);
	if ($id_micro = $conexao->getIdMicrocervejaria($id)) {
		$id_micro = $id_micro->MIC_ID;
	}else{
		header("Location: index.php?alt=0");
		exit;
	}

	$info = $conexao->altCerveja($id_cerveja, $nome, $estilo, $id_micro);

	header("Location: index.php?alt=1");

	exit;
}
header("Location: index.php?alt=0");
?>
