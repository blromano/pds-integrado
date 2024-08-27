<?php
	include '../../modelo/Consumidor.php';
	include '../../controle/ConsumidorDAO.php';


		$consumidor = new Consumidor();

		$consumidorDAO = new ConsumidorDAO();
			
		$consumidor->setCON_NUMERO($_POST['CON_NUMERO']);
		$consumidor->setCON_COMPLEMENTO($_POST['CON_COMPLEMENTO']);
			
		$consumidorDAO->editarNumeroComplemento($consumidor);

		header("location:../../usu_perfil.php"); 

?>
