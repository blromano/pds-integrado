<?php
    session_start ();
	
	include "enviarImagem.php";
	
    date_default_timezone_set('America/Sao_Paulo');

    require_once '../../controle/phpMailer/PHPMailerAutoload.php';

    include '../../modelo/Localizacao.php';
    include '../../controle/LocalizacaoDAO.php';		

	// Criando um Novo Usuário	
        $localizacao= new Localizacao();

        $localizacaoDAO = new LocalizacaoDAO();

	// Inserindo os dados do Estabelecimento no "SETs" em modelo
        $localizacao->setLOC_RUA($_POST['LOC_RUA']);
        $localizacao->setLOC_BAIRRO($_POST['LOC_BAIRRO']);
        $localizacao->setLOC_CEP($_POST['LOC_CEP']);
        $localizacao->setLOC_CIDADE($_POST['LOC_CIDADE']);
        $localizacao->setLOC_ESTADO($_POST['LOC_ESTADO']);

        $idLocalizacao = $localizacaoDAO->inserirLocalizacao($localizacao);

        $localizacao->setLOC_ID($idLocalizacao);


    include '../../modelo/Usuario.php';
    include '../../controle/UsuarioDAO.php';		

	// Criando um Novo Usuário	
        $usuario= new Usuario();

        $usuarioDAO = new UsuarioDAO();
	
	//aqui começa o codigo do upload da imagem:
		if (! empty($_FILES['USU_FOTO_PERFIL']))
			{
				$upload = new Upload($_FILES['USU_FOTO_PERFIL'], 2000, 1600, "../../images/foto_perfil/");
				echo $upload->salvar();		
			}
		
		$REC_IMAGEM = $_SESSION['USU_FOTO_PERFIL'];//pego esse codigo do upload.class
		$USU_FOTO_PERFIL = 'images/foto_perfil/'.$_SESSION['USU_FOTO_PERFIL'];

	// Inserindo os dados do Estabelecimento no "SETs" em modelo
        $usuario->setUSU_NOME($_POST['USU_NOME']);
		
	    $usuario->setUSU_FOTO_PERFIL($USU_FOTO_PERFIL);
        $usuario->setUSU_EMAIL($_POST['USU_EMAIL']);
        $usuario->setUSU_SENHA($_POST['USU_SENHA']);
        $usuario->setUSU_TELEFONE($_POST['USU_TELEFONE']);

        $idUsuario = $usuarioDAO->inserirUsuario($usuario);

        $usuario->setUSU_ID($idUsuario);
		
		$_SESSION['USU_NOME'] = $_POST['USU_NOME'];

    include '../../modelo/Estabelecimentos.php';
    include '../../controle/EstabelecimentosDAO.php';

	// Criando um Novo Estabelecimento
        $estabelecimentos = new Estabelecimentos();

        $estabelecimentosDAO = new EstabelecimentosDAO();

	// Inserindo os dados do Estabelecimento no "SETs" em modelo	
        $estabelecimentos->setEST_NOME_FANTASIA($_POST['EST_NOME_FANTASIA']);
        $estabelecimentos->setEST_CNPJ($_POST['EST_CNPJ']);
        $estabelecimentos->setEST_SITE_EMPRESA($_POST['EST_SITE_EMPRESA']);
        $estabelecimentos->setEST_NUMERO_ENDERECO($_POST['EST_NUMERO_ENDERECO']);
        $estabelecimentos->setEST_PUBLICO_ALVO($_POST['EST_PUBLICO_ALVO']);
        $estabelecimentos->setEST_NOME_RESPONSAVEL($_POST['EST_NOME_RESPONSAVEL']);
        $estabelecimentos->setEST_COMPLEMENTO($_POST['EST_COMPLEMENTO']);
        $estabelecimentos->setEST_FACEBOOK_EMPRESA($_POST['EST_FACEBOOK_EMPRESA']);	
        $estabelecimentos->setUSU_ID($usuario->getUSU_ID());;
        $estabelecimentos->setTES_ID($_POST['TES_ID']);
		$estabelecimentos->setLOC_ID($idLocalizacao);

        $idEstabelecimento = $estabelecimentosDAO->inserirEstabelecimento($estabelecimentos);


	// Mandar email para Validar Cadastro

        $emailDestinatario = $_POST['USU_EMAIL'];

			// Chama a função para mandar e-mail
                $mail = new PHPMailer;

			// Tipo de E-mail
                $mail->isSMTP();
                //$mail->SMTPDebug = 0;

			// Formato HTML
                $mail->Debugoutput = 'html';

			// Função que faz enviar o E-mail
                $mail->Host = 'smtp.gmail.com';
			// Porta do Saída
                $mail->Port = 587;
			//Tipo de Segurança
                $mail->SMTPSecure = 'tls';
                $mail->SMTPAuth = true;
			// E-mail do Reclame São João
                $mail->Username = "reclamesaojoao@gmail.com";
                $mail->Password = "reclamesaojoao2017";
				
				

			// Mensagem / Assunto a ser Exibido
                $mail->setFrom('reclamesaojoao@gmail.com', utf8_decode('Site Reclame São João'));
                $mail->addReplyTo('reclamesaojoao@gmail.com', utf8_decode('Site Reclame São João'));
                $mail->addAddress($emailDestinatario);

                $mail->Subject = utf8_decode('Validação de Cadastro');
                $textoMsg = "








Clique no link para ativar sua conta no portal Reclame São João: <a href=localhost/RECLAME_SAO_JOAO-INTEGRAR/php/mod03/ativarCadastro.php?email=$emailDestinatario> Ativar Cadastro </a>";
$textoMsg ='';
ob_start(); ?>
<style type="text/css">
    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
    table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
    img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

    /* RESET STYLES */
    img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
    table{border-collapse: collapse !important;}
    body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    /* MOBILE STYLES */
    @media screen and (max-width: 525px) {

        /* ALLOWS FOR FLUID TABLES */
        .wrapper {
          width: 100% !important;
        	max-width: 100% !important;
        }

        /* ADJUSTS LAYOUT OF LOGO IMAGE */
        .logo img {
          margin: 0 auto !important;
        }

        /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
        .mobile-hide {
          display: none !important;
        }

        .img-max {
          max-width: 100% !important;
          width: 100% !important;
          height: auto !important;
        }

        /* FULL-WIDTH TABLES */
        .responsive-table {
          width: 100% !important;
        }

        /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
        .padding {
          padding: 10px 5% 15px 5% !important;
        }

        .padding-meta {
          padding: 30px 5% 0px 5% !important;
          text-align: center;
        }

        .no-padding {
          padding: 0 !important;
        }

        .section-padding {
          padding: 50px 15px 50px 15px !important;
        }

        /* ADJUST BUTTONS ON MOBILE */
        .mobile-button-container {
            margin: 0 auto;
            width: 100% !important;
        }

        .mobile-button {
            padding: 15px !important;
            border: 0 !important;
            font-size: 16px !important;
            display: block !important;
        }

    }

    /* ANDROID CENTER FIX */
    div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>
</head>
<body style="margin: 0 !important; padding: 0 !important;">

<!-- HIDDEN PREHEADER TEXT -->
<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
    Ative sua conta para ter acesso ao portal Reclame São João...
</div>

<!-- HEADER -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#64594f" align="center">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="wrapper">
                <tr>
                    <td align="center" valign="top" style="padding: 15px 0;" class="logo">
                        <a href="http://litmus.com" target="_blank">
                            <img src="https://i.imgur.com/kBA65Ul.png" width="250px" height="auto" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0">
                        </a>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 70px 15px 70px 15px;" class="section-padding">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="responsive-table">
                <tr>
                    <td>
                        <!-- HERO IMAGE -->
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <!-- COPY -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="center" style="font-size: 25px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 30px;" class="padding"><strong>
												<?php echo ucwords($_POST['USU_NOME']); ?></strong>, faltam só alguns cliques para finalizar o seu cadastro!</td>
                                        </tr>
                                        <tr>
                                            <td align="center" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding">Clique no botão abaixo para ativar seu cadastro.</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <!-- BULLETPROOF BUTTON -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="center" style="padding-top: 25px;" class="padding">
                                                <table border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">
                                                    <tr>
                                                    	<td align="center" style="border-radius: 3px;" bgcolor="#7A6C5D"><a href="localhost/RECLAME_SAO_JOAO-INTEGRAR/php/mod03/ativarCadastro.php?email=<?php echo $emailDestinatario ?>" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 15px 25px; border: 1px solid #7A6C5D; display: inline-block;" class="mobile-button">Ativar Cadastro &rarr;</a></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    
               
    <tr>
        <td bgcolor="#191919" align="center" style="padding: 20px 0px;">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <!-- UNSUBSCRIBE COPY -->
            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="max-width: 500px;" class="responsive-table">
                <tr>
                    <td align="center" style="font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;">
                        © 2017 IFSP-SBV - Construído por Equipe IFSP - RECLAME SÃO JOÃO
                        <br>
                    
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
</table>
</body>
<?php $textoMsg = ob_get_clean(); ?>
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
			$_SESSION['cadastro'] = "Cadastro realizado com sucesso! <br><br>Ative o cadastro no seu e-mail para ter acesso ao portal!";
			header("location:../../usu_loginUsuario.php"); 


?>
