<?php

	include '../../modelo/Usuario.php';

	include '../../controle/UsuarioDAO.php';		
			
			$usuario= new Usuario();
			$usuarioDAO = new UsuarioDAO();

			$usuario->setUSU_NOME($_POST['USU_NOME']);
			//$usuario->setUSU_EMAIL($_POST['USU_EMAIL']);
			$usuario->setUSU_TELEFONE($_POST['USU_TELEFONE']);
			$usuario->setUSU_ID($_POST['USU_ID']);
			
			
			
			$usuarioDAO->editarInformacoesPessoais($usuario);
	
	include '../../modelo/Estabelecimentos.php';
    include '../../controle/EstabelecimentosDAO.php';

	// Criando um Novo Estabelecimento
        $estabelecimentos = new Estabelecimentos();

        $estabelecimentosDAO = new EstabelecimentosDAO();


	// Inserindo os dados do Estabelecimento no "SETs" em modelo	
        $estabelecimentos->setEST_NOME_FANTASIA($_POST['EST_NOME_FANTASIA']);
        //$estabelecimentos->setEST_CNPJ($_POST['EST_CNPJ']);
		$estabelecimentos->setEST_FACEBOOK_EMPRESA($_POST['EST_FACEBOOK_EMPRESA']);
        $estabelecimentos->setEST_SITE_EMPRESA($_POST['EST_SITE_EMPRESA']);
        $estabelecimentos->setEST_NOME_RESPONSAVEL($_POST['EST_NOME_RESPONSAVEL']);
        $estabelecimentos->setTES_ID($_POST['TES_ID']);
		$estabelecimentos->setEST_ID($_POST['EST_ID']);
		
			session_start();
			$_SESSION['EST_NOME_FANTASIA'] = $_POST['EST_NOME_FANTASIA'];
        
		$estabelecimentosDAO->editarInformacoesPessoais($estabelecimentos);
			
			header("location:../../est_perfil.php"); 
?>
