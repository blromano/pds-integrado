<?php


namespace App\Controller;

use FW\Controller\Action;
use App\Model\CidadaoModel;
use App\DAO\CidadaoDAO;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class RecuperarSenhaController{
    public function recuperarSenhaEmail(){
        $title = "Sustenta São João";

        //para passar valores para a VIEW
        $this->getView()->title = $title;

        $cidadao = new CidadaoDAO();
        $cidadaoDAO = new CidadaoDAO();

        $cidadao->__set('USU_EMAIL', $_GET['USU_EMAIL']);

        $email = $cidadaoDAO->buscarPorEmail($_GET['id']);

        enviarEmail($email);

    }


    public function enviarEmail(){
        $mail = new PHPmailer(true);

        $cidadao = new CidadaoModel();
        $cidadaoDAO = new CidadaoDAO();

        //$cidadao->__set('USU_EMAIL', $_GET['USU_EMAIL']);

        //$email = $cidadaoDAO->buscarPorEmail($_GET['id']);

        try {
            // Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output (set to 2 for more details)
            $mail->isSMTP();                           // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com';   // Specify SMTP server
            $mail->SMTPAuth   = true;                  // Enable SMTP authentication
            $mail->Username   = 'girineldasilva@gmail.com';  // SMTP username
            $mail->Password   = 'SENHADOGIRINEL';      // SMTP password
            $mail->SMTPSecure = 'tls';                 // Enable TLS encryption
            $mail->Port       = 587;                   // TCP port to connect to
        
            // Sender information
            $mail->setFrom('girineldasilva@gmail.com', 'girinel');
            $mail->addAddress('girineldasilva@gmail.com', 'girinel'); // Add recipient email address
        
            // Content
            $mail->isHTML(true);                       // Set email format to HTML
            $mail->Subject = 'Subject of the Email';
            $mail->Body    = '<p>This is the HTML message body</p>';
            $mail->AltBody = 'This is the plain text version for non-HTML mail clients';
        
            // Send email
            $mail->send();
            echo 'Email has been sent successfully.';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    }
}