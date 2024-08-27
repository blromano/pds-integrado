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
			
			<link href="css/main.css" rel="stylesheet">
			<link href="css/responsive.css" rel="stylesheet">
			<link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link href="css/menu_do_site.css" rel="stylesheet">
			<link rel="stylesheet" href="css/rodape.css">
			<link rel="stylesheet" href="css/estilo.css">
			<script src = "https://unpkg.com/sweetalert/dist/sweetalert.min.js"> </script>
			
			
			<!--
				<link rel="shortcut icon" href="images/favicon.ico">
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
				<link href="css/bootstrap.min.css" rel="stylesheet">
				<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			-->
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
				<br/><br/><br/>
	<div class="container">		
		<br/>
		<br/>
		<div class="row">
			<!-- INÍCIO -  Gerencimento do Perfil do Estabelecimento -->
			<div class="col-sm-12">

				<div class="col-sm-14" id="selecionar-todas-reclamacoes">
					<div class="panel panel-default" style="border-left: thick double  #64594f; border-right: thick double  #64594f;">
						<div class="panel-body">
							<div style="text-align:center;"><h4><span class="fa fa-address-card-o" aria-hidden="true"></span> Cadastro de Estabelecimento </h4></div>
							<div class="pull-right"></div>
						</div>
					</div>
				</div>
				
					<!--
				<div class="col-sm-12 alert alert-danger" role="alert" id="mostrar_cnpj_invalido">
					<strong id="situacao_cnpj_invalido" ></strong>
				</div>
				
				<div class="col-sm-12  alert alert-success alert-dismissable fade in" id="mostrar_cnpj_valido">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong id="situacao_cnpj_valido"></strong>
				</div>
			-->	

			</div>
			<!-- FIM - Gerencimento do Perfil do Estabelecimento -->
		</div>
		
				
				
				<!-- INÍCIO DO FORMULÁRIO -->
				<div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
					<div class="row">
						<div class="col-sm-14">
							<form action="php/mod03/cadastrarEstabelecimento.php" method="POST" id="form_cadastro_estabelecimento" name="form_cadastro_estabelecimento" enctype="multipart/form-data">
								
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
								
									<div class="col-sm-2" style="text-align:center;">
										<div class="form-group">
											<span class="help-block"  id="situacao_cnpj"></span>
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
									<div class="col-sm-3">
										<div class="form-group">
											<input type="url" name="EST_SITE_EMPRESA" class="form-control" placeholder="Site da empresa" maxlength="200"  oninvalid="setCustomValidity('Por favor, digite site da empresa corretamente')" onchange="try{setCustomValidity('')}catch(e){}">
										</div>
									</div>
								
								<!--     FACEBOOK - NÃO OBRIGATÓRIO      -->
									<div class="col-sm-3">
										<div class="form-group">
											<input type="text" name="EST_FACEBOOK_EMPRESA" class="form-control" placeholder="Facebook" maxlength="100" oninvalid="setCustomValidity('Por favor, digite site da empresa corretamente')" onchange="try{setCustomValidity('')}catch(e){}">
										</div>
									</div>
								
								<!--     EMAIL      -->
									<div class="col-sm-6" style="text-align:center;">
										<div class="form-group">
											<input type="email" name="USU_EMAIL" id="USU_EMAIL" class="form-control" placeholder="Email" maxlength="100" required="required" pattern="[A-Za-z0-9._%+-]+@gmail.com" oninvalid="setCustomValidity('Por favor, digite um email valido (somente gmail)')" onchange="try{setCustomValidity('')}catch(e){}">
											
											<span class="help-block"  id="situacao_email"></span>
										</div>
									</div>
								
								
									
									<!--     FOTO DE PERFIL      -->
									<div class="col-sm-6">
										<div class="form-group">
											<div class="input-group">
												<label class="input-group-btn">
													<span class="btn btn-default">
														Selecionar Foto de Perfil <input type="file" name="USU_FOTO_PERFIL" id="USU_FOTO_PERFIL" accept="image/*;capture=camera" style="display: none;" multiple required>							
													</span>
												</label>
												<input type="text" class="form-control" readonly>
											</div>
										</div>
									</div>
								
								<!--     SENHA      -->
									<div class="col-sm-3">
										<div class="form-group">
											<input onkeyup="validaSenha();" type="password" name="USU_SENHA" id="USU_SENHA" class="form-control" placeholder="Senha" maxlength="12" required="required">  
										</div>
									</div>
								
								<!--     CONFIRMAR SENHA      -->
									<div class="col-sm-3" style="text-align:center;">
										<div class="form-group">
											<input onkeyup="validaSenha();" type="password" name="USU_SENHA_CONFIRMAR" id="USU_SENHA_CONFIRMAR"  class="form-control" placeholder="Confirmar Senha" maxlength="12" required="required">
											
											<span class="help-block"  id="resultado"></span>
										</div>
									</div>
								
								<div class="panel-group">	
												
													<div class="panel-heading">
														<ul class="nav nav-tabs nav-justified">
															<li>
																<button type="submit" id="enviarcadastro" style="display:none;" data-validate="contact-form">Hidden Button</button>
																<a href="javascript:;" class="myClass" onclick="$('#enviarcadastro').click();" id="enviarcadastro"><span class="fa fa-tachometer" aria-hidden="true"></span> Confirmar Cadastro</a>
																
															</li>
														</ul>	
													</div>
												
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
	
	<!-- SCRIPT EM GERAL -->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/mod01/foto_perfil.js"></script>
		<script type="text/javascript" src="js/jquery.inview.min.js"></script>
		<script type="text/javascript" src="js/wow.min.js"></script>
		<script type="text/javascript" src="js/jquery.countTo.js"></script>
		
		
		<script type="text/javascript" src="js/mod03/verificarCEP.js"></script>
		<script type="text/javascript" src="js/mod03/formatarCNPJ.js"></script>
		<script type="text/javascript" src="js/mod03/validarSenha.js"></script>
		<script type="text/javascript" src="js/mod03/mascaraTelefone.js"></script>
		<script type="text/javascript" src="js/mod03/verificarEmail.js"></script>
		<script type="text/javascript" src="js/mod03/verificarCNPJ.js"></script>
		
		<!--
			<script type="text/javascript" src="js/mousescroll.js"></script>
			<script type="text/javascript" src="js/smoothscroll.js"></script>
			<script type="text/javascript" src="js/bootstrap.min.js"></script>
			<script type="text/javascript" src="js/mod03/verificarTelefone.js"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="js/main.js"></script>
		--> 
		
	<!-- FIM DO SCRIPT EM GERAL -->  
</body>
</html>