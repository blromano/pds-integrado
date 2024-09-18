<?php
session_start();
require_once('../conexao/request.class.php');

if (isset($_POST['cpf']) && !empty($_POST['cpf'])) {

	$nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
	$email = $_POST['email'];
    $senha = $_POST['senha'];
    $foto = $_POST['foto'];

	$conexao = new Receita();

	$info = $conexao->addUser($nome, $cpf, $email, $senha, $foto);

	header("Location: login.php?sucess=1");

	exit;
}
header("Location: cadastro.php?sucess=0");

/*
codigos referente a passagem do sucess. 
1 -> sucesso
0 -> erro
*/


?>