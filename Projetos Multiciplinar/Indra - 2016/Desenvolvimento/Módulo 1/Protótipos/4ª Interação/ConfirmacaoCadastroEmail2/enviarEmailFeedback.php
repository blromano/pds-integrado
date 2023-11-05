<?php
include_once 'class/FeedbackDAO.php';
$feedbackDAO = new FeedbackDAO();

echo "Teste de Classe";

$id = $_POST['USU_ID'];



$usuario = $feedbackDAO->buscarUsuario($id);

print_r($usuario);
echo"<br> --------------------------------------------------------------------------------------- <br> ";
$lista = $feedbackDAO->MostrarMensagem(4);
print_r($lista);
echo"<br> --------------------------------------------------------------------------------------- <br> ";

echo $usuario[0]['USU_NOME'] . "<br>";
echo $usuario[0]['USU_EMAIL'] . "<br>";
echo $_POST['resposta'] . "<br>";


    $txtAssunto = "Esclarecimentos";
    $txtNome = $usuario[0]['USU_NOME'];
    $txtEmail = $usuario[0]['USU_EMAIL'];
    $txtMensagem = $_POST['resposta'];
    /* Montar o corpo do email */
    $corpoMensagem = "<img src='http://i63.tinypic.com/epglxx.png' width='216' height='131'></img>" . "<br><h2>Olá " . $txtNome . "!</h2>" . $txtMensagem;
echo $corpoMensagem;
    /* Extender a classe do phpmailer para envio do email */
    require_once("PHPMailer_5.2.4/class.phpmailer.php");

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

     if (smtpmailer($txtEmail, 'testeindrapds@gmail.com', $txtNome, $txtAssunto, $corpoMensagem)) {
        $_SESSION['USU_EMAIL'] = $endereco;
        $_SESSION['USU_NOME'] = $nome;
        Header("location: GerenciarFeedBack.php"); // Redireciona para uma página de FeedBack.
    }
    if (!empty($error))
        echo $error;



?>