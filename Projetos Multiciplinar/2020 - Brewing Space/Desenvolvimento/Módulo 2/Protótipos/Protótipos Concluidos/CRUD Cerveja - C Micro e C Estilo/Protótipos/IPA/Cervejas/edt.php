<?php
session_start();
require_once('../../conexao/request.class.php');

$id = $_SESSION['id'];
if (isset($_POST['nome']) && !empty($_POST['nome'])) {

	$nome = $_POST['nome'];
	$estilo = $_POST['estilo'];
	$id_cerveja = $_GET['id'];

	$conexao = new Receita();

	$info = $conexao->altCerveja($id_cerveja, $nome, $estilo);

	header("Location: index.php?alt=1");

	exit;
}
header("Location: index.php?alt=0");
?>