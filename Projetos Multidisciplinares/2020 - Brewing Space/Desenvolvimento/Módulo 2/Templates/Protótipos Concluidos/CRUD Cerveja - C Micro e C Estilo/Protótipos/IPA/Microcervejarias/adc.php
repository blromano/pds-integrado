<?php
session_start();
require_once('../../conexao/request.class.php');

$id = $_SESSION['id'];

if (isset($_POST['nome_empresa']) && !empty($_POST['nome_empresa'])) {
	$foto = $_POST['foto'];
	$nome = $_POST['nome_empresa'];
	$cnpj = $_POST['cnpj'];
	$tel = $_POST['telefone'];
	$ende = $_POST['endereco'];
	$fb = $_POST['facebook'];
	$insta = $_POST['instagram'];
	$tt = $_POST['twitter'];
	$desc = $_POST['desc_empresa'];

	$r_sociais = "$fb, $insta, $tt";

	$conexao = new Receita();

	$microcervejaria = $conexao->addMicrocervejaria($nome, $tel, $ende, $desc, $r_sociais, $cnpj, $foto, $id);


	header("Location: index.php?sucess=1");

	exit;
}
header("Location: index.php?sucess=0");

/*
codigos referente a passagem do sucess. 
1 -> sucesso
0 -> erro
*/


?>