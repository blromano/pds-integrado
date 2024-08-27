<?php

include '../../../../controle/TiposReclamacaoDAO.php';
include '../../../../modelo/TiposReclamacao.php';

$tiposReclamacaoDAO = new TiposReclamacaoDAO();
$tiposReclamacao = new TiposReclamacao();
$vincular = $_POST['estabelecimento'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST['nome']) && !empty($_POST['id'])){
		if ($tiposReclamacaoDAO->pesquisar_igual($_POST['nome'], $vincular) > 0) {
			echo "<script>alert('Categoria já existente!')</script><script>window.location='../../../index.php?pagina=9';</script>";
		}else{
			$tiposReclamacao->setId($_POST['id']);
			$tiposReclamacao->setCategoria($_POST['nome']);			                       
			$tiposReclamacaoDAO->editar($tiposReclamacao,$vincular);
			echo "<script>alert('Categoria editada com sucesso!')</script><script>window.location='../../../index.php?pagina=9';</script>";
		}
	}else{
		echo "<script>alert('Campo em branco!')</script><script>window.location='../../../index.php?pagina=9';</script>";
	}	
};
?> 