<?php
session_start();
require_once('../../conexao/request.class.php');

if (isset($_GET['cerveja']) && !empty($_GET['cerveja'])) {
	$id_cerveja = $_GET['cerveja'];
	echo "$id_cerveja";

	$conexao = new Receita();

	if ($cerveja = $conexao->delCerveja($id_cerveja)) {
		header("Location: index.php?delete=1");
		exit;
	}else{
		header("Location: index.php?delete=0");
		exit;
	}
}
header("Location: index.php");


?>