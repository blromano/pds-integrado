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
		
		<!-- OUTROS -->
		
			<link href="css/animate.min.css" rel="stylesheet"> 
			<link href="css/font-awesome.min.css" rel="stylesheet">	
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link href="css/main.css" rel="stylesheet">
			<link href="css/responsive.css" rel="stylesheet">		
			<link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
			<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
			<link rel="shortcut icon" href="images/favicon.ico">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>	
			
		    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  			<!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->

  			<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  			<link rel="stylesheet" href="css/mod01/bootstrapValidator.css"/>
  
		    <script type="text/javascript" src=".js/jquery.min.js"></script>
   			<script type="text/javascript" src="js/mod01/bootstrap.min.js"></script>
   			<script type="text/javascript" src="js/mod01/bootstrapValidator.js"></script>
   			<script type="text/javascript" src="js/mod01/verificarCPF.js"></script>
   			<script type="text/javascript" src="js/mod01/formatarCPF.js"></script>

   			<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
			<script type="text/javascript" src="./js/jquery.maskedinput-1.3.1.min.js"></script>
			<script src = "https://unpkg.com/sweetalert/dist/sweetalert.min.js"> </script>
			
			<link rel="stylesheet" href="css/estilo.css">
			<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    		<link rel="stylesheet" href="css/rodape.css">
    		<link href="css/menu_do_site.css" rel="stylesheet">
				
   			
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
	
	
	<!-- INICIO - CORPO DA PAGINA DE CADASTRO CONSUMIDOR -->
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
							<div style="text-align:center;"><h4><span class="fa fa-address-card-o" aria-hidden="true" ></span> Cadastro de Consumidor </h4><p class="text-center" style="text-align: right; color: red; font-size: 12px;">* Campos Obrigatórios </p></div>

							<div class="pull-right"></div>
						</div>
					</div>
				</div>

			</div>
			<!-- FIM - Gerencimento do Perfil do Estabelecimento -->
		</div>		
				</style>
				
				<!-- INÍCIO DO FORMULÁRIO -->
				<div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
					<div class="row">
						<div class="col-sm-14">
							<form action="php/mod01/cadastrarUsuario.php" method="POST" id="cadastro" name="cadastro" enctype="multipart/form-data">
								
								<!--     NOME COMPLETO     -->
									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" name="USU_NOME" class="form-control" placeholder="Nome Completo*" required="required" maxlength="100" oninvalid="setCustomValidity('Por favor, digite o nome corretamente')" onchange="try{setCustomValidity('')}catch(e){}">
										</div>
									</div>

								<!--     DATA NASCIMENTO      -->
									<div class="col-sm-6">
										<div class="form-group">
											<input type="date" id="CON_DATA_NASCIMENTO" name="CON_DATA_NASCIMENTO" class="form-control" placeholder="Data de Nascimento*" required="required" maxlength="10" oninvalid="setCustomValidity('Por favor, digite a data de nascimento.')" onchange="try{setCustomValidity('')}catch(e){}">
										</div>
									</div>
								
								<!--     CPF     -->
									<div class="col-sm-4">
										<div class="form-group">
											<input type="text" name="CON_CPF" id="CON_CPF" class="form-control" placeholder="CPF*" onkeypress="formatar('###.###.###-##', this);" maxlength="14" required="required" minlength="14" oninvalid="setCustomValidity('Por favor, digite um CPF válido')" onchange="try{setCustomValidity('')}catch(e){}">
										</div>
									</div>
								
									<div class="col-sm-2" style="text-align:center;">
										<div class="form-group">
											<span class="help-block"  id="situacao_cpf"></span>
										</div>
									</div>
								
								
								<!--     TELEFONE      -->
									<div class="col-sm-3">
										<div class="form-group">
											<input type="text" name="USU_TELEFONE" id="USU_TELEFONE" class="form-control" maxlength="14" placeholder="Telefone: (DDD)0000-0000" >
										</div>
									</div>
								
								<!--     TELEFONE 2      -->
									<div class="col-sm-3">
										<div class="form-group">
											<input type="text" name="CON_TELEFONE2" id="CON_TELEFONE2" class="form-control" maxlength="15" placeholder="Celular: (DDD) 00000-0000*" required="required" oninvalid="setCustomValidity('Por favor, digite um telefone válido')" onchange="try{setCustomValidity('')}catch(e){}">
										</div>
									</div>								
								
								
								
								
								<!--     CEP      -->
									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" name="LOC_CEP" class="form-control" id="cep"; placeholder="CEP*" OnKeyPress="formatar('#####-###', this)" onblur="pesquisacep(this.value);" required="required" pattern=".{0}|.{9,9}" maxlength="9" oninvalid="setCustomValidity('Por favor, informe um CEP válido.')" onchange="try{setCustomValidity('')}catch(e){}">
										</div>
									</div>
								
								<!--     RUA      -->
									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" name="LOC_RUA" id="LOC_RUA" class="form-control" placeholder="Rua*" maxlength="100" required="required">
										</div>
									</div>
								
								<!--     BAIRRO      -->
									<div class="col-sm-4">
										<div class="form-group">
											<input type="text" name="LOC_BAIRRO" id="LOC_BAIRRO" class="form-control" placeholder="Bairro*" maxlength="100" required="required" >
										</div>
									</div>
								
								<!--     NÚMERO      -->
									<div class="col-sm-2">
										<div class="form-group">
											<input type="number" name="CON_NUMERO" class="form-control" placeholder="Número*" required="required" maxlength="10" oninvalid="setCustomValidity('Por favor, digite o numero do consumidor.')" onchange="try{setCustomValidity('')}catch(e){}">
										</div>
									</div>
								
								<!--     COMPLEMENTO - NÃO OBRIGATÓRIO     -->
									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" name="CON_COMPLEMENTO" class="form-control" placeholder="Complemento" maxlength="500">
										</div>
									</div>
								
								<!--     CIDADE      -->
									<div class="col-sm-4">
										<div class="form-group">
											<input type="text" name="LOC_CIDADE" id="LOC_CIDADE" class="form-control" required="required" placeholder="Cidade*" maxlength="100">
										</div>
									</div>
								
								<!--     ESTADO      -->
									<div class="col-sm-2">
										<div class="form-group">
											<input type="text" name="LOC_ESTADO" id="LOC_ESTADO" class="form-control" required="required" placeholder="Estado*" maxlength="2">
										</div>
									</div>
								
								<!--     EMAIL    -->
									<div class="col-sm-6">
										<div class="form-group" style="text-align:center;">
											<input type="email" name="USU_EMAIL" id="USU_EMAIL" class="form-control" placeholder="Email*" maxlength="100" required="required" pattern="[A-Za-z0-9._%+-]+@gmail.com" oninvalid="setCustomValidity('Por favor, digite um email valido (somente gmail)')" onchange="try{setCustomValidity('')}catch(e){}">
											<span class="help-block" id="situacao_email"></span>
											
										</div>
									</div>
								
								<!--     FOTO DE PERFIL      -->
									<div class="col-sm-6">
										<div class="form-group">
											<div class="input-group">
												<label class="input-group-btn">
													<span class="btn btn-default">
														Selecionar Foto de Perfil <input type="file" name="USU_FOTO_PERFIL" id="USU_FOTO_PERFIL" accept="image/*;capture=camera" style="display: none;" multiple>							
													</span>
												</label>
												<input type="text" class="form-control" readonly>
											</div>
										</div>
									</div>
				
								<!--     SENHA      -->
									<div class="col-sm-3">
										<div class="form-group">
											<input onkeyup="validaSenha();" type="password" name="USU_SENHA" id="USU_SENHA" class="form-control" placeholder="Senha*" maxlength="12" required="required">  
										</div>
									</div>
								
								<!--     CONFIRMAR SENHA      -->
									<div class="col-sm-3" style="text-align:center;">
										<div class="form-group">
											<input onkeyup="validaSenha();" type="password" name="USU_SENHA_CONFIRMAR" id="USU_SENHA_CONFIRMAR"  class="form-control" placeholder="Confirmar Senha*" maxlength="12" required="required">
											
											<span class="help-block"  id="resultado"></span>
										</div>
									</div>								
								<div class="panel-group">	
												
													<div class="panel-heading">
														<ul class="nav nav-tabs nav-justified">
															<li>
																<button type="submit" id="enviarcadastro" style="display:none;" data-validate="contact-form">Hidden Button</button>
																<a href="javascript:;" class="myClass" onclick="$('#enviarcadastro').click();" id="enviarcadastro" dtype="submit"><span class="fa fa-tachometer" aria-hidden="true"></span> Confirmar Cadastro</a>
																
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
		<div id="ALERTA_CPF" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title text-center">CPF em Uso</h4>
					</div>
					<form>
						<div class="modal-body">
							<p class="text-center">Este CPF está sendo usado por outro consumidor. Por favor, digite um CPF válido!</p>
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

		<!--script em geral-->
		<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/mod01/foto_perfil.js"></script>
<script type="text/javascript" src="js/mod01/verificarCEP.js"></script>
<script type="text/javascript" src="js/mod01/validarSenha.js"></script>
<script type="text/javascript" src="js/mod01/mascaraTelefone.js"></script>
<script type="text/javascript" src="js/mod01/verificarEmail.js"></script>
<script type="text/javascript" src="js/mod01/verificarCPF.js"></script>
<script type="text/javascript" src="js/jquery.mask.js"></script>
<script type="text/javascript" src="js/jquery.mask.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.inview.min.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/jquery.countTo.js"></script>
<script type="text/javascript" src="js/main.js"></script>



 


<!--<script type="text/javascript" src="js/mod01/verificarCPF.js"></script>-->
<link href="https://cdn.rawgit.com/xdan/datetimepicker/master/jquery.datetimepicker.css" rel="stylesheet"/>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<script src="https://cdn.rawgit.com/xdan/datetimepicker/master/build/jquery.datetimepicker.full.js"></script>
<script type="text/javascript" src="js/mod01/formatoDataNascimento.js"></script>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--FIM DO SCRIPT EM GERAL -->  

</body>
</html>