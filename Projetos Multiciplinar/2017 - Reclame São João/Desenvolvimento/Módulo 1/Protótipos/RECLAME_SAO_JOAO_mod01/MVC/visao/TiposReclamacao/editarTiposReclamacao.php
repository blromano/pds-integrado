<?php

include '../../../../controle/TiposReclamacaoDAO.php';
include '../../../../modelo/TiposReclamacao.php';

$tiposReclamacaoDAO = new TiposReclamacaoDAO();
$tiposReclamacao = new TiposReclamacao();
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST['nome']) && isset($_POST['status']) && !empty($_POST['id'])){
		if ($tiposReclamacaoDAO->pesquisar_igual($_POST['nome'], $_POST['id']) > 0) {
			echo "<script>alert('Categoria j? existente!')</script><script>window.location='../../../index.php?pagina=9';</script>";
		}else{
			$tiposReclamacao->setId($_POST['id']);
			$tiposReclamacao->setCategoria($_POST['nome']);
			$tiposReclamacao->setStatus($_POST['status']);
			$tiposReclamacaoDAO->editar($tiposReclamacao);
			echo "<script>alert('Categoria editada com sucesso!')</script><script>window.location='../../../index.php?pagina=9';</script>";
		}
	}else{
		echo "<script>alert('Campo em branco!')</script><script>window.location='../../../index.php?pagina=9';</script>";
	}	
};
?> 