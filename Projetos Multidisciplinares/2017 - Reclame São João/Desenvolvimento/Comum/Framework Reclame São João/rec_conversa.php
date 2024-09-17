<?php

	session_start();
	include 'controle/ReclamacoesDAO.php';
	include ("controle/EstabelecimentosDAO.php");
	include ("controle/UsuarioDAO.php");
	include ("controle/ConsumidorDAO.php");
	include ("controle/LocalizacaoDAO.php");
	include ("controle/RespostaReclamacaoDAO.php");
	include ("controle/ConsideracaoFinalDAO.php");
	$rec_id    = $_GET["REC_ID"];
	$_SESSION["not_reclamacao_id"]   = $rec_id;
	$ReclamacaoDAO = new ReclamacoesDAO;
	$ConsideracaoFinalDAO = new ConsideracaoFinalDAO;
	$UsuarioDAO = new UsuarioDAO;
	$ConsumidorDAO = new ConsumidorDAO;
	
	$USU_NOME = $ReclamacaoDAO->retornandoNome();
	$nome_estabelecimento = $ReclamacaoDAO->informacoesPagina();
    $resultado = $ReclamacaoDAO->obterReclamacaoPorId($rec_id);
	$listar_consideracao_final = $ConsideracaoFinalDAO->listarTudo($rec_id);
	$primeiromaiusculo = $ReclamacaoDAO->primeiroMaiusculo();
	
	if($USU_NOME !=NULL):
	$USU_EMAIL_LOGADO = $ReclamacaoDAO->retornandoEmail();
	$USU_ID_LOGADO = $UsuarioDAO->buscarUsuario($USU_EMAIL_LOGADO);
	$CON_ID_ISSET_LOGADO = $ConsumidorDAO->idConIsset($USU_ID_LOGADO);
	if($CON_ID_ISSET_LOGADO !=NULL):
	$CON_ID_LOGADO = $ConsumidorDAO->idCon($USU_ID_LOGADO);
	else:
	endif;
	else:
	$CON_ID_LOGADO = null;
	endif;

	foreach ($listar_consideracao_final as $row):
		$COF_ID             = $row["COF_ID"];
		$COF_DESCRICAO        = $row["COF_DESCRICAO"];
		$COF_STATUS_RESOLVIDO                = $row["COF_STATUS_RESOLVIDO"];
		$COF_REC_ID                = $row["REC_ID"];
	endforeach;
	
	foreach ($resultado as $row):
		$REC_ID             = $row["REC_ID"];
		$REC_TITULO_RECLAMACAO        = $row["REC_TITULO_RECLAMACAO"];
		$REC_DESCRICAO                = $row["REC_DESCRICAO"];
		$REC_NOTA           = $row["REC_NOTA"];
		$REC_DATA_HORA              = $row["REC_DATA_HORA"];
		$REC_APROVADO                 = $row["REC_APROVADO"];
		$REC_LINK_IMAGEM             = $row["REC_LINK_IMAGEM"];
		$CON_ID                    = $row["CON_ID"];
		$EST_ID                     = $row["EST_ID"]; 
	endforeach;

	$ConsumidorDAO = new ConsumidorDAO;
	$USU_ID = $ConsumidorDAO->retornar_USU_ID($CON_ID);
	$LOC_ID = $ConsumidorDAO->selecionar_localizacao($CON_ID);

	$UsuarioDAO = new UsuarioDAO;
	$NOME_CONSUMIDOR = $UsuarioDAO->selecionarNome($USU_ID);

	$LocalizacaoDAO = new LocalizacaoDAO;
	$LOC_BAIRRO = $LocalizacaoDAO->selecionarLocId($LOC_ID);

	$EstabelecimentosDAO = new EstabelecimentosDAO;
	$NOME_FANTASIA = $EstabelecimentosDAO->selecionarNomeEstabelecimento($EST_ID);
		
	$RespostaReclamacaoDAO = new RespostaReclamacaoDAO;
	$resultado_resposta_reclamacao = $RespostaReclamacaoDAO->pesquisarPorRecId($REC_ID);
	if($resultado_resposta_reclamacao!=null):
	foreach ($resultado_resposta_reclamacao as $row):
		$RER_ID             = $row["RER_ID"];
		$RER_DATA_HORA        = $row["RER_DATA_HORA"];
		$RER_DESCRICAO                = $row["RER_DESCRICAO"];
	endforeach;
	$RER_DATA = date('d-m-Y', strtotime(str_replace('-','/', $RER_DATA_HORA)));
	$RER_HORA = date('H:i', strtotime(str_replace('-','/', $RER_DATA_HORA)));
	else:
	endif;
	$REC_DATA = date('d-m-Y', strtotime(str_replace('-','/', $REC_DATA_HORA)));
	$REC_HORA = date('H:i', strtotime(str_replace('-','/', $REC_DATA_HORA)));
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
	<link href="css/rec_conversa.css" rel="stylesheet">
	<link href="css/rec_estabelecimento.css" rel="stylesheet">
	<link href="css/rec_formulario.css" rel="stylesheet">
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
			<li class="scroll active" id="menu_botao"><a href="#main-wrapper" id="cabecalho_a">Formulario</a></li>
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
			</ul>
		</div>
		
      </div>
    </div><!--/#main-nav-->
	
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<div id="header" class="container">
						<!-- Logo -->
										
						<h1 id="logo"><a href="#footer"><?php echo 'Reclamação #'.$REC_ID; ?></a></h1>
						<h1 id="logo2"><a href="#footer"><?php echo ('Bem Vindo a página da Reclamação'); ?></a></h1>
						<p>Bem Vindo á página. Veja aqui a reclamação feita pela população!.</p>
				
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
				<td><center><span class="fa fa-eye" id="form_icon"></span></center></td>
				<td><center><span class="form_titulo">Detalhes da Reclamação <br/>feita por <span id="capitalize"><?php echo $NOME_CONSUMIDOR ?>!</span></span></center></td>
				</tr>
				</table></center>
				
				<center><table id="rec_table_titulo_responsivo">
				<tr>
				<td><center><span class="fa fa-eye" id="form_icon"></span></center></td>
				</tr>
				<tr>
				<td><center><span class="form_titulo">Veja Aqui a Reclamação feita pela <strong>população!</strong></span></center></td>
				</tr>
				</table></center>
				
				<div class="rec_div_formulario">
				<div class="rec_div_conteudo_formulario">
				
				
				<p class="not_titulo"><?php echo ucprimeiro(wordwrap($REC_TITULO_RECLAMACAO, 48,  "<br/>")); ?></p>
				
				<span style="font-size: 10px;">
				<span id="not_nome_estabelecimento"><?php echo $NOME_FANTASIA; ?></span></br>
				<span>São João da Boa Vista - <?php echo $LOC_BAIRRO; ?></span>
				<span id="nome_consumidor">Usuario: <?php echo $NOME_CONSUMIDOR;  ?></span>
				<span id="margin-left">Data: <?php echo $REC_DATA;echo ' às '; echo $REC_HORA;  ?></span>
				</span>
				
				<p class="descricao">
				<?php echo ucprimeiro($REC_DESCRICAO); ?>.				
				</p>	
				
				
				<?php if($resultado_resposta_reclamacao!=null): ?>
				
				<p class="not_titulo_resposta">Resposta Estabelecimento</p>
				
				<span style="font-size: 10px;">
				<span>Data: <?php echo $RER_DATA;echo ' às '; echo $REC_HORA;  ?></span>
				</span>
				
				<p class="descricao_resposta">
				Prezado cliente, <br/><?php echo $RER_DESCRICAO; ?><br/>Atenciosamente, <span id="capitalize"><?php echo $NOME_FANTASIA; ?></span>.
				</p>
				
				<?php
				$validar = isset($COF_REC_ID);
				if($validar==1):
				$rec_id_consideracao_final = $COF_REC_ID;
				else:
				$rec_id_consideracao_final = 0;
				endif;
				?>
				
				<?php if($CON_ID_LOGADO == $CON_ID && $rec_id_consideracao_final != $REC_ID): ?>
				<form method="POST" action="http://localhost/RECLAME_SAO_JOAO-INTEGRAR/php/mod02/rec_conversa.php" enctype="multipart/form-data">
				
				<label for="consideracaofinal" class="rec_label">Escreva a consideração final da sua reclamação</label><br/>
				<textarea name="COF_DESCRICAO" id="form_assunto" rows="20" cols="70" placeholder="Escreva aqui se sua reclamação foi resolvida..." maxlength="75" required="required"></textarea>
				
				<label for="consideracaofinal" class="rec_label">Seu problema foi resolvido?</label><br/>
				<pre><input type="radio" name="consideracao" value="1"/><span id="not_span_radio">Sim</span></pre> 
				<pre><input type="radio" name="consideracao" value="0"/><span id="not_span_radio">Não</span></pre> 
				<button type="submit" name="submit" class="rec_botao">Enviar</button>
				</form>
				<?php else: ?>
				
				<label for="consideracaofinal" class="rec_label">Consideração Final do Consumidor</label><br/>
				<textarea name="COF_DESCRICAO" id="form_assunto" rows="20" cols="70" placeholder="Escreva aqui se sua reclamação foi resolvida..." maxlength="50" required="required"><?php echo $COF_DESCRICAO; ?></textarea>

				<br/><br/>
				<p class="descricao_resposta">
				<?php if($COF_STATUS_RESOLVIDO==1): ?>
				<span id="glyphicon" class="glyphicon glyphicon-ok"></span>Problema Resolvido
				<?php else: ?>
				<span id="glyphicon" class="glyphicon glyphicon-remove"></span>&nbsp&nbsp
				Problema não resolvido
				<?php endif; ?>
				</p>
				<a href="index.php"><button type="submit" class="rec_botao">Voltar Página Inicial</button></a>
				<?php endif; ?>
				<?php else: endif; ?>
				
			
			</div>
			</div>
				
				<form action="rec_estabelecimento.php" method=get name="formulario3"> 
				<input type="hidden" name="EST_NOME" value="<?php echo $_SESSION["nome"]; ?>">
				<input type="hidden" name="link" value="index.php">
				</form> 

				<form action="rec_formulario.php" method=post name="formulario1"> 
				<input type="hidden" name="reclamar" value="<?php echo ($nome_estabelecimento);?>">
				</form> 

				<form action="ava_formulario.php" method=post name="formulario2"> 
				<input type="hidden" name="avaliar" value="<?php echo ($nome_estabelecimento);?>">
				</form> 
				
		</div>

<!--RODAPÉ-->
	<iframe id="divframerodape" style="" frameborder="0" scrolling="NO" src='rec_rodape.php'></iframe>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/redirect.js"></script>

	</body>
</html>