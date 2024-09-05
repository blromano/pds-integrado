<html>

<head>
</head>

<body>
<?php

$nome = "Nome = " . $_POST["nome"];
$sobrenome = "Sobrenome = " . $_POST["sobrenome"];
$cep = "cep = " . $_POST["cep"];
$cpf = "cpf = " . $_POST["cpf"];
$senha = "senha = " . $_POST["senha"];
$confirmar_senha = "confirmarsenha = " . $_POST["confirmar_senha"];
$email = "email = " . $_POST["email"];
$rua = "rua = " . $_POST["rua"];
$bairro = "bairro = " . $_POST["bairro"];
$numero = "numero = " . $_POST["numero"];
$complemento = "complemento = " . $_POST["complemento"];
$estado = "estado = " . $_POST["estado"];
$cidade = "cidade = " . $_POST["cidade"];
$telefone1 = "telefone1 = " . $_POST["telefone1"];
$telefone2 = "telefone2 = " . $_POST["telefone2"];
$data_nascimento = "datanascimento = " . $_POST["data_nascimento"];
/*echo $nome;
echo $sobrenome;
echo $cep;
echo $cpf;
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
*/

//$servidor = "localhost";
$user = "root";
$pass = "";
$banco="cadastrousuarios";
$conexao = mysql_connect ("localhost", $user, $pass) or die(mysql_error());
mysql_select_db($banco) or die (mysql_error());
?>

<?php
$nome=$_POST["nome"];
$sobrenome=$_POST["sobrenome"];
$cpf=$_POST["cpf"];
$cep=$_POST["cep"];
$senha=$_POST["senha"];
$confirmar_senha=$_POST["confirmar_senha"];
$email=$_POST["email"];
$rua=$_POST["rua"];
$bairro=$_POST["bairro"];
$numero=$_POST["numero"];
$complemento=$_POST["complemento"];
$estado=$_POST["estado"];
$cidade=$_POST["cidade"];
$telefone1=$_POST["telefone1"];
$telefone2=$_POST["telefone2"];
$data_nascimento=$_POST["data_nascimento"];
$data_foto=$_POST["foto_perfil"];

$sql = "INSERT INTO cadastrousuarios(nome,sobrenome,cpf,cep,senha,confirmar_senha,email,rua,bairro,numero,complemento,estado,cidade,telefone1,telefone2,data_nascimento)
VALUES ('nome','$sobrenome','$cpf','$cep','$senha','$confirmar_senha','$email','$rua','$bairro','$numero','$complemento','$estado','$cidade','$telefone1','$telefone2','$data_nascimento')";


$query = mysql_query($sql);
echo "<h1>Cadastro realizado com sucesso!</h1>";
?>

</body>
</html>