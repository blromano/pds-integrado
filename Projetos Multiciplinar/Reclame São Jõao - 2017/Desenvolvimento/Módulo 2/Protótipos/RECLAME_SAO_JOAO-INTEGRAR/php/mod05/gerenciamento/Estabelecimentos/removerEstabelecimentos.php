<?php
session_start();
include '../../../../controle/EstabelecimentosDAO.php';
$EstabelecimentosDAO = new EstabelecimentosDAO();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST['id'])){
		$EstabelecimentosDAO->excluirADM($_POST['id']);
		$_SESSION["Modal"] = ["Estabelecimentos","Estabelecimento bloquedo com sucesso!"];
		header("location: ../../../../admin.php?pagina=6");
	}
};
?> 