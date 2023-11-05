<?php
include 'ConexaoBDD.php';
$nome = $_POST['nome'];
$sobrenome = $_POST["sobrenome"];
$cep = $_POST["cep"];
$cpf =  $_POST["cpf"];
$senha =  $_POST["senha"];
$confirmar_senha =  $_POST["confirmar_senha"];
$email = $_POST["email"];
$rua = $_POST["rua"];
$bairro = $_POST["bairro"];
$numero = $_POST["numero"];
$complemento = $_POST["complemento"];
$estado = $_POST["estado"];
$cidade = $_POST["cidade"];
$telefone1 = $_POST["telefone1"];
$telefone2 = $_POST["telefone2"];
$data_nascimento = $_POST["data_nascimento"];
$foto_perfil = $_POST["foto_perfil"]

$sql="insert into cadastrousuarios (nome, sobrenome, cep, cpf, senha, confirmarsenha,) values (:nome,:comentario)";

$resultado= $banco -> prepare ($sql);

$resultado-> bindParam(':nome',$nome);
$resultado-> bindParam(':comentario',$comentario);

$resultado -> execute();

header("location:index.php"); 




?>
