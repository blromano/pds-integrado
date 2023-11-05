<?php
include '../../modelo/Produto.php';
include '../../controle/ProdutoDAO.php';


$produto = new Produto();
$produtoDAO = new ProdutoDAO();
	
$produto->setPDT_NOME($_POST['PDT_NOME']);
$produto->setPDT_DESCRICAO_PRODUTO($_POST['PDT_DESCRICAO_PRODUTO']);
$produto->setPDT_ID($_POST['PDT_ID']);
$produto->setTRP_ID($_POST['TRP_ID']);
	
	$produtoDAO->editarProduto($produto);

header("location:../../est_perfil.php"); 

?>
