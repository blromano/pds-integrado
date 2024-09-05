<?php

include '../../../../controle/ConsumidoresDAO.php';
$ConsumidoresDAO = new ConsumidoresDAO();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST['id'])){
		$ConsumidoresDAO->excluir($_POST['id']);
		header("location: ../../../index.php?pagina=5");
	}
};
?> 