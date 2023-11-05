<!DOCTYPE html>
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
			
		<!-- SIDEBAR -->
			<link href="../../css/sidebar.css" rel="stylesheet">
		
		<!-- OUTROS -->
			<link href="../../css/bootstrap.min.css" rel="stylesheet">
			<link href="../../css/animate.min.css" rel="stylesheet"> 
			<link href="../../css/font-awesome.min.css" rel="stylesheet">
		
			<link href="../../css/main.css" rel="stylesheet">
			<link href="../../css/testes.css" rel="stylesheet">
			<link href="../../css/login.css" rel="stylesheet">
			<link href="../../css/estabelecimento.css" rel="stylesheet">
			<link href="../../css/responsive.css" rel="stylesheet">
			
			<link id="css-preset" href="../../css/presets/preset1.css" rel="stylesheet">
			<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
			<link rel="shortcut icon" href="../../images/favicon.ico">
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
					  <a class="navbar-brand" href="../../index.html">
						<h1><img class="img-responsive" src="../../images/logo.png" alt="logo"></h1>
					  </a>                    
					</div>
				
					<!-- MENU DO SITE - OPÇÕES-->
					<div class="collapse navbar-collapse">
					  <ul class="nav navbar-nav navbar-right">   
						<li class="scroll active"><a href="#contact">Reunião</a></li>
						<li class="scroll"><a href="mod03-boas-vindas.html">Home</a></li>
		
						<li class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="badge"><span class="glyphicon glyphicon-bell"></span> 2</span></a>
										<ul class="dropdown-menu">
											<li><a href="#">Nova resposta de Marcelo</a></li>
											<li><a href="#">Denuncia de Carol</a></li>
										</ul>
						</li>    
					  </ul>
					</div>
			  </div>
			</div>
			<!-- FIM DO MENU DO SITE -->
			
			<!-- INÍCIO DA NAV SIDEBAR -->
			<aside>
				<nav class="navbar navbar-inverse sidebar navbar-fixed-top" role="navigation">

					<div class="nav-side-menu">
						<div class="brand">Menu do Opções</div>
						<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

						<div class="menu-list">

							<ul id="menu-content" class="menu-content collapse out">
								<li data-toggle="collapse" data-target="#service" class="collapsed">
									<a href="#"><i class="fa fa-caret-down fa-lg"></i> Meu Perfil <i class="glyphicon glyphicon-user" style="margin-top:5px; margin-right:4px;"></i></a>
								</li>
								<ul class="sub-menu collapse" id="service">
									<li><a href="mod03-perfil.html">Visualizar Perfil</a></li>
									<li><a href="mod03-perfil.html">Editar Perfil</a></li>
								</ul>
								
								
								<li data-toggle="collapse" data-target="#service2" class="collapsed">
									<a href="#"><i class="fa fa-caret-down fa-lg"></i> Reclamações <i class="fa fa-file-text fa-lg btn pull-right" style="margin-top:5px; margin-right:4px;"></i></a>
								</li>
								<ul class="sub-menu collapse" id="service2">
									<li><a href="mod03-gerenciar-reclamacao-atendida.html">Reclamações Atendidas</a></li>
									<li><a href="mod03-gerenciar-reclamacao-nao-atendida.html">Reclamações Não Atendidas</a></li>
								</ul>

								<li data-toggle="collapse" data-target="#new" class="collapsed">
									<a href="index.html"><i class="fa fa-caret-down fa-lg"></i> Sair <i class="fa fa-file-text fa-lg btn pull-right" style="margin-top:5px; margin-right:2px;"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</aside>
			<!-- FIM DA NAV SIDEBAR -->

		<!-- CORPO DA PAGINA AGENDAR REUNIÃO -->
		<section id="contact">
				<div id="contact-us" class="parallax">
				  <div class="container">
					<div class="row">
					  <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
						<h2>Agendamento de Reunião</h2>
						<p>Página destinada ao agendamento de reuniões entre clientes e estabelecimentos!</p>
					  </div>
					</div>
					<div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
					  <div class="row">
						<div class="col-sm-6 " style="width: 60%; margin-right:20%; margin-left:20%; ">
						
						<!--    INÍCIO FORMULÁRIO      -->
						  <form id="main-contact-form" name="contact-form" method="post" action="#" style="border: 1px solid white; padding: 15px; 30px 0px;">
							
							<div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
								  
									  <!--     NOME DO EVENTO     -->
									  <div class="col-sm-6" style="padding-left: 20px;">
										<div class="form-group">
										  <input type="text" name="nomeevento" class="form-control" placeholder="Nome do evento" required="required">
										</div>
									  </div>

									  <!--     DATA      -->
									  <div class="col-sm-6" style="padding-left: 20px;">
										<div class="form-group">
											<input type="date" name="subject" class="form-control" placeholder="Data" required="required">
										</div>
									  </div>
							</div>
							
							<div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
								  
									  <!--     HORÁRIO DE INÍCIO     -->
									  <div class="col-sm-6" style="padding-left: 20px;">
										<div class="form-group">
										  <input type="number" name="horarioinicio" class="form-control" placeholder="Horário de início" required="required">
										</div>
									  </div>

									  <!--     HORÁRIO DE TÉRMINO      -->
									  <div class="col-sm-6" style="padding-left: 20px;">
										<div class="form-group">
											<input type="number" name="horariotermino" class="form-control" placeholder="Horário de término" required="required">
										</div>
									  </div>
							</div>
							
							<legend>Detalhes do evento</legend>
							<div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
								  
									  <!--     LOCAL      -->
									  <div class="col-sm-6" style="padding-left: 20px;">
										<div class="form-group">
											<input type="local" name="local" class="form-control" placeholder="Local" required="required">
										</div>
									  </div>
							</div>
								
							<!--     DESCRIÇÃO DO EVENTO      -->
							<div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
										<div class="col-sm-6">
											<div class="form-group">	  
												<fieldset>
													<textarea name="descricaoevento"  class="textarea3" placeholder="Descrição" style="resize: none;"></textarea>
												</fieldset>
											</div>
										</div>
							</div>
							
							<!--     BOTÃO CONFIRMAR      -->
							<div class="form-group" style="margin-bottom: 0px;">
									  <button type="submit" class="btn-submit2" dtype="submit" onclick="location.href='mod03-boas-vindas.html'".click(); >Confirmar</button>
							</div>
							
						</form>   
						<!--    FIM FORMULÁRIO      -->		  
						</div>
					  </div>
					</div>
				  </div>
				</div>        
		</section>

		<!-- RODAPÉ -->
			<footer id="footer" style="background-color: #232323; margin-bottom: -10%; margin-top: 18%;" >
				<div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
				<div class="container text-center">
				<div class="tudo">

					<div class="logo">
					<a href="index.html"><img style="margin-left: 30%; margin-top: 4%;"  class="img-responsive" src="../../images/logo.png" alt=""></a> 
						<div id=icons" class="social-icons" style="margin-top: 5%;" >
						<ul>
						<li><a class="envelope" href="#"><i class="fa fa-envelope"></i></a></li>
						<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li> 
						<li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
						<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
						<li><a class="tumblr" href="#"><i class="fa fa-tumblr-square"></i></a></li>
						</ul>
						</div>
					</div>

					<div class="texto">
						<h3>Sobre nós</h3>
						<p>Somos uma equipe de alunos do Instituto Federal de São Paulo - Campus São João da Boa Vista, que buscam finalizar o projeto proposto em uma das disciplinas 
						com o maior sucesso possível. <br/>
						Ao alcançar esse sucesso, estaremos proporcionando para a cidade um novo sistema que pode impulsionar o comércio justo e maior comprometimento 
						por parte dos estabelecimentos presentes na cidade.</p>
					</div>	
					</div>
					</div>
					</div>
					
						<div class="footer-bottom" style="background-color: #191919;">
						<div class="container" >
						<div class="row" >
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
		<!-- FIM DO RODAPÉ --> 
	  
		<!-- SCRIPT EM GERAL -->
			<script type="text/javascript" src="../../js/jquery.js"></script>
			<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
			<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
			<script type="text/javascript" src="../../js/jquery.inview.min.js"></script>
			<script type="text/javascript" src="../../js/wow.min.js"></script>
			<script type="text/javascript" src="../../js/mousescroll.js"></script>
			<script type="text/javascript" src="../../js/smoothscroll.js"></script>
			<script type="text/javascript" src="../../js/jquery.countTo.js"></script>
			<script type="text/javascript" src="../../js/main.js"></script>
		<!--FIM DO SCRIPT EM GERAL -->
	  
	</body>
</html>