<?php

include '../../controle/UsuarioDAO.php';
include '../../controle/ConsumidorDAO.php';

	// Pega o E-mail Inserido no Formulário
		$emailAtivacao = $_GET['email'];

	// Criar Novo Usuário$usuarioDAO
		$usuarioDAO = new UsuarioDAO();
		$idUsuario = $usuarioDAO->buscarUsuario($emailAtivacao);

	// Chama a função para Ativar o Cadastro
		$usuarioDAO->ativarCadastro($idUsuario);

	// Exibir a mensagem que o cadastro foi validado com sucesso
		session_start();
		$_SESSION['cadastroValidado'] = "Cadastro Validado com Sucesso!";

	header("location:../../usu_loginUsuario.php"); 


?>
