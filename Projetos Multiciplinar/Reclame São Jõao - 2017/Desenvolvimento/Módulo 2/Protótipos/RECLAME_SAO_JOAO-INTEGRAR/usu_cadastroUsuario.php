<!DOCTYPE html>
<?php
include 'controle/UsuarioDAO.php';
$dao = new UsuarioDAO();

include 'controle/LocalizacaoDAO.php';
$local = new LocalizacaoDAO();

include 'controle/ConsumidorDAO.php';
$consum = new ConsumidorDAO();
//$registro = $dao;


?>
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

	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="css/mod01/bootstrapValidator.css"/>
  
   <script type="text/javascript" src=".js/jquery.min.js"></script>
   <script type="text/javascript" src="js/mod01/bootstrap.min.js"></script>
   <script type="text/javascript" src="js/mod01/bootstrapValidator.js"></script>
   <script type="text/javascript" src="js/mod01/formatarCPF.js"></script>
	
  
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

      <label><b>Telefone</b></label>
      <input class="inputlogin" type="text" placeholder="Enter Telefone" name="uname2" required>
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
        <a class="navbar-brand" href="index.php">
          <h1><img class="img-responsive" src="images/logo.png" alt="logo"></h1>
        </a>                    
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">   
         <li class="scroll active"><a href="#contact">Cadastrar</a></li>
         <li class="scroll"><a href="index.php">Home</a></li>
         <li class="scroll" style="cursor:pointer"><a href="usu_loginUsuario.php">Logar</a></li>  

       </ul>
     </div>
   </div>
 </div><!--/#main-nav-->
</header><!--/#home-->

<!-- Modal escolher forma de login (usuário / estabelecimento) 
<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content modal-sm">
      <div class="modal-header modal-sm">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Qual das opções abaixo você deseja logar?</h4>
      </div>

      <div class="modal-footer" align="center">
					<button class="btn btn-default" type="submit" onclick="location.href='usu_loginUsuario.html'".click();>Consumidor</button>
					<button class="btn btn-primary" type="submit" onclick="location.href='mod01-loginEstabelecimento.html'".click();>Estabelecimento</button>
      </div>
    </div>
  </div>
</div>-->
<section id="contact">
  <!--mapa-->
  <div id="contact-us" class="parallax">
    <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
          <h2>Cadastre-se</h2>
          <p>Para ter acesso a todos os recursos oferecidos por nós!</p>
        </div>
      </div>
      
        <div class="row">
          <div class="col-md-8 col-md-offset-2">             			 
           <form action="php/mod01/cadastrarUsuario.php" method="POST" id="cadastro">
            <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
              <div style="padding-left: 20px; padding-right:20px">
                <div class="form-group">
                  <input type="text" name="USU_NOME" class="form-control" placeholder="Nome Completo" required="required">
                </div>
              </div>

            </div>
            <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
              <div class="col-sm-6" style="padding-left: 20px; padding-right:20px">
                <div class="form-group">
                  <input type="text" name="CON_CPF" id="CON_CPF" class="form-control" placeholder="CPF" maxlength="14" onkeypress="formatar('###.###.###-##', this);" required="required" oninvalid="setCustomValidity('Por favor, digite um CPF válido')" onchange="try{setCustomValidity('')}catch(e){}">  					
                </div>
              </div>
              <div class="col-sm-6" style="padding-right: 20px;padding-left:20px">
                <div class="form-group">
				  <input type="date" id="CON_DATA_NASCIMENTO" name="CON_DATA_NASCIMENTO" class="form-control" placeholder="Data de Nascimento" required="required">                  
                </div>
              </div>
            </div>
			 <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
              <div class="col-sm-6" style="padding-left: 20px;padding-right:20px">
                <div class="form-group">
                 <input type="text" name="USU_TELEFONE" id="USU_TELEFONE" class="form-control" maxlength="14" placeholder="Telefone Fixo: (DDD) 0000-0000" required="required" oninvalid="setCustomValidity('Por favor, digite um telefone válido')" onchange="try{setCustomValidity('')}catch(e){}">
               </div>
             </div>
             <div class="col-sm-6" style="padding-right: 20px;padding-left:20px">
              <div class="form-group">
                <input type="text" name="CON_TELEFONE2" id="CON_TELEFONE2" class="form-control" maxlength="14" placeholder="Celular: (DDD) 00000-0000" oninvalid="setCustomValidity('Por favor, digite um telefone válido')" onchange="try{setCustomValidity('')}catch(e){}">
              </div>
            </div>
          </div>
		     <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
              <div class="col-sm-6" style="padding-left: 20px;padding-right:20px">
                <div class="form-group">
                  <input type="text" name="LOC_CEP" class="form-control" id="LOC_CEP"; placeholder="CEP" OnKeyPress="formatar('#####-###', this)" onblur="pesquisacep(this.value);" required="required" pattern=".{0}|.{9,9}" maxlength="9" oninvalid="setCustomValidity('Por favor, informe um CEP válido.')" onchange="try{setCustomValidity('')}catch(e){}">
                </div>
              </div>
              <div class="col-sm-6" style="padding-right: 20px;padding-left:20px">
                <div class="form-group">
                   <input type="text" name="LOC_ESTADO" id="estado" class="form-control" placeholder="Estado" required="required" oninvalid="setCustomValidity('Por favor, digite o estado do consumidor.')" onchange="try{setCustomValidity('')}catch(e){}">
                </div>
              </div>
            </div>
            <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
              <div class="col-sm-6" style="padding-left: 20px;padding-right:20px">
                <div class="form-group">
                  <input type="text" name="LOC_CIDADE" id="cidade" class="form-control" placeholder="Cidade" required="required" oninvalid="setCustomValidity('Por favor, digite a cidade do consumidor.')" onchange="try{setCustomValidity('')}catch(e){}">
                </div>
              </div>
              <div class="col-sm-6" style="padding-right: 20px;padding-left:20px">
                <div class="form-group">
                  <input type="text" name="LOC_BAIRRO" id="bairro" class="form-control" placeholder="Bairro" required="required" oninvalid="setCustomValidity('Por favor, digite o bairro do consumidor.')" onchange="try{setCustomValidity('')}catch(e){}">
                </div>
              </div>
            </div>
            <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
              <div class="col-sm-6" style="padding-left: 20px;padding-right:20px">
                <div class="form-group">
                  <input type="number" name="CON_NUMERO" class="form-control" placeholder="Número" required="required">
                </div>
              </div>
              <div class="col-sm-6" style="padding-right: 20px;padding-left:20px">
                <div class="form-group">
                   <input type="text" name="CON_COMPLEMENTO" class="form-control" placeholder="Complemento">
                </div>
              </div>
            </div>
			<div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="form-group" style="padding-right: 20px;padding-left: 20px;">
              <input type="text" name="LOC_RUA" id="rua" class="form-control" placeholder="Rua" required="required" oninvalid="setCustomValidity('Por favor, digite a rua do consumidor')" onchange="try{setCustomValidity('')}catch(e){}">
            </div>
          </div>
            <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="form-group" style="padding-right: 20px;padding-left: 20px;">
              <input type="email" name="USU_EMAIL" id="USU_EMAIL" class="form-control" placeholder="Email" required="required" pattern="[A-Za-z0-9._%+-]+@gmail.com" oninvalid="setCustomValidity('Por favor, digite um email valido (somente gmail)')" onchange="try{setCustomValidity('')}catch(e){}">
              <p class="text-center" id="situacao_email"></p>
            </div>
          </div>
		    <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
              <div class="col-sm-6" style="padding-left: 20px;padding-right:20px">
                <div class="form-group">
                  <input onkeyup="validaSenha();" type="password" name="USU_SENHA" id="USU_SENHA" class="form-control" placeholder="Senha" maxlength="12" required="required">	                  
                </div>
              </div>
              <div class="col-sm-6" style="padding-right: 20px;padding-left:20px">
                <div class="form-group">
                  <input onkeyup="validaSenha();" type="password" name="USU_SENHA_CONFIRMAR" id="USU_SENHA_CONFIRMAR" class="form-control" placeholder="Confirmar Senha" maxlength="12" required="required">
                  <p class="text-center" id="resultado"> </p>
                </div>
              </div>
            </div>
           <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
              <div class="col-sm-6" style="padding-left: 20px;padding-right:20px">
                <div class="form-group">
                   <p>É possível adicionar foto de perfil clicando ao lado!</p>
                </div>
              </div>
              <div class="col-sm-6" style="padding-right: 20px;padding-left:20px">
                <div class="form-group">
                  <input class="from-control" placeholder="Foto de Perfil" name="USU_FOTO_PERFIL" type="file" accept="image/*;capture=camera">
                </div>
              </div>
            </div>
          <div class="form-group" style="margin-bottom: 0px;">
				<button type="submit" class="btn-submit2" id="enviarcadastro" dtype="submit"; >Confirmar</button>
		  </div>
        </div>

        
     </form>   

   </div>
 </div>
</div>
</div>
</div>        
</section><!--/#contact-->

<!-- INÍCIO MODAL - ALERTA DE SENHAS NÃO CORRESPONDENTES -->
<div id="ALERTA_SENHA_NAO_CORRESPONDENTE" class="modal fade" role="dialog">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title text-center">Senhas não Correspondentes</h4>
   </div>
   <form>
     <div class="modal-body">
      <p class="text-center">As senhas digitadas não correspondem, verifique-as e tente novamente!</p>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-danger" data-dismiss="modal">Confirmar</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    </div>
  </form>
</div>
</div>
</div>
<!-- FIM MODAL - ALERTA DE SENHAS NÃO CORRESPONDENTES  -->

<!--/#about-us-->

<!--RODAPÉ-->
<footer id="footer" style="background-color: #232323; margin-bottom: -10%;" >
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
        <h3>Sobre o IFSP e o projeto</h3>
        <p>Somos uma equipe de alunos do Instituto Federal de São Paulo - Campus São João da Boa Vista, que buscam finalizar o projeto proposto em uma das disciplinas 
          com o maior sucesso possível. <br/>
          Ao alcançar esse sucesso, estaremos proporcionando para a cidade um novo sistema que pode impulsionar o comércio justo e maior comprometimento 
          por parte dos estabelecimentos presentes na cidade.  <a href="sobreProjeto.php">Saiba mais...</a></p>
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
<script type="text/javascript" src="js/jquery.mask.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="js/jquery.inview.min.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/mousescroll.js"></script>
<script type="text/javascript" src="js/smoothscroll.js"></script>
<script type="text/javascript" src="js/jquery.countTo.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/mod01/mascaraTelefone2.js"></script>
<script type="text/javascript" src="js/mod01/verificarCEP.js"></script>
<script type="text/javascript" src="js/mod01/validarSenha.js"></script>
<script type="text/javascript" src="js/mod01/mascaraTelefone.js"></script>
<script type="text/javascript" src="js/mod01/verificarEmail.js"></script>
<script type="text/javascript" src="js/mod01/verificarCPF.js"></script>
 


<!--<script type="text/javascript" src="js/mod01/verificarCPF.js"></script>-->
<link href="https://cdn.rawgit.com/xdan/datetimepicker/master/jquery.datetimepicker.css" rel="stylesheet"/>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<script src="https://cdn.rawgit.com/xdan/datetimepicker/master/build/jquery.datetimepicker.full.js"></script>
<script type="text/javascript" src="js/mod01/formatoDataNascimento.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!--fim do script em geral-->




</body>
</html>