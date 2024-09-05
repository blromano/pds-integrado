<?php

include '../../../controle/ProdutoDAO.php';
$produtoDAO = new ProdutoDAO();
$produtoDAO->excluirProduto($_GET['id']);

header("location:../../../../php/mod03/mod03-perfil.php"); 
?>

