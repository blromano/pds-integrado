<?php
date_default_timezone_set('America/Sao_Paulo');

include '../../MVC/modelo/Usuario.php';
include '../../MVC/controle/UsuarioDAO.php';

$emailDestinatario = $_POST['email'];
$novaSenha = geraSenha(10,true,true,true);


//echo $emailDestinatario;

//exit();

require '../../MVC/controle/phpMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();

$mail->SMTPDebug = 0;

$mail->Debugoutput = 'html';

$mail->Host = 'smtp-mail.outlook.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

$usuario = new Usuario();
$usuario->setEmail($emailDestinatario);

$usuarioDAO = new UsuarioDAO();
$usuarioExistente = $usuarioDAO->buscarUsuario($usuario);

if($usuarioExistente)
{
	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = "segundoano_ifsp@hotmail.com";
	$mail->Password = "ifsp2015";
	$mail->setFrom('segundoano_ifsp@hotmail.com', utf8_decode('Site Reclame São João'));
	$mail->addReplyTo('segundoano_ifsp@hotmail.com', utf8_decode('Site Reclame São João'));
	$mail->addAddress($emailDestinatario, '--');
	$mail->Subject = utf8_decode('Recuperação de senha');

	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	$textoMsg = "Este é um e-mail de recuperação de senha para o site Reclame São João, sua nova senha é: <b>$novaSenha</b>.";
	$mail->msgHTML(utf8_decode($textoMsg));

	//Replace the plain text body with one created manually
	$mail->AltBody = 'This is a plain-text message body';

	//Attach an image file
	//$mail->addAttachment('images/phpmailer_mini.png');

	//send the message, check for errors
	if (!$mail->send()) {
		echo "Erro ao enviar email: " . $mail->ErrorInfo;
	} else {
		echo "Email enviado com sucesso!";
	}
} else {
	echo "Usuário não existe no Banco de Dados. Email não enviado!";
}

function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false)
{
	$lmin = 'abcdefghijklmnopqrstuvwxyz';
	$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$num = '1234567890';
	$simb = '!@#$%*-';
	$retorno = '';
	$caracteres = '';
	$caracteres .= $lmin;
	if ($maiusculas) $caracteres .= $lmai;
	if ($numeros) $caracteres .= $num;
	if ($simbolos) $caracteres .= $simb;
	$len = strlen($caracteres);
	for ($n = 1; $n <= $tamanho; $n++) {
	$rand = mt_rand(1, $len);
	$retorno .= $caracteres[$rand-1];
}
return $retorno;
}


