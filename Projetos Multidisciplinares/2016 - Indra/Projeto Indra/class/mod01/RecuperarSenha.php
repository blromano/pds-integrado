<?php

include_once "../../modelo/mod01/Usuario.php";
include_once "../../dao/mod01/UsuarioDAO.php";
$usuarioDAO = new UsuarioDAO();

$enderecoEmail = $_POST['rec_email'];
$emailExiste = $usuarioDAO->VerificarEmail($enderecoEmail);

if (!($emailExiste)) {

   
    $str = "abcABC123456789";
    $senha = str_shuffle($str);

    $usuarioDAO->RecuperarSenha($senha, $enderecoEmail);


    /* Recuperar os Dados do Formulário de Envio */
    $txtAssunto = "Recuperacao de Senha";
    $txtNome = "Usuario Indra";
    $txtEmail = $_POST["rec_email"];
//caso o nomes de pastas ou a disposção das mesmas mudarem, deve-se modificar o link
//caso o nomes de pastas ou a disposção das mesmas mudarem, deve-se modificar o link
    $txtMensagem = "<h3>Recuperação de Senha</h3><br><br>"
            . "Olá, Sua senha do INDRA é: $senha<br>"
            . "Para acessar o site por favor clique aqui:.<br>"
            . "http://localhost/integracao/indra/mod01/indexNivel1.php<br><br>"
            . "Caso queira modificar sua senha, va ate a pagina meu perfil!<br><br><br><br>"
            . "Caso você não tenha esquecido sua senha ignore este e-mail.";

    /* Montar o corpo do email */
    $corpoMensagem = "<img src='http://i63.tinypic.com/epglxx.png' width='216' height='131'></img>" . "<br><h2>Olá " . $txtNome . "!</h2>" . $txtMensagem;

    /* Extender a classe do phpmailer para envio do email */
    require_once("../../class/mod01/PHPMailer_5.2.4/class.phpmailer.php");

    /* Definir Usuário e Senha do Gmail de onde partirá os emails */
    define('GUSER', 'testeindrapds@gmail.com');
    define('GPWD', 'modulo01');

    function smtpmailer($para, $de, $nomeDestinatario, $assunto, $corpo) {
        global $error;
        $mail = new PHPMailer();
        /* Montando o Email */
        $mail->IsSMTP();         /* Ativar SMTP */
        $mail->SMTPAuth = true;  /* Autenticação ativada	 */
        $mail->SMTPDebug = 0;  /* Debugar: 1 = erros e mensagens, 2 = mensagens apenas */
        $mail->SMTPSecure = 'tls'; /* TLS REQUERIDO pelo GMail */
        $mail->Host = 'smtp.gmail.com'; /* SMTP utilizado */
        $mail->Port = 587;     /* A porta 587 deverá estar aberta em seu servidor */
        $mail->Username = GUSER;
        $mail->Password = GPWD;
        $mail->SetFrom($de, $nomeDestinatario);
        $mail->Subject = $assunto;
        $mail->Body = $corpo;
        $mail->AddAddress($para);
        $mail->IsHTML(true);

        /* Função Responsável por Enviar o Email */
        if (!$mail->Send()) {
            $error = "<font color='red'><b>Mail error: </b></font>" . $mail->ErrorInfo;
            return false;
        } else {
            $error = "<font color='blue'><b>Mensagem enviada com Sucesso!</b></font>";
            return true;
        }
    }

//$usuarioInstituicao->naoexiste();
    /* Passagem dos parametros: email do Destinatário, email do remetende, nome do remetente, assunto, mensagem do email. */
    if (smtpmailer($txtEmail, 'testeindrapds@gmail.com', $txtNome, $txtAssunto, $corpoMensagem)) {
        $_SESSION['USU_EMAIL'] = $endereco;
        $_SESSION['USU_NOME'] = $nome;
        Header("location: ../../indra/mod01/SenhaRecuperada.php"); // Redireciona para uma página de Sucesso.
    }
    if (!empty($error))
        echo $error;
	 echo "<script>alert('Não foi possível recuperar sua senha.')</script>";
} else {

   

    echo "<script>alert('Esse email não consta em nossa sistema. Verifique seus dados ou cadastre-se.')</script>";
	
}
echo "<script>history.go(-1)</script>";
?>