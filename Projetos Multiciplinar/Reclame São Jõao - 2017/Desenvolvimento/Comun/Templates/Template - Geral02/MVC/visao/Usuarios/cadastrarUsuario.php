<?php
date_default_timezone_set('America/Sao_Paulo');

require_once '../../controle/phpMailer/PHPMailerAutoload.php';

include  '../../modelo/Localizacao.php';
include  '../../controle/LocalizacaoDAO.php';

include '../../modelo/Usuario.php';
include '../../controle/UsuarioDAO.php';

include '../../modelo/Consumidor.php';
include '../../controle/ConsumidorDAO.php';

$localizacao = new Localizacao();
$localizacaoDAO = new LocalizacaoDAO();

$localizacao->setEstado($_POST['estado']);
$localizacao->setRua($_POST['rua']); 
$localizacao->setBairro($_POST['bairro']);
$localizacao->setCep($_POST['cep']);
$localizacao->setCidade($_POST['cidade']);
$idLocalizacao = $localizacaoDAO->inserirLocalizacao($localizacao);

$localizacao->setIdLocalizacao($idLocalizacao);



$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO();

$usuario->setNome_Completo($_POST['nome_completo']);
$usuario->setEmail($_POST['email']);
$usuario->setFoto_perfil($_POST['foto_perfil']);
$usuario->setTelefone($_POST['telefone']);
$usuario->setSenha($_POST['senha']);
$idUsuario = $usuarioDAO->inserirUsuario($usuario);

$usuario->setIdUsuario($idUsuario);



$consumidor = new Consumidor();
$consumidorDAO = new ConsumidorDAO();

$consumidor->setNumero($_POST['numero']);
$consumidor->setComplemento($_POST['complemento']);
$consumidor->setTelefone2($_POST['telefone2']);
$consumidor->setData_nascimento($_POST['data_nascimento']);
$consumidor->setCpf($_POST['cpf']);
$consumidor->setIdUsuario($usuario->getIdUsuario());
$consumidor->setIdLocalizacao($localizacao->getIdLocalizacao());
//var_dump($consumidor);
//exit();
$id = $consumidorDAO->inserirConsumidor($consumidor);

$consumidor->setId($id);




$emailDestinatario = $_POST['email'];



$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp-mail.outlook.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "segundoano_ifsp@hotmail.com";
$mail->Password = "ifsp2015";



$mail->setFrom('segundoano_ifsp@hotmail.com', utf8_decode('Site Reclame São João'));
$mail->addReplyTo('segundoano_ifsp@hotmail.com', utf8_decode('Site Reclame São João'));
$mail->addAddress($emailDestinatario, '--');

$mail->Subject = utf8_decode('Validação de Cadastro');
$textoMsg = "Clique no link para ativar sua conta no portal Reclame São João: <a href=localhost/RECLAME-SAO-JOAO-28-08/MVC/visao/Usuarios/ativarCadastro.php?email=$emailDestinatario> Ativar Cadastro </a>";
$mail->msgHTML(utf8_decode($textoMsg));
$mail->AltBody = 'This is a plain-text message body';
if (!$mail->send()) {
    echo "Erro ao enviar email: " . $mail->ErrorInfo;
} else {
    echo "Email enviado com sucesso!";
}


header("location:../../../php/mod01/mod01-loginUsuario.php"); 

?>
