<?php
	session_start();
	
	include 'controle/ReclamacoesDAO.php';
	include 'controle/EstabelecimentosDAO.php';
	include 'controle/LocalizacaoDAO.php';
	
	$ReclamacaoDAO = new ReclamacoesDAO;
	$nome_estabelecimento = $ReclamacaoDAO->informacoesPagina();
	$EST_ID = $ReclamacaoDAO->retornandoId();
	
	$EstabelecimentosDAO = new EstabelecimentosDAO;
	$LOC_ID = $EstabelecimentosDAO->obterEstabelecimentoPorId($EST_ID);
	$EST_TODO = $EstabelecimentosDAO->todo_estabelecimento($EST_ID);
	
	$LocalizacaoDAO = new LocalizacaoDAO;
	$LOC_TODO = $LocalizacaoDAO->todo_localizacoes($LOC_ID);
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
			<li class="scroll active" id="menu_botao"><a href="#main-wrapper" id="cabecalho_a">Informações</a></li>
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
							<p>Bem Vindo a página do estabelecimento. Aqui voce pode ver as reclamações e avaliações.</p>
				
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

				<?php

				foreach ($LOC_TODO as $row){
				$loc_id = $row["LOC_ID"]."<br>";
				$loc_estado = $row["LOC_ESTADO"]."<br>";
				$loc_cep = $row["LOC_CEP"]."<br>";
				$loc_cidade = $row["LOC_CIDADE"]."<br>";
				$loc_rua = $row["LOC_RUA"]."<br>";
				$loc_bairro = $row["LOC_BAIRRO"];
				}					
				
				foreach ($EST_TODO as $row){
				$est_cnpj = $row["EST_CNPJ"];
				$est_site = $row["EST_SITE_EMPRESA"];
				$est_numero = $row["EST_NUMERO_ENDERECO"];
				$est_facebook = $row["EST_FACEBOOK_EMPRESA"];
				}

				?>
			
			<!-- Main -->
				<div id="main-wrapper">
					<div id="main" class="container">
						<div id="content">

							<!-- Post -->
								<article class="box post">
									<header>
										<h2>Veja Aqui! Encontre todas <strong>as informações</strong><br/> do estabelecimento.<br/></h2>
									</header>
									<!--<span class="image featured"><img src="images/pic04.jpg" alt="" /></span>-->
									<h3 id="rec_info_h3_localizacao">Localização</h3><br>
									<p>Estado: <?php echo $loc_estado ?></p>
									<p>Cep: <?php echo $loc_cep ?></p>
									<p>Cidade: <?php echo $loc_cidade ?></p>
									<p>Rua: <?php echo $loc_rua ?></p>
									<p>Bairro: <?php echo $loc_bairro ?></p>
									<p>Número: <?php echo $est_numero ?></p>
								</article>
								
								<!-- Post -->
								<article class="box post">
									<!--<span class="image featured"><img src="images/pic04.jpg" alt="" /></span>-->
									<h3 id="rec_info_h3">Contato</h3><br>
									<p>CNPJ: <?php echo $est_cnpj ?></p>
									<p>Site: <?php echo $est_site ?></p>
									<p>Facebook: <a href="https://<?php echo $est_facebook; ?>"><?php echo $est_facebook; ?></a></p>
									<p>Telefone: não cadastrado</p>
									<p><a href="rankings.php">Posicao do Ranking: #<?php echo $EST_ID ?></a></p>
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