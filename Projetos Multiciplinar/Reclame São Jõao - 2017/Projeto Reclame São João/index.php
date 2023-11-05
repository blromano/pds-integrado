<?php

	include ("controle/Conexao.php");
	include ("controle/AvaliacoesDAO.php");
	include ("controle/ConsumidorDAO.php");
	include ("controle/UsuarioDAO.php");
	include ("controle/ReclamacoesDAO.php");
	include_once 'controle/EstabelecimentosDAO.php';
	require_once('modelo/Estabelecimentos.php');
	include ('controle/NotificacoesDAO.php');
	//include ('php/mod02/not_automatico.php');
	
	session_start();

	$conn = new Conexao();
	$dao = new UsuarioDAO();
	$notasPdo = new AvaliacoesDAO;
	$ConsumidorDAO = new ConsumidorDAO;
	$EstabelecimentosDAO = new EstabelecimentosDAO;
	$ReclamacoesDAO = new ReclamacoesDAO;
	$UsuarioDAO = new UsuarioDAO;
	$NotificacaoReclamacaoDAO = new NotificacoesDAO;
	
	$id_estabelecimento = $notasPdo->selecionarEstId();
	$primeiromaiusculo = $ReclamacoesDAO->primeiroMaiusculo();

	$tipo =	null;
	
	//Classe NotificacoesDAO
		$notificacoesDAO = new NotificacoesDAO;
	//MOD01 UTILIZA ESSA PARTE
	
	if (isset($_SESSION['USU_EMAIL'])) {
	$tipo = $dao->verificarUsuario($_SESSION['USU_EMAIL']);
	if ($tipo == 'est') 
	{
		$estDAO = new EstabelecimentosDAO();
		$est = $estDAO->pesquisarPorIdUsr($_SESSION['usr']->getUSU_ID());
		foreach ($est as $linha) 
		{
			$_SESSION['EST_ID']=($linha['EST_ID']);
			$_SESSION['EST_NOME_FANTASIA']=($linha['EST_NOME_FANTASIA']);
			
			
			//Notificação
				$total_notificacao_estabelecimento = $notificacoesDAO->contarNotIdNaoVisualizadoEst($_SESSION['EST_ID']);
			
			//Exibir todas as notificações
				$get_respondida_est = $notificacoesDAO->listarInformacao_est($_SESSION['EST_ID']);
		}
	}
	elseif ($tipo == 'adm') 
	{
	header('Location: admin.php');
	}
	elseif ($tipo == 'usr') 
	{
		$USU_NOME = $dao->buscarUsuarioNome($_SESSION['USU_EMAIL']);
		$_SESSION['USU_NOME'] = $USU_NOME;
		$USU_EMAIL = $ReclamacoesDAO->retornandoEmail();
		$USU_ID = $UsuarioDAO->buscarUsuario($USU_EMAIL);
		$_SESSION['USU_ID'] = $USU_ID;
		
		$notificacao_valido = $NotificacaoReclamacaoDAO->contarNotId($USU_ID);
		
		//CON_ID
			$CON_ID = $notificacoesDAO->retornarIDConsumidor($USU_ID);
			$_SESSION['CON_ID'] = $CON_ID;
		
		//Notificação
				$total_notificacao_consumidores = $notificacoesDAO->contarNotIdNaoVisualizado($_SESSION['CON_ID']);
			
			//Exibir todas as notificações
				$get_respondida_usu = $notificacoesDAO->listarInformacao($_SESSION['CON_ID']);
	}
	}else{
		//header('Location: usu_loginUsuario.php');
	}

	
//MOD02 UTILIZA ESSA PARTE
	
	//AVALIAÇÕES
	$notasPdo = new AvaliacoesDAO;
	$resultado = $notasPdo->nota_estabelecimento($id_estabelecimento);
	if ($resultado != null) {
	foreach ($resultado as $row) {
	$positivas = null;
	$neutras   = null;
	$negativas = null;
	$total     = 0;
	$media_ava = null;
	foreach ($resultado as $row) {
	$total = $total + $row["AVA_NOTA"];
	if ($row["AVA_NOTA"] <= 2) {
	$negativas = $negativas + 1;
	} else if ($row["AVA_NOTA"] == 3) {
	$neutras = $neutras + 1;
	} else if ($row["AVA_NOTA"] >= 4) {
	$positivas = $positivas + 1;
	}
	}     
	}
	}

	$resultado = $notasPdo->total_notas($id_estabelecimento);

	if ($resultado[0]["qtde"] == 0) {
		$media_ava        = 0;
		$total_avaliacoes = 0;
		$total            = 0;
		$positivas        = 0;
		$neutras          = 0;
		$negativas        = 0;
		$_SESSION["total"]=0;
		$_SESSION["total_avaliacoes"]=0;
	} else if ($resultado[0]["qtde"] > 0) {
		$total_avaliacoes = $resultado[0]["qtde"];  
		$media_ava = $total / $total_avaliacoes;
		$media_avaliacao_round = ROUND($media_ava, 0);
		$_SESSION["total"]=$total;
	}

	$USU_NOME = isset($_SESSION["USU_NOME"]);   		 
		   
	// RANDOM AVA_ID TO DESCRIPTIONS
	$resultado = $notasPdo->total_notas($id_estabelecimento);
	$total_avaliacoes=$resultado[0]["qtde"];

	if($total_avaliacoes>=4){
	$random_id1=(rand(0,$total_avaliacoes-3));
	$random_id2=($random_id1+1);
	$random_id3=($random_id2+1);
	$historico_ava=$notasPdo->HistoricoAvaliacoes($id_estabelecimento);

	}else if ($total_avaliacoes==1){

	$random_id1=0;
	$random_id2=0;
	$random_id3=0;
	$historico_ava=$notasPdo->HistoricoAvaliacoes($id_estabelecimento);

	}
	else if ($total_avaliacoes==2){

	$random_id1=0;
	$random_id2=1;
	$random_id3=0;
	$historico_ava=$notasPdo->HistoricoAvaliacoes($id_estabelecimento);

	}else if ($total_avaliacoes==3){

	$random_id1=0;
	$random_id2=1;
	$random_id3=2;
	$historico_ava=$notasPdo->HistoricoAvaliacoes($id_estabelecimento);

	}

	//pegar o USU_NOME pelo CON_ID
	$CON_ID_1 = $historico_ava[$random_id1]["CON_ID"];
	$CON_ID_2 = $historico_ava[$random_id2]["CON_ID"];
	$CON_ID_3 = $historico_ava[$random_id3]["CON_ID"];
	
	$USU_ID_1 = $ConsumidorDAO->SelecionarPorId($CON_ID_1);
	$USU_ID_2 = $ConsumidorDAO->SelecionarPorId($CON_ID_2);
	$USU_ID_3 = $ConsumidorDAO->SelecionarPorId($CON_ID_3);

	$USU_NOME_1 = $UsuarioDAO->selecionarNome($USU_ID_1);
	$USU_NOME_2 = $UsuarioDAO->selecionarNome($USU_ID_2);
	$USU_NOME_3 = $UsuarioDAO->selecionarNome($USU_ID_3);

	//Informações do site
	$quantidade_usuarios = $ConsumidorDAO->contarConsumidores();
	$quantidade_estabelecimentos = $EstabelecimentosDAO->contarEstabelecimentos();
	$quantidade_reclamacoes = $ReclamacoesDAO->contarReclamacoes();
	$quantidade_avaliacoes = $notasPdo->contarAvaliacoes();
	
	$PESQUISAR_RECLAMACAO = 1;
	$PESQUISAR_AVALIACAO = 2;
	
	$registro_todas_reclamacoes = $ReclamacoesDAO->pesquisarTodasReclamacoes($id_estabelecimento);
	$nome_est = $EstabelecimentosDAO->selecionarNomeEstabelecimento($id_estabelecimento);
		
	$cont = 1;
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<!--meta do slishow-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--fim do meta do slishow-->
	<title>Reclame São João</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet"> 
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/testes.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/depoimentos.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<link rel="shortcut icon" href="images/favicon.ico">
	<link href="css/rec_estabelecimento.css" rel="stylesheet">
	<link href="css/rodape2.css" rel="stylesheet">
	<link href="css/rec_index.css" rel="stylesheet">
	
	<link href="css/estrelas.css" rel="stylesheet">
	<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="css/rodape.css">
	
	<!--CSS DO MOD01-->
	<link  rel="stylesheet" href="css/rec_index_sidebar.css">
	<link  rel="stylesheet" href="css/mod04/chartSize.css">
	<link href="css/mod04/tabelas.css" rel="stylesheet">
	<script src="/js/jquery.min.js"></script>
	
	<!-- <script src="/js/mod04/highcharts.js"></script> -->
	<link rel="stylesheet" href="/css/highcharts.css" />
	<script src="/js/mod04/highstock.js"></script>
	<!-- <script src="/js/mod04/exporting.js"></script> -->
	
	<!--css do notificacao-->
	<link rel="stylesheet" type="text/css" href="css/rec_notificacao.css" />
	
	<!-- ALERT -->
			<script src = "https://unpkg.com/sweetalert/dist/sweetalert.min.js"> </script>
		
</head>
<?php if($tipo == 'usr' OR $tipo == 'est'): ?>
<body id="index_body_responsivo">
<?php else: ?>
<body id="index_body">
<?php endif; ?>
  <!--.preloader-->
  <div class="preloader"><i class="fa fa-circle-o-notch fa-spin"></i></div>
  <!--/.preloader-->

   <header id="home">
    <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div id="itema" class="item active">
          
		  	<?php
			if($tipo == 'usr'):
			?>
			<div class="row" style="padding-top: 10px">
			<div class="container">
			<div class="col-md-6">
			<img src="images/slider/logo.png" class="pull-left" style="width:30%;margin-left:15px;">
			</div>

		
			
			<div class="dropdown pull-right" id="index_drop" >
			<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo strtok($_SESSION['USU_NOME'], " ");?>
			<span class="caret"></span></button>
			<ul class="dropdown-menu" id="index_none">
			<li><a href="usu_perfil.php"><span class="glyphicon glyphicon-pencil"></span> Editar Informações</a></li>
			<li><a href="rec_gerenciar.php?pagina=2"><span class="glyphicon glyphicon-comment"></span> Reclamações</a></li>
			<li><a href="php/mod01/sair.php"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
			</ul>
			</div>
			
		
			
			
			
			

			<!--<ul class="nots">
			<li class="notifs">
			<div class="ctnots">0</div> 
			<ul class="dp">
			<div class="arrow-down"></div>  
			
			<?php echo ( $notificacao_valido == 0 ? '<center><span id="not_msg"><br><br><br>Você não possui notificações<br> por enquanto!!! Veja mais tarde<br><br></span></center>' : "" ); ?>
			<div id="res" ></div>
			</ul>
			</li>
			</ul> 
			<button" class="addnot"></button>
				-->
			
			<!-- Notificação -->	
			<div class="dropdown pull-right">
			    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
					<span data-count="<?php echo $total_notificacao_consumidores; ?>" class="glyphicon glyphicon-bell notificacao"></span>
				</button>
				
			
				<ul class="dropdown-menu">
				<?php foreach ($get_respondida_usu as $row) { ?>
					
					<li>
						<a href="#">
							<span class="titulo">Notificação #<?php echo $cont++; ?>
								<span class="data pull-right"><?php echo date('d/m/Y', strtotime($row["NOT_DATA_EVENTO"])); ?></span>
							</span><br>
						
							<small><?php echo $row['NOT_NOME']; ?></small>
						</a>
					</li>
					<?php } ?>
				</ul>
			</div>
		<!-- Notificação -->
			
			
			</div>
			</div>
			</div>
			<?php
			elseif($tipo == 'est'):
			?>
			<div class="row" style="padding-top: 10px">
			<div class="container">
			<div class="col-md-6">
			<img src="images/slider/logo.png" class="pull-left" style="width:30%;margin-left:15px;">
			</div>
			<div class="col-md-6">

				<div class="dropdown pull-right">
				<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['EST_NOME_FANTASIA'];?>
				<span class="caret"></span></button>
				<ul class="dropdown-menu">
				<li><a href="est_perfil.php"><span class="glyphicon glyphicon-pencil"></span> Editar Perfil</a></li>
				<li><a href="est_gerenciar-respostas_reclamacoes.php"><span class="glyphicon glyphicon-comment"></span> Reclamações</a></li>
				<li><a href="php/mod01/sair.php"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
				</ul>												
				</div>
				
				
		<!-- Notificação -->	
			<div class="dropdown pull-right">
			    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
					<span data-count="<?php echo $total_notificacao_estabelecimento; ?>" class="glyphicon glyphicon-bell notificacao"></span>
				</button>
				
			
				<ul class="dropdown-menu">
				<?php foreach ($get_respondida_est as $row) { ?>
					
					<li>
						<a href="#">
							<span class="titulo">Notificação #<?php echo $cont++; ?>
								<span class="data pull-right"><?php echo date('d/m/Y', strtotime($row["NOT_DATA_EVENTO"])); ?></span>
							</span><br/><br/>
						
							<small><?php echo $row['NOT_NOME']; ?></small>
						</a>
					</li>
					<?php } ?>
				</ul>
			</div>
		<!-- Notificação -->
			
			</div>
			</div>
			</div>
			<?php
			else:
			?>
			<div class="row" id="index_login">
			<div class="container">
			<div class="col-md-6" >
			<img src="images/slider/logo.png" class="pull-left" id="index_login_img">
			</div>
			<div class="col-md-6" >
			<span class="pull-right">
			<button id="loginecadastro" class="loginecadastro" data-toggle="modal" onclick="document.location.href='usu_loginUsuario.php';" data-target="#modal-login">Login</button>
			<button id="cadastroelogin" class="cadastroelogin" data-toggle="modal" data-target="#modal-mensagem">Cadastre-se</button>
			</span>
			</div>
			</div>
			</div>
			<center>
			<div class="row" id="index_login_responsivo">
			<div class="container">
			<div id="index_img_responsivo">
			<img src="images/slider/logo.png" id="index_login_img">
			</div>
			<div  style="margin-top: 5%;" >
			<button id="loginecadastro" class="loginecadastro" data-toggle="modal" onclick="document.location.href='usu_loginUsuario.php';" data-target="#modal-login">Login</button>
			<button id="cadastroelogin" class="cadastroelogin" data-toggle="modal" data-target="#modal-mensagem">Cadastre-se</button>
			</div>
			</div>
			</div>
			</center>
			<?php
			endif;
			?>
			
		       <div id="index_div_buscar_titulo" style="z-index: initial;" class="caption">
                     <!-- <div class="container">-->
                     <h1 id="index_buscar_titulo">Bem Vindo ao </br><span>RECLAME SÃO JOÃO</span></h1>
                     <span class="destinations-form animated fadeInLeftBig">
                        <div class="input-line">
                           <!-- encontreempresa -->
                           <form id="index_form_pesquisar" action='rec_estabelecimento.php' method='get'>
                              <p><input type='text' id='EST_NOME' name='EST_NOME' value='' class="form-input check-value auto" placeholder="Buscar"/></p>
                              <button type="submit" name="destination-submit" id="index_button_pesquisar" class="form-submit btn btn-special" 
                              ><i class="fa fa-search fa-2x "></i> </button>
                              <input type="hidden" name="link" value="index.php">
                           </form>
                           <!-- teste -->
                     </span>
                     <!--<a data-scroll class="btn btn-start animated fadeInUpBig" href="#services">Veja mais</a>-->
                     <p id="textobloco1" class="animated fadeInRightBig"><br>FAÇA SUAS RECLAMAÇÕES E VEJA A REPUTAÇÃO DOS ESTABELECIMENTOS</p>
                     </div>
                  </div>
        </div>
        </div>
	   </div>

    </div>
	<!--/#home-slider-->
	
	     <div class="main-nav">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php" id="cabecalho_logo">
            <h1><img class="img-responsive" src="images/logo.png" alt="logo"></h1>
          </a>     
        </div>	
	
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">   
			<li class="scroll active"><a href="#home">Home</a></li>
            <li class="scroll"><a href="#servico_index">Serviços</a></li>     
			<li class="scroll"><a href="#mapa">Mapa</a></li> 
            <li class="scroll"><a href="#portfolio">Rankings</a></li> 
			<li class="scroll"><a href="#about-us2">Avaliações</a></li> 
			<li class="scroll"><a href="#semana">da Semana</a></li>
			<li><a href="contato.php">Contato</a></li>
            <li><a href="duvidasFrequentes.php">Dúvidas</a></li>
            <li><a href="sobrenos.php">Sobre Nós</a></li>
		  </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
	
  </header><!--/#home-->
		<?php
		if($tipo == 'usr'):
		?>
		<aside>
		<nav class="navbar navbar-inverse sidebar navbar-fixed-top" role="navigation" >

		<div class="nav-side-menu" style="top: 0; float: left;"">
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

		<li data-toggle="collapse" data-target="#gerenciar" class="collapsed">
		<a href="rec_gerenciar.php?pagina=2"><i></i>&nbsp Gerenciar Reclamações <i class="fa fa-align-right fa-lg btn pull-right" style="margin-top:5px; margin-right:4px;"></i></a>
		</li>
		<li data-toggle="collapse" data-target="#chat" class="collapsed">		
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
		<a href="#"><i></i>&nbsp&nbspChat <i class="fa fa-comment fa-lg btn pull-right" style="margin-top:5px; margin-right:4px;"></i></a>
		</li>
		<li data-toggle="collapse" data-target="#new" class="collapsed">
		<a href="php/mod01/sair.php"><i></i>&nbsp Sair<i class="fa fa-sign-out fa-lg btn pull-right"></i></a>
		</ul>
		
		</div>
		</ul>
		</div>
		</div>
		</nav>

		</aside>
	
		
		<?php
		elseif($tipo == 'est'):
		?>
		<aside>
		<nav class="navbar navbar-inverse sidebar navbar-fixed-top" role="navigation">

		<div class="nav-side-menu" style="top: 0px; float: left;">
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
		<?php
		endif;
		?>
		
  <div style="width: 100%; padding: 30px;"></div>
 <section id="servico_index">
         <div class="container">
            <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
               <div class="row">
                  <div class="text-center col-sm-8 col-sm-offset-2">
                     <h2>Nossos Serviços</h2>
                     <p>Buscamos oferecer suporte para problemas que possam ocorrer no relacionamento Cliente x Estabelecimento em São João da Boa Vista.</p>
                  </div>
               </div>
            </div>
            <div class="text-center our-services">
               <div class="row">
                  <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="750ms" onclick="myhref('rec_pesquisar_estabelecimento.php?PESQUISAR_ID=<?php echo $PESQUISAR_RECLAMACAO; ?>');">
                     <div class="service-icon">
                        <i style="cursor:pointer;" class="fa fa-comments"></i>
                     </div>
                     <div class="service-info">
                        <h3>Reclamar</h3>
                        <p>Criar reclamações contra determinado estabelecimento.</p>
                     </div>
                  </div>
                  <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="750ms" onclick="myhref('rec_pesquisar_estabelecimento.php?PESQUISAR_ID=<?php echo $PESQUISAR_AVALIACAO; ?>');">
                     <div class="service-icon">
                        <i style="cursor:pointer;" class="fa fa-star-half-o"></i>
                     </div>
                     <div class="service-info">
                        <h3>Avaliar</h3>
                        <p>Faça uma avaliação de determinado estabelecimento.</p>
                     </div>
                  </div>
                  <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="550ms">
                     <div class="service-icon">
                        <i class="fa fa-handshake-o"></i>
                     </div>
                     <div class="service-info">
                        <h3>Buscar um acordo</h3>
                        <p>Fazer o possível para que o estabelecimento entre em um acordo com o cliente</p>
                     </div>
                  </div>
                  <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="650ms">
                     <div class="service-icon">
                        <a style="color: white;"href="mapa.php"><i><span class="glyphicon glyphicon-map-marker"></span></i></a>
                     </div>
                     <div class="service-info">
                        <h3>Localização das empresas</h3>
                        <p>Visualizar os pontos em que cada empresa está localizada.</p>
                     </div>
                  </div>
                  <script type="text/javascript">
                     function myhref(web){
                     	window.location.href = web;}
                  </script>
                  <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="750ms" href="rankings.php" onclick="myhref('rankings.php');">
                     <div class="service-icon">
                        <i style="cursor:pointer;" class="fa fa-bar-chart"></i>
                     </div>
                     <div class="service-info">
                        <h3>Exibir rankings e relatórios</h3>
                        <p>Exibir rankings com diversos critérios sobre os estabelecimentos.</p>
                     </div>
                  </div>
                  <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="850ms" style="margin-top: 60px">
                     <div class="service-icon">
                        <i class="fa fa-check-square"></i>
                     </div>
                     <div class="service-info">
                        <h3>Verificar satisfação</h3>
                        <p>Concluir reclamação e verificar satisfação com a resolução do problema</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
  </section>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content modal-sm">
      <div class="modal-header modal-sm">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Qual das opções abaixo deseja visualizar?</h4>
      </div>
	  
	  <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Rankings</button>
        <button type="button" class="btn btn-primary">Relatórios</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal escolher forma de cadastro (usuário / estabelecimento) -->
<div class="modal fade" id="modal-mensagem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content modal-sm">
      <div class="modal-header modal-sm">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Qual das opções abaixo você deseja cadastrar-se?</h4>
      </div>

	  <div class="modal-footer" align="center">
		<button class="btn btn-default" type="submit" onclick="location.href='usu_cadastroUsuario.php'".click();>Consumidor</button>
		<button class="btn btn-primary" type="submit" onclick="location.href='est_cadastro.php'".click();>Estabelecimento</button>
      </div>
    </div>
  </div>
</div>
		<!--mapa-->
		<section id="mapa">
		<!-- Hiring -->
		<div id="hiring" style="height: 397px; width: 100%;" class="parallax2-bg3 text-light" data-stellar-background-ratio="0.5">
	<section style="height: 397px;" >
		<center>
	<div style="padding: 30px 30px 30px 30px;">
		<h2  class="mapaletra wow fadeIn" id="index_mapa">Mapa das Empresas</h2>
		<div class="row"><div class="col-md-4 col-md-offset-4">
		<hr class="mapaletra">
		</div></div>
		<div id="ocultar_responsivo""><p class="mapaletra wow fadeIn" id="index_mapa_texto">Possibilidade de ver as empresas cadastradas no mapa da cidade </p></div>
		<p class="mapaletra wow fadeInUp" id="index_mapa_texto">
		<button class="buttonmap" type="submit" onclick="location.href='mapa.php'".click();>Ver Empresas</button>
		</p>
	</div>	
		</center>
</section>
		</div>
		
		</section>
		
		<div id="ocultar_responsivo" style="width: 100%; padding: 30px;"></div>
		<div id="index_ocultar_responsivo">
		<!-- Portfolio Grid Section -->
		<section id="portfolio" class="bg-light-gray">
		<div class="container">
		<div class="row">
		<div class="col-lg-12 text-center">
		<h2 id="txtma" class="selectionma">Melhores Avaliados</h2>
		<h3 class="section-subheading text-muted" style="margin-bottom: 5%;">Estabelecimentos com as melhores avaliações</h3>
		</div>
		</div>
			
  <div class="container">
        
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th></th>
        <th>Estabelecimento</th>
        <th>Categoria</th>
        <th>Pontuação</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1#</td>
        <td>Tuca Semi Joias</td>
        <td>Acessórios</td>
		<td>97.8</td>
      </tr>
      <tr>
        <td>2#</td>
        <td>Chiquinho Sorvetes</td>
        <td>Sorveteria</td>
				<td>90.3</td>
      </tr>
      <tr>
        <td>3#</td>
        <td>Espaço Girl</td>
        <td>Vestuário</td>
		<td>89.9</td>
      </tr>
      <tr>
        <td>4#</td>
        <td>Açaí Mania</td>
        <td>Sorveteria</td>
		<td>89.3</td>
      </tr>
      <tr>
        <td>5#</td>
        <td>Actual</td>
        <td>Vestuário</td>
		<td>89.4</td>
      </tr>
      <tr>
        <td>6#</td>
        <td>Cacau Brasil</td>
        <td>Chocolateria</td>
		<td>87.1</td>
      </tr>
      <tr>
        <td>7#</td>
        <td>Óticas Carol</td>
        <td>Acessórios</td>
		<td>86.2</td>
      </tr>
      <tr>
        <td>8#</td>
        <td>Pernambucanas</td>
        <td>Vestuário</td>
		<td>80.9</td>
      </tr>
      <tr>
        <td>9#</td>
        <td>Açougue Sinhá</td>
        <td>Alimentos</td>
		<td>77.8</td>
      </tr>
      <tr>
        <td>10#</td>
        <td>Sandrini</td>
        <td>Vestuário</td>
		<td>75.3</td>
      </tr>
    </tbody>
  </table>
  
  <h3 class="section-subheading text-muted" id="index_ranking_texto">Estabelecimentos com as piores avaliações</h3>      
   
   <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th></th>
        <th>Estabelecimento</th>
        <th>Categoria</th>
        <th>Pontuação</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1#</td>
        <td>Lojão Pague 10</td>
        <td>Vestuário</td>
		<td>7.8</td>
      </tr>
      <tr>
        <td>2#</td>
        <td>Malu Presentes</td>
        <td>Acessórios</td>
				<td>9.3</td>
      </tr>
      <tr>
        <td>3#</td>
        <td>Big Jhonny</td>
        <td>Restaurante</td>
		<td>10.1</td>
      </tr>
      <tr>
        <td>4#</td>
        <td>Mamuska</td>
        <td>Vestuário</td>
		<td>12.9</td>
      </tr>
      <tr>
        <td>5#</td>
        <td>Toque Final</td>
        <td>Vestuário</td>
		<td>15.7</td>
      </tr>
      <tr>
        <td>6#</td>
        <td>Casas Bahia</td>
        <td>Eletrodomésticos</td>
		<td>17.3</td>
      </tr>
      <tr>
        <td>7#</td>
        <td>BVCI</td>
        <td>Provedor de Internet</td>
		<td>21.6</td>
      </tr>
      <tr>
        <td>8#</td>
        <td>CVC</td>
        <td>Viagens</td>
		<td>23.9</td>
      </tr>
      <tr>
        <td>9#</td>
        <td>Cacau Show</td>
        <td>Chocolateria</td>
		<td>27.8</td>
      </tr>
      <tr>
        <td>10#</td>
        <td>Droga Raia</td>
        <td>Drogaria</td>
		<td>30.3</td>
      </tr>
    </tbody>
  </table>
  
  <a href="rankings.php" id="index_ranking_veja"> Veja o ranking completo </a>		  
       </div>
      </div>
	<section id="about-us2"/>
</section>
	<div style="width: 100%; padding: 30px;"></div>
	
		<section id="about-us" class="parallax">
		<center>
				<div>
				<br/>
				<header>
				<h2><strong id="titulo_comentarios">Avaliações</strong></h2>
				</header>
				</div>

				<div class='row'>

				<div class="carousel slide" data-ride="carousel" id="quote-carousel">
				<!-- Bottom Carousel Indicators -->
				<center><ol class="carousel-indicators">
				<li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
				<li data-target="#quote-carousel" data-slide-to="1"></li>
				<li data-target="#quote-carousel" data-slide-to="2"></li>
				</ol></center>

				<!-- Carousel Slides / Quotes -->
				<div class="carousel-inner">

				<!-- Quote 1 -->

				<blockquote class="item active">
				<span id="nome_est"><b><?php echo $nome_est; ?></b></span>	<br/><br/>
				<?php 	
		
				if ($total_avaliacoes >= 1): ?>

				

				<div class="estrelas">
				<label for="cm_star-1"><i class="fa"></i></label>
				<input type="radio" id="cm_star-1" name="fb" value="1" data-vote=<?php
				if ($historico_ava[$random_id1]["AVA_NOTA"] >= 0 && $historico_ava[$random_id1]["AVA_NOTA"] < 2) {
				echo $ranking = "cm_star-1";
				}
				?>/>
				<label for="cm_star-2"><i class="fa"></i></label>
				<input type="radio" id="cm_star-2" name="fb" value="2" data-vote=<?php
				if ($historico_ava[$random_id1]["AVA_NOTA"] >= 2 && $historico_ava[$random_id1]["AVA_NOTA"] < 3) {
				echo $ranking = "cm_star-2";
				}
				?>/>
				<label for="cm_star-3"><i class="fa"></i></label>
				<input type="radio" id="cm_star-3" name="fb" value="3" data-vote=<?php
				if ($historico_ava[$random_id1]["AVA_NOTA"] >= 3 && $historico_ava[$random_id1]["AVA_NOTA"] < 4) {
				echo $ranking = "cm_star-3";
				}
				?>/>
				<label for="cm_star-4"><i class="fa"></i></label>
				<input type="radio" id="cm_star-4" name="fb" value="4" data-vote=<?php
				if ($historico_ava[$random_id1]["AVA_NOTA"] >= 4 && $historico_ava[$random_id1]["AVA_NOTA"] < 5) {
				echo $ranking = "cm_star-4";
				}
				?>/>
				<label for="cm_star-5"><i class="fa"></i></label>
				<input type="radio" id="cm_star-5" name="fb" value="5" data-vote=<?php
				if ($historico_ava[$random_id1]["AVA_NOTA"] >= 5 && $historico_ava[$random_id1]["AVA_NOTA"] < 6) {
				echo $ranking = "cm_star-5";
				}
				?>>
				</div>
				
				<span id="comentarios_descricao">"<?php echo ucprimeiro($historico_ava[$random_id1]["AVA_DESCRICAO"]); ?>"</span><br/><br/>
				<span id="comentarios_autor"><?php echo $USU_NOME_1; ?></span>

				<?php else: ?>
				<br/>
				<center><span id="comentarios_mensagem" >Não possui ainda uma primeira avaliação.<a id="link_avaliacao" href="ava_formulario.php">Faça agora a sua :)</a></span></center>
				<br/><br/>
				<?php endif; ?>

				</blockquote>

				<!-- Quote 2 -->

				<blockquote class="item">
				<span id="nome_est"><b><?php echo $nome_est; ?></b></span>	<br/><br/>
				<?php 			
				if ($total_avaliacoes >= 2): ?>

				<div class="estrelas">
				<label for="cm_star-11"><i class="fa"></i></label>
				<input type="radio" id="cm_star-11" name="fa" value="1" data-vote=<?php
				if ($historico_ava[$random_id2]["AVA_NOTA"] >= 0 && $historico_ava[$random_id2]["AVA_NOTA"] < 2) {
				echo $ranking2 = "cm_star-11";
				}
				?>/>
				<label for="cm_star-22"><i class="fa"></i></label>
				<input type="radio" id="cm_star-22" name="fa" value="2" data-vote=<?php
				if ($historico_ava[$random_id2]["AVA_NOTA"] >= 2 && $historico_ava[$random_id2]["AVA_NOTA"] < 3) {
				echo $ranking2 = "cm_star-22";
				}
				?>/>
				<label for="cm_star-33"><i class="fa"></i></label>
				<input type="radio" id="cm_star-33" name="fa" value="3" data-vote=<?php
				if ($historico_ava[$random_id2]["AVA_NOTA"] >= 3 && $historico_ava[$random_id2]["AVA_NOTA"] < 4) {
				echo $ranking2 = "cm_star-33";
				}
				?>/>
				<label for="cm_star-44"><i class="fa"></i></label>
				<input type="radio" id="cm_star-44" name="fa" value="4" data-vote=<?php
				if ($historico_ava[$random_id2]["AVA_NOTA"] >= 4 && $historico_ava[$random_id2]["AVA_NOTA"] < 5) {
				echo $ranking2 = "cm_star-44";
				}
				?>/>
				<label for="cm_star-55"><i class="fa"></i></label>
				<input type="radio" id="cm_star-55" name="fa" value="5" data-vote=<?php
				if ($historico_ava[$random_id2]["AVA_NOTA"] >= 5 && $historico_ava[$random_id2]["AVA_NOTA"] < 6) {
				echo $ranking2 = "cm_star-55";
				}
				
				?>/>
				</div>
				
				<span id="comentarios_descricao">"<?php echo ucprimeiro($historico_ava[$random_id2]["AVA_DESCRICAO"]); ?>"</span><br/><br/>
				<span id="comentarios_autor"><?php echo $USU_NOME_2; ?></span>

				<?php else: ?>
				<br/>
				<center><span id="comentarios_mensagem" >Não possui ainda uma segunda avaliação.<a id="link_avaliacao" href="ava_formulario.php">Faça agora a sua :)</a></span></center>
				<br/><br/>
				<?php endif; ?>

				</blockquote>
				
				<!-- Quote 3 -->
				
				<blockquote class="item">
<span id="nome_est"><b><?php echo $nome_est; ?></b></span>	<br/><br/>
				<?php 			
				if ($total_avaliacoes>= 3): ?>

				<div class="estrelas">
				<label for="cm_star-111"><i class="fa"></i></label>
				<input type="radio" id="cm_star-111" name="fc" value="1" data-vote=<?php
				if ($historico_ava[$random_id3]["AVA_NOTA"] >= 0 && $historico_ava[$random_id3]["AVA_NOTA"] < 2) {
				echo $ranking3 = "cm_star-111";
				}
				?>/>
				<label for="cm_star-222"><i class="fa"></i></label>
				<input type="radio" id="cm_star-222" name="fc" value="2" data-vote=<?php
				if ($historico_ava[$random_id3]["AVA_NOTA"] >= 2 && $historico_ava[$random_id3]["AVA_NOTA"] < 3) {
				echo $ranking3 = "cm_star-222";
				}
				?>/>
				<label for="cm_star-333"><i class="fa"></i></label>
				<input type="radio" id="cm_star-333" name="fc" value="3" data-vote=<?php
				if ($historico_ava[$random_id3]["AVA_NOTA"] >= 3 && $historico_ava[$random_id3]["AVA_NOTA"] < 4) {
				echo $ranking3 = "cm_star-333";
				}
				?>/>
				<label for="cm_star-444"><i class="fa"></i></label>
				<input type="radio" id="cm_star-444" name="fc" value="4" data-vote=<?php
				if ($historico_ava[$random_id3]["AVA_NOTA"] >= 4 && $historico_ava[$random_id3]["AVA_NOTA"] < 5) {
				echo $ranking3 = "cm_star-444";
				}
				?>/>
				<label for="cm_star-555"><i class="fa"></i></label>
				<input type="radio" id="cm_star-555" name="fc" value="5" data-vote=<?php
				if ($historico_ava[$random_id3]["AVA_NOTA"] >= 5 && $historico_ava[$random_id3]["AVA_NOTA"] < 6) {
				echo $ranking3 = "cm_star-555";
				}
				?>/>
				</div>
				
				<span id="comentarios_descricao">"<?php echo ucprimeiro($historico_ava[$random_id3]["AVA_DESCRICAO"]); ?>"</span><br/><br/>
				<span id="comentarios_autor"><?php echo $USU_NOME_3; ?></span>

				<?php else: ?>
				<br/>
				<center><span id="comentarios_mensagem" >Não possui ainda uma terceira avaliação.<a id="link_avaliacao" href="ava_formulario.php">Faça agora a sua :)</a></span></center>
				<br/><br/>
				<?php endif; ?>
				
				</blockquote>
				
				</div>

				

				</div>                          

				</div> 
				</center>
		</section>
	
	<div style="width: 100%; padding: 30px;"></div>
	
   <!-- Portfolio Grid Section -->
  <section id="semana">
   <section id="portfolio" class="bg-light-gray">
	
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 id="txtma" class="selectionma">Estabelecimentos com tendências de problemas</h2><br>
				</div>
			</div>

  <table id="" class="table table-striped table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Estabelecimento</th>
        <th>Categoria</th>
        <th>Pontuação</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1#</td>
        <td>Tuca Semi Joias</td>
        <td>Acessórios</td>
		<td>97.8</td>
      </tr>
      <tr>
        <td>2#</td>
        <td>Chiquinho Sorvetes</td>
        <td>Sorveteria</td>
				<td>90.3</td>
      </tr>
      <tr>
        <td>3#</td>
        <td>Espaço Girl</td>
        <td>Vestuário</td>
		<td>89.9</td>
      </tr>
      <tr>
        <td>4#</td>
        <td>Açaí Mania</td>
        <td>Sorveteria</td>
		<td>89.3</td>
      </tr>
      <tr>
        <td>5#</td>
        <td>Actual</td>
        <td>Vestuário</td>
		<td>89.4</td>
      </tr>
    </tbody>
  </table>
</div>

    </section>
	</section>
	
</div>
  
    <section id="features" class="parallax">
	<div id="index_div_responsivo"></div>
    <div class="container">
	<center>
      <div class="row count">
        <div class="col-sm-3 col-xs-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
          <i class="fa fa-user"></i>
          <h3 class="timer"><?php echo $quantidade_usuarios ?></h3>
          <p>Usuários Cadastrados</p>
        </div>
        <div class="col-sm-3 col-xs-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
          <i class="fa fa-desktop"></i>
          <h3 class="timer"><?php echo $quantidade_estabelecimentos ?></h3>                    
          <p>Estabelecimentos Cadastrados</p>
        </div> 
        <div class="col-sm-3 col-xs-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="700ms">
          <i class="fa fa-free-code-camp"></i>
          <h3 class="timer"><?php echo $quantidade_reclamacoes ?></h3>                    
          <p>Reclamações Feitas</p>
        </div> 
        <div class="col-sm-3 col-xs-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="900ms">
          <i class="fa fa-star-o"></i>                    
          <h3><?php echo $quantidade_avaliacoes ?></h3>
          <p>Avaliações Feitas</p>
        </div>                 
      </div>
	  </center>
    </div>
  </section>
  
	  <!--/#about-us-->

<!--RODAPÉ-->
<center>
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
</center>
<!--script em geral-->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="js/jquery.inview.min.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/mousescroll.js"></script>
<script type="text/javascript" src="js/smoothscroll.js"></script>
<script type="text/javascript" src="js/jquery.countTo.js"></script>
<script type="text/javascript" src="js/main.js"></script>

<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>	

<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>

<script type="text/javascript" src="js/index.js"></script>

<a href="#" id="toTop"> <span id="toTopHover"></span></a>
<!-- //smooth scrolling-bottom-to-top -->

<script type="text/javascript" src="js/mod_xhr.js"></script>
<script type="text/javascript" src="js/mod03/notificacao.js"></script>
<script type="text/javascript" src="js/autocomplete.js"></script>

<script language="javascript" type="text/javascript">
	document.getElementById('<?php
	echo $ranking;
	?>').click(); 
	document.getElementById("cm_star-1").disabled = true;
	document.getElementById("cm_star-2").disabled = true;
	document.getElementById("cm_star-3").disabled = true;
	document.getElementById("cm_star-4").disabled = true;
	document.getElementById("cm_star-5").disabled = true;
	</script>

	<script language="javascript" type="text/javascript">
	document.getElementById('<?php
	echo $ranking2;
	?>').click(); 
	document.getElementById("cm_star-11").disabled = true;
	document.getElementById("cm_star-22").disabled = true;
	document.getElementById("cm_star-33").disabled = true;
	document.getElementById("cm_star-44").disabled = true;
	document.getElementById("cm_star-55").disabled = true;
	</script>

	<script language="javascript" type="text/javascript">
	document.getElementById('<?php
	echo $ranking3;
	?>').click(); 
	document.getElementById("cm_star-111").disabled = true;
	document.getElementById("cm_star-222").disabled = true;
	document.getElementById("cm_star-333").disabled = true;
	document.getElementById("cm_star-444").disabled = true;
	document.getElementById("cm_star-555").disabled = true;
	</script>
	
	<script>
				function erroUsuario() 
				{  swal( "Estabelecimento não encontrado" ,  "Por favor, tente novamente" ,  "error" );
				}
				
				function avaliacaoatualizada() 
				{  swal( "Avaliação atualizada com sucesso" ,  "Obrigado por utilizar nosso portal!" ,  "success" );
				}
				
				function avaliacaoinserida() 
				{  swal( "Avaliação inserida com sucesso" ,  "Obrigado por utilizar nosso portal!" ,  "success" );
				}
    </script>

				
                 <?php function escrevaEstabelecimento(){
                    	echo "<script>erroUsuario();</script>"; 
                 }							
				?>
				
				<?php function escrevaavaliacaoatualizada(){
                    	echo "<script>avaliacaoatualizada();</script>"; 
                 }							
				?>

				<?php function escrevaavaliacaoinserida(){
                    	echo "<script>avaliacaoinserida();</script>"; 
                 }							
				?>
				
				<?php if(isset($_SESSION['estabelecimento'])){
									echo escrevaEstabelecimento();
									unset( $_SESSION['estabelecimento']);
								}?>
								
				<?php if(isset($_SESSION['avaliacaoatualizada'])){
									echo escrevaavaliacaoatualizada();
									unset( $_SESSION['avaliacaoatualizada']);
								}?>
								
				<?php if(isset($_SESSION['avaliacaoainserida'])){
									echo escrevaavaliacaoinserida();
									unset( $_SESSION['avaliacaoainserida']);
								}?>

</body>
</html>