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
	<link href="css/rec_avaliar.css" rel="stylesheet">
	<link href="css/rec_formulario.css" rel="stylesheet">
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
			<li class="scroll active" style="cursor: pointer;"><a href="#main-wrapper">Avaliação</a></li>
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
							<p>Bem Vindo a página de avaliação. Aqui voce pode fazer a sua avaliação.</p>


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

					
			
			<!-- Conteudo -->
				<center><table border="1" style="margin-top: 5%;  width: 30%;">
				<tr>
				<td style=" "><center><span class="fa fa-star-half-o" id="form_icon"></span></center></td>
				<td><center><SPAN class="form_titulo">Preencha o formulário para <br/>fazer sua <strong>avaliação!</strong></SPAN></center></td>
				</tr>
				</table></center>
								
				<div class="loucura3">
				<div class="menutudao">


				
				<p class="loucura33">É muito importante que você faça a avaliação de maneira objetiva e demonstre apenas o seu sentimento em relação ao estabelecimento 
				avaliado, dessa maneira voce ajudara outros usuarios.</p>
				
				<form action="notaAvaliacao.php" method="GET">
				<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
				<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
				
				<span for="descricao" class="ava_titulo"><strong>Escreva sua Avaliação </strong></span><br/>
				<textarea name="descricao" id="form_assunto" rows="20" cols="70" placeholder="Escreva aqui todos os detalhes da sua reclamação..." maxlength="75" required="required"></textarea>
				<br/>
				<span for="descricao" class="ava_titulo"><strong>Selecione as estrelas...</strong></span><br/>
				<div class="estrelas">
				<input type="radio" id="cm_star-empty" name="valor" value="" checked/>
				<label for="cm_star-1"><i class="fa"></i></label>
				<input type="radio" id="cm_star-1" name="valor" value="1"/>
				<label for="cm_star-2"><i class="fa"></i></label>
				<input type="radio" id="cm_star-2" name="valor" value="2"/>
				<label for="cm_star-3"><i class="fa"></i></label>
				<input type="radio" id="cm_star-3" name="valor" value="3"/>
				<label for="cm_star-4"><i class="fa"></i></label>
				<input type="radio" id="cm_star-4" name="valor" value="4"/>
				<label for="cm_star-5"><i class="fa"></i></label>
				<input type="radio" id="cm_star-5" name="valor" value="5"/>
				<i class="fa"></i>
				</div>
				
				<button type="submit"  onclick="enviar()" class="ava_butom">Avaliar</button></a>
				</form>
				
				</div></div>
				 

		</div>
		

		<!--RODAPÉ-->
	<footer id="footer" style="background-color: #232323; margin-top: 15%;" >
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
		
<!--script em geral-->

<!--script essenciais -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="js/main.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<!--script essenciais -->


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
<!--fim do script em geral-->
		
	</body>
</html>