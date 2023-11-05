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
			<li class="scroll active" style="cursor: pointer;"><a href="#main-wrapper">Informações</a></li>
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
							<p>Bem Vindo a página do estabelecimento. Aqui voce pode ver as reclamações e avaliações.</p>


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
						$locid = 0;
					
						$sql    = "SELECT LOC_ID FROM estabelecimentos WHERE EST_ID =" . $id_estabelecimento;
						$result = $conn->query($sql);
						
						if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
						$locid = $row["LOC_ID"];
						}
						} else {
						echo "0 results";
						}

						$sql    = "SELECT LOC_ID, LOC_ESTADO, LOC_CEP, LOC_CIDADE, LOC_RUA, LOC_BAIRRO FROM localizacoes WHERE LOC_ID =" . $locid;
						$result = $conn->query($sql);
						
						if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
						$loc_id = $row["LOC_ID"]."<br>";
						$loc_estado = $row["LOC_ESTADO"]."<br>";
						$loc_cep = $row["LOC_CEP"]."<br>";
						$loc_cidade = $row["LOC_CIDADE"]."<br>";
						$loc_rua = $row["LOC_RUA"]."<br>";
						$loc_bairro = $row["LOC_BAIRRO"];
						}
						} else {
						echo "0 results";
}						
						
						$sql    = "SELECT * FROM estabelecimentos WHERE EST_ID =" . $id_estabelecimento;
						$result = $conn->query($sql);
						
						if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
						$est_cnpj = $row["EST_CNPJ"];
						$est_site = $row["EST_SITE_EMPRESA"];
						$est_numero = $row["EST_NUMERO_ENDERECO"];
						$est_facebook = $row["EST_FACEBOOK_EMPRESA"];
						}
						} else {
						echo "0 results";
						}
						
					?>
			
			<!-- Main -->
				<div id="main-wrapper">
					<div id="main" class="container">
						<div id="content">

							<!-- Post -->
								<article class="box post">
									<header>
										<h2>Veja Aqui! Encontre todas <strong>as informações</strong><br/> do estabelecimento.<br /></h2>
									</header>
									<!--<span class="image featured"><img src="images/pic04.jpg" alt="" /></span>-->
									<h3>Localização</h3><br>
									<p>Estado: <?php echo $loc_estado ?></p>
									<p>Cep: <?php echo $loc_cep ?></p>
									<p>Cidade: <?php echo $loc_cidade ?></p>
									<p>Rua: <?php echo $loc_rua ?></p>
									<p>Bairro: <?php echo $loc_bairro ?></p>
									<p>Numero: <?php echo $est_numero ?></p>
								</article>
								
								<!-- Post -->
								<article class="box post"><br/><br/>
									<!--<span class="image featured"><img src="images/pic04.jpg" alt="" /></span>-->
									<h3>Contato</h3><br>
									<p>CNPJ: <?php echo $est_cnpj ?></p>
									<p>Site: <?php echo $est_site ?></p>
									<p>Facebook: <a href="https://<?php echo $est_facebook; ?>"><?php echo $est_facebook; ?></a></p>
									<p>Telefone: nao cadastrado</p>
									<p><a href="rankings.php">Posicao do Ranking #<?php echo $id_estabelecimento ?></a></p>
									
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