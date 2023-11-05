<?php
include '../../modelo/Estabelecimentos.php';
include '../../controle/EstabelecimentosDAO.php';

		$estabelecimento = new Estabelecimentos();
		$estabelecimentoDAO = new EstabelecimentosDAO();

		$estabelecimento->setEST_NOME_FANTASIA($_POST['EST_NOME_FANTASIA']);
		$estabelecimento->setEST_NOME_RESPONSAVEL($_POST['EST_NOME_RESPONSAVEL']);
		$estabelecimento->setEST_CNPJ($_POST['EST_CNPJ']);
		$estabelecimento->setEST_SITE_EMPRESA($_POST['EST_SITE_EMPRESA']);
		$estabelecimento->setTES_ID($_POST['TES_ID']);
		$estabelecimento->setEST_ID($_POST['EST_ID']);

		$estabelecimentoDAO->editarInformacoesPessoais($estabelecimento);


include '../../modelo/Usuario.php';
include '../../controle/UsuarioDAO.php';		
		
		$usuario= new Usuario();
		$usuarioDAO = new UsuarioDAO();

		$usuario->setUSU_NOME($_POST['USU_NOME']);
		$usuario->setUSU_EMAIL($_POST['USU_EMAIL']);
		$usuario->setUSU_ID($_POST['USU_ID']);
		
		
		$usuarioDAO->editarInformacoesPessoais($usuario);
		
		header("location:../../est_perfil.php"); 

?>
