<?php
session_start();
$nome_estabelecimento = $_SESSION["nome"];
$id_estabelecimento = $_SESSION["EST_ID"];
?>
<?php
if($_SESSION["QUANT_CHECKBOX"]==0){
	echo "<script>alert('Checkbox nao foi preenchido')</script>";
	echo "<script>window.location = 'rec_editar.php';</script>"; 
	
}else{
	echo "";
}
?>
<p style="color: red;">Informações Ocultas, estao sendo exibidas apenas para teste:</p>
<?php
//codigo que exibi as informações para o site
if ($_SESSION['REC_IMAGEM']!=null){
echo "Link Imagem: <a href='$_SESSION[REC_LINK_IMAGEM]'>link</a>";
}
else{
echo "Link Imagem: imagem nao cadastrada";
}

echo "<br/>	Quantidade de checkbox selecionados: ".$_SESSION["QUANT_CHECKBOX"];
echo "<br/> Checkbox selecionados: ".$_SESSION["NOME_CHECKBOX"];
echo "<br/> Nota da Reclamação: ".$_SESSION["REC_NOTA_FORMATADA"];
echo "<br/><br/>";
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
          <a class="navbar-brand" href="index.php" style="border: 1px solid transparent;" >
            <h1><img class="img-responsive" src="images/logo.png" alt="logo"></h1>
          </a>   
		  
        </div>

<form action="rec_estabelecimento.php" method=get name="formulario3"> 
<input type="hidden" name="EST_NOME" value="<?php echo $_SESSION["nome"]; ?>">
<input type="hidden" name="link" value="index.php">
</form> 
		
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right" style="height: 80px;">   
			<li class="scroll active" style="cursor: pointer;"><a href="#main-wrapper">Revisão da Reclamação</a></li>
            <li class="scroll" style="cursor: pointer;"><a onclick="redirect()">Estabelecimento</a></li>
           <li class="scroll" style="cursor: pointer;"><a href="contato.php">User</a></li>
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
							<p>Bem Vindo a página de Revisão. Aqui voce revisa a sua reclamação antes de publica-la.</p>


							<form action="rec_formulario.php" method=post name="formulario1"> 
							<input type="hidden" name="reclamar" value="<?php echo ($nome_estabelecimento);?>">
							</form> 
													
							<form action="ava_formulario.php" method=post name="formulario2"> 
							<input type="hidden" name="avaliar" value="<?php echo ($nome_estabelecimento);?>">
							</form> 
				
						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li><a class="fa fa-comments" onclick="reclamar()"  style="cursor: pointer;"><span>Reclamar</span></a></li>
									<li><a class="fa fa-star-half-o" onclick="avaliar()" style="cursor: pointer;"><span>Avaliar</span></a></li>
									<li><a class="fa fa-list-alt" onclick="redirect()" style="cursor: pointer;"><span>Estabelecimento</span></a></li>
									<li><a class="fa fa-list-alt" onclick="location.href='rec_info.php'" style="cursor: pointer;"><span>Mais Informações</span></a></li>
									<li><a class="fa fa-info-circle" onclick="location.href='rec_duvidas.php'" style="cursor: pointer;"><span>Dúvidas</span></a></li>
								</ul>
							</nav>

					</div>
				</div>

				<!-- Conteudo -->
				<center><table border="1" style="margin-top: 5%;  width: 30%;">
				<tr>
				<td style=" "><center><span class="glyphicon glyphicon-pencil" id="form_icon"></span></center></td>
				<td><center><SPAN class="form_titulo">Revise sua reclamação antes <br/>de fazer sua <strong>reclamação!</strong></SPAN></center></td>
				</tr>
				</table></center>
				
				
				<div class="loucura3">
				<div class="menutudao">

				<label for="produto" class="loucura33">Tipo de reclamação selecionados</label><br/>
				<input type="text" name="language" id="form_titulo2" value="<?php echo $_SESSION["NOME_CHECKBOX"];?>" readonly="readonly"/>

				<label for="titulo" class="loucura33">Título da reclamação</label><br/>
				<input type="text" name="titulo" id="form_titulo2" value="<?php echo $_SESSION["REC_TITULO_RECLAMACAO"];?>" readonly="readonly"/>
				
				<label for="reclamacao" class="loucura33">Texto da Reclamação</label><br/>
				<textarea name="reclamacao" id="form_assunto" rows="20" cols="70" placeholder="Escreva aqui todos os detalhes da sua reclamação..." maxlength="500" style="color: black; height: 105px; color: #666;" readonly="readonly"><?php echo $_SESSION["REC_DESCRICAO"]; ?></textarea>
				
				<table border="0" style="width: 100%;">
				
				<?php
				if ($_SESSION['REC_IMAGEM']!=null){
				?>

				<tr><td style="width: 30%;"><label class="loucura33"><span style="color: #4A90E2">(Opcional)</span> Suas imagens</label>
				<img style="width: 30%; height: 30%;"  class="img-responsive" src="<?php echo $_SESSION['REC_LINK_IMAGEM']; ?>" alt=""/>
				</td></tr>
				<tr><td style="width: 0%;"><div class="aviso"><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp&nbspO seu arquivo só podera ser visto pelo estabelecimento. Nada que voce anexar aqui é público.<br/> Formato permitido: PNG, JPEG ou JPG com até 5mb.</div></td></tr>

				<?php
				}else{
				echo "";
				}
				?>
				
				</table>

				<table border="0"  style="float: left; width:25%;">
				<tr><td><a href="rec_editar.php"><button type="submit"  class="enviarreclame2">Editar</button></a></td>
				</table>
				<table border="0" style="margin-left: 29%; width:25%;">
				<td><a href="rec_enviado.php"><button type="submit"  class="enviarreclame">Reclamar</button></a></td> </tr>
				</table>

				</div>
				</div>
				
		</div>
		

		<!--RODAPÉ-->
	<footer id="footer" style="background-color: #232323; margin-top: 15%;" >
		<div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
		<div class="container text-center">
		<div class="tudo">

			<div class="logo" id="ajusteslogo">
			<a href="index.php"><img style="margin-left: 30%; margin-top: 4%;"  class="img-responsive" src="images/logo.png" alt=""></a> 
				<div id="icons" class="social-icons" style="margin-top: 5%;" >
				<ul id="rodapeul">
				<li><a class="envelope" href="#"><i class="fa fa-envelope"></i></a></li>
				<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li> 
				<li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
				<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
				<li><a class="tumblr" href="#"><i class="fa fa-tumblr-square"></i></a></li>
				</ul>
				</div>
			</div>

			<div class="texto" id="ajustestexto">
				<h3>Sobre nós</h3>
				<p id="paragrafinho">Somos uma equipe de alunos do Instituto Federal de São Paulo - Campus São João da Boa Vista, que buscam finalizar o projeto proposto em uma das disciplinas 
				com o maior sucesso possível. <br/></p>
				<p id="paragrafo">Ao alcançar esse sucesso, estaremos proporcionando para a cidade um novo sistema que pode impulsionar o comércio justo e maior comprometimento 
				por parte dos estabelecimentos presentes na cidade.  <a href="sobreProjeto.php">Saiba mais...</a></p>
			</div>	
			</div>
			</div>
			</div>
			
				<div class="footer-bottom" style="background-color: #191919;">
				<div class="container">
				<div class="row" id="ajustesrow">
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
		
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="js/main.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
$( "input" ).checkboxradio();
} );
</script>
<script>
function reclamar() {
document.formulario1.submit() 
}
function avaliar() {
document.formulario2.submit() 
}
function redirect() {
document.formulario3.submit() 
}
</script>

<script>

(function(window) { 
  'use strict'; 
 
var noback = { 
	 
	//globals 
	version: '0.0.1', 
	history_api : typeof history.pushState !== 'undefined', 
	 
	init:function(){ 
		window.location.hash = '#no-back'; 
		noback.configure(); 
	}, 
	 
	hasChanged:function(){ 
		if (window.location.hash == '#no-back' ){ 
			window.location.hash = '#BLOQUEIO';
			//mostra mensagem que não pode usar o btn volta do browser
			if($( "#msgAviso" ).css('display') =='none'){
				$( "#msgAviso" ).slideToggle("slow");
			}
		} 
	}, 
	 
	checkCompat: function(){ 
		if(window.addEventListener) { 
			window.addEventListener("hashchange", noback.hasChanged, false); 
		}else if (window.attachEvent) { 
			window.attachEvent("onhashchange", noback.hasChanged); 
		}else{ 
			window.onhashchange = noback.hasChanged; 
		} 
	}, 
	 
	configure: function(){ 
		if ( window.location.hash == '#no-back' ) { 
			if ( this.history_api ){ 
				history.pushState(null, '', '#BLOQUEIO'); 
			}else{  
				window.location.hash = '#BLOQUEIO';
			} 
		} 
		noback.checkCompat(); 
		noback.hasChanged(); 
	} 
	 
	}; 
	 
	// AMD support 
	if (typeof define === 'function' && define.amd) { 
		define( function() { return noback; } ); 
	}  
	// For CommonJS and CommonJS-like 
	else if (typeof module === 'object' && module.exports) { 
		module.exports = noback; 
	}  
	else { 
		window.noback = noback; 
	} 
	noback.init();
}(window));
 
</script>
	</body>
</html>