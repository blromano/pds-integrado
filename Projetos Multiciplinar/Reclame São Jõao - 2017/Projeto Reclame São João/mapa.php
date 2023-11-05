<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">

		<title>Reclame São João</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
	
		<!-- SCRIPT EM GERAL -->
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAT4Cy7agj4i0Hg5e5dMmUNcTN70iPnWPY&sensor=false"></script>
			<script type="text/javascript" src="js/map.js"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
			<!--[if lte IE 8]><script src="js/ie/html5shiv.js"></script><![endif]-->
			<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/css/rec_ie8.css" /><![endif]-->
			
		<!-- FIM DO SCRIPT EM GERAL -->
	
		<!-- BOOTSTRAP -->
			<link rel="stylesheet" type="text/css" href="css/rec_mapa.css">
			<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<link href="css/animate.min.css" rel="stylesheet"> 
			<link href="css/font-awesome.min.css" rel="stylesheet">
			<link href="css/responsive.css" rel="stylesheet">
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
		
			<!-- MENU DO SITE -->
				<link href="css/menu_do_site.css" rel="stylesheet">
				
			<!-- COR DOS INPUT / SELECT / TEXTAREA EM GERAL -->
				<link rel="stylesheet" href="css/estilo.css">
				
			<!-- RODAPÉ -->
				<link rel="stylesheet" href="css/mod02/rodape.css">

	</head>

	<body>
		<!-- MENU DO SITE -->
			<div class="main-nav navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.php">
							<h1><img class="img-responsive" src="images/logo.png" alt="logo"></h1>
						</a>                    
					</div>

					
					<!-- MENU DO SITE - OPÇÕES-->
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right" >   
							<li class="scroll active" id="menu_botao"><a href="#main-wrapper" id="cabecalho_a">Mapa</a></li>
							<li class="scroll" id="menu_botao"><a href="index.php" id="cabecalho_a">Home</a></li>
						</ul>
					</div>
				</div>
			</div>
		<!-- FIM DO MENU DO SITE -->
     
		<div  id="map-canvas"></div>
</body>

	<!--RODAPÉ-->
		<footer id="myFooter">
			<div class="container">
				<div class="row" style="text-align: center;">
					<div class="col-md-3">
						<h2><img src="images/logo_branco_pequeno.png"></h2>
					</div>
					<div class="col-md-2">
						<h5>Principal</h5>
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="mapa.php">Mapa das empresas</a></li>
							<li><a href="duvidasFrequentes.php">Perguntas Frequentes</a></li>
						</ul>
					</div>
					<div class="col-md-2">
						<h5>Sobre nós</h5>
						<ul>
							<li><a href="sobrenos.php">Sobre a Equipe</a></li>
							<li><a href="sobreProjeto.php">Sobre o Projeto</a></li>
							<li><a href="https://sbv.ifsp.edu.br/">O IFSP</a></li>
						</ul>
					</div>
					<div class="col-md-2">
						<h5>Termos</h5>
						<ul>
							<li><a href="#">Política de Privacidade</a></li>
							<li><a href="#">Termos de Uso</a></li>
							<li><a href="#">Manual do Usuário</a></li>
						</ul>
					</div>
					<div class="col-md-3">
						<div class="social-networks">
							<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
							<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
							<a href="#" class="google"><i class="fa fa-google-plus"></i></a>
						</div>
						<a  href="contato.php"><button type="submit" class="btn btn-default" >Contate-nos</button></a>
					</div>
				</div>
			</div>
			<div class="footer-copyright">
				<p>©2017 Copyright - Direitos autorais reservados aos alunos do Curso Técnico em Informática Integrado ao Ensino Médio - Turma 2017  </p>
			</div>
		</footer>
	<!--FIM DO RODAPÉ-->  
</html>
