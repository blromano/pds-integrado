<!DOCTYPE html>

<?php
	$PESQUISAR_ID = $_GET["PESQUISAR_ID"];
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
			<script src = "https://unpkg.com/sweetalert/dist/sweetalert.min.js"> </script>
			<link href="css/rec_pesquisar.css" rel="stylesheet">
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
						<li class="scroll active"><a href="#contact">Pesquisar</a></li>
						<li class="scroll"><a href="index.php">Home</a></li>
					</ul>
				</div>
			</div>
		</div>
	<!-- FIM DO MENU DO SITE -->
	
	
	<!-- INICIO - CORPO DA PAGINA DE CADASTRO ESTABELECIMENTO -->
		<section id="contact">
			<div id="contact-us" class="parallax">
				<div class="container"><br/><br/><br/>
					<div class="container"><br/><br/>
						<!-- INÍCIO -  REALIZAR RECLAMAÇÃO -->
							<?php if($PESQUISAR_ID == 1): ?>
							<div class="row">
								<div class="col-sm-12">

									<div class="col-sm-14" id="selecionar-todas-reclamacoes">
										<div class="panel panel-default" style="border-left: thick double  #64594f; border-right: thick double  #64594f;">
											<div class="panel-body">
												<div style="text-align:center;"><h4><span class="fa fa-address-card-o" aria-hidden="true"></span> Realizar Reclamação </h4></div>
												<div class="pull-right"></div>
											</div>
										</div>
									</div>

								</div>
							</div>
						<!-- FIM - REALIZAR RECLAMAÇÃO -->
						
						<!-- INÍCIO -  REALIZAR AVALIAÇÃO -->
							<?php elseif($PESQUISAR_ID == 2): ?>
							<div class="row">
								<div class="col-sm-12">

									<div class="col-sm-14" id="selecionar-todas-reclamacoes">
										<div class="panel panel-default" style="border-left: thick double  #64594f; border-right: thick double  #64594f;">
											<div class="panel-body">
												<div style="text-align:center;"><h4><span class="fa fa-address-card-o" aria-hidden="true"></span> Realizar Avaliação </h4></div>
												<div class="pull-right"></div>
											</div>
										</div>
									</div>

								</div>
							</div>
							<?php endif; ?>
						<!-- FIM - REALIZAR AVALIAÇÃO -->
						
						 <?php if($PESQUISAR_ID == 1): ?>
							<!-- INÍCIO DO FORMULÁRIO - RECLAMAÇÃO -->
								<div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
									<div class="row">
										<div class="col-md-6 col-md-offset-3">
											<form class="navbar-form" role="search" action='rec_formulario.php' method='get'>
												<div class="input-group add-on col-md-12">
												  <input class="form-control input-lg" id='EST_NOME' name='EST_NOME' value='' class="barrapesquisa auto" placeholder="Pesquisar Estabelecimento" type="text">
												 
												  <div class="input-group-btn">
													<button class="btn btn-lg"  name="destination-submit" type="submit"><i class="glyphicon glyphicon-search"></i></button>
												  </div>
												</div>
													<input type="hidden" name="link" value="rec_pesquisar_estabelecimento.php">
											</form>
										</div>
									</div>
								</div>
						<!-- FIM DO FORMULÁRIO - RECLAMAÇÃO -->

						<?php elseif($PESQUISAR_ID == 2): ?>
							<!-- INÍCIO DO FORMULÁRIO - AVALIAÇÃO -->
								<div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
									<div class="row">
										<div class="col-md-6 col-md-offset-3">
											<form class="navbar-form" role="search" action='ava_formulario.php' method='get'>
												<div class="input-group add-on col-md-12">
												  <input class="form-control input-lg" id='EST_NOME' name='EST_NOME' value='' class="barrapesquisa auto" placeholder="Pesquisar Estabelecimento" type="text">
												 
												  <div class="input-group-btn">
													<button class="btn btn-lg"  name="destination-submit" type="submit"><i class="glyphicon glyphicon-search"></i></button>
												  </div>
												</div>
													<input type="hidden" name="link" value="rec_pesquisar_estabelecimento.php">
											</form>
										</div>
									</div>
								</div>
						<?php endif; ?>	 
						<!-- FIM DO FORMULÁRIO - AVALIAÇÃO -->	
						
					</div>
				</div>
			</div>			
		</section>
	<!-- FIM - CORPO DA PAGINA DE CADASTRO ESTABELECIMENTO -->


	<!--RODAPÉ-->
		<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
		<iframe id="divframerodape" style="" frameborder="0" scrolling="NO" src='rec_rodape.php'></iframe> 
	
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