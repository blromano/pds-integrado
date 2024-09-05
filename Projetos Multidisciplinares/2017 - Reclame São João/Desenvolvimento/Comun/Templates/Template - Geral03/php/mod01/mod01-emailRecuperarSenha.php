<?PHP
	session_start();	
	
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
	<!--link do slidshow testemunho-->
	<link rel="stylesheet" href="css/w3.css">
	<!--fim do link do slidshow testemunho-->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="images/favicon.ico">
	
</head><!--/head-->

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
          <a class="navbar-brand" href="../../index.html">
            <h1><img class="img-responsive" src="images/logo.png" alt="logo"></h1>
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">   
            <li class="scroll"><a href="../../index.html">Home</a></li>                  
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->
 
 <section id="contact">
    <!--mapa-->
    <div id="contact-us" class="parallax">
      <div class="container">
        <div class="row">
          <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>Recuperar Senha</h2>
            <p>Insira seu e-mail para ser possível recuperar a senha!</p>
			<p class="text-center text-danger">
			<?php if(isset($_SESSION['emailErro'])){
				echo $_SESSION['emailErro'];
				unset($_SESSION['emailErro']);
			}?>
			</p>
          </div>
        </div>
        <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
          <div class="row">
            <div class="col-sm-6 " style="width: 60%; margin-right:20%; margin-left:20%; ">
              <form id="formEmail" name="formEmail" method="post" action="mod01-envioEmailRecuperarSenha.php" style="border: 1px solid white; padding: 15px; 30px 0px;">                				
			
                <div class="form-group">
                  <input type="text" name="email" class="form-control" placeholder="Email" required="required">
                </div>
                               
                <div class="form-group" style="margin-bottom: 0px;">
                   <button type="submit" class="btn-submit2">Confirmar</button>
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
			<a href="../../index.html"><img style="margin-left: 30%; margin-top: 4%;"  class="img-responsive" src="images/logo.png" alt=""></a> 
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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/javascript" src="js/formatarCPF.js"></script>
<!--fim do script em geral-->
  

</body>
</html>