<?php

session_start();
$email = $_POST['email'];
$senha = $_POST['senha'];


include 'class/UsuarioDAO.php';



$usuarioDAO = new UsuarioDAO();
$usuario = new Usuario();
$conexao = new Database();

$conexao->CriarConexao();

$usuario->setSenha($_POST['senha']);
$usuario->setemail($_POST['email']);

$conteudo = $usuarioDAO->logar($usuario->getSenha(),$usuario->getEmail());



if($conteudo['USU_SENHA'] == $usuario->getSenha() && $conteudo['USU_EMAIL']== $usuario->getEmail()){

	$_SESSION['email'] = $email;
	$_SESSION['senha'] = $senha;

	header('Location: indexNivel2.php');

}else{
	


		echo "<script>alert('Email ou senha inválidos!')</script>";
		

		$_SESSION['email'] = $email;
	

		echo" <script> window.location='indexNivel1%20.php' </script>";
}













?>