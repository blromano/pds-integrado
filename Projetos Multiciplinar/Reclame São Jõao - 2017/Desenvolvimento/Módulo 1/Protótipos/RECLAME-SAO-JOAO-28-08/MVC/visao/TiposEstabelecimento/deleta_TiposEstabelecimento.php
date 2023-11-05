<?php

include '../../../../controle/TiposEstabelecimentosDAO.php';
include '../../../../modelo/TiposEstabelecimentos.php';

$bd = new TiposEstabelecimentosDAO();
$delip = new TiposEstabelecimentos();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$bd->excluir($_POST['delid']);
};

header("location: ../../../index.php?pagina=10");
?>
