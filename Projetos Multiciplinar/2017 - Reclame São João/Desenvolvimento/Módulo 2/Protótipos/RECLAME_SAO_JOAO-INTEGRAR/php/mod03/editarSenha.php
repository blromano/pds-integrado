<?php
include '../../modelo/Usuario.php';
include '../../controle/UsuarioDAO.php';

	$usuario = new Usuario();
	$usuarioDAO = new UsuarioDAO();
		
	$usuario->setIdUsuario($_POST['USU_ID']);
	$usuario->setSenha($_POST['senha_antiga']);
	$usuario->setSenha_nova($_POST['senha_nova']);
	
	$usuarioDAO->salvar_senha($usuario);

	header("location:../../est_perfil.php"); 
?>