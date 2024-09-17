<?php
session_start();
include '../../../../controle/TiposEstabelecimentosDAO.php';
include '../../../../modelo/TiposEstabelecimentos.php';

$bd = new TiposEstabelecimentosDAO();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$bd->excluir($_POST['delid']);
	//$_SESSION["Modal"] = ["Tipos de Estabelecimentos ","Tipo de Estabelecimento deletado com sucesso!"];
	header("location: ../../../../admin.php?pagina=10");
};
?>
