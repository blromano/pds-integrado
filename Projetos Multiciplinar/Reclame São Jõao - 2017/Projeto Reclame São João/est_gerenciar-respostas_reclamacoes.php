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

	//Criar conexão com a tabela Reclamação
		include 'controle/ReclamacoesDAO.php';
		$ReclamacoesDAO = new ReclamacoesDAO();
		
		// Registro de Todas as Reclamações
			$registro_todas_reclamacoes = $ReclamacoesDAO->pesquisarTodasReclamacoes($idEst);
			
		// Registro Reclamações Atendidas
			$registro_reclamacoes_atendidas = $ReclamacoesDAO->pesquisarReclamacoesAtendidas($idEst);
			
		// Registro Reclamações Não Atendidas
			$registro_reclamacoes_nao_atendidas = $ReclamacoesDAO->pesquisarReclamacoesNaoAtendidas($idEst);

		//Reclamacões Não Solucionadas	
			$naoSolucionadas = $ReclamacoesDAO->pesquisarNumeroReclamacaoNaoAtendida($idEst); 

		//Reclamacões Solucionadas
			$solucionadas = $ReclamacoesDAO->pesquisarReclamacaoSolucionada($idEst);

	//Criar conexão com a tabela Usuários
		$UsuarioDAO = new UsuarioDAO();
		$registro_usuario = $UsuarioDAO->pesquisarPorId($id);
		$registro_todos_usuarios = $UsuarioDAO->listarTodos();

	//Criar conexão com a tabela Resposta da Reclamação
		include 'controle/RespostaReclamacaoDAO.php';
		$RespostaReclamacaoDAO = new RespostaReclamacaoDAO();
		$registro_respostas = $RespostaReclamacaoDAO->pesquisarPorId('1');

	//Criar conexão com a tabela Consumidor
		include 'controle/ConsumidorDAO.php';
		$ConsumidorDAO = new ConsumidorDAO();
		$registro_consumidor = $ConsumidorDAO->pesquisarPorId($id);

	// Contador do numero exibir o número de reclamações
		$contador_todas_reclamacoes = 1;
		$contador_nao_solucionadas = 1;
		$contador_solucionadas = 1;
		
		function somente_numeros($str) 
			{
				return preg_replace("/[^0-9]/", "", $str);
			}
?>

<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="">
	<meta name="author" content="">


	<!-- TÍTULO DO SITE -->
		<title>Reclame São João</title>

	<!-- SIDEBAR -->
		<link href="css/sidebar.css" rel="stylesheet">

	<!-- OUTROS -->
		<link href="css/animate.min.css" rel="stylesheet"> 
		<link href="css/font-awesome.min.css" rel="stylesheet">
		
		<link href="css/mod03/estrelas.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">

		<link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
		<link rel="shortcut icon" href="images/favicon.ico">
		

    <!-- Customizacao -->
		<link href="css/mod03/paginacao_reclamacoes/dataTables.bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/menu_do_site.css" rel="stylesheet">
		<link rel="stylesheet" href="css/rodape.css">
		<link rel="stylesheet" href="css/estilo.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		
</head>

<body>

	<!-- INÍCIO - MENU DO SITE -->
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
			<!-- INÍCIO - GERENCIAMENTO DAS RECLAMAÇÕES -->
				<div class="row">
					<div class="col-sm-12">
						<div class="col-sm-12" id="selecionar-todas-reclamacoes">
							<div class="panel panel-default" style="border-left: thick double  #64594f; border-right: thick double  #64594f;">
								<div class="panel-body">
									<div style="text-align:center;"><h4><span class="fa fa-address-card" aria-hidden="true"></span> Gerencimento das Reclamações</h4></div>
									<div class="pull-right"></div>
								</div>
							</div>
						</div>
					</div>	
				</div>
			<!-- FIM - GERENCIAMENTO DAS RECLAMAÇÕES -->
		 <div  id="accordion1">
    <div class="panel">
			<!-- INÍCIO - NÚMERO DE RECLAMAÇÕES -->
				<div class="row">
					<div class="col-sm-12">
						<a data-toggle="collapse" data-parent="#accordion1" href="#reclamacoes">
							<div class="col-sm-4">
								<div class="panel panel-default" style="border-left: thick double  #3194DA;">
									<div class="panel-body">
										<div class="pull-left"><font style="color:black;"><span class="fa fa-fire" aria-hidden="true"></span> Reclamações</font></div>
										<div class="pull-right"><font style="color:black;"><?php echo $solucionadas+$naoSolucionadas ?></font></div>
									</div>
								</div>
							</div>
						</a>
						<a data-toggle="collapse" data-parent="#accordion1" href="#reclamacoesatendidas">
							<div class="col-sm-4">
								<div class="panel panel-default" style="border-left: thick double #00ff00;">
									<div class="panel-body">
										<div class="pull-left"><font style="color:black;"><span class="fa fa-users" aria-hidden="true"></span> Atendidas</font></div>
										<div class="pull-right"><font style="color:black;"><?php echo $solucionadas ?></font></div>
									</div>
								</div>
							</div>
						</a>
						<a data-toggle="collapse" data-parent="#accordion1" href="#reclamacoes_nao_atendidas">
							<div class="col-sm-4">
								<div class="panel panel-default" style="border-left: thick double #ff0000;">
									<div class="panel-body">
										<div class="pull-left"><font style="color:black;"><span class="fa fa-envelope" aria-hidden="true"></span> Não Atendidas</font></div>
										<div class="pull-right"><font style="color:black;"><?php echo $naoSolucionadas ?></font></div>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			<!-- FIM - NÚMERO DE RECLAMAÇÕES -->
	
		<div class="col-sm-4" style="text-align:center;">
			<h4><span class="fa fa-filter" aria-hidden="true"></span>Filtrar por Período de Tempo</h4>
		</div>
		
		<div class="col-sm-4" style="text-align:center;">
			<h4><span class="fa fa-star" aria-hidden="true"></span>Filtrar por Pontuação</h4>
		</div>
		
		<div class="col-sm-4" style="text-align:center;">
			<h4><span class="fa fa-filter" aria-hidden="true"></span>Filtrar por Palavras</h4>
		</div>
		
		<div class="col-sm-2">
			<input type="date" placeholder="Data Inicial" class="form-control" id="min_data" name="min_data">
		</div>
		<div class="col-sm-2">
			<input type="date" placeholder="Data Final"  class="form-control" id="max_data" name="max_data">
		</div>
		
		
		<div class="col-sm-2">
			<input type="number" placeholder="Nota Inicial" min="0" max="5" class="form-control" id="min" name="min">
				</div>
		<div class="col-sm-2">
			<input placeholder="Nota Final" type="number"  min="0" max="5" class="form-control" id="max" name="max">
		</div>
		
		<div id="reclamacoes" class="panel-collapse collapse in">
		
	
	<table class="table table-striped table-hover" id="tabela">

				<thead style="color: #474444;">
					<th style="background-color: #f5f5f5; color: #474444">Reclamações</th>
					<th>Nota da Reclamação</th>
					<th>Data da Reclamação</th>
				</thead>

				<tbody>
				<?php foreach($registro_todas_reclamacoes as $linha_reclamacoes) { ?>

			
					<tr style="background-color: #ffffff;">
						<td style="background-color: #ffffff;">
							<!-- INICIO - TODAS AS RECLAMAÇÕES -->	
								<div class="row">
										
												<div class="col-sm-12">
													<div class="panel panel-default">
														<div class="panel-heading"><span class="fa fa-list" aria-hidden="true"></span> #<?php echo $contador_todas_reclamacoes++;?> Reclamação</div>
														<div class="panel-body">
															<div class="col-sm-12">
																<br/>
																<br/>
																<div class="panel panel-default" style="border-left: thick double #3194DA;">
																	<div class="panel-body">
																		<!-- INÍCIO - PONTUAÇÃO POR ESTRELAS -->
																			<div class="col-sm-3">
																				<div class="estrelas">
																					<?php 
																					$st01 = "";
																					$st02 = "";
																					$st03 = "";
																					$st04 = "";
																					$st05 = "";

																					switch($linha_reclamacoes['REC_NOTA'])
																					{
																						case('1'):{
																							$st01 = "";
																							$st02 = "checked";
																							$st03 = "";
																							$st04 = "";
																							$st05 = "";
																							break;
																						}
																						case('2'):{
																							$st01 = "";
																							$st02 = "";
																							$st03 = "checked";
																							$st04 = "";
																							$st05 = "";
																							break;
																						}
																						case('3'):{
																							$st01 = "";
																							$st02 = "";														
																							$st03 = "";
																							$st04 = "checked";
																							$st05 = "";
																							break;
																						}
																						case('4'):{
																							$st01 = "";
																							$st02 = "";	
																							$st03 = "";
																							$st04 = "";
																							$st05 = "checked";
																							break;
																						}
																						case('5'):{
																							$st01 = "";
																							$st02 = "";
																							$st03 = "";
																							$st04 = "";
																							$st05 = "";
																							$st05 = "";
																							break;
																						}													
																					
																					}?>
																					
																					<input type="radio" id="cm_star-1" <?php echo $st01;?>  />
																					<label for="cm_star-1"><i class="fa"></i></label>									
																					

																					<input type="radio" id="cm_star-2" <?php echo $st02;?> />
																					<label for="cm_star-2"><i class="fa"></i></label>

																					<input type="radio" id="cm_star-3" <?php echo $st03;?>  />
																					<label for="cm_star-3"><i class="fa"></i></label>

																					<input type="radio" id="cm_star-4" <?php echo $st04;?> />
																					<label for="cm_star-4"><i class="fa"></i></label>

																					<input type="radio" id="cm_star-5" <?php echo $st05;?> />
																					<label for="cm_star-5"><i class="fa"></i></label> 
																				</div>
																			</div>
																		<!-- FIM - PONTUAÇÃO POR ESTRELAS -->
																		
																		<div class="col-sm-9">
																			<div class="col-sm-8" style="text-align: center;">
																				<!-- TÍTULO DA RECLAMAÇÃO -->
																				<b>	<?php echo $linha_reclamacoes['REC_TITULO_RECLAMACAO'];?> </b>
																				
																			</div>
																			<!-- REDIRECIONAR PARA A PÁGINA: AGENDAR REUNIÃO -->
																			<div class="col-sm-4" style="text-align: right;">
																					<?php $CON_ID = $linha_reclamacoes['CON_ID']; ?>
																				<a href="est_agendar-reuniao.php?CON_ID=<?php echo $CON_ID; ?>" class="agendar-reuniao">Agendar Reunião</a>
																			</div>
																		</div>
																	</div>
																</div>
															</div>

															<div class="col-sm-12">
																<div class="panel panel-default" style="border-left: thick double #3194DA;">
																	<div class="panel-body">
																	
																		<?php 
																				$conId = $linha_reclamacoes['CON_ID'];
																				$usuId = $ConsumidorDAO->retornar_USU_ID($conId);
																		?>
														
																		<!--     NOME DO USUÁRIO      -->
																			<div class="pull-left" style="text-align=Justify; line-height: 2.5;"><span class="fa fa-user" aria-hidden="true"> Reclamação do Consumidor, <?php foreach ($registro_todos_usuarios as $linha_todos_usuarios) { if ($linha_todos_usuarios['USU_ID']==$usuId) {	echo ucfirst($linha_todos_usuarios['USU_NOME']); } }?> </span> </div>

																		<?php
																				$splitTimeStamp = explode(" ",$linha_reclamacoes['REC_DATA_HORA']);
																				//Data da Reclamação
																					$data_reclamacao = date('d-m-Y',strtotime($splitTimeStamp[0]));
																				//Hora da Reclamação
																					$hora_reclamacao = $splitTimeStamp[1];
																		?>
																			
																			<div class="pull-right" style="text-align=Justify; line-height: 2.5;"><span class="fa fa-calendar" aria-hidden="true"> <?php echo $data_reclamacao; ?> às  <?php echo $hora_reclamacao; ?></span></div><br/>
																		
																		<!--     RECLAMAÇÃO DO USUÁRIO      -->
																			<br/> <div class="pull-left" style="text-align=Justify; line-height: 2.5;"> <?php echo $linha_reclamacoes['REC_DESCRICAO']; ?></div>
																		
																		<!--     LOCALIZAÇÃO DO USUÁRIO      -->
																			<div class="pull-right" style="text-align=Justify; line-height: 2.5;"><span class="fa fa-globe" aria-hidden="true"> São João da Boa Vista</span></div><br/>
																	</div>
																</div>
															</div>

															
															<div class="panel-group" id="accordion">	
																	<div class="panel panel-default">
																		<div class="panel-heading">
																			<ul class="nav nav-tabs nav-justified">
																				<li >
																					<a data-toggle="collapse" data-parent="#accordion" href="#responder"><span class="fa fa-tachometer" aria-hidden="true"></span> Reclamação do Consumidor  <?php foreach ($registro_todos_usuarios as $linha_todos_usuarios) { if ($linha_todos_usuarios['USU_ID']==$usuId) {	echo ucfirst($linha_todos_usuarios['USU_NOME']); } }?></a>
																				</li>
																			</ul>	
																		</div>
																	</div>
															</div>	
														</div>
													</div>
												</div>
										
								</div>	
							<!-- FIM - TODAS AS RECLAMAÇÕES -->
						</td>
						<td>
							<?php echo $linha_reclamacoes['REC_NOTA'];?> 
						</td>
						<td>
							<?php
								
								$splitTimeStamp = explode(" ",$linha_reclamacoes['REC_DATA_HORA']);
									//Data da Reclamação
								$data = date('Ymd',strtotime($splitTimeStamp[0]));
								
								$data = somente_numeros($data); 
								
								echo $data; 
							 
								
							?>
								
						</td>
					</tr>
					<?php } ?>
				</tbody>
	</table>
	</div>
	
	
		<!-- INICIO - RECLAMAÇÕES ATENDIDAS -->
		<div id="reclamacoesatendidas" class="panel-collapse collapse in">
			<table class="table table-striped table-hover" id="tabela_2">
				<thead style="color: #474444;">
					<th style="background-color: #f5f5f5; color: #474444">Reclamações</th>
					<th>Nota da Reclamação</th>
					<th>Data da Reclamação</th>
				</thead>

				<tbody>
					<?php foreach($registro_reclamacoes_atendidas as $linha_reclamacoes_atendidas) { ?>
						<tr style="background-color: #ffffff;">
							<td style="background-color: #ffffff;">		
								<div class="row">
									<div class="col-sm-12">
										<div class="panel panel-default">
											<div class="panel-heading"><span class="fa fa-list" aria-hidden="true"></span> #<?php echo $contador_solucionadas++;?> Reclamação</div>
												<div class="panel-body">		
													<div class="col-sm-12"><br/><br/>
														<div class="panel panel-default" style="border-left: thick double #00ff00;">
															<div class="panel-body">
																<!-- INÍCIO - PONTUAÇÃO POR ESTRELAS -->
																	<div class="col-sm-3">
																		<div class="estrelas">
																			<?php 
																				$st01 = "";
																				$st02 = "";
																				$st03 = "";
																				$st04 = "";
																				$st05 = "";

																				switch($linha_reclamacoes_atendidas['REC_NOTA'])
																					{
																						case('1'):
																							{
																								$st01 = "";
																								$st02 = "checked";
																								$st03 = "";
																								$st04 = "";
																								$st05 = "";
																								break;
																							}
																						case('2'):
																							{
																								$st01 = "";
																								$st02 = "";
																								$st03 = "checked";
																								$st04 = "";
																								$st05 = "";
																								break;
																							}
																						case('3'):
																							{
																								$st01 = "";
																								$st02 = "";														
																								$st03 = "";
																								$st04 = "checked";
																								$st05 = "";
																								break;
																							}
																						case('4'):
																							{
																								$st01 = "";
																								$st02 = "";	
																								$st03 = "";
																								$st04 = "";
																								$st05 = "checked";
																								break;
																							}
																						case('5'):
																							{
																								$st01 = "";
																								$st02 = "";
																								$st03 = "";
																								$st04 = "";
																								$st05 = "";
																								$st05 = "";
																								break;
																							}	
																					}
																			?>
																										
																			<input type="radio" id="cm_star-1" <?php echo $st01;?>  />
																			<label for="cm_star-1"><i class="fa"></i></label>									
																										
																			<input type="radio" id="cm_star-2" <?php echo $st02;?> />
																			<label for="cm_star-2"><i class="fa"></i></label>

																			<input type="radio" id="cm_star-3" <?php echo $st03;?>  />
																			<label for="cm_star-3"><i class="fa"></i></label>

																			<input type="radio" id="cm_star-4" <?php echo $st04;?> />
																			<label for="cm_star-4"><i class="fa"></i></label>

																			<input type="radio" id="cm_star-5" <?php echo $st05;?> />
																			<label for="cm_star-5"><i class="fa"></i></label> 
																		</div>
																	</div>
																<!-- FIM - PONTUAÇÃO POR ESTRELAS -->
																
																<div class="col-sm-9">
																	<?php
																		$splitTimeStamp = explode(" ",$linha_reclamacoes_atendidas['REC_DATA_HORA']);
																		//Data da Reclamação
																			$data_reclamacao = date('d-m-Y',strtotime($splitTimeStamp[0]));
																		//Hora da Reclamação
																			$hora_reclamacao = $splitTimeStamp[1];
																	?>
																	
																	<!-- TÍTULO DA RECLAMAÇÃO -->
																		<div class="col-sm-8" style="text-align: center;">
																			<b>	<?php echo $linha_reclamacoes_atendidas['REC_TITULO_RECLAMACAO'];?> </b>	
																		</div>
																		
																	<!-- REDIRECIONAR PARA A PÁGINA: AGENDAR REUNIÃO -->
																		<div class="col-sm-4" style="text-align: right;">
																				<?php $CON_ID = $linha_reclamacoes_atendidas['CON_ID']; ?>
																			<a href="est_agendar-reuniao.php?CON_ID=<?php echo $CON_ID; ?>" class="agendar-reuniao">Agendar Reunião</a>
																		</div>
																</div>
															</div>
														</div>
													</div>

													<div class="col-sm-12">
														<div class="panel panel-default" style="border-left: thick double #00ff00;">
															<div class="panel-body">
																<?php 
																	$conId = $linha_reclamacoes_atendidas['CON_ID'];
																	$usuId = $ConsumidorDAO->retornar_USU_ID($conId);
																?>
											
																<!-- NOME DO USUÁRIO -->
																	<div class="pull-left" style="text-align=Justify; line-height: 2.5;"><span class="fa fa-user" aria-hidden="true"> Reclamação do Consumidor, <?php foreach ($registro_todos_usuarios as $linha_todos_usuarios) { if ($linha_todos_usuarios['USU_ID']==$usuId) {	echo ucfirst($linha_todos_usuarios['USU_NOME']); } }?> </span> </div>

																	<?php
																		$splitTimeStamp = explode(" ",$linha_reclamacoes_atendidas['REC_DATA_HORA']);
																		//Data da Reclamação
																			$data_reclamacao = date('d-m-Y',strtotime($splitTimeStamp[0]));
																		//Hora da Reclamação
																			$hora_reclamacao = $splitTimeStamp[1];
																	?>
																	
																<!-- DATA E HORA DA RECLAMAÇÃO -->
																	<div class="pull-right" style="text-align=Justify; line-height: 2.5;"><span class="fa fa-calendar" aria-hidden="true"> <?php echo $data_reclamacao; ?> às  <?php echo $hora_reclamacao; ?></span></div><br/><br/>
																
																<!-- RECLAMAÇÃO DO USUÁRIO -->
																	 <div class="pull-left" style="text-align=Justify; line-height: 2.5;"> <?php echo $linha_reclamacoes_atendidas['REC_DESCRICAO']; ?></div>
																
																<!-- LOCALIZAÇÃO DO USUÁRIO -->
																	<div class="pull-right" style="text-align=Justify; line-height: 2.5;"><span class="fa fa-globe" aria-hidden="true"> São João da Boa Vista</span></div><br/>
															</div>
														</div>
													
														<div class="panel panel-default" style="border-right: thick double #00ff00;">
															<div class="panel-body">
																<!-- NOME DO USUÁRIO -->
																	<div class="pull-left"  style="text-align=Justify; line-height: 2.5;"><span class="fa fa-user" aria-hidden="true"> Resposta da Empresa, <?php echo $_SESSION['EST_NOME_FANTASIA']; ?> </span></div>
															
																	<?php
																		$splitTimeStamp = explode(" ",$linha_reclamacoes_atendidas['RER_DATA_HORA']);
																		//Data da Reclamação
																			$data_resposta_reclamacao = date('d-m-Y',strtotime($splitTimeStamp[0]));
																		//Hora da Reclamação
																			$hora_resposta_reclamacao = $splitTimeStamp[1];
																	?>
																
																<!-- DATA E HORA DA RECLAMAÇÃO -->										
																	<div class="pull-right" style="text-align=Justify; line-height: 2.5;"><span class="fa fa-calendar" aria-hidden="true"> <?php echo $data_resposta_reclamacao; ?> às  <?php echo $hora_resposta_reclamacao; ?></span></div><br/>
															
																<!-- RESPOSTA DO ESTABELECIMENTO -->
																	<div class="pull-RIGHT" style="text-align=Justify; line-height: 2.5;"> <?php echo $linha_reclamacoes_atendidas['RER_DESCRICAO']; ?></div><br/>
																
																<!-- LOCALIZAÇÃO DO ESTABELECIMENTO -->
																	<div class="pull-right" style="text-align=Justify; line-height: 2.5;"><span class="fa fa-globe" aria-hidden="true"> São João da Boa Vista</span></div><br/>
															</div>
														</div>
													</div>
											
													<div class="panel-group" id="accordion">	
														<div class="panel panel-default">
															<div class="panel-heading">
																<ul class="nav nav-tabs nav-justified">
																	<li>
																		<a data-toggle="collapse" href="#atualizar_<?php echo $linha_reclamacoes_atendidas['REC_ID']; ?>"><span class="fa fa-pencil fa-fw" aria-hidden="true"></span> Atualizar Resposta</a>
																	</li>
																	<li>
																		<a data-toggle="modal" data-target="#EXCLUIR-RESPOSTA" data-whatever="<?php echo $linha_reclamacoes_atendidas['RER_ID']; ?>" data-whatevervisualizarresposta="<?php echo $linha_reclamacoes_atendidas['RER_DESCRICAO'];?>"><span class="fa fa-trash-o" aria-hidden="true"></span> Excluir Resposta</a>
																	</li>
																</ul>
															
																<div id="atualizar_<?php echo $linha_reclamacoes_atendidas['REC_ID']; ?>" class="panel-collapse collapse">
																  <div class="panel-body">
																	  <form method="POST" action="php/mod03/editarResposta.php" enctype="multipart/form-data">
																			
																			<div class="col-md-12">
																				<textarea class="form-control col-md-8" style="margin-left: 0px;width: 100%;" name="RER_DESCRICAO" id="RER_DESCRICAO" rows="7" maxlength="500" oninvalid="setCustomValidity('Por favor, digite uma resposta para a reclamação.')" onchange="try{setCustomValidity('')}catch(e){}" required="required"> <?php echo $linha_reclamacoes_atendidas['RER_DESCRICAO']; ?> </textarea>
																				<input type="hidden" value="<?php echo $linha_reclamacoes_atendidas['RER_ID']; ?>" name="RER_ID" id="RER_ID">
																				<input type="hidden" value="<?php echo $linha_reclamacoes_atendidas['ADM_ID']; ?>" name="ADM_ID" id="ADM_ID">
																			
																			</div>
																			
																				
																				<div class="col-md-12">
																					
																						<!-- REDIRECIONAR PARA A PÁGINA: CADASTRAR RESPOSTA -->
																								<button type="submit" class="btn btn-primary btn-block" dtype="submit">Atualizar Reclamação</button>																			
																				</div>
																				
																	  </form>
																  </div>
																</div>	
															</div>
														</div>
													</div>
												</div>	
											</div>
									</div>
								</div>
							</td>	
							<td>
								<?php echo $linha_reclamacoes_atendidas['REC_NOTA'];?> 
							</td>
							<td>
								<?php
									$splitTimeStamp = explode(" ",$linha_reclamacoes_atendidas['REC_DATA_HORA']);
									//Data da Reclamação
									$data = date('Ymd',strtotime($splitTimeStamp[0]));
								
									$data = somente_numeros($data); 
								
									echo $data; 
								?> 
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		
		<!-- FIM - RECLAMAÇÕES ATENDIDAS -->
	
			<!-- INICIO - RECLAMAÇÕES NÃO ATENDIDAS -->
			<div id="reclamacoes_nao_atendidas" class="panel-collapse collapse in">
				<table class="table table-striped table-hover" id="tabela_3">
				<thead style="color: #474444;">
					<th style="background-color: #f5f5f5; color: #474444">Reclamações</th>
					<th>Nota da Reclamação</th>
					<th>Data da Reclamação</th>
				</thead>

				<tbody>
					<?php foreach($registro_reclamacoes_nao_atendidas as $linha_reclamacoes_nao_atendidas) { ?>
						<tr style="background-color: #ffffff;">
							<td style="background-color: #ffffff;">		
				<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default">
								<div class="panel-heading"><span class="fa fa-list" aria-hidden="true"></span> #<?php echo $contador_nao_solucionadas++;?> Reclamação</div>
									<div class="panel-body">
										<div class="col-sm-12"><br/><br/>
											<div class="panel panel-default" style="border-left: thick double #ff0000;">
												<div class="panel-body">
													<!-- INÍCIO - PONTUAÇÃO POR ESTRELAS -->
														<div class="col-sm-3">
															<div class="estrelas">
																<?php 
																	$st01 = "";
																	$st02 = "";
																	$st03 = "";
																	$st04 = "";
																	$st05 = "";

																	switch($linha_reclamacoes_nao_atendidas['REC_NOTA'])
																		{
																			case('1'):
																				{
																					$st01 = "";
																					$st02 = "checked";
																					$st03 = "";
																					$st04 = "";
																					$st05 = "";
																					break;
																				}
																			case('2'):
																				{
																					$st01 = "";
																					$st02 = "";
																					$st03 = "checked";
																					$st04 = "";
																					$st05 = "";
																					break;
																				}
																			case('3'):
																				{
																					$st01 = "";
																					$st02 = "";														
																					$st03 = "";
																					$st04 = "checked";
																					$st05 = "";
																					break;
																				}
																			case('4'):
																				{
																					$st01 = "";
																					$st02 = "";	
																					$st03 = "";
																					$st04 = "";
																					$st05 = "checked";
																					break;
																				}
																			case('5'):
																				{
																					$st01 = "";
																					$st02 = "";
																					$st03 = "";
																					$st04 = "";
																					$st05 = "";
																					$st05 = "";
																					break;
																				}	
																		}
																?>
																							
																<input type="radio" id="cm_star-1" <?php echo $st01;?>  />
																<label for="cm_star-1"><i class="fa"></i></label>									
																							
																<input type="radio" id="cm_star-2" <?php echo $st02;?> />
																<label for="cm_star-2"><i class="fa"></i></label>

																<input type="radio" id="cm_star-3" <?php echo $st03;?>  />
																<label for="cm_star-3"><i class="fa"></i></label>

																<input type="radio" id="cm_star-4" <?php echo $st04;?> />
																<label for="cm_star-4"><i class="fa"></i></label>

																<input type="radio" id="cm_star-5" <?php echo $st05;?> />
																<label for="cm_star-5"><i class="fa"></i></label> 
															</div>
														</div>
													<!-- FIM - PONTUAÇÃO POR ESTRELAS -->
													
													<div class="col-sm-9">
														<!-- TÍTULO DA RECLAMAÇÃO -->
															<div class="col-sm-8" style="text-align: center;">
																<b>	<?php echo $linha_reclamacoes_nao_atendidas['REC_TITULO_RECLAMACAO'];?> </b>
															</div>
														<!-- REDIRECIONAR PARA A PÁGINA: AGENDAR REUNIÃO -->
															<div class="col-sm-4" style="text-align: right;">
																<?php $CON_ID = $linha_reclamacoes_nao_atendidas['CON_ID']; ?>
																<a href="est_agendar-reuniao.php?CON_ID=<?php echo $CON_ID; ?>" class="agendar-reuniao">Agendar Reunião</a>
															</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-12">
											<div class="panel panel-default" style="border-left: thick double #ff0000;">
												<div class="panel-body">
													
														<!--  ID DO CONSUMIDOR  -->
															<?php $conId = $linha_reclamacoes_nao_atendidas['CON_ID']; $usuId = $ConsumidorDAO->retornar_USU_ID($conId); ?>
										
														<!--  NOME DO USUÁRIO  -->
															<div class="pull-left" style="text-align=Justify; line-height: 2.5;"><span class="fa fa-user" aria-hidden="true"> Reclamação do Consumidor, <?php foreach ($registro_todos_usuarios as $linha_todos_usuarios) { if ($linha_todos_usuarios['USU_ID']==$usuId) {	echo ucfirst($linha_todos_usuarios['USU_NOME']); } }?> </span> </div>

															<?php
																$splitTimeStamp = explode(" ",$linha_reclamacoes_nao_atendidas['REC_DATA_HORA']);
																//Data da Reclamação
																	$data_reclamacao = date('d-m-Y',strtotime($splitTimeStamp[0]));
																//Hora da Reclamação
																	$hora_reclamacao = $splitTimeStamp[1];
															?>
															
														<!-- DATA E HORA DA RECLAMAÇÃO -->	
															<div class="pull-right" style="text-align=Justify; line-height: 2.5;"><span class="fa fa-calendar" aria-hidden="true"> <?php echo $data_reclamacao; ?> às  <?php echo $hora_reclamacao; ?></span></div><br/><br/>
														
														<!-- RECLAMAÇÃO DO USUÁRIO -->
															<div class="pull-left" style="text-align=Justify; line-height: 2.5;"> <?php echo $linha_reclamacoes_nao_atendidas['REC_DESCRICAO']; ?></div>
														
														<!-- LOCALIZAÇÃO DO USUÁRIO -->
															<div class="pull-right" style="text-align=Justify; line-height: 2.5;"><span class="fa fa-globe" aria-hidden="true"> São João da Boa Vista</span></div><br/>
												</div>
											</div>
										</div>

										<div class="panel-group" id="accordion">	
											<div class="panel panel-default">
												<div class="panel-heading">
													<ul class="nav nav-tabs nav-justified">
														<li>
															<a data-toggle="collapse" data-parent="#accordion" href="#responder_<?php echo $linha_reclamacoes_nao_atendidas['ID']; ?>"><span class="fa fa-tachometer" aria-hidden="true"></span> Responder Reclamação</a>
														</li>
														<li>
															<a data-toggle="collapse" data-parent="#accordion" href="#denunciar_<?php echo $linha_reclamacoes_nao_atendidas['ID']; ?>"><span class="fa fa-fire" aria-hidden="true"></span> Denunciar Cliente</a>
														</li>
													</ul>
															
													<!-- INÍCIO - COLLAPSE RESPONDER RECLAMAÇÃO -->
														<div id="responder_<?php echo $linha_reclamacoes_nao_atendidas['ID']; ?>" class="panel-collapse collapse">
															<form method="POST" action="php/mod03/cadastrarResposta.php" enctype="multipart/form-data">
																<div class="panel-body">
																	
																		<div class="col-md-12">
																			<textarea class="form-control col-md-8" style="margin-left: 0px;width: 100%;" name="RER_DESCRICAO" id="RER_DESCRICAO" rows="5" required> </textarea>
																						
																			<input type="hidden" value="<?php echo $linha_reclamacoes_nao_atendidas['ID']; ?>" name="REC_ID" id="REC_ID">
																						
																			<input type="hidden" value="<?php echo $linha_reclamacoes_nao_atendidas['ADM']; ?>" name="ADM_ID" id="ADM_ID">
																			
																			<input type="hidden" value="<?php echo $linha_reclamacoes_nao_atendidas['CON_ID']; ?>" name="CON_ID" id="CON_ID">
																		</div>
																					
																		<!-- REDIRECIONAR PARA A PÁGINA: CADASTRAR RESPOSTA -->
																			<div class="col-md-12">
																				<button type="submit" class="btn btn-primary btn-block" dtype="submit">Enviar Reclamação</button>	
																			</div>
																	
																</div>
															</form>
														</div>
													<!-- FIM - COLLAPSE RESPONDER RECLAMAÇÃO -->
																
													<!-- INÍCIO - COLLAPSE DENUNCIAR CLIENTE -->
														<div id="denunciar_<?php echo $linha_reclamacoes_nao_atendidas['ID']; ?>" class="panel-collapse collapse">
															<form method="POST" action="php/mod03/cadastrarDenuncia.php" enctype="multipart/form-data">
																<div class="panel-body">
																	<!-- OPÇÕES DE DENUNCIAR DE CLIENTE -->
																		
																			<legend>Denunciar Cliente por:</legend>
																		<div class="col-md-12">	
																			<select class="form-control" name="DEC_TIPO_DENUNCIA" id="DEC_TIPO_DENUNCIA">
																				<option value="1" select>Comportamento Violento ou Negativo</option>
																				<option value="2">Spam ou Fraude</option>
																				<option value="3">Discurso de Violência</option>
																				<option value="4">Conteúdo Sexualmente Explícito</option>
																				<option name="tipo_denuncia" id="tipo_denuncia" value="5">Outros motivos</option>
																			</select>
																		</div>
																		<br/>
																		<br/>
																		
																		
																	<!-- MOTIVO DA DENÚNCIA -->	
																		<div style="display:none;" id="OUTRO_TIPO_DENUNCIA" name="OUTRO_TIPO_DENUNCIA">
																			<legend>Diga-nos o Motivo dessa Denúncia</legend>
																			<div class="col-md-12">	
																			<input type="text" class="form-control col-md-12" value="" name="DEC_TIPO_DENUNCIA_OUTRO" id="DEC_TIPO_DENUNCIA_OUTRO">
																		</div>
																		</div>
																		<br/>
																		<br/>
																																				
																		
																	<!-- DESCRIÇÃO SOBRE O OCORRIDO -->
																			<legend>Sobre a denúncia</legend>
																			<textarea class="form-control col-md-8" style="margin-left: 0px;width: 100%;" name="DEC_MOTIVO" id="DEC_MOTIVO"rows="5"  maxlength="500" oninvalid="setCustomValidity('Por favor, digite o motivo da sua denúncia.')" onchange="try{setCustomValidity('')}catch(e){}" required="required"></textarea>
													
																				<input type="hidden" value="<?php echo $linha_reclamacoes_nao_atendidas['ID']; ?>" name="REC_ID" id="REC_ID">
																						
																				<input type="hidden" value="1" name="ADM_ID" id="ADM_ID">
																				
																				<!--<input type="hidden" value="<-?php echo $linha_reclamacoes_nao_atendidas['ADM']; ?>" name="ADM_ID" id="ADM_ID">-->
																						
																				<input type="hidden" value="<?php echo $idEst; ?>" name="EST_ID" id="EST_ID">
																						
																				<input type="hidden" value="<?php echo $conId; ?>" name="CON_ID" id="CON_ID">
																						
																				<!-- BOTÃO CONFIRMAR -->
																					<button type="submit" class="btn btn-primary btn-block">Enviar Denúncia</button>	
																</div>
															</form> 
														</div>	
													<!-- FIM - COLLAPSE DENUNCIAR CLIENTE -->
												</div>
											</div>
										</div>	
								</div>
							</div>
						</div>
				</div>
				</td>	
							<td>
								<?php echo $linha_reclamacoes_nao_atendidas['REC_NOTA'];?> 
							</td>
							<td>
								<?php
									$splitTimeStamp = explode(" ",$linha_reclamacoes_nao_atendidas['REC_DATA_HORA']);
									//Data da Reclamação
									$data = date('Ymd',strtotime($splitTimeStamp[0]));
								
									$data = somente_numeros($data); 
								
									echo $data; 
								?> 
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<!-- FIM - RECLAMAÇÕES NÃO ATENDIDAS -->
		</div>
		</div>
		</div>
		</div>
		</div>
	<!-- FIM - CORPO DA PÁGINA -->				

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

	<!-- INÍCIO - MODAL CONFIRMAÇÃO - EXCLUIR RESPOSTA-->
		<div id="EXCLUIR-RESPOSTA" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<form method="POST" action="php/mod03/excluirResposta.php" enctype="multipart/form-data">
						<div class="modal-body">
							<button type="button" class="close" data-dismiss="modal">&times;</button><br/>
								<p>Você tem certeza que deseja excluir esta resposta?</p>
						</div>
						
						<div class="modal-footer">
							<input  type="hidden" name="RER_ID" class="form-control" id="recipient-numero-resposta">
							<button type="submit" class="btn btn-danger">Confirmar</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	<!-- FIM - MODAL CONFIRMAÇÃO - EXCLUIR RESPOSTA-->


		
			<!-- SCRIPT EM GERAL -->
				<script type="text/javascript">
					var table = document.getElementById('tabela');
					for (var r = 0; r < table.rows.length; r++)
					{
						table.rows[r].cells[1].style.display = 'none';
						table.rows[r].cells[2].style.display = 'none';
					}
					
					var table = document.getElementById('tabela_2');
					for (var r = 0; r < table.rows.length; r++)
					{
						table.rows[r].cells[1].style.display = 'none';
						table.rows[r].cells[2].style.display = 'none';
					}
					
					var table = document.getElementById('tabela_3');
					for (var r = 0; r < table.rows.length; r++)
					{
						table.rows[r].cells[1].style.display = 'none';
						table.rows[r].cells[2].style.display = 'none';
					}
					

				</script>
				
				<script type="text/javascript" src="js/jquery.min.js"></script>
				<script type="text/javascript" src="js/wow.min.js"></script>
				<script type="text/javascript" src="js/mousescroll.js"></script>
				<script type="text/javascript" src="js/main.js"></script>
				<!--<script type="text/javascript" src="js/mod03/gerenciar-reclamacoes.js"></script>-->
				<script type="text/javascript" src="js/mod03/excluir-resposta.js"></script>
				<script type="text/javascript" src="js/mod03/denunciar-cliente.js"></script>
			
				<script type="text/javascript" src="js/mod03/paginacaoreclamacoes/jquery.js"></script>
				<script src="js/bootstrap.min.js" type="text/javascript"></script>
				<script src="js/mod03/paginacaoreclamacoes/jquery.dataTables.min.js" type="text/javascript"></script>
				<script src="js/mod03/paginacaoreclamacoes/dataTables.bootstrap.min.js" type="text/javascript"></script>
				<script src="js/mod03/paginacaoreclamacoes/dataTable.js"></script>
				<script type="text/javascript" src="js/mod03/formatoDataNascimento.js"></script>
				<script src = "https://unpkg.com/sweetalert/dist/sweetalert.min.js"> </script>
			<!--FIM DO SCRIPT EM GERAL -->
			
			
						
			<script>
			
						$(document).ready(function() {
							$('#tabela').DataTable();
						} );
						$(document).ready(function() {
							$('#tabela_2').DataTable();
						} );
						$(document).ready(function() {
							$('#tabela_3').DataTable();
						} );
						
						$(document).ready(function() {
							$('table.display').DataTable();
						} );
			
						function somente_numeros(num) 
							{
								var numsStr = num.replace(/[^0-9]/g,'');
									return parseInt(numsStr);
							}

			
				
		$.fn.dataTable.ext.search.push(
			function( settings, data, dataIndex ) {
				var min = parseInt( $('#min').val(), 10 );
				var max = parseInt( $('#max').val(), 10 );
				var age = parseFloat( data[1] ) || 0; // use data for the age column
				
				if ( ( isNaN( min ) && isNaN( max ) ) ||
					 ( isNaN( min ) && age <= max ) ||
					 ( min <= age   && isNaN( max ) ) ||
					 ( min <= age   && age <= max ) )
				{
					return true;
				}
				return false;
			}
			);
			
	
			$.fn.dataTable.ext.search.push(
			function( settings, data, dataIndex ) {
				
				var min_data = parseInt(document.getElementById('min_data').value.replace(/[^0-9]/g,''), 10); 
				var max_data = parseInt(document.getElementById('max_data').value.replace(/[^0-9]/g,''), 10); 
				
				var data_reclamacao = parseFloat( data[2]) || 0; // use data for the age column
				
	
		 
				if ( ( isNaN( min_data ) && isNaN( max_data ) ) ||
					 ( isNaN( min_data ) && data_reclamacao <= max_data ) ||
					 ( min_data <= data_reclamacao   && isNaN( max_data ) ) ||
					 ( min_data <= data_reclamacao   && data_reclamacao <= max_data ) )
				{
					return true;
				}
				if ( min_data == max_data && data_reclamacao == min_data)
				{
					return true;
				}
				return false;
				
			}
			);
			
		
				$(document).ready(function() {
					var table = $('#tabela').DataTable();
					var table_2 = $('#tabela_2').DataTable();
					var table_3 = $('#tabela_3').DataTable();
					 
					// Event listener to the two range filtering inputs to redraw on input
					$('#min, #max').keyup( function() {
						table.draw();
						table_2.draw();
						table_3.draw();
					} );
					
					$('#min_data, #max_data').keyup( function() {
						table.draw();
						table_2.draw();
						table_3.draw();
					} );
					
					
					$("#min_data, #max_data").on("change", function(){
						table.draw();
						table_2.draw();
						table_3.draw();
					});
					
				} );
				
		
	</script>
	
		</body>
		</html>