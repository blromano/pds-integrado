<?php
date_default_timezone_set('America/Sao_Paulo');

require_once '../../controle/phpMailer/PHPMailerAutoload.php';

include  '../../modelo/Contato.php';
include  '../../controle/ContatoDAO.php';



      $contato = new Contato();
      $contatoDAO = new ContatoDAO();

      $contato->setCNT_TITULO($_POST['CNT_TITULO']);
      $contato->setCNT_DESCRICAO($_POST['CNT_DESCRICAO']); 
      $contato->setCNT_NOME($_POST['CNT_NOME']);
      $contato->setCNT_EMAIL($_POST['CNT_EMAIL']);
      $idContato = $contatoDAO->inserirContato($contato);

      $contato->setCNT_ID($idContato);


$mail = new PHPMailer;

$mail->isSMTP();


$mail->Debugoutput = 'html';

$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "reclamesaojoao@gmail.com";
$mail->Password = "reclamesaojoao2017";
$mail->setFrom('reclamesaojoao@gmail.com', utf8_decode('Site Reclame São João'));
$mail->addReplyTo('reclamesaojoao@gmail.com', utf8_decode('Site Reclame São João'));
$mail->addAddress('reclamesaojoao@gmail.com', '--');
$mail->Subject = utf8_decode("Contato: " . $_POST["CNT_TITULO"]);
$textoMsg = //"Clique no link para ativar sua conta no portal Reclame São João: <a href=localhost/RECLAME_SAO_JOAO-INTEGRAR/php/mod01/ativarCadastro.php?email=$emailDestinatario> Ativar Cadastro </a>";
        "Contato do site Reclame São João<br>" .
        "Nome: " . $_POST["CNT_NOME"] . 
        "<br>Email: " . $_POST["CNT_EMAIL"] . 
        "<br>Assunto: " . $_POST["CNT_TITULO"]. 
        "<br>Mensagem: " . $_POST["CNT_DESCRICAO"];
    

?>


<?php 

	$mail->msgHTML(utf8_decode($textoMsg));
$mail->AltBody = 'This is a plain-text message body';
$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		));
if (!$mail->send()) 
{
	echo "Erro ao enviar email: " . $mail->ErrorInfo;
} else 
{
	echo "Email enviado com sucesso!";
}


            session_start();
            $_SESSION['contatoMsg'] = "Contato Realizado!";
            header("location:../../contato.php"); 

?>




  