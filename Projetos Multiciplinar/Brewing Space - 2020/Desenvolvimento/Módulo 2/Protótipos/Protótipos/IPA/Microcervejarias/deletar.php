<?php
session_start();
require_once('../../conexao/request.class.php');

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    $id = $_SESSION['id'];

	if (isset($_GET['microcervejaria']) && !empty($_GET['microcervejaria'])) {
		$id_micro = $_GET['microcervejaria'];

		$conexao = new Receita();

		if ($info = $conexao->delMicrocervejaria($id_micro)) {
			unset($_SESSION['id']);
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