<?php
include '../../controle/ProdutoDAO.php';
	$produtoDAO = new ProdutoDAO();
	$produtoDAO->excluirProduto($_POST['PDT_ID']);
	
	header("location:../../est_perfil.php"); 
?>

