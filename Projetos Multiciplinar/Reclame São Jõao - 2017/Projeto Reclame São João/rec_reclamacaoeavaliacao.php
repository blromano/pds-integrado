<?php
	session_start();
	include_once("controle/Conexao.php");
	include ("controle/AvaliacoesDAO.php");
	include ("controle/ReclamacoesDAO.php");
   
	$ReclamacaoDAO = new ReclamacoesDAO;
	$nome_estabelecimento = $ReclamacaoDAO->informacoesPagina();
	$string = $ReclamacaoDAO->stringTamanho();
	$EST_ID = $ReclamacaoDAO->retornandoId();
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
	<link href="css/rec_formulario.css" rel="stylesheet">
	<link rel="shortcut icon" href="images/favicon.ico">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
	<link href="css/rec_reclamacaoeavaliacao.css" rel="stylesheet" type="text/css"/>
	
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
			<li class="scroll active" id="menu_botao"><a href="#main-wrapper" id="cabecalho_a">Reclamações e Avaliações</a></li>
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
							<p>Bem Vindo a página. Aqui voce pode ver as reclamações e avaliações do estabelecimento.</p>
				
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
				}
				?>
			
				<div class="container" id="rec_ava_container">
				<ul class="nav nav-tabs nav-justified">
				<li <?php if ($pagina == 1) echo 'class="active"'; ?>>
				<a href="?pagina=1"><span class="fa fa-check-square" aria-hidden="true"></span> Avaliações</a>
				</li>
				<li <?php if ($pagina == 2) echo 'class="active"'; ?>>
				<a href="?pagina=2"><span class="fa fa-fire" aria-hidden="true"></span> Reclamações</a>
				</li>
				</ul>
				</div>
				<!--<hr>-->
				
				<?php
				if ($pagina == 1) include("ava_avaliacoes.php");
				elseif ($pagina == 2) include("rec_reclamacoes.php");
				?>
				
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

<script type="text/javascript" src="js/redirect.js"></script>

</body>
</html>