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
	<link href="css/rec_formulario.css" rel="stylesheet">
	<link href="css/rec_visualizar.css" rel="stylesheet">
	<!--link do slidshow testemunho-->
	<link rel="stylesheet" href="css/w3.css">
	<!--fim do link do slidshow testemunho-->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="images/favicon.ico">
</head><!--/head-->

<!-- MODAL LOGIN -->
<div id="la" class="modal2">

<form class="modal2-content animate" action="/action_page.php">
<div class="img2container">
<span onclick="document.getElementById('la').style.display='none'" class="close2" title="Close Modal">&times;</span>
<img src="images/favicon.ico" class="avatar2">
</div>

<div class="container2">
<label><b>Username</b></label>
<input class="inputlogin" type="text" placeholder="Enter Username" name="uname2" required>

<label><b>Password</b></label>
<input class="inputlogin" type="password" placeholder="Enter Password" name="psw2" required>

<button class="btndologin"type="submit">Login</button>
<input type="checkbox" checked="checked"> Remember me
</div>

<div class="container2" style="background-color:#f1f1f1">
<button type="button" onclick="document.getElementById('la').style.display='none'" class="cancelbtn2">Cancel</button>
<span class="psw2">Forgot <a href="#">password?</a></span>
</div>
</form>
</div>

<script>
// Get the modal2
var modal2 = document.getElementById('la');

// When the user clicks anywhere outside of the modal, close2 it
window.onclick = function(event) {
if (event.target == modal2) {
modal2.style.display = "none";
}
}
</script>
<!-- FIM DO MODAL LOGIN -->

<!-- MODAL CADASTRO -->
<div id="la2" class="modal3">

<form class="modal3-content animate" action="/action_page.php">
<div class="img2container">
<span onclick="document.getElementById('la2').style.display='none'" class="close2" title="Close Modal">&times;</span>
<img src="images/favicon.ico" class="avatar2">
</div>

<div class="container2">
<label><b>Username</b></label>
<input class="inputlogin" type="text" placeholder="Enter Username" name="uname2" required>

<label><b>Password</b></label>
<input class="inputlogin" type="password" placeholder="Enter Password" name="psw2" required>

<label><b>Confirm Password</b></label>
<input class="inputlogin" type="password" placeholder="Enter Password" name="psw2" required>

<label><b>Email</b></label>
<input class="inputlogin" type="text" placeholder="Enter Email" name="uname2" required>

<label><b>CPF</b></label>
<input class="inputlogin" type="text" placeholder="Enter CPF" name="uname2" required>

<label><b>Telefone</b></label>
<input class="inputlogin" type="text" placeholder="Enter Telefone" name="uname2" required>

<button class="btndologin"type="submit">Login</button>
<input type="checkbox" checked="checked"> Remember me
</div>

<div class="container2" style="background-color:#f1f1f1">
<button type="button" onclick="document.getElementById('la2').style.display='none'" class="cancelbtn2">Cancel</button>
<span class="psw2">Forgot <a href="#">password?</a></span>
</div>
</form>
</div>

<!--  por algum motivo o js do cadastro buga o do login
<script>
// Get the modal3
var modal3 = document.getElementById('la2');

// When the user clicks anywhere outside of the modal, close2 it
window.onclick = function(event) {
if (event.target == modal3) {
modal3.style.display = "none";
}
}
</script>
-->
<!-- FIM DO MODAL CADASTRO -->

<body style="background: #f4f3f0;">

  <!--.preloader-->
  <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
  <!--/.preloader-->

   <header id="home">

    </div>
	<!--/#home-slider-->
    <div class="main-nav" >
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">
            <h1><img class="img-responsive" src="images/logo.png" alt="logo"></h1>
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">   
			<li class="scroll active"><a href="#contact">Cadastrar</a></li>
            <li class="scroll"><a href="index.php">Home</a></li>
			<li class="scroll"  ><a href="login.php">Logar</a></li>  
			
			
                  
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->

  <center><table border="0" style="margin-top: 5%;">
      <tr><td class="loucura2">Reclamação do consumidor <br/>para o estabelecimento:</td></tr>
</table></center>

<center><table border="0" style="margin-top: 2%;">
   <tr><td><span class="glyphicon glyphicon-eye-open" id="avatar245"></span></td> <td class="nomeempresa">&nbsp&nbsp&nbspHills Burgueria</td> </tr>
</table></center>
  

  <div class="loucura3">
	<div class="menutudao">
	
	
<p class="titulosolucao">Quero devolução do dinheiro já que paguei pelo salgado e comi cachorro</p>
<table border="0" class="tabledados" style="margin-top: 2%;">
   <tr><td>
  <td><span class="">Consumidor: Delsine Oliveira&nbsp&nbsp&nbsp</span></td> 
   </td></tr>
</table>
<p rows="20" cols="70" class="descricao" placeholder="Escreva aqui todos os detalhes da sua reclamação..." maxlength="500">
Comprei um salgado na pastelaria e tinha cachorro dentro e pena de pombo. O Mestre na arte da vida faz pouca distinção entre o seu trabalho e o seu lazer, entre a sua mente e o seu corpo, entre a sua educação e a sua recreação, entre o seu amor e a sua religião. Ele dificilmente sabe distinguir um corpo do outro. Ele simplesmente persegue sua visão de excelência em tudo que faz, deixando para os outros a decisão de saber se está trabalhando ou se divertindo. Ele acha que está sempre fazendo as duas coisas simultaneamente.
</p>
<table border="0" class="tabledados">
   <tr><td>
  <td><span class="dadosborder">Data: 16/03/2017 ás 19:30&nbsp&nbsp&nbsp </span></td> 
   <td><span class="dadosborder"> Telefone: 19 36313355&nbsp&nbsp&nbsp </span></td>  
   <td><span class="dadosborder">ID Reclamação: #004&nbsp&nbsp&nbsp </span></td>
   <td><span class="">Estabelecimento: Pastelaria Camila</span></td>
   </td></tr>
</table>


</br>
<p class="titulosolucao">Resposta Estabelecimento</p>
<table border="0" class="tabledados" style="margin-top: 2%;">
   <tr><td>
  <td><span class="">Representante: Senhor Osmar&nbsp&nbsp&nbsp</span></td> 
   </td></tr>
</table>
<p rows="20" cols="70" class="descricao" placeholder="Escreva aqui todos os detalhes da sua reclamação..." maxlength="500">
Prezado cliente, boa tarde!
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


</br>
<p class="titulosolucao">Replica Consumidor</p>
<table border="0" class="tabledados" style="margin-top: 2%;">
   <tr><td>
  <td><span class="">Representante: Senhor Osmar&nbsp&nbsp&nbsp</span></td> 
   </td></tr>
</table>
<p rows="20" cols="70" class="descricao" placeholder="Escreva aqui todos os detalhes da sua reclamação..." maxlength="500">
Nada ver fi, para fi, para fi, nada ver tinha cachorro eu vi a pata eu pedi lanche sem cachorro e veio cachorro dentro deve ter sido o meu que eu perdi.
Nada ver fi, para fi, para fi, nada ver tinha cachorro eu vi a pata eu pedi lanche sem cachorro e veio cachorro dentro deve ter sido o meu que eu perdi.
Nada ver fi, para fi, para fi, nada ver tinha cachorro eu vi a pata eu pedi lanche sem cachorro e veio cachorro dentro deve ter sido o meu que eu perdi.
</p>
<table border="0" class="tabledados">
   <tr><td>
  <td><span class="dadosborder">Data: 16/03/2017 ás 19:30&nbsp&nbsp&nbsp </span></td> 
   <td><span class="dadosborder"> Telefone: 19 36313355&nbsp&nbsp&nbsp </span></td>  
   <td><span class="dadosborder">ID Reclamação: #004&nbsp&nbsp&nbsp </span></td>
   <td><span class="">Estabelecimento: Pastelaria Camila</span></td>
   </td></tr>
</table>

</br>
<p class="titulosolucao">Replica Estabelecimento</p>
<table border="0" class="tabledados" style="margin-top: 2%;">
   <tr><td>
  <td><span class="">Representante: Senhor Osmar&nbsp&nbsp&nbsp</span></td> 
   </td></tr>
</table>
<p rows="20" cols="70" class="descricao" placeholder="Escreva aqui todos os detalhes da sua reclamação..." maxlength="500">
Affs blz então vem aqui que te dou um salgado dentro e voce abre e se tiver cachorro dentro eu te dou 2 outros salgados e se nesses tiver cachorro voce faz a formula 
de potenciação que eu te dou a loja.
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

<p class="loucura33">Consumidor esse é o canal de reclamação para que voce possa resolver seus problemas de maneira simples e sem
precisar sair de casa, caso a empresa nao solucionou seu problema siga nossos passos:</p>



</br>
<p class="passos">1° Passo:</p>
<p class="titulosolucao2">Entre em contato:</p>
<p class="telefone">Telefone:</p>
<table border="0" style="width: 35%; ">
   <tr><td style="width: 5%;"><input type="text" class="nomeMenu3337" size ="2" width="2" maxlength="2" placeholder="" value="45" name="Nome" readonly="readonly"/></td> 
   <td style="width: 25%; margin-left: 5%;"><input style="margin-left: 5%;" type="text" class="nomeMenu3336" size ="2" width="2" maxlength="2" placeholder="" value="3631-8917"  name="Nome" readonly="readonly"/> </td> 
</table>
<br/><br/>
<p class="passos">2° Passo:</p>

<p class="titulosolucao2">Agende sua reunião:</p>
<input type="text" class="caixa" name="Nome" value="www.sdadjasndjka.com.br" readonly="readonly"/> 
  <br/><br/>
  <p class="passos">3° Passo:</p>

<p class="titulosolucao2">Vá no procon:</p>
<input type="text" class="caixa" name="Nome" value="www.sdadjasndjka.com.br" readonly="readonly"/> 
	<br/><br/>

	<div class="divconsideracao"><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp&nbsp
	<span class="consideracao">Consideração final do Consumidor: </span><p class="consideracaotexto">
	Vish melhor coisa foi ter reclamado aqui, ganhei dois salgadao fi slc matou a larica
	<br/> Sendo um com barriga de cachorro :)</p><span class="glyphicon glyphicon-ok"></span>&nbsp&nbsp
	<span class="consideracao">Problema resolvido </span>
	</div>

 

<a href="revisereclamacao.php"><button type="submit"  class="enviarreclame3334">Voltar Página Inicial</button></a>
</div>
</div>


  
  <!--/#about-us-->

<!--RODAPÉ-->
	<footer id="footer" style="background-color: #232323; margin-bottom: -10%;margin-top: 15%;" >
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
<!--fim do script em geral-->
  

</body>
</html>