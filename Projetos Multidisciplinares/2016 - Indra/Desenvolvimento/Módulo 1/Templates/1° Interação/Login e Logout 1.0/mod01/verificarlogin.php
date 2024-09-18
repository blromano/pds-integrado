<?php

include 'class/UsuarioDAO.php';



$usuarioDAO = new UsuarioDAO();
$usuario = new Usuario();
$conexao = new Database();

$conexao->CriarConexao();

$usuario->setSenha($_POST['senha']);
$usuario->setemail($_POST['email']);

$conteudo = $usuarioDAO->logar($usuario->getSenha(),$usuario->getEmail());



if($conteudo['USU_SENHA'] == $usuario->getSenha() && $conteudo['USU_EMAIL']== $usuario->getEmail()){


	header('Location: indexNivel2.html');

}else{
	
	
	echo "<script>alert('Email ou senha inválidos!'); 
	window.location='indexNivel1%20.php'</script>";


}













?>