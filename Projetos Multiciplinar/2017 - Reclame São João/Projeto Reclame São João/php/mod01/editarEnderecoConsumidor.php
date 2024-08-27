<?php
	include '../../modelo/Consumidor.php';
	include '../../controle/ConsumidorDAO.php';

			$consumidor = new Consumidor();

			$consumidorDAO = new ConsumidorDAO();

			$consumidor->setCON_ID($_POST['CON_ID']);
			$consumidor->setCON_NUMERO($_POST['CON_NUMERO']);
			$consumidor->setCON_COMPLEMENTO($_POST['CON_COMPLEMENTO']);
			
			$consumidorDAO->editarNumero_Complemento($consumidor);


	include '../../modelo/Localizacao.php';

	include '../../controle/LocalizacaoDAO.php';		
			
			$localizacao= new Localizacao();
			$localizacaoDAO = new LocalizacaoDAO();

			$localizacao->setLOC_ID($_POST['LOC_ID']);
			$localizacao->setLOC_RUA($_POST['LOC_RUA']);
			$localizacao->setLOC_BAIRRO($_POST['LOC_BAIRRO']);
			$localizacao->setLOC_CEP($_POST['LOC_CEP']);
			$localizacao->setLOC_CIDADE($_POST['LOC_CIDADE']);
			$localizacao->setLOC_ESTADO($_POST['LOC_ESTADO']);

			$localizacaoDAO->editarEndereco($localizacao);
		
			header("location:../../usu_perfil.php"); 
?>
