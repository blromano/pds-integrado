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
			<li class="scroll active" style="cursor: pointer;"><a href="#main-wrapper">Duvidas</a></li>
            <li class="scroll" style="cursor: pointer;"><a onclick="redirect()">Estabelecimento</a></li>
           <li class="scroll" style="cursor: pointer;"><a href="contato.php">User</a></li>
		   
		   			<li id="extras" class="scroll"><a onclick="reclamar()"  style="cursor: pointer;"><span>Reclamar</span></a></li>
			<li id="extras" class="scroll"><a onclick="avaliar()" style="cursor: pointer;"><span>Avaliar</span></a></li>
			<li id="extras" class="scroll"><a onclick="location.href='rec_info.php'" style="cursor: pointer;"><span>Mais Informações</span></a></li>
			<li id="extras" class="scroll"><a onclick="location.href='rec_duvidas.php'" style="cursor: pointer;"><span>Dúvidas</span></a></li>

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
		
	<!-- Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.dropotron.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-viewport.min.js"></script>
	<script src="js/util.js"></script>
	<!--[if lte IE 8]><script src="js/ie/respond.min.js"></script><![endif]-->
	<script src="js/main.js"></script>
   <!--script em geral-->
   <!--script essenciais -->
  <script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>


<script type="text/javascript" src="js/mousescroll.js"></script>
<script type="text/javascript" src="js/smoothscroll.js"></script>
   <script type="text/javascript" src="js/jquery.js"></script>
   <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
   <script type="text/javascript" src="js/main.js"></script>
   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <!--script essenciais -->
   <!--script do -->
   <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
   <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>	
   <script type="text/javascript">
      $(function() {
      
      //autocomplete
      $(".auto").autocomplete({
      	source: "rec_procurar.php",
      	minLength: 1
      });				
      
      });
   </script>
   <!-- fim script do ->
      <!-- fim script em geral-->
	  
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