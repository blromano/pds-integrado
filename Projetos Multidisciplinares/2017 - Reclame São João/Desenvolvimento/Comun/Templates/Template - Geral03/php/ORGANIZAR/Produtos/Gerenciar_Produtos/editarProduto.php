<?php
include '../../../modelo/Produto.php';
include '../../../controle/ProdutoDAO.php';


$produto = new Produto();
$produtoDAO = new ProdutoDAO();
	
$produto->setPRO_ID($_POST['PRO_ID']);
$produto->setPRO_NOME_PRODUTO($_POST['PRO_NOME_PRODUTO']);
$produto->setPRO_DESCRICAO_PRODUTO($_POST['PRO_DESCRICAO_PRODUTO']);
$produto->setIPO_ID($_POST['IPO_ID']);
	
	$produtoDAO->editarProduto($produto);

header("location:../../../../php/mod03/mod03-perfil.php"); 

?>
