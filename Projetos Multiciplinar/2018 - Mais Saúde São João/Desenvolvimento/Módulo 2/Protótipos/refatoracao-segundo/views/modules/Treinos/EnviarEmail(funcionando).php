<?php
$Nome		= $_POST["Nome"];	// Pega o valor do campo Nome
$Email		= $_POST["Email"];	// Pega o valor do campo Email
$Mensagem	= $_POST["Mensagem"];	// Pega os valores do campo Mensagem
$Assunto   	= $_POST["Assunto"];

//Esse é o corpo da mensagem;
$Vai 		= $Mensagem;

require_once("phpmailer/class.phpmailer.php");

define('GUSER', 'equipe.maissaudesaojoao@gmail.com');	// <-- Insira aqui o seu GMail
define('GPWD', 'maissaudepds2018');		// <-- Insira aqui a senha do seu GMail

function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
	global $error;
	//NAO MEXER NESSA PARTE DO CODIGO (parte que lida com o envio do email
	$mail = new PHPMailer();
	$mail->IsSMTP();		// Ativar SMTP
	$mail->SMTPDebug = 1;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
	$mail->SMTPAuth = true;		// Autenticação ativada
	$mail->SMTPSecure = 'tls';	// DEIXAR TLS pela mor de deus 
	$mail->Host = 'smtp.gmail.com';	// SMTP utilizado
	$mail->Port = 587;  		// A porta 587 deverá estar aberta em seu servidor
	$mail->Username = GUSER;//NAO MUDAR
	$mail->Password = GPWD;//NAO MUDAR
	$mail->SetFrom($de, $de_nome);
	$mail->Subject = $assunto;
	$mail->Body = $corpo;
	$mail->AddAddress($para);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return $error;
	} else {
		 return "ok";
		
	}
}


//EM ORDEM:EMAIL QUE RECEBE/EMAIL QUE ENVIA(NAO MEXER)/NOME DE QUEM ENVIA/ASSUNTO/CORPO DA MENSAGEM/
 if(smtpmailer($Email, 'equipe.maissaudesaojoao@gmail.com', 'Equipe Mais Saúde SJ', $Assunto, $Vai)=="ok") {
	echo "<script>alert('Email enviado com sucesso'); window.location = './?mod=treinos&sub=listar_ficha_treinamento';</script>";

}
if (!empty($error)) echo $error;
?>