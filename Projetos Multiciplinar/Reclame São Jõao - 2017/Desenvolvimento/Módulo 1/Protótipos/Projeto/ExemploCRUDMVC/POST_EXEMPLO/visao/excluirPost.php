<?php

include '../controle/PostDAO.php';
$postDAO = new PostDAO();
$postDAO->excluirPost($_GET['id']);

header("location:index.php"); 
?>

