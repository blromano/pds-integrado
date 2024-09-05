<?php
   session_start();
   include_once("rec_conexao.php");
   $nome_estabelecimento = $_SESSION["nome"];
   $id_estabelecimento = $_SESSION["EST_ID"]; 
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
	<link href="css/rec_estrela.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/avaliations.js"></script>
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
	
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
	
	<style>
	.pagination>.active>a, .pagination>.active>span, .pagination>.active>a:hover, .pagination>.active>span:hover, .pagination>.active>a:focus, .pagination>.active>span:focus {
    z-index: 3;
    color: #ffffff;
    background-color: #64594F;
    border-color: #64594F;
    cursor: default;}
	
	@media screen and (min-width: 737px) {

	.row > * {
	padding: 0px 0px 0px 0px;
	}
	}

	textarea.input-sm, textarea.form-control.input-sm, input.form-control.input-sm, input.input-sm[type="text"], input.input-sm[type="password"], input.input-sm[type="email"], input.input-sm[type="number"], .form-control.input-sm[type="text"], .form-control.input-sm[type="password"], .form-control.input-sm[type="email"], .form-control.input-sm[type="tel"], .form-control.input-sm[contenteditable] {
	font-size: 14px;
	}
	
	.input-sm {
	height: 30px;
	padding: 5px 10px;
	font-size: 12px;
	line-height: 1.5;
	border-radius: 3px;
	}


	</style>
	
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
          <a class="navbar-brand" href="index.php" style="border: 1px solid transparent;" >
            <h1><img class="img-responsive" src="images/logo.png" alt="logo"></h1>
          </a>   
		  
        </div>

<form action="rec_estabelecimento.php" method=get name="formulario3"> 
<input type="hidden" name="EST_NOME" value="<?php echo $_SESSION["nome"]; ?>">
<input type="hidden" name="link" value="index.php">
</form> 
		
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right" style="height: 80px;">   
			<li class="scroll active" style="cursor: pointer;"><a href="#main-wrapper">Reclamações e Avaliações</a></li>
            <li class="scroll" style="cursor: pointer;"><a onclick="redirect()">Estabelecimento</a></li>
           <li class="scroll" style="cursor: pointer;"><a href="contato.php">User</a></li>
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


							<form action="rec_formulario.php" method=post name="formulario1"> 
							<input type="hidden" name="reclamar" value="<?php echo ($nome_estabelecimento);?>">
							</form> 

							<form action="ava_formulario.php" method=post name="formulario2"> 
							<input type="hidden" name="avaliar" value="<?php echo ($nome_estabelecimento);?>">
							</form> 
				
						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li><a class="fa fa-comments" onclick="reclamar()"  style="cursor: pointer;"><span>Reclamar</span></a></li>
									<li><a class="fa fa-star-half-o" onclick="avaliar()" style="cursor: pointer;"><span>Avaliar</span></a></li>
									<li><a class="fa fa-list-alt" onclick="redirect()" style="cursor: pointer;"><span>Estabelecimento</span></a></li>
									<li><a class="fa fa-list-alt" onclick="location.href='rec_info.php'" style="cursor: pointer;"><span>Mais Informações</span></a></li>
									<li><a class="fa fa-info-circle" onclick="location.href='rec_duvidas.php'" style="cursor: pointer;"><span>Dúvidas</span></a></li>
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
				//header("Location: index.php");
				}
				?>
			
				<div class="container" style="margin-top: 10%;">
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
				
	
		</div>

		<!--RODAPÉ-->
	<footer id="footer" style="background-color: #232323; margin-top: 2.5%;" >
		<div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
		<div class="container text-center">
		<div class="tudo">

			<div class="logo" id="ajusteslogo">
			<a href="index.php"><img style="margin-left: 30%; margin-top: 4%;"  class="img-responsive" src="images/logo.png" alt=""></a> 
				<div id="icons" class="social-icons" style="margin-top: 5%;" >
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
				<p id="paragrafinho">Somos uma equipe de alunos do Instituto Federal de São Paulo - Campus São João da Boa Vista, que buscam finalizar o projeto proposto em uma das disciplinas 
				com o maior sucesso possível. <br/></p>
				<p id="paragrafo">Ao alcançar esse sucesso, estaremos proporcionando para a cidade um novo sistema que pode impulsionar o comércio justo e maior comprometimento 
				por parte dos estabelecimentos presentes na cidade.  <a href="sobreProjeto.php">Saiba mais...</a></p>
			</div>	
			</div>
			</div>
			</div>
			
				<div class="footer-bottom" style="background-color: #191919;">
				<div class="container">
				<div class="row" id="ajustesrow">
					<div class="col-sm-6" style=" color: white">
						<p>&copy; 2017 IFSP-SBV</p>
					</div>
					<div class="col-sm-6">
						<p class="pull-right" style="color: white;">Construído por <a style="color: white;" href="http://sbv.ifsp.edu.br/">Equipe IFSP</a></p>
					</div>
				</div>
				</div>
				</div>
	</footer>
<!--FIM DO RODAPÉ--> 
		
	<script>
	function reclamar() {
	document.formulario1.submit() 
	}
	function avaliar() {
	document.formulario2.submit() 
	}
	function redirect() {
	document.formulario3.submit() 
	}
	</script>

</body>
</html>