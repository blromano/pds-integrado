
<!DOCTYPE html>

<?PHP
	session_start();
	session_destroy();	
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
			<link rel="shortcut icon" href="images/favicon.ico">
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link href="css/mod01/exibirSenha.css" rel="stylesheet">			
			<link rel="stylesheet" href="css/estilo.css">
    		<link rel="stylesheet" href="css/rodape.css">
    		<link href="css/menu_do_site.css" rel="stylesheet">
			
			<script src = "https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			
			<!--<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">-->
			
			

			
					
			<script>
				function cadastroNovo() 
				{  swal({
                          title: "Cadastro realizado com sucesso!",
                          text: "Valide seu cadastro para ter acesso!",
                          icon: "success",
                          button: "Confirmar"

                        },
                        );
				}
                </script>

				
                 <?php function escrevaCadastro(){
                    	echo "<script>cadastroNovo();</script>"; 
                 }							
				?>

				<script>
				function erroUsuario() 
				{  swal( "Usuário e/ou senha incorreto(s)" ,  "Lembre-se de ativar seu cadastro no e-mail caso não tenha ativado!" ,  "error" );
				}
				function erroUsuario2() 
				{  swal( "Conta suspensa" ,  "A sua conta foi bloqueada por violar nossos termos!" ,  "error" );
				}
                </script>

				
                 <?php function escrevaErroUsuario(){
                    	echo "<script>erroUsuario();</script>"; 
                 }			

				 function escrevaErroUsuario2(){
                    	echo "<script>erroUsuario2();</script>"; 
                 }						 
				?>

				<script>
				function recEmail() 
				{  swal({
                          title: "Email enviado com sucesso!",
                          text: "Acesse seu e-mail para recuperar a senha.",
                          icon: "success",
                          button: "Confirmar"

                        },
                        );
				}
                </script>

				
                 <?php function escrevaRecEmail(){
                    	echo "<script>recEmail();</script>"; 
                 }							
				?>

				<script>
				function validado() 
				{  swal({
                          title: "Cadastrado validado com sucesso!",
                          text: "Acesse com sua conta no Portal Reclame São João",
                          icon: "success",
                          button: "Confirmar"

                        },
                        );
				}
                </script>

				
                 <?php function escrevaValidado(){
                    	echo "<script>validado();</script>"; 
                 }							
				?>

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
					<li class="scroll active"><a href="usu_loginUsuario">Login</a></li>
					<li class="scroll"><a href="index.php">Home</a></li>
					<li class="scroll"  ><a data-toggle="modal" style="cursor: pointer" data-target="#modal-mensagem">Cadastrar</a></li>  
				</ul>
			</div>
		</div>
	</div>
	<!-- FIM DO MENU DO SITE -->
	
	
	<!-- INICIO - CORPO DA PAGINA DE CADASTRO ESTABELECIMENTO -->
	<section id="contact" style="">
		<div id="contact-us" class="parallax">
		<div class="container">
				<br/><br/><br/><br/><br/>
				<div class="row">
					<!-- INÍCIO -  Gerencimento do Perfil do Estabelecimento -->
					<div class="col-sm-6  col-md-offset-3">

						<div class="col-sm-12" id="selecionar-todas-reclamacoes">
							<div class="panel panel-default" style="border-left: thick double  #64594f; border-right: thick double  #64594f;">
								<div class="panel-body">
									<div style="text-align:center;"><h4><span class="fa fa-sign-in" aria-hidden="true"></span> Acesse sua Conta </h4></div>
									<div class="pull-right"></div>
								</div>
							</div>
						</div>

					</div>
					<!-- FIM - Gerencimento do Perfil do Estabelecimento -->
				</div>

				<!-- INÍCIO DO FORMULÁRIO -->
				<div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
					<div class="row">
						<div class="col-sm-6  col-md-offset-3">
							<p style="text-align:center;color:green;">
								<?php if(isset($_SESSION['cadastro'])){
									echo escrevaCadastro();	
								}?>

							  <?php if(isset($_SESSION['cadastroValidado'])){
									echo escrevaValidado();
							  
								}?>
							</p>
							<p style="text-align:center;color:green;">
								<?php if(isset($_SESSION['emailSend'])){
									echo escrevaRecEmail();
								}?>
							</p>	
							<p class="text-center" style="color:red;">
								<?php if(isset($_SESSION['loginErro'])){
									echo escrevaErroUsuario();
								}?>
								<?php if(isset($_SESSION['loginErro2'])){
									echo escrevaErroUsuario2();
								}?>
							</p>
						
					   
						
							<form id="main-login-form" name="login-form" action="php/mod01/loginUsuario.php" method="POST">
								<br/>
								<br/>
								
								<!--    e-mail     -->
									<div class="col-sm-12">
										<div class="form-group">
											<input type="email" name="USU_EMAIL" class="form-control input-lg" placeholder="Digite seu email" required="required" maxlength="50" oninvalid="setCustomValidity('Por favor, digite um email válido')" onchange="try{setCustomValidity('')}catch(e){}">					
										</div>
									</div>

								
								
								<!--     senha      -->
									<div class="col-sm-12">
										<div class="form-group">
											 <input type="password" name="USU_SENHA" id="USU_SENHA" class="form-control input-lg" placeholder="Digite sua Senha" required="required" oninvalid="setCustomValidity('Por favor, digite uma senha válida.')" onchange="try{setCustomValidity('')}catch(e){}">
											 <img src="https://cdn2.iconfinder.com/data/icons/flat-ui-icons-24-px/24/eye-24-512.png" id="eye" alt="eye" class="input_img"/>
										</div>
									</div>

								
								<div class="panel-group">		
													<div class="panel-heading">
														<ul class="nav nav-tabs nav-justified">
															<li>
																<button type="submit" id="submitBtn" style="display:none;" data-validate="contact-form">Hidden Button</button>
																<a href="javascript:;" class="myClass" onclick="$('#submitBtn').click();" id="enviarcadastro"><span class="fa fa-tachometer" aria-hidden="true"></span>  Logar</a>
																
															</li>
														</ul>	
													</div>
								</div>
      			
                      
								<!-- LINK PARA CRIAR UMA NOVA CONTA -->
								<div class="col-sm-12">
									<div class="form-group" style="text-align:center;">	
										<a href="usu_emailRecuperarSenha.php" >Esqueceu sua Senha?</a>
										<p>Você é novo no Site?
										  <a data-toggle="modal" style="cursor: pointer" data-target="#modal-mensagem"> Crie uma Conta </a>
										</p>
									</div>
								</div>
                                
								<div class="clearfix"></div>
                                <br/>
                                 
								<!-- INFORMAÇÕES SOBRE O SITE -->
                                <div style="text-align:center;">
                                    <h1><i class="fa fa-graduation-cap"></i> Instituto Federal</h1>
                                    <p>© 2017 Educação, Ciência e Tecnologia</p>
                                </div>
							</form>
						</div>							
					</div>
				</div>		
			</div>
		</div>
		</div>		
</section>
<!-- FIM - CORPO DA PAGINA DE CADASTRO ESTABELECIMENTO -->

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
	
	 <!-- Modal escolher forma de cadastro (usuário / estabelecimento)-->
	<div class="modal fade" id="modal-mensagem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-sm" role="document">
		<div class="modal-content modal-sm">
		  <div class="modal-header modal-sm">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel" style="text-align: center;">Qual das opções abaixo você deseja cadastrar-se?</h4>
		  </div>

		  <div class="modal-footer" align="center">
						<button class="btn btn-primary" type="submit" onclick="location.href='usu_cadastroUsuario.php'".click();>Consumidor</button>
						<button class="btn btn-primary" type="submit" onclick="location.href='est_cadastro.php'".click();>Estabelecimento</button>
		  </div>
		</div>
	  </div>
	</div>
	
	<!-- SCRIPT EM GERAL -->
		<script type="text/javascript" src="js/mod01/exibirSenha.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
		<!--<script type="text/javascript" src="js/bootstrap.min.js"></script>-->
		<script type="text/javascript" src="js/jquery.inview.min.js"></script>
		<script type="text/javascript" src="js/mod03/verificarEmail.js"></script>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!--FIM DO SCRIPT EM GERAL -->  


</body>
</html>
