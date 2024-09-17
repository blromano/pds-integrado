<?php
session_start();
include '../../../../controle/TiposEstabelecimentosDAO.php';
include '../../../../modelo/TiposEstabelecimentos.php';

$TiposEstabelecimentosDAO = new TiposEstabelecimentosDAO();
$TiposEstabelecimentos    = new TiposEstabelecimentos();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$verifica_nome = $TiposEstabelecimentosDAO->pesquisar_igual($_POST['nomeadd']);
	if (empty($_POST['nomeadd'])) {
		$_SESSION["Modal"] = ["Tipos de Estabelecimentos","Por favor, informe um valor válido!"];
		header("location: ../../../../admin.php?pagina=10");
	}else{
		if ($verifica_nome > 0) {
			$_SESSION["Modal"] = ["Tipos de Estabelecimentos ","Tipo de estabelecimento já existente!"];
			header("location: ../../../../admin.php?pagina=10");
		}else{
			$TiposEstabelecimentos->setTIP_NOME($_POST['nomeadd']);
			$TiposEstabelecimentosDAO->inserir($TiposEstabelecimentos);
			$_SESSION["Modal"] = ["Tipos de Estabelecimentos ","Tipo de estabelecimento criado com sucesso!"];
			header("location: ../../../../admin.php?pagina=10");
		}
	}
};
?>