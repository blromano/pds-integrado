<?php
include '../modelo/Post.php';
include '../controle/PostDAO.php';


$post = new Post();
$postDAO = new PostDAO();

$post->setId($_POST ['id']);
$post->setNome($_POST['nome']);
$post->setComentario($_POST['comentario']);

$postDAO->editarPost($post);


header("location:index.php");

?>
