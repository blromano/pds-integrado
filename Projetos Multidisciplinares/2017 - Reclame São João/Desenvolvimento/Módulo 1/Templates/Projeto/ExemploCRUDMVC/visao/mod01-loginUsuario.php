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
	<link href="css/login.css" rel="stylesheet">
	<link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
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

<button class="paginaBoasVindas.html"type="submit">Login</button>
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

<body>

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
          <a class="navbar-brand" href="../comum/Template/index.html">
            <h1><img class="img-responsive" src="images/logo.png" alt="logo"></h1>
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">   
			<li class="scroll active"><a href="#contact">Login</a></li>
            <li class="scroll"><a href="../comum/Template/index.html">Home</a></li>
			<li class="scroll"  ><a href="cadastro.html" data-toggle="modal" data-target="#modal-mensagem">Cadastrar</a></li>  
			
			
                  
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->
  
  <!-- Modal escolher forma de cadastro (usuário / estabelecimento)-->
	<div class="modal fade" id="modal-mensagem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-sm" role="document">
		<div class="modal-content modal-sm">
		  <div class="modal-header modal-sm">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel" style="text-align: center;">Qual das opções abaixo você deseja cadastrar-se?</h4>
		  </div>
	<!--
		  <div class="modal-body">
			...
		  </div>
	-->
		  <div class="modal-footer" align="center">
						<button class="btn btn-default" type="submit" onclick="location.href='mod01-cadastroUsuario.html'".click();>Usuário</button>
						<button class="btn btn-primary" type="submit" onclick="location.href='mod01-cadastroEstabelecimento.html'".click();>Estabelecimento</button>
		  </div>
		</div>
	  </div>
	</div>
 <section id="contact">
    <!--mapa-->
    <div id="contact-us" class="parallax">
      <div class="container">
        <div class="row">
          <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>Faça seu login como Usuário</h2>
            <p>Entre com seu usuario e senha para poder acessar todo o conteudo do site!</p>
          </div>
        </div>
        <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
          <div class="row">
            <div class="col-sm-6" style="width: 40%; margin-right: 30%; margin-left: 30%;" >
              <form id="main-login-form" name="login-form" action="loginUsuario.php" method="POST"  ;
                                 style="border: 1px solid white; padding: 30px; 30px 0px;">
                <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="col-sm-6" style="padding-left: 20px; width: 99%">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control" placeholder="Email" required="required">
                    </div>
                  </div>
                  
                </div>
				<div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="col-sm-6" style="padding-left: 20px; width: 99%;">
                    <div class="form-group">
                      <input type="password" name="senha" class="form-control" placeholder="Senha" required="required">
                    </div>
                  </div>              
                </div>
				<p><a class="recuperarSenha" href="mod01-emailRecuperarSenha.html"> Clique aqui </a>para recuperar sua senha</p>                
                <div class="form-group" style="margin-bottom: 0px; margin-left: -2%; margin-right: -2%;">
                   <button type="submit" class="btn-submit2" dtype="submit"; >Logar</button>
                </div>
				
              </form>   
					  
            </div>
          </div>
        </div>
      </div>
    </div>        
  </section><!--/#contact-->
  
  <!--/#about-us-->

<!--RODAPÉ-->
	<footer id="footer" style="background-color: #232323; margin-bottom: -10%;" >
		<div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
		<div class="container text-center">
		<div class="tudo">

			<div class="logo">
			<a href="../comum/Template/index.html"><img style="margin-left: 30%; margin-top: 4%;"  class="img-responsive" src="images/logo.png" alt=""></a> 
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
				por parte dos estabelecimentos presentes na cidade.  <a href="mod01-SobreProjeto.html">Saiba mais...</a></p>
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