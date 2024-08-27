<?php

require_once("../../../assets/phpmailer/class.phpmailer.php");

class Enviar_Email {

    private $titulo_email;
    private $email_destinatario;
    private $mensagem;
    private $assunto;

    function __construct() {
        
    }

    public function smtpmailer($destinatario, $remetente, $remetente_nome, $assunto, $corpo_email) {
        global $error;
        $GUSER = "equipe.maissaudesaojoao@gmail.com"; // Email do portal
        $GPWD = "maissaudepds2018"; // Senha do  portal
        //NAO MEXER NESSA PARTE DO CODIGO (parte que lida com o envio do email
        $mail = new PHPMailer();
        $mail->IsSMTP();  // Ativar SMTP
        $mail->CharSet = 'UTF-8';       //Aceitar caracteres especiais
        $mail->SMTPDebug = 1;  // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
        $mail->SMTPAuth = true;  // Autenticação ativada
        $mail->SMTPSecure = 'tls'; // DEIXAR TLS pela mor de deus 
        $mail->IsHTML(true); //definir que o email será enviado como HTML
        $mail->Host = 'smtp.gmail.com'; // SMTP utilizado
        $mail->Port = 587;    // A porta 587 deverá estar aberta em seu servidor
        $mail->Username = $GUSER; //pegar o email do portal (Dados do email de saida)
        $mail->Password = $GPWD; //pegar a senha do portal(Senha do email de saida)
        $mail->SetFrom($remetente, $remetente_nome);
        $mail->Subject = $assunto;
        $mail->Body = $corpo_email;
        $mail->AddAddress($destinatario);
        if (!$mail->Send()) {
            $error = 'Mail error: ' . $mail->ErrorInfo;
            return $error;
        } else {
            return "ok";
        }
    }

}
