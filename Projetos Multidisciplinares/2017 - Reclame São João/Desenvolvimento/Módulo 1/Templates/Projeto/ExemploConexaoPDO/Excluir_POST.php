<?php

 include 'ConexaoBDD.php';
$id = $_GET ['id'];



$sql="delete From cadastro where id=:id";

$resultado= $banco -> prepare ($sql);


$resultado-> bindParam(':id',$id);
$resultado -> execute();


header("location:index.php"); 
?>

