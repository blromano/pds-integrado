

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
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/animate.min.css" rel="stylesheet"> 
		<link href="css/font-awesome.min.css" rel="stylesheet">

		<link href="css/menu.css" rel="stylesheet">
		<link href="css/estabelecimento.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">

		<link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
		<link rel="shortcut icon" href="images/favicon.ico">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
		

    <!-- Customizacao -->
        <link rel="stylesheet" href="css/mod05/estilo.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="js/mod05/dataTable.js"></script> <!-- DataTable -->
		<link href="css/mod03/menu_do_site.css" rel="stylesheet">

		

</head>

<body>

	<!-- INÍCIO - CORPO DA PÁGINA -->
	<div class="container">		
		<div class="row">
		
			<!-- INÍCIO - NÚMERO DE RECLAMAÇÕES -->
			<div class="col-sm-12">

				<div class="col-sm-4" id="selecionar-todas-reclamacoes">
					<div class="panel panel-default" style="border-left: thick double  #3194DA;">
						<div class="panel-body">
							<div class="pull-left"><span class="fa fa-fire" aria-hidden="true"></span> Reclamações</div>
							<div class="pull-right"><?php echo $solucionadas+$naoSolucionadas ?></div>
						</div>
					</div>
				</div>

				<div class="col-sm-4" id="selecionar-reclamacoes-atendidas">
					<div class="panel panel-default" style="border-left: thick double #00ff00;">
						<div class="panel-body">
							<div class="pull-left"><span class="fa fa-users" aria-hidden="true"></span> Atendidas</div>
							<div class="pull-right"><?php echo $solucionadas ?></div>
						</div>
					</div>
				</div>


				<div class="col-sm-4" id="selecionar-reclamacoes-nao-atendidas">
					<div class="panel panel-default" style="border-left: thick double #ff0000;">
						<div class="panel-body">
							<div class="pull-left"><span class="fa fa-envelope" aria-hidden="true"></span> Não Atendidas</div>
							<div class="pull-right"><?php echo $naoSolucionadas ?></div>
						</div>
					</div>
				</div>
			</div>
			<!-- FIM - NÚMERO DE RECLAMAÇÕES -->
		</div>
	
	
<!-- INICIO - RECLAMAÇÕES ATENDIDAS -->	
		<div class="row" id="reclamacoes-atendidas" style="display:none">
		<?php foreach($registro_reclamacoes_atendidas as $linha_reclamacoes_atendidas) 
			{	
		?>
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="fa fa-list" aria-hidden="true"></span> #<?php echo $contador_solucionadas++;?> Reclamação</div>
						<div class="panel-body">		
							<div class="col-sm-12">	
								<br/>
								<br/>
									<div class="panel panel-default" style="border-left: thick double #00ff00;">
										<div class="panel-body">
											<!-- INÍCIO - PONTUAÇÃO POR ESTRELAS -->
												<div class="col-sm-3">
													<div class="estrelas">
														<input type="radio" id="cm_star-empty" name="fb" value="" checked/>
														<label for="cm_star-1"><i class="fa"></i></label>

														<input type="radio" id="cm_star-empty" name="fb" value="1"/>
														<label for="cm_star-1"><i class="fa"></i></label>

														<input type="radio" id="cm_star-1" name="fb" value="2"/>
														<label for="cm_star-2"><i class="fa"></i></label>

														<input type="radio" id="cm_star-2" name="fb" value="3"/>
														<label for="cm_star-3"><i class="fa"></i></label>

														<input type="radio" id="cm_star-4" name="fb" value="4"/>
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
														<a href="est_agendar-reuniao.php" class="agendar-reuniao">Agendar Reunião </a>
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
						
										<!--     NOME DO USUÁRIO      -->
											<div class="pull-left" style="text-align=Justify; line-height: 2.5;"><span class="fa fa-user" aria-hidden="true"> Reclamação do Consumidor, <?php foreach ($registro_todos_usuarios as $linha_todos_usuarios) { if ($linha_todos_usuarios['USU_ID']==$usuId) {	echo ucfirst($linha_todos_usuarios['USU_NOME']); } }?> </span> </div>

										<?php
												$splitTimeStamp = explode(" ",$linha_reclamacoes_atendidas['REC_DATA_HORA']);
												//Data da Reclamação
													$data_reclamacao = date('d-m-Y',strtotime($splitTimeStamp[0]));
												//Hora da Reclamação
													$hora_reclamacao = $splitTimeStamp[1];
											?>
											
										<!--    DATA E HORA DA RECLAMAÇÃO      -->
											<div class="pull-right" style="text-align=Justify; line-height: 2.5;"><span class="fa fa-calendar" aria-hidden="true"> <?php echo $data_reclamacao; ?> às  <?php echo $hora_reclamacao; ?></span></div><br/>
										
										<!--     RECLAMAÇÃO DO USUÁRIO      -->
											<br/> <div class="pull-left" style="text-align=Justify; line-height: 2.5;"> <?php echo $linha_reclamacoes_atendidas['REC_DESCRICAO']; ?></div>
										
										<!--     LOCALIZAÇÃO DO USUÁRIO      -->
											<div class="pull-right" style="text-align=Justify; line-height: 2.5;"><span class="fa fa-globe" aria-hidden="true"> São João da Boa Vista</span></div><br/>
									</div>
								</div>
								
								<div class="panel panel-default" style="border-right: thick double #00ff00;">
									<div class="panel-body">
										<!--     NOME DO USUÁRIO      -->
											<div class="pull-left"  style="text-align=Justify; line-height: 2.5;"><span class="fa fa-user" aria-hidden="true"> Resposta da Empresa, <?php echo $_SESSION['EST_NOME_FANTASIA']; ?> </span></div>
										
											<?php
												$splitTimeStamp = explode(" ",$linha_reclamacoes_atendidas['RER_DATA_HORA']);
												//Data da Reclamação
													$data_resposta_reclamacao = date('d-m-Y',strtotime($splitTimeStamp[0]));
												//Hora da Reclamação
													$hora_resposta_reclamacao = $splitTimeStamp[1];
											?>
											
										<!--    DATA E HORA DA RECLAMAÇÃO      -->										
											<div class="pull-right" style="text-align=Justify; line-height: 2.5;"><span class="fa fa-calendar" aria-hidden="true"> <?php echo $data_resposta_reclamacao; ?> às  <?php echo $hora_resposta_reclamacao; ?></span></div><br/>
										
										<!--     RESPOSTA DO ESTABELECIMENTO      -->
											<br/> <div class="pull-RIGHT" style="text-align=Justify; line-height: 2.5;"> <?php echo $linha_reclamacoes_atendidas['RER_DESCRICAO']; ?></div>
											
										<!--     LOCALIZAÇÃO DO ESTABELECIMENTO      -->
											<div class="pull-right" style="text-align=Justify; line-height: 2.5;"><span class="fa fa-globe" aria-hidden="true"> São João da Boa Vista</span></div><br/>
									</div>
								</div>
							</div>
						
							<div class="panel-group" id="accordion">	
								<div class="panel panel-default">
									<div class="panel-heading">
										<ul class="nav nav-tabs nav-justified">
											<li >
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
														<textarea class="form-control col-md-8" style="margin-left: 0px;width: 100%;" name="RER_DESCRICAO" id="RER_DESCRICAO" rows="7"> <?php echo $linha_reclamacoes_atendidas['RER_DESCRICAO']; ?> </textarea>
														<input type="hidden" value="<?php echo $linha_reclamacoes_atendidas['RER_ID']; ?>" name="REC_ID" id="REC_ID">
														<input type="hidden" value="<?php echo $linha_reclamacoes_atendidas['ADM_ID']; ?>" name="ADM_ID" id="ADM_ID">
													
													</div>
													
													<div class="form-group">	
														<div class="col-md-12">
															
																<!-- REDIRECIONAR PARA A PÁGINA: CADASTRAR RESPOSTA -->
																		<button type="submit" class="btn btn-primary btn-block" dtype="submit">Atualizar Reclamação</button>	
														</div>
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
		<?php } ?>
		</div>
	<!-- FIM - RECLAMAÇÕES ATENDIDAS -->

	</div>
<!-- FIM - CORPO DA PÁGINA -->				


			<!-- SCRIPT EM GERAL -->
			<script type="text/javascript" src="js/jquery.js"></script>
			<script type="text/javascript" src="js/bootstrap.min.js"></script>
			<script type="text/javascript" src="js/jquery.inview.min.js"></script>
			<script type="text/javascript" src="js/wow.min.js"></script>
			<script type="text/javascript" src="js/mousescroll.js"></script>
			<script type="text/javascript" src="js/smoothscroll.js"></script>
			<script type="text/javascript" src="js/jquery.countTo.js"></script>
			<script type="text/javascript" src="js/main.js"></script>
			<script type="text/javascript" src="js/mod03/gerenciar-reclamacoes.js"></script>
			<script type="text/javascript" src="js/mod03/excluir-resposta.js"></script>
			<!--FIM DO SCRIPT EM GERAL -->
	
		</body>
		</html>