<?php
	include '../../modelo/Estabelecimentos.php';
	include '../../controle/EstabelecimentosDAO.php';


		$estabelecimento = new Estabelecimentos();
		
		$estabelecimentoDAO = new EstabelecimentosDAO();
		
		$estabelecimento->setEST_ID($_POST['EST_ID']);
		$estabelecimento->setEST_PUBLICO_ALVO($_POST['EST_PUBLICO_ALVO']);
		
		$estabelecimentoDAO->editarPublicoAlvo($estabelecimento);

		header("location:../../est_perfil.php"); 

?>
