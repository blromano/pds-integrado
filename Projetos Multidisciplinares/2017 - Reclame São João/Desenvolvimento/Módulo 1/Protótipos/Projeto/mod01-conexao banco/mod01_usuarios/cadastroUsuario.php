<html>

<head>
</head>

<body>
<?php

$nome = "Nome = " . $_POST["nome"];
$sobrenome = "Sobrenome = " . $_POST["sobrenome"];
$CEP = "CEP = " . $_POST["cep"];
$CPF = "CPF = " . $_POST["cpf"];
$senha = "senha = " . $_POST["senha"];
$confirmarsenha = "confirmarsenha = " . $_POST["confirmarsenha"];
$email = "email = " . $_POST["email"];
$rua = "rua = " . $_POST["rua"];
$bairro = "bairro = " . $_POST["bairro"];
$numero = "numero = " . $_POST["numero"];
$complemento = "complemento = " . $_POST["complemento"];
$estado = "estado = " . $_POST["estado"];
$cidade = "cidade = " . $_POST["cidade"];
$telefone1 = "telefone1 = " . $_POST["telefone1"];
$telefone2 = "telefone2 = " . $_POST["telefone2"];
$datanascimento = "datanascimento = " . $_POST["datanascimento"];
echo $nome;
echo $sobrenome;
echo $CEP;
echo $CPF;
echo $senha;
echo $confirmarsenha;
echo $email;
echo $rua;
echo $bairro;
echo $numero;
echo $complemento;
echo $estado;
echo $cidade;
echo $telefone1;
echo $telefone2;
echo $datanascimento;

exit();


$host = "localhost";
$user = "root";
$pass = "";
$banco="banco";
$conexao = mysql_connect ($host, $user, $pass) or die(mysql_error());
mysql_select_db($banco) or die (mysql_error());
?>

<?php
$nome=$_POST["nome"];
$sobrenome=$_POST["sobrenome"];
$CPF=$_POST["cpf"];
$CEP=$_POST["cep"];
$senha=$_POST["senha"];
$confirmarSenha=$_POST["confirmarsenha"];
$email=$_POST["email"];
$rua=$_POST["rua"];
$bairro=$_POST["bairro"];
$numero=$_POST["numero"];
$complemento=$_POST["complemento"];
$estado=$_POST["estado"];
$cidade=$_POST["cidade"];
$telefone1=$_POST["telefone1"];
$telefone2=$_POST["telefone2"];
$dataNascimento=$_POST["datanascimento"];

$sql = "INSERT INTO usuarios(nome,sobrenome,CPF,CEP,senha,confirmarSenha,email,rua,bairro,numero,complemento,estado,cidade,telefone1,telefone2,dataNascimento)
VALUES ('$nome','$sobrenome','$CPF','$CEP','$senha','$confirmarSenha','$email','$rua','$bairro','$numero','$complemento','$estado','$cidade','$telefone1','$telefone2','$dataNascimento')";


$query = mysql_query($sql);
echo "<h1>Cadastro realizado com sucesso!</h1>";
?>

</body>
</html>