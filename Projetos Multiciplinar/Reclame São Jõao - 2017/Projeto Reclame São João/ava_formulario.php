<?php
   	session_start();

	include ('controle/ReclamacoesDAO.php');
	include ('controle/UsuarioDAO.php');
	include ("controle/EstabelecimentosDAO.php");
	include ('controle/ConsumidorDAO.php');
	$ReclamacaoDAO = new ReclamacoesDAO;
	$UsuarioDAO = new UsuarioDAO;
	$ConsumidorDAO = new ConsumidorDAO;
	$estabelecimentosPdo = new EstabelecimentosDAO;
	$link = 'http://localhost/RECLAME_SAO_JOAO-INTEGRAR/rec_pesquisar_estabelecimento.php?PESQUISAR_ID=2';
	
	$nome_estabelecimento = $ReclamacaoDAO->informacoesPagina();
	$USU_NOME = $ReclamacaoDAO->retornandoNome();
	$resultadoest = $estabelecimentosPdo->obterEstabelecimentoPorNome($nome_estabelecimento);
	
	if($resultadoest==null):
	echo "<script>alert('Estabelecimento nao encontrado')</script><script>window.location='$link';</script>";
	else:
	endif;
	
	if($USU_NOME !=NULL):
	$USU_EMAIL = $ReclamacaoDAO->retornandoEmail();
	$USU_ID = $UsuarioDAO->buscarUsuario($USU_EMAIL);
	$CON_ID_ISSET = $ConsumidorDAO->idConIsset($USU_ID);
	if($CON_ID_ISSET !=NULL):
	$CON_ID = $ConsumidorDAO->idCon($USU_ID);
	else:
	endif;
	else:
	$CON_ID = null;
	endif;
	
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
	<link href="css/rec_avaliar.css" rel="stylesheet">
	<link href="css/rec_estabelecimento.css" rel="stylesheet">
	<link href="css/rec_formulario.css" rel="stylesheet">
	<link rel="shortcut icon" href="images/favicon.ico">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
<script src = "https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
			<li class="scroll active" id="menu_botao"><a href="#main-wrapper" id="cabecalho_a">Avaliar Estabelecimento</a></li>
			<li class="scroll" id="menu_botao"><a href="index.php" id="cabecalho_a">Home</a></li>
			<?php
			if($CON_ID !=NULL){
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
							<p>Bem Vindo a página de avaliação. Aqui voce pode fazer a sua avaliação.</p>
				
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
				
				<center><table id="rec_table_titulo">
				<tr>
				<td><center><span class="fa fa-star-half-o" id="form_icon"></span></center></td>
				<td><center><span class="form_titulo">Preencha o formulário para <br/>fazer sua <strong>avaliação!</strong></span></center></td>
				</tr>
				</table></center>
				
				<center><table id="rec_table_titulo_responsivo">
				<tr>
				<td><center><span class="fa fa-star-half-o" id="form_icon"></span></center></td>
				</tr>
				<tr>
				<td><center><span class="form_titulo">Preencha o formulário para fazer sua <strong>avaliação!</strong></span></center></td>
				</tr>
				</table></center>
								
				<div class="rec_div_formulario">
				<div class="rec_div_conteudo_formulario">
				
				<p class="ava_label">É muito importante que você faça a avaliação de maneira objetiva e demonstre apenas o seu sentimento em relação ao estabelecimento 
				avaliado, dessa maneira voce ajudara outros usuarios.</p>
				
				<form action="php/mod02/notaAvaliacao.php" method="GET">
				
				<label for="descricao" class="ava_label">Escreva sua avaliação</label>
				<textarea name="descricao" id="form_assunto" rows="20" cols="70" placeholder="Escreva aqui todos os detalhes da sua reclamação..." maxlength="75" required="required"></textarea>

				<label for="descricao" class="ava_label_estrelas">Selecione as estrelas...</label>
				<div class="ava_estrelas">
				<input type="radio" id="cm_star-empty" name="valor" value="" checked/>
				<label for="cm_star-1"><i class="fa"></i></label>
				<input type="radio" id="cm_star-1" name="valor" value="1"/>
				<label for="cm_star-2"><i class="fa"></i></label>
				<input type="radio" id="cm_star-2" name="valor" value="2"/>
				<label for="cm_star-3"><i class="fa"></i></label>
				<input type="radio" id="cm_star-3" name="valor" value="3"/>
				<label for="cm_star-4"><i class="fa"></i></label>
				<input type="radio" id="cm_star-4" name="valor" value="4"/>
				<label for="cm_star-5"><i class="fa"></i></label>
				<input type="radio" id="cm_star-5" name="valor" value="5"/>
				<i class="fa"></i>
				</div>
				
				<button type="submit"  onclick="enviar()" class="ava_botao">Avaliar</button></a>
				</form>
				
				</div></div>
				 
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
		
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="js/main.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="js/redirect.js"></script>
		
	</body>
</html>