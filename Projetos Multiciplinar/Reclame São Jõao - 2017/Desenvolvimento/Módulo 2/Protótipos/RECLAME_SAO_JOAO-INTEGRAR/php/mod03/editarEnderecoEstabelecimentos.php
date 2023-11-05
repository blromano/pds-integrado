<?php
include '../../modelo/Estabelecimentos.php';
include '../../controle/EstabelecimentosDAO.php';

		$estabelecimento = new Estabelecimentos();
		$estabelecimentoDAO = new EstabelecimentosDAO();

		$estabelecimento->setEST_ID($_POST['EST_ID']);
		$estabelecimento->setEST_NUMERO_ENDERECO($_POST['EST_NUMERO_ENDERECO']);
		$estabelecimento->setEST_COMPLEMENTO($_POST['EST_COMPLEMENTO']);
		
		$estabelecimentoDAO->editarNumero_Complemento($estabelecimento);


include '../../modelo/Localizacao.php';
include '../../controle/LocalizacaoDAO.php';		
		
		$localizacao= new Localizacao();
		$localizacaoDAO = new LocalizacaoDAO();

		$localizacao->setLOC_ID($_POST['LOC_ID']);
		$localizacao->setLOC_RUA($_POST['LOC_RUA']);
		$localizacao->setLOC_BAIRRO($_POST['LOC_BAIRRO']);
		$localizacao->setLOC_CEP($_POST['LOC_CEP']);
		$localizacao->setLOC_CIDADE($_POST['LOC_CIDADE']);

		$localizacaoDAO->editarEndereco($localizacao);
	
		header("location:../../est_perfil.php"); 

?>
