<!DOCTYPE html>
<?php
	session_start();
?>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<!-- INÍCIO DO META DO SLIDESHOW -->
			<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- FIM DO META DO SLIDESHOW -->
		
		<!-- TÍTULO DO SITE -->
			<title>Reclame São João</title>
		
		<!-- OUTROS -->
		
			<link href="css/animate.min.css" rel="stylesheet"> 
			<link href="css/font-awesome.min.css" rel="stylesheet">
			
			<link href="css/main.css" rel="stylesheet">
			<link href="css/responsive.css" rel="stylesheet">
			<link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link href="css/menu_do_site.css" rel="stylesheet">
			<link rel="stylesheet" href="css/rodape.css">
			<link rel="stylesheet" href="css/estilo.css">
			<link href="css/rec_logar.css" rel="stylesheet">	
			<link href="css/rec_estabelecimento.css" rel="stylesheet">
			<link rel="shortcut icon" href="images/favicon.ico">
			<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
			<link href="css/rec_estrela.css" rel="stylesheet" type="text/css" />
			<script type="text/javascript" src="js/jquery.js"></script>
			<script type="text/javascript" src="js/avaliations.js"></script>
			<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />	
<link rel="stylesheet" href="css/rodape.css">			

		
	</head>

<body>
	<!-- MENU DO SITE -->
		<div class="main-nav" >
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
					<ul class="nav navbar-nav navbar-right">   
						<li class="scroll active" id="menu_botao"><a href="#main-wrapper" id="cabecalho_a">Página de Notificação</a></li>
						<li class="scroll" id="menu_botao"><a href="index.php" id="cabecalho_a">Home</a></li>
						<li class="scroll" id="menu_botao"><a href="usu_loginUsuario.php" id="cabecalho_a">Logar</a></li>
					</ul>
				</div>
			</div>
		</div>
	<!-- FIM DO MENU DO SITE -->

	
	<!-- INICIO - CORPO DA PAGINA DE CADASTRO ESTABELECIMENTO -->
		<section id="contact">
			<table class="table_geral">		
         <tr>
            <td class="td_table_geral">
              
                  <table class="table_imagem">
                     <tr>
                        <td>
                           <center><img class="megaphone" src="images/icons/megaphoneops.png"/></center>
						</td>
                     </tr>
                  </table>
                  <table border="0" class="table_mensagem">
                     <tr>
                        <td>
                           <center>
                              <h2 class="mensagem">OPS...VOCÊ<br/>PRECISA ESTAR<br/>LOGADO!</h2>
                           </center>
						</td>
                     </tr>                
                     <tr>
                        <td>
                           <div class="div_botao">
                              <a href="usu_loginUsuario.php"><button type="submit" class="botao_logar">ClIQUE AQUI PARA LOGAR</button></a>
							  
                           </div>
                           <div class="div_botao">
                              <a href="usu_cadastroUsuario.php"><button type="submit"class="botao_cadastrar">CLIQUE AQUI PARA CADASTRAR-SE</button></a>
                           </div>
						   <div class="div_botao_responsivo" style="text-align:center; margin-left:3px;">
						   <a href="usu_loginUsuario.php"><button type="button" class="btn-lg btn-primary btn-block">ClIQUE AQUI PARA LOGAR</button></a>
						   <a href="usu_cadastroUsuario.php"><button type="button" class="btn-lg btn-default btn-block">CLIQUE AQUI PARA CADASTRAR-SE</button></a>
						</div>
						</td>   
                     </tr>                 
                  </table>
           </td>     
         </tr> 
      </table>
		</section>
	<!-- FIM - CORPO DA PAGINA DE CADASTRO ESTABELECIMENTO -->


	<!--RODAPÉ-->
		<br/>
		<center>
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
</center>
	<!--FIM DO RODAPÉ--> 
	
	<!-- SCRIPT EM GERAL -->
		<script type="text/javascript" src="js/jquery.js"></script>
		
		<script type="text/javascript" src="js/jquery.inview.min.js"></script>
		<script type="text/javascript" src="js/wow.min.js"></script>
		<script type="text/javascript" src="js/jquery.countTo.js"></script>
		
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>	
		<script type="text/javascript" src="js/autocomplete.js"></script>
		
	<!-- FIM DO SCRIPT EM GERAL -->  
</body>
</html>