<?php
include_once "../../modelo/mod01/Usuario.php";
include_once "../../dao/mod01/UsuarioDAO.php";
$usuarioDAO = new UsuarioDAO();

$enderecoEmail = $_POST['rec_email'];
$emailExiste = $usuarioDAO->VerificarEmail($enderecoEmail);
echo $enderecoEmail . " e " . $emailExiste;


if($emailExiste){
    echo "<br>O email existe!<br>";
    $str = "abcABC123456789";
	$senha = str_shuffle($str);

	$usuarioDAO->RecuperarSenha($endereçoEmail, $senha);

	/* Assunto do email e o endereço eletrônico do usuário */
	$txtAssunto = "Confirmacao de cadastro";
	$txtEmail = $enderecoEmail;

        //caso o nomes de pastas ou a disposção das mesmas mudarem, deve-se modificar o link
	$txtMensagem = "<h3>Recuperacao de Senha</h3><br><br>"
	. " “Olá, Sua nova senha do INDRA é: " . $senha.".<br><br>"
	. "Para acessar o site por favor clique aqui:.<br>"
	. "http://localhost/integracao/indra/mod01/ConfirmarCadastro.php?cod=$semha<br><br>"
	. "Caso você não tenha esquecido sua senha ignore este e-mail<br><br><br><br>";
        
        /* Montar o corpo do email */
	$corpoMensagem = "<img src='http://i63.tinypic.com/epglxx.png' width='216' height='131'></img>" . $txtMensagem;

	/* Extender a classe do phpmailer para envio do email */
	require_once("../../class/mod01/PHPMailer_5.2.4/class.phpmailer.php");

	/* Definir Usuário e Senha do Gmail de onde partirá os emails */
	define('GUSER', 'testeindrapds@gmail.com');
	define('GPWD', 'modulo01');
        
        
        
        
        
	
}else{
  echo "<script>alert('Esse email não consta em nosso sistema. Por favor verifique sua conta ou cadastre-se.')</script>";
  
}

