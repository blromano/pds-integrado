<?php
session_start();
include '../../../../controle/TiposReclamacaoDAO.php';
include '../../../../modelo/TiposReclamacao.php';

$tiposReclamacaoDAO = new TiposReclamacaoDAO();
$tiposReclamacao = new TiposReclamacao();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST['id'])){
		$tiposReclamacaoDAO->excluir($_POST['id']);
		header("location: ../../../../admin.php?pagina=9");
	}
};
?> 