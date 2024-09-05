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
$foto_perfil = $_POST["foto_perfil"];


$sql="update cadastrousuarios set nome=:nome, sobrenome=:sobrenome, cep=:cep, cpf=:cpf, senha:=senha, confirmar_senha=:confirmar_senha, email=:email, rua=:rua, bairro=:bairro, numero=:numero, complemento=:complemento, estado=:estado, cidade=:cidade, telefone1=:telefone1, telefone2=:telefone2, data_nascimento=:data_nascimento, foto_perfil=:foto_perfil where id=:id";

$resultado= $banco -> prepare ($sql);

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
$resultado-> bindParam(':id',$id);
$resultado -> execute();


header("location:index.php");

?>
