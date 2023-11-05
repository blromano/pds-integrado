<?php
$id=$_POST["idusuario"];
$idficha=$_POST["idficha"];

include './views/modules/Treinos/fpdf/gerar_pdf.php';

$Nome		= $resultado[0]["USU_NOME"];	// Pega o valor do campo Nome
$Email		= $resultado[0]["USU_EMAIL"];	// Pega o valor do campo Email
$Assunto   	= "Nova ficha de treinamento";
$Mensagem	= "<body style='margin: 0; padding: 0;'>
            <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                <td style='padding: 20px 0 30px 0;'>
                <tr>
                    <td>
                        <table align='center' style='border: 2px solid #cccccc;'cellpadding='0' cellspacing='0' width='600'>
                            <tr>
                                <td align='center' bgcolor='#14181E' style='padding: 40px 0 30px 0;'>
                                    <img src='http://i67.tinypic.com/2po9vme.png' alt='Imagem-projeto' width='40%' height='40%' style='display: block;' />
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor='#ffffff' style='padding: 35px 30px 35px 30px;'>
                                    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                                        <tr>
                                            <td style='color: #1f406b; font-family: UniSan; font-size: 1.5em;'>
                                                <b>Atualização da ficha de treinamento</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='padding: 20px 0 30px 0;color: #153643; font-family: UniSans; font-size: 16px; line-height: 20px;'>
                                                Olá ".$nome.", tudo bem? <br> <br>
                                                Este e-mail automático contém em anexo a sua ficha de treinamento                   
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor='#14181E' styl14181Ee='padding: 30px 30px 30px 30px;font-family: UniSans, UniSans; font-size: 16px; line-height: 20px;'>
                                    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                                        <tr>
                                            <td style='color: #fff; font-family: UniSans; text-align: center'>
                                                <small> © 2018 - Todos os Direitos Reservados - Mais Saúde São João<br/></small> 
                                                <small>Desenvolvido por alunos do <a  style ='color:#1f406b' href='https://sbv.ifsp.edu.br/'>Instituto Federal de Educação Ciência e Tecnologia de São Paulo - Campus São João da Boa Vista</a></small>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <td style='padding: 20px 0 30px 0;'>
            </table>
        </body>;";//TRANSFORMA A MENSAGEM EM UM CODIGO HTML


if (!isset($filename)) {
	$filename='aaa';
}else{
$uploadfile="Ficha".$id.".pdf";
}
//Esse é o corpo da mensagem;
$Vai= $Mensagem;

require_once("phpmailer/class.phpmailer.php");

define('GUSER', 'equipe.maissaudesaojoao@gmail.com');	// <-- Insira aqui o seu GMail
define('GPWD', 'maissaudepds2018');		// <-- Insira aqui a senha do seu GMail

function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
	global $error;
	//NAO MEXER NESSA PARTE DO CODIGO (parte que lida com o envio do email
	$email = new PHPMailer();
	$email->CharSet = 'UTF-8';
	$email->isHTML(true);
	$email->IsSMTP();		// Ativar SMTP
	$email->SMTPDebug = 1;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
	$email->SMTPAuth = true;		// Autenticação ativada
	$email->SMTPSecure = 'tls';	// DEIXAR TLS pela mor de deus 
	$email->Host = 'smtp.gmail.com';	// SMTP utilizado
	$email->Port = 587;  		// A porta 587 deverá estar aberta em seu servidor
	$email->Username = GUSER;//NAO MUDAR
	$email->Password = GPWD;//NAO MUDAR
	$email->SetFrom($de, $de_nome);
	$email->Subject = $assunto;
	$email->Body = $corpo;
	$email->addAttachment("./views/modules/Treinos/fichas/Ficha2.pdf", "Ficha.pdf");
	$email->AddAddress($para);

	if(!$email->Send()) {
		$error = 'Mail error: '.$email->ErrorInfo; 
		return $error;
	} else {
		 return "ok";
		
	}
}
echo "id:".$id;
echo "<html></br></html>";
echo 'uploadfile:'. $uploadfile;
echo "<html></br></html>";
echo 'filename:'. $filename;


//EM ORDEM:EMAIL QUE RECEBE/EMAIL QUE ENVIA(NAO MEXER)/NOME DE QUEM ENVIA/ASSUNTO/CORPO DA MENSAGEM/
 if(smtpmailer($Email, 'equipe.maissaudesaojoao@gmail.com', 'Equipe Mais Saúde SJ', $Assunto, $Vai)=="ok") {
	echo "<script>alert('Email enviado com sucesso'); window.location = './?mod=treinos&sub=listar_ficha_treinamento';</script>";
	fclose($filename);
	unlink($filename);

}
if (!empty($error)) echo $error;
?>