<?php
session_start();
require_once('../../conexao/request.class.php');

if (isset($_POST['nome']) && !empty($_POST['nome'])) {
	$nome = $_POST['nome'];
	$abvmin = $_POST['abv_min'];
	$abvmax = $_POST['abv_max'];
	$ebcmin = $_POST['ebc_min'];
	$ebcmax = $_POST['ebc_max'];
	$ibu = $_POST['ibu_rec'];

	$conexao = new Receita();

	$info = $conexao->addEstilo($nome, $abvmin, $abvmax, $ebcmin, $ebcmax, $ibu);

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