<?php
session_start();
include '../../../../controle/ConsumidorDAO.php';
$ConsumidorDAO = new ConsumidorDAO();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST['id'])){
		$ConsumidorDAO->excluirADM($_POST['id']);
		$_SESSION["Modal"] = ["Consumidores","Consumidor bloquedo com sucesso!"];
		header("location: ../../../../admin.php?pagina=5");
	}
};
?> 