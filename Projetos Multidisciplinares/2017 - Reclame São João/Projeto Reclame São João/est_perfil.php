<!DOCTYPE html>
<?php
	session_start();
	include_once 'controle/Conexao.php';
	include_once 'controle/UsuarioDAO.php';

		$conn = new Conexao();
		$dao = new UsuarioDAO();

	if (isset($_SESSION['USU_EMAIL'])) 
	{
		$tipo = $dao->verificarUsuario($_SESSION['USU_EMAIL']);

		if ($tipo == 'est') 
		{
			// header('Location: est_boas-vindas.php');
		}
		if ($tipo == 'adm') 
		{
			header('Location: admin.php');
		}
		if ($tipo==="usr") 
		{
			header('Location: usu_paginaBoasVindasUsuario.php');
		}

	}
	else
	{
		header('Location: usu_loginUsuario.php');
	}

		
	//Se uma sessão aberta, este código pega o objeto usuário e seu ID
		if (isset($_SESSION['usr'])) 
		{
			$usr = $_SESSION['usr'];
			$id = $usr->getUSU_ID();
		}

	//Criar um novo Estabelecimento para pegar o EST_ID passando como parâmetro o USU_ID
		include 'controle/EstabelecimentosDAO.php';
		$EstabelecimentosDAO = new EstabelecimentosDAO();
		$registro_estabelecimento = $EstabelecimentosDAO->pesquisarPorIdUsr($id);
		$idEst = $EstabelecimentosDAO->idEst($id);


	//Criar a conexão com a tabela Usuários
			$USUARIOdao = new UsuarioDAO();
			$registro_usuario = $USUARIOdao->pesquisarPorId($id);

	//Criar a conexão com a tabela Localização
		include 'controle/LocalizacaoDAO.php';
			$LocalizacaoDAO = new LocalizacaoDAO();
			$registro_localizacao = $LocalizacaoDAO->pesquisarPorId($id);
			$selecionar_localizacao = $EstabelecimentosDAO->selecionar_localizacao($idEst);
			$idLoc = $LocalizacaoDAO->idLoc($selecionar_localizacao);

	//Criar a conexão com a tabela Produtos e Selecionar todos os dados da tabela Produtos referente ao Estabelecimento
		include 'controle/ProdutoDAO.php';
			$ProdutoDAO = new ProdutoDAO();
			$registro_produtos = $ProdutoDAO->pesquisarPorId($idEst);
			
			//Selecionando todos os dados da tabela Tipo de Produto de Selecionado pelo Estabelecimento
				//$registros_tipos_produtos_selecionado = $ProdutoDAO->listarTipoProdutoSelecionado($idEst, $idPdt);

	//Selecionando todos os dados da tabela Tipos Estabelecimentos
		include_once 'controle/TiposEstabelecimentosDAO.php';
			$conn = new Conexao();
			$TiposEstabelecimentosDAO = new TiposEstabelecimentosDAO();
			$registro_tipos_estabelecimentos = $TiposEstabelecimentosDAO->listarTodos();
			
			// Verificando o ID de qual tipo de estabelecimento foi selecionado pelo usuário
				$registro_tipos_estabelecimentos_selecionado = $TiposEstabelecimentosDAO->listarTipoEstSelecionado($id);

	//Selecionando todos os dados da tabela Tipos de Produtos
		include_once("controle/TiposProdutoseServicoDAO.php");
			$TiposProdutoseServicoDAO = new TiposProdutoseServicoDAO();
			$registros_tipos_produtos = $TiposProdutoseServicoDAO->listar();

	//Selecionando todos os dados da tabela Estabelecimentos
		include_once("controle/EstabelecimentosDAO.php");
			$EstabelecimentosDAO = new EstabelecimentosDAO();
			$resultado_estabelecimentos = $EstabelecimentosDAO->listarTodos();
			
		//$_SESSION['PRODUTOS'];
		
		function exibir_produto($tipo_produto)
			{
				session_start();
				//$_SESSION['PRODUTOS'] = $tipo_produto;
			}
		
?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<!-- INÍCIO DO META DO SLIDESHOW -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- FIM DO META DO SLIDESHOW -->

	<!-- TÍTULO DO SITE -->
	<title>Reclame São João</title>

	<!-- SIDEBAR -->
		<link href="css/sidebar.css" rel="stylesheet">

	<!-- OUTROS -->
	
		<!-- BOOTSTRAP -->
			<link href="css/animate.min.css" rel="stylesheet"> 
			<link href="css/font-awesome.min.css" rel="stylesheet">
			<link href="css/responsive.css" rel="stylesheet">
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
			
		<!-- BOTÃO ON / OFF - HABILITAR E DESABILITAR A EDIÇÃO DE INFORMAÇÕES -->
			<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
			<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
			
		<!-- VERIFICA SE O CAMPO ESTÁ VAZIO OU NÃO NO MODAL -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
		
		<!-- MENU DO SITE -->
			<link href="css/menu_do_site.css" rel="stylesheet">
			
		<!-- COR DOS INPUT / SELECT / TEXTAREA EM GERAL -->
			<link rel="stylesheet" href="css/estilo.css">
			
		<!-- RODAPÉ -->
			<link rel="stylesheet" href="css/rodape.css">
			
		<!-- ALERT -->
			<script src = "https://unpkg.com/sweetalert/dist/sweetalert.min.js"> </script>
		
		<!-- 
			<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
			<link rel="shortcut icon" href="images/favicon.ico">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		-->
	
</head>

<body>
	<!-- MENU DO SITE -->
		<div class="main-nav navbar-fixed-top">
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
						<?php foreach($registro_usuario as $linha_usuario) { ?>
																
							<li class="scroll"  ><div class="img"><img src="<?php echo $linha_usuario['USU_FOTO_PERFIL'];?>" border="0" /></div></li> 
							<?php } ?>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">
								<span></span> <?php echo $_SESSION['EST_NOME_FANTASIA']; ?>
							</a>
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
								<a href="index.php"><i class="fa fa-caret-down fa-lg"></i>Página Inicial<i class="fa fa-home fa-fw fa-lg btn pull-right"></i></a>
							</li>
							
							<li data-toggle="collapse" data-target="#service" class="collapsed">
								<a href="est_perfil.php"><i class="fa fa-caret-down fa-lg"></i>Visualizar e Editar Perfil<i class="glyphicon glyphicon-user fa-lg btn pull-right"></i></a>
							</li>
						
							<li data-toggle="collapse" data-target="#service2" class="collapsed">
								<a href="est_gerenciar-respostas_reclamacoes.php"><i class="fa fa-caret-down fa-lg"></i>Gerenciamento das Reclamações<i class="fa fa-file-text fa-lg btn pull-right"></i></a>
							</li>
						
							<li data-toggle="collapse" data-target="#new" class="collapsed">
								<a href="php/mod01/sair.php"><i class="fa fa-caret-down fa-lg"></i>Sair<i class="fa fa-sign-out fa-lg btn pull-right"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</aside>
	<!-- FIM DA NAV SIDEBAR -->
	
	<!-- INÍCIO - CORPO DA PÁGINA -->
	<br/><br/><br/><br/><br/><br/><br/><br/>
	<div class="container">				
		<!-- INÍCIO -  GERENCIMENTO DO PERFIL DO ESTABELECIMENTO -->
			<div class="row">
				<div class="col-sm-12">

					<div class="col-sm-12" id="selecionar-todas-reclamacoes">
						<div class="panel panel-default" style="border-left: thick double  #64594f; border-right: thick double  #64594f;">
							<div class="panel-body">
								<div style="text-align:center;"><h4><span class="fa fa-address-card" aria-hidden="true"></span> Gerencimento do Perfil do Estabelecimento</h4></div>
								<div class="pull-right"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- FIM - GERENCIMENTO DO PERFIL DO ESTABELECIMENTO -->
			<!-- INICIO - FOTO -->	
			<div class="row" id="todas-reclamacoes">
							<div class="col-sm-12">
								<div class="panel panel-default">
									<div class="panel-heading"><span class="fa fa-user" aria-hidden="true"></span> Foto de Perfil <span class="pull-right" onclick='foto_perfil()' id="habilitar_foto_perfil">Habilitar Edição <input type="checkbox" data-toggle="toggle" data-onstyle="primary" data-size="mini"></span></div>
									<div class="panel-body">
									<form method="POST" id="form_foto_perfil" action="php/mod03/editarFotoPerfil.php" enctype="multipart/form-data">
										<div class="col-sm-12">
											<br/>
											<br/>
											<div class="panel panel-default" style="border-left: thick double #64594f; border-right: thick double  #64594f;">
												<div class="panel-body">
													<div class="row">
														<div class=" col-md-12 col-lg-12 ">   
															<table class="table table-user-information">
																<input name="EST_ID" type="hidden" id="EST_ID" value="<?php echo $idEst ?>">
																<input name="USU_ID" type="hidden" id="USU_ID" value="<?php echo $id    ?>">
																
																
																<?php foreach($registro_usuario as $linha_usuario) { ?>
																<div class="col-sm-12 col-md-2 col-md-offset-5">
																	<img src="<?php echo $linha_usuario['USU_FOTO_PERFIL'];?>" alt="" class="img-circle img-responsive" />
																</div>
																<?php } ?>
																																				
															
															</table>
															</div>
									<div class="col-sm-6 col-sm-offset-3">
										<div class="form-group"  style="text-align:center;">
											<div class="input-group">
												<label class="input-group-btn">
													<span class="btn btn-default">
														<i class="fa fa-pencil" aria-hidden="true"></i> Selecionar Foto de Perfil <input type="file" name="USU_FOTO_PERFIL" id="USU_FOTO_PERFIL" accept="image/*;capture=camera" style="display: none;" multiple required>							
													</span>
												</label>												
											
										</div>
									</div>
																	<!-- INÍCIO - COLLAPSE RESPONDER RECLAMAÇÃO -->
																		
																		<!-- FIM - COLLAPSE RESPONDER RECLAMAÇÃO -->
														</div>
													</div>
												</div>
											</div>
										</div>

											
										<div class="panel-group">	
												<div class="panel panel-default">
													<div class="panel-heading">
														<ul class="nav nav-tabs nav-justified">
															<li>
																<a href="javascript:{}" onclick="document.getElementById('form_foto_perfil').submit();" id="enviarperfil" style="display:none"><span class="fa fa-tachometer" aria-hidden="true"></span> Editar Foto de Perfil</a>
																
															</li>
														</ul>	
													</div>
												</div>
										</div>
									</form>
									</div>
								</div>
							</div>
			</div>	
		<!-- FIM - INFORMAÇÕES PESSOAIS -->
			
		<!-- INICIO - INFORMAÇÕES PESSOAIS -->	
			<div class="row" id="todas-reclamacoes">
				<div class="col-sm-12">
					<div class="panel panel-default">
						<div class="panel-heading"><span class="fa fa-id-card-o" aria-hidden="true"></span> Informações Pessoais <span class="pull-right" onclick='informacoes_pessoais()' id="habilitar_informacoes_pessoais">Habilitar Edição <input type="checkbox" data-toggle="toggle" data-onstyle="primary" data-size="mini"></span></div>
							<div class="panel-body">
								<form method="POST" id="form_informacoes_pessoais" action="php/mod03/editarInformacoesPessoais.php" enctype="multipart/form-data">
									<div class="col-sm-12"><br/><br/>
										<div class="panel panel-default" style="border-left: thick double #64594f; border-right: thick double  #64594f;">
											<div class="panel-body">
												<div class="row">
													<div class=" col-md-12 col-lg-12 ">   
														<table class="table table-user-information">
															<input name="EST_ID" type="hidden" id="EST_ID" value="<?php echo $idEst ?>">
															<input name="USU_ID" type="hidden" id="USU_ID" value="<?php echo $id    ?>">
															
															<!--
															<-?php foreach($registro_usuario as $linha_usuario) { ?>
															<div class="col-sm-12 col-md-2 col-md-offset-5">
																<img src="<-?php echo $linha_usuario['USU_FOTO_PERFIL'];?>" alt="" class="img-circle img-responsive" />
															</div>
															<-?php } ?>
															-->
															
															<tbody>
																<?php foreach($registro_usuario as $linha_usuario) { ?>
																	<td>
																		<div class="form-group">
																			<label>Nome da Empresa</label>
																			<input type="text" name="USU_NOME" id="USU_NOME" class="form-control" disabled value="<?php echo $linha_usuario['USU_NOME'];?>" maxlength="50" required oninvalid="setCustomValidity('Por favor, digite o nome da empresa corretamente.')" onchange="try{setCustomValidity('')}catch(e){}">			  
																		</div>
																	</td>
																<?php } ?>

																<?php foreach($registro_estabelecimento as $linha_estabelecimento) { ?>
																	<td>	
																		<div class="form-group">
																			<label>Nome Fantasia</label>
																			<input type="text" name="EST_NOME_FANTASIA" id="EST_NOME_FANTASIA" class="form-control" disabled value="<?php echo $linha_estabelecimento['EST_NOME_FANTASIA'];?>" maxlength="100" required oninvalid="setCustomValidity('Por favor, digite o nome fantasia da empresa corretamente.')" onchange="try{setCustomValidity('')}catch(e){}">			  
																		</div>
																	</td>
															</tbody>

															<tbody>
																	<td>
																		<div class="form-group">
																			<label>Responsável</label>
																			<input type="text" name="EST_NOME_RESPONSAVEL" id="EST_NOME_RESPONSAVEL" class="form-control" disabled value="<?php echo $linha_estabelecimento['EST_NOME_RESPONSAVEL'];?>" maxlength="100" required oninvalid="setCustomValidity('Por favor, digite o nome do responsável corretamente.')" onchange="try{setCustomValidity('')}catch(e){}">			  
																		</div>
																	</td>

																<?php } ?>

																<?php foreach($registro_estabelecimento as $linha_estabelecimento) { ?>
																	<td>
																		<div class="form-group">
																			<label>CNPJ</label>
																			<input type="text" name="EST_CNPJ" id="EST_CNPJ" class="form-control" OnKeyPress="formatar('##.###.###/####-##', this)" disabled value="<?php echo $linha_estabelecimento['EST_CNPJ'];?>" maxlength="18" required oninvalid="setCustomValidity('Por favor, digite o CNPJ corretamente.')" onchange="try{setCustomValidity('')}catch(e){}">			  
																		</div>
																	</td>
															</tbody>
																<?php } ?>
																
															<tbody>
																<?php foreach($registro_usuario as $linha_usuario) { ?>
																	<td>
																		<div class="form-group">
																			<label>Telefone</label>
																			<input type="text" name="USU_TELEFONE" id="USU_TELEFONE" class="form-control" disabled value="<?php echo $linha_usuario['USU_TELEFONE'];?>" maxlength="14" required oninvalid="setCustomValidity('Por favor, digite o telefone corretamente.')" onchange="try{setCustomValidity('')}catch(e){}">			  
																		</div>
																	</td>
																<?php } ?>

																<?php foreach($registro_estabelecimento as $linha_estabelecimento) { ?>
																	<td>
																		<div class="form-group">
																			<label>Facebook</label>
																			<input type="text" name="EST_FACEBOOK_EMPRESA" id="EST_FACEBOOK_EMPRESA" class="form-control"  disabled value="<?php echo $linha_estabelecimento['EST_FACEBOOK_EMPRESA'];?>" maxlength="100" required oninvalid="setCustomValidity('Por favor, digite o facebook da empresa corretamente.')" onchange="try{setCustomValidity('')}catch(e){}">			  
																		</div>
																	</td>
															</tbody>

															<tbody>
																	<td>
																		<div class="form-group">
																			<label>Site da Empresa</label>
																			<input type="url" name="EST_SITE_EMPRESA" id="EST_SITE_EMPRESA" class="form-control" disabled value="<?php echo $linha_estabelecimento['EST_SITE_EMPRESA'];?>" maxlength="200" required oninvalid="setCustomValidity('Por favor, digite o site da empresa corretamente.')" onchange="try{setCustomValidity('')}catch(e){}">			  
																		</div>
																	</td>
																<?php } ?>

																<?php foreach($registro_usuario as $linha_usuario) { ?>
																	<td>
																		<div class="form-group">
																			<label>Email</label>
																			<input type="email" name="USU_EMAIL" id="USU_EMAIL" class="form-control" disabled value="<?php echo $linha_usuario['USU_EMAIL'];?>" maxlength="100" required pattern="[A-Za-z0-9._%+-]+@gmail.com" oninvalid="setCustomValidity('Por favor, digite um email válido (somente gmail)')" onchange="try{setCustomValidity('')}catch(e){}">			  
																		</div>
																	</td>
																<?php } ?>								
															</tbody>

																<tr></tr>

															<tbody>
																<?php foreach($registro_tipos_estabelecimentos_selecionado as $linha_tipos_estabelecimentos) { ?>
																	<td>
																		<div class="form-group">
																			<label>Tipo de Estabelecimento</label>
																			<select class="form-control" name="TES_ID" id="TES_ID" disabled>
																				<?php foreach($registro_tipos_estabelecimentos as $linha_tipos_estabelecimentos_selecionado)
																					{ 	
																						$selecionado =  $linha_tipos_estabelecimentos_selecionado['TES_ID'];
																						foreach ($registro_estabelecimento as $linha_estabelecimento) 
																						{
																							$selected = ($selecionado == $linha_estabelecimento['TES_ID'] ? 'selected' : null);
																							print "<option class='form-control' value='{$linha_tipos_estabelecimentos_selecionado['TES_ID']}' {$selected}>{$linha_tipos_estabelecimentos_selecionado['TES_CATEGORIA']}</option>";
																						}

																					}
																				?>
																			</select>			  
																		</div>
																	</td>
																	
																	<td>
																		<div class="form-group">
																			<label>Senha</label>
																			<input type="button" class="btn btn-default btn-block" id="atualizar_senha" value="Atualizar Senha" data-toggle="collapse" data-parent="#accordion" href="#ALTERAR_SENHA">			  
																		</div>
																	</td>
															</tbody>	
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
	
									<div class="panel-group">	
										<div class="panel panel-default">
											<div class="panel-heading">
												<ul class="nav nav-tabs nav-justified">
													<li>
														<button type="submit" id="submitBtn3" style="display:none;" data-validate="contact-form">Hidden Button</button>
														<a href="javascript:{}"  class="myClass" onclick="$('#submitBtn3').click();" style="display:none" id="botao_atualizar_informacoes_pessoais"><span class="fa fa-tachometer" aria-hidden="true"></span> Editar Informações Pessoais da Empresa</a>
													</li>
												</ul>	
											</div>
										</div>
									</div>
								</form>
									
								<!-- INÍCIO - COLLAPSE ALTERAR SENHA -->
									<div id="ALTERAR_SENHA" class="panel-collapse collapse">
										<form method="POST" id="form-senha" action="php/mod03/editarSenha.php" enctype="multipart/form-data">
											<div class="panel panel-default">
												<div class="panel-heading"><span class="fa fa-key" aria-hidden="true"></span> Atualizar Senha</div>				
												<div class="panel-body">
													<div class="form-group">
														<div class="col-md-12">
															<input  type="hidden" id="USU_ID" name="USU_ID" class="form-control" value="<?php echo $id    ?>">

															<?php foreach($registro_usuario as $linha_usuario) { ?>
																<div class="col-md-12 form-group"><br/>
																	<label for="senha_antiga" class="control-label">Senha Antiga:</label>
																	<input name="senha_antiga" id="senha_antiga"  type="password" value="<?php echo $linha_usuario['USU_SENHA'];?>" disabled class="form-control">
																</div>
															<?php } ?>

																<div class="col-md-12 form-group">
																	<label for="senha_antiga_confirmar" class="control-label">Confirmar Senha Antiga:</label>
																		<input onkeyup="validaSenha();" name="senha_antiga_confirmar" id="senha_antiga_confirmar"  type="password" class="form-control" required required oninvalid="setCustomValidity('Por favor, confirme sua senha.')" onchange="try{setCustomValidity('')}catch(e){}">
																</div>

																<div class="col-md-12 form-group">
																	<div id="resultado_confirmar_senha"></div>
																</div>

																<div class="col-md-12 form-group">
																	<label for="senha_nova" class="control-label">Nova Senha:</label>
																	<input onkeyup="validaSenha();" name="senha_nova" id="senha_nova"  type="password" class="form-control" required required oninvalid="setCustomValidity('Por favor, digite sua senha nova.')" onchange="try{setCustomValidity('')}catch(e){}">
																</div>

																<div class="col-md-12 form-group">
																	<label for="senha_confirmar" class="control-label">Confirmar Senha:</label>
																	<input onkeyup="validaSenha();" name="senha_confirmar" id="senha_confirmar"  type="password" class="form-control" required required oninvalid="setCustomValidity('Por favor, confirme sua senha nova.')" onchange="try{setCustomValidity('')}catch(e){}">
																</div>

																<div class="col-md-12 form-group">
																	<div id="resultado"></div>
																</div>
														</div>
																								
														<!-- REDIRECIONAR PARA A PÁGINA: CADASTRAR RESPOSTA -->
														<div class="col-md-12">
															<button type="submit" class="btn btn-primary btn-block" id="enviarsenha" disabled style="background-color: #64594f;">Atualizar Senha</button>	
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
								<!-- FIM - COLLAPSE ALTERAR SENHA -->
							</div>
						</div>
					</div>
				<?php } ?>
			</div>	
		<!-- FIM - INFORMAÇÕES PESSOAIS -->
		
		<!-- INICIO - ENDEREÇO -->	
			<div class="row" id="todas-reclamacoes">
				<div class="col-sm-12">
					<div class="panel panel-default">
						<div class="panel-heading"><span class="fa fa-map-marker" aria-hidden="true"></span> Endereço <span class="pull-right" onclick='endereco()' id="endereco">Habilitar Edição <input type="checkbox" data-toggle="toggle" data-onstyle="primary" data-size="mini"></span></div>
						<div class="panel-body">
							<form method="POST" id="form_endereco" action="php/mod03/editarEnderecoEstabelecimentos.php" enctype="multipart/form-data">
								<div class="col-sm-12"><br/><br/>
									<div class="panel panel-default" style="border-left: thick double #64594f; border-right: thick double  #64594f;">
										<div class="panel-body">
											<div class="row">
												<div class=" col-md-12 col-lg-12 "> 
													<table class="table table-user-information">
														<tbody>
															<?php foreach($registro_localizacao as $linha_localizacao) { ?>
																<td>
																	<div class="form-group">
																			<label>CEP</label>
																			<input type="text" name="LOC_CEP" id="LOC_CEP"; class="form-control" OnKeyPress="formatar('#####-###', this)" onblur="pesquisacep(this.value);" required="required" pattern=".{0}|.{9,9}" maxlength="9" value="<?php echo $linha_localizacao['LOC_CEP'];?>" required disabled oninvalid="setCustomValidity('Por favor, digite o CEP corretamente.')" onchange="try{setCustomValidity('')}catch(e){}">			  
																	</div>
																</td>
																	
																<td>	
																	<div class="form-group">
																		<div class="col-sm-6">
																			<label>Rua</label>
																			<input type="text" name="LOC_RUA" id="LOC_RUA" class="form-control" value="<?php echo $linha_localizacao['LOC_RUA'];?>" maxlength="100" required disabled oninvalid="setCustomValidity('Por favor, digite a rua corretamente.')" onchange="try{setCustomValidity('')}catch(e){}">			  
																		</div>
																		
																		<div class="col-sm-6">
																			<label>Bairro</label>
																			<input type="text" name="LOC_BAIRRO" id="LOC_BAIRRO" class="form-control" value="<?php echo $linha_localizacao['LOC_BAIRRO'];?>" maxlength="100" required disabled oninvalid="setCustomValidity('Por favor, digite o bairro corretamente.')" onchange="try{setCustomValidity('')}catch(e){}">			  
																		</div>
																	</div>
																</td>
														</tbody>

														<tbody>
															<td>	
																<div class="form-group">
																	<label>Cidade</label>
																	<input type="text" name="LOC_CIDADE" id="LOC_CIDADE" class="form-control" value="<?php echo $linha_localizacao['LOC_CIDADE'];?>" maxlength="100" required disabled oninvalid="setCustomValidity('Por favor, digite a cidade corretamente.')" onchange="try{setCustomValidity('')}catch(e){}">			  
																</div>
															</td>
																
															<td>	
																<div class="form-group">
																	<div class="col-sm-6">
																		<label>Estado</label>
																		<input type="text" name="LOC_ESTADO" id="LOC_ESTADO" class="form-control" value="<?php echo $linha_localizacao['LOC_ESTADO'];?>" maxlength="100" required disabled oninvalid="setCustomValidity('Por favor, digite o estado corretamente.')" onchange="try{setCustomValidity('')}catch(e){}">			  
																	</div>
																			
																	<?php foreach($registro_estabelecimento as $linha_est_localizacao) { ?>	
																		<div class="col-sm-6">
																			<div class="col-sm-6">
																				<label>Número</label>
																				<input type="text" name="EST_NUMERO_ENDERECO" id="EST_NUMERO_ENDERECO" class="form-control" value="<?php echo $linha_est_localizacao['EST_NUMERO_ENDERECO'];?>" maxlength="10" required disabled oninvalid="setCustomValidity('Por favor, digite o número corretamente.')" onchange="try{setCustomValidity('')}catch(e){}">			  
																			</div>
																				
																			<div class="col-sm-6">	
																				<label>Complemento</label>
																				<input type="text" name="EST_COMPLEMENTO" id="EST_COMPLEMENTO" class="form-control" value="<?php echo $linha_est_localizacao['EST_COMPLEMENTO'];?>" maxlength="500" required disabled oninvalid="setCustomValidity('Por favor, digite o complemento corretamente.')" onchange="try{setCustomValidity('')}catch(e){}">			  
																			</div>
																		</div>
																	<?php } ?>	
																</div>
															</td>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>

								<input name="EST_ID" type="hidden" id="EST_ID" value="<?php echo $idEst ?>">
								<input name="LOC_ID" type="hidden" id="LOC_ID" value="<?php foreach( $registro_localizacao as $linha_est_localizacao) { echo $linha_est_localizacao['LOC_ID'];  }?>">
										
								<div class="panel-group" id="accordion">	
									<div class="panel panel-default">
										<div class="panel-heading">
											<ul class="nav nav-tabs nav-justified">
												<li>
													<button type="submit" id="submitBtn" style="display:none;" data-validate="contact-form">Hidden Button</button>
													<a href="javascript:{}"  class="myClass" onclick="$('#submitBtn').click();" style="display:none" id="botao_atualizar_endereco"><span class="fa fa-tachometer" aria-hidden="true"></span> Editar Endereço</a>
												</li>
											</ul>	
										</div>
									</div>
								</div>
							</form>										
						</div>
					</div>
				</div>
				<?php } ?>
			</div>	
		<!-- FIM - ENDEREÇO -->
		
		<!-- INICIO - PÚBLICO ALVO -->	
			<div class="row" id="todas-reclamacoes">
				<?php foreach($registro_estabelecimento as $linha_estabelecimento) { ?>
						<div class="col-sm-12">
							<div class="panel panel-default">
								<div class="panel-heading"><span class="fa fa-id-card-o" aria-hidden="true"></span> Público Alvo <span class="pull-right" onclick='publico_alvo()' id="habilitar_publico_alvo">Habilitar Edição <input type="checkbox" data-toggle="toggle" data-onstyle="primary" data-size="mini"></span></div>
								<div class="panel-body">
									<form method="POST" id="form_publico_alvo" action="php/mod03/editarPublicoAlvo.php" enctype="multipart/form-data">
										<div class="col-sm-12"><br/><br/>
											<div class="panel panel-default" style="border-left: thick double #64594f; border-right: thick double  #64594f;">
												<div class="panel-body">
													<div class="row">
														<div class=" col-md-12 col-lg-12 "> 
															<table class="table table-user-information">
																<tbody>
																	<td>	
																		<div class="form-group">	
																			<textarea class="form-control col-md-8" disabled style="margin-left: 0px;width: 100%;" name="EST_PUBLICO_ALVO" id="EST_PUBLICO_ALVO" rows="6" maxlength="500" oninvalid="setCustomValidity('Por favor, digite o público alvo corretamente.')" onchange="try{setCustomValidity('')}catch(e){}" required="required"> <?php echo $linha_estabelecimento['EST_PUBLICO_ALVO'];?></textarea>
																		</div>
																	</td>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div>

										<input name="EST_ID" type="hidden" id="EST_ID" value="<?php echo $idEst ?>">
										
										<div class="panel-group" id="accordion">	
											<div class="panel panel-default">
												<div class="panel-heading">
													<ul class="nav nav-tabs nav-justified">
														<li>
															<button type="submit" id="submitBtn2" style="display:none;" data-validate="contact-form">Hidden Button</button>
															<a href="javascript:{}"  class="myClass" onclick="$('#submitBtn2').click();" style="display:none" id="botao_atualizar_publico_alvo"><span class="fa fa-tachometer" aria-hidden="true"></span> Editar Público Alvo</a>
														</li>
													</ul>	
												</div>
											</div>
										</div>
									</form>										
								</div>
							</div>
						</div>
				<?php } ?>
			</div>	
		<!-- FIM - PÚBLICO ALVO -->
		
		<!-- INICIO - PRINCIPAIS PRODUTOS E SERVIÇOS OFERECIDOS -->	
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default">
						<div class="panel-heading"><span class="fa fa-id-card-o" aria-hidden="true"></span> Principais Produtos e Serviços Oferecidos </div>
							<div class="panel-body">
								<div class="col-sm-12"><br/><br/>
									<div class="panel panel-default" style="border-left: thick double #64594f; border-right: thick double  #64594f;">
										<div class="panel-body">
											<div class="row">
												<div class=" col-md-12 col-lg-12 "> 
													<div class="table-responsive">
														<table class="table">
															<thead class="thead-inverse">
																<tr>
																	<th>Numeração</th>
																	<th>Nome do Produto</th>
																	<th>Procedimentos</th>
																	<th><button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#CADASTRAR_PRODUTO">Adicionar</button></th>
																</tr>
															</thead>
															<tbody>
																<?php foreach($registro_produtos as $linha_produtos) { ?>
																	<tr>
																		<td><?php echo $linha_produtos['PDT_ID']; ?></td>
																		<td><?php echo $linha_produtos['PDT_NOME']; ?></td>
																		<td>
																			<button type="button" <?php $produto = $linha_produtos['TPR_ID']; ?> class="btn btn-xs btn-primary" data-toggle="modal" data-target="#VISUALIZAR_PRODUTO" data-whatever="<?php echo $linha_produtos['PDT_ID']; ?>" data-whatevervisualizarproduto="<?php echo $linha_produtos['PDT_NOME']; ?>" data-whatevervisualizardescricao="<?php echo $linha_produtos['PDT_DESCRICAO_PRODUTO']; ?>" data-whatevervisualizartipo="<?php echo $linha_produtos['TPR_ID']; ?>">Visualizar</button>

																			<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#ALTERAR_PRODUTO" data-whatever="<?php echo $linha_produtos['PDT_ID']; ?>" data-whatevernome="<?php echo $linha_produtos['PDT_NOME']; ?>"  data-whateverdetalhes="<?php echo $linha_produtos['PDT_DESCRICAO_PRODUTO']; ?>" data-whatevertipo="<?php echo $linha_produtos['TPR_ID']; ?>">Editar</button>

																			<button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#EXCLUIR_PRODUTO" data-whatever="<?php echo $linha_produtos['PDT_ID']; ?>" data-whatevervisualizarproduto="<?php echo $linha_produtos['PDT_NOME']; ?>"  data-whateverdetalhes="<?php echo $linha_produtos['PDT_DESCRICAO_PRODUTO']; ?>" data-whatevertipo="<?php echo $linha_produtos['TPR_ID']; ?>">Apagar</button>
																		</td>
																	</tr>
																<?php } ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>	
							</div>
					</div>
				</div>
			</div>	
		<!-- FIM - PRINCIPAIS PRODUTOS E SERVIÇOS OFERECIDOS -->
	</div>
	<!-- FIM - CORPO DA PÁGINA -->
	

	<!-- INÍCIO MODAL CADASTRAR PRODUTO -->
		<div id="CADASTRAR_PRODUTO" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Cadastrar Produto</h4>
					</div>
					<div class="modal-body">
						<form action="php/mod03/cadastrarProduto.php" method="post" data-toggle="validator" role="form">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="nome"><strong>Nome do Produto:</strong></label>
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-shopping-cart"></span></span>
											<input type="text" class="form-control" name="PDT_NOME" required maxlength="100">
										</div>
											<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="email"><strong>Descrição:</strong></label>
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-envelope"></span></span>
										<textarea name="PDT_DESCRICAO_PRODUTO" class="form-control" required maxlength="500"></textarea>
										</div>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								
								<div class="col-md-12">
									<div class="form-group">
										<label for="email"><strong>Tipo de Produto / Serviço:</strong></label>
											<div class="input-group">
												<span class="input-group-addon"><span class="fa fa-check"></span></span>
												<select class="form-control" name="TPR_ID" id="TPR_ID">
													<?php foreach ($registros_tipos_produtos as $linha_tipos_produtos) 
														{
															{ 	
																print "<option class='form-control' value='{$linha_tipos_produtos['TPR_ID']}'>{$linha_tipos_produtos['TPR_DESCRICAO']}</option>";
															}
														}
													?>
												</select>
											</div>		
									</div>
								</div>							  
							</div>										
					
						<input name="EST_ID" type="hidden" id="EST_ID" value="<?php echo $idEst ?>">
						
						<div class="modal-footer">
							<button type="submit" class="btn btn-success" >Salvar</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
						</div>
					</form>
					</div>	
				</div>
			</div>
		</div>
	<!-- FIM MODAL CADASTRAR PRODUTO -->
	
	<!-- INÍCIO MODAL ALTERAR PRODUTO -->
		<div id="ALTERAR_PRODUTO" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Alterar Produto</h4>
					</div>
					<div class="modal-body">
						<form action="php/mod03/editarProduto.php" method="post" data-toggle="validator" role="form">
							<input type="hidden" name="teste" id="teste">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="nome"><strong>Nome do Produto:</strong></label>
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-shopping-cart"></span></span>
											<input type="text" class="form-control" name="PDT_NOME" id="recipient-name" maxlength="100" required>
										</div>
											<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
									
										<label for="email"><strong>Descrição:</strong></label>
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-envelope"></span></span>
										<textarea name="PDT_DESCRICAO_PRODUTO" class="form-control"  id="detalhes-text" maxlength="500" required></textarea>	
										</div>
											<div class="help-block with-errors"></div>
									</div>
								</div>

				
									<?php function escrevaCadastro()
										 {
												echo "<script>teste();</script>"; 
										 }							
									?>
								<div class="col-md-12">
									<div class="form-group">
										<label for="email"><strong>Tipo de Produto / Serviço:</strong></label>
											<div class="input-group">
												<span class="input-group-addon"><span class="fa fa-check"></span></span>
												<select class="form-control" name="TPR_ID" id="TPR_ID">
													<?php 
														
															$selecionado = escrevaCadastro();
															
															foreach ($registros_tipos_produtos as $linha_tipos_produtos) 
																{
																	$selected = ($selecionado == $linha_tipos_produtos['TPR_ID'] ? 'selected' : null);
																	print "<option class='form-control' value='{$linha_tipos_produtos['TPR_ID']}' {$selected}>{$linha_tipos_produtos['TPR_DESCRICAO']}</option>";
																}	
													?>
													
												</select>
											</div>		
									</div>
								</div>							  
							</div>										
					
						<input name="PDT_ID" type="hidden" id="recipient-numero-produto">
						<input name="EST_ID" type="hidden" id="EST_ID" value="<?php echo $idEst ?>">
						
						<div class="modal-footer">
							<button type="submit" class="btn btn-success" >Salvar</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
						</div>
					</form>
					</div>	
				</div>
			</div>
		</div>
	<!-- FIM MODAL ALTERAR PRODUTO -->
	
	<!-- INÍCIO MODAL VISUALIZAR PRODUTO -->
		<div id="VISUALIZAR_PRODUTO" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Alterar Produto</h4>
					</div>
					<div class="modal-body">
							<input type="hidden" name="teste" id="teste">
							<div class="row">
								
								<div class="col-md-12">
									<div class="form-group">
										<label for="nome"><strong>Número do Produto:</strong></label>
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-list-ol"></span></span>
											<input type="text" class="form-control" name="PDT_NOME" id="recipient-numero-produto" disabled>
										</div>
											<div class="help-block with-errors"></div>
									</div>
								</div>
								
								<div class="col-md-12">
									<div class="form-group">
										<label for="nome"><strong>Nome do Produto:</strong></label>
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-shopping-cart"></span></span>
											<input type="text" class="form-control" name="PDT_NOME" id="recipient-nome-produto" disabled>
										</div>
											<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="email"><strong>Descrição:</strong></label>
										<div class="input-group">
											<span class="input-group-addon"><span class="fa fa-envelope"></span></span>
										<textarea name="PDT_DESCRICAO_PRODUTO" class="form-control"  id="recipient-descricao-produto" disabled></textarea>			
										</div>
											<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="email"><strong>Tipo de Produto / Serviço:</strong></label>
											<div class="input-group">
												<span class="input-group-addon"><span class="fa fa-check"></span></span>
												
							
							<input name="TIPO_PRODUTO" type="text" class="form-control" id="recipient-tipo-produto" disabled>
						
											</div>		
									</div>
								</div>							  
							</div>										
					
						<input name="PDT_ID" type="hidden" id="recipient-numero-produto">
						<input name="EST_ID" type="hidden" id="EST_ID" value="<?php echo $idEst ?>">
						
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
						</div>
					</div>	
				</div>
			</div>
		</div>
	<!-- FIM MODAL VISUALIZAR PRODUTO -->


	<!-- INÍCIO MODAL - EXCLUIR PRODUTO -->
		<div id="EXCLUIR_PRODUTO" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Remover Produto (<span id="id-numero-produto"> </span>)</h4>
					</div>
					<form method="POST" action="php/mod03/excluirProduto.php" enctype="multipart/form-data">
						<div class="modal-body">
							<p>Você tem certeza que deseja excluir o produto: <span id="recipient-nome-produto-exclusao"></span> ?</p>
						</div>
						<div class="modal-footer">
							<input  type="hidden" name="PDT_ID" class="form-control" id="recipient-numero-produto">
							<button type="submit" class="btn btn-danger">Confirmar</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	<!-- FIM MODAL - EXCLUIR PRODUTO -->

	<!--RODAPÉ-->
		<br/><br/><br/>
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
		<script type="text/javascript" src="js/jquery.inview.min.js"></script>
		<script type="text/javascript" src="js/jquery.countTo.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>

		<script type="text/javascript" src="js/mod03/informacoesEmpresa.js"></script>
		<script type="text/javascript" src="js/mod03/verificarCEP.js"></script>
		<script type="text/javascript" src="js/mod03/formatarCNPJ.js"></script>
		<script type="text/javascript" src="js/mod03/validarSenha.js"></script>
		<script type="text/javascript" src="js/mod03/mascaraTelefone.js"></script>
		<script type="text/javascript" src="js/mod03/verificarCNPJ.js"></script>
		<script type="text/javascript" src="js/mod03/gerenciar-perfil.js"></script>
		<script type="text/javascript" src="js/mod03/gerenciar-foto.js"></script>
		<script type="text/javascript" src="js/mod03/alterarSenha.js"></script>
		
		
		
		
	
		<script type="text/javascript" src="js/mod03/produto.js"></script>
		
		<!--FIM DO SCRIPT EM GERAL -->
		
			<!--
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
				<script type="text/javascript" src="js/mousescroll.js"></script>
				<script type="text/javascript" src="js/smoothscroll.js"></script>
				<script type="text/javascript" src="js/wow.min.js"></script>
				<script type="text/javascript" src="js/bootstrap.min.js"></script>
			-->

		<!-- FIM DO SCRIPT EM GERAL -->
	</body>
	</html>