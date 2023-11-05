<?php
session_start();
include '../../../../controle/TiposEstabelecimentosDAO.php';
include '../../../../modelo/TiposEstabelecimentos.php';

$TiposEstabelecimentosDAO = new TiposEstabelecimentosDAO();
$TiposEstabelecimentos = new TiposEstabelecimentos();
$id = new TiposEstabelecimentos();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$verifica_nome = $TiposEstabelecimentosDAO->pesquisar_igual($_POST['nomeup']);
	if (empty($_POST['nomeup'])) {
		$_SESSION["Modal"] = ["Tipos de Estabelecimentos ","Por favor, informe um valor válido!"];
		header("location: ../../../../admin.php?pagina=10");
	}else{
		if ($verifica_nome > 0) {
			$_SESSION["Modal"] = ["Tipos de Estabelecimentos ","Tipos de estabelecimento já existe!"];
			header("location: ../../../../admin.php?pagina=10");
		} else {
			$id->setTIP_ID($_POST['idup']);
			$TiposEstabelecimentos->setTIP_NOME($_POST['nomeup']);
			$TiposEstabelecimentosDAO->editar($TiposEstabelecimentos, $id);
			$_SESSION["Modal"] = ["Tipos de Estabelecimentos ","Tipos de estabelecimento editado com sucesso!"];
			header("location: ../../../../admin.php?pagina=10");
		}
	}
};
?>