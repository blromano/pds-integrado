<!DOCTYPE html>


<?php
include '../../MVC/controle/EstabelecimentosDAO.php';
	$dao = new EstabelecimentosDAO();
	
	session_start();
	if(isset($_POST['EST_CNPJ']))
	{
		$_SESSION['EST_CNPJ'] = $_POST['EST_CNPJ'];
		$_SESSION['EST_NOME_FANTASIA'] = $_POST['EST_NOME_FANTASIA'];
		$_SESSION['EST_RUA'] = $_POST['EST_RUA'];
		$_SESSION['EST_BAIRRO'] = $_POST['EST_BAIRRO'];
		$_SESSION['EST_NUMERO'] = $_POST['EST_NUMERO'];
		$_SESSION['EST_COMPLEMENTO'] = $_POST['EST_COMPLEMENTO'];
		$_SESSION['EST_NOME_RESPONSAVEL'] = $_POST['EST_NOME_RESPONSAVEL'];
		$_SESSION['EST_NOME_EMPRESA'] = $_POST['EST_NOME_EMPRESA'];
		$_SESSION['EST_SITE_EMPRESA'] = $_POST['EST_SITE_EMPRESA'];
		$_SESSION['EST_EMAIL'] = $_POST['EST_EMAIL'];
		$_SESSION['EST_CEP'] = $_POST['EST_CEP'];
	}
	
	
	
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
						<li class="scroll active"><a href="#">Cadastrar</a></li>
						<li class="scroll"><a href="../../index.html" >Home</a></li>
						<li class="scroll"  ><a href="../../login.html">Logar</a></li>    
				  </ul>
				</div>
		  </div>
		</div>
		<!-- FIM DO MENU DO SITE -->
		<section id="contact">
			<div id="contact-us" class="parallax">
			  <!-- INÍCIO - PREENCHER PERFIL -->
			  <div class="container">
				<div class="row">
				  <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
					<h2> Preencher Perfil</h2>
				  </div>
				</div>
				  <div class="row">
					<div class="col-sm-6" style="width: 60%; margin-right:20%; margin-left:20%; ">
					
						  <!-- INÍCIO DO FORMULÁRIO -->
						  <form method="post" action="../../MVC/visao/Estabelecimentos/cadastrarEstabelecimentos.php" style="border: 1px solid white; padding: 15px; 30px 0px;">
							
							<?php 
								$registro = $dao->pesquisarPorCnpj($_SESSION['EST_CNPJ']);
							?>
							
							<!-- PÚBLICO ALVO -->
							<div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">		
								<div class="col-sm-6">
										<div class="form-group">	  
											<fieldset>
												<legend>Público alvo</legend>
												<textarea name="EST_PUBLICO_ALVO" id="EST_PUBLICO_ALVO" class="textarea3" rows="4" cols="50" placeholder="Mensagem" style="resize: none;" required="required" maxlength="100"><?php if(isset($registro['EST_PUBLICO_ALVO'])){ echo $registro['EST_PUBLICO_ALVO'];}?></textarea>
											</fieldset>
										</div>
								</div>
							</div>
							
							<!-- VISÃO GERAL DA EMPRESA -->
							<div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
										<div class="col-sm-6">
											<div class="form-group">	  
												<fieldset>
													<legend>Visão geral da empresa</legend>
													<textarea name="EST_VISAO_GERAL_EMPRESA" id="EST_VISAO_GERAL_EMPRESA" class="textarea3" rows="4" cols="50" placeholder="Mensagem" style="resize: none;" required="required" maxlength="300"><?php if(isset($registro['EST_VISAO_GERAL_EMPRESA'])){ echo $registro['EST_VISAO_GERAL_EMPRESA'];}?></textarea>
												</fieldset>
											</div>
										</div>
							
							</div>
							
							<!-- BOTÃO CONFIRMAR -->
								<div class="form-group"  style="padding-left: 20px;">
										  <button type="submit" class="btn-submit2">Confirmar</button>
								</div>
							

							
							<!-- PRINCIPAIS PRODUTOS -->
							<div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
										<div class="col-sm-6" style="padding-left: 20px;">
											<div class="form-group">	  
												<fieldset>
													<br/><br/>
													<legend>Principais Produtos</legend>
												</fieldset>
											</div>
										</div>
							
							</div>
							
							<div class="container theme-showcase" role="main"">	
										
										
										<!-- INÍCIO DA TABELA DE PRODUTOS -->
										<div class="col-sm-7" style="padding-left: 5px; padding-right: 37px; margin-top:-5%;">
											<div class="form-group">	
											<div class="row">
												<div class="col-md-15">
													<table class="table">
														<thead>
															<tr>
																<th>Numeração</th>
																<th>Nome do Produto</th>
																<th>Procedimentos</th>
																<th><button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalcad">Cadastrar</button></th>
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
																		
																		<a href="http://localhost/RECLAME%20SAO%20JOAO/MVC/visao/Produtos/Preencher_Produtos/excluirProduto.php?id=<?php echo $rows_produtos['PRO_ID']; ?>"><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>
																	</td>
																</tr>
															<?php } ?>
														</tbody>
													 </table>
												</div>
											</div>
										</div>
									</div>
									<!-- FIM DA TABELA DE PRODUTOS -->
							</div>
							
							
						  </form>
						  <!-- FIM DO FORMULÁRIO -->
					</div>			  
				  </div>
			</div>
			<!-- FIM - PREENCHER PERFIL -->
		   </div>

			<!-- INÍCIO DO MODAL CADASTRAR PRODUTO -->
										<div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														<h4 class="modal-title text-center" id="myModalLabel">Cadastrar Produto</h4>
													</div>
													<div class="modal-body">
														<form method="POST" action="http://localhost/RECLAME%20SAO%20JOAO/MVC/visao/Produtos/Preencher_Produtos/cadastrarProduto.php" enctype="multipart/form-data">
															<div class="form-group">
																<label for="recipient-name" class="control-label">Nome do produto:</label>
																<input name="PRO_NOME_PRODUTO" type="text" class="form-control" required="required" maxlength="100" id="recipient-descricao">
															</div>
															
															<div class="form-group">
																<label for="message-text" class="control-label">Descrição:</label>
																<textarea name="PRO_DESCRICAO_PRODUTO" class="form-control" required="required" maxlength="300"></textarea>
															</div>
															
															<div class="form-group">
																<label for="recipient-name" class="control-label">Tipo do produto:</label><br/>
																<input type="radio" name="opcoes" value="html" checked /> Alimentício<br/>
																<input type="radio" name="opcoes" value="html"/> Cosmético<br/>
																<input type="radio" name="opcoes" value="html"/> Vestimento<br/>
															</div>
						
															<div class="modal-footer">
																<button type="submit" class="btn btn-success" onclick="mostra_valor();">Cadastrar</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
										<!-- FIM DO MODAL CADASTRAR PRODUTO -->
		
		<!-- INÍCIO MODAL - ALTERAR PRODUTO -->
				<div class="modal fade" id="ALTERAR_PRODUTO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title text-center" id="exampleModalLabel">Alterar Produto</h4>
							</div>
							<div class="modal-body">
								<form method="POST" action="http://localhost/RECLAME%20SAO%20JOAO/MVC/visao/Produtos/Preencher_Produtos/editarProduto.php" enctype="multipart/form-data">
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
		</section>
		
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
			
			function mostra_valor() 
			{
				var recipientpublico = document.getElementById('EST_PUBLICO_ALVO').value;
				var recipientvisao = document.getElementById('EST_VISAO_GERAL_EMPRESA').value;
				alert(recipientpublico);
				//document.getElementById('EST_PUBLICO_ALVO').value=(recipientpublico)
				//document.getElementById('EST_VISAO_GERAL_EMPRESA').value=(recipientvisao)
			})
		</script>
		
		
	</body>
</html>