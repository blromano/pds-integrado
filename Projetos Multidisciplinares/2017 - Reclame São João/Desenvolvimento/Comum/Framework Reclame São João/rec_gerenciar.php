<?php
	session_start();
	
	include ('controle/UsuarioDAO.php');
	include ('controle/ReclamacoesDAO.php');
	include ('controle/ConsumidorDAO.php');
	include	('controle/EstabelecimentosDAO.php');
	include ('controle/AvaliacoesDAO.php');
	include ('controle/RespostaReclamacaoDAO.php');
	include ('controle/ConsideracaoFinalDAO.php');
	
	$UsuarioDAO = new UsuarioDAO;
	$ReclamacaoDAO = new ReclamacoesDAO;
	$ConsumidorDAO = new ConsumidorDAO;
	
	$USU_NOME = $ReclamacaoDAO->retornandoNome();
	//print_r($USU_NOME);
	$USU_EMAIL = $ReclamacaoDAO->retornandoEmail();
	//print_r($USU_EMAIL);
	$USU_ID = $UsuarioDAO->buscarUsuario($USU_EMAIL);
	//print_r($USU_ID);
	$CON_ID = $ConsumidorDAO->idCon($USU_ID);	
	//print_r($CON_ID);

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
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link href="css/menu.min.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/testes.css" rel="stylesheet">
	<link href="css/rodape2.css" rel="stylesheet">
	<link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/depoimentos.css" rel="stylesheet">
	<link href="css/rec_estabelecimento.css" rel="stylesheet">
	<link href="css/rec_formulario.css" rel="stylesheet">
	<link href="css/rec_gerenciar.css" rel="stylesheet">
	<link rel="shortcut icon" href="images/favicon.ico">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
	
	<!-- Boostrap -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- DataTables  -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>

	<!-- Customizacao -->
	<script src="js/mod05/dataTable.js"></script> <!-- DataTable -->

	<!-- Boostrap form validator -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
	
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
			<li class="scroll active" id="menu_botao"><a href="#main-wrapper" id="cabecalho_a">Gerenciar Atividades</a></li>
			<li class="scroll" id="menu_botao"><a href="index.php" id="cabecalho_a">Home</a></li>
			<?php
			if($CON_ID !=NULL){
			?>
			<li class="dropdown">
			<a id="cor" class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"><span class="glyphicon glyphicon-user"></span><?PHP ECHO $_SESSION['USU_NOME'] ?><span class="caret"></span></a>
			<ul class="dropdown-menu">
			<li><a id="font-cor" href="rec_gerenciar.php"><span class="glyphicon glyphicon glyphicon-cog"></span> Meu Perfil</a></li>
			<li class="divider"></li>
			<li><a id="font-cor" href="php/mod01/sair.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
			</ul>
			</li>
			<?php
			}else{
			echo "<script>window.location = 'rec_logar.php';</script>";
			}
			?>
			</ul>
		</div>
		
      </div>
    </div><!--/#main-nav-->
	
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<div id="header" class="container">

						<!-- Logo -->
						
							<h1 id="logo"><a href="#footer">Bem vindo ao seu perfil!</a></h1>
							<h1 id="logo2"><a href="#footer">Bem vindo ao seu perfil!</a></h1>
							<p>Analise suas atividades! Aqui voce pode ver as reclamações e avaliações feitas por você.</p><br><br>
							
					</div>
				</div>

				<?php
				$pagina = 1;
				if ($_GET){
				if (!empty($_GET["pagina"])) {
				$pagina = intval($_GET["pagina"]);
				if ($pagina == 1) echo "<title>Avaliações</title>";
				elseif ($pagina == 2) echo "<title>Reclamações</title>";
				}else{
				$pagina = 1;
				}
				}else{
				echo "<title>Avaliações</title>";
				//header("Location: index.php");
				}
				?>
			
				<div class="container" id="gerenciar_div">
				<ul class="nav nav-tabs nav-justified">
				<li <?php if ($pagina == 1) echo 'class="active"'; ?>>
				<a href="?pagina=1"><span class="fa fa-check-square" aria-hidden="true"></span> Avaliações</a>
				</li>
				<li <?php if ($pagina == 2) echo 'class="active"'; ?>>
				<a href="?pagina=2"><span class="fa fa-fire" aria-hidden="true"></span> Reclamações</a>
				</li>
				</ul>
				</div>
				
				<?php
				if ($pagina == 1) include("ava_gerenciar_avaliacao.php");
				elseif ($pagina == 2) include("rec_gerenciar_reclamacao.php");
				?>
				
		</div>

		<!--RODAPÉ-->
	<footer id="footer">
		<div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
		<div class="container text-center">
		<div class="tudo">

			<div class="logo" id="ajusteslogo">
			<a href="index.php"><img id="img_logo" class="img-responsive" src="images/logo.png"/></a> 
				<div id="icons" class="social-icons">
				<ul id="rodapeul">
				<li><a class="envelope" href="#"><i class="fa fa-envelope"></i></a></li>
				<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li> 
				<li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
				<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
				<li><a class="tumblr" href="#"><i class="fa fa-tumblr-square"></i></a></li>
				</ul>
				</div>
			</div>

			<div class="texto" id="ajustestexto">
				<h3>Sobre nós</h3>
				<span id="texto_rodape">Somos uma equipe de alunos do Instituto Federal de São Paulo - Campus São João da Boa Vista, que buscam finalizar o projeto proposto em uma das disciplinas 
				com o maior sucesso possível. <br/>
				<div id="rodape_texto">Ao alcançar esse sucesso, estaremos proporcionando para a cidade um novo sistema que pode impulsionar o comércio justo e maior comprometimento 
				por parte dos estabelecimentos presentes na cidade.  <a href="sobreProjeto.php">Saiba mais...</a></div></span>
			</div>	
			</div>
			</div>
			</div>
			
				<div id="div_rodape">
					<table id="table_rodape">
					<tr>
						<td><p id="p1_rodape">&copy; 2017 IFSP-SBV</p></td>
						<td><p id="p2_rodape">Construído por <a id="a_rodape" href="http://sbv.ifsp.edu.br/">Equipe IFSP</a></p></td>
					</tr>
					</table>
				</div>
				
				<div id="div_rodape_responsivo">
					<table id="table_rodape_responsivo">
						<tr><td><p id="p1_rodape_responsivo">&copy; 2017 IFSP-SBV</p></td></tr>
						<tr><td><p id="p2_rodape_responsivo">Construído por <a id="a_rodape" href="http://sbv.ifsp.edu.br/">Equipe IFSP</a></p></td></tr>	
					</table>
				</div>
				
	</footer>
</body>
</html>