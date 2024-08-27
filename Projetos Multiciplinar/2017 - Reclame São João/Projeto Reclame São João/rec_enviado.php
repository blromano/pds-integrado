<?php
	session_start();
	
	include 'controle/ReclamacoesDAO.php';

	$ReclamacaoDAO = new ReclamacoesDAO;
	$nome_estabelecimento = $ReclamacaoDAO->informacoesPagina();
	$USU_NOME = $ReclamacaoDAO->retornandoNome();
	
	header("Content-Type: text/html; charset=ISO-8859-1",true);
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
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link href="css/menu.min.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/testes.css" rel="stylesheet">
	<link href="css/rodape2.css" rel="stylesheet">
	<link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/depoimentos.css" rel="stylesheet">
	<link href="css/rec_estabelecimento.css" rel="stylesheet">
	<link href="css/rec_formulario.css" rel="stylesheet">
	<link href="css/rec_revise.css" rel="stylesheet">
	<link rel="shortcut icon" href="images/favicon.ico">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
	
	</head>
	
	<body class="homepage">
	
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
            <h1><img class="img-responsive" src="images/logo.png" alt="logo"/></h1>
          </a>   
        </div>

		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">   
			<li class="scroll active" id="menu_botao"><a href="#main-wrapper" id="cabecalho_a">Reclamação Enviada</a></li>
			<li class="scroll" id="menu_botao"><a href="index.php" id="cabecalho_a">Home</a></li>
			<?php
			if($USU_NOME !=NULL){
			?>
			<li class="dropdown">
			<a id="cor" class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"><span class="glyphicon glyphicon-user"></span><?PHP ECHO $_SESSION['USU_NOME'] ?><span class="caret"></span></a>
			<ul class="dropdown-menu">
			<li><a id="font-cor" href="rec_gerenciar.php"><span class="glyphicon glyphicon glyphicon-cog"></span> Meu Perfil</a></li>
			<li class="divider"></li>
			<li><a id="font-cor" href="php/mod01/sair.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
			</ul>
			</li>
			<?php
			}else{
			echo "<script>window.location = 'rec_logar.php';</script>";
			}
			?>
			</ul>
		</div>
		
      </div>
    </div><!--/#main-nav-->
	
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<div id="header" class="container">

						<!-- Logo -->
						
						
							<h1 id="logo"><a href="#footer"><?php echo wordwrap($nome_estabelecimento, 20,  "<br/><br/>"); ?></a></h1>
							<h1 id="logo2"><a href="#footer"><?php echo ($nome_estabelecimento); ?></a></h1>
							<p>Prontinho!!! Sua reclamação foi enviada agora só aguardar a aprovação.</p>
				
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

				<!-- Conteudo -->
				
				<center><table id="enviado_table_titulo">
				<tr>
				<td><center><span class="glyphicon glyphicon-ok" id="form_icon"></span></center></td>
				<td><center><span class="form_titulo">Sua Reclamação foi enviada para <br/> nossos administradores com <strong>sucesso!</strong></span></center></td>
				</tr>
				</table></center>			
				
				<center><table id="rec_table_titulo_responsivo">
				<tr>
				<td><center><span class="glyphicon glyphicon-ok" id="form_icon"></span></center></td>
				</tr>
				<tr>
				<td><center><span class="form_titulo">Sua Reclamação foi enviada para nossos administradores com <strong>sucesso!</strong></span></center></td>
				</tr>
				</table></center>
				
				<div class="rec_div_formulario" >
				<div class="rec_div_conteudo_formulario">
				
				<div id="enviado_texto">
				
				<p>A sua parte está feita. Agora é necessário aguardar o estabelecimento responder e fazer a parte dele.
				Assim que você postou a reclamação o estabelecimento reclamado foi notificada através de um e-mail.</p>
				
				<p>A sua reclamação ainda precisa ser aprovada por nossos administrativos, afim de filtrar termos pejorativos (‘crime’, ‘lesado’, por exemplo),
				ou publicação de dados pessoais e particulares de terceiros</p>
				
				<p>Você pode acessar a sua reclamação:<br/>
				Basta acessar o seu <a href="usu_paginaBoasVindasUsuario.php"><span id="enviado_link">perfil</span></a>
				e ir até <a href="rec_gerenciar.php"><span id="enviado_link">minhas reclamações</span></a>
				</p>
				</div>
				
				<center><a href="index.php"><button type="submit" class="enviado_botao">Voltar ao Menu</button></a></center>
				</div>
				
				<form action="rec_estabelecimento.php" method=get name="formulario3"> 
				<input type="hidden" name="EST_NOME" value="<?php echo $_SESSION["nome"]; ?>"></input>
				<input type="hidden" name="link" value="index.php"/>
				</form> 

				<form action="rec_formulario.php" method=post name="formulario1"> 
				<input type="hidden" name="reclamar" value="<?php echo ($nome_estabelecimento);?>"></input>
				</form> 

				<form action="ava_formulario.php" method=post name="formulario2"> 
				<input type="hidden" name="avaliar" value="<?php echo ($nome_estabelecimento);?>"></input>
				</form> 
				
		</div>
		

		<!--RODAPÉ-->
	<iframe id="divframerodape" style="" frameborder="0" scrolling="NO" src='rec_rodape.php'></iframe>

<!--script em geral-->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="js/main.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/bloqueio.js"></script>
<script type="text/javascript" src="js/redirect.js"></script>

	</body>
</html>