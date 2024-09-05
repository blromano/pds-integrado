<?php

include 'class/ConectarDB.php';
include 'class/Usuario.php';


$usuario = new Usuario();
$conexao = new ConectarBD();
$usuarioDAO = new UsuarioDAO();

$conexao->CriarConexao();

$usuario->setSenha($_POST['senha']);
$usuario->setemail($_POST['email']);

$conteudo = $usuarioDAO->logar($usuario->getSenha(), $usuario->getEmail());


if($conteudo['senha']== $usuario.getSenha && $conteudo['email']== $usuario.getEmail){

	echo 'Usuário Logado com sucesso';

}else{
	echo "Você não possui uma conta em nosso sistema";
}













?>