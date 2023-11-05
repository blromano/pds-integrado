<!DOCTYPE html>
<?php
	//Criar conexão com a tabela Reclamação
		include '../../MVC/controle/ReclamacoesDAO.php';
		$RECLAMACOESdao = new ReclamacoesDAO();
		$registro = $RECLAMACOESdao->pesquisarPorId('1');
	
	//Criar conexão com a tabela Usuários
		include '../../MVC/controle/UsuarioDAO.php';
		$USUARIOdao = new UsuarioDAO();
		$registro_usuario = $USUARIOdao->pesquisarPorId('1');
		
	//Criar conexão com a tabela Resposta da Reclamação
	    include '../../MVC/controle/RespostaReclamacaoDAO.php';
	    $RESPOSTARECLAMACAOdao = new RespostaReclamacaoDAO();
		$registro_respostas = $RESPOSTARECLAMACAOdao->pesquisarPorId('1');	
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
			
		<!-- SIDEBAR -->
			<link href="../../css/sidebar.css" rel="stylesheet">
		
		<!-- OUTROS -->
			<link href="../../css/bootstrap.min.css" rel="stylesheet">
			<link href="../../css/animate.min.css" rel="stylesheet"> 
			<link href="../../css/font-awesome.min.css" rel="stylesheet">
		
			<link href="../../css/main.css" rel="stylesheet">
			<link href="../../css/testes.css" rel="stylesheet">
			<link href="../../css/login.css" rel="stylesheet">
			<link href="../../css/estabelecimento.css" rel="stylesheet">
			<link href="../../css/responsive.css" rel="stylesheet">
			
			<link id="css-preset" href="../../css/presets/preset1.css" rel="stylesheet">
			<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
			<link rel="shortcut icon" href="../../images/favicon.ico">
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
				  <a class="navbar-brand" href="../../index.html">
					<h1><img class="img-responsive" src="../../images/logo.png" alt="logo"></h1>
				  </a>                    
				</div>
			
				<!-- MENU DO SITE - OPÇÕES-->
				<div class="collapse navbar-collapse">
				  <ul class="nav navbar-nav navbar-right">   
					<li class="scroll active"><a href="#contact">Reclamações</a></li>
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
									<a href="#"><i class="fa fa-caret-down fa-lg"></i> Meu Perfil <i class="glyphicon glyphicon-user" style="margin-top:5px; margin-right:4px;"></i></a>
								</li>
								<ul class="sub-menu collapse" id="service">
									<li><a href="mod03-perfil.php">Visualizar Perfil</a></li>
									<li><a href="mod03-perfil.php">Editar Perfil</a></li>
								</ul>
								
								
								<li data-toggle="collapse" data-target="#service2" class="collapsed">
									<a href="#"><i class="fa fa-caret-down fa-lg"></i> Reclamações <i class="fa fa-file-text fa-lg btn pull-right" style="margin-top:5px; margin-right:4px;"></i></a>
								</li>
								<ul class="sub-menu collapse" id="service2">
									<li><a href="mod03-gerenciar-reclamacao-atendida.php">Reclamações Atendidas</a></li>
									<li><a href="mod03-gerenciar-reclamacao-nao-atendida.php">Reclamações Não Atendidas</a></li>
								</ul>

								<li data-toggle="collapse" data-target="#new" class="collapsed">
									<a href="../../index.html"><i class="fa fa-caret-down fa-lg"></i> Sair <i class="fa fa-file-text fa-lg btn pull-right" style="margin-top:5px; margin-right:2px;"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</aside>
			<!-- FIM DA NAV SIDEBAR -->

	  
		<!-- CORPO DA PAGINA DE RECLAMAÇÕES -->
		<section id="contact" style="margin-top: 3%;">
			
			<!-- NÚMERO DE RECLAMAÇÕES -->

			  <div class="tudoquadro2quadro3">
				<div class="quadro4">
					<div class="quadrointerno01">
						<!-- RECLAMAÇÕES -->
							<div class="quadrointerno2">
								<p class="preclame">523</p>
								<p class="preclame2"><a href="mod03-gerenciar-todas-as-reclamacoes.php" style="a:active {color: red}">Reclamações</a></p>
							</div>
						
						<!-- NÚMERO DE RECLAMAÇÕES ATENDIDAS -->
							<div class="quadrointerno2">
								<p class="preclame">520</p>
								<p class="preclame2"><a href="mod03-gerenciar-reclamacao-atendida.php" style="a:active {color: red}">Atendidas</a></p>
							</div>
						
						<!-- NÚMERO DE RECLAMAÇÕES NÃO ATENDIDAS -->
							<div class="quadrointerno2">
								<p class="preclame">3</p>
								<p class="preclame2"><a href="#" style="color: red}">Não Atendidas</a></p>
							</div>
					</div>
				</div>
			  </div>

				
					
			<div class="forma">
				<!-- INÍCIO DO COMENTÁRIO 1 -->
					<div class="container" style="margin-top: 2.5%;">
							<div>
								<!-- TÍTULO DO COMENTÁRIO -->
								<?php foreach($registro as $linha) { ?>
								<h2 class="comentario"><?php echo $linha['REC_TITULO_RECLAMACAO'];?></h2>
								<?php } ?>
							</div>
								<!-- NOME DO USUÁRIO -->
								<?php foreach($registro_usuario as $linha_usuario) { ?>
								<p class="nome_do_usuario"><?php echo $linha_usuario['USU_NOME'];?></p>
								<?php } ?>
								
								<!-- PONTUAÇÃO POR ESTRELAS -->
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
							
								<!-- ÍCONES -->
									<img class="pin-maps" src="../../images\icons\localizacao.png" style="margin-left: 2%;" height="20" width="15"> São João da Boa Vista
									<?php foreach($registro as $linha) { ?>
									<img class="pin-maps" src="../../images\icons\calendario.png" height="20" width="15"> <?php echo $linha['REC_DATA_HORA'];?>
									<?php } ?>
								<!-- REDIRECIONAR PARA A PÁGINA: AGENDAR REUNIÃO -->
									<a href="mod03-agendar-reuniao.php" class="agendar-reuniao" style="margin-left:1%;">Agendar Reunião</a>
						
								<!-- OPÇÕES DE BOTÃO -->
									<div class="container">
										<!-- RESPOSTA DO USUÁRIO -->
											<?php foreach($registro as $linha) { ?>
											<textarea class="textarea5" style="margin-top: 0.5%; margin-left:1.8%; color: black;" disabled><?php echo $linha['REC_DESCRICAO'];?></textarea>
											<?php } ?>
											
										<!-- REDIRECIONAR PARA A PÁGINA: DENUNCIAR CLIENTE -->
											<div class="quadro6" style="margin-top: 3%;">
												<a href="mod03-denunciar-cliente.php"><button type="submit"  class="enviarreclame">Denunciar Cliente</button></a>
											</div>
										
										<!-- ABRIR UM POP-UP PARA RESPONDER O COMENTÁRIO DO USUÁRIO -->
											<div class="quadro6" style="margin-top: -8%;">
												<button type="button" class="enviarreclame2" data-toggle="modal" data-target="#myModalcad">Responder</button>
											</div>
										
									</div>
						</div>
				<!-- FIM DO COMENTÁRIO 1 -->
				
				<!-- INÍCIO DO COMENTÁRIO 2 -->
				<div class="container" style="margin-top: 2.5%;">
							<div>
								<!-- TÍTULO DO COMENTÁRIO -->
								<?php foreach($registro as $linha) { ?>
								<h2 class="comentario"><?php echo $linha['REC_TITULO_RECLAMACAO'];?></h2>
								<?php } ?>
							</div>
								<!-- NOME DO USUÁRIO -->
								<?php foreach($registro_usuario as $linha_usuario) { ?>
								<p class="nome_do_usuario"><?php echo $linha_usuario['USU_NOME'];?></p>
								<?php } ?>
								
								<!-- PONTUAÇÃO POR ESTRELAS -->
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
							
								<!-- ÍCONES -->
									<img class="pin-maps" src="../../images\icons\localizacao.png" style="margin-left: 2%;" height="20" width="15"> São João da Boa Vista
									<?php foreach($registro as $linha) { ?>
									<img class="pin-maps" src="../../images\icons\calendario.png" height="20" width="15"> <?php echo $linha['REC_DATA_HORA'];?>
									<?php } ?>
								<!-- REDIRECIONAR PARA A PÁGINA: AGENDAR REUNIÃO -->
									<a href="mod03-agendar-reuniao.php" class="agendar-reuniao" style="margin-left:1%;">Agendar Reunião</a>
						
								<!-- OPÇÕES DE BOTÃO -->
									<div class="container">
										<!-- RESPOSTA DO USUÁRIO -->
											<?php foreach($registro as $linha) { ?>
											<textarea class="textarea5" style="margin-top: 0.5%; margin-left:1.8%; color: black;" disabled><?php echo $linha['REC_DESCRICAO'];?></textarea>
											<?php } ?>
											
										<!-- REDIRECIONAR PARA A PÁGINA: DENUNCIAR CLIENTE -->
											<div class="quadro6" style="margin-top: 3%;">
												<a href="mod03-denunciar-cliente.php"><button type="submit"  class="enviarreclame">Denunciar Cliente</button></a>
											</div>
										
										<!-- ABRIR UM POP-UP PARA RESPONDER O COMENTÁRIO DO USUÁRIO -->
											<div class="quadro6" style="margin-top: -8%;">
												<button type="button" class="enviarreclame2" data-toggle="modal" data-target="#myModalcad">Responder</button>
											</div>
										
									</div>
						</div>
				<!-- FIM DO COMENTÁRIO 2 -->
				
				<!-- INÍCIO DO COMENTÁRIO 3 -->
				<div class="container" style="margin-top: 2.5%;">
							<div>
								<!-- TÍTULO DO COMENTÁRIO -->
								<?php foreach($registro as $linha) { ?>
								<h2 class="comentario"><?php echo $linha['REC_TITULO_RECLAMACAO'];?></h2>
								<?php } ?>
							</div>
								<!-- NOME DO USUÁRIO -->
								<?php foreach($registro_usuario as $linha_usuario) { ?>
								<p class="nome_do_usuario"><?php echo $linha_usuario['USU_NOME'];?></p>
								<?php } ?>
								
								<!-- PONTUAÇÃO POR ESTRELAS -->
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
							
								<!-- ÍCONES -->
									<img class="pin-maps" src="../../images\icons\localizacao.png" style="margin-left: 2%;" height="20" width="15"> São João da Boa Vista
									<?php foreach($registro as $linha) { ?>
									<img class="pin-maps" src="../../images\icons\calendario.png" height="20" width="15"> <?php echo $linha['REC_DATA_HORA'];?>
									<?php } ?>
								<!-- REDIRECIONAR PARA A PÁGINA: AGENDAR REUNIÃO -->
									<a href="mod03-agendar-reuniao.php" class="agendar-reuniao" style="margin-left:1%;">Agendar Reunião</a>
						
								<!-- OPÇÕES DE BOTÃO -->
									<div class="container">
										<!-- RESPOSTA DO USUÁRIO -->
											<?php foreach($registro as $linha) { ?>
											<textarea class="textarea5" style="margin-top: 0.5%; margin-left:1.8%; color: black;" disabled><?php echo $linha['REC_DESCRICAO'];?></textarea>
											<?php } ?>
											
										<!-- REDIRECIONAR PARA A PÁGINA: DENUNCIAR CLIENTE -->
											<div class="quadro6" style="margin-top: 3%;">
												<a href="mod03-denunciar-cliente.php"><button type="submit"  class="enviarreclame">Denunciar Cliente</button></a>
											</div>
										
										<!-- ABRIR UM POP-UP PARA RESPONDER O COMENTÁRIO DO USUÁRIO -->
											<div class="quadro6" style="margin-top: -8%;">
												<button type="button" class="enviarreclame2" data-toggle="modal" data-target="#myModalcad">Responder</button>
											</div>
										
									</div>
						</div>
				<!-- FIM DO COMENTÁRIO 3 -->
				
				<!-- INÍCIO DO COMENTÁRIO 4 -->
					<div class="container" style="margin-top: 2.5%;">
							<div>
								<!-- TÍTULO DO COMENTÁRIO -->
								<?php foreach($registro as $linha) { ?>
								<h2 class="comentario"><?php echo $linha['REC_TITULO_RECLAMACAO'];?></h2>
								<?php } ?>
							</div>
								<!-- NOME DO USUÁRIO -->
								<?php foreach($registro_usuario as $linha_usuario) { ?>
								<p class="nome_do_usuario"><?php echo $linha_usuario['USU_NOME'];?></p>
								<?php } ?>
								
								<!-- PONTUAÇÃO POR ESTRELAS -->
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
							
								<!-- ÍCONES -->
									<img class="pin-maps" src="../../images\icons\localizacao.png" style="margin-left: 2%;" height="20" width="15"> São João da Boa Vista
									<?php foreach($registro as $linha) { ?>
									<img class="pin-maps" src="../../images\icons\calendario.png" height="20" width="15"> <?php echo $linha['REC_DATA_HORA'];?>
									<?php } ?>
								<!-- REDIRECIONAR PARA A PÁGINA: AGENDAR REUNIÃO -->
									<a href="mod03-agendar-reuniao.php" class="agendar-reuniao" style="margin-left:1%;">Agendar Reunião</a>
						
								<!-- OPÇÕES DE BOTÃO -->
									<div class="container">
										<!-- RESPOSTA DO USUÁRIO -->
											<?php foreach($registro as $linha) { ?>
											<textarea class="textarea5" style="margin-top: 0.5%; margin-left:1.8%; color: black;" disabled><?php echo $linha['REC_DESCRICAO'];?></textarea>
											<?php } ?>
											
										<!-- REDIRECIONAR PARA A PÁGINA: DENUNCIAR CLIENTE -->
											<div class="quadro6" style="margin-top: 3%;">
												<a href="mod03-denunciar-cliente.php"><button type="submit"  class="enviarreclame">Denunciar Cliente</button></a>
											</div>
										
										<!-- ABRIR UM POP-UP PARA RESPONDER O COMENTÁRIO DO USUÁRIO -->
											<div class="quadro6" style="margin-top: -8%;">
												<button type="button" class="enviarreclame2" data-toggle="modal" data-target="#myModalcad">Responder</button>
											</div>
										
									</div>
						</div>
				<!-- FIM DO COMENTÁRIO 4 -->
				
				<!-- INÍCIO DO COMENTÁRIO 5 -->
					<div class="container" style="margin-top: 2.5%;">
							<div>
								<!-- TÍTULO DO COMENTÁRIO -->
								<?php foreach($registro as $linha) { ?>
								<h2 class="comentario"><?php echo $linha['REC_TITULO_RECLAMACAO'];?></h2>
								<?php } ?>
							</div>
								<!-- NOME DO USUÁRIO -->
								<?php foreach($registro_usuario as $linha_usuario) { ?>
								<p class="nome_do_usuario"><?php echo $linha_usuario['USU_NOME'];?></p>
								<?php } ?>
								
								<!-- PONTUAÇÃO POR ESTRELAS -->
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
							
								<!-- ÍCONES -->
									<img class="pin-maps" src="../../images\icons\localizacao.png" style="margin-left: 2%;" height="20" width="15"> São João da Boa Vista
									<?php foreach($registro as $linha) { ?>
									<img class="pin-maps" src="../../images\icons\calendario.png" height="20" width="15"> <?php echo $linha['REC_DATA_HORA'];?>
									<?php } ?>
								<!-- REDIRECIONAR PARA A PÁGINA: AGENDAR REUNIÃO -->
									<a href="mod03-agendar-reuniao.php" class="agendar-reuniao" style="margin-left:1%;">Agendar Reunião</a>
						
								<!-- OPÇÕES DE BOTÃO -->
									<div class="container">
										<!-- RESPOSTA DO USUÁRIO -->
											<?php foreach($registro as $linha) { ?>
											<textarea class="textarea5" style="margin-top: 0.5%; margin-left:1.8%; color: black;" disabled><?php echo $linha['REC_DESCRICAO'];?></textarea>
											<?php } ?>
											
										<!-- REDIRECIONAR PARA A PÁGINA: DENUNCIAR CLIENTE -->
											<div class="quadro6" style="margin-top: 3%;">
												<a href="mod03-denunciar-cliente.php"><button type="submit"  class="enviarreclame">Denunciar Cliente</button></a>
											</div>
										
										<!-- ABRIR UM POP-UP PARA RESPONDER O COMENTÁRIO DO USUÁRIO -->
											<div class="quadro6" style="margin-top: -8%;">
												<button type="button" class="enviarreclame2" data-toggle="modal" data-target="#myModalcad">Responder</button>
											</div>
										
									</div>
						</div>
				<!-- FIM DO COMENTÁRIO 5 -->
				
				<!-- INÍCIO DO COMENTÁRIO 6 -->
					<div class="container" style="margin-top: 2.5%;">
							<div>
								<!-- TÍTULO DO COMENTÁRIO -->
								<?php foreach($registro as $linha) { ?>
								<h2 class="comentario"><?php echo $linha['REC_TITULO_RECLAMACAO'];?></h2>
								<?php } ?>
							</div>
								<!-- NOME DO USUÁRIO -->
								<?php foreach($registro_usuario as $linha_usuario) { ?>
								<p class="nome_do_usuario"><?php echo $linha_usuario['USU_NOME'];?></p>
								<?php } ?>
								
								<!-- PONTUAÇÃO POR ESTRELAS -->
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
							
								<!-- ÍCONES -->
									<img class="pin-maps" src="../../images\icons\localizacao.png" style="margin-left: 2%;" height="20" width="15"> São João da Boa Vista
									<?php foreach($registro as $linha) { ?>
									<img class="pin-maps" src="../../images\icons\calendario.png" height="20" width="15"> <?php echo $linha['REC_DATA_HORA'];?>
									<?php } ?>
								<!-- REDIRECIONAR PARA A PÁGINA: AGENDAR REUNIÃO -->
									<a href="mod03-agendar-reuniao.php" class="agendar-reuniao" style="margin-left:1%;">Agendar Reunião</a>
						
								<!-- OPÇÕES DE BOTÃO -->
									<div class="container">
										<!-- RESPOSTA DO USUÁRIO -->
											<?php foreach($registro as $linha) { ?>
											<textarea class="textarea5" style="margin-top: 0.5%; margin-left:1.8%; color: black;" disabled><?php echo $linha['REC_DESCRICAO'];?></textarea>
											<?php } ?>
											
										<!-- REDIRECIONAR PARA A PÁGINA: DENUNCIAR CLIENTE -->
											<div class="quadro6" style="margin-top: 3%;">
												<a href="mod03-denunciar-cliente.php"><button type="submit"  class="enviarreclame">Denunciar Cliente</button></a>
											</div>
										
										<!-- ABRIR UM POP-UP PARA RESPONDER O COMENTÁRIO DO USUÁRIO -->
											<div class="quadro6" style="margin-top: -8%;">
												<button type="button" class="enviarreclame2" data-toggle="modal" data-target="#myModalcad">Responder</button>
											</div>
										
									</div>
						</div>
				<!-- FIM DO COMENTÁRIO 6 -->
			  
				<!-- PÁGINA -->
				   <ul class="pagination pull-right">
					  <li><a href="mod03-gerenciar-reclamacao-nao-atendida.php">1</a></li>
					  <li class="active"><a href="#">2</a></li>
					  <li><a href="#">3</a></li>
					  <li><a href="#">4</a></li>
					  <li><a href="#">5</a></li>
				   </ul>
				
			</div>		
		</section>


		<!-- MODAL CONFIRMAÇÃO - EXCLUIR RESPOSTA-->
			<div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Confirmação</h4>
						  </div>
						  <div class="modal-body">
							<p>Você realmente deseja excluir esta resposta ? ?</p>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-default pull-left" data-dismiss="modal">SIM</button>
							<button type="button" class="btn btn-default pull-right" data-dismiss="modal">NAO</button>
						  </div>
						</div>
			  </div>
			</div>
		
		<!-- RODAPÉ -->
			<footer id="footer" style="background-color: #232323; margin-bottom: -10%; margin-top: 6%;" >
				<div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
				<div class="container text-center">
				<div class="tudo">

					<div class="logo">
					<a href="../../index.html"><img style="margin-left: 30%; margin-top: 4%;"  class="img-responsive" src="../../images/logo.png" alt=""></a> 
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
						<h3>Sobre nós</h3>
						<p>Somos uma equipe de alunos do Instituto Federal de São Paulo - Campus São João da Boa Vista, que buscam finalizar o projeto proposto em uma das disciplinas 
						com o maior sucesso possível. <br/>
						Ao alcançar esse sucesso, estaremos proporcionando para a cidade um novo sistema que pode impulsionar o comércio justo e maior comprometimento 
						por parte dos estabelecimentos presentes na cidade.</p>
					</div>	
					</div>
					</div>
					</div>
					
						<div class="footer-bottom" style="background-color: #191919;">
						<div class="container" >
						<div class="row" >
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
			<!-- MODAL - RESPONDER RECLAMACAO-->
			  <div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title text-center" id="myModalLabel">Responder Reclamação</h4>
									</div>
									<div class="modal-body">
										<form method="POST" action="http://localhost/Template2/MVC/visao/Reclamacoes/cadastrarResposta.php" enctype="multipart/form-data">
											<div class="form-group">
												<label for="recipient-titulo" class="control-label">Título:</label>
												<input name="REC_TITULO_RECLAMACAO" id="REC_TITULO_RECLAMACAO" type="text" class="textarea4" id="recipient-titulo" style="width: 570px; height: 50px; margin-left:0%;" disabled>
											</div>
											<div class="form-group">
												<label for="descricao-text" class="control-label">Resposta:</label>
												<textarea name="RER_DESCRICAO"  id="RER_DESCRICAO" class="textarea4" id="descricao-text" style="width: 570px; margin-left:0%;" required="required" maxlength="500"></textarea>
											</div>
											
											<input name="RER_ID" type="hidden" id="id_curso">
											<input name="ADM_ID" type="hidden" id="id_curso" value="1">
											<input name="REC_ID" type="hidden" id="id_curso" value="1">
											
											<div class="modal-footer">
												<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
												<button type="submit" class="btn btn-danger">Salvar</button>
											</div>
										</form>
									</div>			  
								</div>
							</div>
						</div>
		<!-- FIM DO RODAPÉ --> 
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="../../js/bootstrap.min.js"></script>
		<script type="text/javascript">
		
		$('#VISUALIZAR_TITULO').on('show.bs.modal', function (event) 
			{
				var button = $(event.relatedTarget)
				
				var recipientnum = button.data('whatever')
				var recipienttitulo = button.data('whatevervisualizartitulo')
				
				
				var modal = $(this)
				modal.find('#recipient-titulo').val(recipientvisualizartitulo)
				modal.find('#recipientnumero').val(recipientnum)
			})
			</script>
	  
		<!-- SCRIPT EM GERAL -->
			<script type="text/javascript" src="../../js/jquery.js"></script>
			<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
			<script type="text/javascript" src="../../js/jquery.inview.min.js"></script>
			<script type="text/javascript" src="../../js/wow.min.js"></script>
			<script type="text/javascript" src="../../js/mousescroll.js"></script>
			<script type="text/javascript" src="../../js/smoothscroll.js"></script>
			<script type="text/javascript" src="../../js/jquery.countTo.js"></script>
		<!--FIM DO SCRIPT EM GERAL -->
	  
	</body>
</html>