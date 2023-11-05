<?php

	session_start();
	include_once("rec_conexao.php");
	function limitar($string, $tamanho, $encode = 'UTF-8') {
	if( strlen($string) > $tamanho ){
	$string = mb_substr($string, 0, $tamanho - 3, $encode) . '...';
	}
	else{
	$string = mb_substr($string, 0, $tamanho, $encode);
	}
	return $string;
	}
	
	$sql = "SELECT EST_ID FROM estabelecimentos WHERE EST_NOME_FANTASIA = '$busca'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
	$idatual = $row["EST_ID"];
	}
	} else {
	echo "0 results";
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
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link href="css/menu.min.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/testes.css" rel="stylesheet">
	<link href="css/rodape2.css" rel="stylesheet">
	<link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/depoimentos.css" rel="stylesheet">
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
          <a class="navbar-brand" href="index.php" style="border: 1px solid transparent;" >
            <h1><img class="img-responsive" src="images/logo.png" alt="logo"/></h1>
          </a>   
		  
        </div>


		
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right" style="height: 80px;">   
			<li class="scroll active" style="cursor: pointer;"><a href="#main-wrapper">Reclamação</a></li>
            <li class="scroll" style="cursor: pointer;"><a onclick="redirect()">Estabelecimento</a></li>
           <li class="scroll" style="cursor: pointer;"><a href="contato.php">User</a></li>
		   
			<li id="extras" class="scroll"><a onclick="reclamar()"  style="cursor: pointer;"><span>Reclamar</span></a></li>
			<li id="extras" class="scroll"><a onclick="avaliar()" style="cursor: pointer;"><span>Avaliar</span></a></li>
			<li id="extras" class="scroll"><a onclick="location.href='rec_info.php'" style="cursor: pointer;"><span>Mais Informações</span></a></li>
			<li id="extras" class="scroll"><a onclick="location.href='rec_duvidas.php'" style="cursor: pointer;"><span>Dúvidas</span></a></li>

          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
	
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<div id="header" class="container">
						<!-- Logo -->
										
						<h1 id="logo"><a href="#footer"><?php echo wordwrap('Bem Vindo a página de Reclamação', 20,  "<br/><br/>"); ?></a></h1>
						<h1 id="logo2"><a href="#footer"><?php echo ('Bem Vindo a página de Reclamação'); ?></a></h1>
						<p>Bem Vindo a página de Reclamação. Aqui voce pode ver a reclamação.</p>
				
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
				<td style=" "><center><span class="fa fa-street-view" id="form_icon"></span></center></td>
				<td><center><SPAN class="form_titulo">Veja a reclamação <br/>de outros <strong>usuários!</strong></SPAN></center></td>
				</tr>
				</table></center>
				
	<div class="loucura3">
	<div class="menutudao">
<div style="padding: 3em 0 1em 0; border-top: solid 2px #e5e5e5;border-bottom: solid 2px #e5e5e5;box-shadow: inset 0px -8px 0px 0px #fff, inset 0px -10px 0px 0px #e5e5e5, inset 0px 8px 0px 0px #fff, inset 0px 10px 0px 0px #e5e5e5;">

<p class="titulosolucao">Quero devolução do dinheiro já que paguei pelo salgado e comi cachorro</p>
<table border="0" class="tabledados" style="margin-top: 2%;">
   <tr><td>
  <td><span class="">Consumidor: Delsine Oliveira&nbsp&nbsp&nbsp</span></td> 
   </td></tr>
</table>
<p rows="20" cols="70" class="descricao" placeholder="Escreva aqui todos os detalhes da sua reclamação..." maxlength="500">
<span class="titulosolucao">Reclamação:</span> Comprei um salgado na pastelaria e tinha cachorro dentro e pena de pombo. O Mestre na arte da vida faz pouca distinção entre o seu trabalho e o seu lazer, entre a sua mente e o seu corpo, entre a sua educação e a sua recreação, entre o seu amor e a sua religião. Ele dificilmente sabe distinguir um corpo do outro. Ele simplesmente persegue sua visão de excelência em tudo que faz, deixando para os outros a decisão de saber se está trabalhando ou se divertindo. Ele acha que está sempre fazendo as duas coisas simultaneamente.
</p>
<table border="0" class="tabledados">
   <tr><td>
  <td><span class="dadosborder">Data: 16/03/2017 ás 19:30&nbsp&nbsp&nbsp </span></td> 
   <td><span class="dadosborder"> Telefone: 19 36313355&nbsp&nbsp&nbsp </span></td>  
   <td><span class="dadosborder">ID Reclamação: #004&nbsp&nbsp&nbsp </span></td>
   <td><span class="">Estabelecimento: Pastelaria Camila</span></td>
   </td></tr>
</table>

</div>
</br>
<div style="padding: 3em 0 3em 0; border-top: solid 2px #e5e5e5;border-bottom: solid 2px #e5e5e5;box-shadow: inset 0px -8px 0px 0px #fff, inset 0px -10px 0px 0px #e5e5e5, inset 0px 8px 0px 0px #fff, inset 0px 10px 0px 0px #e5e5e5;">

<p class="titulosolucao">Resposta Estabelecimento</p>
<table border="0" class="tabledados" style="margin-top: 2%;">
   <tr><td>
  <td><span class="">Representante: Senhor Osmar&nbsp&nbsp&nbsp</span></td> 
   </td></tr>
</table>
<p rows="20" cols="70" class="descricao" placeholder="Escreva aqui todos os detalhes da sua reclamação..." maxlength="500">
<span class="titulosolucao">Resposta:</span> Prezado cliente, boa tarde!
Primeiramente voce é mal informado, chato, burro, lesado e nao sabe das coisas a gente usa cachorro só quando o cliente pede e voce não pediu então nao tinha cachorro.
<br/><br/>
Atenciosamente<br/>
Pastelaria Camilo
</p>
<table border="0" class="tabledados">
   <tr><td>
  <td><span class="dadosborder">Data: 17/03/2017 ás 19:30&nbsp&nbsp&nbsp </span></td> 
   <td><span class="dadosborder">Local: Av Dona Gertrudes&nbsp&nbsp&nbsp </span></td>
   <td><span class="dadosborder">ID Resposta: #004&nbsp&nbsp&nbsp </span></td>
   <td><span class="">Estabelecimento: Pastelaria Camilo</span></td>  
   </td></tr>
</table>
				
	<div class="divconsideracao"><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp&nbsp
	<span class="consideracao">Consideração final do Consumidor: </span><p class="consideracaotexto">
	Vish melhor coisa foi ter reclamado aqui, ganhei dois salgadao fi slc matou a larica
	<br/> Sendo um com barriga de cachorro :)</p><span id="glyphicon" class="glyphicon glyphicon-ok"></span>&nbsp&nbsp
	<span class="consideracao">Problema resolvido </span><br/>
	<span id="glyphicon" class="glyphicon glyphicon-remove"></span>&nbsp&nbsp
	<span class="consideracao">Problema não resolvido </span>
	</div>
</div>
 

<a href="revisereclamacao.html"><button type="submit"  class="enviarreclame3334">Voltar Página Inicial</button></a>
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
	</body>
</html>