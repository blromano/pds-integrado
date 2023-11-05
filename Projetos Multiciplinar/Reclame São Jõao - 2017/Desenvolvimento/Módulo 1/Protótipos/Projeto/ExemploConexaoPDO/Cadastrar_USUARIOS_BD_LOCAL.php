<?php
include 'ConexaoBDD.php';
$id = $_POST['id'];
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

$sql="insert into cadastrousuarios (id, nome, sobrenome, cep, cpf, senha, confirmar_senha, email, rua, bairro, numero, complemento, estado, cidade, telefone1, telefone2, data_nascimento, foto_perfil) values (:id, :nome, :sobrenome, :cep, :cpf, :senha, :confirmar_senha, :email, :rua, :bairro, :numero, :complemento, :estado, :cidade, :telefone1, :telefone2, :data_nascimento, :foto_perfil)";

$resultado= $banco -> prepare ($sql);


$resultado-> bindParam(':id',$id;
$resultado-> bindParam(':nome',$nome);
$resultado-> bindParam(':sobrenome',$sobrenome);
$resultado-> bindParam(':cep',$cep);
$resultado-> bindParam(':cpf',$cpf);
$resultado-> bindParam(':senha',$senha);
$resultado-> bindParam(':confirmar_senha',$confirmar_senha);
$resultado-> bindParam(':email',$email);
$resultado-> bindParam(':rua',$rua);
$resultado-> bindParam(':bairro',$bairro);
$resultado-> bindParam(':complemento',$numero);
$resultado-> bindParam(':estado',$estado);
$resultado-> bindParam(':cidade',$cidade);
$resultado-> bindParam(':telefone1',$telefone1);
$resultado-> bindParam(':telefone2',$telefone2);
$resultado-> bindParam(':data_nascimento',$data_nascimento);
$resultado-> bindParam(':foto_perfil',$foto_perfil);


$resultado -> execute();

header("location:index.php"); 




?>
