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
include 'controle/ReclamacaoDAO.php';
$ReclamacoesDAO = new ReclamacaoDAO();
$registro_reclamacoes = $ReclamacoesDAO->pesquisarReclamacoes($idEst);

$naoSolucionadas = $ReclamacoesDAO->pesquisarReclamacaoNaoSolucionada($idEst); 

$solucionadas = $ReclamacoesDAO->pequisarReclamacaoSolucionada($idEst);

	//Criar conexão com a tabela Usuários
$registro_usuario = $dao->pesquisarPorId('3');

	//Criar conexão com a tabela Resposta da Reclamação
include 'controle/RespostaReclamacaoDAO.php';
$RespostaReclamacaoDAO = new RespostaReclamacaoDAO();
$registro_respostas = $RespostaReclamacaoDAO->pesquisarPorId('1');

	//Criar conexão com a tabela Consumidor
include 'controle/ConsumidorDAO.php';
$ConsumidorDAO = new ConsumidorDAO();
$registro_consumidor = $ConsumidorDAO->pesquisarPorId($id);

		//$consumidorID = foreach($registro_consumidor as $linha_consumidor)
							//{
								//$linha_consumidor['CON_ID']
							//};

		//$usuarioID = $ConsumidorDAO->SelecionarPorId($consumidorID);

	//Criar conexão com a tabela Usuarios
$UsuarioDAO = new UsuarioDAO();
$registro_usuario = $UsuarioDAO->pesquisarPorId($id);


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
	<link href="css/sidebar.css" rel="stylesheet">

	<!-- OUTROS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet"> 
	<link href="css/font-awesome.min.css" rel="stylesheet">

	<link href="css/main.css" rel="stylesheet">
	<link href="css/testes.css" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet">
	<link href="css/estabelecimento.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">

	<link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="images/favicon.ico">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
				<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
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
				<a class="navbar-brand" href="est_boas-vindas.php">
					<h1><img class="img-responsive" src="images/logo.png" alt="logo"></h1>
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
							<li><a href="est_perfil.php">Visualizar e Editar Perfil</a></li>

						</ul>


						<li data-toggle="collapse" data-target="#service2" class="collapsed">
							<a href="#"><i class="fa fa-caret-down fa-lg"></i> Reclamações <i class="fa fa-file-text fa-lg btn pull-right" style="margin-top:5px; margin-right:4px;"></i></a>
						</li>
						<ul class="sub-menu collapse" id="service2">
							<li><a href="est_gerenciar-reclamacao-atendida.php">Reclamações Atendidas</a></li>
							<li><a href="est_gerenciar-reclamacao-nao-atendida.php">Reclamações Não Atendidas</a></li>
						</ul>

						<li data-toggle="collapse" data-target="#new" class="collapsed">
							<a href="php/mod01/sair.php"><i class="fa fa-caret-down fa-lg"></i> Sair <i class="fa fa-file-text fa-lg btn pull-right" style="margin-top:5px; margin-right:2px;"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</aside>
	<!-- FIM DA NAV SIDEBAR -->


	<!-- CORPO DA PAGINA DE RECLAMAÇÕES -->

	<!-- INÍCIO - CORPO DA PÁGINA -->
	<div class="container">		
		<br/>
		<br/>
		<div class="row">
			<!-- INÍCIO - NÚMERO DE RECLAMAÇÕES -->
			<div class="col-sm-12">

				<div class="col-sm-4">
					<div class="panel panel-default" style="border-left: thick double  #3194DA;">
						<div class="panel-body">
							<div class="pull-left"><span class="fa fa-fire" aria-hidden="true"></span> Reclamações</div>
							<div class="pull-right"><?php echo $solucionadas+$naoSolucionadas ?></div>
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="panel panel-default" style="border-left: thick double #00ff00;">
						<div class="panel-body">
							<div class="pull-left"><span class="fa fa-users" aria-hidden="true"></span> Atendidas</div>
							<div class="pull-right"><?php echo $solucionadas ?></div>
						</div>
					</div>
				</div>


				<div class="col-sm-4">
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

		<div class="row">
			<div class="col-sm-12" style="padding-left: 2%; padding-right: 2%;">

select * from reclamacoes;
REC_DESCRICAO
REC_ID
REC_DATA_HORA
REC_TITULO_RECLAMACAO
				

				<table id="example" class="table example table-striped table-hover table-responsive" style="width: 100%">
					<thead> 
                        <tr>
                          <th> ID </th>
                          <th> Estabelecimentos </th>
                          <th> Categoria </th>
                          <th> Pontuação</th>           
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($varEst as $linha) { ?>
                        <tr>
                          <td><?php echo $linha['EST_ID'];?></td>                     
                          <td><?php echo $linha['EST_NOME_FANTASIA'];?></td>
                          <?php $numero=$linha['TES_ID']; ?> 
                          <?php $tes=$tesDAO->pesquisarPorId($numero);?>                    
                          <td><?php foreach($tes as $lia) {
                            echo $lia['TES_CATEGORIA'];
                          } ?></td>   
                          <td><?php echo $linha['EST_MEDIA_RECLAMACAO'];?></td>                
                        </tr>

                        <?php } ?>
                      </tbody>
				</table>
				<script>
					$(document).ready(function() {
						$('#example').DataTable( {
							"language": {
								"url": "https://cdn.datatables.net/plug-ins/1.10.13/i18n/Portuguese.json"
							},
							"drawCallback": function () {
								$('.dataTables_paginate > .pagination').addClass('pagination-sm');
							},
							"order": [],
							"aoColumnDefs": [{
								'bSortable': false,
								'aTargets': [-1] /* 1st one, start by the right */
							}]
						} );
					} );

				</script>

			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="fa fa-list" aria-hidden="true"></span> Título da Reclamação</div>
					<div class="panel-body">

						<div class="col-sm-12">
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
										<!-- ÍCONES -->
										<div class="col-sm-8">
											<img class="pin-maps" src="images\icons\localizacao.png" height="20" width="15"> São João da Boa Vista

											<img class="pin-maps" src="images\icons\calendario.png" height="20" width="15"> 01/10/2017
										</div>
										<!-- REDIRECIONAR PARA A PÁGINA: AGENDAR REUNIÃO -->
										<div class="col-sm-4">
											<a href="est_agendar-reuniao.php" class="agendar-reuniao">Agendar Reunião</a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="panel panel-default" style="border-left: thick double #00ff00;">
								<div class="panel-body">
									<!--     NOME DO USUÁRIO      -->
									<div class="pull-left"><span class="fa fa-user" aria-hidden="true"> Rafael Alves Camillo</span> </div>

									<!--     RECLAMAÇÃO DO USUÁRIO      -->
									<div class="pull-left"> Eu não gostei do Atendimento deste Restaurante, eu esperava mais desse estabelecimento, mas em fim, a gente se surpreende.</div>
								</div>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="form-group">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalcad">Responder</button>	
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalcad">Denunciar Cliente</button>
							</div>
						</div>

					</div>
				</div>
			</div>		
		</div>

		<!-- BOTÃO VER MAIS -->
		<div class="form-group" style="margin-bottom: 0%;">
			<button type="submit" class="btn-submit2" dtype="submit" onclick="location.href='mod03-gerenciar-reclamacao-nao-atendida-ver-mais.php'".click(); >Ver mais</button>
		</div>

	</div>
	<!-- FIM - CORPO DA PÁGINA -->				


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

	<!-- MODAL - RESPONDER RECLAMACAO-->
	<div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title text-center" id="myModalLabel">Responder Reclamação</h4>
				</div>
				<div class="modal-body">
					<form method="POST" action="http://localhost/RECLAME_SAO_JOAO-INTEGRAR/php/mod03/cadastrarResposta.php" enctype="multipart/form-data">
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

	<!-- INÍCIO - RODAPÉ  -->
	<br/>
	<br/>
	<br/>
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


		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript">


			<!-- SCRIPT EM GERAL -->
			<script type="text/javascript" src="js/jquery.js"></script>
			<script type="text/javascript" src="js/bootstrap.min.js"></script>
			<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
			<script type="text/javascript" src="js/jquery.inview.min.js"></script>
			<script type="text/javascript" src="js/wow.min.js"></script>
			<script type="text/javascript" src="js/mousescroll.js"></script>
			<script type="text/javascript" src="js/smoothscroll.js"></script>
			<script type="text/javascript" src="js/jquery.countTo.js"></script>
			<script type="text/javascript" src="js/main.js"></script>
			<!--FIM DO SCRIPT EM GERAL -->

		</body>
		</html>