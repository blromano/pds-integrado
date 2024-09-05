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
			
		
	//Criar conexão com a tabela Consumidor
		include 'controle/ConsumidorDAO.php';
		$ConsumidorDAO = new ConsumidorDAO();
		
		//Retornar Usuário através do ID do consumidor
			$CON_ID = $_GET["CON_ID"];
		
			$USU_ID = $ConsumidorDAO->retornar_USU_ID($CON_ID);
	
	//Criar conexão com a tabela Usuários
		$UsuarioDAO = new UsuarioDAO();
		$registro_usuario = $UsuarioDAO->pesquisarPorId($USU_ID);
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
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet"> 
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">

	
	<link href="css/responsive.css" rel="stylesheet">
	
	<link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="images/favicon.ico">

	<title>Modal</title>
	

	
		<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
		<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
		<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="js/mod05/dataTable.js"></script> <!-- DataTable -->
		<link href="css/estilo.css" rel="stylesheet">
		<link href="css/menu_do_site.css" rel="stylesheet">
		<link rel="stylesheet" href="css/rodape.css">
		<script src = "https://unpkg.com/sweetalert/dist/sweetalert.min.js"> </script>
	
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
				<ul class="nav navbar-nav navbar-right" >   
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['EST_NOME_FANTASIA']; ?>
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
	<br/><br/><br/>
	<br/><br/><br/>
	<div class="container">		
		<br/>
		<br/>
		<div class="row">
			<!-- INÍCIO -  Gerencimento do Perfil do Estabelecimento -->
			<div class="col-sm-12">

				<div class="col-sm-12" id="selecionar-todas-reclamacoes">
					<div class="panel panel-default" style="border-left: thick double  #64594f; border-right: thick double  #64594f;">
						<div class="panel-body">
							<div style="text-align:center;"><h4><span class="fa fa-comments" aria-hidden="true"></span> Agendamento de Reunião </h4></div>
							<div class="pull-right"></div>
						</div>
					</div>
				</div>

			</div>
			<!-- FIM - Gerencimento do Perfil do Estabelecimento -->
		</div>
		
		<!-- INICIO - INFORMAÇÕES PESSOAIS -->	
			<div class="row" id="todas-reclamacoes">
							<div class="col-sm-12">
								<div class="panel panel-default">
									<div class="panel-heading"><span class="fa fa-id-card-o" aria-hidden="true"></span> Detalhes da Reunião </div>
									<div class="panel-body">
									<form method="POST" action="php/mod03/agendar-reuniao.php" enctype="multipart/form-data">
										<div class="col-sm-12">
											<br/>
											<br/>
											<div class="panel panel-default" style="border-left: thick double #64594f; border-right: thick double  #64594f;">
												<div class="panel-body">
													<div class="row">
														<div class=" col-md-12 col-lg-12 ">   
															<table class="table table-user-information">
																<input name="EST_ID" type="hidden" id="EST_ID" value="<?php echo $idEst  ?>">
																<input name="CON_ID" type="hidden" id="CON_ID" value="<?php echo $USU_ID ?>">

																<tbody>
																		<td>
																			<div class="form-group">
																				<label>Nome da Empresa</label>
																				<input type="text" class="form-control" disabled value="<?php echo $_SESSION['EST_NOME_FANTASIA'];?>" maxlength="50">
																				<input type="hidden" name="USU_NOME_EMPRESA" id="USU_NOME_EMPRESA" class="form-control" value="<?php echo $_SESSION['EST_NOME_FANTASIA'];?>" maxlength="50">			  
																			</div>
																		</td>
																	<?php foreach($registro_usuario as $linha_usuario) { ?>
																		<td>
																			<div class="form-group">
																				<label>Nome do Cliente</label>
																				<input type="text" class="form-control" disabled value="<?php echo $linha_usuario['USU_NOME'];?>" maxlength="50">
																				<input type="hidden" name="USU_NOME_CLIENTE" id="USU_NOME_CLIENTE" class="form-control" value="<?php echo $linha_usuario['USU_NOME'];?>" maxlength="50">
																			</div>
																		</td>
																	<?php } ?>
																</tbody>

																<tbody>
																		<td>
																			<div class="form-group">
																				<label>Email da Empresa</label>
																				<input type="email" name="USU_EMAIL_EMPRESA" id="USU_EMAIL_EMPRESA" class="form-control" disabled value="<?php echo $_SESSION['USU_EMAIL'];?>" maxlength="100">			  
																			</div>
																		</td>
									
																	<?php foreach($registro_usuario as $linha_usuario) { ?>
																		<td>
																			<div class="form-group">
																				<label>Email do Cliente</label>
																				<input type="email" name="USU_EMAIL_CLIENTE" id="USU_CLIENTE" class="form-control" disabled value="<?php echo $linha_usuario['USU_EMAIL'];?>" maxlength="100">			  
																			</div>
																		</td>
																	<?php } ?>								
																</tbody>
																
																	<tbody>
																			<td>
																				<div class="form-group">
																					<label>Nome do Evento</label>
																					<input type="text" name="REU_N0ME_EVENTO" id="REU_N0ME_EVENTO" class="form-control" value="" maxlength="50" required>			  
																				</div>
																				<div class="form-group">
																					<label>Representante</label>
																				   <input type="text" id="REU_REPRESENTANTE" name="REU_REPRESENTANTE" class="form-control" required>                  
																				</div>
																			</td>
																	
																			<td>
																				<div class="form-group">
																					<label>Descrição do Evento</label>
																					<textarea class="form-control" style="width: 100%;" id="REU_DESCRICAO" name="REU_DESCRICAO" rows="5"  maxlength="500" oninvalid="setCustomValidity('Por favor, digite a descrição do evento corretamente.')" onchange="try{setCustomValidity('')}catch(e){}" required> </textarea>
																				</div>
																			</td>
																	</tbody>
																</div>
																
																<tbody>
																
																	<td>
																		<div class="form-group">
																				<label>Data da Reunião</label>
																				   <input type="date" id="REU_DATA" name="REU_DATA" class="form-control" placeholder="Data de Nascimento" required>                  
																				</div>
																	</td>
																	<td>
																		<div class="form-group">
																		<div class="col-sm-6">
																			<label>Hora de Início</label>
																		   <input type="time" id="REU_HORARIO_INICIO" name="REU_HORARIO_INICIO" class="form-control" placeholder="Data de Nascimento" required>                  
																		</div>
																		<div class="col-sm-6">
																			<label>Hora de Término</label>
																		   <input type="time" id="REU_HORARIO_TERMINO" name="REU_HORARIO_TERMINO" class="form-control" placeholder="Data de Nascimento" required>                  
																		</div>
																		</div>
																	</td>
																</tbody>
																
																<tr></tr>
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
																<a href="javascript:{}" onclick="document.getElementById('form_informacoes_pessoais').submit();" id="botao_atualizar_informacoes_pessoais" style="display:none"><span class="fa fa-tachometer" aria-hidden="true"></span> Editar Informações Pessoais da Empresa</a>
																
															</li>
														</ul>	
													</div>
												</div>
										</div>
									</div>
								</div>
							</div>
			</div>	
		<!-- FIM - INFORMAÇÕES PESSOAIS -->
		
			
		<!-- INICIO - ENDEREÇO -->	
			<div class="row" id="todas-reclamacoes">
							<div class="col-sm-12">
								<div class="panel panel-default">
									<div class="panel-heading"><span class="fa fa-id-card-o" aria-hidden="true"></span> Local do Evento</div>
									<div class="panel-body">
										<div class="col-sm-12">
											<br/>
											<br/>
											<div class="panel panel-default" style="border-left: thick double #64594f; border-right: thick double  #64594f;">
												<div class="panel-body">
													<div class="row">
														<div class=" col-md-12 col-lg-12 "> 
															<table class="table table-user-information">
																<tbody>
																	<td>
																		<div class="form-group">
																				<label>CEP</label>
																				<input type="text" name="LOC_CEP" id="LOC_CEP"; class="form-control" OnKeyPress="formatar('#####-###', this)" onblur="pesquisacep(this.value);" required="required" pattern=".{0}|.{9,9}" maxlength="9" value="" required>			  
																		</div>
																	</td>
																	
																	<td>	
																		<div class="form-group">
																		<div class="col-sm-6">
																			<label>Rua</label>
																			<input type="text" name="LOC_RUA" id="LOC_RUA" class="form-control" value="" maxlength="100" required>			  
																		</div>
																		
																		<div class="col-sm-6">
																			<label>Bairro</label>
																			<input type="text" name="LOC_BAIRRO" id="LOC_BAIRRO" class="form-control" value="" maxlength="100" required>			  
																		</div>
																		</div>
																	</td>
																</tbody>

																<tbody>
																	<td>	
																		<div class="form-group">
																			<label>Cidade</label>
																			<input type="text" name="LOC_CIDADE" id="LOC_CIDADE" class="form-control" value="" maxlength="100" required>			  
																		</div>
																	</td>
																	<td>	
																		<div class="form-group">
																		<div class="col-sm-6">
																			<label>Estado</label>
																			<input type="text" name="LOC_ESTADO" id="LOC_ESTADO" class="form-control" value="" maxlength="100" required>			  
																		</div>
																		
																		<div class="col-sm-6">
																		<div class="col-sm-6">
																			<label>Número</label>
																			<input type="text" name="EST_NUMERO_ENDERECO" id="EST_NUMERO_ENDERECO" class="form-control" value="" maxlength="10" required>			  
																		</div>
																		<div class="col-sm-6">	
																			<label>Complemento</label>
																			<input type="text" name="EST_COMPLEMENTO" id="EST_COMPLEMENTO" class="form-control" value="" maxlength="500" required>			  
																		</div>
																		</div>
																		</div>
																	</td>
																	
																	
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
									</div>

										<input name="EST_ID" type="hidden" id="est" value="<?php echo $idEst ?>">
										<input name="LOC_ID" type="hidden" id="LOC_ID" value="<?php echo $idLoc ?>">
										<div class="panel-group" id="accordion">	
												<div class="panel panel-default">
													<div class="panel-heading">
														<ul class="nav nav-tabs nav-justified">
															<li>
																<button type="submit" id="submitBtn" style="display:none;" data-validate="contact-form">Hidden Button</button>
																<a href="javascript:{}"  class="myClass" onclick="$('#submitBtn').click();" id="botao_atualizar_informacoes_pessoais"><span class="fa fa-tachometer" aria-hidden="true"></span> Agendar Reunião com o Cliente</a>
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
		<!-- FIM - ENDEREÇO -->
			</div>	
		
		
		
		
	</div>


	<!--RODAPÉ-->
	<br/>
	<br/>
	<br/>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
		<script type="text/javascript" src="js/mod03/verificarCEP.js"></script>
		<script type="text/javascript" src="js/mod03/formatarCNPJ.js"></script>
		<script type="text/javascript" src="js/mod03/validarSenha.js"></script>
		<script type="text/javascript" src="js/mod03/mascaraTelefone.js"></script>
		<script type="text/javascript" src="js/mod03/verificarCNPJ.js"></script>
		<script type="text/javascript" src="js/mod03/gerenciar-perfil.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<!--FIM DO SCRIPT EM GERAL -->
	</body>
	</html>