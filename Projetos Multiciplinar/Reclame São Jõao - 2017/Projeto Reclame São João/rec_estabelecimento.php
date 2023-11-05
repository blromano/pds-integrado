<?php
	session_start();
	$link     = $_GET["link"];
	$busca    = $_GET["EST_NOME"];
	
	include ("controle/Conexao.php");
	include ("controle/EstabelecimentosDAO.php");
	include ("controle/AvaliacoesDAO.php");
	include ("controle/ConsumidorDAO.php");
	include ("controle/ReclamacoesDAO.php");
	include ("controle/UsuarioDAO.php");
	$ConsumidorDAO = new ConsumidorDAO;
	$estabelecimentosPdo = new EstabelecimentosDAO;
	$notasPdo = new AvaliacoesDAO;
	$ReclamacaoDAO = new ReclamacoesDAO;
	$UsuarioDAO = new UsuarioDAO;
    $primeiromaiusculo = $ReclamacaoDAO->primeiroMaiusculo();
	$resultadoest = $estabelecimentosPdo->obterEstabelecimentoPorNome($busca);
  
  
   if (count($resultadoest)==0) {
		$_SESSION['estabelecimento'] = "Estabelecimento não encontrado!";
	
		echo "<script>window.location='$link';</script>";
   } else {
      
           foreach ($resultadoest as $row) {
               $nome_responsavel             = $row["EST_NOME_RESPONSAVEL"];
               $total_nota_reclamacao        = $row["EST_TOTAL_RECLAMACAO"];
               $nome_fantasia                = $row["EST_NOME_FANTASIA"];
               $id_estabelecimento           = $row["EST_ID"];
               $numero_endereco              = $row["EST_NUMERO_ENDERECO"];
               $publico_alvo                 = $row["EST_PUBLICO_ALVO"];
               $facebook_empresa             = $row["EST_FACEBOOK_EMPRESA"];
               $longitude                    = $row["EST_LONGITUDE"];
               $latitude                     = $row["EST_LATITUDE"];
               $bloqueio                     = $row["EST_STATUS_BLOQUEIO"];
               $media_avaliacao_consumidores = $row["EST_MEDIA_AVALIACAO_CONSUMIDORES"];
               $media_reclamacao             = $row["EST_MEDIA_RECLAMACAO"];
               $complemento                  = $row["EST_COMPLEMENTO"];
               $site                         = $row["EST_SITE_EMPRESA"];     
           }
       }       
	      
	$_SESSION["nome"]   = $nome_fantasia;
	$_SESSION["EST_ID"] = $id_estabelecimento;     
	$_SESSION["facebook"] = $facebook_empresa;  
	$USU_NOME = $ReclamacaoDAO->retornandoNome();
	$_SESSION["BUSCA"] = $busca; 
	$_SESSION["media_avaliacao_consumidores"] = $media_avaliacao_consumidores;

   //AVALIAÇÕES
   
   $resultadonota = $notasPdo->nota_estabelecimento($id_estabelecimento);
   
   if ($resultadonota != null) {
       foreach ($resultadonota as $row) {
           $positivas = null;
           $neutras   = null;
           $negativas = null;
           $total     = 0;
           $media_ava = null;
            foreach ($resultadonota as $row) {
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
   
    $resultadototal = $notasPdo->total_notas($id_estabelecimento);
	
	   if ($resultadototal[0]["qtde"] == 0) {
           $media_ava        = 0;
           $total_avaliacoes = 0;
           $total            = 0;
           $positivas        = 0;
           $neutras          = 0;
           $negativas        = 0;
           $_SESSION["total"]=0;
		   $_SESSION["total_avaliacoes"]=0;
       } else if ($resultadototal[0]["qtde"] > 0) {	
           $total_avaliacoes = $resultadototal[0]["qtde"];  
           $media_ava = $total / $total_avaliacoes;
		   $media_avaliacao_round = ROUND($media_ava, 0);
		   $_SESSION["total"]=$total;
		   $_SESSION["total_avaliacoes"]=$total_avaliacoes;
       }
	   
	   
	// RANDOM AVA_ID TO DESCRIPTIONS

	$resultado = $notasPdo->total_notas($id_estabelecimento);
	$total_avaliacoes=$resultado[0]["qtde"];

	if($total_avaliacoes>=4){
	$random_id1=(rand(0,$total_avaliacoes-3));
	$random_id2=($random_id1+1);
	$random_id3=($random_id2+1);
	$historico_ava=$notasPdo->HistoricoAvaliacoes($id_estabelecimento);
	}
	
	else if ($total_avaliacoes==1){
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
	}
	
	else if ($total_avaliacoes==3){
	$random_id1=0;
	$random_id2=1;
	$random_id3=2;
	$historico_ava=$notasPdo->HistoricoAvaliacoes($id_estabelecimento);
	}
	
	//Atualizar Media Reclamacao
	$atualizar_reclamacao = $ReclamacaoDAO->TotalNotasReclamacoes($id_estabelecimento);
	
	//Atualizar Total Reclamacao
	$total_reclamacoes = $estabelecimentosPdo->pesquisarReclamacoesPorEstabelecimento($id_estabelecimento);

	//Atualizar Media Avaliacao
	$atualizar_avaliacao = $notasPdo->atualizar_avaliacao_estabelecimento($media_ava,$id_estabelecimento);

	if($total_avaliacoes!=0){
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
	}else{
		
	}	
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Reclame São João</title>
		
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="css/rec_main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/css/rec_ie8.css" /><![endif]-->
		<title>Reclame São João</title>
		<link href="css/menu.min.css" rel="stylesheet">
		<link href="css/animate.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/testes.css" rel="stylesheet">
		<link href="css/rodape2.css" rel="stylesheet">
		<link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		<link href="css/depoimentos.css" rel="stylesheet">
		<link href="css/rec_estabelecimento.css" rel="stylesheet">
		<link rel="shortcut icon" href="images/favicon.ico">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
		<link href="css/rec_estrela.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/avaliations.js"></script>
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />

	</head>
	
	<body class="homepage" id="conteudocentral">
	
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

		<form action="rec_estabelecimento.php" method=get name="formulario3"> 
		<input type="hidden" name="EST_NOME" value="<?php echo $_SESSION["nome"]; ?>">
		<input type="hidden" name="link" value="index.php">
		</form> 		
	
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">   
			<li class="scroll active" id="menu_botao"><a onclick="redirect()" id="cabecalho_a">Estabelecimento</a></li>
			<li class="scroll" id="menu_botao"><a href="index.php" id="cabecalho_a">Home</a></li>
			<?php
			if (isset($_SESSION['USU_EMAIL'])):
			$tipo = $UsuarioDAO->verificarUsuario($_SESSION['USU_EMAIL']);
			if ($tipo == 'est'):
			?>
			<li class="dropdown">
			<a id="cor" class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['EST_NOME_FANTASIA']; ?><span class="caret"></span></a>
			<ul class="dropdown-menu">
			<li><a id="font-cor" href="rec_gerenciar.php"><span class="glyphicon glyphicon glyphicon-cog"></span> Meu Perfil</a></li>
			<li class="divider"></li>
			<li><a id="font-cor" href="php/mod01/sair.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
			</ul>
			</li>
			<?php
			elseif ($tipo == 'usr'):
			?>
			<li class="dropdown">
			<a id="cor" class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['USU_NOME']; ?><span class="caret"></span></a>
			<ul class="dropdown-menu">
			<li><a id="font-cor" href="rec_gerenciar.php"><span class="glyphicon glyphicon glyphicon-cog"></span> Meu Perfil</a></li>
			<li class="divider"></li>
			<li><a id="font-cor" href="php/mod01/sair.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
			</ul>
			</li>
			<?php
			else: endif;
			?>
			<?php
			else:
			?>
			<li class="scroll" id="menu_botao"><a href="usu_loginUsuario.php">Logar</a></li>
			<?php
			endif;
			?>
			<li id="extras" class="scroll"><a onclick="reclamar()" id="menu_botao"><span>Reclamar</span></a></li>
			<li id="extras" class="scroll"><a onclick="avaliar()" id="menu_botao"><span>Avaliar</span></a></li>
			<li id="extras" class="scroll"><a onclick="location.href='rec_info.php'" id="menu_botao"><span>Mais Informações</span></a></li>
			<li id="extras" class="scroll"><a onclick="location.href='rec_duvidas.php'" id="menu_botao"><span>Dúvidas</span></a></li>
		  </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
	
		<div id="page-wrapper">
<form action='rec_estabelecimento.php' method='get'>
  
  <center>
  <div class="pesquisa" id="barradepesquisa">  
    <input type='text'  name='EST_NOME' class="form-input check-value auto" id="inputpesquisa" placeholder="Buscar">
    <button type="submit" class="buttonpesquisa" name="destination-submit" onclick="location.href='rec_estabelecimento.php'".click()><span class="glyphicon glyphicon-search"></span></button>
  </div>
  <input type="hidden" name="link" value="index.php">
  </center>

</form>
			<!-- Header -->
				<div id="header-wrapper" >
				<div id="header" class="container" style="border-bottom: solid 0px #e5e5e5;box-shadow: inset 0px 0px 0px 0px #fff, inset 0px 0px 0px 0px #e5e5e5;">

						<!-- Logo -->
						
						
							<h1 id="logo"><a href="#footer"><?php echo wordwrap($nome_fantasia, 20,  "<br/><br/>"); ?></a></h1>
							<h1 id="logo2"><a href="#footer"><?php echo ($nome_fantasia); ?></a></h1>
							<p>Bem Vindo a página do estabelecimento. Aqui voce ve todas as informações do estabelecimento.</p>


						<form action="rec_formulario.php" method=post name="formulario1"> 
						<input type="hidden" name="reclamar" value="<?php echo ($nome_fantasia);?>">
						</form> 
								
						<form action="ava_formulario.php" method=post name="formulario2"> 
						<input type="hidden" name="avaliar" value="<?php echo ($nome_fantasia);?>">
						</form> 
				
						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li><a id="menu_botao" class="fa fa-comments" onclick="reclamar()"><span>Reclamar</span></a></li>
									<li><a id="menu_botao" class="fa fa-star-half-o" onclick="avaliar()"><span>Avaliar</span></a></li>
									<li><a id="menu_botao" class="fa fa-list-alt" onclick="redirect()"><span>Estabelecimento</span></a></li>
									<li><a id="menu_botao" class="fa fa-list-alt" onclick="location.href='rec_info.php'"><span>Mais Informações</span></a></li>
									<li><a id="menu_botao" class="fa fa-info-circle" onclick="location.href='rec_duvidas.php'"><span>Dúvidas</span></a></li>
								</ul>
							</nav>

					</div>
				</div>

	<!-- Banner -->
				<div id="banner-wrapper">
					<div class="inner">
						<section id="banner" class="container">
						
							<p>Clique no botão <strong>para encontrar</strong>,<br />
							Estabelecimentos cadastrados no mapa da cidade.</p>
							
                            
                        <ul class="vermapa">
							<li><a href="mapa.php" class="button icon fa-map-marker">Ver mapa</a></li>
						</ul>
						
						</section>
						
					</div>
				</div>

		

				<div id="features-wrapper">
					<section id="info" class="container">
						<header>
							<h2>Veja Tudo! Essas são <strong>Informações Importantes</strong>!</h2>
						</header>
						<div class="row">
							<div class="4u 12u(mobile)">
								<!-- Feature -->
									<section>
										<a href="rec_reclamacaoeavaliacao.php" class="image featured" id="info_circulo">
										<p id="info_valor_posicao">
										<?php
										if ($positivas != null):
										echo $positivas;	
										else:
										echo "0";									
										endif;
										?>
										</p></a>
										<header>
											<h3>Positivas</h3>
										</header>
										<p>
										Essas são as avaliações positivas feitas pelos usuarios cadastrados no sistema.</p>
									</section>

							</div>
							<div class="4u 12u(mobile)">

								<!-- Feature -->
									<section>
										<a href="rec_reclamacaoeavaliacao.php" class="image featured" id="info_circulo">
										<p id="info_valor_posicao">
										<?php
										if ($negativas != null):
										echo $negativas;	
										else:
										echo "0";									
										endif;
										?>
										</p></a>
										<header>
											<h3>Negativas</h3>
										</header>
										<p>
										Essas são as avaliações negativas feitas pelos usuarios cadastrados no sistema.</p>
									</section>

							</div>
							<div class="4u 12u(mobile)">

								<!-- Feature -->									
									<section>
										<a href="rec_reclamacaoeavaliacao.php" class="image featured" id="info_circulo">
										<p id="info_valor_posicao">
										<?php
										if ($neutras != null):
										echo $neutras;	
										else:
										echo "0";									
										endif;
										?>
										</p></a>
										<header>
											<h3>Neutras</h3>
										</header>
										<p>
										Essas são as avaliações neutras feitas pelos usuarios cadastrados no sistema.</p>
									</section>
							</div>
						</div>
						<div class="row" >
						
							<div class="4u 12u(mobile)" id="divinfo">

								<!-- Feature -->								
									<section>
										<a href="rec_reclamacaoeavaliacao.php" class="image featured" id="info_circulo">
										<p id="info_valor_posicao">
										<?php
										if ($total_avaliacoes != null):
										echo $total_avaliacoes;	
										else:
										echo "0";									
										endif;
										?>
										</p></a>
										<header>
											<h3>Total de avaliações</h3>
										</header>
										<p>
										Essas são todas as avaliações feitas pelos usuarios cadastrados no sistema.</p>
									</section>

							</div>
							<div class="4u 12u(mobile)" >

								<!-- Feature -->					
									<section>
										<a href="rec_reclamacaoeavaliacao.php" class="image featured" id="info_circulo">
										<p id="info_valor_posicao">
										<?php
										if ($total_reclamacoes != null):
										echo $total_reclamacoes;	
										else:
										echo "0";									
										endif;
										?>
										</p></a>
										<header>
											<h3>Total de reclamações</h3>
										</header>
										<p>
										Essas são todas as reclamações feitas pelos usuarios cadastrados no sistema.</p>
									</section>

							</div>
						</div>
						<ul class="actions">
							<li><a href="rec_reclamacaoeavaliacao.php" class="button icon fa-file">Ver Mais!!!</a></li>
						</ul>
					</section>
					
				</div>
		
		<!--RODAPÉ-->
		
		<iframe id="divframerodape" style="" frameborder="0" scrolling="NO" src='rec_rodape.php'></iframe>
		
	

	<!-- Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.dropotron.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-viewport.min.js"></script>
	<script src="js/util.js"></script>
	<script src="js/main.js"></script>

	<!--script essenciais -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/mousescroll.js"></script>
	<script type="text/javascript" src="js/smoothscroll.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

	<!--script do autocomplete-->
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>	
	<script type="text/javascript" src="js/autocomplete.js"></script>
	<script type="text/javascript" src="js/redirect.js"></script>
	
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
	
	</body>
</html>