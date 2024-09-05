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
	
			//Selecionando todos os dados da tabela Tipo de Produto de Selecionado pelo Estabelecimento
				$registros_tipos_produtos_selecionado = $ProdutoDAO->listarTipoProdutoSelecionado($idEst, 1);


	//Selecionando todos os dados da tabela Estabelecimentos
		include_once("controle/EstabelecimentosDAO.php");
			$EstabelecimentosDAO = new EstabelecimentosDAO();
			$resultado_estabelecimentos = $EstabelecimentosDAO->listarTodos();
?>

<html>
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
	<link href="css/sidebar.css" rel="stylesheet">

	<!-- OUTROS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet"> 
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<link href="css/main.css" rel="stylesheet">
	<link href="css/testes.css" rel="stylesheet">
	<!--<link href="../../css/login.css" rel="stylesheet">-->
	<link href="css/estabelecimento.css" rel="stylesheet">
	<link href="css/mod03/perfil_responsivo.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">

	<link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="images/favicon.ico">

	<title>Modal</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<!-- MENU DO SITE -->

	<div class="main-nav">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="est_boas-vindas.php">
					<h1><img class="img-responsive" src="images/logo.png" alt="logo"></h1>
				</a>                    
			</div>

			
			<!-- MENU DO SITE - OPÇÕES-->
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right" >   
					<li class="scroll active"><a href="#contact">Perfil</a></li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<span class="glyphicon glyphicon-user"></span> Subway
						</a>
					</li>
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
							<a href="#"><i class="fa fa-caret-down fa-lg"></i> Meu Perfil <i class="glyphicon glyphicon-user"></i></a>
						</li>
						<ul class="sub-menu collapse" id="service">
							<li><a href="est_perfil.php">Visualizar e Editar Perfil</a></li>
						</ul>


						<li data-toggle="collapse" data-target="#service2" class="collapsed">
							<a href="#"><i class="fa fa-caret-down fa-lg"></i> Reclamações <i class="fa fa-file-text fa-lg btn pull-right"></i></a>
						</li>
						<ul class="sub-menu collapse" id="service2">
							<li><a href="est_gerenciar-reclamacao-atendida.php">Reclamações Atendidas</a></li>
							<li><a href="est_gerenciar-reclamacao-nao-atendida.php">Reclamações Não Atendidas</a></li>
						</ul>

						<li data-toggle="collapse" data-target="#new" class="collapsed">
							<a href="php/mod01/sair.php"><i class="fa fa-caret-down fa-lg"></i> Sair <i class="fa fa-file-text fa-lg btn pull-right"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</aside>
	<!-- FIM DA NAV SIDEBAR -->

	<!-- CORPO DA PAGINA DE PERFIL -->
	<section id="contact">
		<div id="contact-us" class="parallax">
			<div class="container">
				<div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
					<div class="container">
						<div class="row">
							<div class="panel panel-info">

								<!-- INFORMAÇÕES PESSOAS DA EMPRESA -->
								<div class="panel-heading">
									<h3 class="panel-title">Informações Pessoais da Empresa</h3>
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-md-2 col-lg-2 " align="center"> <img alt="User Pic" src="http://patrick.verdier.free.fr/LARGE.png" class="img-circle img-responsive"> </div>
										<div class=" col-md-9 col-lg-9 ">   
											<table class="table table-user-information">
												<tbody>
													<?php foreach($registro_usuario as $linha_usuario) { ?>
													<td>
														<div class="form-group">
															<label>Nome da Empresa</label>
															<input type="text" class="form-control" readonly="yes" value="<?php echo $linha_usuario['USU_NOME'];?>">			  
														</div>
													</td>

													<?php } ?>

													<?php foreach($registro_estabelecimento as $linha_estabelecimento) { ?>
													<td>	
														<div class="form-group">
															<label>Nome Fantasia</label>
															<input type="text" class="form-control" disabled value="<?php echo $linha_estabelecimento['EST_NOME_FANTASIA'];?>">			  
														</div>
													</td>

												</tbody>

												<tbody>
													<td>
														<div class="form-group">
															<label>Responsável</label>
															<input type="text" class="form-control" disabled value="<?php echo $linha_estabelecimento['EST_NOME_RESPONSAVEL'];?>">			  
														</div>
													</td>

													<?php } ?>

													<?php foreach($registro_estabelecimento as $linha_estabelecimento) { ?>
													<td>
														<div class="form-group">
															<label>CNPJ</label>
															<input type="text" class="form-control" disabled value="<?php echo $linha_estabelecimento['EST_CNPJ'];?>">			  
														</div>
													</td>
												</tbody>

												<tbody>
													<td>
														<div class="form-group">
															<label>Site da Empresa</label>
															<input type="text" class="form-control" disabled value="<?php echo $linha_estabelecimento['EST_SITE_EMPRESA'];?>">			  
														</div>
													</td>
													<?php } ?>

													<?php foreach($registro_usuario as $linha_usuario) { ?>
													<td>
														<div class="form-group">
															<label>Email</label>
															<input type="text" class="form-control" disabled value="<?php echo $linha_usuario['USU_EMAIL'];?>">			  
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
															<input type="text" class="form-control" disabled value="<?php echo $linha_tipos_estabelecimentos['TES_CATEGORIA']; ?>">			  
														</div>
													</td>
													
													
													<td>
														<div class="form-group">
															<label>Senha</label>
															<input type="button" class="btn btn-default btn-block" value="Atualizar Senha" data-toggle="modal" data-target="#ALTERAR_SENHA">			  
														</div>
													</td>

													<tbody>
														<td> 
															<br/>
															<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#INFORMACOES_PESSOAIS_EMPRESA" data-whateverid="<?php echo $linha_estabelecimento['EST_ID']; ?>" data-whatevernome_empresa="<?php echo $linha_usuario['USU_NOME'];?>" data-whatevernome_fantasia="<?php foreach($registro_estabelecimento as $linha_estabelecimento) { echo $linha_estabelecimento['EST_NOME_FANTASIA']; } ?>"  data-whatevernome_responsavel="<?php foreach($registro_estabelecimento as $linha_estabelecimento) { echo $linha_estabelecimento['EST_NOME_RESPONSAVEL']; } ?>" data-whatevercnpj="<?php foreach($registro_estabelecimento as $linha_estabelecimento) { echo $linha_estabelecimento['EST_CNPJ']; } ?>" data-whateversite_empresa="<?php foreach($registro_estabelecimento as $linha_estabelecimento) { echo $linha_estabelecimento['EST_SITE_EMPRESA']; } ?>"  data-whateveremail="<?php echo $linha_usuario['USU_EMAIL'];?>" data-whatevertipo_estabelecimento="<?php echo $registro_tipos_estabelecimentos['TES_CATEGORIA']; ?>">Atualizar Informações</button>
														</td>
														<?php } ?>

													</tbody>

												</tbody>

												<tr></tr>
											</table>
										</div>
									</div>
								</div>
								<!-- FIM DE INFORMAÇÕES PESSOAIS DA EMPRESA -->

								<!-- INFORMAÇÕES SOBRE O ENDEREÇO -->	
								<div class="panel-heading">
									<h3 class="panel-title">Endereço</h3>
								</div>
								<div class="panel-body">
									<div class="row">
										<div class=" col-md-12 col-lg-12 "> 
											<table class="table table-user-information">
												<tbody>
													<?php foreach($registro_localizacao as $linha_localizacao) { ?>
													<td>	
														<div class="form-group">
															<label>Rua</label>
															<input type="text" class="form-control" disabled value="<?php echo $linha_localizacao['LOC_RUA'];?>">			  
														</div>
													</td>

													<td>	
														<div class="form-group">
															<label>Bairro</label>
															<input type="text" class="form-control" disabled value="<?php echo $linha_localizacao['LOC_BAIRRO'];?>">			  
														</div>
													</td>
													<?php } ?>


													<?php foreach($registro_estabelecimento as $linha_est_localizacao) { ?>
													<td>	
														<div class="form-group">
															<label>Número</label>
															<input type="text" class="form-control" disabled value="<?php echo $linha_est_localizacao['EST_NUMERO_ENDERECO'];?>">			  
														</div>
													</td>
												</tbody>

												<tbody>
													<td>	
														<div class="form-group">
															<label>Complemento</label>
															<input type="text" class="form-control" readonly="yes" value="<?php echo $linha_est_localizacao['EST_COMPLEMENTO'];?>">			  
														</div>
													</td>
													<?php } ?>

													<?php foreach($registro_localizacao as $linha_localizacao) { ?>
													<td>	
														<div class="form-group">
															<label>Cidade</label>
															<input type="text" class="form-control" disabled value="<?php echo $linha_localizacao['LOC_CIDADE'];?>">			  
														</div>
													</td>

													<td>	
														<div class="form-group">
															<label>CEP</label>
															<input type="text" class="form-control" disabled value="<?php echo $linha_localizacao['LOC_CEP'];?>">			  
														</div>
													</td>
												</tbody>

												<tbody>
													<td>
														<br/>
														<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ENDERECO_EMPRESA" data-whateveridendereco="<?php echo $linha_estabelecimento['EST_ID']; ?>" data-whateverrua="<?php echo $linha_localizacao['LOC_RUA']; ?>"  data-whateverbairro="<?php echo $linha_localizacao['LOC_BAIRRO']; ?>" data-whatevernumero="<?php foreach($registro_estabelecimento as $linha_est_localizacao) { echo $linha_est_localizacao['EST_NUMERO_ENDERECO']; } ?>" data-whatevercomplemento="<?php foreach($registro_estabelecimento as $linha_est_localizacao) { echo $linha_est_localizacao['EST_COMPLEMENTO']; } ?>" data-whatevercep="<?php echo $linha_localizacao['LOC_CEP']; ?>" data-whatevercidade="<?php echo $linha_localizacao['LOC_CIDADE']; ?>" >Atualizar Informações</button>
														<?php } ?>
													</td>
												</tbody>
											</table>


										</div>
									</div>
								</div>
								<!-- FIM DE INFORMAÇÕES SOBRE O ENDEREÇO -->

								<!-- SOBRE A EMPRESA -->
								<div class="panel-heading">
									<h3 class="panel-title">Público Alvo da Empresa</h3>
								</div>
								<div class="panel-body">
									<div class="row">
											<div class=" col-md-12 col-lg-9 "> 
												<table class="table table-user-information">
													<tbody>
														<?php foreach($registro_estabelecimento as $linha_estabelecimento) { ?>
														<td>
														</br>
														<div class="form-group">
															<input class="form-control" disabled type="text" value="<?php echo $linha_estabelecimento['EST_PUBLICO_ALVO'];?>">
														</div>
													</td>
												</tbody>

												<tbody>
													<td>
														<br/>
														<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#INFORMACOES_EMPRESA" data-whateverid="<?php echo $linha_estabelecimento['EST_ID']; ?>" data-whateverpublico="<?php echo $linha_estabelecimento['EST_PUBLICO_ALVO']; ?>">Atualizar Informações</button>
														<?php } ?>
													</td>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							<!-- FIM - SOBRE A EMPRESA -->

							<!-- INÍCIO - PRINCIPAIS PRODUTOS E SERVIÇOS OFERECIDOS PELA EMPRESA -->
							<div class="panel-heading">
								<h3 class="panel-title">Principais Produtos e Serviços Oferecidos</h3>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class=" col-md-9 col-lg-9 ">
										<div class="container theme-showcase" role="main">
											<br/><br/>
											<div class="col-sm-11">
												<div class="form-group">	
													<div class="row">
														<div class="table-responsive">
															<table class="table">
																<thead class="thead-inverse">
																	<tr>
																		<th>Numeração</th>
																		<th>Nome do Produto</th>
																		<th>Procedimentos</th>
																		<th><button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalcad">Adicionar</button></th>
																	</tr>
																</thead>
																<tbody>
																	<?php foreach($registro_produtos as $linha_produtos) { ?>
																	<tr>
																		<td><?php echo $linha_produtos['PDT_ID']; ?></td>
																		<td><?php echo $linha_produtos['PDT_NOME']; ?></td>
																		<td>
																			<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#VISUALIZAR_PRODUTO" data-whatever="<?php echo $linha_produtos['PDT_ID']; ?>" data-whatevervisualizarproduto="<?php echo $linha_produtos['PDT_NOME']; ?>" data-whatevervisualizardescricao="<?php echo $linha_produtos['PDT_DESCRICAO_PRODUTO']; ?>" data-whatevervisualizartipo="<?php echo $linha_produtos['TRP_ID']; ?>">Visualizar</button>

																			<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#ALTERAR_PRODUTO" data-whatever="<?php echo $linha_produtos['PDT_ID']; ?>" data-whatevernome="<?php echo $linha_produtos['PDT_NOME']; ?>"  data-whateverdetalhes="<?php echo $linha_produtos['PDT_DESCRICAO_PRODUTO']; ?>" data-whatevertipo="<?php echo $linha_produtos['TRP_ID']; ?>">Editar</button>

																			<button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#EXCLUIR_PRODUTO" data-whatever="<?php echo $linha_produtos['PDT_ID']; ?>" data-whatevervisualizarproduto="<?php echo $linha_produtos['PDT_NOME']; ?>"  data-whateverdetalhes="<?php echo $linha_produtos['PDT_DESCRICAO_PRODUTO']; ?>" data-whatevertipo="<?php echo $linha_produtos['TRP_ID']; ?>">Apagar</button>
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
							<!-- FIM - PRINCIPAIS PRODUTOS E SERVIÇOS OFERECIDOS PELA EMPRESA -->
						</div>
					</div>
				</div>
			</div>
		</div>  	
	</section>

	<!-- INÍCIO MODAL CADASTRAR PRODUTO -->
	<div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title text-center" id="myModalLabel">Cadastrar Produto</h4>
				</div>
				<div class="modal-body">
					<form method="POST" action="http://localhost/RECLAME_SAO_JOAO-INTEGRAR/php/mod03/cadastrarProduto.php" enctype="multipart/form-data">
						<div class="form-group">
							<label for="recipient-name" class="control-label">Nome do produto:</label>
							<input name="PDT_NOME" type="text" class="form-control" required="required" maxlength="50">
						</div>

						<div class="form-group">
							<label for="message-text" class="control-label">Descrição:</label>
							<textarea name="PDT_DESCRICAO_PRODUTO" class="form-control" required="required" maxlength="500"></textarea>
						</div>

						<div class="form-group">
							<label for="recipient-name" class="control-label">Tipo do produto:</label><br/>
							<?php foreach($registros_tipos_produtos as $linha_tipos_produtos) { ?>
							<input type="radio" name="TRP_ID" value="<?php echo $linha_tipos_produtos['TRP_ID']; ?>" checked /> <?php echo $linha_tipos_produtos['TPR_DESCRICAO']; ?><br/>
							<?php } ?>
						</div>


						<input name="EST_ID" type="hidden" id="EST_ID" value="<?php echo $idEst ?>">

						<div class="modal-footer">
							<button type="submit" class="btn btn-success">Cadastrar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- FIM MODAL CADASTRAR PRODUTO -->

	<!-- INÍCIO MODAL - ALTERAR INFORMAÇÕES PESSOAIS DA EMPRESA -->
	<div class="modal fade" id="INFORMACOES_PESSOAIS_EMPRESA" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title text-center" id="exampleModalLabel"> Informações Pessoais da Empresa</h4>
				</div>
				<div class="modal-body">
					<form method="POST" action="php/mod03/editarInformacoesPessoais.php" enctype="multipart/form-data">

						<div class="form-group">
							<label for="nome_empresa-text" class="control-label">Nome da Empresa:</label>
							<input name="USU_NOME" type="text" class="form-control" id="nome_empresa-text" required="required" maxlength="300">
						</div>

						<div class="form-group">
							<label for="nome_fantasia-text" class="control-label">Nome Fantasia:</label>
							<input name="EST_NOME_FANTASIA" type="text" class="form-control" id="nome_fantasia-text" required="required" maxlength="100">
						</div>

						<div class="form-group">
							<label for="nome_responsavel-text" class="control-label">Responsável:</label>
							<input name="EST_NOME_RESPONSAVEL" type="text" class="form-control" id="nome_responsavel-text" required="required" maxlength="10">
						</div>

						<div class="form-group">
							<label for="CNPJ-text" class="control-label">CNPJ:</label>
							<input name="EST_CNPJ" type="text" class="form-control" id="CNPJ-text" required="required" maxlength="500">
						</div>

						<div class="form-group">
							<label for="site_empresa-text" class="control-label">Site da Empresa:</label>
							<input name="EST_SITE_EMPRESA" type="text" class="form-control" id="site_empresa-text" required="required" maxlength="100">
						</div>									

						<div class="form-group">
							<label for="email-name" class="control-label">Email:</label>
							<input name="USU_EMAIL" type="text" class="form-control" id="email-text" required="required" maxlength="30">
						</div>

						<label for="tipo_estabelecimento-text" class="control-label">Tipo de Estabelecimento:</label>
						<select class="form-control" name="TES_ID" id="TES_ID">


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


						<input name="EST_ID" type="hidden" id="EST_ID" value="<?php echo $idEst ?>">
						<input name="USU_ID" type="hidden" id="USU_ID" value="<?php echo $id    ?>">
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-danger">Alterar</button>
						</div>
					</form>
				</div>			  
			</div>
		</div>
	</div>
	<!-- FIM MODAL - ALTERAR INFORMAÇÕES PESSOAS DA EMPRESA -->

	<!-- INÍCIO MODAL - ALTERAR ENDEREÇO DA EMPRESA -->
	<div class="modal fade" id="ENDERECO_EMPRESA" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title text-center" id="exampleModalLabel"> Endereço da Empresa</h4>
				</div>
				<div class="modal-body">
					<form method="POST" action="php/mod03/editarEnderecoEstabelecimentos.php" enctype="multipart/form-data">

						<div class="form-group">
							<label for="rua-text" class="control-label">Rua:</label>
							<input name="LOC_RUA" type="text" class="form-control" id="rua-text" required="required" maxlength="300">
						</div>

						<div class="form-group">
							<label for="bairro-text" class="control-label">Bairro:</label>
							<input name="LOC_BAIRRO" type="text" class="form-control" id="bairro-text" required="required" maxlength="100">
						</div>

						<div class="form-group">
							<label for="numero-text" class="control-label">Número:</label>
							<input name="EST_NUMERO_ENDERECO" type="text" class="form-control" id="numero-text" required="required" maxlength="10">
						</div>

						<div class="form-group">
							<label for="complemento-text" class="control-label">Complemento:</label>
							<input name="EST_COMPLEMENTO" type="text" class="form-control" id="complemento-text" required="required" maxlength="500">
						</div>

						<div class="form-group">
							<label for="cidade-name" class="control-label">CIDADE:</label>
							<input name="LOC_CIDADE" type="text" class="form-control" id="cidade-text" required="required" maxlength="100">
						</div>									

						<div class="form-group">
							<label for="cep-name" class="control-label">CEP:</label>
							<input name="LOC_CEP" type="text" class="form-control" id="cep-text" required="required" maxlength="10">
						</div>									

						<input name="EST_ID" type="hidden" id="est" value="<?php echo $idEst ?>">
						<input name="LOC_ID" type="hidden" id="LOC_ID" value="<?php echo $idLoc ?>">
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-danger">Alterar</button>
						</div>
					</form>
				</div>			  
			</div>
		</div>
	</div>
	<!-- FIM MODAL - ALTERAR ENDEREÇO DA EMPRESA -->

	<!-- INÍCIO MODAL - ALTERAR INFORMAÇÕES SOBRE A EMPRESA -->
	<div class="modal fade" id="INFORMACOES_EMPRESA" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title text-center" id="exampleModalLabel"> Sobre a empresa</h4>
				</div>
				<div class="modal-body">
					<form method="POST" action="php/mod03/editarEstabelecimentos.php" enctype="multipart/form-data">

						<div class="form-group">
							<label for="publico-alvo-text" class="control-label">Público alvo:</label>
							<textarea name="EST_PUBLICO_ALVO" class="form-control" id="publico-alvo-text" required="required" maxlength="100" oninvalid="setCustomValidity('Campo obrigatório, por favor, não deixe em branco.')" onchange="try{setCustomValidity('')}catch(e){}"></textarea>
						</div>

						<input name="EST_ID" type="hidden" id="EST_ID" value="<?php echo $idEst ?>">
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-danger">Alterar</button>
						</div>
					</form>
				</div>			  
			</div>
		</div>
	</div>
	<!-- FIM MODAL - ALTERAR INFORMAÇÕES SOBRE A EMPRESA -->


	<!-- INÍCIO MODAL - ALTERAR PRODUTO -->
	<div class="modal fade" id="ALTERAR_PRODUTO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title text-center" id="exampleModalLabel">Alterar Produto</h4>
				</div>
				<div class="modal-body">
					<form method="POST" action="http://localhost/RECLAME_SAO_JOAO-INTEGRAR/php/mod03/editarProduto.php" enctype="multipart/form-data">
						<div class="form-group">
							<label for="recipient-name" class="control-label">Nome do Produto:</label>
							<input name="PDT_NOME" type="text" class="form-control" id="recipient-name" required="required" maxlength="100">
						</div>
						<div class="form-group">
							<label for="message-text" class="control-label">Descrição do Produto:</label>
							<textarea name="PDT_DESCRICAO_PRODUTO" class="form-control" id="detalhes-text" required="required" maxlength="300"></textarea>
						</div>

						<div class="form-group">
							<label for="recipient-name" class="control-label">Tipo do produto:</label><br/>
							<input type="radio" name="TRP_ID" value="1" id="tipo1-text"/> Alimentício<br/>
							<input type="radio" name="TRP_ID" value="2" id="tipo2-text"/> Cosmético<br/>
							<input type="radio" name="TRP_ID" value="3" id="tipo3-text"/> Vestimento<br/>
						</div>

						<div class="form-group">
							<label for="recipient-name" class="control-label">Tipo do produto:</label><br/>
							
							
							<?php foreach($registros_tipos_produtos_selecionado as $linha_tipos_produtos_selecionado)
							{ 	
								$selecionado =  $linha_tipos_produtos_selecionado['TRP_ID'];
								foreach ($registros_tipos_produtos as $linha_tipos_produtos) 
								{
									$selected = ($selecionado == $linha_produtos['TRP_ID'] ? 'checked' : null);
									print "<input type='radio' name='TRP_ID' value='{$linha_tipos_produtos['TRP_ID']}' {$selected}> {$linha_tipos_produtos['TPR_DESCRICAO']} <br/>";
								}

							}
							?>
						
						</div>

						<input name="PDT_ID" type="hidden" id="recipient-numero-produto">
						<input name="EST_ID" type="hidden" id="EST_ID" value="<?php echo $idEst ?>">
						
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-danger">Alterar</button>
						</div>
					</form>
				</div>			  
			</div>
		</div>
	</div>
	<!-- FIM MODAL - ALTERAR PRODUTO -->

	<!-- INÍCIO MODAL - VISUALIZAR PRODUTOS -->
	<div class="modal fade" id="VISUALIZAR_PRODUTO" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title text-center" id="myModalLabel">Visualizar Produto</h4>
				</div>
				<form enctype="multipart/form-data">
					<div class="modal-body">
						<label for="recipientnumero" class="control-label">Número do Produto:</label>
						<input type="text" class="form-control" id="recipientnumero" disabled>
					</div>
					<div class="modal-body">
						<label for="recipient-nome-produto" class="control-label">Nome do Produto:</label>
						<input name="PRO_NOME_PRODUTO" type="text" class="form-control" id="recipient-nome-produto" disabled>
					</div>

					<div class="modal-body">
						<label for="recipient-descricao-produto" class="control-label">Descrição do Produto:</label>
						<textarea name="PRO_DESCRICAO_PRODUTO" type="text" class="form-control" id="recipient-descricao-produto" disabled></textarea>
					</div>

					<div class="modal-body">
						<label for="recipient-tipo-produto" class="control-label">Tipo do Produto:</label>
						<input name="TIPO_PRODUTO" type="text" class="form-control" id="recipient-tipo-produto" disabled>
					</div>

					<input name="PDT_ID" type="hidden" id="recipient-numero-produto">
					<input name="EST_ID" type="hidden" id="EST_ID" value="<?php echo $idEst ?>">
				</form>

			</div>
		</div>
	</div>
	<!-- FIM MODAL - VISUALIZAR PRODUTOS -->

	<!-- INÍCIO MODAL - EXCLUIR PRODUTO -->
	<div id="EXCLUIR_PRODUTO" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="http://localhost/RECLAME_SAO_JOAO-INTEGRAR/php/mod03/excluirProduto.php" enctype="multipart/form-data">
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<br/>
						<p>Você tem certeza que deseja excluir este produto?</p>
					</div>

					<div class="modal-header">	
						<input  type="text" class="form-control" id="recipient-nome-produto-exclusao" disabled>
					</div>									

					<div class="modal-footer">																															
						<input  type="hidden" name="PDT_ID" class="form-control" id="recipient-numero-produto">

						<button type="submit" class="btn btn-danger" >Confirmar</button>	
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>	
					</div>
				</form>
			</div>		
		</div>
	</div>

	<!-- FIM MODAL - EXCLUIR PRODUTO -->

	<!-- INÍCIO MODAL - ALTERAR SENHA -->
	<div class="modal fade" id="ALTERAR_SENHA" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title text-center" id="exampleModalLabel">Atualizar Senha</h4>
				</div>
				<div class="modal-body">
					<form method="POST" action="http://localhost/RECLAME_SAO_JOAO-INTEGRAR/php/mod03/editarSenha.php" enctype="multipart/form-data">

						<input  type="hidden" id="USU_ID" name="USU_ID" class="form-control" value="1">

						<?php foreach($registro_usuario as $linha_usuario) { ?>
						<div class="col-md-12 form-group">
							<br/>
							<label for="senha_antiga" class="control-label">Senha Antiga:</label>
							<input name="senha_antiga" id="senha_antiga"  type="password" value="<?php echo $linha_usuario['USU_SENHA'];?>" disabled class="form-control">
						</div>
						<?php } ?>

						<div class="col-md-12 form-group">
							<label for="senha_antiga_confirmar" class="control-label">Confirmar Senha Antiga:</label>
							<input onkeyup="validaSenha();" name="senha_antiga_confirmar" id="senha_antiga_confirmar"  type="password" class="form-control">
						</div>

						<div class="col-md-12 form-group">
							<div id="resultado_confirmar_senha">

							</div>
						</div>

						<div class="col-md-12 form-group">
							<label for="senha_nova" class="control-label">Nova Senha:</label>
							<input onkeyup="validaSenha();" name="senha_nova" id="senha_nova"  type="password" class="form-control">
						</div>

						<div class="col-md-12 form-group">
							<label for="senha_confirmar" class="control-label">Confirmar Senha:</label>
							<input onkeyup="validaSenha();" name="senha_confirmar" id="senha_confirmar"  type="password" class="form-control">
						</div>

						<div class="col-md-12 form-group">
							<div id="resultado">

							</div>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-danger" id="enviarsenha" disabled>Alterar</button>
						</div>
					</form>
				</div>			  
			</div>
		</div>
	</div>
	<!-- FIM MODAL - ALTERAR SENHA -->


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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.inview.min.js"></script>
		<script type="text/javascript" src="js/wow.min.js"></script>
		<script type="text/javascript" src="js/mousescroll.js"></script>
		<script type="text/javascript" src="js/smoothscroll.js"></script>
		<script type="text/javascript" src="js/jquery.countTo.js"></script>
		<script type="text/javascript" src="js/mod03/alterarSenha.js"></script>
		<script type="text/javascript" src="js/mod03/produto.js"></script>
		<script type="text/javascript" src="js/mod03/informacoesEmpresa.js"></script>
		<!--FIM DO SCRIPT EM GERAL -->
	</body>
	</html>