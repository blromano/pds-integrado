<?php

	include '../../modelo/Produto.php';
	include '../../controle/ProdutoDAO.php';

		$produto = new Produto();

		$produtoDAO = new ProdutoDAO();

		$produto->setPDT_NOME($_POST['PDT_NOME']);
		$produto->setPDT_DESCRICAO_PRODUTO($_POST['PDT_DESCRICAO_PRODUTO']);
		$produto->setEST_ID($_POST['EST_ID']);
		$produto->setTPR_ID($_POST['TPR_ID']);

		$produtoDAO->inserirProduto($produto);

		header("location:../../est_perfil.php"); 
?>
