<?php
session_start();
require_once('../../conexao/request.class.php');

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    $id = $_SESSION['id'];

    if (isset($_GET['cerveja']) && !empty($_GET['cerveja'])) {
		$id_cerveja = $_GET['cerveja'];

		$conexao = new Receita();

		$id_micro = $conexao->getIdMicrocervejaria($id);
		
		if ($id_micro = $conexao->getIdMicrocervejaria($id)) {
			$id_micro = $id_micro->MIC_ID;
		}else{
			header("Location: index.php?delete=0");
			exit;
		}

		if ($info = $conexao->delCerveja($id_cerveja, $id_micro)) {
			header("Location: index.php?delete=1");
			exit;
		}else{
			header("Location: index.php?delete=0");
			exit;
		}
	}
}
header("Location: index.php");


?>