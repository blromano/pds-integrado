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
	$link = 'http://localhost/RECLAME_SAO_JOAO-INTEGRAR/rec_pesquisar_estabelecimento.php?PESQUISAR_ID=1';
	
	$string = $ReclamacaoDAO->stringTamanho();
	$resultado = $ReclamacaoDAO->reclamacaoCategoria();
	$nome_estabelecimento = $ReclamacaoDAO->informacoesPagina();
	$USU_NOME = $ReclamacaoDAO->retornandoNome();
	$resultadoest = $estabelecimentosPdo->obterEstabelecimentoPorNome($nome_estabelecimento);
	
	if($resultadoest==null):
		session_start();
		$_SESSION['estabelecimento'] = "Estabelecimento não encontrado!";
	
		echo "<script>window.location='$link';</script>";
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
			if($CON_ID !=NULL):
			?>
			<li class="dropdown">
			<a id="cor" class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['USU_NOME'] ?><span class="caret"></span></a>
			<ul class="dropdown-menu">
			<li><a id="font-cor" href="rec_gerenciar.php"><span class="glyphicon glyphicon glyphicon-cog"></span> Meu Perfil</a></li>
			<li class="divider"></li>
			<li><a id="font-cor" href="php/mod01/sair.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
			</ul>
			</li>
			<?php
			else:
			echo "<script>window.location = 'rec_logar.php';</script>";
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
						
							<h1 id="logo"><a href="#footer"><?php echo wordwrap($nome_estabelecimento, 20,  "<br/><br/>"); ?></a></h1>
							<h1 id="logo2"><a href="#footer"><?php echo ($nome_estabelecimento); ?></a></h1>
							<p>Bem Vindo a página de Reclamação. Aqui voce pode fazer sua reclamação.</p>
				
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
				<td><center><span class="glyphicon glyphicon-fire" id="form_icon"></span></center></td>
				<td><center><span class="form_titulo">Preencha o formulário para <br/>fazer sua <strong>reclamação!</strong></span></center></td>
				</tr>
				</table></center>
				
				<center><table id="rec_table_titulo_responsivo">
				<tr>
				<td><center><span class="glyphicon glyphicon-fire" id="form_icon"></span></center></td>
				</tr>
				<tr>
				<td><center><span class="form_titulo">Preencha o formulário para fazer sua <strong>reclamação!</strong></span></center></td>
				</tr>
				</table></center>
							
				<div class="rec_div_formulario">
				<div class="rec_div_conteudo_formulario">

				<p class="rec_label">É muito importante que você faça a reclamação com o que está ocorrendo, relate tudo pois a empresa precisa saber que houve a 
				relação de consumo ou uma tentativa. Seja detalhista, mas de uma forma direta e objetiva.</p>

				<br/>
								
				<div class="widget" id="rec_checkbox">
				<fieldset>
				<table id="rec_table_checkbox">
				<form action="php/mod02/cadastrarReclamacao.php" method="POST" enctype="multipart/form-data">
				<label for="produto" class="rec_label" style="width: 100%;"><div class='popup' onclick='myFunction()'><i class='fa fa-info-circle' aria-hidden='true'></i>
				<span class='popuptext' id='myPopup'><a id="rec_popup" href='rec_duvidas.php' target='_blank'>Clique Aqui!</a> E saiba Mais</span>
				</div>Qual é o tipo de reclamação?</label><br/>
				

				<tr>
				
				<?php
				$cont=1;
				foreach ($resultado as $row){
				
			
				echo "
				
				<td id='td_teste'>
				<label id='rec_label_checkbox' for='checkbox-".$cont."'>".$row["TRC_CATEGORIA"]."</label> 
				<input type='checkbox' name='REC_NOTA[]' id='checkbox-".$cont."'  value='".$row["TRC_CATEGORIA"]."'/>
				</td>
				
				</tr>";
				
				$cont++;
				}
				?>

				</table>
				
				</fieldset>

				</div>
				
				<label for="titulo" class="rec_label">Título da reclamação</label><br/>
				<input type="text" name="REC_TITULO_RECLAMACAO" id="form_titulo2" maxlength="50" required="required"/>

				<label for="reclamacao" class="rec_label">Escreva sua Reclamação</label><br/>
				<textarea name="REC_DESCRICAO" id="form_assunto" rows="20" cols="70" placeholder="Escreva aqui todos os detalhes da sua reclamação..." maxlength="500" required="required"></textarea>

				<table id="rec_imagem">
				<tr>
				<td>
				<label class="rec_label"><span class="rec_span_upload_opcional">(Opcional)</span> Envie sua imagem.</label>
				<input type="file" name="REC_LINK_IMAGEM" />
				</td></tr> 
				<tr>
				<td>
				<div class="aviso">
				<span class="glyphicon glyphicon-exclamation-sign">
				</span>&nbsp&nbspO seu arquivo só podera ser visto pelo estabelecimento. Nada que voce anexar aqui é público.
				<br/> Formato permitido: PNG, JPEG ou JPG com até 5mb.
				</div>
				</td></tr>
				</table>		

				<input type="submit" name="submit"  class="rec_botao" value="Reclamar"></input>
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
<script type="text/javascript" src="js/formulario.js"></script>
<script type="text/javascript" src="js/redirect.js"></script>

	</body>
</html>