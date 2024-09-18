<?php
include 'ConexaoBDD.php';
$id = $_POST ['id'];
$nome = $_POST['nome'];
$comentario = $_POST['comentario'];


$sql="update cadastro set nome=:nome,comentario=:comentario where id=:id";

$resultado= $banco -> prepare ($sql);

$resultado-> bindParam(':nome',$nome);
$resultado-> bindParam(':comentario',$comentario);
$resultado-> bindParam(':id',$id);
$resultado -> execute();


header("location:index.php");

?>
