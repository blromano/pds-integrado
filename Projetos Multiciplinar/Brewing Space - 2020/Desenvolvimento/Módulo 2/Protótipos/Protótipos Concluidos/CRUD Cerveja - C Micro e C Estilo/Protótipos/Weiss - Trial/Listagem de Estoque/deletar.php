<?php
session_start();
require_once('../../conexao/request.class.php');

if (isset($_GET['estoque']) && !empty($_GET['estoque'])) {
	$id_estoque = $_GET['estoque'];
	echo "$id_estoque";

	$conexao = new Receita();

	if ($cerveja = $conexao->delEstoque($id_estoque)) {
		header("Location: index.php?delete=1");
		exit;
	}else{
		header("Location: index.php?delete=0");
		exit;
	}
}
header("Location: index.php");


?>