<?php

include '../../../../controle/TiposReclamacaoDAO.php';
include '../../../../modelo/TiposReclamacao.php';

$tiposReclamacaoDAO = new TiposReclamacaoDAO();
$tiposReclamacao = new TiposReclamacao();
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(!empty($_POST['nome'])){
		if ($tiposReclamacaoDAO->pesquisar_igual($_POST['nome']) > 0) {
			echo "<script>alert('Categoria j? existente!')</script><script>window.location='../../../index.php?pagina=9';</script>";
		}else{
			$tiposReclamacao->setCategoria($_POST['nome']);
			$tiposReclamacaoDAO->inserir($tiposReclamacao);
			echo "<script>alert('Categoria inserida com sucesso!')</script><script>window.location='../../../index.php?pagina=9';</script>";
		}
	}else{
		echo "<script>alert('Campo em branco!')</script><script>window.location='../../../index.php?pagina=9';</script>";
	}
};
?> 