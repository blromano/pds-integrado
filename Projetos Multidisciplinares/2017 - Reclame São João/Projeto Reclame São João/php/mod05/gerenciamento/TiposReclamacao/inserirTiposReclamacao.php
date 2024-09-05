<?php
session_start();
include '../../../../controle/TiposReclamacaoDAO.php';
include '../../../../modelo/TiposReclamacao.php';

$tiposReclamacaoDAO = new TiposReclamacaoDAO();
$tiposReclamacao = new TiposReclamacao();
$vincular = $_POST['estabelecimento'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(!empty($_POST['nome'])){
		if ($tiposReclamacaoDAO->pesquisar_igual($_POST['nome'],$vincular) > 0) {
			$_SESSION["Modal"] = ["Tipos de Reclama??o","Campo j? existente!"];
			header("location: ../../../../admin.php?pagina=9");
		}else{
			$tiposReclamacao->setCategoria($_POST['nome']);
			$tiposReclamacaoDAO->inserir($tiposReclamacao,$vincular);
			$_SESSION["Modal"] = ["Tipos de Reclama??o","Categoria inserida com sucesso!"];
			header("location: ../../../../admin.php?pagina=9");
		}
	}else{
		$_SESSION["Modal"] = ["Tipos de Reclama??o","Campo em branco!"];
		header("location: ../../../../admin.php?pagina=9");
	}
};
?> 