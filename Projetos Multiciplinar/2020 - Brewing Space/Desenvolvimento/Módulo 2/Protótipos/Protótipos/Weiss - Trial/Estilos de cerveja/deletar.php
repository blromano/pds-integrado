<?php
session_start();
require_once('../../conexao/request.class.php');

$_SESSION['id'] = 1;
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    $id = $_SESSION['id'];

	if (isset($_GET['estilo']) && !empty($_GET['estilo'])) {
		$id_estilo = $_GET['estilo'];

		$conexao = new Receita();

		if ($info = $conexao->delEstilo($id_estilo)) {
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