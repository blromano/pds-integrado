
<!DOCTYPE html>

<?php	
	//Selecionando todos os dados da tabela Tipos Estabelecimentos
		include_once 'controle/TiposEstabelecimentosDAO.php';
			$conn = new Conexao();
			$TiposEstabelecimentosDAO = new TiposEstabelecimentosDAO();
			$registro_tipos_estabelecimentos = $TiposEstabelecimentosDAO->listarTodos();
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
			
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link href="css/main.css" rel="stylesheet">
			<link href="css/responsive.css" rel="stylesheet">
			
			<link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
			<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
			<link rel="shortcut icon" href="images/favicon.ico">
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
					<li class="scroll active"><a href="#contact">Cadastrar</a></li>
					<li class="scroll"><a href="index.php">Home</a></li>
					<li class="scroll"  ><a href="usu_loginUsuario.php">Logar</a></li>  
				</ul>
			</div>
		</div>
	</div>
	<!-- FIM DO MENU DO SITE -->
	
	
	<!-- INICIO - CORPO DA PAGINA DE CADASTRO ESTABELECIMENTO -->
	<section id="contact">
		<div id="contact-us" class="parallax">
			<div class="container">
				<div class="row">
					<div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
						<h2>Cadastre-se</h2>
						<p>Para ter acesso a todos os recursos oferecidos por nós!</p>
					</div>
				</div>
				
				
				<!-- INÍCIO DO FORMULÁRIO -->
				<div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
					<div class="row">
						<div class="col-sm-12">
							<form action="php/mod03/cadastrarEstabelecimento.php" method="POST">
								
								<!--     NOME DA EMPRESA     -->
									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" name="USU_NOME" class="form-control" placeholder="Nome da empresa" required="required" maxlength="50" oninvalid="setCustomValidity('Por favor, digite o nome da empresa corretamente')" onchange="try{setCustomValidity('')}catch(e){}">
										</div>
									</div>

								<!--     NOME FANTASIA      -->
									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" name="EST_NOME_FANTASIA" class="form-control" placeholder="Nome fantasia" required="required" maxlength="100" oninvalid="setCustomValidity('Por favor, digite o nome fantasia da empresa.')" onchange="try{setCustomValidity('')}catch(e){}">
										</div>
									</div>
								
								<!--     CNPJ      -->
									<div class="col-sm-4">
										<div class="form-group">
											<input type="text" name="EST_CNPJ" id="EST_CNPJ" class="form-control" placeholder="CNPJ" OnKeyPress="formatar('##.###.###/####-##', this)" maxlength="18" required="required" minlength="18" pattern=".{0}|.{18,18}" maxlength="18" oninvalid="setCustomValidity('Por favor, digite um CNPJ válido')" onchange="try{setCustomValidity('')}catch(e){}">
											
										</div>
									</div>
								
									<div class="col-sm-2">
										<div class="form-group">
											<p class="text-center" id="situacao_cnpj"></p>
										</div>
									</div>
								
								
								<!--     TELEFONE      -->
									<div class="col-sm-3">
										<div class="form-group">
											<input type="text" name="USU_TELEFONE" id="USU_TELEFONE" class="form-control" maxlength="14" placeholder="Telefone: (DDD) 0000-0000" required="required" oninvalid="setCustomValidity('Por favor, digite um telefone válido')" onchange="try{setCustomValidity('')}catch(e){}">
										</div>
									</div>
								
								<!--     NOME DO RESPONSÁVEL      -->
									<div class="col-sm-3">
										<div class="form-group">
											<input type="text" name="EST_NOME_RESPONSAVEL" class="form-control" placeholder="Nome do responsável" required="required" maxlength="100" oninvalid="setCustomValidity('Por favor, digite o nome do responsável.')" onchange="try{setCustomValidity('')}catch(e){}">
										</div>
									</div>
								
								<!--     PÚBLICO ALVO      -->
									<div class="col-sm-6">
										<div class="form-group">
											<textarea class="form-control" name="EST_PUBLICO_ALVO" placeholder="Público Alvo" maxlength="500" oninvalid="setCustomValidity('Por favor, digite o corretamente o público alvo.')" onchange="try{setCustomValidity('')}catch(e){}"></textarea>
										</div>
									</div>
								
								<!--     TIPO DE ESTABELECIMENTO      -->
									<div class="col-sm-6">
										<div class="form-group">
											<select class="form-control" name="TES_ID" id="TES_ID">
												<?php foreach ($registro_tipos_estabelecimentos as $linha_tipos_estabelecimentos_selecionado) 
													{
														{ 	
															print "<option class='form-control' value='{$linha_tipos_estabelecimentos_selecionado['TES_ID']}'>{$linha_tipos_estabelecimentos_selecionado['TES_CATEGORIA']}</option>";
														}
													}
												?>
											</select>
										</div>
									</div>
								
								<!--     CEP      -->
									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" name="LOC_CEP" class="form-control" id="cep"; placeholder="CEP" OnKeyPress="formatar('#####-###', this)" onblur="pesquisacep(this.value);" required="required" pattern=".{0}|.{9,9}" maxlength="9" oninvalid="setCustomValidity('Por favor, informe um CEP válido.')" onchange="try{setCustomValidity('')}catch(e){}">
										</div>
									</div>
								
								<!--     RUA      -->
									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" name="LOC_RUA" id="LOC_RUA" class="form-control" placeholder="Rua" maxlength="100" required="required" oninvalid="setCustomValidity('Por favor, digite a rua da empresa')" onchange="try{setCustomValidity('')}catch(e){}">
										</div>
									</div>
								
								<!--     BAIRRO      -->
									<div class="col-sm-4">
										<div class="form-group">
											<input type="text" name="LOC_BAIRRO" id="LOC_BAIRRO" class="form-control" placeholder="Bairro" maxlength="100" required="required" oninvalid="setCustomValidity('Por favor, digite o bairro da empresa.')" onchange="try{setCustomValidity('')}catch(e){}">
										</div>
									</div>
								
								<!--     NÚMERO      -->
									<div class="col-sm-2">
										<div class="form-group">
											<input type="number" name="EST_NUMERO_ENDERECO" class="form-control" placeholder="Número" required="required" maxlength="10" oninvalid="setCustomValidity('Por favor, digite o numero da empresa.')" onchange="try{setCustomValidity('')}catch(e){}">
										</div>
									</div>
								
								<!--     COMPLEMENTO - NÃO OBRIGATÓRIO     -->
									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" name="EST_COMPLEMENTO" class="form-control" placeholder="Complemento" maxlength="500">
										</div>
									</div>
								
								<!--     CIDADE      -->
									<div class="col-sm-4">
										<div class="form-group">
											<input type="text" name="LOC_CIDADE" id="LOC_CIDADE" class="form-control" required="required" placeholder="Cidade" maxlength="100">
										</div>
									</div>
								
								<!--     ESTADO      -->
									<div class="col-sm-2">
										<div class="form-group">
											<input type="text" name="LOC_ESTADO" id="LOC_ESTADO" class="form-control" required="required" placeholder="Estado" maxlength="50">
										</div>
									</div>
								
								<!--     SITE DA EMPRESA - NÃO OBRIGATÓRIO     -->
									<div class="col-sm-6">
										<div class="form-group">
											<input type="url" name="EST_SITE_EMPRESA" class="form-control" placeholder="Site da empresa" maxlength="200"  oninvalid="setCustomValidity('Por favor, digite site da empresa corretamente')" onchange="try{setCustomValidity('')}catch(e){}">
										</div>
									</div>
								
								<!--     FACEBOOK - NÃO OBRIGATÓRIO      -->
									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" name="EST_FACEBOOK_EMPRESA" class="form-control" placeholder="Facebook" maxlength="100" oninvalid="setCustomValidity('Por favor, digite site da empresa corretamente')" onchange="try{setCustomValidity('')}catch(e){}">
										</div>
									</div>
								
								<!--     EMAIL      -->
									<div class="col-sm-6">
										<div class="form-group">
											<input type="email" name="USU_EMAIL" id="USU_EMAIL" class="form-control" placeholder="Email" maxlength="100" required="required" pattern="[A-Za-z0-9._%+-]+@gmail.com" oninvalid="setCustomValidity('Por favor, digite um email valido (somente gmail)')" onchange="try{setCustomValidity('')}catch(e){}">
											<br/>
											<p class="text-center" id="situacao_email"></p>
										</div>
									</div>
								
								<!--     SENHA      -->
									<div class="col-sm-3">
										<div class="form-group">
											<input onkeyup="validaSenha();" type="password" name="USU_SENHA" id="USU_SENHA" class="form-control" placeholder="Senha" maxlength="12" required="required">  
										</div>
									</div>
								
								<!--     CONFIRMAR SENHA      -->
									<div class="col-sm-3">
										<div class="form-group">
											<input onkeyup="validaSenha();" type="password" name="USU_SENHA_CONFIRMAR" id="USU_SENHA_CONFIRMAR"  class="form-control" placeholder="Confirmar Senha" maxlength="12" required="required">
											<br/>
											<p class="text-center" id="resultado"> </p>
										</div>
									</div>
								
								<div class="form-group" style="margin-bottom: 0px;">
									<button type="submit" class="btn-submit2" id="enviarcadastro">Confirmar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- FIM DO FORMULÁRIO -->	
			</div>
		</div>
	</div>			
</section>
<!-- FIM - CORPO DA PAGINA DE CADASTRO ESTABELECIMENTO -->

	<!-- INÍCIO MODAL - ALERTA DE SENHAS NÃO CORRESPONDENTES -->
		<div id="ALERTA_SENHA_NAO_CORRESPONDENTE" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title text-center">Senhas não Correspondentes</h4>
					</div>
					<form>
						<div class="modal-body">
							<p class="text-center">As senhas digitadas não correspondem, verifique-as e tente novamente!</p>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-danger" data-dismiss="modal">Confirmar</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	<!-- FIM MODAL - ALERTA DE SENHAS NÃO CORRESPONDENTES  -->


	<!-- INÍCIO MODAL - ALERTA DE EMPRESA JÁ CADASTRADA -->
		<div id="ALERTA_CNPJ_EM_USO" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title text-center">CNPJ em Uso</h4>
					</div>
					<form>
						<div class="modal-body">
							<p class="text-center">Este CNPJ está sendo usado por outro estabelecimento. Por favor, digite um CNPJ válido!</p>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-danger" data-dismiss="modal">Confirmar</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	<!-- FIM MODAL - ALERTA DE EMPRESA JÁ CADASTRADA  -->

	<!--RODAPÉ-->
	<footer id="footer" style="background-color: #232323; margin-bottom: -10%;" >
			<div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
				<div class="container text-center">
					<div class="tudo">

						<div class="logo">
							<a href="index.php"><img style="margin-left: 30%; margin-top: 4%;"  class="img-responsive" src="images/logo.png" alt=""></a> 
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
							<h3>Sobre o IFSP e o projeto</h3>
							<p>Somos uma equipe de alunos do Instituto Federal de São Paulo - Campus São João da Boa Vista, que buscam finalizar o projeto proposto em uma das disciplinas 
								com o maior sucesso possível. <br/>
								Ao alcançar esse sucesso, estaremos proporcionando para a cidade um novo sistema que pode impulsionar o comércio justo e maior comprometimento 
								por parte dos estabelecimentos presentes na cidade.  <a href="sobreProjeto.php">Saiba mais...</a></p>
						</div>	
					</div>
				</div>
			</div>
			
			<div class="footer-bottom" style="background-color: #191919;">
				<div class="container">
					<div class="row">
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
	
	<!-- SCRIPT EM GERAL -->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.inview.min.js"></script>
		<script type="text/javascript" src="js/wow.min.js"></script>
		<script type="text/javascript" src="js/mousescroll.js"></script>
		<script type="text/javascript" src="js/smoothscroll.js"></script>
		<script type="text/javascript" src="js/jquery.countTo.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
		<script type="text/javascript" src="js/mod03/verificarCEP.js"></script>
		<script type="text/javascript" src="js/mod03/formatarCNPJ.js"></script>
		<script type="text/javascript" src="js/mod03/validarSenha.js"></script>
		<script type="text/javascript" src="js/mod03/mascaraTelefone.js"></script>
		<!--<script type="text/javascript" src="js/mod03/verificarTelefone.js"></script>-->
		<script type="text/javascript" src="js/mod03/verificarEmail.js"></script>
		<script type="text/javascript" src="js/mod03/verificarCNPJ.js"></script>
	<!--FIM DO SCRIPT EM GERAL -->  
</body>
</html>