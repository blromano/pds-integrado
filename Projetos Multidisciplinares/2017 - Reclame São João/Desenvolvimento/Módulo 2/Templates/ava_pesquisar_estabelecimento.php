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
      <link href="css/rec_pesquisar.css" rel="stylesheet">
      <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
      <link rel="shortcut icon" href="images/favicon.ico">
      <script type="text/javascript" src="js/jquery.js"></script>
      <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
      <script type="text/javascript" src="js/jquery.bgiframe.min.js"></script>
      <script type="text/javascript" src="js/jquery.ajaxQueue.js"></script>
      <script type="text/javascript" src="js/jquery-ui.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script>
      <!--css -->
      <link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css"/>

   </head>
   <!--/head-->
   
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
         </div>
         <!--/#main-nav-->
      </header>
      <!--/#home-->
      <center>
         <table border="0" style="margin-top: 12%;">
            <tr>
               <td class="loucura2">Encontre o estabelecimento <br/>para fazer sua avaliação:</td>
            </tr>
         </table>
      </center>
      <center>
         <table border="0" style="margin-top: 2%;">
            <tr>
               <td><i id="avatar245" style="font-size: 30px;" class="fa fa-star-half-o" aria-hidden="true"></i></td>
            </tr>
         </table>
      </center>
      <center>
         <div class="divtudao">
            <div class="divbarraetitulo">
               <table border="0" class="tableunica">
                  <form style="color: black;" action='rec_estabelecimento.php' method='get'>
                     <tr>
                        <td>
                           <p class="titulo">Pesquise o Estabelecimento</p>
                           <input type='text' id='EST_NOME' name='EST_NOME' value='' class="barrapesquisa auto"/>
                        </td>
                     </tr>
                     <tr>
                        <td><a href="rec_estabelecimento.php"><button type="submit" name="destination-submit"  class="botao"  onclick="location.href='rec_estabelecimento.php'".click()>Pesquisar</button></a></td>
                     </tr>
                     <input type="hidden" name="link" value="encontreempresa-reclamacao.php">
                  </form>
               </table>
      </center>
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
                        por parte dos estabelecimentos presentes na cidade.
                     </p>
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
      <!--script essenciais -->
      <script type="text/javascript" src="js/jquery.js"></script>
      <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
      <script type="text/javascript" src="js/main.js"></script>
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <!--script essenciais -->
      <!--script do -->
      <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
      <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    
      <script type="text/javascript">
         $(function() {
         
         //autocomplete
         $(".auto").autocomplete({
             source: "rec_procurar.php",
             minLength: 1
         });                
         
         });
      </script>
      <!-- fim script do ->
         <!--script do mod04-->
      <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript" src="js/mod04/datatable.js"></script>
      <script type="text/javascript" src="js/mod04/redirectRankingsRelatorios.js"></script>
      <script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
      <script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
      <!-- fim script do mod04 -->
      <!--fim do script em geral-->
   </body>
</html>