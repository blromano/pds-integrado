<!DOCTYPE html>
<?php
	include '../../MVC/controle/EstabelecimentosDAO.php';
	$dao = new EstabelecimentosDAO();
	$registro = $dao->pesquisarPorId('32');
	
	//Criar a conexão
			include_once("../../MVC/visao/Produtos/conexao.php");
			$result_produtos = "SELECT * FROM produtos";
			$resultado_produtos = mysqli_query($conn, $result_produtos);
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
			
			<title>Modal</title>
				<link href="../../css/bootstrap.min.css" rel="stylesheet">
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
					<li class="scroll active"><a href="#contact">PERFIL</a></li>
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
									<li><a href="mod03-perfil.html">Visualizar Perfil</a></li>
									<li><a href="mod03-perfil.html">Editar Perfil</a></li>
								</ul>
								
								
								<li data-toggle="collapse" data-target="#service2" class="collapsed">
									<a href="#"><i class="fa fa-caret-down fa-lg"></i> Reclamações <i class="fa fa-file-text fa-lg btn pull-right"></i></a>
								</li>
								<ul class="sub-menu collapse" id="service2">
									<li><a href="mod03-gerenciar-reclamacao-atendida.html">Reclamações Atendidas</a></li>
									<li><a href="mod03-gerenciar-reclamacao-nao-atendida.html">Reclamações Não Atendidas</a></li>
								</ul>

								<li data-toggle="collapse" data-target="#new" class="collapsed">
									<a href="../../index.html"><i class="fa fa-caret-down fa-lg"></i> Sair <i class="fa fa-file-text fa-lg btn pull-right"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</aside>
			<!-- FIM DA NAV SIDEBAR -->

		<!-- CORPO DA PAGINA DE PERFIL -->
		<section id="contact" style="margin-top: 10%;">
			<div id="contact-us" class="parallax">
			  <div class="container">
					<div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
						<div class="container">
										  <div class="row">
											  <div class="panel panel-info">
												
											<!-- INFORMAÇÕES PESSOAS DA EMPRESA -->
												<div class="panel-heading">
												  <h3 class="panel-title">Informações pessoais da empresa</h3>
												</div>
												<div class="panel-body">
												  <div class="row">
													<div class="col-md-3 col-lg-2 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>
														<div class=" col-md-9 col-lg-9 ">   
													  <table class="table table-user-information">
														<tbody>
														<?php foreach($registro as $linha) { ?>
														  <tr>
															<td>Nome da Empresa:</td>
															<td><?php echo $linha['EST_NOME_EMPRESA'];?></td>
														  </tr>  
														  <tr>
															<td>Nome do Responsável:</td>
															<td><?php echo $linha['EST_NOME_RESPONSAVEL'];?></td>
														  </tr>
														  <tr>
															<td>CNPJ</td>
															<td><?php echo $linha['EST_CNPJ'];?></td>
														  </tr>
														  <tr>
															<td>Site da Empresa:</td>
															<td><a href="<?php echo $linha['EST_SITE_EMPRESA'];?>"><?php echo $linha['EST_SITE_EMPRESA'];?></a></td>
														  </tr>
														  <tr>
															<td>Email</td>
															<td><a href="<?php echo $linha['EST_EMAIL'];?>"><?php echo $linha['EST_EMAIL'];?></a></td>
														  </tr>
														<?php } ?>  
														</tbody>	
													  </table>
													  
													</div>
												  </div>
												</div>
											<!-- FIM DE INFORMAÇÕES PESSOAS DA EMPRESA -->
											
											<!-- INFORMAÇÕES SOBRE O ENDEREÇO -->	
												<div class="panel-heading">
												  <h3 class="panel-title">Endereço</h3>
												</div>
												<div class="panel-body">
												  <div class="row">
													<div class=" col-md-9 col-lg-9 "> 
													  <table class="table table-user-information">
														<tbody>
														<?php foreach($registro as $linha) { ?>
														  <tr>
															<td>Rua:</td>
															<td><?php echo $linha['EST_RUA'];?></td>
														  </tr>
														  <tr>
															<td>Bairro:</td>
															<td><?php echo $linha['EST_BAIRRO'];?></td>
														  </tr>
														  <tr>
															<td>Número:</td>
															<td><?php echo $linha['EST_NUMERO'];?></td>
														  </tr>
													   
														  <tr>
															<td>Complemento:</td>
															<td><?php echo $linha['EST_COMPLEMENTO'];?></td>
														  </tr>
														  
														  <tr>
															<td>CEP:</td>
															<td><?php echo $linha['EST_CEP'];?></td>
														  </tr>
														</tbody>
													  </table>
													  
													  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ENDERECO_EMPRESA" data-whateveridendereco="<?php echo $linha['EST_ID']; ?>" data-whateverrua="<?php echo $linha['EST_RUA']; ?>"  data-whateverbairro="<?php echo $linha['EST_BAIRRO']; ?>" data-whatevernumero="<?php echo $linha['EST_NUMERO']; ?>" data-whatevercomplemento="<?php echo $linha['EST_COMPLEMENTO']; ?>" data-whatevercep="<?php echo $linha['EST_CEP']; ?>" >Atualizar Informações</button>
													  <?php } ?>
													  </div>
												  </div>
												</div>
											<!-- FIM DE INFORMAÇÕES SOBRE O ENDEREÇO -->
												
											<!-- SOBRE A EMPRESA -->
												<div class="panel-heading">
												  <h3 class="panel-title">Sobre a empresa</h3>
												</div>
												<div class="panel-body">
												  <div class="row">
													
													
													<div class=" col-md-9 col-lg-9 "> 
													  <table class="table table-user-information">
														<tbody>
														<?php foreach($registro as $linha) { ?>
														  <tr>
															<td>Público Alvo da Empresa:</td>
															<td><?php echo $linha['EST_PUBLICO_ALVO'];?></td>
														  </tr>
														  <tr>
															<td>Visão Geral da Empresa:</td>
															<td><?php echo $linha['EST_VISAO_GERAL_EMPRESA'];?></td>
														  </tr>  
														</tbody>
													  </table>
													  
													  
													  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#INFORMACOES_EMPRESA" data-whateverid="<?php echo $linha['EST_ID']; ?>" data-whateverpublico="<?php echo $linha['EST_PUBLICO_ALVO']; ?>"  data-whatevervisao="<?php echo $linha['EST_VISAO_GERAL_EMPRESA']; ?>">Atualizar Informações</button>
													  <?php } ?>
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
																		
																		
																
																		<div class="col-sm-20" style="padding-left: 15px; padding-right: 37px;">
																			<div class="form-group">	
																			<div class="row">
																				<div class="col-md-15">
																					<table class="table">
																						<thead>
																							<tr>
																								<th>Numeração</th>
																								<th>Nome do Produto</th>
																								<th>Procedimentos</th>
																								<th><button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalcad">Adicionar</button></th>
																							</tr>
																						</thead>
																						<tbody>
																							<?php while($rows_produtos = mysqli_fetch_assoc($resultado_produtos)){ ?>
																								<tr>
																									<td><?php echo $rows_produtos['PRO_ID']; ?></td>
																									<td><?php echo $rows_produtos['PRO_NOME_PRODUTO']; ?></td>
																									<td>
																										<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#VISUALIZAR_PRODUTO" data-whatever="<?php echo $rows_produtos['PRO_ID']; ?>" data-whatevervisualizarproduto="<?php echo $rows_produtos['PRO_NOME_PRODUTO']; ?>" data-whatevervisualizardescricao="<?php echo $rows_produtos['PRO_DESCRICAO_PRODUTO']; ?>" data-whatevervisualizartipo="<?php echo $rows_produtos['IPO_ID']; ?>">Visualizar</button>
																										
																										<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#ALTERAR_PRODUTO" data-whatever="<?php echo $rows_produtos['PRO_ID']; ?>" data-whatevernome="<?php echo $rows_produtos['PRO_NOME_PRODUTO']; ?>"  data-whateverdetalhes="<?php echo $rows_produtos['PRO_DESCRICAO_PRODUTO']; ?>" data-whatevertipo="<?php echo $rows_produtos['IPO_ID']; ?>">Editar</button>
																										
																										<a href="http://localhost/RECLAME%20SAO%20JOAO/MVC/visao/Produtos/Gerenciar_Produtos/excluirProduto.php?id=<?php echo $rows_produtos['PRO_ID']; ?>"><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>
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
								<form method="POST" action="http://localhost/RECLAME%20SAO%20JOAO/MVC/visao/Produtos/Gerenciar_Produtos/cadastrarProduto.php" enctype="multipart/form-data">
									<div class="form-group">
										<label for="recipient-name" class="control-label">Nome do produto:</label>
										<input name="PRO_NOME_PRODUTO" type="text" class="form-control" required="required" maxlength="100">
									</div>
																							
									<div class="form-group">
										<label for="message-text" class="control-label">Descrição:</label>
											<textarea name="PRO_DESCRICAO_PRODUTO" class="form-control" required="required" maxlength="300"></textarea>
									</div>
																							
									<div class="form-group">
										<label for="recipient-name" class="control-label">Tipo do produto:</label><br/>
												<input type="radio" name="IPO_ID" value="1" checked /> Alimentício<br/>
												<input type="radio" name="IPO_ID" value="2"/> Cosmético<br/>
												<input type="radio" name="IPO_ID" value="3"/> Vestimento<br/>
									</div>
									
									<input name="EST_ID" type="hidden" value="32">
														
									<div class="modal-footer">
										<button type="submit" class="btn btn-success">Cadastrar</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- FIM MODAL CADASTRAR PRODUTO -->
				
				<!-- INÍCIO MODAL - ALTERAR ENDEREÇO DA EMPRESA -->
				<div class="modal fade" id="ENDERECO_EMPRESA" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title text-center" id="exampleModalLabel"> Endereço da Empresa</h4>
							</div>
							<div class="modal-body">
								<form method="POST" action="http://localhost/RECLAME%20SAO%20JOAO/MVC/visao/Estabelecimentos/editarEnderecoEstabelecimentos.php" enctype="multipart/form-data">
									
									<div class="form-group">
										<label for="cep-name" class="control-label">CEP:</label>
										<input name="EST_CEP" type="text" class="form-control" id="cep-text" required="required" maxlength="10">
									</div>
									
									<div class="form-group">
										<label for="rua-text" class="control-label">Rua:</label>
										<input name="EST_RUA" type="text" class="form-control" id="rua-text" required="required" maxlength="300">
									</div>
									
									<div class="form-group">
										<label for="bairro-text" class="control-label">Bairro:</label>
										<input name="EST_BAIRRO" type="text" class="form-control" id="bairro-text" required="required" maxlength="300">
									</div>
									
									<div class="form-group">
										<label for="numero-text" class="control-label">Numero:</label>
										<input name="EST_NUMERO" type="text" class="form-control" id="numero-text" required="required" maxlength="10">
									</div>
									
									<div class="form-group">
										<label for="complemento-text" class="control-label">Complemento:</label>
										<input name="EST_COMPLEMENTO" type="text" class="form-control" id="complemento-text" required="required" maxlength="300">
									</div>	
									
									<input name="EST_ID" type="hidden" id="id_endereco">
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
								<form method="POST" action="http://localhost/RECLAME%20SAO%20JOAO/MVC/visao/Estabelecimentos/editarEstabelecimentos.php" enctype="multipart/form-data">
									
									<div class="form-group">
										<label for="publico-alvo-text" class="control-label">Público alvo:</label>
										<textarea name="EST_PUBLICO_ALVO" class="form-control" id="publico-alvo-text" required="required" maxlength="100" oninvalid="setCustomValidity('Campo obrigatório, por favor, não deixe em branco.')" onchange="try{setCustomValidity('')}catch(e){}"></textarea>
									</div>
									
									<div class="form-group">
										<label for="visao-geral-text" class="control-label">Visão geral da empresa:</label>
										<textarea name="EST_VISAO_GERAL_EMPRESA" class="form-control" id="visao-geral-text" required="required" maxlength="300" oninvalid="setCustomValidity('Campo obrigatório, por favor, não deixe em branco.')" onchange="try{setCustomValidity('')}catch(e){}"></textarea>
									</div>
									
									<input name="EST_ID" type="hidden" id="outro">
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
								<form method="POST" action="http://localhost/RECLAME%20SAO%20JOAO/MVC/visao/Produtos/Gerenciar_Produtos/editarProduto.php" enctype="multipart/form-data">
									<div class="form-group">
										<label for="recipient-name" class="control-label">Nome do Produto:</label>
										<input name="PRO_NOME_PRODUTO" type="text" class="form-control" id="recipient-name" required="required" maxlength="100">
									</div>
									<div class="form-group">
										<label for="message-text" class="control-label">Descrição do Produto:</label>
										<textarea name="PRO_DESCRICAO_PRODUTO" class="form-control" id="detalhes-text" required="required" maxlength="300"></textarea>
									</div>
									
									<div class="form-group">
										<label for="recipient-name" class="control-label">Tipo do produto:</label><br/>
												<input type="radio" name="IPO_ID" value="1" id="tipo1-text"/> Alimentício<br/>
												<input type="radio" name="IPO_ID" value="2" id="tipo2-text"/> Cosmético<br/>
												<input type="radio" name="IPO_ID" value="3" id="tipo3-text"/> Vestimento<br/>
									</div>
									
									<input name="PRO_ID" type="hidden" id="id_curso">
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
								
								<input name="PRO_ID" type="hidden" id="id_curso">
							</form>
								
							</div>
						</div>
					</div>
				<!-- FIM MODAL - VISUALIZAR PRODUTOS -->

		<!-- RODAPÉ -->
			<footer id="footer" style="background-color: #232323; margin-bottom: -10%; margin-top: 18%;" >
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
			
		<!-- FIM DO RODAPÉ --> 
	  
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="../../js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$('#ALTERAR_PRODUTO').on('show.bs.modal', function (event) 
			{
				var button = $(event.relatedTarget) // Button that triggered the modal
				var recipient = button.data('whatever') // Extract info from data-* attributes
				var recipientnome = button.data('whatevernome')
				var recipientdetalhes = button.data('whateverdetalhes')
				var recipienttipo = button.data('whatevertipo')
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				//modal.find('.modal-title').text('ID do Produto: ' + recipient)
				modal.find('#id_curso').val(recipient)
				modal.find('#recipient-name').val(recipientnome)
				modal.find('#detalhes-text').val(recipientdetalhes)
				
				if(recipienttipo == 1)
				{
					radiobtn = document.getElementById("tipo1-text");
					radiobtn.checked = true;
				}
				else if(recipienttipo == 2)
				{
					radiobtn = document.getElementById("tipo2-text");
					radiobtn.checked = true;
				}
				else if(recipienttipo == 3)
				{
					radiobtn = document.getElementById("tipo3-text");
					radiobtn.checked = true;
				}
			})
			
			$('#INFORMACOES_EMPRESA').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) // Button that triggered the modal
				var recipientid = button.data('whateverid') // Extract info from data-* attributes
				var recipientpublico_alvo = button.data('whateverpublico')
				var recipientvisao_geral = button.data('whatevervisao')
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				modal.find('#outro').val(recipientid)
				modal.find('#publico-alvo-text').val(recipientpublico_alvo)
				modal.find('#visao-geral-text').val(recipientvisao_geral)
			})
			
			$('#ENDERECO_EMPRESA').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget)
				var recipientidendereco = button.data('whateveridendereco')
				var recipientcep = button.data('whatevercep')
				var recipientrua = button.data('whateverrua')
				var recipientbairro = button.data('whateverbairro')
				var recipientnumero = button.data('whatevernumero')
				var recipientcomplemento = button.data('whatevercomplemento')
				
				var modal = $(this)
				modal.find('#id_endereco').val(recipientidendereco)
				modal.find('#cep-text').val(recipientcep)
				modal.find('#rua-text').val(recipientrua)
				modal.find('#bairro-text').val(recipientbairro)
				modal.find('#numero-text').val(recipientnumero)
				modal.find('#complemento-text').val(recipientcomplemento)
				
				
			})
			
			$('#VISUALIZAR_PRODUTO').on('show.bs.modal', function (event) 
			{
				var button = $(event.relatedTarget)
				
				var recipientnum = button.data('whatever')
				var recipientvisualizarproduto = button.data('whatevervisualizarproduto')
				var recipientvisualizardescricao = button.data('whatevervisualizardescricao')
				var recipientvisualizartipo = button.data('whatevervisualizartipo')
				
				
				var modal = $(this)
				modal.find('#recipient-nome-produto').val(recipientvisualizarproduto)
				modal.find('#recipient-descricao-produto').val(recipientvisualizardescricao)
				modal.find('#recipientnumero').val(recipientnum)
				
				if(recipientvisualizartipo == 1)
				{ 
					modal.find('#recipient-tipo-produto').val('Alimentício');
				}
				else if(recipientvisualizartipo == 2)
				{ 
					modal.find('#recipient-tipo-produto').val('Cosmético');
				}
				else if(recipientvisualizartipo == 3)
				{ 
					modal.find('#recipient-tipo-produto').val('Vestimento');
				}
			})
			
		</script>
		
		<!-- SCRIPT EM GERAL -->
			<script type="text/javascript" src="../../js/jquery.js"></script>
			<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
			<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
			<script type="text/javascript" src="../../js/jquery.inview.min.js"></script>
			<script type="text/javascript" src="../../js/wow.min.js"></script>
			<script type="text/javascript" src="../../js/mousescroll.js"></script>
			<script type="text/javascript" src="../../js/smoothscroll.js"></script>
			<script type="text/javascript" src="../../js/jquery.countTo.js"></script>
			<script type="text/javascript" src="../../js/main.js"></script>
		<!--FIM DO SCRIPT EM GERAL -->
	  
	</body>
</html>