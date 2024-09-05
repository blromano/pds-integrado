<?php
	include '../../modelo/Estabelecimentos.php';
	include '../../controle/EstabelecimentosDAO.php';


		$estabelecimento = new Estabelecimentos();

		$estabelecimentoDAO = new EstabelecimentosDAO();
			
		$estabelecimento->setEST_NUMERO($_POST['EST_NUMERO']);
		$estabelecimento->setEST_COMPLEMENTO($_POST['EST_COMPLEMENTO']);
			
		$estabelecimentoDAO->editarNumeroComplemento($estabelecimento);

		header("location:../../est_perfil.php"); 

?>
