<?php

include '../../../../controle/TiposEstabelecimentosDAO.php';
include '../../../../modelo/TiposEstabelecimentos.php';

$bd = new TiposEstabelecimentosDAO();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$bd->excluir($_POST['delid']);
};
?>
