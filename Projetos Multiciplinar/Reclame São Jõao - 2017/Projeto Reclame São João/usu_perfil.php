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
			//header('Location: usu_paginaBoasVindasUsuario.php');
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

	//Criar um novo Consumidor para pegar o CON_ID passando como parâmetro o USU_ID
		include 'controle/ConsumidorDAO.php';
		$ConsumidorDAO = new ConsumidorDAO();
		$registro_consumidor = $ConsumidorDAO->pesquisarPorIdUsr($id);
		$idCon = $ConsumidorDAO->idCon($id);


	//Criar a conexão com a tabela Usuários
			$USUARIOdao = new UsuarioDAO();
			$registro_usuario = $USUARIOdao->pesquisarPorId($id);

	//Criar a conexão com a tabela Localização
		include 'controle/LocalizacaoDAO.php';
			$LocalizacaoDAO = new LocalizacaoDAO();
			$idLoc = $ConsumidorDAO->selecionar_localizacao($idCon);
			$registro_localizacao = $LocalizacaoDAO->pesquisarPorId($idLoc);
			
			
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
	<link href="css/main.css" rel="stylesheet">

	
	<link href="css/responsive.css" rel="stylesheet">

	<link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="images/favicon.ico">

	<title>Modal</title>
	

	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
		
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/rodape.css">
    <link href="css/menu_do_site.css" rel="stylesheet">

		<!-- <link rel="stylesheet" href="css/mod05/estilo.css"> -->
		

		
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
						<?php foreach($registro_usuario as $linha_usuario) { ?>
						<li class="scroll"  ><div class="img"><img src="<?php echo $linha_usuario['USU_FOTO_PERFIL'];?>" border="0" /></div></li> 
						<?php } ?>
						<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<span></span> <?php echo strtok($_SESSION['USU_NOME'], " ");?>
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
		<nav class="navbar navbar-inverse sidebar navbar-fixed-top" role="navigation" >
				
		<div class="nav-side-menu" style="top: 0; float: left;">					
		<div class="brand">Rankings e Relatórios</div>
		<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

		<div class="menu-list">

		<ul id="menu-content" class="menu-content collapse out">
		<ul id="menu-content" class="menu-content collapse out">
		<li data-toggle="collapse" data-target="#service" class="collapsed">
		<a href="index.php"><i></i>&nbsp Página Inicial<i class="fa fa-home fa-fw fa-lg btn pull-right"></i></a>
		</li>

		
		<li data-toggle="collapse" data-target="#service" class="collapsed">
		<a href="#"><i class="fa fa-caret-down fa-lg"></i> Rankings <i class="fa fa-bar-chart-o fa-lg btn pull-right" style="margin-top:5px; margin-right:4px;"></i></a>
		</li>
		<ul class="sub-menu collapse" id="service">
		<li id="r1">Ranking completo dos estabelecimentos</li>
		<li id="r2">Problemas solucionados</li>
		<li id="r3">Número de reclamações nos últimos tempos</li>
		<li id="r4">Estabelecimentos tendenciosos</li>
		</ul>

		<li data-toggle="collapse" data-target="#new" class="collapsed">
		<a href="#"><i class="fa fa-caret-down fa-lg"></i> Relatórios <i class="fa fa-file-text fa-lg btn pull-right" style="margin-top:5px; margin-right:2px;"></i></a>
		</li>
		<ul class="sub-menu collapse" id="new">
		<li id="t1">Feedback das reuniões</li>
		<li id="t2">Relatório tabular das avaliações</li>
		<li id="t3">Reclamação das últimas semanas</li>
		</ul>
		<li  data-target="#new" class="collapsed">
		<a href="#" id="c1"><i class="fa fa-caret-right fa-lg"></i> Comparação entre duas empresas <i class="fa fa-line-chart fa-lg btn pull-right" style="margin-top:5px; margin-right:2px;"></i></a>
		</li>
		<li  data-target="#new" id="empresaLogada" style="display:none">
		<a href="#" id="f1"><i class="fa fa-caret-right fa-lg"></i> Registrar feedback<i class="fa fa-comment fa-lg btn pull-right" style="margin-top:5px; margin-right:2px;"></i></a>
		</li>
	
		<div class="brand">Reclamações e Avaliações</div>
		<div class="menu-list">

		<ul id="menu-content" class="menu-content collapse out">

		<li data-target="#gerenciar">
		<a href="rec_gerenciar.php?pagina=2"><i></i>&nbsp Gerenciar Reclamações <i class="fa fa-align-right fa-lg btn pull-right" style="margin-top:5px; margin-right:4px;"></i></a>
		</li>
		<li data-toggle="collapse" data-target="#chat" class="collapsed">
		<!-- 	<li><a href="usu_chatUsuario.php" id="usu_icon_chat" class="fa fa-comments" aria-hidden="true"></span> Chat</a></li> -->			
		</ul>
		
		</div>
		</ul>
			<div class="brand">Demais Funcionalidades</div>
		<div class="menu-list">

		<ul id="menu-content" class="menu-content collapse out">

		<li data-toggle="collapse" data-target="#service" class="collapsed">
		<a href="usu_perfil.php"><i></i>&nbsp Visualizar e Editar Perfil<i class="glyphicon glyphicon-user fa-lg btn pull-right"></i></a>
		</li>
		<li data-toggle="collapse" data-target="#chat" class="collapsed">
		<!-- 	<li><a href="usu_chatUsuario.php" id="usu_icon_chat" class="fa fa-comments" aria-hidden="true"></span> Chat</a></li> -->
		<a href="#"><i></i>&nbsp Chat <i class="fa fa-comment fa-lg btn pull-right" style="margin-top:5px; margin-right:4px;"></i></a>
		</li>
		<li data-toggle="collapse" data-target="#new" class="collapsed">
		<a href="php/mod01/sair.php"><i></i>&nbsp Sair <i class="fa fa-sign-out fa-lg btn pull-right"></i></a>	
		</ul>
		
		</div>
		</ul>
		</div>
		</div>
		</nav>

		</aside>
	<!-- FIM DA NAV SIDEBAR -->
	<!-- INÍCIO - CORPO DA PÁGINA -->
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
							<div style="text-align:center;"><h4><span class="fa fa-address-card" aria-hidden="true"></span> Gerencimento do Perfil do Consumidor</h4></div>
							<div class="pull-right"></div>
						</div>
					</div>
				</div>

			</div>
			<!-- FIM - Gerencimento do Perfil do Estabelecimento -->
		</div>
		
		<!-- INICIO - FOTO -->	
			<div class="row" id="todas-reclamacoes">
							<div class="col-sm-12">
								<div class="panel panel-default">
									<div class="panel-heading"><span class="fa fa-user" aria-hidden="true"></span> Foto de Perfil <span class="pull-right" onclick='foto_perfil()' id="habilitar_foto_perfil">Habilitar Edição <input type="checkbox" data-toggle="toggle" data-onstyle="primary" data-size="mini"></span></div>
									<div class="panel-body">
									<form method="POST" id="form_foto_perfil" action="php/mod01/editarFotoPerfil.php" enctype="multipart/form-data">
										<div class="col-sm-12">
											<br/>
											<br/>
											<div class="panel panel-default" style="border-left: thick double #64594f; border-right: thick double  #64594f;">
												<div class="panel-body">
													<div class="row">
														<div class=" col-md-12 col-lg-12 ">   
															<table class="table table-user-information">
																<input name="CON_ID" type="hidden" id="CON_ID" value="<?php echo $idCon ?>">
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
														<i class="fa fa-pencil" aria-hidden="true" id="USU_FOTO_PERFIL" ></i> Selecionar Foto de Perfil <input type="file" name="USU_FOTO_PERFIL" id="USU_FOTO_PERFIL" accept="image/*;capture=camera" style="display: none;" multiple required >							
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
									<form method="POST" id="form_informacoes_pessoais" action="php/mod01/editarInformacoesPessoais.php" enctype="multipart/form-data">
										<div class="col-sm-12">
											<br/>
											<br/>
											<div class="panel panel-default" style="border-left: thick double #64594f; border-right: thick double  #64594f;">
												<div class="panel-body">
													<div class="row">
														<div class=" col-md-12 col-lg-12 ">   
															<table class="table table-user-information">
																<input name="CON_ID" type="hidden" id="CON_ID" value="<?php echo $idCon ?>">
																<input name="USU_ID" type="hidden" id="USU_ID" value="<?php echo $id    ?>">
																
																<tbody>
																	<?php foreach($registro_usuario as $linha_usuario) { ?>
																	<td>
																		<div class="form-group">
																			<label>Nome Completo</label>
																			<input type="text" name="USU_NOME" id="USU_NOME" class="form-control" disabled value="<?php echo $linha_usuario['USU_NOME'];?>" maxlength="50">			  
																		</div>
																	</td>

																	<?php } ?>

																	<?php foreach($registro_consumidor as $linha_consumidor) { ?>
																	<td>	
																		<div class="form-group">
																			<label>CPF</label>
																			<input type="text" name="CON_CPF" id="CON_CPF" class="form-control" OnKeyPress="formatar('###.###.###-##', this)"disabled value="<?php echo $linha_consumidor['CON_CPF'];?>" maxlength="14" >			  
																		</div>
																		<div class="col-sm-2" style="text-align:center;">
																		<div class="form-group">
																				<span class="help-block"  id="situacao_cpf"></span>
																			</div>
																		</div>
																	</td>

																</tbody>

																<tbody>
																	<td>
																		<div class="form-group">
																			<label>Data de Nascimento: </label><?php echo date('d/m/Y',strtotime($linha_consumidor['CON_DATA_NASCIMENTO']));?>
																			<?php
																				$splitTimeStamp = explode(" ",$linha_consumidor['CON_DATA_NASCIMENTO']);
																				
																				//Data da Reclamação
																					$data = date('d/m/Y',strtotime($splitTimeStamp[0]));
																		?>
																			<input type="date" id="CON_DATA_NASCIMENTO" name="CON_DATA_NASCIMENTO" class="form-control" disabled value="<?php echo $data?>" maxlength="11">			  
																		</div>
																	</td>

																	<?php } ?>

																	<?php foreach($registro_consumidor as $linha_consumidor) { ?>
																	<td>
																		<div class="form-group">
																			<label>Telefone 2</label>
																			<input type="text" name="CON_TELEFONE2" id="CON_TELEFONE2" class="form-control" disabled value="<?php echo $linha_consumidor['CON_TELEFONE2'];?>" maxlength="15">
																		</div>
																	</td>
																</tbody>
																<?php } ?>
																
																<tbody>
																<?php foreach($registro_usuario as $linha_usuario) { ?>
																	<td>
																		<div class="form-group">
																			<label>Telefone</label>
																			<input type="text" name="USU_TELEFONE" id="USU_TELEFONE" class="form-control" disabled value="<?php echo $linha_usuario['USU_TELEFONE'];?>" maxlength="14">			  
																		</div>
																	</td>

																<?php } ?>

																	<?php foreach($registro_usuario as $linha_usuario) { ?>
																	<td>
																		<div class="form-group">
																			<label>Email</label>
																			<input type="email" name="USU_EMAIL" id="USU_EMAIL" class="form-control" disabled value="<?php echo $linha_usuario['USU_EMAIL'];?>" maxlength="100" pattern="[A-Za-z0-9._%+-]+@gmail.com">			  
																			<p class="text-center" id="situacao_email"></p>
																		</div>
																	</td>
																	<?php } ?>								
																</tbody>

																	<tr></tr>
															
															</table>
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
																<a href="javascript:{}" onclick="document.getElementById('form_informacoes_pessoais').submit();" id="botao_atualizar_informacoes_pessoais" style="display:none"><span class="fa fa-tachometer" aria-hidden="true"></span> Editar Informações Pessoais do Consumidor</a>
																
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
		

		
		<!-- FIM - ENDEREÇO -->	

					<div class="row" id="todas-reclamacoes">
							<div class="col-sm-12">
								<div class="panel panel-default">
									<div class="panel-heading"><span class="fa fa-key" aria-hidden="true"></span> Senha <span class="pull-right" onclick='senha()' id="senha">Habilitar Edição <input type="checkbox" data-toggle="toggle" data-onstyle="primary" data-size="mini"></span></div>
									<div class="panel-body">
									<form method="POST" id="form_senha" action="php/mod01/editarsenha.php" enctype="multipart/form-data">
										<div class="col-sm-12">
											<br/>
											<br/>
											<div class="panel panel-default" style="border-left: thick double #64594f; border-right: thick double  #64594f;">
												<div class="panel-body">
													<div class="row">
														<div class=" col-md-12 col-lg-12 "> 
															<table class="table table-user-information">
																<input name="USU_ID" type="hidden" id="USU_ID" value="<?php echo $id    ?>">
																<tbody>
																	<td>	
																	<?php foreach($registro_usuario as $linha_usuario) { ?>
																			<div class="col-md-12 form-group">
																				<br/>
																				<label for="senha_antiga" class="control-label">Senha Antiga:</label>
																				<input name="senha_antiga" id="senha_antiga" type="password" value="<?php echo $linha_usuario['USU_SENHA'];?>" disabled class="form-control">
																			</div>			
																		</td>
																		<?php } ?>	
																		<td>																
																		<div class="col-md-12 form-group">
																			<br/>
																			<label for="senha_antiga_confirmar" class="control-label">Confirmar Senha Antiga:</label>
																			<input onkeyup="trocaSenha();" name="senha_antiga_confirmar" disabled id="senha_antiga_confirmar"  required="required" type="password" class="form-control" >
																			<p class="text-center" id="resultado_confirmar_senha"> </p>
																		</div>
																		</td>																																																
																			
																	</tbody>

																	<tbody>
																	<td>															
																	<div class="col-md-12 form-group">
																		<label for="senha_nova" class="control-label">Nova Senha:</label>
																		<input onkeyup="trocaSenha();" name="senha_nova" id="senha_nova" required="required" disabled  type="password" class="form-control" required>
																	</div>
																	</td>

																	<td>
																	<div class="col-md-12 form-group">
																		<label for="senha_confirmar" class="control-label">Confirmar Senha:</label>
																		<input onkeyup="trocaSenha();" name="senha_confirmar" id="senha_confirmar" required="required" disabled " type="password" class="form-control" required>
																		<p class="text-center" id="resultado"> </p>
																	</div>
																</td>
																	
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
									</div>

										<input name="CON_ID" type="hidden" id="con" value="<?php echo $idCon ?>">
										<input name="LOC_ID" type="hidden" id="LOC_ID" value="<?php echo $idLoc ?>">
										<div class="panel-group" id="accordion">	
												<div class="panel panel-default">
													<div class="panel-heading">
														<ul class="nav nav-tabs nav-justified">
															<li>
																<a href="javascript:{}" onclick="document.getElementById('form_senha').submit();" id="enviarsenha" style="display:none"><span class="fa fa-tachometer" aria-hidden="true" ></span> Editar Senha</a>
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

		
		<!-- INICIO - ENDEREÇO -->	
			<div class="row" id="todas-reclamacoes">
							<div class="col-sm-12">
								<div class="panel panel-default">
									<div class="panel-heading"><span class="fa fa-map-marker" aria-hidden="true"></span> Endereço <span class="pull-right" onclick='endereco()' id="endereco">Habilitar Edição <input type="checkbox" data-toggle="toggle" data-onstyle="primary" data-size="mini"></span></div>
									<div class="panel-body">
									<form method="POST" id="form_endereco" action="php/mod01/editarEnderecoConsumidor.php" enctype="multipart/form-data">
										<div class="col-sm-12">
											<br/>
											<br/>
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
																			<input type="text" name="LOC_CEP" id="LOC_CEP" OnKeyPress="formatar('#####-###', this);" class="form-control"  onblur="pesquisacep(this.value);" required="required" pattern=".{0}|.{9,9}" maxlength="9" value="<?php echo $linha_localizacao['LOC_CEP'];?>" required disabled oninvalid="setCustomValidity('Por favor, digite o CEP corretamente.')" onchange="try{setCustomValidity('')}catch(e){}">			  
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
																			
																			<?php foreach($registro_consumidor as $linha_con_localizacao) { ?>	
																				<div class="col-sm-6">
																					<div class="col-sm-6">
																						<label>Número</label>
																						<input type="text" name="CON_NUMERO" id="CON_NUMERO" class="form-control" value="<?php echo $linha_con_localizacao['CON_NUMERO'];?>" maxlength="10" required disabled oninvalid="setCustomValidity('Por favor, digite o número corretamente.')" onchange="try{setCustomValidity('')}catch(e){}">			  
																					</div>
																					<div class="col-sm-6">	
																						<label>Complemento</label>
																						<input type="text" name="CON_COMPLEMENTO" id="CON_COMPLEMENTO" class="form-control" value="<?php echo $linha_con_localizacao['CON_COMPLEMENTO'];?>" maxlength="500" required disabled oninvalid="setCustomValidity('Por favor, digite o complemento corretamente.')" onchange="try{setCustomValidity('')}catch(e){}">			  
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

										<input name="CON_ID" type="hidden" id="con" value="<?php echo $idCon ?>">
										<input name="LOC_ID" type="hidden" id="LOC_ID" value="<?php echo $idLoc ?>">
										<div class="panel-group" id="accordion">	
												<div class="panel panel-default">
													<div class="panel-heading">
														<ul class="nav nav-tabs nav-justified">
															<li>
																<a href="javascript:{}" onclick="document.getElementById('form_endereco').submit();" id="botao_atualizar_endereco" style="display:none"><span class="fa fa-tachometer" aria-hidden="true"></span> Editar Endereço</a>
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
	</div>

	<!--RODAPÉ-->
	<br/>
	<br/>
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
		
		<script type="text/javascript" src="js/mod01/formatarCEPEditar.js"></script>
		<script type="text/javascript" src="js/mod01/verificarCPF.js"></script>
		<script type="text/javascript" src="js/mod01/alterarSenha.js"></script>
		<script type="text/javascript" src="js/mod01/gerenciar-senha.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.inview.min.js"></script>
		<script type="text/javascript" src="js/wow.min.js"></script>
		<script type="text/javascript" src="js/jquery.countTo.js"></script>
		<script type="text/javascript" src="js/mod01/informacoesConsumidor.js"></script>
		<script type="text/javascript" src="js/mod01/verificarCEPEditar.js"></script>			
		<script type="text/javascript" src="js/mod01/mascaraTelefone.js"></script>
		<script type="text/javascript" src="js/mod01/gerenciar-perfil.js"></script>
		<script type="text/javascript" src="js/mod01/gerenciar-foto.js"></script>
		<script type="text/javascript" src="js/mod01/mascaraCEP.js"></script>
		<script type="text/javascript" src="js/jquery.mask.js"></script>
		<script type="text/javascript" src="js/jquery.mask.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		
		<link href="https://cdn.rawgit.com/xdan/datetimepicker/master/jquery.datetimepicker.css" rel="stylesheet"/>
		
		<script src="https://cdn.rawgit.com/xdan/datetimepicker/master/build/jquery.datetimepicker.full.js"></script>
		<script type="text/javascript" src="js/mod01/formatoDataNascimentoEditar.js"></script>
		
		
		<!--FIM DO SCRIPT EM GERAL -->
	</body>
	</html>