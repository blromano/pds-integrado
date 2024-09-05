<?php
session_start();
require_once('../../conexao/request.class.php');

$id = $_SESSION['id'];
if (isset($_POST['nome']) && !empty($_POST['nome'])) {

	$ing = $_POST['ing'];
	$preco = $_POST['prec'];
	$quantidade = $_POST['qtd'];
	$data = $_POST['data'];
	$id_est = $_GET['id'];

	$conexao = new Receita();

	$info = $conexao->altCerveja($id_est, $ing, $preco, $quantidade, $data);

	header("Location: index.php?alt=1");

	exit;
}
header("Location: index.php?alt=0");
?>