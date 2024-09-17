<?php
	include '../../modelo/Usuario.php';
	include '../../controle/UsuarioDAO.php';

		$usuario = new Usuario();
		
		$usuarioDAO = new UsuarioDAO();
			
		$usuario->setUSU_ID($_POST['USU_ID']);
		$usuario->setUSU_SENHA_NOVA($_POST['senha_nova']);
		
		$usuarioDAO->salvar_senha($usuario);

		header("location:../../est_perfil.php"); 
?>