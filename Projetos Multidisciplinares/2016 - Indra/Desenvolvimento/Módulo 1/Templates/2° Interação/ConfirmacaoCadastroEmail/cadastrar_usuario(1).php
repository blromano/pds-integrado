<?php

//extender as classes usuarios, especialistas, instituições, e email e niveis de acesso
include_once "class/Usuario.php";
include_once "class/UsuarioDAO.php";
include_once "class/UsuarioEspecialista.php";
include_once "class/UsuarioEspecialistaDAO.php";
include_once "class/UsuarioInstituicao.php";
include_once "class/UsuarioInstituicaoDAO.php";
include_once "class/NivelAcesso.php";
include_once "class/NivelAcessoDAO.php";


session_start();
$endereco = $_POST['USU_EMAIL'];
$nome = $_POST['USU_NOME'];

//Criar objeto da classe usuário,da classe Email da classe especialista, da classe instituição e da classe nível de acesso
$usuario = new Usuario();
$usuarioEspecialista = new UsuarioEspecialista();
$usuarioInstituicao = new UsuarioInstituicao();
$nivelAcesso = new NivelAcesso();
$usuarioDAO = new UsuarioDAO();

//função que cria o código de ativação da conta do úsuario
do{
$str = "0123456789";
$cod = str_shuffle($str);
$idUsu = $usuarioDAO->VerificarCodigo($cod);
}while($idUsu);


$teste = $usuarioDAO->VerificarEmail($endereco);

if($teste){

//Pegar o dia, o mês e o ano da data de nascimento apartir do select do formulário de cadastro
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];
$data = $ano . '-' . $mes . '-' . $dia; //concatenar os valores da data em uma única váriavel(dentro do formato do banco yyyy/mm/dd)


//Pegar o nivel de acesso do Usuario(0 - comum, 1 - instituição, 2 -  especialista) e formata de acordo com o paramentro do banco
$nivel = $_POST['nivel'];

$tipo;
$idNivel;
if($nivel==0){//tipo 0 do combo box equivale ao tipo 2 do banco(Usuário Comum)
	$tipo = "Usuario";
	$idNivel = 2;
}


if($nivel==1){//tipo 1 do combo box equivale ao tipo 4 do banco(Usuário Instituição)
	$tipo = "Instituicao";
	$idNivel = 4;
}


if($nivel==2){//Tipo dois do combo box equivale ao tipo 3 do banco (Usuário Especialista)
	$tipo = "Especialista";
	$idNivel = 3;
}

//cadastro do usuario

$usuario->setNome($_POST['USU_NOME']);
$usuario->setCep($_POST['USU_CEP']);
$usuario->setSenha($_POST['USU_SENHA']);
$usuario->setCidade($_POST['USU_CIDADE']);
$usuario->setCodigoAtivacao($cod);
$usuario->setDataAtivacao(date('y/m/d'));
$usuario->setDataNascimento($data);
$usuario->setEmail($_POST['USU_EMAIL']);
$usuario->setEstado($_POST['USU_ESTADO']);
$usuario->setNumeroResidencia($_POST['USU_NUMERO_RESIDENCIA']);
$usuario->setComplemento($_POST['USU_COMPLEMENTO']);
$usuario->setPoderesAdministradores($idNivel);
$usuario->setRua($_POST['USU_RUA']);
$usuario->setStatusAtivacao(1);


$infoUsuario = $usuarioDAO->criarUsuario($usuario);

//cadastro usuario instituicao
if($idNivel==4){
	$usuarioInstituicao->setNomeFantasia($_POST['INS_NOME_FANTASIA']);
	$usuarioInstituicao->setRazaoSocial($_POST['INS_RAZAO_SOCIAL']);
	$usuarioInstituicao->setCnpj($_POST['INS_CNPJ']);
        $usuarioInstituicao->setUserId($infoUsuario->getId());
	$usuarioInstituicaoDAO = new UsuarioInstituicaoDAO();
	$usuarioInstituicaoDAO->criarUsuario($usuarioInstituicao);
}

//cadastro usuario Especialista
if($idNivel==3){
	$usuarioEspecialista->setEspecializacao($_POST['ESP_ESPECIALIZACAO']);
	$usuarioEspecialista->setRg($_POST['ESP_RG']);
	$usuarioEspecialista->setCpf($_POST['ESP_CPF']);
        $usuarioEspecialista->setUserId($infoUsuario->getId());
	$usuarioEspecialistaDAO = new UsuarioEspecialistaDAO();
	$usuarioEspecialistaDAO->criarUsuario($usuarioEspecialista);
	
}


/* Recuperar os Dados do Formulário de Envio*/
$txtAssunto = "Confirmacaoo de cadastro";
$txtNome	= $_POST["USU_NOME"];
$txtEmail	= $_POST["USU_EMAIL"];
//caso o nomes de pastas ou a disposção das mesmas mudarem, deve-se modificar o link
//caso o nomes de pastas ou a disposção das mesmas mudarem, deve-se modificar o link
$txtMensagem    = "<h3>Bem Vindo ao INDRA</h3><br><br>"
        . "Seu cadastro foi realizado com sucesso, agora você só precisa confirmar seu email!<br>"
        . "Clique no link abaixo e confirme seu cadastro.<br>"
        . "http://localhost/ConfirmacaoCadastroEmail/ConfirmarCadastro.php?cod=$cod<br><br>"
        . "A equipe do INDRA agradece seu cadastro!<br><br><br><br>"
        . "Se você não se inscreveu em nosso portal, favor ignorar esse email.";

/* Montar o corpo do email*/
$corpoMensagem 		= "<img src='http://i63.tinypic.com/epglxx.png' width='216' height='131'></img>"."<br><h2>Olá ".$txtNome."!</h2>".$txtMensagem;

/* Extender a classe do phpmailer para envio do email*/
require_once("PHPMailer_5.2.4/class.phpmailer.php");

/* Definir Usuário e Senha do Gmail de onde partirá os emails*/
define('GUSER', 'testeindrapds@gmail.com'); 
define('GPWD', 'modulo01');

function smtpmailer($para, $de, $nomeDestinatario, $assunto, $corpo) { 
	global $error;
	$mail = new PHPMailer();
	/* Montando o Email*/
	$mail->IsSMTP();	        /* Ativar SMTP*/
	$mail->SMTPAuth = true;		/* Autenticação ativada	*/
	$mail->SMTPDebug = 0;		/* Debugar: 1 = erros e mensagens, 2 = mensagens apenas*/
	$mail->SMTPSecure = 'tls';	/* TLS REQUERIDO pelo GMail*/
	$mail->Host = 'smtp.gmail.com';	/* SMTP utilizado*/
	$mail->Port = 587;  		 /* A porta 587 deverá estar aberta em seu servidor*/
	$mail->Username = GUSER;
	$mail->Password = GPWD;
	$mail->SetFrom($de, $nomeDestinatario);
	$mail->Subject = $assunto;
	$mail->Body = $corpo;
	$mail->AddAddress($para);
	$mail->IsHTML(true);

	/* Função Responsável por Enviar o Email*/
	if(!$mail->Send()) {
		$error = "<font color='red'><b>Mail error: </b></font>".$mail->ErrorInfo; 
		return false;
	} else {
		$error = "<font color='blue'><b>Mensagem enviada com Sucesso!</b></font>";
		return true;
	}
}
//$usuarioInstituicao->naoexiste();
/* Passagem dos parametros: email do Destinatário, email do remetende, nome do remetente, assunto, mensagem do email.*/
if (smtpmailer($txtEmail, 'testeindrapds@gmail.com', $txtNome, $txtAssunto, $corpoMensagem)) {
	$_SESSION['USU_EMAIL'] = $endereco;
    $_SESSION['USU_NOME'] = $nome;
 Header("location: sucesso.php"); // Redireciona para uma página de Sucesso.
}
if (!empty($error)) echo $error;
}else{
	 
	 echo "<script>alert('Esse email já consta em nossa sistema. Cadastre outro, ou tente recuperar sua senha caso tenha esquecido.')</script>";
	 
}


$str = false;
$cod = false;
$idUsu = false;
$teste = false;
$tipo = false;
$idNivel = false;
$infoUsuario = false;
$usuario = false;
$usuarioEspecialista = false;
$usuarioInstituicao = false;
$nivelAcesso = false;


echo "<script>history.go(-1)</script>";
?>