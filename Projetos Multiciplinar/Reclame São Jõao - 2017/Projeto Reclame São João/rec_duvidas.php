<?php
	session_start();
	include 'controle/ReclamacoesDAO.php';

	$ReclamacaoDAO = new ReclamacoesDAO;
	$nome_estabelecimento = $ReclamacaoDAO->informacoesPagina();
	$USU_NOME = $ReclamacaoDAO->retornandoNome();
?>

<!DOCTYPE HTML>
<html>
	<head>
	
	<title>Reclame São João</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lte IE 8]><script src="js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="css/rec_main.css" />
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/css/rec_ie8.css" /><![endif]-->
	<title>Reclame São João</title>
	<link href="css/menu.min.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/testes.css" rel="stylesheet">
	<link href="css/rodape2.css" rel="stylesheet">
	<link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/depoimentos.css" rel="stylesheet">
	<link href="css/rec_estabelecimento.css" rel="stylesheet">
	<link rel="shortcut icon" href="images/favicon.ico">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
	  
	</head>
	<body class="homepage">
     <div class="main-nav">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php" id="cabecalho_logo">
            <h1><img class="img-responsive" src="images/logo.png" alt="logo"/></h1>
          </a>   
        </div>

		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">   
			<li class="scroll active" id="menu_botao"><a href="#main-wrapper" id="cabecalho_a">Duvidas</a></li>
			<li class="scroll" id="menu_botao"><a href="index.php" id="cabecalho_a">Home</a></li>
			</ul>
		</div>
		
      </div>
    </div><!--/#main-nav-->
	
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<div id="header" class="container">

						<!-- Logo -->				
						
							<h1 id="logo"><a href="#footer"><?php echo wordwrap($nome_estabelecimento, 20,  "<br/><br/>"); ?></a></h1>
							<h1 id="logo2"><a href="#footer"><?php echo ($nome_estabelecimento); ?></a></h1>
							<p>Bem Vindo a página de duvidas. Aqui voce fica sabendo de todo o processo<br> por tras das notas do estabelecimento.</p>
			
						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li><a id="menu_botao" class="fa fa-comments" onclick="reclamar()"><span>Reclamar</span></a></li>
									<li><a id="menu_botao" class="fa fa-star-half-o" onclick="avaliar()"><span>Avaliar</span></a></li>
									<li><a id="menu_botao" class="fa fa-list-alt" onclick="redirect()"><span>Estabelecimento</span></a></li>
									<li><a id="menu_botao" class="fa fa-list-alt" onclick="location.href='rec_info.php'"><span>Mais Informações</span></a></li>
									<li><a id="menu_botao" class="fa fa-info-circle" onclick="location.href='rec_duvidas.php'"><span>Dúvidas</span></a></li>
								</ul>
							</nav>

					</div>
				</div>
			
			<!-- Main -->
				<div id="main-wrapper">
					<div id="main" class="container">
						<div id="content">

								<article class="box post">
									<header>
										<h2>Curioso? Vamos te explicar como <br/>funciona o processo de <strong>avaliação e reclamação.</strong></h2>
									
									
									<h3>Como faço uma reclamação?</h3>
									<p>Fazer uma reclamação no Reclame São João é muito simples!<br>
									Vamos lá: primeiro, Identifique-se. Depois é bem simples é só procurar a empresa que você deseja e clique em buscar.<br><br>
									O segundo passo é a mão na massa! É só voce clicar em Reclamar na pagina do estabelecimento.<br>
									Aí é com voce :)! Preencha todos os campos da sua reclamação, como título, assunto, telefone e o produto da sua reclamação é claro! Quanto mais claro e objetivo você for, mais fácil fica para a empresa resolver o seu problema.<br><br>
									Confira se a sua reclamação está de acordo com o que você quer transmitir, acesse sua reclamação na pagina do seu perfil.
									Pronto, agora é só esperar!<br>
									E agora?
									A sua parte está feita. Agora é a vez da nossa equipe, fazer a parte dela, iremos analisar sua reclamação e depois enviamos para a empresa.<br>
									Muito fácil, né?<br><br>
									
									Caso você ainda tenha alguma dúvida, é só entrar em contato com a gente. <a href="">Clique AQUI</a> e fale direto com o Reclame São João.</p>
									
									<h3>Já fiz a minha reclamação, o que faço agora?</h3>
									<p>A sua parte está feita. Agora é necessário aguardar a nossa equipe enviar sua reclamação para empresa.<br>
									Assim que você postou a reclamação nossa equipe foi notificada e sua reclamação vai ser analisada.<br></p>
									
									<h3>Porque minha reclamação foi editada pelo Reclame Sao Joao?</h3>
									<p>Quando no conteúdo de uma reclamação foram utilizados termos pejorativos, ou publicados dados pessoais e particulares de terceiros, o Reclame Sao Joao pode realizar a edição dessas informações.
									Sempre zelamos por todas as informações disponibilizadas no site!<br></p>
									
									<h3>Como faço uma avaliação?</h3>
									<p>Fazer uma avaliacao no Reclame São João é ainda mais simples!<br>
									Primeiro acesse sua conta, se voce ainda nao tem é só cadastrar. Depois é bem simples é só procurar a empresa que você deseja e clique em buscar.<br><br>
									O segundo passo é a mão na massa! É só voce clicar em Avaliar na pagina do estabelecimento.<br>
									Aí é com voce :)! Preencha os campos da sua avaliacao, como assunto e a nota é claro! Não esqueça que diferente da reclamação a avaliação é 
									bem pequena e tem o objetivo de demonstrar o seu sentimento, apenas!
									<br><br>Pronto, sua avaliação foi publicada!</p>
							
								</article>
								

						</div>
					</div>
				</div>
									
				<form action="rec_estabelecimento.php" method=get name="formulario3"> 
				<input type="hidden" name="EST_NOME" value="<?php echo $_SESSION["nome"]; ?>"></input>
				<input type="hidden" name="link" value="index.php"/>
				</form> 

				<form action="rec_formulario.php" method=post name="formulario1"> 
				<input type="hidden" name="reclamar" value="<?php echo ($nome_estabelecimento);?>"></input>
				</form> 

				<form action="ava_formulario.php" method=post name="formulario2"> 
				<input type="hidden" name="avaliar" value="<?php echo ($nome_estabelecimento);?>"></input>
				</form> 
	
		</div>
		

	<!--RODAPÉ-->
	<iframe id="divframerodape" style="" frameborder="0" scrolling="NO" src='rec_rodape.php'></iframe>
		
<!-- Scripts -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="js/main.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="js/redirect.js"></script>

	</body>
</html>