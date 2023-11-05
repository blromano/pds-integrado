<?php

include '../../../../controle/EstabelecimentosDAO.php';
$EstabelecimentosDAO = new EstabelecimentosDAO();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST['id'])){
		$EstabelecimentosDAO->excluir($_POST['id']);
		header("location: ../../../index.php?pagina=6");
	}
};
?> 